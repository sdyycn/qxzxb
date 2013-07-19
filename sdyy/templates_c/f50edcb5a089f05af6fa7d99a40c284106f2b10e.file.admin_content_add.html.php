<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 08:45:19
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_content_add.html" */ ?>
<?php /*%%SmartyHeaderCode:2892751e88c1f6cf5f1-95263742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f50edcb5a089f05af6fa7d99a40c284106f2b10e' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_content_add.html',
      1 => 1297463612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2892751e88c1f6cf5f1-95263742',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e88c1f756d09_73201123',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e88c1f756d09_73201123')) {function content_51e88c1f756d09_73201123($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目管理</title>
<link rel="stylesheet" type="text/css" href="template/admin.css"/>
<script type="text/javascript" src="template/images/jquery.js"></script>
<script type="text/javascript" src="template/images/form.js"></script>
<style type="text/css">
body{margin:20px;}
.color{ position:relative; width:21px; height:18px; float:left; margin-left:5px; display:inline}
.color span{display:block;width:21px; height:18px; background:url('template/images/color.gif') no-repeat left center;}
.color_table{position:absolute; left:21px; top:18px; border:1px solid #ccc;}
.table_td{border:1px solid #fff; font-style:oblique};
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
	
	$('.color span').click(function(){
				$('#select_color').show().find('td').hover(function(){
					$(this).css({'border-color':'#fff'});
				},function(){
					$(this).css({'border-color':'#ccc'});
				}).click(function(){
					$color=$(this).css('background-color');
					$('.color').css({'background':$color});
					$('#title').css({'color':$color});
					$('#title_color').val($color);
					$('#select_color').hide();
				});
			});	
	
	$('#title_type').change(function(){
		$title_type=$(this).val();
		if($title_type==1){
			$('#title').css({'font-weight':'bold'});
			$('#title').css({'font-style':'normal'});
			$('#title').css({'text-decoration':'none'});
		}else if($title_type==2){
			$('#title').css({'font-style':'italic'});
			$('#title').css({'font-weight':'normal'});
			$('#title').css({'text-decoration':'none'});
		}else if($title_type==3){
			$('#title').css({'text-decoration':'underline'});
			$('#title').css({'font-weight':'normal'});
			$('#title').css({'font-style':'normal'});
		}else{
			$('#title').css({'font-weight':'normal'});
			$('#title').css({'font-style':'normal'});
			$('#title').css({'text-decoration':'none'});
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

function del_pic($pic,$n){
	if($pic==""){alert('不存在该图片,删除失败');return false;}
	$($n).load('admin_ajax.php',{'action':'del_pic','value':$pic},function($data){
		alert($data);
	});
	$($n).parent().remove();
}
</script>
</head>

<body>
<div class="div_out">
 <div class="position"><h2>当前位置 > <a href="#">添加内容</a></h2></div>
 <div class="lang"><span>当前的语言:</span>
 <<?php ?>?php
 $cache_file=DATA_PATH."cache/lang_cache.php";
 $cache_arr=read_cache($cache_file,'lang_cache');
 if(!empty($cache_arr)){
 foreach($cache_arr as $k=>$v){
  if(!$v['lang_is_use']){continue;}
 ?<?php ?>>
 <a href="?action=add&lang=<<?php ?>?php echo $v['lang_tag'];?<?php ?>>" class="<<?php ?>?php if($GLOBALS['lang']==$v['lang_tag']){echo 'hover';}?<?php ?>>"><<?php ?>?php echo $v['lang_name'];?<?php ?>></a>
 <<?php ?>?php
 }
 }
 ?<?php ?>>
</div>
</div><!--导航-->

<div class="caozuo_nav">
<ul>
<<?php ?>?php
if(empty($c_arr)){msg('没有频道,请先添加频道');}
 foreach($c_arr as $key=>$value){
 ?<?php ?>>
 <li class="<<?php ?>?php if($value['id']==$GLOBALS['id']){echo 'hover';}?<?php ?>>"><a href="?lang=<<?php ?>?php echo $lang;?<?php ?>>&action=add&id=<<?php ?>?php echo $value['id'];?<?php ?>>"><<?php ?>?php echo $value['channel_name'];?<?php ?>></a></li>
  <<?php ?>?php }?<?php ?>>

</ul>
<div class="clear"></div>
</div><!--小操作导航-->


 
<div id="sys">
<form name="maininfo" method="post" action="?" class="form">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="width:20%">参数说明</th><th style="width:80%">参数值</th></tr>
	</thead>
	<tbody>
		<tr>
		  <td style="width:20%; text-align:center" class="w1">标题：</td><td style="width:80%"><input name="title" value="" class="is_empty" title="标题" style="width:40%; float:left" id="title" /><input name="title_color" id="title_color" value="" type="hidden" />
		  <div class="color"><span></span>
<table id="select_color" width="100" class="color_table" style="display:none" border="0" cellpadding="0" cellspacing="0">
<tr style="background:#FFFFFF; border:0">
<td style="background:#0000CC;border:1px solid #CCCCCC; padding:2px 5px;">&nbsp;</td>
<td style="background:#00CC66;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#00FFCC;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#996699;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#CC3333;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
</tr>
<tr style="background:#FFFFFF; border:0">
<td style="background:#C0C0C0;border:1px solid #CCCCCC; padding:2px 5px;">&nbsp;</td>
<td style="background:#808080;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#333333;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#FE0000;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#FF00FE;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
</tr>
<tr style="background:#FFFFFF; border:0">
<td style="background:#FFCD00;border:1px solid #CCCCCC; padding:2px 5px;">&nbsp;</td>
<td style="background:#993400;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#FFFFFF;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#99CD00;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#008002;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
</tr>
<tr style="background:#FFFFFF; border:0">
<td style="background:#00CCFF;border:1px solid #CCCCCC; padding:2px 5px;">&nbsp;</td>
<td style="background:#3366FF;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#0000FE;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#010080;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
<td style="background:#CDFFFF;border:1px solid #CCCCCC;padding:2px 5px;">&nbsp;</td>
</tr>
<tbody>
<tr style="background:#FFFFFF; border:0">
<td style="background:#000">&nbsp;</td><td style="background:#000">&nbsp;</td><td style="background:#000">&nbsp;</td><td style="background:#000">&nbsp;</td><td style="background:#000">&nbsp;</td>
</tr>
</tbody>
</table>
</div>
<select name="title_style" id="title_type" style="float:left; margin-left:5px; display:inline">
<option value="0" selected="selected">标题样式</option>
<option value="1">加粗</option>
<option value="2">斜体</option>
<option value="3">下划线</option>
</select>
		  </td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">标志：</td><td style="width:80%"><input name="filter[]" value="a" style="margin:0 5px;border:0" type="checkbox" />头条<input type="checkbox" value="b" style="margin:0 5px;border:0" name="filter[]" />推荐<input type="checkbox" value="c" style="margin:0 5px;border:0" name="filter[]" />图片<input type="checkbox" value="g" style="margin:0 5px;border:0" name="filter_g" onclick="ck_show_url(this,'#g_url');" />跳转</td>
		</tr>
		<tr id="g_url" style="display:none">
		  <td style="width:20%;text-align:center" class="w1"><span title="勾选跳转,将会转入跳转网址" class="help">跳转网址：</span></td><td style="width:80%"><input name="g_url" value="" style="width:20%" /></td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1"><span title="在模板中未使用target属性时才能使用该功能" class="help">新窗口打开：</span></td><td style="width:80%">
		  	<input name="is_open" type="radio" value="0" style="border:0"  checked="checked"/>否<input name="is_open" style="border:0" type="radio" value="1"/>是
		  </td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">来源：<p style="color:#ccc; font-weight:normal"></p></td><td style="width:80%"><input name="source" value="未知" style="width:30%" /></td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">作者：<p style="color:#ccc; font-weight:normal"></p></td><td style="width:80%"><input name="author" value="未知" style="width:30%" /></td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1"><span title="默认缩略图,如果为空将会使用内容中的图片做缩略图" class="help">缩略图：</span></td><td style="width:80%"><input name="thumb" value="" style="width:30%" id="thumb" /><input style="margin-left:5px;" type="button" value="上传图片" name="button" onclick="window.open('upload.php?up_type=pic&lock=1&get=thumb&lang=<<?php ?>?php echo $GLOBALS['lang'];?<?php ?>>','图片上传','width=600,height=200');"/></td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1"><span title="请选择发布栏目,使用频道模板的栏目不可发布" class="help">发布栏目：</span></td><td style="width:80%">
		  <select name="category" id="cate">
		  <option value="">请选择栏目</option>
		  <<?php ?>?php get_post_catelist($lang,$id,$cate_id);?<?php ?>>
		  </select></td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">页面关键字(SEO)：</td><td style="width:80%"><input name="key_words" value="" style="width:50%" />使用,分割</td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">页面描述(SEO)：<p style="color:#ccc; font-weight:normal"></p></td><td style="width:80%"><textarea name="info" style="width:50%; height:50px;"></textarea><input name="is_info" type="checkbox" style="margin:0 5px;border:0" value="1"  checked="checked"/>提取一部分内容作为描述</td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1"><span title="使用html编辑器时才能使用该功能" class="help"></span>html编辑器选项：</td><td style="width:80%"><input name="down_file" type="checkbox" style="margin:0 5px;border:0" value="1"  checked="checked"/>下载网络图片<input name="first_pic" type="checkbox" style="margin:0 5px;border:0" value="1"  checked="checked"/>使用第一张图片作为缩略图<input name="pic_watermark" type="checkbox" style="margin:0 5px;border:0" value="1"  checked="checked"/>图片是否加水印</td>
		</tr>
		
		
		<<?php ?>?php
		echo content_fields($id);
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
		   <option value="0" selected="selected">开放浏览</option>
		   <<?php ?>?php
		  $cache_rel=read_cache(DATA_PATH."cache/cache_member_group.php",'member_group');
		  if(!empty($cache_rel)){
			foreach($cache_rel as $k=>$v){
		  ?<?php ?>>
		  <option value="<<?php ?>?php echo $v['id'];?<?php ?>>"><<?php ?>?php echo $v['member_group_name'];?<?php ?>></option>
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
		  <td class="w1" style="width:20%;text-align:center">生成设置:</td><td style="width:80%"><input type="radio" value="0" name="is_html" style="margin:0 5px;border:0" <<?php ?>?php if(!$_confing['web_html'][0]){echo "disabled=\"disabled\" checked=\"checked\"";}else{ echo"checked=\"checked\"";}?<?php ?>> />生成html<input type="radio" value="1" name="is_html" style="margin:0 5px;border:0" <<?php ?>?php if(!$_confing['web_html'][0]){echo "disabled=\"disabled\"";}else{}?<?php ?>> />动态浏览&nbsp;&nbsp;<<?php ?>?php if(!$_confing['web_html'][0]){echo "<span style=\"color:red\">需要生成html请到'站点设置'中开启该语言的'生成html'功能</span>";}else{}?<?php ?>></td>
		</tr>
		<tr>
		  <td class="w1" style="width:20%;text-align:center">缓存时间:</td><td style="width:80%"><input type="text" name="cache_time" style="width:100px" <<?php ?>?php if(!$_confing['is_cache'][0]){echo 'disabled="disabled"';}?<?php ?>> value="<<?php ?>?php if($_confing['cache_time']){echo $_confing['cache_time'];}else{echo '30';}?<?php ?>>" />秒<span style="color:#FF0000">只能动态页面使用</span></td>
		</tr>
		</tbody>
 </table>
 </div>
 <div class="btn" style="margin-top:10px">
<input type="hidden" name="action" value="save_content"/><input type="hidden" value="<<?php ?>?php echo $id;?<?php ?>>" name="id" /><input type="hidden" value="<<?php ?>?php echo $lang;?<?php ?>>" name="lang"/>
  <input type="submit" value="确定" class="go" name="submit"/><input type="reset" style="margin:0 10px;" class="go" value="重置" name="reset"/>
 </div>
</form>
</div><!--内容切换-->




</body>
</html>
<?php }} ?>