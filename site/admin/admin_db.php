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
$action=isset($action)?$action:'backup';
$lang=isset($lang)?$lang:get_lang_main();
go_url($action);

function backup(){
	if(!check_purview('data_backup')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	$rel2=$GLOBALS['mysql']->fetch_asc('SHOW TABLE STATUS FROM '.DB_NAME);
	$rel=array();
	foreach($rel2 as $key=>$value){
	if(substr($value['Name'],0,strlen(DB_PRE))==DB_PRE){
		$rel[]=$value;	
	}
	}
 	include('template/admin_db_backup.html');
}

function save_back(){
	if(!check_purview('data_backup')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $db,$fl_name;
	if(empty($db)){msg('<span style="color:red">请选择要备份的表</span>');}
	$sql="";
	foreach($db as $k=>$v){
		$rel=$GLOBALS['mysql']->fetch_asc('SHOW CREATE TABLE '.$v);
		$sql.="DROP TABLE IF EXISTS `".$v."`;\n";
		$sql.=$rel[0]['Create Table'].";\n";
		$record=$GLOBALS['mysql']->fetch_asc("select*from ".$v);
		if(!empty($record)){
			$insert=array();
			foreach($record as $key=>$value){
				foreach($value as $r_k=>$r_v){
					$insert[$r_k]="'".mysql_escape_string($r_v)."'";
				}
				$sql.="INSERT INTO `".$v."` VALUES(".implode(',',$insert).");\n";
			}
		}	
	}
	$fl_name=empty($fl_name)?date(YmdHms,time()).'.sql':$fl_name;
	$backfile=DATA_PATH.'backup/'.$fl_name;
	if(!@file_put_contents($backfile,$sql)){
		err('<span style="color:red">备份失败,请检查backup文件夹是否有足够的读写权限</span>');
	}
	err("备份成功,备份文件为".$fl_name);
}

function import(){
	if(!check_purview('data_import')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	include('template/admin_db_import.html');
}

function save_import(){
	if(!check_purview('data_import')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $fl;
	if(empty($fl)){err('<span style="color:red">参数传递错误,请重新操作</span>');}
	$data=@file_get_contents(DATA_PATH.'backup/'.$fl);
	$data=explode(";\n",trim($data));
	if(!empty($data)){
		foreach($data as $k=>$v){
			$GLOBALS['mysql']->query($v);
		}
	}
	msg("数据还原成功");
}

function del(){
	if(!check_purview('data_import')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $fl;
	if(empty($fl)){err('<span style="color:red">参数传递错误,请重新操作</span>');}
	@unlink(DATA_PATH.'backup/'.$fl);
	msg($fl.'文件删除成功','?action=import');
}
?>