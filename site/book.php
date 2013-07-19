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
$action=isset($_REQUEST['action'])?trim($_REQUEST['action']):'book';
$lang=isset($_REQUEST['lang'])?htmlspecialchars(fl_value($_REQUEST['lang'])):'cn';
if(file_exists(LANG_PATH.'lang_'.$lang.'.php')){include(LANG_PATH.'lang_'.$lang.'.php');}//语言包缓存,数组$language
$_confing=get_confing($lang);
$tpl->template_dir=TP_PATH.$_confing['web_template'].'/';//模板路径
$tpl->template_lang=$lang;//语言
$tpl->template_is_cache=0;//缓存	
$tpl->assign('langs',lang());//语言种类
$tpl->assign('lang',$lang);
$tpl->assign('language',weblangs());//语言包变量
$tpl->assign('webinfo',webinfo());//网站配置信息，用于优化
$tpl->assign('nav_middle',nav_middle());//中间导航
$tpl->assign('nav_bottom',nav_bottom());//底部导航
$tpl->assign('hot_key',get_hot_words());//搜索热门词	
$tpl->assign('market',get_market());//客服	
//留言页
if($action=='book'){
	$page=empty($_GET['page'])?1:intval($_GET['page']);
	$pagesize=15;
	$pagenum=($page-1)*$pagesize;
	$query='&lang='.$lang;
	$total_num=$GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."book as m where verify=1 and lang='".$lang."'");
	$total_page=ceil($total_num/$pagesize);
	$sql="select*from ".DB_PRE."book where verify=1 and lang='".$lang."' order by addtime desc limit {$pagenum},{$pagesize}";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$tpl->assign('book',$rel);
	$tpl->assign('page',page(CMS_SELF.'book.php',$page,$query,$total_num,$total_page));
	$tpl->display('book');//载入模板
}	
//添加留言
elseif($action=='add'){
	//是否开启留言本
	$is_use=$mysql->get_row("select is_book from ".DB_PRE."book_info where id=1");
	if(!$is_use){die("<script type=\"text/javascript\">alert('".$language['book_msg1']."');history.go(-1);</script>");}
	$book_name=fl_html(fl_value($_POST['book_name']));
	$book_title=fl_html(fl_value($_POST['book_title']));
	$book_content=fl_html(fl_value($_POST['book_content']));
	if(empty($book_title)){die("<script type=\"text/javascript\">alert('".$language['book_msg2']."');history.go(-1);</script>");}
	if(empty($book_content)){die("<script type=\"text/javascript\">alert('".$language['book_msg3']."');history.go(-1);</script>");}
	$book_name=empty($book_name)?(empty($_SESSION['member_user'])?'游客':$_SESSION['member_user']):cn_substr($book_name,50);
	$book_title=cn_substr($book_title,60);
	$book_content=cn_substr($book_content,200);
	$addtime=time();
	//是否开启审核
	$is_verify=$mysql->get_row("select book_verify from ".DB_PRE."book_info where id=1");
	$verify=($is_verify)?0:1;
	$sql="insert into ".DB_PRE."book (book_name,book_title,book_content,addtime,verify,lang) values ('{$book_name}','{$book_title}','{$book_content}','{$addtime}',{$verify},'{$lang}')";
	$mysql->query($sql);
	die("<script type=\"text/javascript\">alert('".$language['book_msg4']."');location.href='".CMS_SELF."book.php?lang=".$lang."';</script>");
}
?>
