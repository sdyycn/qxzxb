<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 12:09:37
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_top.html" */ ?>
<?php /*%%SmartyHeaderCode:2872051e8bc01921818-65013557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bb9be4511d2d0845dfa2f9dde4685f7a5967259' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_top.html',
      1 => 1373963220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2872051e8bc01921818-65013557',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_name' => 0,
    'admin_time' => 0,
    'admin_ip' => 0,
    'this_ip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8bc019b9561_33966742',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8bc019b9561_33966742')) {function content_51e8bc019b9561_33966742($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理后台</title>
<link rel="stylesheet" type="text/css" href="template/admin.css" />
</head>

<body>
<div class="admin_top">
	<div class="top_left">
		<p><a href="" target="_blank"><img src="template/images/logo.gif" border="0" /></a></p>
	</div>
	<div class="top_right">
		<div class="top_right_top"><span>管理员<label><?php echo $_smarty_tpl->tpl_vars['admin_name']->value;?>
</label>欢迎回来</span>
			<span>上次登陆时间:<label style="font-weight: normal"><?php echo $_smarty_tpl->tpl_vars['admin_time']->value;?>
</label></span>
			<span>上次登陆IP:<label style="font-weight: normal"><?php echo $_smarty_tpl->tpl_vars['admin_ip']->value;?>
</label></span>
			<span>本次登陆IP:<label style="font-weight: normal"><?php echo $_smarty_tpl->tpl_vars['this_ip']->value;?>
</label></span>
		</div>
		<div class="top_right_bt">
			<a href="admin_cache.php?action=del_cache_file">清除缓存</a>
			<a href="" target="_blank">官方网站</a>
			<a href="login.php?action=out" target="_top">退出登录</a>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="admin_time">当前时间:<span style="padding-left: 8px;" id=localtime></span> </div>
<script type="text/javascript">
	function showLocale(objD) {
		var str, colorhead, colorfoot;
		var yy = objD.getYear();
		if (yy < 1900)
			yy = yy + 1900;
		var MM = objD.getMonth() + 1;
		if (MM < 10)
			MM = '0' + MM;
		var dd = objD.getDate();
		if (dd < 10)
			dd = '0' + dd;
		var hh = objD.getHours();
		if (hh < 10)
			hh = '0' + hh;
		var mm = objD.getMinutes();
		if (mm < 10)
			mm = '0' + mm;
		var ss = objD.getSeconds();
		if (ss < 10)
			ss = '0' + ss;
		var ww = objD.getDay();
		if (ww == 0)
			colorhead = "<font color=\"#FF0000\">";
		if (ww > 0 && ww < 6)
			colorhead = "<font color=\"#373737\">";
		if (ww == 6)
			colorhead = "<font color=\"#008000\">";
		if (ww == 0)
			ww = "星期日";
		if (ww == 1)
			ww = "星期一";
		if (ww == 2)
			ww = "星期二";
		if (ww == 3)
			ww = "星期三";
		if (ww == 4)
			ww = "星期四";
		if (ww == 5)
			ww = "星期五";
		if (ww == 6)
			ww = "星期六";
		colorfoot = "</font>"
		str = colorhead + yy + "-" + MM + "-" + dd + " " + hh + ":" + mm + ":"
				+ ss + "  " + ww + colorfoot;
		return (str);
	}
	function tick() {
		var today;
		today = new Date();
		document.getElementById("localtime").innerHTML = showLocale(today);
		window.setTimeout("tick()", 1000);
	}
	tick();
</script>
</body>
</html>
<?php }} ?>