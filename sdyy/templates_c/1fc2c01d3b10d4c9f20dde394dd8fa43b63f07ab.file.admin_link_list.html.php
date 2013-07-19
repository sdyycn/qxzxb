<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 11:40:21
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_link_list.html" */ ?>
<?php /*%%SmartyHeaderCode:3160551e8b525426444-95703227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fc2c01d3b10d4c9f20dde394dd8fa43b63f07ab' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_link_list.html',
      1 => 1374205033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3160551e8b525426444-95703227',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'links' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8b525496094_77824014',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8b525496094_77824014')) {function content_51e8b525496094_77824014($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	$('#sl_all').click(function(){
		$('table').find('#all').attr('checked','checked');
	});
	
});
</script>
</head>

<body>
<div class="div_out">
<div class="position">
	<h2>当前位置 ><a href="?">链接管理</a> ></h2></div>
	<div class="lang">
		<span>当前的语言:</span>
		<a href="?act=list&lang=<?php echo $_smarty_tpl->tpl_vars['lang']->value['id'];?>
" class="hover' >"><?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>
</a>
	</div>
</div><!--导航-->

<div id="sys">
<form name="content_list" id="content_list" method="post" action="admin_content.php" class="form" enctype="multipart/form-data">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="width:20%">网站名称</th><th style="width:15%">添加时间</th><th style="width:35%">网站说明</th><th style="width:10%">站长mail</th><th style="width:10%">排序</th><th style="width:10%">操作</th></tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
		<tr>
			<td style="width:20%; text-align:center"><a href='', target="_blank"><?php echo $_smarty_tpl->tpl_vars['link']->value['name'];?>
</a></td>
			<td style="width:15%; text-align:center"><?php echo $_smarty_tpl->tpl_vars['link']->value['addtime'];?>
</td>
			<td style="width:35%;text-align:center"><?php echo $_smarty_tpl->tpl_vars['link']->value['info'];?>
</td>
			<td style="width:10%;text-align:center"><?php echo $_smarty_tpl->tpl_vars['link']->value['mail'];?>
</td>
			<td style="width:10%;text-align:center"><?php echo $_smarty_tpl->tpl_vars['link']->value['order'];?>
</td>
			<td style="width:10%;text-align:center">
				<a href="javascript:if(confirm('确定要删除么,删除后将不可恢复!')){location.href='?act=delete&lang=<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['link']->value['id'];?>
;}">删除</a>
				|<a href="?act=edit&lang=<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['link']->value['id'];?>
">修改</a></td>
		</tr>
		<?php } ?>
		</tbody>
 </table>
 </div>
</form>
</div><!--内容切换-->

<div class="page">
 	<ul>
 		<li><a href='adminlink.php?page=xx&query=xx&totoal=xx&topage=xx'>Prev Page</a></li>
		<li><a href='adminlink.php?page=xx&query=xx&totoal=xx&topage=xx'>1</a></li>
		<li><a href='adminlink.php?page=xx&query=xx&totoal=xx&topage=xx'>2</a></li>
		<li><a href='adminlink.php?page=xx&query=xx&totoal=xx&topage=xx'>3</a></li>
		<li><a href='adminlink.php?page=xx&query=xx&totoal=xx&topage=xx'>4</a></li>
		<li><a href='adminlink.php?page=xx&query=xx&totoal=xx&topage=xx'>Next Page</a></li>
	</ul>
 </div>

</body>
</html>
<?php }} ?>