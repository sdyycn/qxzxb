<?php
/*
 * @author: maweiguo
 * @date: 2013/7/10
 * @file: Resume.class.php
 * 
 */

/*/
简历  ejob_resume
字段				字段说明			数据类型			备注
resumeid		自增长ID			mediumint	
perid			用户ID			mediumint	
resumename		简历名称			varchar(60)		unique*
edittime		编辑时间			datetime	
ispublic		是否公开			tinyint	
viewquantity	浏览次数			smallint	
jobtype			期望的工作性质	varchar(10)		存数字还是存字符
jobworkplace	期望的工作地点	varchar(60)		存数字还是存字符
jobindustry		期望从事的行业	smallint	
jobsort			期望从事的职位	smallint	
evaluation		自我评价			mediumtext	
schoolpost		校内职务			mediumtext	
schoolprize		奖项情况			mediumtext	
salary			期望月薪			varchar(60)	
workingstate	工作状态			tinyint	
refresh			刷新时间			datetime	
isauto			是否自动刷新		tinyint	
//*/

class Resume{
	var $id = null;
	var $userid = null;
	var $edittime = null;
	var $ispublic = null;
	var $viewquantity = null;
	var $jobtype = null;
	var $jobworkplace = null;
	var $jobindustry = null;
	var $jobsort = null;
	var $evaluation = null;
	var $schoolpost = null;
	var $salary = null;
	var $workingstate = null;
	var $refresh = null;
	var $isauto = null;
	
	// info
	function Resume(){
		
	}
	
	function load(){
		
	}
	function save(){
		
	}
	function create(){
		// if exist{
		// insert for new
		//}else {
		// update for exist
		//}
	}
	function modify(){
		
	}
	function delete(){
		
	}
	function copy(){
		
	}
	function export(){
		
	}
}