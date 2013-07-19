<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 16:02:04
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_ask.html" */ ?>
<?php /*%%SmartyHeaderCode:2315451e8f27c171808-53158737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd97f67fd774d7854c702b30afd080b1e17d7f5e' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_ask.html',
      1 => 1288125754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2315451e8f27c171808-53158737',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8f27c1c8d61_76931823',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8f27c1c8d61_76931823')) {function content_51e8f27c1c8d61_76931823($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目管理</title>
<link rel="stylesheet" type="text/css" href="template/admin.css"/>
<script type="text/javascript" src="template/images/jquery.js"></script>
<style type="text/css">
body{margin:20px;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('#sl_all').click(function(){
		$('table').find('#all').attr('checked','checked');
	});
	$('#show_list').find('tr').hover(function(){
		$(this).find('td').css('background','#ccffcc');
	},function(){
		$(this).find('td').css('background','');
	});
	
});
</script>
</head>

<body>
<div class="div_out">
 <div class="position"><h2>当前位置 > <a href="?">咨询管理</a> ></h2></div>
</div><!--导航-->

<div id="sys">
<form name="content_list" id="content_list" method="post" action="admin_content.php" class="form" enctype="multipart/form-data">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="width:15%">标题</th><th style="width:15%">添加时间</th><th style="width:30%">咨询内容</th><th style="width:10%">咨询人</th><th style="width:5%">状态</th><th style="width:15%">回复时间</th><th style="width:10%">操作</th></tr>
	</thead>
	<tbody id="show_list">
	<<?php ?>?php
	$maintb=DB_PRE."ask";
	$page=empty($page)?1:$page;
	$pagesize=30;
	$pagenum=($page-1)*$pagesize;
	$filt="";
	$query='&action=ask';
	$total_num=$GLOBALS['mysql']->fetch_rows("select m.id from {$maintb} as m");
	$total_page=ceil($total_num/$pagesize);
	$sql="select m.* from {$maintb} as m order by m.addtime desc limit {$pagenum},{$pagesize}";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	if(!empty($rel)){
	foreach($rel as $key=>$value){
	?<?php ?>>
		<tr><td style="width:15%; text-align:center"><a href="?action=reply&id=<<?php ?>?php echo $value['id'];?<?php ?>>"><<?php ?>?php echo $value['title'];?<?php ?>></a></td><td style="width:15%; text-align:center"><<?php ?>?php echo empty($value['addtime'])?'':date('Y-m-d H:m:s',$value['addtime']);?<?php ?>></td><td style="width:30%;text-align:center"><<?php ?>?php echo cn_substr($value['content'],160);?<?php ?>></td><td style="width:10%;text-align:center"><a href="admin_member.php?action=show&id=<<?php ?>?php echo $value['member'];?<?php ?>>">详细查看</a></td><td style="width:5%; text-align:center"><<?php ?>?php echo empty($value['reply'])?'<span style="color:red">未回复</span>':"已回复";?<?php ?>></td><td style="width:15%;text-align:center"><<?php ?>?php echo empty($value['replytime'])?'':date("Y-m-d H:m:s",$value['replytime']);?<?php ?>></td><td style="width:10%;text-align:center"><a href="javascript:if(confirm('确定要删除么,删除后将不可恢复!')){location.href='?action=del&id=<<?php ?>?php echo $value['id'];?<?php ?>>';}">删除</a>|<a href="?action=reply&id=<<?php ?>?php echo $value['id'];?<?php ?>>">回复查看</a></td></tr>
		<<?php ?>?php }
		}?<?php ?>>
		</tbody>
 </table>
 </div>
</form>
</div><!--内容切换-->

<div class="page">
 	<ul>
		<<?php ?>?php echo page('admin_ask.php',$page,$query,$total_num,$total_page);?<?php ?>>
	</ul>
 </div>

</body>
</html>
<?php }} ?>