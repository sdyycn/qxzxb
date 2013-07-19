<?php
/*
 * @author: maweiguo
 * @date: 2013/7/9
 * @file: UserPassword.class.php
 * 
 */

chdir(dirname(__FILE__));
require_once '../../configs/path.inc.php';
require_once 'include/JobsPage.class.php';
require_once 'include/Logs.class.php';

class UserPasswordPage extends AdminPage{
	function __construct(){
		parent::__construct('user_pass');
	}
	
	function display(){
		// fix the page data here
		$this->smarty->assign('username', $_SESSION['username']);
		$this->smarty->assign('adminroot', $this->adminroot.'/user');
		parent::display();
	}
};
