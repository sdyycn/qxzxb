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
$action=empty($action)?'file_list':$action;
go_url($action);

function file_list(){
	if(!check_purview('file_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $path,$step,$file;
	$file_from=$file;
	$path=empty($path)?'upload':$path;
	$file_hand=@opendir(CMS_PATH.$path);
	if(!$file_hand){
		err("目录操作失败,请检查upload是否有足够的权限操作");
	}
	include('template/admin_file.html');
}

//创建目录
function creat_dir(){
	if(!check_purview('file_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $path,$dir_name;
	if(!ereg('^[0-9a-z][0-9a-z]*[0-9a-z]$',$dir_name)){
		msg('<span style="color:red">名称只能是数字和字母</span>');
	}
	mkdir(CMS_PATH.$path.'/'.$dir_name,'0700');
	msg("目录【{$dir_name}】创建成功");
}

//上传文件
function up_load(){
	if(file_exists(DATA_PATH.'sys_info.php')){
		include(DATA_PATH.'sys_info.php');
	}
	if(!$_sys['web_upload_image']||!$_sys['web_upload_file']){
		msg('<span style="color:red">请先配置系统的上传文件</span>','admin_sys.php');
	}
	
	$type=$_sys['web_upload_image'].'|'.$_sys['web_upload_file'];
	$type=explode('|',$type);
	global $path,$up,$name;
	$file=$path.'/'.up_file($_FILES['up'],$_sys['upload_size'],$type,$path,$name);
	msg("【{$file}】文件上传成功");
}

//删除文件
function del(){
	if(!check_purview('file_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $file;
	$sys_dir=array('upload/img','upload/fck','upload/file');
	if(in_array($file,$sys_dir)){msg('<span style="color:red">不能删除系统文件夹,只能删除内部内容</span>');}
	delete_dir($file);
	err('文件成功删除');
}

//复制目录
function copy_dir(){
	if(!check_purview('file_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $dir_to,$dir_from;
	if(empty($dir_to)||empty($dir_from)){msg('<span style="color:red">复制地址传递错误,复制失败</span>');}
	copy_list_dir(CMS_PATH.$dir_from,CMS_PATH.$dir_to);
	err('目录复制完成');
}
?>
