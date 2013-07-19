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
if(file_exists(LANG_PATH.'lang_'.$lang.'.php')){include(LANG_PATH.'lang_'.$lang.'.php');}//语言包缓存,数组$language
$_confing=get_confing($lang);
$tpl->template_dir=TP_PATH.$_confing['web_template'].'/';//模板路径
$tpl->template_lang=$lang;//语言
$tpl->template_is_cache=0;//缓存	
include(TP_PATH.$_confing['web_template'].'/assign/sitemap_assign.php');	 		
$GLOBALS['tpl']->display('sitemap');//载入缓存文

?>
