<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('/configs/config.db.php');
require_once('/include/Page.class.php');

/*/
define('IN_CMS','true');
include('init.php');
$action=isset($action)?$action:'market';
$lang=isset($lang)?$lang:get_lang_main();
if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}
go_url($action);
//*/

function market(){
	global $lang;
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."market where lang='".$lang."' order by market_order desc");
	include('template/admin_market.html');
}

function add(){
	global $lang;
	include('template/admin_market_add.html');
}

function save_add(){
	global $lang,$market_name,$market_type,$market_order,$market_is,$market_num;
	if(empty($lang)){msg('<span style="color:red">参数发生错误，请重新操作</span>');}
	if(empty($market_name)){msg('<span style="color:red">客服名称不能为空</span>');}
	if(empty($market_type)){msg('<span style="color:red">请选择客服类型</span>');}
	if(empty($market_num)){msg('<span style="color:red">客服号码不能为空</span>');}
	if(strlen($market_name)>60||strlen($market_num)>60){
		msg('<span style="color:red">添加写内容过长，请缩短填写</span>');
	}
	if(empty($market_order)){msg('<span style="color:red">排序不能为空</span>');}
	$sql="insert into ".DB_PRE."market (market_name,market_type,market_num,market_order,market_is,lang) values ('".trim($market_name)."',".intval($market_type).",'".trim($market_num)."','".intval($market_order)."',".intval($market_is).",'".$lang."')";
	$GLOBALS['mysql']->query($sql);
	msg('客服【'.$market_name.'】添加完成','?lang='.$lang);
}

function edit(){
	global $lang,$id;
	if(empty($id)){msg('<span style="color:red">参数发生错误,请重新操作</span>');}
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."market where id=".$id);
	include('template/admin_market_edit.html');
}

function save_edit(){
	global $lang,$id,$market_name,$market_type,$market_num,$market_order,$market_is;
	if(empty($id)){msg('<span style="color:red">参数发生错误，请重新操作</span>');}
	if(empty($market_name)){msg('<span style="color:red">客服名称不能为空</span>');}
	if(empty($market_type)){msg('<span style="color:red">请选择客服类型</span>');}
	if(empty($market_num)){msg('<span style="color:red">客服号码不能为空</span>');}
	if(strlen($market_name)>60||strlen($market_num)>60){
		msg('<span style="color:red">添加写内容过长，请缩短填写</span>');
	}
	if(empty($market_order)){msg('<span style="color:red">排序不能为空</span>');}
	$sql="update ".DB_PRE."market set market_name='".trim($market_name)."',market_type=".intval($market_type).",market_num='".$market_num."',market_order='".intval($market_order)."',market_is='".$market_is."' where id=".$id;
	$GLOBALS['mysql']->query($sql);
	msg('客服组【'.$market_name.'】修改成功','?lang='.$lang);
}

function del(){
	global $id,$lang;
	if(empty($id)){msg('<span style="color:red">参数发生错误，请重新操作</span>');}
	$GLOBALS['mysql']->query("delete from ".DB_PRE."market where id=".$id);
	msg('客服组删除成功','?lang='.$lang);
}

class AdminMarketPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_market.html');
	}
	function display(){
		parent::display();
	}
}

$page = new AdminMarketPage;
$page->run();
?>