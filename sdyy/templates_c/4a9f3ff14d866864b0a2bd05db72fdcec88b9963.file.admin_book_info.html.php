<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 11:53:08
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_book_info.html" */ ?>
<?php /*%%SmartyHeaderCode:3023251e8b824daf880-59078676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a9f3ff14d866864b0a2bd05db72fdcec88b9963' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_book_info.html',
      1 => 1297714784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3023251e8b824daf880-59078676',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8b824e07532_13586790',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8b824e07532_13586790')) {function content_51e8b824e07532_13586790($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>设置留言本</title>
<link rel="stylesheet" type="text/css" href="template/admin.css"/>
<script type="text/javascript" src="template/images/jquery.js"></script>
<style type="text/css">
body{margin:20px;}
</style>
</head>

<body>
<div class="div_out">
 <div class="position"><h2>当前位置 > 设置留言本</h2></div>
</div><!--导航-->
<form name="maininfo" method="post" enctype="multipart/form-data" action="?" class="form">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th class="w1">参数说明</th><th class="w2">参数值</th><th class="w3">变量名</th></tr>
	</thead>
	<tbody>
		<tr>
		  <td class="w1">开启留言本:</td><td class="w2"><input type="radio" value="1" name="is_book" style="margin:0 5px; border:none" <<?php ?>?php if($rel[0]['is_book']){?<?php ?>>checked="checked"<<?php ?>?php }?<?php ?>>/>是<input style="margin:0 5px; border:none" type="radio" value="0" name="is_book" <<?php ?>?php if(!$rel[0]['is_book']){?<?php ?>>checked="checked"<<?php ?>?php }?<?php ?>>/>否</td><td class="w3"></td>
		</tr>
		<tr>
		  <td class="w1">设置位置:</td><td class="w2"><input type="checkbox" value="1" name="book_pos[]" style="margin:0 5px; border:none" <<?php ?>?php if(in_array('1',$book_pos)){?<?php ?>>checked="checked"<<?php ?>?php }?<?php ?>>/>顶部导航<input style="margin:0 5px; border:none" type="checkbox" value="2" name="book_pos[]" <<?php ?>?php if(in_array('2',$book_pos)){?<?php ?>>checked="checked"<<?php ?>?php }?<?php ?>>/>底部导航</td><td class="w3"></td>
		</tr>
		<tr>
		  <td class="w1">留言审核:</td><td class="w2"><input type="radio" value="1" name="book_verify" style="margin:0 5px; border:none" <<?php ?>?php if($rel[0]['book_verify']){?<?php ?>>checked="checked"<<?php ?>?php }?<?php ?>>/>是<input style="margin:0 5px; border:none" type="radio" value="0" name="book_verify" <<?php ?>?php if(!$rel[0]['book_verify']){?<?php ?>>checked="checked"<<?php ?>?php }?<?php ?>>/>否</td><td class="w3"></td>
		</tr>
	</tbody>
 </table>
 </div>
 <div class="btn" style="margin-top:10px">
<input type="hidden" name="action" value="save_book_info"/>
  <input type="submit" value="确定" class="go" name="submit"/><input type="reset" style="margin:0 10px;" class="go" value="重置" name="reset"/>
 </div>
</form>
</body>
</html>
<?php }} ?>