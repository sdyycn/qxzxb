<?php
/**
 * $Author: BEESCMS $
 * ============================================================================
 * 网站地址: http://www.beescms.com
 * 您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/

if (!defined('IN_CMS'))
{
    die('Hacking attempt');
}
error_reporting(E_ALL & ~E_NOTICE);
$dir_name=str_replace('\\','/',dirname(__FILE__));
$admindir=substr($dir_name,strrpos($dir_name,'/')+1);
define('ADMINDIR',$admindir);
define('CMS_PATH',str_replace($admindir,'',$dir_name));
define('TP_PATH',CMS_PATH.'template/');
define('INC_PATH',CMS_PATH.'includes/');
define('DATA_PATH',CMS_PATH.'data/');
define('MB_PATH',CMS_PATH.'member/');
define('LANG_PATH',CMS_PATH.'languages/');
@ini_set('date.timezone','Asia/Shanghai');
@ini_set('display_errors',1);
@ini_set('session.use_trans_sid', 0);
@ini_set('session.auto_start',    0);
@ini_set('memory_limit',          '64M');
@ini_set('session.cache_expire',  180);
session_start();
header("Cache-control: private");
header("Content-type: text/html; charset=utf-8"); 
include(INC_PATH.'fun.php');
unset($HTTP_ENV_VARS, $HTTP_POST_VARS, $HTTP_GET_VARS, $HTTP_POST_FILES, $HTTP_COOKIE_VARS);
if (!get_magic_quotes_gpc())
{
    if (isset($_REQUEST))
    {
        $_REQUEST  = addsl($_REQUEST);
    }
    $_COOKIE   = addsl($_COOKIE);
	$_POST = addsl($_POST);
	$_GET = addsl($_GET);
}
@extract($_POST);
@extract($_GET);
@extract($_COOKIE);
include(DATA_PATH.'confing.php');
define('CMS_URL','http://'.$_SERVER['HTTP_HOST'].CMS_SELF);
include(INC_PATH.'mysql.class.php');
$mysql=new mysql(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_CHARSET,DB_PCONNECT);
if(file_exists(DATA_PATH."cache/cache_admin_group.php")){include(DATA_PATH."cache/cache_admin_group.php");}
//if(extension_loaded('zlib')){ob_start('ob_gzhandler');}	
//检查登陆
if(!is_login()){header('location:login.php');exit;}
include(CMS_PATH."fckeditor/fckeditor.php");
define('FCK_PATH',"../fckeditor/");
include(INC_PATH.'cache.class.php');
$cache=new cache();
include("version.php");
//载入语言包(简体中文)
if(file_exists(LANG_PATH.'lang_cn.php')){include(LANG_PATH.'lang_cn.php');}
if(file_exists(DATA_PATH.'sys_info.php')){include(DATA_PATH.'sys_info.php');}//系统设置缓存,数组$_sys
include(INC_PATH.'tpl.class.php');
$tpl=new tpl(DATA_PATH.'cache_template/',DATA_PATH.'compile_tpl/',30);
?>