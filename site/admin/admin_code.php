<?php
/**
 * $Author: BEESCMS $
 * ============================================================================
 * 网站地址: http://www.beescms.com
 * 您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/

include('../includes/code.class.php');
$code=new code(80,23);
$code->out_img();
for($i=1;$i<=4;$i++){
	$code_str.=$code->code_str[$i];
}
session_start();
$_SESSION['code']=$code_str;
?>