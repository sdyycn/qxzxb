<?php /* Smarty version Smarty-3.1.12, created on 2013-07-18 08:43:40
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\login.html" */ ?>
<?php /*%%SmartyHeaderCode:2878851e73a3cc63545-30442514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15fb71ebc8cdf9c6e942a1373a3db81d7650a2b5' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\login.html',
      1 => 1373937094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2878851e73a3cc63545-30442514',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e73a3cc93ab6_70098306',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e73a3cc93ab6_70098306')) {function content_51e73a3cc93ab6_70098306($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理登陆</title>
<link rel="stylesheet" type="text/css" href="template/admin.css" />
<script type="text/javascript" src="template/images/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#code').click(function() {
			$(this).attr('src', 'admin_code.php?tag=' + new Date().getTime());
		});
	});
</script>
<style type="text/css">
body {
	background: #75cbfa url('template/images/login_bg.gif') repeat-x left
		top;
}

.f {
	margin: 0;
	padding: 0;
	display: block;
}

#code {
	width: 50px;
	display: block;
	float: left;
	margin-right: 3px;
	display: inline;
}

#codeimg {
	display: block;
	float: left;
	cursor: pointer;
}
</style>
</head>

<body>
<div class="login">
	<div class="login_bg">
		<div class="login_bg2">
			<div class="login_title">
			<form name="login" action="?action=login" method="post">
				<div class="login_left">
					<p><label>用户名：</label><input name="user" value="" class="f" /></p>
					<div class="clear"></div>
					<p><label>密码：</label><input type="password" name="password" value=""	class="f" /></p>
					<div class="clear"></div>
					<p><label>验证码：</label>
						<span class="f">
							<input id='code' name="code" value="" />
							<img id='codeimg' src="admin_code.php" border="0" id="code" />
						</span>
					</p>
					<div class="clear"></div>
				</div>
				<div class="login_right">
					<input type="hidden" name="submit" value="true" />
					<input type="image" name="submit" src="template/images/login_btn.gif" />
				</div>
				<div class="clear"></div>
			</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php }} ?>