<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('/configs/config.db.php');
require_once('/include/Page.class.php');

/*/
define('IN_CMS','true');
include('init.php');
$action=empty($action)?'flash_ad':$action;
$lang=isset($lang)?$lang:get_lang_main();
go_url($action);
//*/
function flash_ad(){
	global $lang,$page;
	include('template/admin_flash_ad.html');
}

function add(){
	global $lang;
	include('template/admin_flash_ad_add.html');
}

function save_flash_ad(){
	if(empty($_POST['pic'])){msg('<span style="color:red">图片不能为空</span>');}
	if(empty($_POST['lang'])){msg('<span style="color:red">参数传递错误，请重新操作</span>','?action=flash_ad');}
	$lang=$_POST['lang'];
	$pic=cn_substr(trim($_POST['pic']),255);
	$pic_url=cn_substr(trim($_POST['pic_url']),255);
	$pic_text=cn_substr(trim($_POST['pic_text']),255);
	$pic_order=empty($_POST['pic_order'])?10:intval($_POST['pic_order']);
	$GLOBALS['mysql']->query('insert into '.DB_PRE."flash_ad (pic,pic_url,pic_text,pic_order,lang) values ('{$pic}','{$pic_url}','{$pic_text}',{$pic_order},'{$lang}')");
	msg('主广告添加完成','?action=flash_ad&lang='.$lang);
}
function edit(){
	global $lang,$id;
	if(empty($lang)||empty($id)){msg('<span style="color:red">参数传递错误，请重新操作！</span>');}
	$rel=$GLOBALS['mysql']->fetch_asc('select*from '.DB_PRE.'flash_ad where id='.$id." and lang='".$lang."'");
	include('template/admin_flash_ad_edit.html');
}
function save_edit(){
	if(empty($_POST['id'])){msg('<span style="color:red">参数发生错误，请重新操作</span>');}
	if(empty($_POST['pic'])){msg('<span style="color:red">图片不能为空</span>');}
	if(empty($_POST['lang'])){msg('<span style="color:red">参数传递错误，请重新操作</span>','?action=flash_ad');}
	$lang=$_POST['lang'];
	$pic=cn_substr(trim($_POST['pic']),255);
	$pic_url=cn_substr(trim($_POST['pic_url']),255);
	$pic_text=cn_substr(trim($_POST['pic_text']),255);
	$pic_order=empty($_POST['pic_order'])?10:intval($_POST['pic_order']);
	$GLOBALS['mysql']->query("update ".DB_PRE."flash_ad set pic='{$pic}',pic_url='{$pic_url}',pic_text='{$pic_text}',pic_order={$pic_order} where id={$_POST['id']}");
	msg('主广告修改成功','?action=flash_ad&lang='.$lang);
}
function del(){
	global $id,$lang;
	$GLOBALS['mysql']->query('delete from '.DB_PRE.'flash_ad where id='.$id);
	msg('删除完成','?action=flash_ad&lang='.$lang);
}

class AdminFlashAdPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_flash_ad.html');
	}
	function display(){
		parent::display();
	}
}

$page = new AdminFlashAdPage;
$page->run();
?>
