<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 16:02:00
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_link_add.html" */ ?>
<?php /*%%SmartyHeaderCode:763651e8f278d43fa1-18750803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '370a27b22231d93f1757010a3173e5174c673cb9' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_link_add.html',
      1 => 1374203267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '763651e8f278d43fa1-18750803',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8f278d8a237_09262229',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8f278d8a237_09262229')) {function content_51e8f278d8a237_09262229($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站配置</title>
<link rel="stylesheet" type="text/css" href="template/admin.css" />
<script type="text/javascript" src="template/images/jquery.js"></script>
<style type="text/css">
body {
	margin: 20px;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('.q').find('ul li').click(function(){
		$index=$('.q').find('ul li').index(this);
		$('#tb').find('div').eq($index).show().siblings().hide();
	});
});
</script>
</head>

<body>
<div class="div_out">
	<div class="position">
		<h2>当前位置 > 网站配置</h2>
	</div>
	<div class="lang">
		<span>当前的语言:</span>
		<a href="?act=list&lang=<?php echo $_smarty_tpl->tpl_vars['lang']->value['id'];?>
" class="hover' >"><?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>
</a>
	</div>
</div>
<!--导航-->
<form name="maininfo" method="post" enctype="multipart/form-data" class="form" action="?">
<div class="div_out" id="tb">
<div id="sys1">
<table cellpadding="0" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="w1">参数说明</th>
			<th class="w2">参数值</th>
			<th class="w3 r">变量名</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="w1" style="text-align: center">网站网址:</td>
			<td class="w2"><input type="text" name="link_url"
				style="width: 80%" value="http://" /></td>
			<td class="w3"></td>
		</tr>
		<tr>
			<td class="w1" style="text-align: center">网站名称:</td>
			<td class="w2"><input type="text" name="link_name"
				style="width: 80%" value="" /></td>
			<td class="w3"></td>
		</tr>
		<tr>
			<td class="w1" style="text-align: center">网站LOGO:</td>
			<td class="w2"><input type="text" name="link_logo"
				style="width: 80%" value="http://" /></td>
			<td class="w3"></td>
		</tr>
		<tr>
			<td class="w1" style="text-align: center">排列顺序:</td>
			<td class="w2"><input type="text" name="link_order"
				style="width: 80%" value="1" /></td>
			<td class="w3"></td>
		</tr>
		<tr>
			<td class="w1" style="text-align: center">网站说明:</td>
			<td class="w2"><textarea name="link_info"
				style="width: 80%; height: 100px;"></textarea></td>
			<td class="w3"></td>
		</tr>
		<tr>
			<td class="w1" style="text-align: center">站长Email:</td>
			<td class="w2"><input type="text" name="link_mail"
				style="width: 80%" value="" /></td>
			<td class="w3"></td>
		</tr>
		<tr>
			<td class="w1" style="text-align: center">链接位置:</td>
			<td class="w2">首页</td>
			<td class="w3"></td>
		</tr>

	</tbody>
</table>
</div>

</div>
<div class="btn" style="margin-top: 10px">
	<input type="hidden" name="action" value="save_add" />
	<input type="hidden" name="lang" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['id'];?>
" /> 
	<input type="submit" value="确定" name="submit" class="go" />
	<input type="reset" style="margin: 0 10px;" class="go" value="重置" name="reset" />
</div>
</form>
</body>
</html>
<?php }} ?>