<?php
/**
 * 
 */
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('/configs/config.db.php');
require_once('/include/code.class.php');

$code=new code(80,23);
$code->out_img();
for($i=1;$i<=4;$i++){
	$code_str.=$code->code_str[$i];
}
session_start();
$_SESSION['code']=$code_str;
?>
