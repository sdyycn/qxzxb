<?php
//������ȫ��ʾ����
//error_reporting(0);
//�򿪻Ự
session_start();
//������վ·��
$config["mypath"]	=	"" ;
//ȡ����վ���λ��
if($config["mypath"]=="")
{
	$config["webpath"]	=	$_SERVER['DOCUMENT_ROOT'] ;
}
else{
	$config["webpath"]	=	$_SERVER['DOCUMENT_ROOT'].$config["mypath"] ;
}
//������ݿ�ִ����
require_once($config["webpath"]."/configs/db.class.php");
//���ط�ҳ��
require_once($config["webpath"]."/configs/page.class.php");
//����ʱ��
if(function_exists('date_default_timezone_set')){
	date_default_timezone_set('Hongkong');
}
//������ݿ�����
global $db;
$db = new limidb("192.168.10.86","limijobs","123456","limijobs","utf8","conn");
?>
