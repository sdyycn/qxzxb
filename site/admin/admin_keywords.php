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
$action=empty($action)?'keywords':$action;
$lang=isset($lang)?$lang:get_lang_main();
go_url($action);

function keywords(){
	global $lang,$page;
	include('template/admin_keywords.html');
}

function add(){
	global $lang;
	include('template/admin_keywords_add.html');
}

function save_words(){
	global $lang,$key_words,$words_url;
	if(empty($key_words)||empty($words_url)){msg('<span style="color:red">关键词和链接地址不能为空</span>');}
	if(empty($lang)){msg('<span style="color:red">参数传递错误，请重新操作</span>','?action=keywords');}
	$keywords=cn_substr(trim($key_words),60);
	$wordsurl=cn_substr(trim($words_url),60);
	$GLOBALS['mysql']->query('insert into '.DB_PRE."keywords (keywords,wordsurl,lang) values ('{$keywords}','{$wordsurl}','{$lang}')");
	msg('关键词【'.$keywords.'】添加完成','?action=keywords&lang='.$lang);
}
function edit(){
	global $lang,$id;
	if(empty($lang)||empty($id)){msg('<span style="color:red">参数传递错误，请重新操作！</span>');}
	$rel=$GLOBALS['mysql']->fetch_asc('select*from '.DB_PRE.'keywords where id='.$id." and lang='".$lang."'");
	include('template/admin_keywords_edit.html');
}
function save_edit(){
	global $id,$key_words,$words_url,$lang;
	if(empty($id)){msg('<span style="color:red">参数发生错误，请重新操作</span>');}
	if(empty($key_words)||empty($words_url)){msg('<span style="color:red">关键词和链接地址不能为空</span>');}
	$keywords=cn_substr(trim($key_words),60);
	$wordsurl=cn_substr(trim($words_url),60);
	$GLOBALS['mysql']->query("update ".DB_PRE."keywords set keywords='{$keywords}',wordsurl='{$wordsurl}' where id={$id}");
	msg('关键词【'.$keywords.'】修改成功','?action=keywords&lang='.$lang);
}
function del(){
	global $id,$lang;
	$GLOBALS['mysql']->query('delete from '.DB_PRE.'keywords where id='.$id);
	msg('删除完成','?action=keywords&lang='.$lang);
}
?>
