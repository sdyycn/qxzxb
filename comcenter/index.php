<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/configs/comcenter.smarty.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/configs/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/configs/function.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/configs/webconfig.php';
//站点基本配置信息
$smarty->assign('webtitle',$webtitle);
$smarty->assign('webkeywords',$webkeywords);
$smarty->assign('webdesp',$webdesp);
$smarty->assign('copyright',$copyright);
$smarty->assign('author',$author);
$smarty->display('index.html');
?>