<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 16:02:14
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_flash_ad.html" */ ?>
<?php /*%%SmartyHeaderCode:1493651e8f286ed0153-90479341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91752afad6d324c4ec32161e09ac54eea64ddefc' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_flash_ad.html',
      1 => 1293495216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1493651e8f286ed0153-90479341',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8f286f2c914_95027170',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8f286f2c914_95027170')) {function content_51e8f286f2c914_95027170($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关键词列表</title>
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
 <div class="position"><h2>当前位置 > 主广告管理</h2></div>
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
</div><!--导航-->
<div class="caozuo_nav">
<ul>
 <li class="<<?php ?>?php if($GLOBALS['action']=='flash_ad'){echo 'hover';}?<?php ?>>"><a href="?action=flash_ad&lang=<<?php ?>?php echo $GLOBALS['lang'];?<?php ?>>">管理主广告</a></li>
 <li class="<<?php ?>?php if($GLOBALS['action']=='add'){echo 'hover';}?<?php ?>>"><a href="?action=add&lang=<<?php ?>?php echo $GLOBALS['lang'];?<?php ?>>">添加主广告</a></li>
</ul>
<div class="clear"></div>
</div><!--小操作导航-->
<form name="maininfo" method="post" enctype="multipart/form-data" class="form">
<div class="div_out" id="tb">
<div id="sys1">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th class="w1" style="width:30%">图片</th><th class="w2" style="width:20%">链接地址</th><th style="width:30%">文字说明</th><th style="width:10%">排序</th><th class="w3 r" style="10%">操作</th></tr>
	</thead>
	<tbody id="show_list">
	<<?php ?>?php
	$maintb=DB_PRE."flash_ad";
	$page=empty($page)?1:$page;
	$pagesize=30;
	$pagenum=($page-1)*$pagesize;
	$filt="m.lang='{$lang}'";
	$query='&lang='.$lang.'&action=flash_ad';
	$order='order by m.id desc';
	$total_num=$GLOBALS['mysql']->fetch_rows("select m.id from {$maintb} as m where {$filt}");
	$total_page=ceil($total_num/$pagesize);
	$sql="select m.* from {$maintb} as m where {$filt} {$order} limit {$pagenum},{$pagesize}";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	if(!empty($rel)){
	foreach($rel as $key=>$value){
	?<?php ?>>
		<tr>
		  <td class="w1" style="text-align:center; width:30%"><<?php ?>?php echo '<a href="../upload/'.$value['pic'].'" target="_blank">'.$value['pic'].'</a>';?<?php ?>></td><td class="w2" style="width:20%; text-align:center"><<?php ?>?php echo $value['pic_url'];?<?php ?>></td><td style="width:30%"><<?php ?>?php echo empty($value['pic_text'])?"&nbsp;":$value['pic_text'];?<?php ?>></th><td style="width:10%"><<?php ?>?php echo $value['pic_order'];?<?php ?>></th><td class="w3" style="text-align:center; width:10%"><a href="?action=edit&lang=<<?php ?>?php echo $lang;?<?php ?>>&id=<<?php ?>?php echo $value['id'];?<?php ?>>">修改</a>|<a href="javascript:if(confirm('确定要删除么,删除后将不可恢复!')){location.href='?action=del&lang=<<?php ?>?php echo $lang;?<?php ?>>&id=<<?php ?>?php echo $value['id'];?<?php ?>>';}">删除</a></td>
		</tr>
	<<?php ?>?php
	}
	}
	?<?php ?>>	
	</tbody>
 </table>
 </div>
 </form>
</div>
<div class="page">
 	<ul>
		<<?php ?>?php echo page('admin_flash_ad.php',$page,$query,$total_num,$total_page);?<?php ?>>
	</ul>
 </div>


</body>
</html>
<?php }} ?>