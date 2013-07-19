<?php
/*
 * @author: maweiguo
 * 
 */

chdir(dirname(__FILE__));
require_once '../configs/path.inc.php';
require_once ADMIN_FOLDER.'/check.php';
require_once 'include/JobsPage.class.php';

class TopFramePage extends AdminPage{
	function __construct(){
		parent::__construct("index_top.html");
	}
	
	function display(){
		$username = '';
		if (isset($_SESSION['username'])){
			$username = $_SESSION['username'].', ';
		}
		
		$lastlogin = '!';
		if (isset($_SESSION['lastlogintime'])){
			$lastlogin = ", 你上次登录的时间是：".$_SESSION['lastlogintime'].', ';
		}

		$ip = '';
		if (isset($_SESSION['lastloginip'])){
			$ip = "IP: ".$_SESSION['lastloginip'];
		}

		$welcome = "你好, $username 欢迎光临以太乔布斯网站管理系统 $lastlogin $ip";

		$this->smarty->assign('welcome', $welcome);
		
		parent::display();
	}
}

class MainFramePage extends AdminPage{
	function __construct(){
		parent::__construct("index_main.html");
	}
	
	function display(){
		$this->smarty->assign('server_name', $_SERVER['SERVER_NAME']);
		$this->smarty->assign('server_ip', $_SERVER['SERVER_ADDR']);
		$this->smarty->assign('server_port', $_SERVER['SERVER_PORT']);
		$this->smarty->assign('server_time', $_SERVER['REQUEST_TIME']);
		$this->smarty->assign('server_software', $_SERVER['SERVER_SOFTWARE']);
		$this->smarty->assign('server_max_execution_time', getenv('max_execution_time'));
		parent::display();
	}
	
}

class AdminIndexPage extends AdminPage{
	function __construct(){
//		parent::__construct();
		if (isset($_REQUEST['frm'])){
			$this->page = $_REQUEST['frm'];
		} else {
			$this->page = "index";
		}
	}
	
	function display(){
		$page = null;
		switch ($this->page)
		{
			case 'top':
				$page = new TopFramePage;
				break;
			case 'left':
				$page = new AdminPage("index_left.html");
				break;
			case 'btn':
				$page = new AdminPage("index_btn.html");
				break;
			case 'main':
				$page = new MainFramePage;
				break;

			case 'index':
			default:
				$page = new AdminPage("admin_index.html");
				$page->smarty->assign('title', "以太乔布斯网站管理系统");
				break;
		}
		$page->display();
	}
}

// http://localhost/admin_index.php
$page = new AdminIndexPage;
$page->run();
