<?php
/**
 * $Author: BEESCMS $
 * ============================================================================
 * 网站地址: http://www.beescms.com
 * 您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/
class tpl
{
	public $template_dir   = '';//模板目录
	private $template_cache = '';//缓存目录
	public $template_is_cache = 1;//开启缓存,1为开启，0不开启
	private $template_compile   = '';//编译目录
	public $template_time  = '';//过期时间
	public $template_lang  = '';//当前语言
	private $template_file  = '';//载入模板文件
	private $template_com_file='';//编译文件
	private $template_cache_file='';//缓存文件
	private $template_var   = array();//注册变量
	private $template_file_content='';//模板内容
	public  $template_tag_tpl = '';//标签配置信息
	private $content='';//输出内容
	//初始化模板
	public function tpl($template_cache,$template_compile,$template_time=30){
		$this->template_cache = $template_cache;
		if(!file_exists($this->template_cache)){(@mkdir($this->template_cache,0777))?'':die('无法创建缓存目录');}
		$this->template_compile=$template_compile;
		if(!file_exists($this->template_compile)){(@mkdir($this->template_compile,0777))?'':die('无法创建编译目录');}
		$this->template_time  = $template_time;
		$this->template_is_cache=1;//默认开启缓存
		$this->mysql=new mysql(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_CHARSET,DB_PCONNECT);//链接数据库
	}
	//载入模板
	public function display($template_file,$include_cache=0){
		//如果包含标签，不开启缓存
		if($include_cache){$this->template_is_cache=0;}
		$this->template_file=$this->template_dir.$template_file.'.html';
		//文件是否存在
		if(!file_exists($this->template_file)){die('不存在模板文件'.$template_file.'.html');}
		$this->template_file_content=file_get_contents($this->template_file);
		$this->template_com_file=$this->template_compile.$template_file.'_'.$this->template_lang.'_compile.php';//编译文件
		$this->cache();//生成缓存文件
		$this->compile();//编译模板
		$this->view();//显示模板
		echo $this->content;
	}
	//替换模板
	private function tpl_replace(){
		$template=$this->template_file_content;
		//循环标签
		$template=$this->made_tag($template,'loop');
		$template=preg_replace('/\{\/loop\}/isU',"<?php \n}\n}?>",$template);
		//输出变量
		$template=preg_replace('/\{(lang|print)\s+(.*)\/\}/isU',"<?php echo \\2;?>",$template);
		//栏目变量
		$template=preg_replace('/{cate\s+(.*)\s*\/}/isU','<?php echo $cate_info[\'cate_\\1_seo\'];?>',$template);
		//网站信息
		$template=preg_replace('/\{webinfo\s+(.*)\/\}/isU',"<?php webinfo(\\1);?>",$template);
		//当前位置
		$template=preg_replace('/{position\s+(.*)\/}/isU','<?php position(); ?>',$template);
		//判断
		$template=preg_replace('/\{if\s+(.*)\}/isU',"<?php if(\\1){?>",$template);
		$template=preg_replace('/\{else\}/',"<?php }else{?>",$template);
		$template=preg_replace('/\{\/if\}/',"<?php }?>",$template);
		//标示内容
		$template=$this->made_tag($template,'block');
		//表单内容
		$template=$this->made_tag($template,'form');
		//flash幻灯
		$template=preg_replace('/\{flash\s*\/\}/isU',"<?php echo flash_ad();?>",$template);
		//列表分页
		$template=preg_replace('/\{list_page\s+source=(.*)\/\}/isU',"<?php echo \$\\1;?>",$template);
		//内容分页
		$template=preg_replace('/\{body_page\s*\/\}/isU',"<?php echo \$body_page;?>",$template);
		//路径
		$template=preg_replace('/{path\s+(.*)\s*\/\}/isU',"<?php cmspath('\\1');?>",$template);
		//语言
		$template=preg_replace('/{langs\s+(.*)\s*\/\}/isU',"<?php langs('\\1');?>",$template);
		//包含标签
		$template=preg_replace('/{include\s+(.*)\s*\/\}/isU',"<?php \$this->display('\\1',1);?>",$template);
		return $template;
	}
	//处理标签
	private function made_tag($tpl,$tag_type){
		$preg_str=($tag_type=='block'||$tag_type=='form')?'/{'.$tag_type.'(.*)\/}/isU':'/{'.$tag_type.'(.*)}/isU';
		preg_match_all($preg_str,$tpl,$rel);
		if(!empty($rel[1])){
		$tag_value='';
			foreach($rel[1] as $k=>$v){
				$val=preg_split('/\s/',trim($v));//标签属性
				if(!empty($val)){
				$tag_value2='';
					foreach($val as $key=>$value){
						if(!empty($value)){
							$value_tag_arr=preg_split('/=/',$value);//属性名称和值
							if(is_array($value_tag_arr)){
								$tag_value2[$value_tag_arr[0]]=empty($value_tag_arr[1])?'':$value_tag_arr[1];
							}
						}
					}
					$tag_value[]=$tag_value2;
				}
			}
			if(!empty($tag_value)){
			//获取标签值
			$replace=$this->get_tag_value($tag_value,$tag_type);
			}
			return str_replace($rel[0],$replace,$tpl);
		}else{
			return $tpl;
		}
		
	}
	
	//获取标签值
	private function get_tag_value($tag_value,$tag_type){
		foreach($tag_value as $t_k=>$t_v){
					$replace_value=empty($tag_value[$t_k]['source'])?'':$tag_value[$t_k]['source'];
					$item=empty($tag_value[$t_k]['item'])?'$v':$tag_value[$t_k]['item'];
					if($tag_type=='loop'){
						$replace[$t_k]="<?php \n if(isset(".$replace_value.")&&is_array(".$replace_value.")){\nforeach(".$replace_value." as ".$item."){?>";
					}
					if($tag_type=='block'||$tag_type=='form'){
						$replace[$t_k]="<?php echo ".$replace_value.";?>";
					}
					//过滤标签，提供后台操作
					if($tag_type=='loop'||$tag_type=='block'||$tag_type='form'){
						$tpl=array('tpl_tag'=>$tag_type,'tpl_name'=>empty($tag_value[$t_k]['tpl'])?'':addslashes($tag_value[$t_k]['tpl']),'tpl_info'=>empty($tag_value[$t_k]['info'])?'':addslashes($tag_value[$t_k]['info']),'tpl_id'=>empty($tag_value[$t_k]['tpl_id'])?'':addslashes($tag_value[$t_k]['tpl_id']));
						$this->template_tag_tpl[]=$tpl;
					}
		}
		return $replace;
	}

	//处理包含标签，方便生成html静态页面
	function made_include($tpl,$tag_type){
		if($tag_type=='include'){
			preg_match_all('/\{'.$tag_type.'\s+(.*)\/\}/isU',$tpl,$rel);
			$replace=array();
			print_r($rel);
		if(!empty($rel[1])){
			foreach($rel[1] as $k=>$v){
				$this->display($v,0);
				$replace[]=$this->content;
			}
		}
		return str_replace($rel[0],$replace,$tpl);
		
		}
	}
	//编译模板
	private function compile(){
	if(file_exists($this->template_com_file)){
		if(filemtime($this->template_file)>filemtime($this->template_com_file)){
			$con_content=$this->tpl_replace();
			$this->inser_tpl_id();
			file_put_contents($this->template_com_file,$con_content);
			unset($con_content);
		}
	}else{
		$con_content=$this->tpl_replace();
		$this->inser_tpl_id();
		file_put_contents($this->template_com_file,$con_content);
		unset($con_content);
	}	
	}
	//注册变量
	public function assign($var,$value){
		if(isset($var)){
			$this->template_var[$var]=$value;
		}
	}
	//显示模板
	private function view(){
	//开启缓存生成缓存文件
	if($this->template_is_cache){
	 if(file_exists($this->template_cache_file)){
		if((time()-filemtime($this->template_cache_file)) > $this->template_time){
			//开启缓存，缓存文件过期
			extract($this->template_var);
			ob_start();
			include($this->template_com_file);
			$this->content = ob_get_contents();
        	ob_end_clean();
			file_put_contents($this->template_cache_file,$this->content);
		}else{
			//开启缓存，载入缓存文件
			ob_start();
			include($this->template_cache_file);
			$this->content=ob_get_contents();
			ob_end_clean();
			
		}
	 }else{
	 		//开启缓存，缓存文件不存在
			extract($this->template_var);
			ob_start();
			include($this->template_com_file);
			$this->content = ob_get_contents();
        	ob_end_clean();
			file_put_contents($this->template_cache_file,$this->content);
	 }
	}else{
			//没有开启缓存，直接输出
			extract($this->template_var);
			ob_start();
			include($this->template_com_file);
			$this->content = ob_get_contents();
        	ob_end_clean();
	}
	}
	//缓存文件
	private function cache(){
		if (!isset($_SERVER['REQUEST_URI'])) {    
               $url = $_SERVER['REQUEST_URI'];    
     	}else{    
              $url = $_SERVER['SCRIPT_NAME'];    
              $url .= (!empty($_SERVER['QUERY_STRING'])) ? '?' . $_SERVER['QUERY_STRING'] : '';    
       	}
		$cache_name=str_replace(array('.php','?','='),array('_','_','_'),substr($url,strrpos($url,'/')+1));
		$this->template_cache_file=$this->template_cache.$cache_name.'_'.$this->template_lang.'.php'; 
	}
	//清除所有缓存
	public function del_cache(){
		//清除缓存
		if ($dir = @opendir( $this->template_cache )){
        while ($file = @readdir($dir)){
          if (!is_dir($file)){@unlink($this->template_cache.$file);}
        }
		}
		//清除编译文件
		if ($dir_com = @opendir( $this->template_compile )){
        while ($file_com = @readdir($dir_com)){
          if (!is_dir($file_com)){@unlink($this->template_compile.$file_com);}
        }
		}
	}
	/*
	//生成html静态页面,$tempalte-模板页;$html_name-生成文件名;$html_fold-保存目录
	public function create_html($template_file,$html_name,$html_fold){
		$this->template_file=$this->template_dir.$template_file.'.html';
		//文件是否存在
		if(!file_exists($this->template_file)){die('不存在模板文件'.$template_file.'.html');}
		$this->template_file_content=file_get_contents($this->template_file);
		$this->template_com_file=$this->template_compile.$template_file.'_compile.php';
		$this->cache();//缓存文件
		$this->compile();//编译模板
		$this->view();//显示模板
		//生成保存目录
	}
	*/
	//处理模板标签ID
	function inser_tpl_id(){
		//入库
		if(!empty($this->template_tag_tpl)){
			foreach($this->template_tag_tpl as $k=>$v){
				if(empty($v['tpl_id'])){continue;}
				if($this->check_tpl_id($v['tpl_id'])){
					$sql="update ".DB_PRE."tpl set tpl_name='".$v['tpl_name']."',tpl_info='".$v['tpl_info']."',tpl_tag='".$v['tpl_tag']."' where tpl_id='".$v['tpl_id']."'";
				}else{
					$sql="insert ".DB_PRE."tpl (tpl_id,tpl_name,tpl_info,tpl_tag,lang) values ('".$v['tpl_id']."','".$v['tpl_name']."','".$v['tpl_info']."','".$v['tpl_tag']."','".$this->template_lang."')";
				}
				$this->mysql->query($sql);
			}
		}
		//缓存数据
		$rel=$this->mysql->fetch_asc("select*from ".DB_PRE."tpl where lang='".$this->template_lang."' order by id desc");
		$arr=array();
		if(!empty($rel)){
			foreach($rel as $k=>$v){
				$arr[]=$v['tpl_id'];
			}
		}
		$str="<?php\n\$tpl_id_arr=".var_export($arr,true).";\n?>";
		cache_write(DATA_PATH.'cache/tpl_id_'.$this->template_lang.'.php',$str);
	}
	
	//检查tpl_id是否重复
	function check_tpl_id($tpl_id){
		if(file_exists(DATA_PATH.'cache/tpl_id_'.$this->template_lang.'.php')){include(DATA_PATH.'cache/tpl_id_'.$this->template_lang.'.php');}
		if(is_array($tpl_id_arr)){
			if(in_array($tpl_id,$tpl_id_arr)){return 1;}
		}
		return 0;
	}
	
}


?>
