<?php
/**
 * $Author: BEESCMS $
 * ============================================================================
 * 网站地址: http://www.beescms.com
 * 您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/

define('IN_CMS','true');
include('init.php');
$action=isset($action)?$action:'flash_ad_info';
$lang=isset($lang)?$lang:get_lang_main();
go_url($action);

//网站配置
function flash_ad_info(){
global $lang;
$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."flash_info where lang='".$lang."'");
include('template/admin_flash_ad_info.html');
}

//处理配置信息
function add(){
$lang=$_POST['lang'];
if(empty($lang)){
	msg('<span style="color:red">参数传递错误,请重新操作</span>','?action=flash_ad_info');
}
$flash_width=empty($_POST['flash_ad_width'])?900:intval($_POST['flash_ad_width']);
$flash_height=empty($_POST['flash_ad_height'])?60:intval($_POST['flash_ad_height']);
$flash_style=$_POST['flash_ad_style'];
$rel=$GLOBALS['mysql']->fetch_rows('select id from '.DB_PRE."flash_info where lang='".$lang."'");
if(empty($rel)){
	$sql="insert into ".DB_PRE."flash_info (flash_width,flash_height,flash_style,lang) values ('{$flash_width}','{$flash_height}',{$flash_style},'{$lang}')";
}else{
	$sql="update ".DB_PRE."flash_info set flash_width='{$flash_width}',flash_height='{$flash_height}',flash_style={$flash_style} where lang='{$lang}'";
}
$GLOBALS['mysql']->query($sql);
msg('【'.$lang.'】语言主广告设置完成','?action=flash_ad_info');
}



?>
