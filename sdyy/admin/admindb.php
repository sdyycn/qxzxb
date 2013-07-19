<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('include/Page.class.php');
include('inc/AdminDB.class.php');

class AdminDBPage extends AdminPage{
	function doAction(){
		switch ($this->action)
		{
			case 'restore':
//				$this->handler_restore();
				break;
			case 'delete':
//				$this->handler_delete();
				break;
			default:
				break;
		}
	}
	
	private function handler_restore(){
		if (!empty($_REQUEST['f1'])){
			$file = $_REQUEST['f1'];
			$handler = new AdminDB;
			$handler->restore($file);
			
			msg("数据还原成功");
		}
	}
	private function handler_delete(){
		if (!empty($_REQUEST['f1'])){
			$file = $_REQUEST['f1'];
			$handler = new AdminDB;
			$handler->delete($file);
			
			msg($fl.'文件删除成功','?action=import');
		}
	}
	
	function display(){
		$page = null;
		switch ($this->page)
		{
			case 'restore':
				$page = new AdminDBImportPage;
				break;
			default:
				$page = new AdminDBBackupPage;
				break;
		}
		$page->display();
	}
}

$page = new AdminDBPage;
$page->run();