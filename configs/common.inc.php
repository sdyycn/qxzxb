<?php
//数据库基本配置信息
$cfg_dbhost = 'localhost';
$cfg_dbname = '156db';
$cfg_dbuser = 'root';
$cfg_dbpwd = 'root';
//字符串编码
header("Content-Type: text/html; charset=utf-8");
//数据库连接
$con = mysql_connect($cfg_dbhost,$cfg_dbuser,$cfg_dbpwd );
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  else{
	  echo "";
	  }
//选择数据库，设置编码
mysql_select_db("156db", $con);
mysql_query("set names 'utf8'");
?>