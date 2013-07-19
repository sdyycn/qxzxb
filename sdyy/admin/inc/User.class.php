<?php
chdir(dirname(__FILE__));
include_once('../../configs/path.inc.php');
include_once('configs/config.db.php');
include_once('include/Page.class.php');

class UserAdminPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_admin.html');
	}
	function display(){
		parent::display();
	}
}

class UserNormalPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_member.html');
	}
	function display(){
		parent::display();
	}
}
