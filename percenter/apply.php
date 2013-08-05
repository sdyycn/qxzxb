<?php
/**
 * author:		maweiguo
 * function: 	user password change
 * date: 		2013/8/2
 */

chdir(dirname(__FILE__));
require_once '../configs/path.inc.php';
require_once 'include/JobsPage.class.php';
include('configs/function.php');
include('Job.class.php');


class ApplyPage extends JobsPage{
	function __construct(){
		parent::__construct('percenter/apply.html');
	}
	
	function display(){
		$uid = 1;//$_SESSION['uid'];
		$job = new Job;
		$apply = $job->getApply($uid);
		if ($apply == null){
			$a['id'] = '1';
			$a['date'] = '2013-7-31';
			$a['company'] = 'limiton inc.';
			$a['jobname'] = 'engineer';
			$a['zone'] = 'shanghai';
			$a['num'] = '25';
			
			$apply[0] = $a;
		}
		
		$this->smarty->assign('apply', $apply);
		parent::display();
	}
	
	function doAction(){
		switch ($this->action)
		{
			case 'delete':
				$this->handler_delete();
				break;
			case 'deleteAll':
				$this->handler_deleteAll();
				break;
			default:break;
		}
	}
	
	private function handler_delete(){
		if (empty($_REQUEST['id'])){
			return;
		}
		
		$job = new Job;
		$id = $_REQUEST['id'];
		$job->deleteApply($id);
	}
	private function handler_deleteAll(){
		$uid = 1;//$_SESSION['uid'];
		$job = new Job;
		$job->deleteAllApply($uid);
	}
}

$page = new ApplyPage;
$page->run();
