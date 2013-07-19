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
$action=isset($action)?$action:'template';
$lang=isset($lang)?$lang:get_lang_main();
go_url($action);

function template(){
	if(!check_purview('tpl_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$path,$step;
	if(file_exists(DATA_PATH.$lang.'_info.php')){
		include(DATA_PATH.$lang.'_info.php');
	}
	if(empty($_confing['web_template'])){
		err("请先在网站配置栏目配置【{$lang}】语言模板目录");
	}
	$path=empty($path)?'template'.'/'.$_confing['web_template']:$path;
	if(!$file_hand=@opendir(CMS_PATH.$path)){
		err("模板目录打开失败,请检查【{$lang}】语言模板目录【{$_confing['web_template']}】");
	}
	
	include("template/admin_template.html");
	
}

function xg(){
	if(!check_purview('tpl_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $file;
	$path=CMS_PATH.$file;
	if(!$fp=@fopen($path,'r+')){err('<span style="color:red">模板打开失败,请确定【'.$file.'】模板是否存在</span>');}
	flock($fp,LOCK_EX);
	$str=@fread($fp,filesize($path));
	flock($fp,LOCK_UN);
	fclose($fp);
	include('template/admin_template_xg.html');
}

function save_template(){
	if(!check_purview('tpl_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $template,$file;
	$template=stripslashes($template);
	$path=CMS_PATH.$file;
	if(!$fp=@fopen($path,'w+')){err('<span style="color:red">模板打开失败,请确定【'.$file.'】模板是否存在</span>');}
	flock($fp,LOCK_EX);
	fwrite($fp,$template);
	flock($fp,LOCK_UN);
	fclose($fp);
	msg('【'.$file.'】模板修改完成','?');
}
?>
