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
$action=isset($action)?$action:'content';
$lang=isset($lang)?$lang:get_lang_main();
go_url($action);

function content(){
	if(!check_purview('content_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	include('template/admin_content_tag.html');
}

function save_content(){
	if(!check_purview('content_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $tag,$content,$lang;
	if(empty($tag)){
		msg('<span style="color:red">标示名称不能为空</span>');
	}
	$tag_num=$GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."block where tag='{$tag}'");
	if($tag_num){msg('<span style="color:red">【'.$tag.'】内容已经存在，请更换</span>');}
	if(file_exists(DATA_PATH."sys_info.php")){include(DATA_PATH."sys_info.php");}
	$tag=empty($_sys['web_content_title'])?cn_substr($tag,60):cn_substr($tag,intval($_sys['web_content_title']));
	//关键字设置
	$key_arr=$GLOBALS['mysql']->fetch_asc('select*from '.DB_PRE."keywords where lang='".$lang."'");
	if(!empty($key_arr)){
		foreach($key_arr as $key_k=>$key_v){
		$content=str_replace($key_v['keywords'],'<a href="'.$key_v['wordsurl'].'">'.$key_v['keywords'].'</a>',$content);
		}
	}
	$sql="insert into ".DB_PRE."block (tag,content) values ('{$tag}','{$content}')";
	$GLOBALS['mysql']->query($sql);
	msg("【{$tag}】内容添加完成");
}

function content_list(){
	global $id;
	include('template/admin_content_tag_list.html');
}
function edit_content(){
	if(!check_purview('content_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(empty($id)){
		msg('<span style="color:red">不存在相关内容</span>');
	}
	$arr=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."block where id={$id}");
	include('template/admin_content_tag_edit.html');
}

function save_edit(){
	if(!check_purview('content_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$tag,$content;
	if(file_exists(DATA_PATH."sys_info.php")){include(DATA_PATH."sys_info.php");}
	$tag=empty($_sys['web_content_title'])?cn_substr($tag,60):cn_substr($tag,intval($_sys['web_content_title']));
	if(empty($id)){msg("参数传递错误,请重新操作");}
	$sql="update ".DB_PRE."block set content='{$content}' where id={$id}";
	$GLOBALS['mysql']->query($sql);
	msg("内容修改完成",'?action=content_list');
}

function del(){	
	if(!check_purview('content_del')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(empty($id)){msg('<span style="color:red">参数错误,请重新操作</span>');}
	$GLOBALS['mysql']->query("delete from ".DB_PRE."block where id={$id}");
	msg('成功删除','admin_content_tag.php?action=content_list');
}
?>