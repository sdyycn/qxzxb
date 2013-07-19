<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('configs/config.db.php');
require_once('include/Page.class.php');
require_once('include/MPDO.class.php');
include('inc/AdminIndex.class.php');

class AdminIndexPage extends AdminPage{
//	function __construct(){
//		parent::__construct('admin.html');
//	}
	
	function display(){
		$page = null;
		switch ($this->page)
		{
			case 'top':
				$page = new AdminTopPage;
				break;
			case 'left':
				$page = new AdminLeftPage;
				break;
			case 'main':
				$page = new AdminMainPage;
				break;
			default:
				$page = new AdminPage('admin.html');
				break;
		}
		$page->display();
	}
}

$page = new AdminIndexPage();
$page->run();
?>