<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 12:10:00
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_market.html" */ ?>
<?php /*%%SmartyHeaderCode:1199651e8bc18a5f6b7-78026718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '478b65336ed826bc01e9ab52681aceddf7268155' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_market.html',
      1 => 1297818608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1199651e8bc18a5f6b7-78026718',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8bc18ac70c9_81641602',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8bc18ac70c9_81641602')) {function content_51e8bc18ac70c9_81641602($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>客服列表</title>
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
 <div class="position"><h2>当前位置 > 客服列表</h2></div>
 <div class="lang"><span>当前的语言:</span>
 <<?php ?>?php
 $cache_file=DATA_PATH."cache/lang_cache.php";
 $cache_arr=read_cache($cache_file,'lang_cache');
 if(!empty($cache_arr)){
 foreach($cache_arr as $k=>$v){
  if(!$v['lang_is_use']){continue;}
 ?<?php ?>>
 <a href="?lang=<<?php ?>?php echo $v['lang_tag'];?<?php ?>>" class="<<?php ?>?php if($GLOBALS['lang']==$v['lang_tag']){echo 'hover';}?<?php ?>>"><<?php ?>?php echo $v['lang_name'];?<?php ?>></a>
 <<?php ?>?php
 }
 }
 ?<?php ?>>
 </div>
<div class="caozuo_nav" style="margin-top:8px;">
<ul>
 <li class="<<?php ?>?php if($GLOBALS['action']=='add'){echo 'hover';}?<?php ?>>"><a href="?action=add&lang=<<?php ?>?php echo $lang;?<?php ?>>">增加客服组</a></li>
 <li ><span style="color:#FF0000">客服添加后在‘模板生成管理’——‘输出设置’配置客服</span></li>
</ul>
<div class="clear"></div>
</div><!--小操作导航-->
<form name="maininfo" method="post" enctype="multipart/form-data" class="form">
<div class="div_out" id="tb">
<div id="sys1">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th class="w1" style="width:5%">排序</th><th class="w2" style="width:25%">客服名称</th><th class="w3 r" style="width:15%">客服类型</th><th style="width:25%">客服号码</th><th style="width:10%">状态</th><th style="width:20%">操作</th></tr>
	</thead>
	<tbody>
	<<?php ?>?php
	if(!empty($rel)){
	foreach($rel as $k=>$v){
	?<?php ?>>
		<tr>
		 <td style="width:5%;text-align:center"><<?php ?>?php echo $v['market_order'];?<?php ?>></td><td style="width:25%;text-align:center"><<?php ?>?php echo $v['market_name'];?<?php ?>></td><td style="width:15%; text-align:center">
		 <<?php ?>?php
		 if($v['market_type']=='1'){
		 	echo 'QQ客服';
		 }elseif($v['market_type']=='2'){
		 	echo '淘宝(阿里)客服';
		 }elseif($v['market_type']=='3'){
		 	echo 'MSN客服';
		 }elseif($v['market_type']=='4'){
		 	echo 'Skype客服';
		 }elseif($v['market_type']=='5'){
		 	echo '联系电话';
		 }elseif($v['market_type']=='6'){
		 	echo '联系手机';
		 }
		 ?<?php ?>></td><td style="width:25%; text-align:center"><<?php ?>?php echo $v['market_num'];?<?php ?>></td><td style="width:10%; text-align:center">
		 <<?php ?>?php
		 if($v['market_is']){
		 	echo '开启';
		 }else{
		 	echo '<span style="color:red">关闭</span>';
		 }
		 ?<?php ?>>
		 </td><td style="width:20%; text-align:center"><a href="?action=edit&lang=<<?php ?>?php echo $lang;?<?php ?>>&id=<<?php ?>?php echo $v['id'];?<?php ?>>">修改</a>|<a href="javascript:if(confirm('确定要删除么')){location.href='?action=del&id=<<?php ?>?php echo $v['id'];?<?php ?>>&lang=<<?php ?>?php echo $lang;?<?php ?>>';}">删除</a></td>
		</tr>
	<<?php ?>?php
	}
	}
	?<?php ?>>
		
	</tbody>
 </table>
 </div>
 
</div>

</form>
</body>
</html>
<?php }} ?>