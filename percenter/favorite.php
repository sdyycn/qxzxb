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


class FavoritePage extends JobsPage{
	function __construct(){
		parent::__construct('percenter/favorite.html');
	}
	
	function display(){
		$uid = 1;//$_SESSION['uid'];
		$job = new Job;
		$fav = $job->getFavorite($uid);
		if ($fav == null){
			$a['id'] = '1';
			$a['date'] = '2013-7-30';
			$a['company'] = 'limiton inc.';
			$a['jobname'] = 'engineer';
			$a['zone'] = 'shanghai';
			$a['state'] = 'unapply';
			
			$fav[0] = $a;
			$fav[1] = $a;
			$fav[2] = $a;
			$fav[3] = $a;
		}
		$this->smarty->assign('favorite', $fav);
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
			case 'apply':
				$this->handler_apply();
				break;
			case 'applyAll':
				$this->handler_applyAll();
				break;
			default:break;
		}
	}
	
	private function handler_delete(){
		$id = $_REQUEST['id'];
		$job = new Job;
		$job->deleteFavorite($id);
	}

	private function handler_deleteAll(){
		$uid = $_SESSION['uid'];
		$job = new Job;
		$job->deleteAllFavorite($uid);
	}

	private function handler_apply(){
		$id = $_REQUEST['id'];
		$job = new Job;
		$job->applyFavorite($id);
	}

	private function handler_applyAll(){
		$uid = $_SESSION['uid'];
		$job = new Job;
		$job->applyAllFavorite($uid);
	}
}

$page = new FavoritePage;
$page->run();
