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
$action=isset($action)?$action:'link_list';
$lang=isset($lang)?$lang:get_lang_main();
go_url($action);

function add(){
if(!check_purview('link_add')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
global $lang;
 include('template/admin_link_add.html');
}

function save_add(){
if(!check_purview('link_add')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
global $lang,$link_url,$link_name,$link_logo,$link_order,$link_info,$link_mail;
if(empty($lang)){msg("<span style=\"color:red\">【语言】参数发生错误</span>");}
if(empty($link_url)){msg("<span style=\"color:red\">【网站网址】不能为空</span>");}
if(empty($link_name)){msg("<span style=\"color:red\">【网站名称】不能为空</span>");}
$link_order=empty($link_order)?1:$link_order;
$sql="insert into ".DB_PRE."link (link_url,link_name,link_logo,link_order,link_info,link_mail,lang,addtime) values ('{$link_url}','{$link_name}','{$link_logo}',{$link_order},'{$link_info}','{$link_mail}','{$lang}','".time()."')";
$GLOBALS['mysql']->query($sql);
msg("【{$link_name}】网站链接添加成功","?");
}

function link_list(){
	global $lang;
	include('template/admin_link_list.html');
}

function edit_link(){
	if(!check_purview('link_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$id;
	if(empty($id)||empty($lang)){msg("<span style=\"color:red\">参数发生错误,请重新操作</span>");}
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."link where id={$id} and lang='{$lang}'");
	if(empty($rel)){msg("不存在该链接,可能已经被删除","?");}
	include('template/admin_link_edit.html');
}

function save_edit(){
	if(!check_purview('link_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$link_url,$link_name,$link_logo,$link_order,$link_info,$link_mail,$id;
	if(empty($id)||empty($lang)){msg("<span style=\"color:red\">参数发生错误,请重新操作</span>");}
	if(empty($link_url)){msg("<span style=\"color:red\">【网站网址】不能为空</span>");}
	if(empty($link_name)){msg("<span style=\"color:red\">【网站名称】不能为空</span>");}
	$link_order=empty($link_order)?1:$link_order;
	$link_info=empty($link_info)?'':cn_substr($link_info,255);
	$sql="update ".DB_PRE."link set link_url='{$link_url}',link_name='{$link_name}',link_logo='{$link_logo}',link_order={$link_order},link_info='{$link_info}',link_mail='{$link_mail}' where id={$id} and lang='{$lang}'";
	$GLOBALS['mysql']->query($sql);
	msg("【{$link_name}】网站链接修改成功",'?action=link_list');
}

function del(){
	if(!check_purview('link_del')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$id;
	if(empty($id)||empty($lang)){msg("<span style=\"color:red\">参数发生错误,请重新操作</span>");}
	$GLOBALS['mysql']->query("delete from ".DB_PRE."link where id={$id} and lang='{$lang}'");
	msg("成功删除链接",'?');
}
?>