<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('configs/config.db.php');
require_once('include/Page.class.php');
include('inc/AdminSite.class.php');


class AdminSitePage extends AdminPage{
	function display(){
		$page = null;
		switch ($this->page)
		{
			case 'info':
				$page = new AdminInfoPage;
				break;
			case 'sys':
				$page = new AdminSysPage;
				break;
			case 'lang':
				$page = new AdminLangPage;
				break;
			case 'home':
				$page = new AdminHomePage;
				break;
			case 'market':
				$page = new AdminMarketPage;
				break;
			case 'keywords':
				$page = new AdminKeywordsPage;
				break;
			case 'flash':
				$page = new AdminFlashPage;
				break;
			default:
				break;
		}
		
		$page->display();
	}
}

$page = new AdminSitePage;
$page->run();