<?php
/**
 * author:		maweiguo
 * function: 	user password change
 * date: 		2013/7/26
 */

chdir(dirname(__FILE__));
require_once '../configs/path.inc.php';
require_once 'include/JobsPage.class.php';
include('UserAccount.class.php');
include('configs/function.php');

class AccountPage extends JobsPage{
	function __construct(){
		parent::__construct('percenter/account.html');
	}
	
	function display(){
		parent::display();
	}
	
	function doAction(){
		switch ($this->action){
			case 'pwd':
				$this->handler_password();
				break;
			case 'account':
				$this->handler_account();
				break;
			default:break;
		}
	}
	
	private function handler_password(){
		if (empty($_REQUEST['oldpassword'])){
			// 请输入旧密码
			return false;
		}
		
		if (empty($_REQUEST['newpassword'])){
			// 请输入密码
			return false;
		}
	
		if (empty($_REQUEST['newpassword2'])){
			// 请输入密码
			return false;
		}
		
		$old = $_REQUEST['oldpassword'];
		$new= $_REQUEST['newpassword'];
		$pwd2= $_REQUEST['newpassword2'];
		if ($new != $pwd2){
			// 请进入密码修改页面修改密码
			return false;
		}
		if ($old == $new){	// 新密码与旧密码相同
			alert('change successful!', 'account.php');
			return false;
		}
		
		$username = $_SESSION['username'];
		$user = new UserAccount;
		if ($user->password_change($username, $old, $new)){
			alert('change successful!', 'account.php');
		} else {
			alert('change failed!', 'account.php');
		}
	}
	
	private function handler_account(){
		if (empty($_REQUEST['oldusername'])){
			// 请输入旧帐号
			return false;
		}
		
		if (empty($_REQUEST['password'])){
			// 请输入密码
			return false;
		}
	
		if (empty($_REQUEST['newusername'])){
			// 请输入新帐号
			return false;
		}
		
		$old = $_REQUEST['oldusername'];
		$pwd = $_REQUEST['password'];
		$new = $_REQUEST['newusername'];

		$username = $_SESSION['username'];
		if ($username != $old){
			// 错误的账户名
			return false;
		}
		
		if ($old == $new){ // 新账户与旧账户名相同
			alert('change successful!', 'account.php');
			return false;
		}
		$user = new UserAccount;
		if ($user->username_change($old, $new, $pwd)){
			alert('change successful!', 'account.php');
		} else {
			alert('change failed!', 'account.php');
		}
	}
}

$page = new AccountPage;
$page->run();