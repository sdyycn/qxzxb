<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 12:09:37
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_left.html" */ ?>
<?php /*%%SmartyHeaderCode:926151e8bc0196ad48-73407819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '690142fd874cfe20b6dd41d7b06ee03be78adb6b' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_left.html',
      1 => 1374206583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '926151e8bc0196ad48-73407819',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8bc0199dca6_57084290',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8bc0199dca6_57084290')) {function content_51e8bc0199dca6_57084290($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理栏目</title>
<link rel="stylesheet" type="text/css" href="template/admin.css"/>
<script type="text/javascript" src="template/images/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('h2').click(function(){
		$rel=$(this).attr('rel');
		$('ul').slideUp('fast');
		$('#'+$rel).slideDown('fast');
	});
});
</script>
<style type="text/css">
body{background:#a8d0f2}
</style>
</head>

<body>
<div class="left_contain">
 <div class="left_top">
 	<p>
 		<a href="admin_main.php" target="main" style="padding-right:8px; color:#FFFFFF">系统首页</a>
 		<a href="../index.php" target="_blank" style="padding-right:8px; color:#FFFFFF">网站主页</a>
 	</p>
 </div>
 <h2 rel="id1_ul"><p><span>网站设置</span></p></h2>
 <ul id="id1_ul" style="display:none">
  <li><a href="adminsite.php?page=info" target="main">站点设置</a></li>
  <li><a href="adminsite.php?page=sys" target="main">系统设置</a></li>
  <li><a href="adminsite.php?page=lang" target="main">语言设置</a></li>
  <li><a href="adminsite.php?page=home" target="main">首页设置</a></li>
  <li><a href="adminsite.php?page=market" target="main">营销工具</a></li>
  <li><a href="adminsite.php?page=keywords" target="main">关键词设置</a></li>
  <li><a href="adminsite.php?page=flash" target="main">首页主广告管理</a></li>
  <li><a href="admin_flash_ad_info.php" target="main">首页主广告设置</a></li>
 </ul>
 <h2 rel="id2_ul"><p><span>内容管理</span></p></h2>
 <ul id="id2_ul" >
  <li><a href="admin_catagory.php" target="main">栏目管理</a></li>
  <li><a href="admin_content.php?action=add" target="main">添加内容</a></li>
  <li><a href="admin_content_alone.php" target="main">添加单页内容</a></li>
  <li><a href="admin_content_tag.php" target="main">添加标示内容</a></li>
  <li><a href="admin_content.php?action=content_list" target="main">内容管理</a></li>
  <li><a href="admin_content_alone.php?action=content_list" target="main">单页内容管理</a></li>
  <li><a href="admin_content_tag.php?action=content_list" target="main">标示内容管理</a></li>
  <li><a href="admin_file.php" target="main">上传附件管理</a></li>
 </ul>
 <h2 rel="id4_ul"><p><span>用户管理</span></p></h2>
 <ul id="id4_ul" style="display:none">
  <li><a href="admin_admin.php" target="main">管理员管理</a></li>
  <li><a href="admin_admin.php?action=admin_group" target="main">管理员分组</a></li>
  <li><a href="admin_member.php" target="main">会员管理</a></li>
  <li><a href="admin_member.php?action=member_group" target="main">会员分组</a></li>
 </ul>

 <h2 rel="id7_ul"><p><span>咨询管理</span></p></h2>
 <ul id="id7_ul" style="display:none">
  <li><a href="admin_ask.php" target="main">咨询管理</a></li>
 </ul>
 <h2 rel="id8_ul"><p><span>友情链接</span></p></h2>
 <ul id="id8_ul" style="display:none">
  <li><a href="adminlink.php?page=add" target="main">添加链接</a></li>
  <li><a href="adminlink.php?page=list" target="main">管理链接</a></li>
 </ul>
 <h2 rel="id9_ul"><p><span>数据管理</span></p></h2>
 <ul id="id9_ul" style="display:none">
  <li><a href="admindb.php" target="main">备份数据</a></li>
  <li><a href="admindb.php?page=restore" target="main">恢复数据</a></li>
 </ul>
 <h2 rel="id10_ul"><p><span>留言管理</span></p></h2>
 <ul id="id10_ul" style="display:none">
  <li><a href="admin_book.php?action=made" target="main">设置</a></li>
  <li><a href="admin_book.php" target="main">管理留言</a></li>
 </ul>
 <div class="left_top" style="height:100px;border-bottom:1px solid #aaa;">
 	<p style=" height:98px;">power by <a href="" target="_blank">CMS</a></p>
 </div>
</div>
</body>
</html>
<?php }} ?>