<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 12:10:00
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_index_info.html" */ ?>
<?php /*%%SmartyHeaderCode:596751e8bc1803ae95-18229794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93cb4d013a7b914240f741d41bd017e36a735bef' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_index_info.html',
      1 => 1374044162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '596751e8bc1803ae95-18229794',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'radio_flash_is1' => 0,
    'radio_flash_is0' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8bc1808a3c8_80123397',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8bc1808a3c8_80123397')) {function content_51e8bc1808a3c8_80123397($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加语言包</title>
<link rel="stylesheet" type="text/css" href="template/admin.css" />
<script type="text/javascript" src="template/images/jquery.js"></script>
<style type="text/css">
body {
	margin: 20px;
}
</style>
</head>

<body>
<div class="div_out">
	<div class="position">
		<h2>当前位置 > 首页配置</h2>
	</div>
</div>
<!--导航-->
<form name="maininfo" method="post" enctype="multipart/form-data"
	action="?" class="form">
<div class="div_out" id="tb">
<table cellpadding="0" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="w1">参数说明</th>
			<th class="w2">参数值</th>
			<th class="w3">变量名</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="w1"><span title="开启该功能，首先进入的是引导页" class="help">开启flash引导页:</span></td>
			<td class="w2">
				<input type="radio" value="1" name="flash_is[]"	style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_flash_is1']->value;?>
" />是
				<input type="radio" value="0" name="flash_is[]" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_flash_is0']->value;?>
" />否
			</td>
			<td class="w3"></td>
		</tr>

		<tr>
			<td class="w1" style="text-align: center"><span
				title="开启引导页，该功能不可用" class="help">首页语言</span>:</td>
			<td class="w2"><select name="index_lang">
				<<?php ?>?php
		  if($lang_cache){
		  	foreach($lang_cache as $k=>$v){
			  if(!$v['lang_is_use']){continue;}
				$ck='';
				if($v['id']==$index_info['index_lang']){$ck="selected=\"selected\"";}
				echo "<option value=\"{$v['id']}\" {$ck}>{$v['lang_name']}</option>";
			}
		  }
		  ?<?php ?>>

			</select></td>
			<td class="w3"></td>
		</tr>

	</tbody>
</table>
</div>
<div class="btn" style="margin-top: 10px">
	<input type="hidden" name="action" value="save_index" />
	<input type="submit" value="确定" class="go" name="submit" />
	<input type="reset" style="margin: 0 10px;"	class="go" value="重置" name="reset" />
</div>
</form>
</body>
</html>
<?php }} ?>