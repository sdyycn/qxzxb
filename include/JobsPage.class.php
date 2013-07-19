<?php
/**
* 
* @author maweiguo
* @version 1.0
* @date 2013/7/8
* class Page, AdminPage, JobsPage
* 
*/

chdir(dirname(__FILE__));
require_once 'path.inc.php';
require_once $config["webpath"].'/libs/Smarty.class.php';

/**
 * interface: IPage
 */
interface IPage{
	function run();
	function display();
	function doAction();
}

class Page implements IPage{
	/**
	 * page identity<br>
	 * maybe the page name: index.html <br>
	 * maybe the page: $_REQUEST['page'], 
	 * 
	 * @example http://localhost/index.php?page=login
	 */
	protected $page = null;
	
	/**
	 * Page action, default: $action = 'display'.
	 */
	protected $action = 'display';
	
	/**
	 * template suffix
	 * @example .html, .tpl, ...
	 */
	protected $tpl = '.html';
	
	/**
	 * page title
	 */
	protected $title = 'LimiJobs';
	
	/**
	 * smarty object
	 */
	protected $smarty = null;

	/**
	 * web root
	 * @example http://localhost
	 */
	protected $docroot = null;
	
	/**
	 * templates root directory <br>
	 * <base href='<{$tplroot}>' /> tplroot must ended with slash, 
	 * @example http://localhost/templates/
	 */
	protected $tplroot = null;
	
	/**
	 * OS current project directory, ended without slash.
	 * @example: c:\project
	 */
	protected $phppath = null;
	
	/**
	 * init smarty object and root directorys(tplroot, docroot, phproot)
	 */
	function __construct(/*$page = null*/){
		$this->phppath = $GLOBALS['config']['webpath'];
		$this->docroot = $GLOBALS['config']['docroot'];
		$this->tplroot = $this->docroot.'/templates/';
		
		$this->smarty = new Smarty;

		$this->smarty->force_compile = true;
		$this->smarty->debugging = false;
		$this->smarty->caching = false;
		$this->smarty->cache_lifetime = 120;
		
		$this->smarty->template_dir = $this->phppath."/templates"; 
		$this->smarty->compile_dir = $this->phppath."/templates_c"; 
		$this->smarty->cache_dir = $this->phppath."/cache";  
		$this->smarty->left_delimiter = "<{";
		$this->smarty->right_delimiter = "}>";
		
//		$this->page = $page;
	}	

	function setTitle($title){
		$this->title = $title;
	}
	
	/**
	 *  Page will both display and deal actions.
	 */
	function run(){
		if ($this->action == null || $this->action == 'display'){
			$this->display();
		} else {
			$this->doAction();
		}
	}

	/**
	 *  Page only display something
	 */
	function display(){
		Logs::plog("PageController::display");

		$page = $this->page;
			
		if (!preg_match("/.html$/i", $page)
			&& !preg_match("/.tpl$/i", $page)){
				$page .= $this->tpl;
		}
			
		$this->smarty->display($page);
	}
	
	/**
	 *  Page only do actions
	 */
	function doAction(){
		
	}
}

class AdminPage extends Page{
	protected $adminroot = null;
	function __construct($page = null){
		if (isset($_REQUEST['page'])){
			$this->page = $_REQUEST['page'];
		}
		
		if (isset($_REQUEST['act'])){
			$this->action = $_REQUEST['act'];
		}
		
		if ($page != null){
			$this->page = $page;
		}
		
		parent::__construct();

		$this->smarty->template_dir = $GLOBALS['config']['webpath'].'/'.ADMIN_FOLDER.'/templates';
		$this->adminroot = $GLOBALS['config']['adminroot'];
		$this->tplroot = $this->adminroot.'/templates/';

		$this->smarty->assign('baseurl', $this->tplroot);
		$this->smarty->assign('adminroot', $this->adminroot);
		$this->smarty->assign('title', $this->title);
	}
}

class JobsPage extends Page{
	function __construct($page = null){
		if (isset($_REQUEST['page'])){
			$this->page = $_REQUEST['page'];
		}
		
		if (isset($_REQUEST['act'])){
			$this->action = $_REQUEST['act'];
		}
		
		if ($page != null){
			$this->page = $page;
		}
		
		parent::__construct();
		
		$this->smarty->assign('baseurl', $this->tplroot);
		$this->smarty->assign('docroot', $this->docroot);
		$this->smarty->assign('title', $this->title);
	}
};
