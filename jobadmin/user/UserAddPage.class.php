<?php
/*
 * @author: maweiguo
 * @date: 2013/7/9
 * @file: UserAdd.class.php
 * 
 */

chdir(dirname(__FILE__));
require_once '../../configs/path.inc.php';
require_once 'include/JobsPage.class.php';
require_once 'include/Logs.class.php';
require_once 'include/JobsPDO.class.php';

class UserAddPage extends AdminPage{
	private $username = null;
	private $password = null;
	
	function __construct(){
		parent::__construct('user_add');
	}
	
	function display(){
		// fix the page data here
		$this->smarty->assign('username', $_SESSION['username']);
		$this->smarty->assign('adminroot', $this->adminroot.'/user');
		parent::display();
	}
	
	private function form_check_useradd(){
		$url_add = $this->adminroot.'/user/userpage.php?page=add';
	
		if (!empty($_REQUEST['username'])){
			$this->username = $_REQUEST['username'];
		} else {
			alert('用户名不能为空', $url_add);
			return false;
		}
		
		if (!empty($_REQUEST['password'])){
			$this->password = $_REQUEST['password'];
		} else {
			alert('密码不能为空', $url_add);
			return false;
		}
		
		return true;
	}
	function doAction(){
		$url_add = $this->adminroot.'/user/userpage.php?page=add';
		if (!$this->form_check_useradd()){
			return;
		}
		
		$table = $GLOBALS['table']['ejob_admin'];
		$pdo = new JobsPDO;
		$sql = "SELECT * FROM $table  WHERE  username = '$this->username'";
		if ($pdo->rowCountSql($sql) > 0){
			alert("用户名已存在!", $url_add);
			return;
		}
		
		$password = md5($this->password);
		$sql = "INSERT INTO $table (username, usertype, password) VALUES('$this->username', 0, '$password')";
		if ($pdo->exec($sql) < 1) {
//			trace($pdo->errorInfo());
			alert("管理员添加失败!", $url_add);
		}

		alert("管理员添加成功!", $url_add);
	}
};
