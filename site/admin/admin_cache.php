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
$action=isset($action)?$action:'channel';
$lang=isset($lang)?$lang:get_lang_main();
//清除缓存
if($action=='del_cache_file'){
	$tpl->del_cache();
	echo "<script type=\"text/javascript\">alert('清除完成');history.go(-1);</script>";
}
?>