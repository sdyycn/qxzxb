<?php
/*
 * @author: maweiguo
 * 
 */

chdir(dirname(__FILE__));
require_once '../configs/path.inc.php';
require_once 'include/JobsPDO.class.php';
require_once 'configs/function.php';
require_once ADMIN_FOLDER.'/JobsAdminSession.class.php';
require_once 'include/JobsPage.class.php';

class AdminLoginPage extends AdminPage {
	private $username = null;
	private $password = null;
	private $validateCode = null;
	
	function __construct(){
		if (!session_id()){
			session_start();
		}

		parent::__construct("login.html");
	}
	
	function doAction(){
		switch ($this->action)
		{
			case 'login':
				$this->handler_login();
				break;
			case 'logout':
				$this->handler_logout();
			default:
				$this->display();
				break;
		}
	}
	
	private function handler_logout(){
		JobsAdminSession::logout();
	}

	private function form_check_login(){
		if (empty($_REQUEST['yzcode'])){
			alert("请输入验证码！", "login.php");
			return false;
		} else {
			$this->validateCode = $_REQUEST['yzcode'];
		}
		if (!JobsAdminSession::checkValidateCode($this->validateCode)){
			alert("验证码不正确！", "login.php");
			return false;
		}
		
		if (empty($_REQUEST['username'])){
			alert("请输入用户名！", "login.php");
			return false;
		} else {
			$this->username = $_REQUEST['username'];
		}	
	
		if (empty($_REQUEST['password'])){
			alert("请输入密码！", "login.php");
			return false;
		} else {
			$this->password = $_REQUEST['password'];
		}
		
		return true;
	}
	
	private function handler_login(){
		if (!$this->form_check_login()){
			return;
		}
		
		$table = $GLOBALS['table']['ejob_admin'];
		$pdo = new JobsPDO();
		$username = $this->username;
		$password = md5($this->password);
		
		$sql = "SELECT * FROM $table WHERE username = :username AND password = :password";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(":username", $username);		// avoid SQL: WHERE 1=1
		$stmt->bindParam(":password", $password);
		if ($stmt->execute()){
			$user = $stmt->fetchAll();
			if (count($user) < 1){	
				alert("登录失败,用户名: $username 不存在!", "login.php");
				uset($pdo);
				return;
			}
			//trace($user[0]);
			
			$client_ip = $_SERVER['REMOTE_ADDR'];
			$num = $user[0]['loginquantity'] + 1;
			$sql = "UPDATE $table SET lastlogintime=NOW(), thislogintime=NOW(), lastloginip = '$client_ip', thisloginip = '$client_ip', loginquantity = $num WHERE username = '$username'";
//			trace($sql);
			if ($pdo->exec($sql) > 0) {
				JobsAdminSession::login($user[0]);
				header('location:admin_index.php');

//				alert("登录成功!", 'admin_index.php');
			} else {
				trace($pdo->errorInfo());
			}
		} else {
			uset($pdo);
			alert("登录失败,数据库查询失败!", "login.php");
			trace($pdo->errorInfo());
		}
	}
}

$page = new AdminLoginPage;
$page->run();
