<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 12:09:55
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_db_import.html" */ ?>
<?php /*%%SmartyHeaderCode:3249951e8bc13c87926-79843788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cacf340440b6ec530436d31107340b6f78ce48f2' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_db_import.html',
      1 => 1374200856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3249951e8bc13c87926-79843788',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'files' => 0,
    'f' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8bc13cdcc08_08517553',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8bc13cdcc08_08517553')) {function content_51e8bc13cdcc08_08517553($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员</title>
<link rel="stylesheet" type="text/css" href="template/admin.css" />
<script type="text/javascript" src="template/images/jquery.js"></script>
<style type="text/css">
body {
	margin: 20px;
}
</style>
<script type="text/javascript">
	$(document).ready(function() {

		$('tbody').find('tr').hover(function() {
			//$(this).css('background','#ccc');
		}, function() {
			//$(this).css('background','none');
		});

	});

	function all_sl(str) {
		$ck = $('#' + str).attr('checked');
		if ($ck) {
			$('td#' + str).find('input').attr('checked', 'checked');
		} else {
			$('td#' + str).find('input').attr('checked', '');
		}
	}
</script>
</head>

<body>
<div class="div_out">
<div class="position">
<h2>当前位置 > 恢复数据</h2>
</div>
<div class="lang"><span style="color: #FF0000">请先将需要还原的数据上传到data/backup文件下</span>
</div>
</div>
<!--导航-->

<div class="div_out" id="tb">
<table cellpadding="0" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th style="width: 40%">文件名</th>
			<th style="width: 20%">时间</th>
			<th style="width: 20%">大小</th>
			<th style="width: 20%;">操作</th>
		</tr>
	</thead>

	<tbody>
		<form name="maininfo" method="post" action="?act=content_htm" class="form">
		<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>
		<tr>
			<td style="width: 40%; text-align: center"><?php echo $_smarty_tpl->tpl_vars['f']->value['name'];?>
</td>
			<td style="width: 20%; text-align: center"><?php echo $_smarty_tpl->tpl_vars['f']->value['time'];?>
</td>
			<td style="width: 20%; text-align: center"><?php echo $_smarty_tpl->tpl_vars['f']->value['size'];?>
</td>
			<td style="width: 20%; text-align: center">
				<a href="javascript:if(confirm('确定要删除么,删除后将不可恢复!')){location.href='?act=delete&fl=<?php echo $_smarty_tpl->tpl_vars['f']->value['name'];?>
';}"
					style="padding: 0 5px;">删除</a>|
				<a href="javascript:if(confirm('确定要还原么!')){location.href='?act=restore&fl=<?php echo $_smarty_tpl->tpl_vars['f']->value['name'];?>
';}"
					style="padding: 0 5px;">还原数据</a>
			</td>
		</tr>
		<?php } ?>
		</form>
	</tbody>


</table>
</div>
<div class="btn" style="margin-top: 10px"></div>

</body>
</html>
<?php }} ?>