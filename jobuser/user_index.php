<?php
chdir(dirname(__FILE__));
require_once '../configs/path.inc.php';
require_once '../include/JobsPage.class.php';
require_once '../configs/function.php';

class UserIndexPage extends JobsPage{
	private $welcome = "etherjobs";
	function __construct(){		
		parent::__construct();			
	}
    function check(){
    	//判断用户是否登录及是否超时
    	if (!session_id()){ 
    		$time = 2*60;                      //设置session失效时间
//     		session_set_cookie_params($time);  //使用函数 客户端没有禁止cookie
            setcookie(session_name(),session_id(),time()+$time,"/");
    		session_start();
    	}
    	
    	if (empty($_SESSION['username'])){
    		if(empty($_COOKIE['username'])){
    		header("Content-type: text/html; charset=utf-8"); 
    		alert("请先登录","../index_login.php");
    		exit;
    		}else{
    			$username = $_COOKIE['username'].', ';
    			$lastlogin = ", 你上次登录的时间是：".$_COOKIE['lastlogintime'].', ';
    			$ip = "IP: ".$_COOKIE['lastloginip'];
    			$this->welcome = "cookie::limitoner  $username welcome to the Etherjobs $lastlogin $ip";
    		}
    	}else{
    			$username = $_SESSION['username'].', ';
    			$lastlogin = ", 你上次登录的时间是：".$_SESSION['lastlogintime'].', ';
    			$ip = "IP: ".$_SESSION['lastloginip'];
    			$this->welcome = "session::limitoner  $username welcome to the Etherjobs $lastlogin $ip";
    		}
    		
    // Time-out
    	if (( empty($_SESSION['thislogintime']) || (time() - strtotime($_SESSION['thislogintime'])) > 60 ) && empty($_COOKIE['username'])){
    		header("Content-type: text/html; charset=utf-8");
    		alert($_SESSION['username']."超时请先登录", "../index_login.php");
    		exit;
    	}
    }
	function display(){
		$this->check();		
		$page = new JobsPage("user_index");			
		$page->smarty->assign('title', "etherjobs...user首页");
		$page->smarty->assign('content',$this->welcome);			
 		$page->display();		
    }
}

// http://localhost/jobuser/user_index.php
$page = new UserIndexPage;
$page->run();
?>