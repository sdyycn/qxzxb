<?php
/*
 * @author: yangfan
 *  @date: 2013/8/3
 *
 */
require_once '../configs/path.inc.php';
class UserSession{
	// username	
	// lastloginip
	// lastlogintime
	function __construct(){
		if (!session_id()){
			session_start();
		}
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
// 			setcookie(session_name(), '', time()-42000, '/');
			JobsUserCookie::logout();
		}	
		session_destroy();
	}
	
	static function login($info){
		$_SESSION['username'] = $info['username'];		
		$_SESSION['lastloginip'] = $info['lastloginip'];
		$_SESSION['lastlogintime'] = $info['lastlogintime'];	
		$_SESSION['thislogintime']= date("y-m-d H:i:s");
	}
	
	static function logout(){
		UserSession::destroy();		
	}
}
class JobsUserCookie{
	static function login($info){
		$expiretime = time() + 60*2;	// 设置cookie 有效时间为2分钟
		setcookie('username', $info['username'], $expiretime);		
		setcookie('lastloginip', $info['lastloginip'], $expiretime);
		setcookie('lastlogintime', $info['lastlogintime'], $expiretime);		
	}

	static function logout(){		
		setcookie('username', '', time()-3600);	
		setcookie('lastloginip', '', time()-3600);
		setcookie('lastlogintime', '', time()-3600);
	}
}