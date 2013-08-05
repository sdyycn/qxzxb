<?php
/**
 * author:		maweiguo
 * function: 	user password change
 * date: 		2013/7/30
 */

chdir(dirname(__FILE__));
require_once '../configs/path.inc.php';
require_once 'include/JobsPage.class.php';
include('configs/function.php');
include('Job.class.php');


class LetterPage extends JobsPage{
	function __construct(){
		parent::__construct('percenter/letter.html');
	}
	
	function display(){
		$uid = 1;//$_SESSION['uid'];
		$job = new Job();
		$interviews = $job->getInterviews($uid);
		if ($interviews == null){
			$letter['id'] = '1';
			$letter['company'] = 'limiton inc.';
			$letter['title'] = 'interview';
			$letter['date'] = date('Y-m-d');
			
			$interviews['1'] = $letter;
//			$interviews['2'] = $letter;
//			$interviews['3'] = $letter;
		}

		$this->smarty->assign('interviews', $interviews);
		parent::display();
	}
	
	function doAction(){
		switch ($this->action){
			case 'view':
				$this->handler_view();
				break;
			case 'delete':
				$this->handler_delete();
				break;
			default:break;
		}
	}
	
	private function handler_view(){
		$res = null;
		if (empty($_REQUEST['id'])){
			$res['status'] = false;
			$res['code'] = '-1';
			$res['msg'] = 'id is null';
		} else {
			$id = $_REQUEST['id'];
			$job = new Job;
			$res = $job->getInterview($id);
			if ($res == null){
				$res['title'] = 'test title';
				$res['company'] = 'test company';
				$res['date'] = '2013-7-31';
				$res['content'] = 'test content';
				$res['jobname'] = 'test jobname';
//				$res['status'] = false;
//				$res['code'] = '-2';
//				$res['msg'] = 'null data!';
			}
		}
		
		echo json_encode($res);
	}
	
	private function handler_delete(){
		$res = null;
		if (empty($_REQUEST['id'])){
			$res['status'] = false;
			$res['code'] = '-1';
			$res['msg'] = 'id is null';
		} else {
			$id = $_REQUEST['id'];
			$job = new Job;
			if ($job->deleteInterview($id) == true){
				$res['status'] = true;
				$res['code'] = 0;
				$res['msg'] = 'delete successful!';
			} else {
				$res['status'] = false;
				$res['code'] = '-2';
				$res['msg'] = 'delete failed';
			}
		}
		
		echo json_encode($res);
	}
}

$page = new LetterPage;
$page->run();