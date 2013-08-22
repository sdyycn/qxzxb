<?php
/*
 * @author: yangfan
 * @date: 2013/8/3 
 * 
 */


chdir(dirname(__FILE__));
require_once 'configs/path.inc.php';
require_once $config['webpath'].'/include/JobsPage.class.php';
require_once $config['webpath'].'/include/Logs.class.php';
require_once $config['webpath'].'/include/JobsPDO.class.php';

class JobsIndexPage extends JobsPage{
	function __construct(){
		parent::__construct('account/account.html');
	}
	
	function display(){
		// fix the page data here
		
		parent::display();
	}
	
	function doAction(){
		switch ($this->action)
			{
				case 'login':	
				 	 $this->handler_login();					
					break;
				case 'chkUnique':
					$this->chkUnique();					
					break;
				case 'register':
					$this->handler_register();	
					break;			
				default:
					$this->display();
					break;
			}	
		
//		parent::doAction($result);
	}
	function handler_register(){
		if(isset($_REQUEST['account']) && isset($_REQUEST['username']) &&isset($_REQUEST['password']) &&
		   isset($_REQUEST['regWay']) && isset($_REQUEST['regRole'])){
			$account = $_REQUEST['account'];
			$username = $_REQUEST['username'];
			$password = md5($_REQUEST['username']);
			$regWay = $_REQUEST['regWay'];
			$regRole = $_REQUEST['regRole'];			
		}else{
			$res['status'] = 'false';
			$res['msg'] = "请将注册信息填写完整";
			echo json_encode($res);
			return;
		}
		
		$table = $GLOBALS['table']['eth_ucenter'];
		$ucpdo = new UCPDO();
		$jobtable = "";
		$jobpdo = new JobsPDO();
		//根据注册类型，选择相应表		
		if($regRole == 'jobHunter'){
			$jobtable = $GLOBALS['table']['ejob_uperson'];			
		}else{
			$jobtable = $GLOBALS['table']['ejob_ucompany'];			
		}
		
		$client_ip = $_SERVER['REMOTE_ADDR'];
		$num =  1;
		$sql = "INSERT INTO $table SET $regWay = '$account', username = '$username', password = '$password', lastlogintime=NOW(), lastloginip = '$client_ip',  loginquantity = $num  ";
		$jobsql = "INSERT INTO $jobtable SET  $regWay = '$account', username = '$username',password = '$password', lastlogintime=NOW(), lastloginip = '$client_ip',  loginquantity = $num  ";		
		//关联插入 limijobs && ucenter
		try{
		$jobpdo->begin();
		$count1 =  $jobpdo->exec($jobsql);
		$count2 = $ucpdo->exec($sql);		
		$jobpdo->commit();
			if ($count1 > 0 && $count2 > 0) {			
				$res['status'] = 'true';
				$res['msg'] = '亲，恭喜您，成为limitoner!该账号可以直接登录ethercar,ethercafe。:3';
				echo json_encode($res);
				return;
			} else { 
				trace($jobpdo->errorInfo());	
				$res['status'] = 'false';
				$res['msg'] = '系统繁忙。。。请稍后重试:2';
				echo json_encode($res);
				return;
			} 
		}catch(Exception $e){
			$jobpdo->rollBack();
			$res['status'] = 'false';
			$res['msg'] = $e->getMessage().'注册失败，数据库关联插入出现异常：1';
			echo json_encode($res);
			return;
		}
	}
	function chkUnique(){
		$regWay = "";
		$account = "";
		$username = "";
		$case = 0;
		if(isset($_REQUEST['regWay']) && isset($_REQUEST['account'])){
			$regWay = $_REQUEST['regWay'];
			$account = $_REQUEST['account'];
			$case = 1;
		}else if(isset($_REQUEST['username'])){
			$username = $_REQUEST['username'];
			$case = 2;
		}else{alert("认证号或用户名不存在");return;}
		
		$table = $GLOBALS['table']['eth_ucenter'];;
		$pdo = new UCPDO();	
		$sql = "";
		if($case == 1){
		$sql = "SELECT * FROM $table WHERE $regWay='$account'";
		}else if($case == 2){
		$sql = "SELECT * FROM $table WHERE username='$username'";
		}	
					
		if(!$chkstmt=$pdo->query($sql)){trace($pdo->errorInfo()); return;}	
		$chknum =count($chkstmt->fetchAll());		
		if ($chknum > 0)
		{			
			$res['status'] = 'false';
			echo json_encode($res);
			return;
		}else{
			$res['status'] = 'true';
			echo json_encode($res);
			return;
		}
	}
	
	
};

$index = new JobsIndexPage;
$index->run();
