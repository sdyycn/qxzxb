<?php
chdir(dirname(__FILE__));
include_once('../configs/path.inc.php');
include_once('configs/config.db.php');
include_once('include/Page.class.php');
include('inc/Guestbook.class.php');


class GuestbookPage extends AdminPage{
	function doAction(){
		
	}
	
	function display(){
		$page = null;
		switch ($this->page)
		{
			case 'setting':
				$page = new GuestbookSettingPage;
				break;
			case 'list':
				$page = new GuestbookListPage;
				break;
			default:
				break;
		}
		
		$page->display();
	}
}

$page = new GuestbookPage;
$page->run();