<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 16:02:15
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_flash_ad_info.html" */ ?>
<?php /*%%SmartyHeaderCode:2244951e8f287af4d63-34246518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66800e3c2fb9f889f491379f5964583061811000' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_flash_ad_info.html',
      1 => 1293661644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2244951e8f287af4d63-34246518',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8f287b71cc8_50104897',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8f287b71cc8_50104897')) {function content_51e8f287b71cc8_50104897($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主广告设置</title>
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
 <div class="position"><h2>当前位置 > 主广告设置</h2></div>
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
<form name="maininfo" method="post" enctype="multipart/form-data" action="?" class="form">
<div class="div_out" id="tb">
<div id="sys1">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th class="w1">参数说明</th><th class="w2">参数值</th><th class="w3 r">变量名</th></tr>
	</thead>
	<tbody>
		<tr>
		  <td class="w1" style="text-align:center">主广告宽度:</td><td class="w2"><input type="text" name="flash_ad_width" style="width:20%" value="<<?php ?>?php echo isset($rel[0]['flash_width'])?$rel[0]['flash_width']:950;?<?php ?>>"/>px</td><td class="w3"></td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center">主广告高度:</td><td class="w2"><input type="text" name="flash_ad_height" style="width:20%" value="<<?php ?>?php echo isset($rel[0]['flash_height'])?$rel[0]['flash_height']:200;?<?php ?>>"/>px</td><td class="w3"></td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center">主广告样式:</td><td class="w2">
		  <<?php ?>?php
		  $flash_style=isset($rel[0]['flash_style'])?$rel[0]['flash_style']:1;
		  ?<?php ?>>
		  <select name="flash_ad_style">
		  <option value="1" <<?php ?>?php echo ($flash_style==1)?'selected="selected"':'';?<?php ?>>>样式1</option>
		  <option value="2" <<?php ?>?php echo ($flash_style==2)?'selected="selected"':'';?<?php ?>>>样式2</option>
		  <option value="3" <<?php ?>?php echo ($flash_style==3)?'selected="selected"':'';?<?php ?>>>样式3</option>
		  <option value="4" <<?php ?>?php echo ($flash_style==4)?'selected="selected"':'';?<?php ?>>>样式4</option>
		  </select>
		  </td><td class="w3"></td>
		</tr>
	</tbody>
 </table>
 </div>
 
</div>
<div class="btn" style="margin-top:10px">
<input type="hidden" name="action" value="add"/><input type="hidden" name="lang" value="<<?php ?>?php echo $lang;?<?php ?>>"/>
  <input type="submit" value="确定" name="submit" class="go"/><input type="reset" style="margin:0 10px;" class="go" value="重置" name="reset"/>
 </div>
</form>
</body>
</html>
<?php }} ?>