<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 12:09:54
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_db_backup.html" */ ?>
<?php /*%%SmartyHeaderCode:1981051e8bc12a5a312-73576249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4541a25c19c9a587be3cc1513b9c7f663c10054e' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_db_backup.html',
      1 => 1374199691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1981051e8bc12a5a312-73576249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'files' => 0,
    'f' => 0,
    'backupfile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8bc12abf817_53372744',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8bc12abf817_53372744')) {function content_51e8bc12abf817_53372744($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		$('#show_list').find('tr').hover(function() {
			$(this).find('td').css('background', '#ccffcc');
		}, function() {
			$(this).find('td').css('background', '');
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
		<h2>当前位置 > <a href="#">数据备份</a></h2>
	</div>
	<div class="backup"></div>
</div>
<!--导航-->

<div class="div_out" id="tb" style="margin-top: 20px;">
<form name="maininfo" method="post" action="?action=save_back" class="form">
<table cellpadding="0" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th style="width: 10%">选择</th>
			<th style="width: 25%">表名</th>
			<th style="width: 20%;">记录数</th>
			<th style="width: 20%;">使用空间</th>
			<th style="width: 25%;">更新时间</th>
		</tr>
	</thead>

	<tbody id="show_list">
		<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>
		<tr>
			<td style="width: 10%; text-align: center">
				<input type="checkbox" style="border: 0" checked="checked" value="<<?php ?>?php echo $v['Name'];?<?php ?>>" name="db[]" />
			</td>
			<td style="width: 25%; text-align: center"><?php echo $_smarty_tpl->tpl_vars['f']->value['Name'];?>
</td>
			<td style="width: 20%; text-align: center"><?php echo $_smarty_tpl->tpl_vars['f']->value['Rows'];?>
</td>
			<td style="width: 20%; text-align: center"><?php echo $_smarty_tpl->tpl_vars['f']->value['Data_length'];?>
</td>
			<td style="width: 25%; text-align: center"><?php echo $_smarty_tpl->tpl_vars['f']->value['Update_time'];?>
</td>
		</tr>
		<?php } ?>
		<tr>
			<td style="width: 10%; text-align: center">&nbsp;</td>
			<td style="width: 25%; text-align: center">备份文件名:
				<input type="text" name="fl_name" value="<?php echo $_smarty_tpl->tpl_vars['backupfile']->value;?>
" /></td>
			<td style="width: 20%; text-align: center">&nbsp;</td>
			<td style="width: 20%; text-align: center">&nbsp;</td>
			<td style="width: 25%; text-align: center">&nbsp;</td>
		</tr>
	</tbody>
</table>
	<div class="btn" style="margin-top: 10px">
		<input type="submit" value="确定" class="go" name="submit" />
		<input type="reset"	style="margin: 0 10px;" class="go" value="重置" name="reset" />
	</div>
</form>
</div>
<div class="btn" style="margin-top: 10px"></div>

</body>
</html>
<?php }} ?>