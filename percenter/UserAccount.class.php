<?php
/**
 * author:		maweiguo
 * function: 	user password change
 * date: 		2013/7/26
 */

chdir(dirname(__FILE__));
require_once '../configs/path.inc.php';
include('include/JobsPDO.class.php');

class UserAccount{
	function password_change($user, $old, $new){
		return true;
		
		$table = $GLOBALS['table']['eth_ucenter'];
		$pdo = new UCPDO();
		$sql = "UPDATE $table SET password=$new WHERE username=$user AND password=$old";
		$pdo->exec($sql);
		return count($pdo->exec($sql))>0;
	}
	
	function username_change($old, $new, $pwd){
		return true;
		
		$table = $GLOBALS['table']['eth_ucenter'];
		$pdo = new UCPDO();
		$sql = "UPDATE $table SET username=$new WHERE username=$old AND password=$pwd";
		return count($pdo->exec($sql))>0;
	}
}
