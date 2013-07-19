<?php
/*
 * @author: maweiguo
 * 
 * @table: ejob_admin
 * 	字段				字段说明			数据类型				备注
 * @id				自增长ID			smallint	
 * @username		用户名			varchar(60)	
 * @password		密码				varchar(120)	
 * @usertype		用户级别			tinyint				超级管理员|普通管理员
 * @islock			用户是否锁定		tinyint	
 * @lastloginip		上次登录IP		varchar(60)	
 * @lastlogintime	上次登录时间		datetime	
 * @thisloginip		本次登录IP		varchar(60)	
 * @thislogintime	本次登录时间		datetime	
 * @loginquantity	登录次数			smallint	
 * 
 */

chdir(dirname(__FILE__));
require_once '../../configs/path.inc.php';
require_once 'configs/function.php';
require_once 'include/JobsPDO.class.php';

class AdminUser {
	private $username = null;
	private $password = null;
	private $pdo = null;
	private $table = null;
	private $id = null;
	private $oldpassword = null;
	private $url = null;
	
	function AdminUser($id, $username, $password, $oldpassword){
		$this->table = $GLOBALS['table']['ejob_admin']; 
		$this->pdo = new JobsPDO();

		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
		$this->oldpassword = $oldpassword;
		
		$this->url = $GLOBALS['config']['adminroot']."/user/userpage.php";
	}
	
	function doAction($action){
		switch ($action)
		{
			case 'add':
				$this->add();
				break;
			case 'delete':
				$this->delete();
				break;
			case 'edit':
				$this->update();
				break;
			default:
				break;
		}
	}
	
	private function checkUser(){
		if ($this->username == null)
			return false;
		
		return true;
	}

	private function checkPassword(){
		if ($this->password == null)
			return false;
		
		return true;
	}
	
	private function add(){
		$url_add = $this->url.'?page=add';
//		echo $url_add;
		if (!$this->checkUser()
		||!$this->checkPassword()){
			alert("管理员添加失败!", $url_add);
			return;
		}
		
		$table = $this->table;
		$pdo = $this->pdo;
		$username = $this->username;
		$sql = "SELECT * from $table  WHERE  username = '$username'";
		if ($pdo->rowCountSql($sql) > 0){
			alert("用户名已存在!", $url_add);
			return;
		}
		
		$password = md5($this->password);
		$sql = "INSERT INTO $table (username, usertype, password) VALUES('$username', 0, '$password')";
		if ($pdo->exec($sql) < 1) {
//			trace($pdo->errorInfo());
			alert("管理员添加失败!", $url_add);
		}

		alert("管理员添加成功!", $url_add);
	}
	
	private function delete(){
		$url_list = $this->url.'?page=list';
		if ($this->id == null) {
			alert("管理员删除失败!", $url_list);
			return;
		}
		if ($this->id == 1) {
			alert("管理员删除失败!", $url_list);
			return;
		}
		
		$table = $this->table;
		$pdo = $this->pdo;
		$id = $this->id;
		$sql = "DELETE FROM $table WHERE id=$id";
		
		if ($pdo->exec($sql) < 1) {
//			trace($pdo->errorInfo());
			alert("管理员删除失败!", $url_list);
		}

		alert("管理员删除成功!", $url_list);
	}
	
	private function update(){
		$url_pass = $this->url.'?page=pwd';
		if ($this->username == null
		|| $this->password == null
		|| $this->oldpassword == null){
//			trace($this->username);
//			trace($this->password);
//			trace($this->oldpassword);
			alert("密码修改失败!", $url_pass);
			return;
		}
		
		$table = $this->table;
		$pdo = $this->pdo;
		$username = $this->username;
		$oldpassword = $this->oldpassword;
		
		$sql = "SELECT password FROM $table WHERE username = '$username'";
		$stmt = $pdo->query($sql);
		$dbpass = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

		if ($dbpass[0] != md5($oldpassword)) {
//			trace($pdo->errorInfo());
			alert("密码修改失败!", $url_pass);
			return;
		}
		
		$password = md5($this->password);
		$sql = "UPDATE $table SET password = '$password' WHERE username = '$username'";
		
		if ($pdo->exec($sql) < 1) {
//			trace($pdo->errorInfo());
			alert("密码修改失败!", $url_pass);
		}

		alert("密码修改成功!", $url_pass);
	}
}
