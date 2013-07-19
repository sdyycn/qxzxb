<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 16:02:18
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_admin.html" */ ?>
<?php /*%%SmartyHeaderCode:207151e8f28a9f65e2-73679551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd83d58e0e0df948ec8eebb3479c7ce000b6a4c73' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_admin.html',
      1 => 1287786564,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207151e8f28a9f65e2-73679551',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8f28aa41bc0_76937789',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8f28aa41bc0_76937789')) {function content_51e8f28aa41bc0_76937789($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
 <div class="position"><h2>当前位置 > 管理员管理</h2></div>
</div><!--导航-->

<div class="caozuo_nav">
<ul>
<li class="<<?php ?>?php if($GLOBALS['action']=='add'){echo 'hover';}?<?php ?>>"><a href="admin_admin.php?action=add">添加管理员</a></li>
</ul>
<div class="clear"></div>
</div><!--小操作导航-->

<form name="maininfo" method="post" enctype="multipart/form-data" action="#" class="form">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="width:10%">用户名</th><th style="width:20%">管理分组</th><th style="width:40%">管理范围</th><th style="width:10%">状态</th><th style="width:20%">操作</th></tr>
	</thead>
	<tbody style="text-align:center">
	<<?php ?>?php
	if(empty($rel)){
		die('还没有添加管理员');
	}
	foreach($rel as $k=>$v){
	?<?php ?>>
		<tr>
		<td style="width:10%"><<?php ?>?php echo $v['admin_name'];?<?php ?>></td><td style="width:20%">
		<<?php ?>?php
		foreach($admin_group as $key=>$value){
			if($value['id']==$v['admin_purview']){
				echo $value['admin_group_name'];
				break;
			}
		}
		?<?php ?>>
		</td><td style="width:40%;text-align:center"><<?php ?>?php echo "用户昵称:".$v['admin_nich']."&nbsp;&nbsp;用户姓名：".$v['admin_admin'];?<?php ?>></td><td style="width:10%;text-align:center"><<?php ?>?php if($v['is_disable']){echo "禁用";}else{ echo "开启";}?<?php ?>></td><td style="width:20%;text-align:center"><a href="?action=admin_edit&id=<<?php ?>?php echo $v['id'];?<?php ?>>">修改</a>|<a href="javascript:if(confirm('确定要删除么？删除后不可恢复')){location.href='admin_admin.php?action=admin_del&id=<<?php ?>?php echo $v['id'];?<?php ?>>';}">删除</a></td>
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
		<<?php ?>?php echo page('admin_admin.php',$page,$query,$total_num,$total_page);?<?php ?>>
	</ul>
 </div>
</body>
</html>
<?php }} ?>