<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('/configs/config.db.php');
require_once('/include/Page.class.php');

/*/
define('IN_CMS','true');
include('init.php');
$action=isset($action)?$action:'flash_ad_info';
$lang=isset($lang)?$lang:get_lang_main();
go_url($action);
//*/

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


class AdminFlashAdInfoPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_flash_ad_info.html');
	}
	function display(){
		parent::display();
	}
}

$page = new AdminFlashAdInfoPage;
$page->run();

?>
