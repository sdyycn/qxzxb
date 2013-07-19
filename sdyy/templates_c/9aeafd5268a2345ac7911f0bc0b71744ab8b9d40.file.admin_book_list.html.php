<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 15:43:16
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_book_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1948051e8ee14775354-94129099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9aeafd5268a2345ac7911f0bc0b71744ab8b9d40' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_book_list.html',
      1 => 1374219557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1948051e8ee14775354-94129099',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'notes' => 0,
    'note' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8ee14801af0_19739315',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8ee14801af0_19739315')) {function content_51e8ee14801af0_19739315($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>内容管理</title>
<link rel="stylesheet" type="text/css" href="template/admin.css" />
<script type="text/javascript" src="template/images/jquery.js"></script>
<style type="text/css">
body {
	margin: 20px;
}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('#sl_all').click(function() {
			$('table').find('#all').attr('checked', 'checked');
		});
		$('#show_list').find('tr').hover(function() {
			$(this).find('td').css('background', '#ccffcc');
		}, function() {
			$(this).find('td').css('background', '');
		});
	});
	function set_act() {
		alert($('#form1').find('#all').val());
	}
</script>
</head>

<body>
<div class="div_out">
<div class="position">
<h2>当前位置 > <a href="?">内容管理</a></h2>
</div>
<div class="lang">
	<span>当前的语言:</span>
	<a href="guestbook.php?act=list&lang=<?php echo $_smarty_tpl->tpl_vars['lang']->value['id'];?>
" class="hover"><?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>
</a>
</div>
</div>
<!--导航-->

<div id="sys">
<form name="form" id="form1" method="post" action="" class="form">
<div class="div_out" id="tb">
<table cellpadding="0" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th style="width: 5%">选择</th>
			<th style="width: 25%">留言标题</th>
			<th style="width: 15%">添加时间</th>
			<th style="width: 10%">回复</th>
			<th style="width: 30%">留言内容</th>
			<th style="width: 5%">审核</th>
			<th style="width: 10%">操作</th>
		</tr>
	</thead>
	<tbody id="show_list">
		<?php  $_smarty_tpl->tpl_vars['note'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['note']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['note']->key => $_smarty_tpl->tpl_vars['note']->value){
$_smarty_tpl->tpl_vars['note']->_loop = true;
?>
		<tr>
			<td style="width: 5%; text-align: center"><input type="checkbox" id="all" style="border: 0" value="<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
" name="all[]" /></td>
			<td style="width: 25%"><?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
<a href="?act=reply&id=<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['note']->value['title'];?>
</a></td>
			<td style="width: 15%; text-align: center"><?php echo $_smarty_tpl->tpl_vars['note']->value['addtime'];?>
</td>
			<td style="width: 10%; text-align: center"><?php echo $_smarty_tpl->tpl_vars['note']->value['replay'];?>
</td>
			<td style="width: 30%; text-align: center"><?php echo $_smarty_tpl->tpl_vars['note']->value['content'];?>
</td>
			<td style="width: 5%; text-align: center"><?php echo $_smarty_tpl->tpl_vars['note']->value['verify'];?>
</td>
			<td style="width: 10%; text-align: center">
				<a href="javascript:if(confirm('确定要删除么,删除后将不可恢复!')){location.href='?act=delete&lang=<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
'"	style="padding: 0 3px;">删除</a>
				|<a	href="?act=reply&lang=<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
" style="padding: 0 3px;">回复</a>
				|<a href="?act=show&id=<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
">查看</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
<div class="btn" style="margin-top: 8px; text-align: left;">
	<input type="hidden" value="<<?php ?>?php echo $id;?<?php ?>>" name="id" />
	<input type="hidden" value="<<?php ?>?php echo $lang;?<?php ?>>" name="lang" />
	<input type="button" name="all" value="全选" id="sl_all" style="margin: 0 10px 0 0;" class="go" />
	<input type="reset"	style="margin: 0 10px 0 0;" class="go" value="重置" name="reset" />
	<input type="button" onclick="javascript:this.form.action='?action=verify&lang=<<?php ?>?php echo $lang;?<?php ?>>';this.form.submit();" value="审核" name="verify" style="margin: 0 10px 0 0;" class="go" />
	<input type="button" onclick="javascript:if(confirm('确定要删除么,删除后将不可恢复!')){this.form.action='admin_book.php?action=del_all&lang=<<?php ?>?php echo $lang;?<?php ?>>';this.form.submit();}"value="删除" name="button" style="margin: 0 10px 0 0;" class="go" />
</div>
</form>
</div>
<!--内容切换-->

<div class="page">
<ul>
	<li><a href="guestbook.php?page=list&query=xxx&num=xxx&total=xxx">1</a></li>
	<li><a href="guestbook.php?page=list&query=xxx&num=xxx&total=xxx">2</a></li>
	<li><a href="guestbook.php?page=list&query=xxx&num=xxx&total=xxx">3</a></li>
	<li><a href="guestbook.php?page=list&query=xxx&num=xxx&total=xxx">4</a></li>
	<li><a href="guestbook.php?page=list&query=xxx&num=xxx&total=xxx">5</a></li>
</ul>
</div>

</body>
</html>
<?php }} ?>