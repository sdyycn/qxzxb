<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 08:46:34
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_file.html" */ ?>
<?php /*%%SmartyHeaderCode:2052251e88c6a9c4524-37930478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf85a0475b216005d729b80a4af4dbdc657b917d' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_file.html',
      1 => 1288061020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2052251e88c6a9c4524-37930478',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e88c6aa37321_58087256',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e88c6aa37321_58087256')) {function content_51e88c6aa37321_58087256($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目管理</title>
<link rel="stylesheet" type="text/css" href="template/admin.css"/>
<script type="text/javascript" src="template/images/jquery.js"></script>
<style type="text/css">
body{margin:20px;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	
	
});
</script>
</head>

<body>
<div class="div_out">
 <div class="position"><h2>当前位置 > <a href="?">附件管理</a> > <<?php ?>?php echo $path;?<?php ?>></h2></div>
</div><!--导航-->


 

<div id="sys">

<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="width:20%">文件名</th><th style="width:30%">文件大小</th><th style="width:30%">最后修改时间</th><th style="width:20%">操作</th></tr>
	</thead>
	<tbody>
	<<?php ?>?php
	$path_up='';
	if($path!='upload'){
	$path_replace=substr($path,strrpos($path,'/'));
	$path_up=str_replace($path_replace,'',$path);
	}
	?<?php ?>>
	<tr><td style="width:20%;text-align:center" align="center"><a href="?path=<<?php ?>?php echo $path_up;?<?php ?>>">上级目录</a></td><td style="width:30%;text-align:center" align="center"><<?php ?>?php echo empty($arr['size'])?'&nbsp;':$arr['size'];?<?php ?>></td><td scope="width:30%;text-align:center" align="center"><<?php ?>?php echo empty($arr['mtime'])?'&nbsp;':$arr['mtime']?<?php ?>></td><td style="width:20%;text-align:center" align="center">&nbsp;</td></tr>
	<<?php ?>?php
	readdir($file_hand);
	readdir($file_hand);
	while(false!=($file=readdir($file_hand))){
	$arr=get_dir_file($file,$path.'/');
	?<?php ?>>
		<tr><td style="width:20%;text-align:center" align="center"><<?php ?>?php echo $arr['path']?<?php ?>></td><td style="width:30%;text-align:center" align="center"><<?php ?>?php echo empty($arr['size'])?'&nbsp;':$arr['size'];?<?php ?>></td><td style="width:30%;text-align:center"><<?php ?>?php echo $arr['mtime']?<?php ?>></td><td style="width:20%;text-align:center" align="center"><a href="javascript:if(confirm('确定要删除么,删除后不可恢复!')){location.href='?action=del&file=<<?php ?>?php echo $path.'/'.$file;?<?php ?>>';}">删除</a>|<a href="?step=copy&file=<<?php ?>?php echo $file;?<?php ?>>&path=<<?php ?>?php echo $path;?<?php ?>>">复制</a></td></tr>
		<<?php ?>?php 
		}
		?<?php ?>>
		</tbody>
 </table>
 </div>

</div><!--内容切换-->

<div class="page">
 	<ul>
		<li><a href="?step=new_dir&path=<<?php ?>?php echo $path;?<?php ?>>">新建目录</a></li>
		<li><a href="?step=up&path=<<?php ?>?php echo $path;?<?php ?>>">上传文件</a></li>
	</ul>
 </div>

<<?php ?>?php
if($step=='new_dir'){
?<?php ?>>
<p style="line-height:25px;">新建的文件夹将会放在<span style="color:red"><<?php ?>?php echo $path;?<?php ?>></span>目录下</p>
<form name="maininfo" method="post" enctype="multipart/form-data" action="?" class="form" style="margin-top:5px;">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th class="w1">参数说明</th><th class="w2">参数值</th><th class="w3">说明</th></tr>
	</thead>
	<tbody>	
		<tr>
		  <td class="w1">目录名称:</td><td class="w2"><input name="dir_name"  value="" style="width:50%"/></td><td class="w3">只能使用英文和数字,创建后不可更改</td>
		</tr>
	</tbody>
 </table>
 </div>
 <div class="btn" style="margin-top:10px">
<input type="hidden" name="action" value="creat_dir"/><input type="hidden" name="path" value="<<?php ?>?php echo $path;?<?php ?>>" />
  <input type="submit" value="确定" class="go" name="submit"/><input type="reset" style="margin:0 10px;" class="go" value="重置" name="reset"/>
 </div>
</form>
<<?php ?>?php }

if($step=='up'){
?<?php ?>>
<p style="line-height:25px;">新上传的文件将会放在<span style="color:red"><<?php ?>?php echo $path;?<?php ?>></span>目录下</p>
<form name="maininfo" method="post" enctype="multipart/form-data" action="?" class="form" style="margin-top:5px;">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th class="w1">参数说明</th><th class="w2">参数值</th></tr>
	</thead>
	<tbody>	
		<tr>
		  <td class="w1">上传文件:</td><td class="w2"><input type="file" name="up" />文件名称(为空将使用默认,不能重复):<input name="name" value="" /></td>
		</tr>
	</tbody>
 </table>
 </div>
 <div class="btn" style="margin-top:10px">
<input type="hidden" name="action" value="up_load"/><input type="hidden" name="path" value="<<?php ?>?php echo $path;?<?php ?>>" />
  <input type="submit" value="上传" class="go" name="submit"/><input type="reset" style="margin:0 10px;" class="go" value="重置" name="reset"/>
 </div>
</form>
<<?php ?>?php }?<?php ?>>

<<?php ?>?php
if($step=='copy'){
?<?php ?>>
<form name="maininfo" method="post" enctype="multipart/form-data" action="?" class="form" style="margin-top:5px;">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th class="w1">参数说明</th><th class="w2">参数值</th><th class="w3">说明</th></tr>
	</thead>
	<tbody>	
		<tr>
		  <td class="w1">新位置:</td><td class="w2"><select name="dir_to">
		  <<?php ?>?php dir_list('upload');?<?php ?>>
		  </select></td><td class="w3">只能使用英文和数字,创建后不可更改</td>
		</tr>
		<tr>
		  <td class="w1">当前位置:</td><td class="w2"><<?php ?>?php echo $path.'/'.$file_from;?<?php ?>></td><td class="w3"></td>
		</tr>
	</tbody>
 </table>
 </div>
 <div class="btn" style="margin-top:10px">
<input type="hidden" name="action" value="copy_dir"/><input type="hidden" name="dir_from" value="<<?php ?>?php echo $path.'/'.$file_from;?<?php ?>>" />
  <input type="submit" value="确定" class="go" name="submit"/><input type="reset" style="margin:0 10px;" class="go" value="重置" name="reset"/>
 </div>
</form>
<<?php ?>?php }
?<?php ?>>
</body>
</html>
<?php }} ?>