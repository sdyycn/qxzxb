<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站点信息配置</title>
<link href="/templates/jobadmin/common/style.css" rel="stylesheet" type="text/css" />
</head>
<body id="right" class="main1">
<div class="ttitle">
  <h1>网站本信息配置</h1>
</div>
<?php
/*
 * 站点基本信息配置
 * @author 梁志平
 * @date 2013-06-17
*/
require '../../configs/config.php';
require '../../configs/function.php';
require '../check.php';
//读取配置信息
function getSiteconfig($db){
	$sql = "select * from ejob_siteconfig  where  configid =  1";
    $result = $db->query($sql);	 
	$site = array();
	$site=$db->fetch_assoc($result);
	return  $site;
	}
$site = array();
$site = getSiteconfig($db);
//更改配置信息
function  updateSiteconfig($db,$table,$data,$condition){
	if($db->update($table,$data,$condition)){
		return "true";
		}
	 else{
		 return "false";
		 }
	}
//根据传递参数来判断
if ($_GET["act"]=="editsave"){
	$table="ejob_siteconfig";
	$data = array("sitename"=>$_POST["sitename"],"siteurl"=>$_POST["siteurl"],"sitekeywords"=>$_POST["sitekeywords"],"sitedescribe"=>$_POST["sitedescribe"],"siteicp"=>$_POST["siteicp"],"siteqq"=>$_POST["siteqq"],"siteclose"=>$_POST["siteclose"],"siteclosenote"=>$_POST["siteclosenote"]);
	$condition="where  configid =  1";
	if (updateSiteconfig($db,$table,$data,$condition)){
		alert("修改成功！", "webconfig.php");
		}
	else{
		alert("修改失败！", "webconfig.php");
		}
	}
?>
<br />
<table class="detail-layout">
  <tbody>
    <tr>
      <th colspan="2">站点信息</th>
    </tr>
  <form action="?act=editsave" id="form1" name="form1" method="post">
    <tr>
      <td width="121" class="a" >名称：</td>
      <td width="836"><input type="text"  class="text-box "  name="sitename"  size="50" value="<?php echo $site["sitename"]?>"/>
        </td>
    </tr>
    <tr>
      <td width="121" class="a" >域名：</td>
      <td width="836"><input type="text"  class="text-box "  name="siteurl"  size="50" value="<?php echo $site["siteurl"]?>"/>
        </td>
    </tr>
    <tr>
      <td width="121" class="a" >关键词：</td>
      <td width="836"><textarea name="sitekeywords"  cols="60" rows="4" class="text-area"><?php echo $site["sitekeywords"]?></textarea> </td>
    </tr>
    <tr>
      <td width="121" class="a" >站点描述：</td>
      <td width="836"><textarea name="sitedescribe"  cols="60" rows="4" class="text-area"><?php echo $site["sitedescribe"]?></textarea>
        </td>
    </tr>
    <tr>
      <td  class="a">网站ICP：</td>
      <td width="836"><input type="text"  class="text-box "  name="siteicp"  size="50" value="<?php echo $site["siteicp"]?>"/></td>
    </tr>
    <tr>
      <td width="121" class="a" >客服QQ：</td>
      <td width="836"><input type="text"  class="text-box "  name="siteqq"  size="50" value="<?php echo $site["siteqq"]?>"/>
        </td>
    </tr>
    <tr>
      <td  class="a">站点状态：</td>
      <td width="836"><input type="radio"  name="siteclose"   value="1" <?php  ckcheck($site["siteclose"],"1") ?>/>
        正常
        <input type="radio"  name="siteclose"  value="0" <?php  ckcheck($site["siteclose"],"0") ?>/>
        关闭 </td>
    </tr>
    <tr>
      <td width="121" class="a" >关闭提示语：</td>
      <td width="836"><textarea name="siteclosenote"  cols="60" rows="4" class="text-area"><?php echo $site["siteclosenote"]?></textarea>
        </td>
    </tr>
    <tr>
      <td colspan="2"  style="padding-left:420px;"><input type="submit" class="btn2" name="submit"  value="提交" onClick="" /></td>
    </tr>
  </form>
  </tbody>
</table>
</body>
</html>
