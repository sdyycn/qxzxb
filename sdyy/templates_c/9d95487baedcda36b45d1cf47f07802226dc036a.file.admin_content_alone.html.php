<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 08:45:20
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_content_alone.html" */ ?>
<?php /*%%SmartyHeaderCode:3246051e88c202339b4-79183461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d95487baedcda36b45d1cf47f07802226dc036a' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_content_alone.html',
      1 => 1297464092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3246051e88c202339b4-79183461',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e88c202bb462_98378367',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e88c202bb462_98378367')) {function content_51e88c202bb462_98378367($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加单页内容</title>
<link rel="stylesheet" type="text/css" href="template/admin.css"/>
<script type="text/javascript" src="template/images/jquery.js"></script>
<script type="text/javascript" src="template/images/form.js"></script>
<style type="text/css">
body{margin:20px;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('#ex').click(function(){
		$expt=$(this).find('#expt');
		$val=$expt.text();
		if($val=='展开'){
			$('#tb2').show();
			$expt.text('收起');
		}else{
			$('#tb2').hide();
			$expt.text('展开');
		}
	});
	
	
});

function ck_show_url(n,id){
	$ck=$(n).attr('checked');
	if($ck){
		$(id).show();
	}else{
		$(id).hide();
	}
}
</script>
</head>

<body>
<div class="div_out">
 <div class="position"><h2>当前位置 > <a href="#">添加单页内容</a></h2></div>
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
<<?php ?>?php
if(empty($cate_id)){err('请先添加单页模型栏目,如果添加了单页请到单页内容管理修改<a href="admin_catagory.php">添加栏目</a>');}
		if($GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."maintb where category=".$cate_id)){
			$is_add[]=$cate_id;
		}
	foreach($cate_array as $k=>$v){
		if(!empty($is_add)){
	 	if(in_array($v['id'],$is_add)){
	 	unset($cate_array[$k]);
	 	}
	 	}
	}
if(empty($cate_array)){
	echo"请先添加单页频道栏目;已经添加了单页内容请到单页内容管理中修改";
	exit;
}
 foreach($cate_array as $k=>$value){
	
 ?<?php ?>>
 <li class="<<?php ?>?php if($value['id']==$GLOBALS['cate_id']){$cate_name=$value['cate_name'];echo 'hover';}?<?php ?>>"><a href="?lang=<<?php ?>?php echo $value['lang'];?<?php ?>>&cate_id=<<?php ?>?php echo $value['id'];?<?php ?>>"><<?php ?>?php echo $value['cate_name'];?<?php ?>></a></li>
  <<?php ?>?php 
  }
  ?<?php ?>>

</ul>
<div class="clear"></div>
</div><!--小操作导航-->


 
<div id="sys">
<form name="maininfo" method="post" action="?" class="form" enctype="multipart/form-data">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="width:20%">参数说明</th><th style="width:80%">参数值</th></tr>
	</thead>
	<tbody>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">标题：</td><td style="width:80%"><input name="title" value="" class="is_empty" title="标题" style="width:50%" /></td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">标志：</td><td style="width:80%"><input type="checkbox" value="g" style="margin:0 5px;border:0" name="filter_g" onclick="ck_show_url(this,'#g_url');" />跳转</td>
		</tr>
		<tr id="g_url" style="display:none">
		  <td style="width:20%;text-align:center" class="w1"><span title="勾选跳转,将会转入跳转网址" class="help">跳转网址：</span></td><td style="width:80%"><input name="g_url" value="" style="width:20%" /></td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">来源：<p style="color:#ccc; font-weight:normal"></p></td><td style="width:80%"><input name="source" value="未知" style="width:30%" /></td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">作者：<p style="color:#ccc; font-weight:normal"></p></td><td style="width:80%"><input name="author" value="未知" style="width:30%" /></td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1"><span title="默认缩略图,如果为空将会使用内容中的图片做缩略图" class="help"></span>缩略图：</td><td style="width:80%"><input name="thumb" value="" style="width:30%" id="thumb" /><input style="margin-left:5px;" type="button" value="上传图片" name="button" onclick="window.open('upload.php?up_type=pic&lock=1&get=thumb&lang=<<?php ?>?php echo $GLOBALS['lang'];?<?php ?>>','图片上传','width=600,height=200');"/></td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1"><span title="请选择发布栏目,使用频道模板的栏目不可发布" class="help"></span>发布栏目：</td><td style="width:80%">
		 <<?php ?>?php echo $cate_name;?<?php ?>>
		 </td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">页面关键字(SEO)：</td><td style="width:80%"><input name="key_words" value="" style="width:50%" />使用,分割</td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">页面描述(SEO)：<p style="color:#ccc; font-weight:normal"></p></td><td style="width:80%"><textarea name="info" style="width:50%; height:50px;"></textarea><input name="is_info" type="checkbox" style="margin:0 5px;" value="1"  checked="checked"/>提取一部分内容作为描述</td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1"><span title="使用html编辑器时才能使用该功能" class="help"></span>html编辑器选项：</td><td style="width:80%"><input name="down_file" type="checkbox" style="margin:0 5px;border:0" value="1"  checked="checked"/>下载网络图片<input name="first_pic" type="checkbox" style="margin:0 5px;border:0" value="1"  checked="checked"/>使用第一张图片作为缩略图<input name="pic_watermark" type="checkbox" style="margin:0 5px;border:0" value="1"  checked="checked"/>图片是否加水印</td>
		</tr>
		
		
		<<?php ?>?php
		echo content_fields($channel_id);
		?<?php ?>>
		
		<tr>
		  <td class="w1" style="border:0; background:#CAE9FF; cursor:pointer; width:20%; border-top:1px solid #7CC6F9" id="ex">高级配置:[<span id="expt">展开</span>]</td><td style="width:80%;border:0; background:#CAE9FF; border-top:1px solid #7CC6F9"></td>
		</tr>
	</tbody>
	<tbody id="tb2" style="display:none">
		<tr>
		  <td class="w1" style="width:20%;text-align:center">置顶:</td><td style="width:80%"><select name="top">
		  <option value="0">默认置顶</option>
		  <option value="1">置顶三天</option>
		  <option value="2">置顶一周</option>
		  <option value="3">置顶一个月</option>
		  <option value="4">置顶三个月</option>
		  <option value="5">置顶半年</option>
		  </select></td>
		</tr>
		<tr>
		  <td class="w1" style="width:20%;text-align:center">阅读权限:</td><td style="width:80%">
		  <select name="purview">
		  <option value="0">开放浏览</option>
		   <<?php ?>?php
		  $cache_rel=read_cache(DATA_PATH."cache/cache_member_group.php",'member_group');
		  if(!empty($cache_rel)){
			foreach($cache_rel as $k=>$v){
		  ?<?php ?>>
		  <option  value="<<?php ?>?php echo $v['id'];?<?php ?>>"><<?php ?>?php echo $v['member_group_name'];?<?php ?>></option>
		  <<?php ?>?php
		  }
		  }
		  ?<?php ?>>
		  </select></td>
		</tr>
		<tr>
		  <td class="w1" style="width:20%;text-align:center">发布时间:</td><td style="width:80%"><input style="width:30%" value="<<?php ?>?php echo date('Y-m-d H:m:s',time());?<?php ?>>" name="addtime" /></td>
		</tr>
		<tr>
		  <td class="w1" style="width:20%;text-align:center">生成设置:</td><td style="width:80%"><input type="radio" value="0" name="is_html" style="margin:0 5px;border:0" <<?php ?>?php if(!$_confing['web_html'][0]){echo "disabled=\"disabled\" checked=\"checked\"";}else{ echo"checked=\"checked\"";}?<?php ?>> />生成html<input type="radio" value="1" name="is_html" style="margin:0 5px;border:0" <<?php ?>?php if(!$_confing['web_html'][0]){echo "disabled=\"disabled\"";}else{}?<?php ?>>/>动态浏览&nbsp;&nbsp;<<?php ?>?php if(!$_confing['web_html'][0]){echo "<span style=\"color:red\">需要生成html请到'站点设置'中开启该语言的'生成html'功能</span>";}else{}?<?php ?>></td>
		</tr>
		<tr>
		  <td class="w1" style="width:20%;text-align:center">缓存时间:</td><td style="width:80%"><input type="text" name="cache_time" style="width:100px" <<?php ?>?php if(!$_confing['is_cache'][0]){echo 'disabled="disabled"';}?<?php ?>> value="<<?php ?>?php if($_confing['cache_time']){echo $_confing['cache_time'];}else{echo '30';}?<?php ?>>" />秒<span style="color:#FF0000">只能动态页面使用</span></td>
		</tr>
		</tbody>
 </table>
 </div>
 <div class="btn" style="margin-top:10px">
<input type="hidden" name="action" value="save_content"/><input type="hidden" value="<<?php ?>?php echo $cate_id;?<?php ?>>" name="cate_id" /><input type="hidden" value="<<?php ?>?php echo $lang;?<?php ?>>" name="lang"/><input type="hidden" value="<<?php ?>?php echo $channel_id;?<?php ?>>" name="channel_id"/><input type="hidden" name="is_add" value="<<?php ?>?php echo var_export($is_add);?<?php ?>>" />
  <input type="submit" value="确定" class="go" name="submit"/><input type="reset" style="margin:0 10px;" class="go" value="重置" name="reset"/>
 </div>
</form>
</div><!--内容切换-->




</body>
</html>
<?php }} ?>