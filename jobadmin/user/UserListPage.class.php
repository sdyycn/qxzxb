<?php
/*
 * @author: maweiguo
 * @date: 2013/7/9
 * @file: UserList.class.php
 * 
 */

chdir(dirname(__FILE__));
require_once '../../configs/path.inc.php';
require_once 'include/JobsPage.class.php';
require_once 'include/Logs.class.php';
require_once 'include/JobsPDO.class.php';

class UserListPage extends AdminPage{
	function __construct(){
		parent::__construct('user_list');
	}
	
	function display(){
		// fix the page data here
		$table = $GLOBALS['table']['ejob_admin'];
		$sql = "SELECT id, username as name, CASE WHEN usertype = 1 THEN '超级管理员' ELSE '普通管理员' END as type FROM $table";
		$pdo = new JobsPDO();
		$stmt = $pdo->query($sql);
		$users = $stmt->fetchAll();
		
		$this->smarty->assign('users', $users);
		$this->smarty->assign('adminroot', $this->adminroot.'/user');
		parent::display();
	}
};
