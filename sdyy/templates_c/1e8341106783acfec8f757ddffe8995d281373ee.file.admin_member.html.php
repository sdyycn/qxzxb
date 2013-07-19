<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 16:02:20
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_member.html" */ ?>
<?php /*%%SmartyHeaderCode:1585351e8f28c479539-69343832%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e8341106783acfec8f757ddffe8995d281373ee' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_member.html',
      1 => 1288041426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1585351e8f28c479539-69343832',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8f28c4c3ee9_06694494',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8f28c4c3ee9_06694494')) {function content_51e8f28c4c3ee9_06694494($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理</title>
<link rel="stylesheet" type="text/css" href="template/admin.css"/>
<script type="text/javascript" src="template/images/jquery.js"></script>
<style type="text/css">
body{margin:20px;}
</style>
</head>

<body>
<div class="div_out">
 <div class="position"><h2>当前位置 > 会员管理</h2></div>
</div><!--导航-->

<div class="caozuo_nav">
<ul>
<li class="<<?php ?>?php if($GLOBALS['action']=='add'){echo 'hover';}?<?php ?>>"><a href="admin_member.php?action=add">添加会员</a></li>
</ul>
<div class="clear"></div>
</div><!--小操作导航-->

<form name="maininfo" method="post" enctype="multipart/form-data" action="#" class="form">
<div class="small_nav">
	<ul>
		
	</ul>
</div>
<div class="clear"></div>
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="width:10%">用户名</th><th style="width:20%">管理分组</th><th style="width:40%">管理范围</th><th style="width:10%">状态</th><th style="width:20%">操作</th></tr>
	</thead>
	<tbody style="text-align:center">
	<<?php ?>?php
	if(empty($rel)){
		die('还没有添加会员');
	}
	foreach($rel as $k=>$v){
	?<?php ?>>
		<tr>
		<td style="width:10%; text-align:center"><a href="?action=show&id=<<?php ?>?php echo $v['id'];?<?php ?>>"><<?php ?>?php echo $v['member_user'];?<?php ?>></a></td><td style="width:20%">
		<<?php ?>?php
		foreach($member_group as $key=>$value){
			if($value['id']==$v['member_purview']){
				echo $value['member_group_name'];
				break;
			}
		}
		?<?php ?>>
		</td><td style="width:10%; text-align:center"><<?php ?>?php echo "用户昵称:".$v['member_nich']."&nbsp;&nbsp;用户姓名：".$v['member_name'];?<?php ?>></td><td style="width:10%; text-align:center"><<?php ?>?php if($v['is_disable']){echo "<span style=\"color:red\">禁用</span>";}else{ echo "开启";}?<?php ?>></td><td style="width:20%; text-align:center"><a href="?action=member_edit&id=<<?php ?>?php echo $v['id'];?<?php ?>>" style="padding:0 2px;">修改</a>|<a href="javascript:if(confirm('确定要删除么？删除后不可恢复')){location.href='admin_member.php?action=member_del&id=<<?php ?>?php echo $v['id'];?<?php ?>>';}" style="padding:0 2px;">删除</a></td>
		</tr>
	<<?php ?>?php
	}
	?<?php ?>>	
	</tbody>
 </table>
 </div>
</form>
<div class="page">
 	<ul>
		<<?php ?>?php echo page('admin_member.php',$page,$query,$total_num,$total_page);?<?php ?>>
	</ul>
 </div>
</body>
</html>
<?php }} ?>