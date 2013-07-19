<?php /* Smarty version Smarty-3.1.12, created on 2013-07-19 16:05:29
         compiled from "E:\workspace\etherjobs\sdyy\admin\template\admin_sys.html" */ ?>
<?php /*%%SmartyHeaderCode:1840251e8f3498785e1-50988232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '963e91090f6c6dc70cd94a769decdc6cecbbef63' => 
    array (
      0 => 'E:\\workspace\\etherjobs\\sdyy\\admin\\template\\admin_sys.html',
      1 => 1373959585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1840251e8f3498785e1-50988232',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_upload_image' => 0,
    'web_upload_file' => 0,
    'thump_width' => 0,
    'thump_height' => 0,
    'upload_size' => 0,
    'radio_web_member1' => 0,
    'radio_web_member0' => 0,
    'radio_is_member1' => 0,
    'radio_is_member0' => 0,
    'radio_member_mail1' => 0,
    'radio_member_mail0' => 0,
    'member_no_name' => 0,
    'radio_image_is1' => 0,
    'radio_image_is0' => 0,
    'radio_image_url_is1' => 0,
    'radio_image_url_is0' => 0,
    'radio_image_type1' => 0,
    'radio_image_type0' => 0,
    'text_mark_style' => 0,
    'image_text' => 0,
    'image_text_color' => 0,
    'image_text_size' => 0,
    'pic_mark_style' => 0,
    'pic_mark_source' => 0,
    'pic_path' => 0,
    'radio_image_position1' => 0,
    'radio_image_position2' => 0,
    'radio_image_position3' => 0,
    'radio_image_position4' => 0,
    'radio_image_position5' => 0,
    'radio_image_position6' => 0,
    'radio_image_position7' => 0,
    'radio_image_position8' => 0,
    'radio_image_position9' => 0,
    'saf_open1' => 0,
    'saf_open2' => 0,
    'saf_open3' => 0,
    'safe_height' => 0,
    'safe_width' => 0,
    'safe_num' => 0,
    'web_pagesize' => 0,
    'web_content_title' => 0,
    'web_content_info' => 0,
    'is_hits' => 0,
    'fialt_words' => 0,
    'radio_arc_html1' => 0,
    'radio_arc_html0' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51e8f349ba0de0_03087457',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8f349ba0de0_03087457')) {function content_51e8f349ba0de0_03087457($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站配置</title>
<link rel="stylesheet" type="text/css" href="template/admin.css" />
<script type="text/javascript" src="template/images/jquery.js"></script>
<style type="text/css">
body {
	margin: 20px;
}
.radio_member {margin: 0 5px; border: 0;}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('.q').find('ul li').click(function() {
			$index = $('.q').find('ul li').index(this);
			$('#tb').find('div').eq($index).show().siblings().hide();
		});
	});

	function mark_text() {
		$('#pic_mark').hide();
		$('#text_mark').show();
	}
	function mark_pic() {
		$('#text_mark').hide();
		$('#pic_mark').show();
	}
</script>
</head>

<body>
<div class="div_out">
	<div class="position">
		<h2>当前位置 > 系统配置</h2>
	</div>
</div>
<!--导航-->

<form name="maininfo" method="post" class="form">
<div class="q" style="margin-top: 20px;">
	<ul>
		<li>附件设置</li>
		<li>会员设置</li>
		<li>图片水印</li>
		<li>验证安全</li>
		<li>其它设置</li>
	</ul>
</div>
<div class="div_out" id="tb">
	<div id="sys1" style="display: block">
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
				<td class="w1">允许上传的图片类型(用|分割):</td>
				<td class="w2"><textarea name="web_upload_image"
					style="width: 95%; height: 50px;"><?php echo $_smarty_tpl->tpl_vars['web_upload_image']->value;?>
</textarea></td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">允许上传的文件类型(用|分割):</td>
				<td class="w2"><textarea name="web_upload_file"	style="width: 95%; height: 50px;"><?php echo $_smarty_tpl->tpl_vars['web_upload_file']->value;?>
</textarea></td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">缩略图默认宽度(px):</td>
				<td class="w2"><input type="text" name="thump_width"
					style="width: 30%" value="<?php echo $_smarty_tpl->tpl_vars['thump_width']->value;?>
" /></td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">缩略图默认高度(px):</td>
				<td class="w2"><input type="text" name="thump_height"
					style="width: 30%" value="<?php echo $_smarty_tpl->tpl_vars['thump_height']->value;?>
" /></td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">允许上传文件的最大值:</td>
				<td class="w2"><input type="text" name="upload_size"
					style="width: 50%" value="<?php echo $_smarty_tpl->tpl_vars['upload_size']->value;?>
" />Bytes</td>
				<td class="w3"></td>
			</tr>
		</tbody>
	</table>
	</div>

	<div id="sys2" style="display: none">
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
				<td class="w1">是否开启会员注册:</td>
				<td class="w2">
					<input type="radio" value="1" name="web_member[]" class='radio_member' checked="<?php echo $_smarty_tpl->tpl_vars['radio_web_member1']->value;?>
"/>是
					<input type="radio" value="0" name="web_member[]" class='radio_member' checked="<?php echo $_smarty_tpl->tpl_vars['radio_web_member0']->value;?>
"/>否
				</td>
				<td class="w3"></td>
			</tr>
			<tr style="display: none">
				<td class="w1">注册审核方式:</td>
				<td class="w2">
					<input type="radio" value="1" name="is_member[]" class='radio_member' checked="<?php echo $_smarty_tpl->tpl_vars['radio_is_member1']->value;?>
" />直接注册
					<input type="radio" value="0" name="is_member[]" class='radio_member' checked="<?php echo $_smarty_tpl->tpl_vars['radio_is_member0']->value;?>
" />审核通过
				</td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">同一邮箱是否可以多次注册:</td>
				<td class="w2">
					<input type="radio" value="1" name="member_mail[]" class='radio_member' checked="<?php echo $_smarty_tpl->tpl_vars['radio_member_mail1']->value;?>
" />是
					<input type="radio" value="0" name="member_mail[]" class='radio_member' checked="<?php echo $_smarty_tpl->tpl_vars['radio_member_mail0']->value;?>
" />否
				</td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">不允许注册的会员名(用|分割):</td>
				<td class="w2"><textarea name="member_no_name" style="width: 95%; height: 50px;"><?php echo $_smarty_tpl->tpl_vars['member_no_name']->value;?>
</textarea></td>
				<td class="w3"></td>
			</tr>
		</tbody>
	</table>
	</div>

	<div id="sys3" style="display: none">
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
				<td class="w1">开启水印:</td>
				<td class="w2">
					<input type="radio" value="1" name="image_is[]" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_is1']->value;?>
" />是
					<input type="radio" value="0" name="image_is[]"	style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_is0']->value;?>
" />否
				</td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">运程下载图片开启水印:</td>
				<td class="w2">
					<input type="radio" value="1" name="image_url_is[]" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_url_is1']->value;?>
" />是
					<input type="radio" value="0" name="image_url_is[]" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_url_is0']->value;?>
" />否
				</td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">水印类型:</td>
				<td class="w2">
				<input type="radio" value="0" name="image_type[]" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_type1']->value;?>
" onclick="mark_text()" />文字
				<input type="radio" value="1" name="image_type[]" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_type0']->value;?>
" onclick="mark_pic();" />图片</td>
				<td class="w3"></td>
			</tr>
			<tbody id="text_mark" style="display:<?php echo $_smarty_tpl->tpl_vars['text_mark_style']->value;?>
" >
				<tr>
					<td class="w1"><span title="目前不支持中文,使用中文请使用图片水印" class="help">水印文字(文字水印):</span></td>
					<td class="w2">
						<input type="text" name="image_text" value="<?php echo $_smarty_tpl->tpl_vars['image_text']->value;?>
" style="width: 50%" />
					</td>
					<td class="w3">&nbsp;</td>
				</tr>
				<tr>
					<td class="w1"><span title="0-255之间的数值,用,分割" class="help">文字颜色(文字水印):</span></td>
					<td class="w2">
						<input type="text" name="image_text_color" value="<?php echo $_smarty_tpl->tpl_vars['image_text_color']->value;?>
" style="width: 50%" />
					</td>
					<td class="w3">&nbsp;</td>
				</tr>
				<tr>
					<td class="w1">文字大小(文字水印):</td>
					<td class="w2">
						<input type="text" name="image_text_size" value="<?php echo $_smarty_tpl->tpl_vars['image_text_size']->value;?>
" style="width: 50%" />
					</td>
					<td class="w3">&nbsp;</td>
				</tr>
			</tbody>
			<tbody id="pic_mark" style="display:<?php echo $_smarty_tpl->tpl_vars['pic_mark_style']->value;?>
" >
				<tr>
					<td class="w1">水印图片:</td>
					<td class="w2"><img	src="<?php echo $_smarty_tpl->tpl_vars['pic_mark_source']->value;?>
" border="0" /></td>
					<td class="w3">&nbsp;</td>
				</tr>
				<tr>
					<td class="w1">上传水印图片:</td>
					<td class="w2">
						<input style="width: 200px;" name="pic"	value="<?php echo $_smarty_tpl->tpl_vars['pic_path']->value;?>
" id="pic_path" />
						<input style="margin-left: 5px;" type="button" name="button" value="上传文件"
						onclick="window.open('upload.php?up_type=pic&get=pic_path&logo=true','文件上传','width=600,height=200');" />
					</td>
					<td class="w3">&nbsp;</td>
				</tr>
			</tbody>
			<tr>
				<td class="w1">水印位置</td>
				<td class="w2">
				<table cellpadding="0" cellspacing="0" width="60%">
					<tr>
						<td width="20%">
							<input type="radio" style="border: 0" name="image_position[]" value="1" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_position1']->value;?>
" />顶部居左
						</td>
						<td width="20%">
							<input type="radio" style="border: 0" name="image_position[]" value="2" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_position2']->value;?>
" />顶部居中
						</td>
						<td width="20%">
							<input type="radio" style="border: 0" name="image_position[]" value="3" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_position3']->value;?>
" />顶部居右
						</td>
					</tr>
					<tr>
						<td width="20%">
							<input type="radio" style="border: 0" name="image_position[]" value="4" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_position4']->value;?>
" />中部居左
						</td>
						<td width="20%">
							<input type="radio" style="border: 0" name="image_position[]" value="5" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_position5']->value;?>
" />中部居中
						</td>
						<td width="20%">
							<input type="radio" style="border: 0" name="image_position[]" value="6" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_position6']->value;?>
" />中部居右
						</td>
					</tr>
					<tr>
						<td width="20%">
							<input type="radio" style="border: 0" name="image_position[]" value="7" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_position7']->value;?>
" />底部居左
						</td>
						<td width="20%">
							<input type="radio" style="border: 0" name="image_position[]" value="8" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_position8']->value;?>
" />底部居中
							</td>
						<td width="20%">
							<input type="radio" style="border: 0" name="image_position[]" value="9" checked="<?php echo $_smarty_tpl->tpl_vars['radio_image_position9']->value;?>
" />底部居右
						</td>
					</tr>
				</table>
				</td>
				<td class="w3"></td>
			</tr>
		</tbody>
	</table>
	</div>

	<div id="sys4" style="display: none">
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
				<td class="w1">开启系统验证码:</td>
				<td class="w2">
					<input type="checkbox" value="1" name="safe_open[]" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['saf_open1']->value;?>
" />会员注册
					<input type="checkbox" value="2" name="safe_open[]" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['saf_open2']->value;?>
" />会员登录
					<input type="checkbox" value="3" name="safe_open[]" style="margin: 0 5px; border: none" checked="<?php echo $_smarty_tpl->tpl_vars['saf_open3']->value;?>
" />管理登录
				</td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">验证码大小:</td>
				<td class="w2">
					高<input type="text" name="safe_height" value="<?php echo $_smarty_tpl->tpl_vars['safe_height']->value;?>
" style="width: 10%; margin: 0 5px;" />
					宽<input type="text"	 name="safe_width"  value="<?php echo $_smarty_tpl->tpl_vars['safe_width']->value;?>
"  style="margin: 0 5px; width: 10%;" />
				</td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">验证码字数:</td>
				<td class="w2">
					<input type="text" width="20%" name="safe_num" value="<?php echo $_smarty_tpl->tpl_vars['safe_num']->value;?>
" />个
				</td>
				<td class="w3"></td>
			</tr>
		</tbody>
	</table>
	</div>

	<div id="sys5" style="display: none">
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
				<td class="w1">列表页显示条数:</td>
				<td class="w2">
					<input name="web_pagesize" value="<?php echo $_smarty_tpl->tpl_vars['web_pagesize']->value;?>
" style="width: 80%;" />
				</td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">内容标题最大长度(10-240之间):</td>
				<td class="w2">
					<input type="text" name="web_content_title"	style="width: 30%" value="<?php echo $_smarty_tpl->tpl_vars['web_content_title']->value;?>
" />
				</td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">内容自动摘要长度(10-240之间):</td>
				<td class="w2">
					<input type="text" name="web_content_info" style="width: 30%" value="<?php echo $_smarty_tpl->tpl_vars['web_content_info']->value;?>
" /></td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">
					默认点击数:<p style="color: #999999; font-weight: normal">为空或0为1-500间的随机数</p>
				</td>
				<td class="w2">
					<input type="text" name="is_hits" style="width: 30%" value="<?php echo $_smarty_tpl->tpl_vars['is_hits']->value;?>
" />
				</td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">过滤词语（词语会被替换成***）用|分开:</td>
				<td class="w2">
					<textarea name="fialt_words" style="width: 95%; height: 50px;"><?php echo $_smarty_tpl->tpl_vars['fialt_words']->value;?>
</textarea></td>
				<td class="w3"></td>
			</tr>
			<tr>
				<td class="w1">发布内容时生成html:</td>
				<td class="w2">
					<input type="radio" name="arc_html[]" value="1" style="border: 0" checked="<?php echo $_smarty_tpl->tpl_vars['radio_arc_html1']->value;?>
" />是
					<input type="radio" name="arc_html[]" value="0" style="border: 0" checked="<?php echo $_smarty_tpl->tpl_vars['radio_arc_html0']->value;?>
" />否
				</td>
				<td class="w3"></td>
			</tr>
	
		</tbody>
	</table>
	</div>
</div>

<div class="btn" style="margin-top: 10px">
	<input type="hidden" name="action" value="add_sys" />
	<input type="submit" name="submit" value="确定" class="go" />
	<input type="reset" name="reset" value="重置" style="margin: 0 10px;" class="go" />
</div>
</form>
</body>
</html>
<?php }} ?>