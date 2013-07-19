<?php
/*
 * @author: maweiguo
 * @date: 2013/7/8
 * @file: index.php
 * 
 */

chdir(dirname(__FILE__));
require_once 'path.inc.php';

class Logs{
	static private $level = 0;	// info, debug, error, sql
	static private $logfile = null;

	static private function logonce(){
		// IP, username, login time, logout time, browser info(OS info), 
		// screen size(browser size), locale(time zone)
	}
	static private function getTime(){
		return date('Y-m-d H:i:s');
	}
	
	static private function getIP(){
		return $_SERVER['REMOTE_ADDR'];
	}
	
	static private function save($msg, $file){
		// write log to file or db.
		if (!$fp = @fopen($file, 'ab')){  
            return false;  
        }
        
		flock($fp, LOCK_EX);
		fwrite($fp, $msg);
		flock($fp, LOCK_UN);
		fclose($fp);
		
		return true;
	}
	
	static private function getClientInfo(){
		return $_SERVER['HTTP_USER_AGENT'];
	}
	
	static private function generate($msg, $file){
		$time = self::getTime();
		if ($file != ''){
			$file = "[$file]";
		}
		$ip = '['.self::getIP().']';
		return "$file $ip [$time] : $msg \r\n";
	}
	static function plog($msg, $file = ''){
		$msg = self::generate($msg, $file);
		
		$path = $GLOBALS['config']["webpath"].'/logs/';
		@mkdir($path);
		self::save($msg, $path.'log-'.date('Y-m-d').'.txt');
	}
	
	static function sqllog($msg, $file = ''){
		$msg = self::generate($msg, $file);
		
		$path = $GLOBALS['config']["webpath"].'/logs/';
		@mkdir($path);
		self::save($msg, $path.'log-'.date('Y-m-d').'.db.txt');
	}

	static function trace($msg){
		if (__DEBUG__){
			print_r($msg);
			print_r("<br />");
		}
	}
	
	static function msgbox($msg){
		echo "<script>alert(\"$msg\");</script>";
	}
	static function alert($msg){
		echo "<script>alert(\"$msg\");</script>";
	}
}
