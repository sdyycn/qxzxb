<?php
/**
 * author:		maweiguo
 * function: 	user password change
 * date: 		2013/7/30
 */

chdir(dirname(__FILE__));
require_once '../configs/path.inc.php';
include('include/JobsPDO.class.php');

class Job{
	
	/**
	 * ejob_perinterview  个人收到的面试岗位
	 * Id			自增长ID		mediumint
	 * perid		个人ID		mediumint
	 * recruitid	岗位ID		mediumint
	 * comid		公司ID		int
	 * senddate		发送时间		datetime
	 * title		信件主题	
	 * note			信件内容	
	 * state		处理状态		tinyint
	 * 
	 */
	function getInterviews($uid){
		$pdo = new JobsPDO;
		$t1 = $GLOBALS['table']['ejob_perinterview'];
		$t2 = $GLOBALS['table']['ejob_ucompany'];
		$sql = "SELECT Id, t2.comname as company, senddate as date, note as content, title FROM $t1 as t1, $t2 as t2 WHERE t2.comid=t1.comid AND t1.perid=$uid LIMIT 0, 30";
		$rs = $pdo->query($sql);
		if (count($rs) > 0){
			return $rs;
		} else {
			return null;
		}
	}
	
	function getInterview($id){
		$pdo = new JobsPDO;
		$t1 = $GLOBALS['table']['ejob_perinterview'];
		$t2 = $GLOBALS['table']['ejob_recruit'];
		$t3 = $GLOBALS['table']['ejob_ucompany'];
		$sql = "SELECT note as content, title, senddate as date, t2.jobname, t3.comname as company FROM $t1 as t1, $t2 as t2, $t3 as t3 WHERE t3.comid=t1.comid AND t2.recruitid=t1.recruitid AND Id=$id";
		$rs = $pdo->query($sql);
		if (count($rs) > 0){
			return $rs;
		} else {
			return null;
		}
	}
	
	function deleteInterview($id){
		$pdo = new JobsPDO;
		$t1 = $GLOBALS['table']['ejob_perinterview'];
		$sql = "DELETE FROM $t1 WHERE Id=$id";
		$rs = $pdo->exec($sql);
		return ($rs > 0);
	}
	
	/**
	 * 24  ejob_perapply 个人申请记录
	 * 字段			字段说明		数据类型		备注
	 * Id			自增长ID		mediumint	
	 * perid		个人ID		mediumint	
	 * comid		公司ID		mediumint	
	 * recruitid	岗位ID		mediumint	
	 * senddate		发送时间		datetime	
	 * isread		是否已读		tinyint	
	 * zone			地区			varchar(30)
	 * @param $uid
	 */
	function getApply($uid){
		$pdo = new JobsPDO;
		$t1 = $GLOBALS['table']['ejob_perapply'];
		$t2 = $GLOBALS['table']['ejob_recruit'];
		$t3 = $GLOBALS['table']['ejob_ucompany'];
		$t4 = $GLOBALS['table']['ejob_comapplyer'];

		$sql = "SELECT Id as id, senddate as date, t2.jobname, t3.comname as company, zone, (SELECT COUNT(*) FROM $t4 as t4 WHERE t4.recruitid=t1.recruitid) as num FROM $t1 as t1, $t2 as t2, $t3 as t3 WHERE t3.comid=t1.comid AND t2.recruitid=t1.recruitid AND perid=$uid";

		$rs = $pdo->query($sql);
		if (count($rs) > 0){
			return $rs;
		} else {
			return null;
		}
	}
	
	function deleteApply($id){
		$pdo = new JobsPDO;
		$t1 = $GLOBALS['table']['ejob_perapply'];
		$sql = "DELETE FROM $t1 WHERE Id=$id";
		$rs = $pdo->exec($sql);
		return ($rs > 0);
	}
	function deleteAllApply($uid){
		$pdo = new JobsPDO;
		$t1 = $GLOBALS['table']['ejob_perapply'];
		$sql = "DELETE FROM $t1 WHERE perid=$uid";
		$rs = $pdo->exec($sql);
		return ($rs > 0);
	}
	
	/**
	 * 23  ejob_perfavorite个人岗位收藏  岗位收藏后要执行什么操作？
	 * 字段			字段说明		数据类型	备注
	 * Id			自增长ID		mediumint	
	 * perid		个人ID		mediumint	
	 * recruitid	岗位ID		mediumint	
	 * addtime		收藏时间		datetime	
	 * state		处理状态		tinyint	
	 * @param unknown_type $id
	 */
	function getFavorite($uid){
		$pdo = new JobsPDO;
		$t1 = $GLOBALS['table']['ejob_perfavorite'];
		$t2 = $GLOBALS['table']['ejob_recruit'];
		$t3 = $GLOBALS['table']['ejob_ucompany'];

		$sql = "SELECT Id as id, addtime as date, t2.jobname, t3.comname as company, zone, CASE state WHEN '1' then 'applyed' ELSE 'unapply' END FROM $t1 as t1, $t2 as t2, $t3 as t3 WHERE t3.comid=t1.comid AND t2.recruitid=t1.recruitid AND perid=$uid";

		$rs = $pdo->query($sql);
		if (count($rs) > 0){
			return $rs;
		} else {
			return null;
		}
	}
	function applyFavorite($id){
		
	}
	function applyAllFavorite($uid){
		
	}
	function deleteFavorite($id){
		$pdo = new JobsPDO;
		$t1 = $GLOBALS['table']['ejob_perfavorite'];
		$sql = "DELETE FROM $t1 WHERE Id=$id";
		$rs = $pdo->exec($sql);
	}
	function deleteAllFavorite($uid){
		$pdo = new JobsPDO;
		$t1 = $GLOBALS['table']['ejob_perfavorite'];
		$sql = "DELETE FROM $t1 WHERE perid=$uid";
		$rs = $pdo->exec($sql);
	}
}