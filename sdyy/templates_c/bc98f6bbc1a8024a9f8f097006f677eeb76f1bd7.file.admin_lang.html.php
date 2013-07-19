<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 12:09:59
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_lang.html" */ ?>
<?php /*%%SmartyHeaderCode:2398251e8bc17405be2-13287552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc98f6bbc1a8024a9f8f097006f677eeb76f1bd7' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_lang.html',
      1 => 1373962631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2398251e8bc17405be2-13287552',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'class_add' => 0,
    'class_lang' => 0,
    'class_cache_lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8bc1747ca49_02116121',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8bc1747ca49_02116121')) {function content_51e8bc1747ca49_02116121($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加语言包</title>
<link rel="stylesheet" type="text/css" href="template/admin.css" />
<script type="text/javascript" src="template/images/jquery.js"></script>
<script type="text/javascript" src="template/images/admin.js"></script>
<style type="text/css">
body {
	margin: 20px;
}
</style>
</head>

<body>
<div class="div_out">
	<div class="position">
		<h2>当前位置 > 语言管理</h2>
	</div>
</div>
<!--导航-->

<div class="caozuo_nav">
<ul>
	<li class="<?php echo $_smarty_tpl->tpl_vars['class_add']->value;?>
"><a href="?action=add">添加语言</a></li>
	<li class="<?php echo $_smarty_tpl->tpl_vars['class_lang']->value;?>
"><a href="?action=lang">管理语言</a></li>
	<li class="<?php echo $_smarty_tpl->tpl_vars['class_cache_lang']->value;?>
"><a href="?action=cache_lang">更新语言缓存</a></li>
</ul>
<div class="clear"></div>
</div>
<!--小操作导航-->
<form name="maininfo" method="post" enctype="multipart/form-data" class="form">
<div class="div_out" id="tb">
<p><span id="loading" style="display: none"></span></p>
<table cellpadding="0" cellspacing="0" width="100%"
	style="text-align: center">
	<thead>
		<tr>
			<th style="width: 10%;"><span title="鼠标点击数字进行排序" class="help"></span>排序</th>
			<th style="width: 20%;">语言名称</th>
			<th style="width: 20%;">标示</th>
			<th style="width: 10%">是否开启</th>
			<th style="width: 20%;">是否外部链接</th>
			<th style="width: 20%">操作</th>
		</tr>
	</thead>
	<tbody>
		<<?php ?>?php
	if(empty($lang_cache)){
	echo "还没有添加语言";
	exit;
	}
	foreach($lang_cache as $key =>$value){
	?<?php ?>>
		<tr>
			<td style="width: 10%;">
				<span title="鼠标点击修改" style="padding: 0 8px" id="click_ajax"
				onclick="javascript:click_ajax(this,'<<?php ?>?php echo $value['id'];?<?php ?>>','lang','lang_order','');"><<?php ?>?php echo $value['lang_order'];?<?php ?>></span>
			</td>
			<td style="width: 20%; text-align: left">
				<input type="radio"	style="border: 0" name="lang_id[]" value="<<?php ?>?php echo $value['id'];?<?php ?>>"<<?php ?>?php
				if($value['lang_main']){ echo 'checked=checked';}?<?php ?>>/><<?php ?>?php echo $value['lang_name'];?<?php ?>><<?php ?>?php if($value['lang_main']){echo "(默认)";}?<?php ?>>
			</td>
			
			<td style="width: 20%; text-align: center"><<?php ?>?php echo $value['lang_tag'];?<?php ?>></td>
			<td style="width: 10%; text-align: center"><<?php ?>?php if($value['lang_is_use']){ echo "是";}else{ echo "<span style=\"color:red\">否</span>";}?<?php ?>></td>
			<td style="width: 20%; text-align: center"><<?php ?>?php if($value['lang_is_url']){ echo "是";}else{ echo "否";}?<?php ?>></td>
			<td style="width: 20%; text-align: center">
				<a style="padding: 0 5px;" href="admin_lang.php?action=lang_edit&lang=<<?php ?>?php echo $value['lang_tag'];?<?php ?>>">修改</a>|<<?php ?>?php if(!$value['lang_is_fix']){?<?php ?>>
				<a href="javascript:if(confirm('确定要删除么,删除后不可恢复!')){location.href='admin_lang.php?action=lang_dl&lang=<<?php ?>?php echo $value['lang_tag'];?<?php ?>>';}"
					style="padding: 0 5px;">删除</a>|<<?php ?>?php }?<?php ?>>
				<a href="admin_lang.php?action=edit&lang=<<?php ?>?php echo $value['lang_tag'];?<?php ?>>">管理语言包变量</a>
			</td>
		</tr>
		<<?php ?>?php
	}
	?<?php ?>>
	</tbody>
</table>
</div>
	<div class="btn" style="margin-top: 8px; text-align: left;">
		<input type="hidden" name="action" value="lang_main" />
		<input type="submit" value="设置默认语言" style="margin: 0 10px 0 0;" class="go" />
	</div>
</form>
</body>
</html>
<?php }} ?>