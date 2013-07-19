<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('/configs/config.db.php');
require_once('/include/Page.class.php');
require_once('/include/MPDO.class.php');
require_once('/include/MHelper.class.php');

class LoginPage extends AdminPage{
	private $user = null;
	private $password = null;
	private $code = null;
	private $sumbit = null;
	
	function __construct(){
		if (!session_id()){
			session_start();
		}
		
		parent::__construct('login.html');

		$this->action = empty($_GET['action'])? 'display' : $_GET['action'];
	}
	
	function display(){
		$_SESSION['login_in'] = empty($_SESSION['login_in'])? '' : $_SESSION['login_in'];
		$_SESSION['admin'] = empty($_SESSION['admin'])? '' : $_SESSION['admin'];

		if ($_SESSION['login_in'] && $_SESSION['admin']){
			header("location:admin.php");
		} else {
			parent::display();
		}
	}
	
	function doAction(){
		switch ($this->action)
		{
			case 'login':
				$this->handler_login();
				break;
			case 'logout':
				$this->handler_logout();
				break;
			default:
				break;
		}
	}
	
	private function check_login(){
		if (empty($_POST['code'])){
			MHelper::alert('请输入验证码!', 'login.php');
			return false;
		}
		$this->code = $_POST['code'];
		if ($this->code != $_SESSION['code']){
//			trace($code);
//			trace($_SESSION['code']);
			MHelper::alert("验证码不正确！", 'login.php');
			return false;
		}
		
		if (empty($_POST["user"]) || empty($_POST['password'])){
			MHelper::alert("密码或用户名不能为空", 'login.php');
			return false;
		}
		$this->user = $_POST["user"];
		$this->password = $_POST['password'];
		
		if (empty($_POST['submit'])){
			MHelper::alert('请从登陆页面进入', 'login.php');
			return false;
		}
		$this->submit = $_POST['submit'];

		return true;
	}
	private function handler_login(){
		if (!$this->check_login()){
			return;
		}
		$submit = $this->submit;
		$user = htmlspecialchars($this->user);
		$password = htmlspecialchars($this->password);

		$table = $GLOBALS['table']['admin'];
		$sql = "SELECT id, admin_name, admin_password, admin_purview, is_disable FROM $table ";
		$sql .= "WHERE admin_name='$user' LIMIT 0,1";
		$pdo = new MPDO();
		$res = $pdo->exec($sql);
		if (empty($rel)){
			MHelper::alert('不存在该管理用户', 'login.php');
			return;
		}
		$password = md5($password);
		if ($password != $rel['admin_password']){
			MHelper::alert('输入的密码不正确', 'login.php');
			return;
		}
		if ($rel['is_disable']){
			MHelper::alert('该账号已经被锁定,无法登陆', 'login.php');
			return;
		}

		$_SESSION['admin'] = $rel['admin_name'];
		$_SESSION['admin_purview'] = $rel['admin_purview'];
		$_SESSION['admin_id'] = $rel['id'];
		$_SESSION['admin_time'] = time();
		$_SESSION['login_in'] = 1;
		$_SESSION['login_time'] = mktime();
		$ip = htmlspecialchars(MHelper::get_ip());
		$_SESSION['admin_ip'] = $ip;
		unset($rel);
		
		header("location:admin.php");
	}

	private function handler_logout(){
		if (isset($_SESSION['admin_ip'])
		&&isset($_SESSION['admin_time'])
		&&isset($_SESSION['admin_id'])){
			$table = $GLOBALS['table']['admin'];
			$adminip = $_SESSION['admin_ip'];
			$admintime = $_SESSION['admin_time'];
			$adminid = $_SESSION['admin_id'];
			$sql = "UPDATE $table SET admin_ip=$adminip, admin_time=$admintime WHERE id=$adminid";
			$pdo = new MPDO();
			$pdo->exec($sql);
		}
		
		$_SESSION = array();
		unset($_SESSION);
		session_destroy();
		
		MHelper::alert('已经退出', 'login.php');
	}
}

$page = new LoginPage;
$page->run();