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
$action=isset($action)?$action:'ask';
$lang=isset($lang)?$lang:get_lang_main();
go_url($action);

function ask(){
if(!check_purview('user_ask')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
include('template/admin_ask.html');
}

function reply(){
if(!check_purview('user_ask')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
global $id;
if(empty($id)){msg("<span style=\"color:red\">参数错误</span>","?");}
$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."ask where id={$id}");
if(empty($rel)){msg("不存在该咨询,可能已经删除","?");}
include('template/admin_ask_reply.html');
}

function save_reply(){
if(!check_purview('user_ask')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
global $id,$reply,$replytime;
if(empty($id)){msg("<span style=\"color:red\">参数错误</span>","?");}
$replytime=empty($replytime)?time():$replytime;
$sql="update ".DB_PRE."ask set reply='{$reply}',replytime='{$replytime}' where id={$id}";
$GLOBALS['mysql']->query($sql);
msg("咨询回复成功","?");
}

function del(){
if(!check_purview('user_ask')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
global $id;
$GLOBALS['mysql']->query("delete from ".DB_PRE."ask where id={$id}");
msg("咨询删除完成","?");
}
?>