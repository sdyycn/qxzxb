<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('include/Page.class.php');
include('inc/AdminLink.class.php');

class AdminLinkPage extends AdminPage{
	function doAction(){
		switch ($this->action)
		{
			case 'add':
				break;
			case 'delete':
				break;
			default:
					break;
		}
	}
	
	function display(){
		$page = null;
		switch ($this->page){
			case 'add':
				$page = new AdminLinkAddPage;
				break;
			case 'list':
				$page = new AdminLinkListPage;
				break;
			default:
				break;
		}
		$page->display();
	}
}

$page = new AdminLinkPage;
$page->run();
