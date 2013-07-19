<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 15:15:31
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_book_info.html" */ ?>
<?php /*%%SmartyHeaderCode:1225751e8e79374c639-06084149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a9f3ff14d866864b0a2bd05db72fdcec88b9963' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_book_info.html',
      1 => 1374217751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1225751e8e79374c639-06084149',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'radio_is_book1' => 0,
    'radio_is_book2' => 0,
    'radio_book_pos1' => 0,
    'radio_book_pos0' => 0,
    'radio_book_verify1' => 0,
    'radio_book_verify0' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8e793798789_53601746',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8e793798789_53601746')) {function content_51e8e793798789_53601746($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>设置留言本</title>
<link rel="stylesheet" type="text/css" href="template/admin.css" />
<script type="text/javascript" src="template/images/jquery.js"></script>
<style type="text/css">
body {
	margin: 20px;
}
</style>
</head>

<body>
<div class="div_out">
<div class="position">
<h2>当前位置 > 设置留言本</h2>
</div>
</div>
<!--导航-->
<form name="maininfo" method="post" enctype="multipart/form-data"
	action="?" class="form">
<div class="div_out" id="tb">
<table cellpadding="0" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="w1">参数说明</th>
			<th class="w2">参数值</th>
			<th class="w3">变量名</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="w1">开启留言本:</td>
			<td class="w2">
				<input type="radio" value="1" name="is_book" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_is_book1']->value;?>
" />是
			 	<input type="radio" value="0" name="is_book" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_is_book2']->value;?>
" />否
			 </td>
			<td class="w3"></td>
		</tr>
		<tr>
			<td class="w1">设置位置:</td>
			<td class="w2">
				<input type="checkbox" value="1" name="book_pos[]" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_book_pos1']->value;?>
" />顶部导航
				<input type="checkbox" value="2" name="book_pos[]" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_book_pos0']->value;?>
" />底部导航
			</td>
			<td class="w3"></td>
		</tr>
		<tr>
			<td class="w1">留言审核:</td>
			<td class="w2">
				<input type="radio" value="1" name="book_verify" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_book_verify1']->value;?>
" />是
				<input type="radio" value="0" name="book_verify" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_book_verify0']->value;?>
" />否
			</td>
			<td class="w3"></td>
		</tr>
	</tbody>
</table>
</div>

<div class="btn" style="margin-top: 10px">
	<input type="hidden" name="action" value="save_book_info" />
	<input type="submit" value="确定" class="go" name="submit" />
	<input type="reset" style="margin: 0 10px;"	class="go" value="重置" name="reset" />
</div>
</form>
</body>
</html>
<?php }} ?>