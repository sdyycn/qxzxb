<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 12:10:04
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_info.html" */ ?>
<?php /*%%SmartyHeaderCode:2375251e8bc1c710cf5-51287655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3eb938cfb476065bd687f26cffb2adee688c681b' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_info.html',
      1 => 1373953650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2375251e8bc1c710cf5-51287655',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language' => 0,
    'web_name' => 0,
    'web_url' => 0,
    'web_path' => 0,
    'radio_web_html1' => 0,
    'radio_web_html0' => 0,
    'radio_cache1' => 0,
    'radio_cache0' => 0,
    'cache_time' => 0,
    'web_template' => 0,
    'web_powerby' => 0,
    'web_keywords' => 0,
    'web_description' => 0,
    'web_beian' => 0,
    'web_yinxiao' => 0,
    'hot_key' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8bc1c788e87_93708746',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8bc1c788e87_93708746')) {function content_51e8bc1c788e87_93708746($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站配置</title>
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
 <div class="position"><h2>当前位置 > 网站配置</h2></div>
 <div class="lang"><span>当前的语言:</span><?php echo $_smarty_tpl->tpl_vars['language']->value;?>
</div>
</div><!--导航-->

<form name="maininfo" method="post" enctype="multipart/form-data" class="form">
<div class="div_out" id="tb">
<div id="sys1">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th class="w1">参数说明</th><th class="w2">参数值</th><th class="w3 r">变量名</th></tr>
	</thead>
	<tbody>
		<tr>
		  <td class="w1" style="text-align:center">网站名称:</td>
		  <td class="w2"><input type="text" name="web_name" style="width:80%" value="<?php echo $_smarty_tpl->tpl_vars['web_name']->value;?>
"/></td>
		  <td class="w3">$web_name</td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center"><span title="一般不用修改" class="help">网站网址:</span></td>
		  <td class="w2"><input type="text" name="web_url" style="width:80%" value="<?php echo $_smarty_tpl->tpl_vars['web_url']->value;?>
"/></td>
		  <td class="w3">$web_url</td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center"><span title="一般不用修改" class="help">网站路径:</span></td>
		  <td class="w2"><input type="text" name="web_path" style="width:80%" value="<?php echo $_smarty_tpl->tpl_vars['web_path']->value;?>
"/></td>
		  <td class="w3">$web_path</td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center">是否生成html:</td>
		  <td class="w2">
		  	<input type="radio" value="1" name="web_html[]" style="margin:0 5px; border:0" checked = "<?php echo $_smarty_tpl->tpl_vars['radio_web_html1']->value;?>
" />是
		  	<input type="radio" value="0" name="web_html[]" style="margin:0 5px; border:0" checked = "<?php echo $_smarty_tpl->tpl_vars['radio_web_html0']->value;?>
" />否
		  	</td>
		  <td class="w3">$web_html</td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center">开启缓存:</td>
		  <td class="w2">
		  	<input type="radio" name="is_cache[]" value="1" style="margin:0 5px; border:0" checked="<?php echo $_smarty_tpl->tpl_vars['radio_cache1']->value;?>
" />是
		  	<input type="radio" name="is_cache[]" value="0" style="margin:0 5px; border:0" checked="<?php echo $_smarty_tpl->tpl_vars['radio_cache0']->value;?>
"/>否
		  </td>	  
		  <td class="w3">只能动态页面使用,建议开启</td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center">默认缓存时间:</td>
		  <td class="w2"><input type="text" name="cache_time" style="width:100px" value="<?php echo $_smarty_tpl->tpl_vars['cache_time']->value;?>
" />秒</td>
		  <td class="w3">只能动态页面使用,开启缓存使用</td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center"><span title="更换模板会清空现有模板配置" class="help">模板默认风格:</span></td>
		  <td class="w2">template/<input type="text" name="web_template" style="width:50%" value="<?php echo $_smarty_tpl->tpl_vars['web_template']->value;?>
"/></td>
		  <td class="w3">$web_template</td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center"><span title="支持html代码" class="help">网站版权信息:</span></td>
		  <td class="w2"><textarea name="web_powerby" style="width:95%; height:50px;"><?php echo $_smarty_tpl->tpl_vars['web_powerby']->value;?>
</textarea></td>
		  <td class="w3">$web_powerby</td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center">默认关键字(SEO):</td>
		  <td class="w2"><input type="text" name="web_keywords" style="width:80%" value="<?php echo $_smarty_tpl->tpl_vars['web_keywords']->value;?>
"/></td>
		  <td class="w3">$web_keywords</td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center">站点描述(SEO):</td>
		  <td class="w2"><textarea name="web_description" style="width:95%; height:50px;"><?php echo $_smarty_tpl->tpl_vars['web_description']->value;?>
</textarea></td>
		  <td class="w3">$web_description</td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center"><span title="支持html代码" class="help">网站备案号:</span></td>
		  <td class="w2"><input type="text" name="web_beian" style="width:80%" value="<?php echo $_smarty_tpl->tpl_vars['web_beian']->value;?>
"/></td>
		  <td class="w3">$web_beian</td>
		</tr>
		<tr>
		  <td class="w1" style="text-align:center"><span title="支持html代码" class="help">营销客服代码(如53KF代码):</span></td>
		  <td class="w2"><textarea name="web_yinxiao" style="width:95%; height:50px;"><?php echo $_smarty_tpl->tpl_vars['web_yinxiao']->value;?>
</textarea></td>
		  <td class="w3">$web_yinxiao</td>
		</tr>
		<tr>
		  <td class="w1">热门搜索(用|分开):</td>
		  <td class="w2"><input type="text" style="width:95%;" value="<?php echo $_smarty_tpl->tpl_vars['hot_key']->value;?>
" name="hot_key" /></td>
		  <td class="w3"></td>
		</tr>
	</tbody>
 </table>
 </div>
</div>
<div class="btn" style="margin-top:10px">
	<input type="hidden" name="action" value="add_inc"/>
	<input type="hidden" name="lang" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
"/>
	<input type="submit" value="确定" name="submit" class="go"/>
	<input type="reset" style="margin:0 10px;" class="go" value="重置" name="reset"/>
 </div>
</form>
</body>
</html>
<?php }} ?>