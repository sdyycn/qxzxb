<?php
/*
 * @author: maweiguo
 * 
 * @table: ejob_newssort
 * 字段			字段说明		数据类型			备注
 * @newssortid	自增长ID		smallint
 * @newsortname	类别名称		varchar(20)
 * @xh			序号			tinyint	
 * 
 */

chdir(dirname(__FILE__));
require_once '../../configs/path.inc.php';
require_once 'configs/function.php';
require_once 'include/JobsPDO.class.php';
require_once 'configs/FileUpload.class.php';


class JobsNews {
	private $table = null;
	private $pdo = null;
	private $url_add = null;
	private $url_list = null;
//	private $id;		// newsid
//	private $title;		// newstitle varchar(100)
//  private $pic;		// pic varchar(200)
//  private $type;		// newssortid
//	private $author;	// author varchar(20)
//	private $source;	// source varchar(60)
//	private $content;	// newscontent
// addtime
// edittime
// viewquantity

	
	function __construct(){
		$this->table = $GLOBALS['table']['ejob_news'];
		$this->pdo = new JobsPDO;

		$this->url_add = $GLOBALS['config']['adminroot']."/news/newspage.php?page=add";
		$this->url_list = $GLOBALS['config']['adminroot']."/news/newspage.php";
	}
	
	private function fileupload($file) {
		$filepath = $GLOBALS['config']['webpath'].'/upload/news/';
		if (!is_dir($filepath)){
			mkdir($filepath);
		}
		
		$f = new FileUpload();
		if (0 != $f->upload($file, $filepath)){
			return "";
		}
		
		return $f->filepath;
	}
	// $pic = $_FILES['pic']	$_FILES[][] 'name', 'type', 'size', 'tmp_name', 'error'(UPLOAD_ERR_OK,UPLOAD_ERR_INI_SIZE,UPLOAD_ERR_FORM_SIZE,UPLOAD_ERR_PARTIAL,UPLOAD_ERR_NO_FILE )
/*/
	function add1($title, $pic, $typeid, $author, $source, $content){
		$table = $this->table;
		$pdo = $this->pdo;
		$picname = $this->fileupload($pic);
		trace($picname);
		$sql = "INSERT INTO $table (newstitle, newssortid, pic, author, source, newscontent, addtime) VALUES ('$title', $typeid, '$picname', '$author', '$source', '$content', NOW())";
		
//		trace($sql);
		
		if ($pdo->exec($sql) > 0) {
			alert("添加成功!", $this->url_add);
		} else {
//			trace($pdo->errorInfo());
			alert("添加失败!", $this->url_add);
		}
	}
	//*/
	function add($title, $pic, $typeid, $author, $source, $content){
		$picname = $this->fileupload($pic);
		$data = array();
		$data['newstitle'] = $title;
		$data['newssortid'] = $typeid;
		$data['pic'] = $picname;
		$data['author'] = $author;
		$data['source'] = $source;
		$data['newscontent'] = $content;
		$data['addtime'] = date('Y-m-d H:i:s');
		return $this->pdo->insert($this->table, $data);
	}
	
	function update($id, $title, $pic, $typeid, $author, $source, $content) {
		$table = $this->table;
		$pdo = $this->pdo;
		$picname = $pic['name'];
		$sql = "UPDATE $table SET newstitle='$title', pic='$picname', newssortid=$typeid, author='$author', source='$source', newscontent='$content', edittime=NOW() WHERE newsid = $id";
		// edittime
		
//		trace($sql);
		
		if ($pdo->exec($sql) > 0) {
			alert("修改成功!", $this->$url_list);	
		} else {
//			trace($pdo->errorInfo());
			alert("修改失败!", 1);
		}
	}
	
	function delete($id) {
		$table = $this->table;
		$pdo = $this->pdo;
		$sql = "DELETE FROM $table WHERE newsid = $id";
		
//		trace($sql);
		
		if ($pdo->exec($sql) > 0) {
			$res['status'] = 'true';
			$res['msg'] = "删除成功!";
			$res['id'] = $id;
//			alert("删除成功!", $this->url_manage);
		} else {
//			alert("删除失败!", $this->url_manage);
			$res['status'] = 'false';
			$res['msg'] = "删除失败: ";
			$res['sql'] = $sql;
			$res['error'] = $pdo->errorInfo();
		}
		
		return json_encode($res);
	}
}
