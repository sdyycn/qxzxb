<?php
/*
 * @author: maweiguo
 * @date: 2013/7/18
 * @file: Data.class.php
 * 
 */

chdir(dirname(__FILE__));
require_once '../../configs/path.inc.php';
require_once 'include/Logs.class.php';
require_once 'include/JobsPDO.class.php';

interface IData{
	public function add();
	public function delete();
	public function edit();
};

class Data extends IData{
	private $table = null;		// $table name
	private $pdo = null;
	
	public function __construct(){
		$this->pdo = new JobsPDO();
	}
	
	public function add($data){
		$this->pdo->insert($this->table, $data);
	}
	
	public function delete($data){
		$conditions = '';
		$this->pdo->delete($this->table, $data, $conditions);
	}
	
	public function edit($data){
		$conditions = '';
		$this->pdo->update($this->table, $data, $conditions);
	}
}
