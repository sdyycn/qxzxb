<?php /* Smarty version Smarty-3.1.12, created on 2013-07-16 08:50:01
         compiled from "E:\workspace\etherjobs\sdyy\admin\templates\login.html" */ ?>
<?php /*%%SmartyHeaderCode:852851e498b9be2105-00487869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77a39a04a76a9c94bdea7ac03c793c28cb6f6b46' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\templates\\login.html',
      1 => 1285970898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '852851e498b9be2105-00487869',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e498b9c6f220_07501670',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e498b9c6f220_07501670')) {function content_51e498b9c6f220_07501670($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理登陆</title>
<link rel="stylesheet" type="text/css" href="template/admin.css"/>
<script type="text/javascript" src="template/images/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#code').click(function(){
$(this).attr('src','admin_code.php?tag='+new Date().getTime());
});
});
</script>
<style type="text/css">
body{background:#75cbfa url('template/images/login_bg.gif') repeat-x left top;}
</style>
</head>

<body>
<div class="login">
<div class="login_bg">
<div class="login_bg2">
<div class="login_title">
<form name="login" action="?action=ck_login" method="post">
<div class="login_left">
<p><label>用户名：</label><input name="user" value="" class="f" /></p><div class="clear"></div>
<p><label>密码：</label><input type="password" name="password" value="" class="f" /></p><div class="clear"></div>
<<?php ?>?php
		if(!empty($_sys['safe_open'])){
		foreach($_sys['safe_open'] as $k=>$v){
		if($v=='3'){
		?<?php ?>>
<p><label>验证码：</label><span class="f" style="margin:0; padding:0; display:block"><input name="code" value="" style="width:50px; display:block; float:left; margin-right:3px; display:inline"/><img style="display:block; float:left; cursor:pointer" src="admin_code.php" border="0" id="code"/></span></p><div class="clear"></div>
<<?php ?>?php }
}
}
?<?php ?>>
</div>
<div class="login_right"><input type="hidden" name="submit" value="true" /><input type="image" name="submit" src="template/images/login_btn.gif" /></div>
<div class="clear"></div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
<?php }} ?>