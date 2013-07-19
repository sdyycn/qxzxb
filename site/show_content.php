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
$id=isset($_GET['id'])?intval($_GET['id']):'';
if(empty($id)){header('location:index.php');}
if(!$mysql->fetch_rows("select id from ".DB_PRE."maintb where id={$id}")){header('location:index.php');}//是否存在内容
$cate=$mysql->get_row("select category from ".DB_PRE."maintb where id={$id}");//取得内容栏目
$cateid=$cate;
$ishtml=1;
$cate_info=get_cate_info($cate,$category);
if($cate_info['cate_channel']==1){header("location:show_list.php?id={$cate}");}
$lang=$cate_info['lang'];
if(file_exists(LANG_PATH.'lang_'.$lang.'.php')){include(LANG_PATH.'lang_'.$lang.'.php');}//语言包缓存,数组$language
$_confing=get_confing($lang);
$channel_info=get_cate_info($cate_info['cate_channel'],$channel);
$channel_table=$channel_info['channel_table'];
$content=get_content($id,$channel_info['channel_table'],$cate_info['id']);
$content=$content[0];
$view_is=isset($_SESSION['purview'])?$_SESSION['purview']:'';
if($content['purview']!=$view_is&&$content['purview']){die($language['msg_info7']."【<a href=\"index.php?lang={$lang}\">back</a>】");}
if($content['verify']){die($language['msg_info8']."<a href=\"index.php?lang={$lang}\">【Back】</a>");}
$tpl->template_dir=TP_PATH.$_confing['web_template'].'/';//模板路径
$tpl->template_lang=$lang;//语言
$cache_time=$content['cache_time']?$content['cache_time']:$_confing['cache_time'];
if($_confing['is_cache']){
	$tpl->template_is_cache=1;//缓存
	$tpl->template_time=$cache_time?$cache_time:30;//开启缓存但不存在缓存时间使用30秒
}else{
	$tpl->template_is_cache=0;
}
$page=empty($page)?1:$page;
//文章分页
$body_content=$content['content'];
$content_arr=preg_split('/<div style=\"page-break-after: always[;]*\"><span style=\"display: none[;]*\">&nbsp;<\/span><\/div>/i',$body_content);
$content_arr_num=count($content_arr);
$content_arr_num=($content_arr_num>1)?$content_arr_num:0;
if($content_arr_num){
	for($i=0;$i<$content_arr_num;$i++){
		if($page==($i+1)){
			$content_focus=$i;
			$content['content']=$content_arr[$i];
			$content['title']=$content['title'].'('.($i+1).')';
			$content['style_title']=$content['style_title'].'('.($i+1).')';
			$tpl_rel=explode('.',$cate_info['cate_tpl_content']);
			if(file_exists(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php')){
				include(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
			}else{
				die("不存在处理文件".TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
			}
			$tpl->display($tpl_rel[0]);//载入缓存文
		}
	}
}else{
	$tpl_rel=explode('.',$cate_info['cate_tpl_content']);
	if(file_exists(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php')){
		include(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
	}else{
		die("不存在处理文件".TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
	}
	$tpl->display($tpl_rel[0]);//载入缓存文
}

?>
