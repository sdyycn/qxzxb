<?php
chdir(dirname(__FILE__));
require_once('configs/config.db.php');
require_once('include/Page.class.php');
include('include/MPDO.class.php');

class AdminDB {
	function restore($f1){
		$data=@file_get_contents(DATA_PATH.'backup/'.$fl);
		$data=explode(";\n",trim($data));
		if(!empty($data)){
			foreach($data as $k=>$v){
				$GLOBALS['mysql']->query($v);
			}
		}
	}
	
	function delete($f1){
		@unlink(DATA_PATH.'backup/'.$fl);
	}
}
class AdminDBBackupPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_db_backup.html');
	}
	
	function display(){
		$sql = "SHOW TABLE STATUS FROM ".DB_NAME;
		$pdo = new MPDO();
		$stmt = $pdo->query($sql);
		$files = $stmt->fetchAll();
		$this->smarty->assign('files', $files);
		
		$file = date('YmdHms',time()).'.sql';
		$this->smarty->assign('backupfile', $file);
		parent::display();
	}
}

class AdminDBImportPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_db_import.html');
	}
	
	function display(){
		$path = DATA_PATH.'/backup/';
		$handler = @opendir($path);
		$files = array();
		if ($handler){
			
			while (false !== ($file=readdir($handler))){
				$files['name'] = $file;
				$files['time'] = date('Y-m-d H:m:s',(filemtime($path.$file)));
				$files['size'] = (filesize($path.$file)/1000).'k';
			}
		}
		
		$this->smarty->assign('files', $files);

		parent::display();
	}
}
