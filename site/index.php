<?php
/**
 * $Author: BEESCMS $
 * ============================================================================
 * 网站地址: http://www.beescms.com
 * 您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/

if(!file_exists("data/install.lock")||!file_exists("data/confing.php")){header("location:install/index.php");exit();}
define('CMS',true);
require_once('includes/init.php');
require_once('includes/fun.php');
require_once('includes/lib.php');
if(file_exists(DATA_PATH.'index_info.php')){include(DATA_PATH.'index_info.php');}//首页配置缓存
$lang=isset($lang)?$lang:'';
$lang_name='';
if(!empty($lang_cache)){
 foreach($lang_cache as $k=>$v){
 	if($lang==$v['lang_tag']){
		if(!$v['lang_is_use']){$lang='';break;}
	}
 }
}
if(file_exists(LANG_PATH.'lang_'.$lang.'.php')){include(LANG_PATH.'lang_'.$lang.'.php');}//语言包缓存,数组$language
$index_flash=isset($_index['flash_is'][0])?$_index['flash_is'][0]:'';
if($index_flash&&empty($lang)){
//载入flash引导页
	$fl_file=CMS_PATH.'template/flash.html';
	if(!$fl_file){die($language['msg_info']);}
	if(!empty($lang_cache)){
		foreach($lang_cache as $k=>$v){
			if($v['id']==$_index['index_lang']){$lang_tag=$v['lang_tag'];}
		}
	}
	$lang=$lang_tag;
	if(file_exists(LANG_PATH.'lang_'.$lang_tag.'.php')){include(LANG_PATH.'lang_'.$lang_tag.'.php');}//语言包缓存,数组$language
	//网站配置文件
	$_confing=get_confing($lang_tag);
	$tpl->template_dir=TP_PATH.'/';
	$tpl->template_lang=$lang_tag;
	if($_confing['is_cache']){
		$tpl->template_is_cache=1;//缓存
		$tpl->template_time=$_confing['cache_time']?$_confing['cache_time']:30;//开启缓存但不存在缓存时间使用30秒
	}else{
		$tpl->template_is_cache=0;
	}
	$tpl->assign('langs',lang());//语言种类
	$tpl->assign('language',weblangs());//语言包变量
	$tpl->assign('webinfo',webinfo());//网站配置信息，用于优
	$tpl->display('flash');
}else{
//载入语言页
	if(!empty($lang_cache)&&empty($lang)){
		foreach($lang_cache as $k=>$v){
			$index_lang=isset($_index['index_lang'])?$_index['index_lang']:'';
			if($v['id']==$index_lang){
			$go_index=$v['lang_tag'];
			}
		}
		$lang=(empty($go_index))?'cn':$go_index;
	}
	
	if(!empty($lang_cache)){
		foreach($lang_cache as $l_k=>$l_v){
			if($l_v['lang_tag']==$lang){
			$lang_name=$l_v['lang_name'];
			break;
			}
		}
	}
	if(file_exists(LANG_PATH.'lang_'.$lang.'.php')){include(LANG_PATH.'lang_'.$lang.'.php');}//语言包缓存,数组$language
	//网站配置文件
	$_confing=get_confing($lang);
	$is_template=isset($_confing['web_template'])?$_confing['web_template']:'';
	if($is_template){
		if(!file_exists(CMS_PATH.'template/'.$_confing['web_template'])){$err_msg=str_replace('@',$lang_name,$language['msg_info2']);die($err_msg);}
	}else{
		$err_msg=str_replace('@',$lang_name,$language['msg_info3']);
		die($err_msg);
	}
	//指向首页
	if($_confing['web_html']){
		if(file_exists('index_'.$lang.'.html')){
		include('index_'.$lang.'.html');
		//header("location:index_{$lang}.html");
		}else{
		$err_msg=str_replace('@',$lang_name,$language['msg_info4']);
		die($err_msg);
		}
	}else{
		$tpl->template_dir=TP_PATH.$_confing['web_template'].'/';
		$tpl->template_lang=$lang;
		if($_confing['is_cache']){
			$tpl->template_is_cache=1;//缓存
			$tpl->template_time=$_confing['cache_time']?$_confing['cache_time']:30;//开启缓存但不存在缓存时间使用30秒
		}else{
			$tpl->template_is_cache=0;
		}
		include(TP_PATH.$_confing['web_template'].'/assign/index_assign.php');
		$tpl->display('index');
	}
	
}

?>
