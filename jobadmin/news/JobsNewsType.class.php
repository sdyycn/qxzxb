<?php
/*
 * @author: maweiguo
 * 
 * @table: ejob_news
 * 字段				字段说明		数据类型		备注
 * @newsid			自增长ID		mediumint	
 * @newssortid		资讯类别		tinyint	
 * @newstitle		资讯标题		varchar(100)	
 * @pic				缩略图		varchar(200)	
 * @newscontent		资讯内容		longtext	
 * @author			作者			varchar(20)	
 * @source			来源			varchar(60)	
 * @addtime			添加时间		datetime	
 * @edittime		编辑时间		datetime	
 * @viewquantity	浏览次数		smallint	
 * 
 */

chdir(dirname(__FILE__));
require_once '../../configs/path.inc.php';
require_once 'configs/function.php';
require_once 'include/JobsPDO.class.php';

class JobsNewsType {
	private $table = null;
	private $pdo = null;
//	private $url_newstype = "news_type.php";
	private $result = null;
//		$res['status'] = 'false';
//		$res['msg'] = "删除失败: ";
//		$res['sql'] = $sql;
//		$res['error'] = $pdo->errorInfo();

	private $name = null;
	private $id = null;
	// newssortid	自增长ID	smallint
	// newsortname	类别名称	varchar(20)
	
	function JobsNewsType(){
		$this->table = $GLOBALS['table']['ejob_newssort'];
		$this->pdo = new JobsPDO;
	}
	
	function getResult(){
		return $this->result;
	}
	
	function setName($typename){
		$this->name = $typename;
	}
	function setId($typeid){
		$this->id = $typeid;
	}
	
	function doAction($action){
		switch ($action)
		{
			case 'add':
				$this->add($this->name);
				break;
			case 'edit':
				$this->edit($this->id, $this->name);
				break;
			case 'delete':
				$this->delete($this->id);
				break;
			default:
				break;
		}
	}
	
	private function add($typename){
		$table = $this->table;
		$pdo = $this->pdo;
		
		// alert if typename already exist.
		$sql = "SELECT * FROM $table WHERE newsortname='$typename'";
		$ret = $pdo->rowCountSql($sql);

		$res = array();
		if ($ret > 0)
		{
			$res['status'] = 'false';
			$res['data'] = "该类型已经存在: $typename";
//			alert("该类型已经存在: $typename .", $this->url_newstype);
		}
		else
		{
			$sql = "INSERT INTO $table SET newsortname = '$typename'";
			$ret = $pdo->exec($sql);
			
			if ($ret > 0) {
				$res['status'] = 'true';
				$res['msg'] = "添加成功!";
				
				$sql = "SELECT newssortid as id FROM $table WHERE newsortname='$typename'";
				$stmt = $pdo->query($sql);
				$id = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

				$res['id'] = $id[0];
				$res['typename'] = $typename;
//				alert("添加成功！", $this->url_newstype);
			} else {
				$res['status'] = 'false';
				$res['msg'] = "添加失败! ";
				$res['sql'] = $sql;
				$res['error'] = $pdo->errorInfo();
				//alert("添加失败！", $this->url_newstype);
			}
		}
		
		$this->result = json_encode($res);
	}
	
	private function delete($id) {
		$table = $this->table;
		$pdo = $this->pdo;
		
		$sql = "DELETE from $table WHERE newssortid = '$id'";
		$ret = $pdo->query($sql);
		
		$res = array();
		if ($ret != false) {
			$res['status'] = 'true';
			$res['msg'] = "删除成功! ";
			$res['id'] = $id;
		} else {
			$res['status'] = 'false';
			$res['msg'] = "删除失败: ";
			$res['sql'] = $sql;
			$res['error'] = $pdo->errorInfo();
		}
		
		$this->result = json_encode($res);
	}
	
	private function edit($id, $typename){	
		$table = $this->table;
		$pdo = $this->pdo;
		
		$sql = "UPDATE $table SET newsortname = '$typename' WHERE newssortid = '$id'";
		$ret = $pdo->exec($sql);

		$res = array();
		if ($ret > 0) {
			$res['status'] = 'true';
			$res['msg'] = "修改成功!";
			$res['id'] = $id;
			$res['typename'] = $typename;
//			alert("修改成功!", $this->url_newstype);
		} else {
			$res['status'] = 'false';
			$res['msg'] = "修改失败: ";
			$res['sql'] = $sql;
			$res['error'] = $pdo->errorInfo();
		}
		
		$this->result =  json_encode($res);
	}
}
