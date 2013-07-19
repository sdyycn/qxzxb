<?php
/**
 * $Author: BEESCMS $
 * ============================================================================
 * 网站地址: http://www.beescms.com
 * 您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/

define('IN_CMS','true');
include('init.php');
$action=isset($action)?$action:'alone';
$lang=isset($lang)?$lang:get_lang_main();
if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}
go_url($action);

function alone(){
	if(!check_purview('content_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$channel_id,$cate_id,$_confing;
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	if(!empty($channel)){
	foreach($channel as $k=>$v){
		if($v['channel_mark']=='alone'){
			$channel_id=$v['id'];
			$is_disable=$v['is_disable'];
		}
	}
	}
	//是否开启
	if($is_disable){
		msg('<span style="color:red">单页模型没有开启，请先在内容模型开启单页</span>');
	}
	if(empty($channel_id)){
		msg('<span style="color:red">单独栏目频道不存在请重新创建,标示只能是alone</span>');
	}
	if(file_exists(DATA_PATH."cache_cate/cate_list_".$lang.".php")){
		include(DATA_PATH."cache_cate/cate_list_".$lang.".php");
	}
	$cate_array=array();
	if(!empty($cate_list)){
	foreach($cate_list as $key=>$value){
 	if($value['cate_channel']==$channel_id&&!$value['is_content']){
		$cate_array[]=$value;
		}
	}
	}
	$cate_is=isset($cate_array[0]['id'])?$cate_array[0]['id']:'';
	$cate_id=empty($cate_id)?$cate_is:$cate_id;
	
	include("template/admin_content_alone.html");
}
//保存内容
function save_content(){
	if(!check_purview('content_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$is_add,$channel_id,$cate_id,$title,$filter,$thumb,$key_words,$info,$author,$source,$category,$addtime,$top,$purview,$is_html,$fields,$is_info,$first_pic,$down_file,$g_url,$pic_watermark,$cache_time;
	if(file_exists(DATA_PATH."sys_info.php")){include(DATA_PATH."sys_info.php");}
	$is_add=stripslashes($is_add);
	if(!isset($channel_id)||empty($channel_id)){
		msg('<span style="color:red">不存在相关频道,请选择频道再添加内容</span>');
	}
	if(empty($cate_id)){
		msg('<span style="color:red">不存在相关栏目,请选择栏目再添加内容</span>');
	}
	if($GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."maintb where category=".$cate_id)){
		msg('<span style="color:red">该栏目已经添加过内容，请到单页内容管理中修改</span>');
	}
	if(empty($GLOBALS['title'])||!isset($GLOBALS['title'])){
		msg('<span style="color:red">标题不能为空</span>');
	}
	$title=empty($_sys['web_content_title'])?cn_substr($title,60):cn_substr($title,intval($_sys['web_content_title']));
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	if(empty($channel)){
		msg('<span style="color:red">没有找到当前操作的频道,请更新频道缓存或重新添加频道</span>');
	}
	foreach($channel as $key=>$value){
		if($value['id']==$channel_id){
			$table=DB_PRE.$value['channel_table'];//取得附加表
			$verify=$value['is_verify'];
		}
	}
	
	$hits=($_sys['is_hits'])?$_sys['is_hits']:rand(1,500);
	$addtime=empty($addtime)?time():strtotime($addtime);
	$is_html=($is_html=='1')?1:0;
	//判断表是否存在
	$tables=$GLOBALS['mysql']->show_tables();
	if(!in_array($table,$tables)){
		msg('<span style="color:red">没有当前频道的数据表,请重新添加频道</span>');
	}
	
	$filter_str='';
	if($filter){
	foreach($filter as $key=>$value){
		$filter_str.=$value.',';
	}
	}
	
	//下载图片
	if($down_file&&!empty($fields['content'])){
	$body=$fields['content'];
	$body = stripslashes($body); 
	//关键字设置
	$key_arr=$GLOBALS['mysql']->fetch_asc('select*from '.DB_PRE."keywords where lang='".$lang."'");
	if(!empty($key_arr)){
		foreach($key_arr as $key_k=>$key_v){
		$body=str_replace($key_v['keywords'],'<a href="'.$key_v['wordsurl'].'">'.$key_v['keywords'].'</a>',$body);
		}
	}
	preg_match_all('/(src|SRC)=[\"|\'|]?(http:\/\/(.*)\.(gif|jpg|jpeg|bmp|png))/isU',$body,$pic_arr);
	$pic_arr=$pic_arr[2];
	$cms_path=str_replace(ADMINDIR.'/admin_content_alone.php','',$_SERVER['PHP_SELF']);
	if(!empty($pic_arr)){
		set_time_limit(0); 
		$pic_time=date('Ymd');
		$pic_dir="../upload/img/".$pic_time.'/';
		if(!file_exists($pic_dir)){@mkdir($pic_dir,0777);}
		$i=0;
		foreach($pic_arr as $k=>$v){
			$pic_ext=strrchr($v,".");
			$pic_file=$pic_dir.date('YmdHis').$pic_ext;
			$get_url_pic=@file_get_contents($v);
			$fp= @fopen($pic_file,"w");
			@fwrite($fp,$get_url_pic);
			@fclose($fp);
			$pic_path=str_replace('../',$cms_path,$pic_file);
			$v=str_replace('/','\/',$v);
			$body=preg_replace('/'.$v.'/',$pic_path,$body);
			if(file_exists(DATA_PATH.'sys_info.php')){
					include(DATA_PATH.'sys_info.php');
				}	
	    //生成水印
		if($_sys['image_is'][0]&&$pic_watermark){
			$file_info=getimagesize($pic_file);
			switch($file_info[2]){
 			case 1:
 			$php_file=imagecreatefromgif($pic_file);
 			break;
 			case 2:
 			$php_file=imagecreatefromjpeg($pic_file);
 			break;
 			case 3:
 			$php_file=imagecreatefrompng($pic_file);
 			break;
 			}		
			//文字
			if(!$_sys['image_type'][0]){
				$mark_img=$php_file;
				$t_color=empty($_sys['image_text_color'])?array("255","255","255"):explode(',',$_sys['image_text_color']);
				$text_color=imagecolorallocate($php_file,$t_color[0],$t_color[1],$t_color[2]);
				$text_content=iconv("UTF-8","UTF-8",empty($_sys['image_text'])?'BEESCMS':$_sys['image_text']);
				$text_size=empty($_sys['image_text_size'])?"12":$_sys['image_text_size'];
				$font=DATA_PATH."font/arial.ttf";
				$text_arr=@imagettfbbox($text_size,0,$font,$text_content);
        		$text_width=max($text_arr[2],$text_arr[4])-min($text_arr[0],$text_arr[6]);
       		 	$text_height=max($text_arr[1],$text_arr[3])-min($text_arr[5],$text_arr[7]);
				switch($_sys['image_position'][0]){
				case '1':
				$position=array("5","5");
				break;
				case '2':
				$position=array(($file_info[0]-$text_width)/2,"5");
				break;
				case '3':
				$position=array($file_info[0]-$text_width-5,"5");
				break;
				case '4':
				$position=array("5",($file_info[1]-$text_height)/2);
				break;
				case '5':
				$position=array(($file_info[0]-$text_width)/2,($file_info[1]-$text_height)/2);
				break;
				case 6:
				$position=array($file_info[0]-$text_width-5,($file_info[1]-$text_height)/2);
				break;
				case 7:
				$position=array("3",$file_info[1]-$text_height-5);
				break;
				case 8:
				$position=array(($file_info[0]-$text_width)/2,$file_info[1]-$text_height-5);
				break;
				case 9:
				$position=array($file_info[0]-$text_width-10,$file_info[1]-$text_height-10);
				break;
				}
				imagettftext($mark_img,$text_size,0,($position[0]+$text_size),($position[1]+$text_size),$text_color,$font,$text_content);
				switch($file_info[2]){
				case 1:
				imagegif($mark_img,$pic_file);
				break;
				case 2:
				imagejpeg($mark_img,$pic_file);
				break;
				case 3:
				imagepng($mark_img,$pic_file);
				break;
				}
			}
			//图片
			if($_sys['image_type'][0]){
				$logo=CMS_PATH.'upload/'.$_sys['pic'];
				$logo_info=getimagesize($logo);
				switch($logo_info[2]){
 				case 1:
 				$logo_file=imagecreatefromgif($logo);
 				break;
 				case 2:
 				$logo_file=imagecreatefromjpeg($logo);
 				break;
 				case 3:
 				$logo_file=imagecreatefrompng($logo);
 				break;
 				}
				switch($_sys['image_position'][0]){
				case '1':
				$position=array("5","5");
				break;
				case '2':
				$position=array(($file_info[0]-$logo_info[0])/2,"5");
				break;
				case '3':
				$position=array($file_info[0]-$logo_info[0]-5,"5");
				break;
				case '4':
				$position=array("5",($file_info[1]-$logo_info[1])/2);
				break;
				case '5':
				$position=array(($file_info[0]-$logo_info[0])/2,($file_info[1]-$logo_info[1])/2);
				break;
				case 6:
				$position=array($file_info[0]-$logo_info[0]-5,($file_info[1]-$logo_info[1])/2);
				break;
				case 7:
				$position=array("3",$file_info[1]-$logo_info[1]-5);
				break;
				case 8:
				$position=array(($file_info[0]-$logo_info[0])/2,$file_info[1]-$logo_info[1]-5);
				break;
				case 9:
				$position=array($file_info[0]-$logo_info[0]-10,$file_info[1]-$logo_info[1]-10);
				break;
				}
				$logo_img=$php_file;
				imagecopy($logo_img,$logo_file,$position[0],$position[1],0,0,$logo_info[0],$logo_info[1]);
				switch($file_info[2]){
				case 1:
				imagegif($logo_img,$pic_file);
				break;
				case 2:
				imagejpeg($logo_img,$pic_file);
				break;
				case 3:
				imagepng($logo_img,$pic_file);
				break;
				}
				
			}
		}
				//缩略图
			if($first_pic&&$i==0&&empty($thumb)){
				$thumb=pic_thumb($pic_file,$_sys['thump_width'],$_sys['thump_height'],$pic_dir);
			}
			$i=$i+1; 
		}
	}
	$body=addslashes($body);
	$fields['content']=$body;
	}//处理编辑器
	
	$info=($is_info&&empty($info))?cn_substr(strip_tags($fields['content']),240):cn_substr($info,240);
	$key_words=empty($key_words)?'':cn_substr($key_words,150);
  	$author=empty($author)?'':cn_substr($author,150);
  	$source=empty($source)?'':cn_substr($source,150);
	$cache_time=empty($cache_time)?30:$cache_time;//缓存时间
	//添加主表
	$main_sql="insert into ".DB_PRE."maintb (title,filter,tbpic,keywords,info,author,source,hits,category,channel,addtime,updatetime,top,purview,is_html,lang,verify,cache_time) values ('{$title}','{$filter_str}','{$thumb}','{$key_words}','{$info}','{$author}','{$source}',{$hits},{$cate_id},{$channel_id},'{$addtime}','{$addtime}',{$top},{$purview},{$is_html},'{$lang}',{$verify},'{$cache_time}')";
	$GLOBALS['mysql']->query($main_sql);
	$last_id=$GLOBALS['mysql']->insert_id();
	
	//处理附加字段
	if($fields){
	$sql_value=$last_id;
	$sql_field='id';
		foreach($fields as $key=>$value){
			$sql_field.=','.$key;
			if(is_array($value)){
			$value_str='';
				foreach($value as $k=>$v){
					$value_str.=$v.',';
				}
				$value=$value_str;
			}
			$sql_value.=",'".$value."'";
			
		}
	}
	
	$sql_else="insert into {$table} ({$sql_field}) values ({$sql_value})";
	if(!$link=$GLOBALS['mysql']->query_error($sql_else)){
		$GLOBALS['mysql']->query("delete from ".DB_PRE."maintb where id=".$last_id);
		msg('<span style="color:red">添加频道附加表表发生错误</span>'.$GLOBALS['mysql']->get_error());
	}
	//设置栏目已有内容
	$GLOBALS['mysql']->query("update ".DB_PRE."category set is_content=1 where id=".$cate_id);
	//更新栏目列表
	$sql="select c.id,c.cate_channel,c.cate_html,c.is_content,c.cate_nav,c.cate_fold_name,c.cate_order,c.cate_hide,c.cate_tpl,c.cate_name,c.lang,c.cate_parent,COUNT(s.id) as haschild from ".DB_PRE."category as c left join ".DB_PRE."category as s on c.id=s.cate_parent where c.lang='".$GLOBALS['lang']."' group by c.id order by c.cate_order,c.id desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$str="<?php\n\$cate_list=".var_export($rel,true).";\n?>";
	$file=DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php';
	creat_inc($file,$str);
	$GLOBALS['cache']->cache_category_all();
	msg('内容添加成功','?action=content_list');
}

function edit_content(){
	if(!check_purview('content_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$lang,$channel_id,$cate,$_confing;
	if(empty($id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>');
	}	
	if(!file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		msg('<span style="color:red">请先添加'.$lang.'语言频道或更新该语言频道缓存</span>');
	}
	include(DATA_PATH."cache_channel/cache_channel_all.php");
	if(empty($channel)){
		msg('<span style="color:red">请先添加频道</span>','admin_channel.php');
	}
	foreach($channel as $k=>$v){
		if($v['id']==$channel_id){
			$table=$v['channel_table'];
		}
	}
	$a_arr=$GLOBALS['mysql']->fetch_asc('select m.*,e.* from '.DB_PRE.$table." as e left join ".DB_PRE."maintb as m on e.id=m.id where m.id=".$id);
	if(empty($a_arr)){
		msg('<span style="color:red">不存在相关内容,可能已经被删除</span>');
	}
	$field_value=$a_arr[0];
	
	if($GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."category where id=".$field_value['category'])){
		$cate_name=$GLOBALS['mysql']->get_row("select cate_name from ".DB_PRE."category where id=".$field_value['category']);
	}else{
		msg('<span style="color:red">相关栏目不存在，请重新创建栏目</span>');
	}
	
	include('template/admin_content_alone_edit.html');
}


function save_edit_content(){
	if(!check_purview('content_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$id,$channel_id,$title,$filter,$thumb,$key_words,$info,$author,$source,$cate_id,$addtime,$top,$purview,$is_html,$fields,$is_info,$first_pic,$down_file,$g_url,$pic_watermark,$cache_time;
	if(file_exists(DATA_PATH.'sys_info.php')){include(DATA_PATH.'sys_info.php');}	
	if(empty($GLOBALS['title'])||!isset($GLOBALS['title'])){
		msg('<span style="color:red">标题不能为空</span>');
	}
	$title=empty($_sys['web_content_title'])?cn_substr($title,60):cn_substr($title,intval($_sys['web_content_title']));
	$table=DB_PRE.'alone';
	$addtime=empty($addtime)?time():strtotime($addtime);
	$is_html=($is_html=='1')?1:0;
	/*
	//判断表是否存在
	$tables=$GLOBALS['mysql']->show_tables();
	if(!in_array($table,$tables)){
		msg('没有当前频道的数据表,请重新添加频道');
	}
	*/
	$filter_str='';
	if($filter){
	foreach($filter as $key=>$value){
		$filter_str.=$value.',';
	}
	}

	//下载图片
	if($down_file&&!empty($fields['content'])){
	$body=$fields['content'];
	$body = stripslashes($body); 
	preg_match_all('/(src|SRC)=[\"|\'|]?(http:\/\/(.*)\.(gif|jpg|jpeg|bmp|png))/isU',$body,$pic_arr);
	$pic_arr=$pic_arr[2];
	$cms_path=str_replace(ADMINDIR.'/admin_content_alone.php','',$_SERVER['PHP_SELF']);
	if(!empty($pic_arr)){
		set_time_limit(0); 
		$pic_time=date('Ymd');
		$pic_dir="../upload/img/".$pic_time.'/';
		if(!file_exists($pic_dir)){@mkdir($pic_dir,0777);}
		$i=0;
		foreach($pic_arr as $k=>$v){
			$pic_ext=strrchr($v,".");
			$pic_file=$pic_dir.date('YmdHis').$pic_ext;
			$get_url_pic=@file_get_contents($v);
			$fp= @fopen($pic_file,"w");
			@fwrite($fp,$get_url_pic);
			@fclose($fp);
			$pic_path=str_replace('../',$cms_path,$pic_file);
			$v=str_replace('/','\/',$v);
			$body=preg_replace('/'.$v.'/',$pic_path,$body);
			
	    //生成水印
		if($_sys['image_is'][0]&&$pic_watermark){
			$file_info=getimagesize($pic_file);
			switch($file_info[2]){
 			case 1:
 			$php_file=imagecreatefromgif($pic_file);
 			break;
 			case 2:
 			$php_file=imagecreatefromjpeg($pic_file);
 			break;
 			case 3:
 			$php_file=imagecreatefrompng($pic_file);
 			break;
 			}		
			//文字
			if(!$_sys['image_type'][0]){
				$mark_img=$php_file;
				$t_color=empty($_sys['image_text_color'])?array("255","255","255"):explode(',',$_sys['image_text_color']);
				$text_color=imagecolorallocate($php_file,$t_color[0],$t_color[1],$t_color[2]);
				$text_content=iconv("UTF-8","UTF-8",empty($_sys['image_text'])?'BEESCMS':$_sys['image_text']);
				$text_size=empty($_sys['image_text_size'])?"12":$_sys['image_text_size'];
				$font=DATA_PATH."font/arial.ttf";
				$text_arr=@imagettfbbox($text_size,0,$font,$text_content);
        		$text_width=max($text_arr[2],$text_arr[4])-min($text_arr[0],$text_arr[6]);
       		 	$text_height=max($text_arr[1],$text_arr[3])-min($text_arr[5],$text_arr[7]);
				switch($_sys['image_position'][0]){
				case '1':
				$position=array("5","5");
				break;
				case '2':
				$position=array(($file_info[0]-$text_width)/2,"5");
				break;
				case '3':
				$position=array($file_info[0]-$text_width-5,"5");
				break;
				case '4':
				$position=array("5",($file_info[1]-$text_height)/2);
				break;
				case '5':
				$position=array(($file_info[0]-$text_width)/2,($file_info[1]-$text_height)/2);
				break;
				case 6:
				$position=array($file_info[0]-$text_width-5,($file_info[1]-$text_height)/2);
				break;
				case 7:
				$position=array("3",$file_info[1]-$text_height-5);
				break;
				case 8:
				$position=array(($file_info[0]-$text_width)/2,$file_info[1]-$text_height-5);
				break;
				case 9:
				$position=array($file_info[0]-$text_width-10,$file_info[1]-$text_height-10);
				break;
				}
				imagettftext($mark_img,$text_size,0,($position[0]+$text_size),($position[1]+$text_size),$text_color,$font,$text_content);
				switch($file_info[2]){
				case 1:
				imagegif($mark_img,$pic_file);
				break;
				case 2:
				imagejpeg($mark_img,$pic_file);
				break;
				case 3:
				imagepng($mark_img,$pic_file);
				break;
				}
			}
			//图片
			if($_sys['image_type'][0]){
				$logo=CMS_PATH.'upload/'.$_sys['pic'];
				$logo_info=getimagesize($logo);
				switch($logo_info[2]){
 				case 1:
 				$logo_file=imagecreatefromgif($logo);
 				break;
 				case 2:
 				$logo_file=imagecreatefromjpeg($logo);
 				break;
 				case 3:
 				$logo_file=imagecreatefrompng($logo);
 				break;
 				}
				switch($_sys['image_position'][0]){
				case '1':
				$position=array("5","5");
				break;
				case '2':
				$position=array(($file_info[0]-$logo_info[0])/2,"5");
				break;
				case '3':
				$position=array($file_info[0]-$logo_info[0]-5,"5");
				break;
				case '4':
				$position=array("5",($file_info[1]-$logo_info[1])/2);
				break;
				case '5':
				$position=array(($file_info[0]-$logo_info[0])/2,($file_info[1]-$logo_info[1])/2);
				break;
				case 6:
				$position=array($file_info[0]-$logo_info[0]-5,($file_info[1]-$logo_info[1])/2);
				break;
				case 7:
				$position=array("3",$file_info[1]-$logo_info[1]-5);
				break;
				case 8:
				$position=array(($file_info[0]-$logo_info[0])/2,$file_info[1]-$logo_info[1]-5);
				break;
				case 9:
				$position=array($file_info[0]-$logo_info[0]-10,$file_info[1]-$logo_info[1]-10);
				break;
				}
				$logo_img=$php_file;
				imagecopy($logo_img,$logo_file,$position[0],$position[1],0,0,$logo_info[0],$logo_info[1]);
				switch($file_info[2]){
				case 1:
				imagegif($logo_img,$pic_file);
				break;
				case 2:
				imagejpeg($logo_img,$pic_file);
				break;
				case 3:
				imagepng($logo_img,$pic_file);
				break;
				}
				
			}
		}
				//缩略图
			if($first_pic&&$i==0&&empty($thumb)){
				$thumb=pic_thumb($pic_file,$_sys['thump_width'],$_sys['thump_height'],$pic_dir);
			}
			$i=$i+1; 
		}
	}
	$body=addslashes($body);
	$fields['content']=$body;
	}//编辑器处理
   $info=($is_info&&empty($info))?cn_substr(strip_tags($fields['content']),255):cn_substr($info,240);
   $key_words=empty($key_words)?'':cn_substr($key_words,150);
  	$author=empty($author)?'':cn_substr($author,150);
  	$source=empty($source)?'':cn_substr($source,150);
	$cache_time=empty($cache_time)?30:$cache_time;//缓存时间
	//主表
	 $main_sql="update ".DB_PRE."maintb set title='{$title}',filter='{$filter_str}',tbpic='{$thumb}',keywords='{$key_words}',info='{$info}',author='{$author}',source='{$source}',category={$cate_id},top={$top},purview={$purview},is_html={$is_html},cache_time='{$cache_time}',updatetime='{$addtime}' where id={$id}";
	$GLOBALS['mysql']->query($main_sql);
	
	//处理附加字段
	$field_sql='';
	foreach($fields as $k=>$v){
		$f_value=$v;
		if(is_array($v)){
			$f_value=implode(',',$v);
		}
		$field_sql.=",{$k}='{$f_value}'";		
	}
	$field_sql=substr($field_sql,1);
	$field_sql="update {$table} set {$field_sql} where id={$id}";
	if(!$link=$GLOBALS['mysql']->query_error($field_sql)){
		msg('<span style="color:red">修改频道表发生错误</span>'.$GLOBALS['mysql']->get_error());
	}
	msg('内容修改成功,<a href="admin_content_alone.php?action=content_list">返回内容列表</a>',"admin_content_alone.php?action=content_list");
	
}

function content_list(){
	global $id,$page,$cate,$lang;
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	if(empty($channel)){
		msg('<span style="color:red">请先添加频道或更新频道缓存</span>','admin_channel.php');
	}
	if(file_exists(DATA_PATH."cache/lang_cache.php")){include(DATA_PATH."cache/lang_cache.php");}
	foreach($channel as $key=>$value){
		if($value['channel_mark']=='alone'){
		$c_arr=$value;
		}
	}
	if($c_arr['is_disable']){
		msg('<span style="color:red">单页频道没有开启,请先开启单页频道</span>');
	}
	$id=$c_arr['id'];
	include('template/admin_content_alone_list.html');
}

//删除文章内容
function del(){
	if(!check_purview('content_del')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$id,$channel_id,$all,$cate;
	if(empty($id)){msg('<span style="color:red">参数传递错误,请重新操作</span>');}
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	if(empty($channel)){
		msg('<span style="color:red">请先添加频道或更新频道缓存</span>','admin_channel.php');
	}
	foreach($channel as $k=>$v){
		if($v['id']==$channel_id){
			$table=$v['channel_table'];
		}
	}
	unset($channel);
	if(empty($table)){msg('<span style="color:red">不存在相关频道,请更新频道缓存</span>');}
	//栏目缓存
	if(file_exists(DATA_PATH.'cache_cate/cache_category_all.php')){
	include(DATA_PATH.'cache_cate/cache_category_all.php');
	}else{
		msg('<span style="color:red">请先添加栏目或更新栏目缓存</span>');
	}
	$cate_info=get_cate_info($cate,$category);
	$fl_dir=CMS_PATH.'htm/'.$cate_info['cate_fold_name'].'/';
	$content=$GLOBALS['mysql']->fetch_asc("select m.*,c.* from ".DB_PRE."maintb as m left join ".DB_PRE."alone as c on m.id=c.id where category={$cate}");
	$body_content=$content[0]['content'];
	unset($content);
	$body_arr=preg_split('/<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;<\/span><\/div>/i',$body_content);
	$body_n=count($body_arr);
	$body_n=($body_n>1)?$body_n:0;
	if($body_n){
		for($i=0;$i<$body_n;$i++){
			$p=$i+1;
			$file=($i==0)?$fl_dir.'index_'.$lang.'.html':$fl_dir.'index_'.$lang.'_'.$p.'.html';
			if(file_exists($file)){
				@unlink($file);
			}
		}
	}else{
		$file=$fl_dir.'index_'.$lang.'.html';
		if(file_exists($file)){
				@unlink($file);
		}
	}
	
	$GLOBALS['mysql']->query('delete from '.DB_PRE."maintb where id={$id}");
	$GLOBALS['mysql']->query('delete from '.DB_PRE."{$table} where id={$id}");
	//设置栏目已有内容
	$GLOBALS['mysql']->query("update ".DB_PRE."category set is_content=0 where id=".$cate);
	//更新栏目列表
	$sql="select c.id,c.cate_channel,c.cate_html,c.is_content,c.cate_nav,c.cate_fold_name,c.cate_order,c.cate_hide,c.cate_tpl,c.cate_name,c.lang,c.cate_parent,COUNT(s.id) as haschild from ".DB_PRE."category as c left join ".DB_PRE."category as s on c.id=s.cate_parent where c.lang='".$GLOBALS['lang']."' group by c.id order by c.cate_order,c.id desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$str="<?php\n\$cate_list=".var_export($rel,true).";\n?>";
	$file=DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php';
	creat_inc($file,$str);
	$GLOBALS['cache']->cache_category_all();
	
	msg('文章删除成功','?action=content_list');
}

//内容审核
function verify(){
	if(!check_purview('content_verify')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $all,$step,$lang;
	if($step=='2'){
		if(empty($all)){msg('<span style="color:red">请选择需要审核的内容</span>');}
		$str="<?php\n\$arr=".var_export($all,true).";\n?>";
		cache_write(DATA_PATH.'cache_arr/content_arr.php',$str);
		show_htm('开始审核文章','?action=verify&step=1&lang='.$lang);
	}
	if($step=='1'){
		if(file_exists(DATA_PATH.'cache_arr/content_arr.php')){include(DATA_PATH.'cache_arr/content_arr.php');}
		if(!empty($arr)){
			$id=array_shift($arr);
		}
		if(!empty($id)){
		$sql="select title from ".DB_PRE."maintb where id={$id}";
		$id_arr=$GLOBALS['mysql']->fetch_asc($sql);
		$sql="update ".DB_PRE."maintb set verify=0 where id={$id}";
		$GLOBALS['mysql']->query($sql);
		$str="<?php\n\$arr=".var_export($arr,true).";\n?>";
		cache_write(DATA_PATH.'cache_arr/content_arr.php',$str);
		show_htm("文章【{$id_arr[0]['title']}】通过审核",'?action=verify&step=1&lang='.$lang);
		}else{
		show_htm("选择文章审核完成",'?action=content_list&lang='.$lang);
		}
	}
}
?>
