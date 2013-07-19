<?php
/**
* 
* @author maweiguo
* @version 1.0
* @date 2013/7/12
* class JobsHelper
* 
*/

chdir(dirname(__FILE__));
require_once ('MailVal.func.php');

class JobsHelper{
	/**
	 * javascript: alert($msg);<br>
	 * same as alert($msg);
	 */
	static function MessageBox($msg){
		header("Content-type: text/html; charset=utf-8");
		echo "<script>alert(\"$msg\");window.close();</script>";
	}
	
	/**
	 * javascript: alert($msg);<br>
	 * same as MessageBox($msg);
	 */
	static function alert($msg){
		JobsHelper::MessageBox($msg);
	}
	
	/**
	 * Zend MailVal<br>
	 * <b>level=1, basic check.</b><br />
	 * invoke mailval is in MailVal.func.php
	 * 
	 */
	static function MailVal($address, $level=1){
		MailVal($address, $level); 
	}
	
}

