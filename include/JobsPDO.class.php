<?php
/**
* 
* @author maweiguo
* @version 1.0
* @date 2013/7/12
* @class JobsPDO
* 
*/

chdir(dirname(__FILE__));

$table['ejob_newssort'] = "ejob_newssort";		// 资讯类别 
$table['ejob_news'] 	= "ejob_news";			// 资讯信息
$table['ejob_admin'] 	= "ejob_admin";			// 系统管理员账户

class JobsPDO extends PDO {
/*/
 * 
 * my_setting.ini:
 * [database]
 * driver = mysql
 * host = localhost
 * port = 3306
 * schema = db_schema
 * username = user
 * password = secret
 */
/*
	public function __construct($file = 'my_setting.ini'){
        if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');
        
        $dns = $settings['database']['driver'] .
        ':host=' . $settings['database']['host'] .
        ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
        ';dbname=' . $settings['database']['schema'];
        
        parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
    }
//*/
	
	public $count = 0;
	// 内存缓存
	public $cache = null;
    
	public static function exception_handler($exception){
		die('Uncaught exception: '.$exception->getMessage());
	}
	
	public function __construct($dsn=null, $username=null, $password=null){
		// next we can read the dsn info from file: config.ini
		if ($dsn == null){
			$dbms = 'mysql';
			$host = '192.168.10.86';
			$dbName = 'limijobs';
//			$username = 'limijobs';
//			$password = '123456';
			$dsn = "$dbms:host=$host;dbname=$dbName";
		}
		if ($username == null){
			$username = 'limijobs';
		}
		if ($password == null){
			$password = '123456';
		}
		
		set_exception_handler(array(__CLASS__, 'exception_handler'));
		parent::__construct($dsn, $username, $password);
//			$this->setAttribute(PDO::ATTR_PERSISTENT, true);					// 设置数据库连接为持久连接
//			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		// 设置抛出错误
//			$this->setAttribute(PDO::ATTR_ORACLE_NULLS, true);					// 设置当字符串为空转换为SQL的NULL
//			$this->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);				// 列名大小写或原样(CASE_NATURAL),CASE_LOWER
//			$this->query("SET NAMES utf8");										// 设置数据库编码
//			$this->exec("SET CHARACTER SET GBK");								// 设置数据库编码 (同上)
		restore_exception_handler();
	}
	
	public function charset($charset){
		parent::query("SET NAMES $charset");
	}
	
	public function query($query){
		try{
			$this->count++;
			return parent::query($query);
		}
		catch(PDOException $e){
			$this->errorLog($e->getMessage(),$query);
		}
	}

	public function exec($query){
		try{
			$this->count++;
			return parent::exec($query);
		}
		catch(PDOException $e){
			$this->errorLog($e->getMessage(),$query);
		}
	}

	/**
	 * table(id, name, value);<br>
	 * array['id'=>id,'name'=>name,'value'=>value)
	 */
	public function insert($table,$array){
		if(count($array) <= 0){
			return false;
		}
		$sql = "INSERT INTO $table SET ".$this->api_sql_implode($array);
//		echo $sql;
		return $this->exec($sql);
	}

	/**
	 * table(id, name, value);<br>
	 * array['id'=>id,'name'=>name,'value'=>value)
	 */
	public function update($table,$array,$conditions='1 = 1'){
		if(count($array) <= 0 || !$table){
			return false;
		}
		$sql = "UPDATE ".$table." SET ".$this->api_sql_implode($array)." WHERE ". $conditions;
		//echo '<!-- ' . $sql . ' --><hr />';
		return $this->exec($sql);
	}

	public function delete($table,$conditions='1 = 1'){
		$sql = 'DELETE FROM '.$table.' WHERE '.$conditions;
		return $this->exec($sql);
	}

	public function prepare($query,$arrValues=array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY)){
		try{
			return parent::prepare($query);
		}
		catch(PDOException $e){
			$this->errorLog($e->getMessage(),$query);
		}
	}

	public function execute($result,$arrValues=array()){
		try{
			return $result->execute($arrValues);
		}
		catch(PDOException $e){
			$this->errorLog($e->getMessage());
		}
	}

	public function getAll($query,$column=NULL){
		if($result=$this->query($query)){
			if($column===NULL){
				$t = $result->fetchAll();
				return $t;
			}else{
				$t = $result->fetchAll(PDO::FETCH_COLUMN,$column);
				return $t;
			}
		}
	}

	public function fetch($result){
		return $result->fetch();
	}

	public function getOne($query,$column=0){
		if($result=$this->query($query)){
			$t = $result->fetch($column);
			return $t;
		}
	}

	public function getRow($query){
		if($result=$this->query($query)){
			return $result->fetch();
		}
	}

	public function getInsertId(){
		return parent::lastInsertId();
	}

	public function getIDFromFID($key,$table,$fKey,$fID){
		global $arrID;
		$sql = 'SELECT '.$key.' FROM '.$table.' WHERE '.$fKey.' IN ("'.$fID.'")';
		$arrTmp = array();
		$arrList = $this->getAll($sql);
		if($arrList){
			foreach($arrList as $arrRow){
				$arrID[] = $arrRow[$key];
				$arrTmp[] = $arrRow[$key];
			}
			return $this->getIDFromFID($key,$table,$fKey,implode('","',$arrTmp));
		}
		else{
			$array = $arrID;
			$arrID = array();
			return $array;
		}
	}

	public function begin(){
		return parent::beginTransaction();
	}

	public function commit(){
		return parent::commit();
	}

	public function back(){
		return parent::rollBack();
	}

	public function columnCount($result){
		return $result->columnCount();
	}

	public function close(&$objC){
		$objC = NULL;
	}

	public function free(&$result){
		$result = NULL;
	}

	// change it to log system.
	public function errorLog($msg='',$query='',$die=false){
		$text = "Addr:".getenv("REMOTE_ADDR");
		$text .= "\r\nData:".date("Y-m-d H:i:s");
		$text .= "\r\nCode:".PDO::errorCode();
		$text .= "\r\nPage:".$_SERVER['PHP_SELF'];
		$text .= "\r\nWarning:".$msg;
		$text .= "\r\nQuery:".$query."\r\n\r\n";

		$path = $_SERVER['DOCUMENT_ROOT'].'/logs/';
		if (!file_exists($path)){
			mkdir($path, 0777);
		}
		$logfile = $path.'conn.log';
		if(file_exists($logfile)){
			if(filesize($logfile) > 2*1024*1024){
				rename($file, $path."conn".date("Y-m-d",time()).".log");
			}
		}
		error_log($text, 3, $logfile);
		if($die){
			exit("Server busy, please try again later!");
		}
	}

	function api_sql_implode($pieces){
		if (!is_array($pieces)){
			$pieces = array($pieces);
		}
		$ret = "";
		while (list($key, $val) = each($pieces))
		{
			$last = strlen($val);
			if ($last < 1){
				continue;
			}
			if ($val[0] != "'" && $val[$last-1] != "'")
			{
				// magic_quotes_gpc=on 则不替换
			//	if (!$this->api_magic_quote)
			//		$val = str_replace("'","&#x27;",$val);
				$val = "'".$val."'";
			}
			$ret.= "`$key`=$val,";
		}
		return substr($ret,0,-1);
	}
	
	/**
	 * $stmt = $pdo->query($sql);<br>
	 * $pdo->rowCount($stmt);
	 */
	public function rowCount($stmt){	// statement
		return $stmt->rowCount();
	}

	/**
	 *  $sql = "SELECT * FROM $table WHERE name ='$name'";<br>
	 *  $pdo->rowCountSql($sql);
	 *  @link: http://zhan.renren.com/itmano?gid=3602888497993701345&checked=true
	 *  @return rowCount
	 */
	function rowCountSql($sql){
		$stmt = $this->query($sql);
		if ($stmt->rowCount() == 0){
			return count($stmt->fetchAll());	// fix php_pdo_mysql.dll bug: rowCount in some version always return 0.
		}
		
		return $stmt->rowCount();	//返回记录数
	}
	
	function rowAllCount($table) {
		$rs = $this->query("SELECT COUNT(*) FROM $table");
		return $rs->fetchColumn();
	}
}

