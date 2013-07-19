<?php
//闭屏安全提示错误
//error_reporting(0);
//打开会话
session_start();
//设置网站路径
$config["mypath"]	=	"" ;
//取得网站绝对位置
if($config["mypath"]=="")
{
	$config["webpath"]	=	$_SERVER['DOCUMENT_ROOT'] ;
}
else{
	$config["webpath"]	=	$_SERVER['DOCUMENT_ROOT'].$config["mypath"] ;
}
//加载数据库执行类
require_once($config["webpath"]."/configs/db.class.php");
//加载分页类
require_once($config["webpath"]."/configs/page.class.php");
//调整时区
if(function_exists('date_default_timezone_set')){
	date_default_timezone_set('Hongkong');
}
//建立数据库连接
global $db;
$db = new limidb("localhost","root","root","limijobs","utf8","conn");
?>
