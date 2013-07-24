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
include ('ip.taobao.inc.php');

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

	static function getIP(){
		static $realip;
		if (isset($_SERVER)){
			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
				$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
				$realip = $_SERVER["HTTP_CLIENT_IP"];
			} else {
				$realip = $_SERVER["REMOTE_ADDR"];
			}
		} else {
			if (getenv("HTTP_X_FORWARDED_FOR")){
				$realip = getenv("HTTP_X_FORWARDED_FOR");
			} else if (getenv("HTTP_CLIENT_IP")) {
				$realip = getenv("HTTP_CLIENT_IP");
			} else {
				$realip = getenv("REMOTE_ADDR");
			}
		}


		return $realip;
	}
	
	static function getIPCity($ip){
		$url = "http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;	// 淘宝IP库： http://ip.taobao.com 
		$ip = json_decode(file_get_contents($url));
		if((string)$ip->code=='1'){
			return false;
		}
		$data = (array)$ip->data;
	
		return $data;
	}
}

