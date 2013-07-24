<?php
/*
 * @author: maweiguo
 * 
 */

chdir(dirname(__FILE__));
require_once '../../configs/path.inc.php';
require_once ADMIN_FOLDER.'/user/AdminUser.class.php';
require_once ADMIN_FOLDER.'/check.php';
require_once 'include/JobsPage.class.php';
require_once ADMIN_FOLDER.'/user/UserListPage.class.php';
require_once ADMIN_FOLDER.'/user/UserAddPage.class.php';
require_once ADMIN_FOLDER.'/user/UserPasswordPage.class.php';

// UserPage Controller
class UserPage extends AdminPage{
	function __construct(){
		parent::__construct();
	}

	function display(){
		$page = null;
		switch ($this->page)
		{
			case 'add':
				$page = new UserAddPage;
				break;
			case 'pwd':
				$page = new UserPasswordPage;
				break;
			case 'list':
			default:
				$page = new UserListPage;
				break;
		}
		$page->display();
	}

	function doAction(){
		if ($this->action == 'add'){	// it's a example use run($action), split the actions in different class.
			$act = new UserAddPage;
			$act->doAction();
			return;
		}
		$id = null;
		if (isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];
		}
		$username = null;
		if (isset($_REQUEST['username'])){
			$username = $_REQUEST['username'];
		}
		$password = null;
		if (isset($_REQUEST['password'])){
			$password = $_REQUEST['password'];
		}
		$oldpassword = null;
		if (isset($_REQUEST['oldpassword'])){
			$oldpassword = $_REQUEST['oldpassword'];
		}
		
		$user = new AdminUser($id, $username, $password, $oldpassword);	// another example: all the same db operation in AdminUser class.
		$user->doAction($this->action);
	}
}

$page = new UserPage;
$page->run();
