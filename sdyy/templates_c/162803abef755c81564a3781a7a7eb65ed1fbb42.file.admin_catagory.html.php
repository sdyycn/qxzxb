<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 08:44:25
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_catagory.html" */ ?>
<?php /*%%SmartyHeaderCode:758751e88be9ad92e7-37387856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '162803abef755c81564a3781a7a7eb65ed1fbb42' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_catagory.html',
      1 => 1292880912,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '758751e88be9ad92e7-37387856',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e88be9b573a9_22424882',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e88be9b573a9_22424882')) {function content_51e88be9b573a9_22424882($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
function show_list(n){
$(n).parent().parent('#border').parent('#catagory').find('#catagory').toggle();
}
</script>
</head>

<body>
<div class="div_out">
 <div class="position"><h2>当前位置 > <a href="admin_catagory.php">栏目管理</a> > <<?php ?>?php if($parent){echo '下级栏目管理';}else{echo '顶级栏目管理';}?<?php ?>></h2></div>
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
 <li class="<<?php ?>?php if($GLOBALS['action']=='catagory'){echo 'hover';}?<?php ?>>"><a href="?action=catagory&lang=<<?php ?>?php echo $GLOBALS['lang'];?<?php ?>>">管理栏目</a></li>
 <li class="<<?php ?>?php if($GLOBALS['action']=='category_add'){echo 'hover';}?<?php ?>>"><a href="?action=category_add&lang=<<?php ?>?php echo $GLOBALS['lang'];?<?php ?>>">添加顶级栏目</a></li>
 <li class="<<?php ?>?php if($GLOBALS['action']=='cache_cate'){echo 'hover';}?<?php ?>>"><a href="?action=cache_cate&lang=<<?php ?>?php echo $GLOBALS['lang'];?<?php ?>>">更新栏目缓存</a></li>
 <li ><span style="color:#FF0000">可通过‘模板生成管理’——‘输出设置’配置输出栏目内容</span></li>
</ul>
<div class="clear"></div>
</div><!--小操作导航-->
<div class="div_out" id="tb">
<div id="sys">
<form name="maininfo" method="post" enctype="multipart/form-data" class="form">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="text-align:left; padding-left:5px; font-weight:normal">请先添加顶级栏目,如果已经添加了栏目没显示请更新下栏目缓存<span style="color:red;padding-left:15px;">删除栏目将会连同子栏目一起删除</span></th></tr>
	</thead>
	<tbody>

		<tr>
		<td style="border-bottom:none">
		<<?php ?>?php
		if(!empty($cate_list)){
		foreach($cate_list as $key=>$value){
			if($value['cate_parent']==0){
		?<?php ?>>
			<div id="catagory">
			<div id="border" style="border-bottom:1px dashed #ccc; padding:2px 0; ">
				<div class="left" id="show" style="cursor:pointer"><span class="exp" onclick="show_list(this);">&nbsp;</span><span class="cata"><<?php ?>?php echo "<a href=\"".CMS_SELF."show_list.php?id={$value['id']}\" target=\"_blank\">{$value['cate_name']}</a>(<span style=\"color:#999\">排序</span>{$value['cate_order']}&nbsp;<span style=\"color:#999\">模板id</span>:{$value['id']})";
				$cate_nav=empty($value['cate_nav'])?array(''):explode(',',$value['cate_nav']);
				echo in_array('2',$cate_nav)?"<span style=\"color:#3366FF\">导航中部显示</span>":"";
				echo in_array('3',$cate_nav)?"<span style=\"color:#FFCC66\">导航底部显示</span>":"";

				if($value['cate_hide']){
					echo "<span style=\"color:red; padding:0 3px;\">隐藏</span>";
				}
				$href2=($value['cate_channel']==1)?"href=\"admin_content_alone.php?action=content_list\"":"href=\"admin_content.php?action=content_list&id={$value['cate_channel']}&cate={$value['id']}&lang={$value['lang']}\"";
				?<?php ?>></span></div><div class="right"><span class="caozuo"><a href="?action=child&parent=<<?php ?>?php echo $value['id'];?<?php ?>>&channel_id=<<?php ?>?php echo $value['cate_channel'];?<?php ?>>&lang=<<?php ?>?php echo $GLOBALS['lang']?<?php ?>>">增加下级栏目</a>|<a <<?php ?>?php if($value['cate_channel']==1){?<?php ?>>href="admin_content_alone.php?cate_id=<<?php ?>?php echo $value['id'];?<?php ?>>&lang=<<?php ?>?php echo $value['lang'];?<?php ?>>"<<?php ?>?php }else{?<?php ?>>href="admin_content.php?action=add&id=<<?php ?>?php echo $value['cate_channel'];?<?php ?>>&cate=<<?php ?>?php echo $value['id'];?<?php ?>>&lang=<<?php ?>?php echo $lang;?<?php ?>>"<<?php ?>?php }?<?php ?>>>添加内容</a>|<a <<?php ?>?php echo $href2;?<?php ?>>>查看内容</a>|<a href="?action=xg&lang=<<?php ?>?php echo $GLOBALS['lang'];?<?php ?>>&id=<<?php ?>?php echo $value['id'];?<?php ?>>&parent=<<?php ?>?php echo $GLOBALS['parent'];?<?php ?>>">修改栏目</a>|<a href="?action=move_cate&cate=<<?php ?>?php echo $value['id'];?<?php ?>>&lang=<<?php ?>?php echo $lang;?<?php ?>>">移动栏目</a>|<a href="javascript:if(confirm('确定要删除么,删除后不可恢复!')){location.href='admin_catagory.php?action=del&lang=<<?php ?>?php echo $GLOBALS['lang'];?<?php ?>>&id=<<?php ?>?php echo $value['id'];?<?php ?>>&parent=<<?php ?>?php echo $GLOBALS['parent'];?<?php ?>>';}  ">删除栏目</a></span></div>
				<div style="clear:both"></div>
				</div>
				<<?php ?>?php
				$parent_id=$value['id'];
			unset($cate_list[$key]);
			get_cate_list($cate_list,$parent_id,$value['haschild']);
				?<?php ?>>
				
			</div>
			
			<<?php ?>?php
			}
			}
			 }?<?php ?>>
			
		</td>
		</tr>	

	</tbody>
 </table>
  <div class="btn" style="margin-top:10px">
<input type="hidden" name="action" value="add_inc"/><input type="hidden" name="lang" value="<<?php ?>?php echo $lang;?<?php ?>>"/>
 </div>
 </form>
 </div> <!--内容切换-->


 </div>


</body>
</html>
<?php }} ?>