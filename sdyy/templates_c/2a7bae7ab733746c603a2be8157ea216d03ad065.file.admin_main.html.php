<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 16:05:26
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_main.html" */ ?>
<?php /*%%SmartyHeaderCode:454851e8f34690be61-12370974%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a7bae7ab733746c603a2be8157ea216d03ad065' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_main.html',
      1 => 1373945028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '454851e8f34690be61-12370974',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'channel_name' => 0,
    'num' => 0,
    'sum' => 0,
    'form_name' => 0,
    'num2' => 0,
    'id' => 0,
    'cache_language' => 0,
    'cache_category' => 0,
    'cache_channel' => 0,
    'OS' => 0,
    'software' => 0,
    'gdinfo' => 0,
    'safe_mode' => 0,
    'upload_max_filesize' => 0,
    'installdate' => 0,
    'version' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8f34698cfb3_38890158',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8f34698cfb3_38890158')) {function content_51e8f34698cfb3_38890158($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统首页</title>
<link rel="stylesheet" type="text/css" href="template/admin.css"/>
<script type="text/javascript" src="template/images/jquery.js"></script>
<style type="text/css">
body{ margin:20px;}
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
 <div class="position"><h2>当前位置 > 系统首页</h2></div>
</div><!--导航-->
<div class="div_out" id="tb" style="border:none">
	<p class="main_title">统计信息</p>
	<ul class="main_ul">
		<li><div style="float:left; width:100%">
			<span><?php echo $_smarty_tpl->tpl_vars['channel_name']->value;?>
:</span><?php echo $_smarty_tpl->tpl_vars['num']->value;?>
篇&nbsp;累计浏览量:<?php echo $_smarty_tpl->tpl_vars['sum']->value;?>
次
		</div></li>
		<li>
			<span><?php echo $_smarty_tpl->tpl_vars['form_name']->value;?>
:</span>有<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
条表单信息&nbsp;<label><?php echo $_smarty_tpl->tpl_vars['num2']->value;?>
条未阅读</label>
			&nbsp;<a href="admin_form.php?action=form_list&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" target="main">阅读信息</a>
		</li>
	</ul>
	<div class="clear"></div>
	<p class="main_title">缓存信息</p>
	<ul class="main_ul">
		<li><span>语言缓存:</span><?php echo $_smarty_tpl->tpl_vars['cache_language']->value;?>
</li>
		<li><span>栏目缓存:</span><?php echo $_smarty_tpl->tpl_vars['cache_category']->value;?>
</li>
		<li><span>模块缓存:</span><?php echo $_smarty_tpl->tpl_vars['cache_channel']->value;?>
</li>
	</ul>
	<div class="clear"></div>
	<p class="main_title">系统信息</p>
	<ul class="main_ul">
		<li><span>【操作系统】</span><?php echo $_smarty_tpl->tpl_vars['OS']->value;?>
</li>
		<li><span>【web服务器】</span><?php echo $_smarty_tpl->tpl_vars['software']->value;?>
</li>
		<li><span>【GD】</span><?php echo $_smarty_tpl->tpl_vars['gdinfo']->value;?>
</li>
		<li><span>【安全模式】</span><?php echo $_smarty_tpl->tpl_vars['safe_mode']->value;?>
</li>
		<li><span>【上传文件最大值(服务器)】</span><?php echo $_smarty_tpl->tpl_vars['upload_max_filesize']->value;?>
</li>
		<li><span>【安装日期】</span><?php echo $_smarty_tpl->tpl_vars['installdate']->value;?>
</li>
		<li><span>【编码】</span>UTF-8(唯一)</li>
		<li><span>【CMS版本】</span><?php echo $_smarty_tpl->tpl_vars['version']->value;?>
<a href="" style="padding-left:10px;" target="_blank">查看是否有更新</a></li>
	</ul>
</div>

</body>
</html>
<?php }} ?>