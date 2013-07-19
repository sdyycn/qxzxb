<?php
chdir(dirname(__FILE__));
require_once 'path.inc.php';
require_once $config["webpath"].'/libs/Smarty.class.php';

//
//模板路径
$temp_path = "/templates";
//Smarty实例生成
$smarty = new Smarty;
$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = false;
$smarty->cache_lifetime = "";
$smarty->template_dir = $_SERVER['DOCUMENT_ROOT']."/jobadmin/templates"; 
$smarty->compile_dir = $_SERVER['DOCUMENT_ROOT']."/templates_c"; 
$smarty->cache_dir = $_SERVER['DOCUMENT_ROOT']."/cache";  
$smarty->left_delimiter = "<{"; //设置左边界符
$smarty->right_delimiter = "}>"; //设置右边界符
?>