<?php
/*
 * @author: maweiguo
 * @date: 2013/7/10
 * @file: index.php
 * 
 */

/*/
岗位  ejob_recruit
字段				字段说明			数据类型			备注
recruitid		自增长ID			mediumint	
comid			公司ID			mediumint	
jobname			岗位名称			varchar(60)		unique*
quantity		招聘人数			tinyint	
workplace		工作地点			varchar(60)		要搜索情况是否存储数字
sex				性别要求			tinyint			要搜索情况是否存储数字
workexp			工作经验要求		varchar(60)	
jobnote			工作介绍			longtext	
qualification	学历要求			varchar(60)	
jobtype			工作性质			varchar(10)		全职,兼职要搜索情况是否存储数字
salary			薪资待遇			varchar(60)	
ispause			状态,是否停止	tinyint	
jobindustry		行业类别			smallint	
jobsort			职位类别			smallint	
jobmajor		专业类别			smallint	
viewquantity	浏览次数			smallint	
begindate		起始日期			date	
enddate			结束日期			date	
addtime			发布时间			datetime	
//*/

class Job{
	private $table = null;
	
	var $id = null;
	var $companyid = null;
	var $jobname = null;
	var $quantity = null;
	var $workplace = null;
	var $sex = null;
	var $workexperience = null;
	var $jobnote = null;
	var $qualification = null;
	var $jobtype = null;
	var $salary = null;
	var $ispause = null;
	var $jobindustry = null;
	var $jobsort = null;
	var $jobmajor = null;
	var $viewquantity = null;
	var $begindate = null;
	var $enddate = null;
	var $addtime = null;
	
	function __construct(){
		$this->table = $GLOBALS['table']['ejob_recruit'];
		
	}
	function __get($name){
		return $this->$name;
	}
	function __set($name, $value){
		$this->$name = $value;
	}
	
	function load($jobname){
		$sql = "SELECT * FROM $t WHERE jobname=$jobname";
	}
	
	private function exist($jobname){
		$sql = "SELECT * FROM $t WHERE jobname=$jobname";
		return false;
	}
	private function insert(){
		$sql = "INSERT INTO $this->table VALUES(xxx)";
	}
	private function save(){
		
	}
	function create(){
		if ($this->jobname == null){
			return;
		}
		
		if ($this->exist($this->jobname)){
			$this->save();
		} else {
			$this->insert();
		}
		//*/
	}
	
	function modify(){
		
	}
	
	function delete(){
		
	}
}