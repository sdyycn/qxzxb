<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理系统</title>
<link href="/templates/jobadmin/common/style.css" rel="stylesheet" type="text/css" />
</head>
<body id="right" class="main1">
<div class="ttitle">
  <h1>行业类别管理</h1>
</div>
<?php
/*
 * 后台行业管理
 * @author 梁志平
 * @date 2013-06-17
*/
//引入数据库连接
require '../../configs/config.php';
require '../../configs/function.php';
//获取行业父类
function getbasesort($db){
	$result=$db->query("select industryid,sortname from `ejob_industry` where level = '0'");
	$basesort = array();
	$basesort=$db->fetch_result($result);
	return  $basesort;
	}
//保存行业类别
function saveIndus($db, $table, $data) {
        if($db->insert($table, $data)){
			return true;
			}
		else{
			return false;
			}
   }
// 获取类别层级
function getLevel($pid){
	$level="";
	if ($pid=="0"){
		$level="0";
		}
	else{
		$level="1";
		}
	return $level;
	}
//获取数据库中最大序号值
if($_GET["act"]=="addsave"){
	$result=$db->query("select max(xh) from `ejob_industry`");
	if  ($db->result($result)){
		$maxxh = $db->result($result) + 1;
		}
	else{
		$maxxh = 1;
		}
	$data = array("sortname"=>$_POST["sortname"],"level"=>getLevel($_POST["pid"]), "pid"=>$_POST["pid"], "xh"=>$maxxh);
	$table = "ejob_industry";
	if(saveIndus($db, $table, $data)){
		alert("添加成功!","industry.php");
		}
	else{
		alert("添加失败!","industry.php");
		}
}
?>
<table class="list-layout wd-700" >
  <form  method="post" action="?act=addsave" name="myform" id="myform">
    <thead>
      <tr>
        <th  colspan="2" class="tc">类别添加</th>
      </tr>
    </thead>
    <tbody>
          <tr>
        <td width="190" class="a">所属类别:</td>
        <td width="498"><select name="pid" size="1"  >
            <option value="0"  selected="selected">无父类</option>
            <?php
$basesort = array();
$basesort = getbasesort($db);
for ($i=0; $i<=count($basesort,COUNT_NORMAL)-1; $i++)
{
		?>
            <option value="<?php echo $basesort[$i]["industryid"]?>"><?php echo $basesort[$i]["sortname"]?></option>
            <?php
			}
        ?>
          </select></td>
      </tr>
      <tr>
        <td width="190" class="a">名称:</td>
        <td width="498"><input name="sortname"  type="text"  size="30"  value=""/></td>
      </tr>
      <tr>
        <td></td>
        <td><input  type="submit" class="btn2"   name="submit" id="submit" value="添加"   /></td>
      </tr>
    </tbody>
  </form>
</table>
</body>
</html>
