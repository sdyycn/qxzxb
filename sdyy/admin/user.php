<?php
chdir(dirname(__FILE__));
include_once('../configs/path.inc.php');
include_once('configs/config.db.php');
include_once('include/Page.class.php');
include_once('inc/User.class.php');

class AdminUserPage extends AdminPage{
	
	function display(){
		$page = null;
		switch ($this->page)
		{
			case 'admin':
				$page = new UserAdminPage;
				break;
			case 'admingroup':
				$page = new UserAdminPage;
				break;
			case 'user':
				$page = new UserNormalPage;
				break;
			case 'usergroup':
				$page = new UserNormalPage;
				break;
			default:
				$page = new UserNormalPage;
				break;
		}
		$page->display();
	}
}

$page = new AdminUserPage;
$page->run();
