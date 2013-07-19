<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 08:45:20
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_content_tag.html" */ ?>
<?php /*%%SmartyHeaderCode:2178151e88c20c5ee03-07663979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d93c8cc59d4791f03c5e4f85b4c7258322afd34' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_content_tag.html',
      1 => 1289757382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2178151e88c20c5ee03-07663979',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e88c20c9a8e5_42560825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e88c20c9a8e5_42560825')) {function content_51e88c20c9a8e5_42560825($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目管理</title>
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
 <div class="position"><h2>当前位置 > <a href="#">添加标示内容</a></h2></div>
</div><!--导航-->

<div class="caozuo_nav">
<p style="line-height:24px;">标示内容只包含内容，内容形式如:首页简介,联系方式等页面部分需要手工修改的部分信息</p>
<pstyle="line-height:24px;">标示内容调用为:{block source=tag name='标示名称'/}</p>
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
		  <td style="width:20%;text-align:center" class="w1"><span title="请使用汉字、数字、字母,填写后不可更改" class="help">标示名称：</span></td><td style="width:80%"><input name="tag" value="" class="is_empty" title="标示名称" style="width:50%" /></td>
		</tr>
		<tr>
		  <td style="width:20%;text-align:center" class="w1">标示内容：</td><td style="width:80%">
		  <<?php ?>?php
		   $fck=new FCKeditor("content");
	 		$fck->BasePath=FCK_PATH;
	 		$fck->Width='100%';
	 		$fck->Height='500';
	 		$fck->ToolbarSet	= "Default" ;
	 		$fck->Value='';
	 		$fck->Create();
		  ?<?php ?>>
		  </td>
		</tr>

		
		
		</tbody>
 </table>
 </div>
 <div class="btn" style="margin-top:10px">
<input type="hidden" name="action" value="save_content"/>
  <input type="submit" value="确定" class="go" name="submit"/><input type="reset" style="margin:0 10px;" class="go" value="重置" name="reset"/>
 </div>
</form>
</div><!--内容切换-->




</body>
</html>
<?php }} ?>