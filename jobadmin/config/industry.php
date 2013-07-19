<?php
/*
 * 后台管理用户登录
 * @author 梁志平
 * @date 2013-06-17
*/
//引入数据库连接
require '../../configs/config.php';
require '../../configs/function.php';
//获取大类
function getBigsort($db){
	$sql = "select industryid,sortname,xh from ejob_industry where pid = 0";
    $result = $db->query($sql);	 
	$bigsort = array();
	$bigsort=$db->fetch_result($result);
	return  $bigsort;
	}
//获取一级类别
function getbasesort($db){
	$result=$db->query("select industryid,sortname from `ejob_industry` where level = '0' order by  xh  asc");
	$basesort = array();
	$basesort=$db->fetch_result($result);
	return  $basesort;
	}
//获取行业列表
function  getInduslist($db){
	$sql = "select industryid,sortname,xh from ejob_industry ";
    $result = $db->query($sql);	 
	$indus = array();
	$indus=$db->fetch_result($result);
	return  $indus;
	}
//保存行业修改信息
function  updateIndus($db,$table,$data,$condition){
	if($db->update($table,$data,$condition)){
		return  true;
		}
	else{
		return  false;
		}
	}
//获取小类
function getSmallsort($db,$pid){
	$sql="select industryid,sortname,xh,pid from ejob_industry where pid = '".$pid."' order by  xh   asc";
	$result = $db->query($sql);	 
	$smallsort = array();
	$smallsort=$db->fetch_result($result);
	return $smallsort;
	}
//获取所有类别
function getSort($db,$sortid){
	if (empty($sortid)){
		$sql="select industryid,sortname,pid,xh,pid,level from ejob_industry order by  xh  asc";
		}
	else{
		$sql="select industryid,sortname,xh,pid,level from ejob_industry   where  industryid = ".$sortid." order by  xh  asc";
		}
	$result = $db->query($sql);	 
	$indus = array();
	$indus=$db->fetch_result($result);
	return $indus;
	}
//更改行业类别
if ($_GET["act"]=="editsave"){
	$table = "ejob_industry";
	$data = array("sortname"=>$_POST["sortname"],"xh"=>$_POST["xh"]);
	$condition = "where industryid = '".$_POST["industryid"]."'";
	if(updateIndus($db,$table,$data,$condition)){
		alert("行业类别修改成功!","industry.php");
		}
	else{
		alert("行业类别修改失败!","industry.php");
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理系统</title>
<link href="/templates/jobadmin/common/style.css" rel="stylesheet" type="text/css" />
<link href="/templates/jobadmin/common/treemenu.css" rel="stylesheet" type="text/css" />
<script language="javaScript" type="text/javascript" src="/templates/scripts/jquery.js"></script>
<script language="javaScript" type="text/javascript" src="/templates/jobadmin/scripts/listsort.js"></script>
</head>
<body id="right" class="main1">
<div class="wrapper">
  <div class="ttitle">
    <h1>行业类别管理</h1>
  </div>
  <div class="side-bar">
    <table class="list-layout " >
      <thead>
        <tr>
          <th>专业类别</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php
$bigsort = array();
$bigsort = getBigsort($db);
for ($i=0; $i<=count($bigsort,COUNT_NORMAL)-1; $i++)
{
?>
            <div  class="side-nav-tit"><span></span><a href="industry.php?sortid=<?php echo $bigsort[$i]["industryid"] ?>&xh=<?php echo $bigsort[$i]["industryid"]?>"  ><?php echo $bigsort[$i]["sortname"]?></a></div>
            <div class="side-nav-body">
              <ul>
                <?php 
$smallsort = array();
$smallsort = getSmallsort($db,$bigsort[$i]["industryid"]);
for ($j=0; $j<=count($smallsort,COUNT_NORMAL)-1; $j++)
{
				?>
                <li><a href="industry.php?sortid=<?php echo $smallsort[$j]["industryid"]?>&xh=<?php echo $smallsort[$j]["pid"]?>" ><?php echo $smallsort[$j]["sortname"]?></a></li>
                <?php
}
?>
              </ul>
            </div>
            <?php 
}
?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="main-content">
    <table class="list-layout wd-800" >
      <thead>
        <tr>
          <th>ID</th>
          <th>标题</th>
          <th>所属大类</th>
          <th width="140">序号</th>
          <th width="308">添加时间</th>
          <th width="299"></th>
        </tr>
      </thead>
      <tbody>
      <form  method="post" action="?act=editsave" name="form">
        <?php
$majorsort = array();
$majorsort = getSort($db,$_GET["sortid"]);
$i=0;
?>
        <tr>
          <td width="351"><?php  echo  $majorsort[$i]["industryid"];?></td>
          <td width="498"><input name="sortname" size="30" value="<?php echo $majorsort[$i]["sortname"] ?>" type="text">
            <input name="industryid" size="10" value="<?php echo  $majorsort[$i]["industryid"] ?> "style="display:none;" type="text"></td>
          <td><select name="pid" size="1"  >
              <option value="0"  <?php if($majorsort[$i]["level"]=="0") {  ?> selected="selected" <?php } ?>>无父类</option>
<?php
$basesort = array();
$basesort = getbasesort($db);
for ($k=0; $k<=count($basesort,COUNT_NORMAL)-1; $k++)
{
		?>
              <option value="<?php echo $basesort[$k]["industryid"]?>" <?php if($majorsort[$i]["pid"]==$basesort[$k]["industryid"]){ echo "selected='selected'";}  ?>><?php echo $basesort[$k]["sortname"]?></option>
              <?php
			}
        ?>
            </select></td>
          <td width="140"><input name="xh" size="10" value="<?php echo  $majorsort[$i]["xh"] ?>" type="text"></td>
          <td width="308"><input class="btn2" name="submit" id="submit" value="修改" type="submit"></td>
          <td width="299"><a href="?act=del&amp;id=1" onclick="return confirm('确定删除？');" class="btn2">删除</a></td>
        </tr>
      </form>
      </tbody>
      
    </table>
  </div>
</div>
</body>
</html>
