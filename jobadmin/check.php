<?php
chdir(dirname(__FILE__));
require_once '../configs/path.inc.php';
require_once '/configs/function.php';

//判断用户是否登录及是否超时
if (!session_id()){
	session_start();
}

if (empty($_SESSION['username'])){
	header("Content-type: text/html; charset=utf-8");
	echo $config['adminroot'];
	alert("请先登录", $config['adminroot']."/login.php");
	exit;
}

// Time-out
if (empty($_SESSION['lastlogintime']) || (time() - strtotime($_SESSION['lastlogintime'])) > 60*60*24*7){
	header("Content-type: text/html; charset=utf-8");
	alert("超时请先登录", $config['adminroot']."/login.php");
	exit;
}
?>