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

class MHelper{
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
	static function alert1($msg){
		MHelper::MessageBox($msg);
	}

	static function alert($msg,$url)
	{
		header("Content-type: text/html; charset=utf-8");
		if (is_int($url)==true) {
			if ($url==0) {
				echo "<script>alert(\"$msg\");window.close();</script>";
			} else {
				echo "<script>alert(\"$msg\");history.go(-$url);</script>";
			}
		} else {
			echo "<script>alert(\"$msg\");window.location=\"$url\";</script>";
		}
		exit;
	}

	//页面跳转
	static function pageskip($url){
		echo "<script>window.location=\"$url\";</script>";
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
	
	static function msg($message,$url="javascript:window.history.back(-1);",$is_time=1,$break='true',$tpl='template/message.html'){
		$message="<p style=\"font-weight:bold;\">".$message."</p>";
		$message.="<p>页面将在<span id=\"is_time\"></span>秒后自动返回</p>";
		if(!empty($url)){
			$message.="<p id=\"time_url\"><a href=\"".$url."\">返回上一页</a></p>";
			$message.=($is_time)?"<script type=\"text/javascript\">time_go();</script>":'';
		}
	}

	function get_ip(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			return $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			return $_SERVER['REMOTE_ADDR'];
		}
	}
	
}

