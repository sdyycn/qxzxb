<?php
chdir(dirname(__FILE__));
require_once '../configs/path.inc.php';
require_once '/configs/function.php';

class JobsAdminSession{
// username
// usertype
// lastloginip
// lastlogintime

	function __construct(){
		if (!session_id()){
			session_start();
		}
	}
	static function add($name, $value){
		$_SESSION[$name] = $value;
	}
	static function delete($name){
		
	}
	
	static function checkValidateCode($code){
		if ($code != null){
			$vc = strtolower($code);
			
			if (!empty($_SESSION['code']) && $_SESSION['code'] == $vc){
				return true;
			}
		}
		
		return false;
	}
	
	static function destroy(){
		//session_start();
		
		$_SESSION = array();
	
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}

		session_destroy();
	}
	
	function is_login(){
		$_SESSION['login_in'] = isset($_SESSION['login_in'])?$_SESSION['login_in']:'';
		$_SESSION['username'] = isset($_SESSION['username'])?$_SESSION['username']:'';
		
		if ($_SESSION['login_in']==1 && !empty($_SESSION['username'])){
			if (mktime()-$_SESSION['lastlogintime'] > 1800){
				login_out();
			}else{
				$_SESSION['lastlogintime'] = mktime();
			}
			return 1;
		}else{
			return 0;
		}
	}

	function check(){
		if (empty($_SESSION['username'])){
			if (!empty($_COOKIE['username'])){
				$_SESSION['username'] = $_COOKIE['username'];
				$_SESSION['usertype'] = $_COOKIE['usertype'];
				$_SESSION['lastloginip'] = $_COOKIE['lastloginip'];
				$_SESSION['lastlogintime'] = $_COOKIE['lastlogintime'];
				
				return true;
			} else {
				return false;
			}
		} else {
			if (time() - strtotime($_SESSION['lastlogintime']) > 60*60*24*7){
				return false;
			}
		}
		
		return true;
	}
	
	static function login($info){
 		$_SESSION['username'] = $info['username'];
		$_SESSION['usertype'] = $info['usertype'];
		$_SESSION['lastloginip'] = $info['lastloginip'];
		$_SESSION['lastlogintime'] = $info['lastlogintime'];
		
//		JobsCookie::login($info);
	}
	
	static function logout(){
		 JobsAdminSession::destroy();
//		 JobsCookie::logout();
	}
}

class JobsCookie{
	static function login($info){
		$expiretime = time() + 60;	// 60*60*24*30*12 == 1 year
		setcookie('username', $info['username'], $expiretime);
		setcookie('usertype', $info['usertype'], $expiretime);
		setcookie('lastloginip', $info['lastloginip'], $expiretime);
		setcookie('lastlogintime', $info['lastlogintime'], $expiretime);
	}
	
	static function logout(){
		setcookie('username', '', time()-3600);
		setcookie('usertype', '', time()-3600);
		setcookie('lastloginip', '', time()-3600);
		setcookie('lastlogintime', '', time()-3600);
	}
}
