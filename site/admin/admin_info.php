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
$action=isset($action)?$action:'info';
$lang=isset($lang)?$lang:get_lang_main();
go_url($action);

//网站配置
function info(){
global $lang;
if(file_exists(DATA_PATH.$lang.'_info.php')){
	include(DATA_PATH.$lang.'_info.php');
}
if(!empty($_confing)){
foreach($_confing as $k=>$v){
	$_confing[$k]=stripslashes($v);
}
}
include('template/admin_info.html');
}

//处理配置信息
function add_inc(){
if(!check_purview('web_info')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
$lang=$_POST['lang'];
if(empty($lang)){
	msg('<span style="color:red">参数传递错误,请重新操作</span>');
}
if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}
unset($_POST['action'],$_POST['submit'],$_POST['lang']);
foreach($_POST as $k=>$v){
	//if(in_array($k,array('web_powerby','web_beian','web_yinxiao'))){$v=htmlspecialchars($v);}
	if(is_array($v)){
	$info[$k]=$v[0];
	}else{
	$info[$k]=$v;
	}
}
//更换模板清除现有配置
if($GLOBALS['web_template']!=$_confing['web_template']){
	//清除缓存编译文件
	$GLOBALS['tpl']->del_cache();
	//清理现有配置
	$sql="delete from ".DB_PRE."tpl where lang='{$lang}'";
	$GLOBALS['mysql']->query($sql);
}
if($GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."cmsinfo where lang_tag='".$lang."' and info_tag='info'")){
$sql="update ".DB_PRE."cmsinfo set info_array='".addslashes(var_export($info,'true'))."' where lang_tag='".$lang."' and info_tag='info'";
}else{
$sql="insert into ".DB_PRE."cmsinfo (info_tag,info_array,info_name,lang_tag) values ('info','".addslashes(var_export($info,true))."','网站配置','".$lang."')";
}
$GLOBALS['mysql']->query($sql);
if(!empty($info)){
$s="<?php\n\$_confing=".var_export($info,true).";\n?>";
}
$file=DATA_PATH.$lang.'_info.php';
creat_inc($file,$s);
	msg('网站配置成功','admin_info.php?lang='.$lang);
}

function safe(){
	
	if(file_exists(DATA_PATH.'safe_inc.php')){
		include(DATA_PATH.'safe_inc.php');
	}
	include('template/admin_safe.html');
}

function save_safe(){
	if(!check_purview('safe_info')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	if(!isset($GLOBALS['submit'])){
		msg('<span style="color:red">请从表单提交</span>');
	}
	foreach($_POST as $key=>$value){
		if(in_array($key,array('action','submit'))){
			continue;
		}
		if(in_array($key,array('safe_type'))){
			$value=$value[0];
		}
		$safe[$key]=$value;
	}
	$str="<?php \n\$safe=".var_export($safe,'true').";\n?>";
	creat_inc(DATA_PATH.'safe_inc.php',$str);
	msg('验证信息配置成功');
}

function image_info(){
	if(file_exists(DATA_PATH.'image_inc.php')){
		include(DATA_PATH.'image_inc.php');
	}
	include('template/admin_image_info.html');
}

function save_image(){
	if(!check_purview('pic_info')){
	msg('<span style="color:red">操作失败,你的权限不足!</span>');
	}
	if(!isset($GLOBALS['submit'])){
		msg('<span style="color:red">请从表单提交</span>');
	}
	$image=array();
	foreach($_POST as $key => $value){
		if(in_array($key,array('action','save_image','submit','lang'))){
			continue;
		}
		if(is_array($value)){
			$value=$value[0];
		}
		$image[$key]=$value;
	}
	if(is_uploaded_file($_FILES['pic'][tmp_name])){
	$lang=isset($GLOBALS['lang'])?$GLOBALS['lang']:'cn';
	include(DATA_PATH.$lang.'_inc.php');
	include(INC_PATH.'image.class.php');
	$img=new image($_FILES['pic']);
	$file_path=$img->init();
	$arr=array('pics'=>$file_path);
	$image=(array)$image;
	$image=array_merge($image,$arr);
	}
	$str="<?php \n\$image_info=".var_export($image,'true').";\n?>";
	creat_inc(DATA_PATH.'image_inc.php',$str);
	msg('图片水印配置成功');
}


?>
