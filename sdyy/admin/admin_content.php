<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('/configs/config.db.php');
require_once('/include/Page.class.php');

/*/
define('IN_CMS','true');
include('init.php');
$action=isset($action)?$action:'content';
$lang=isset($lang)?$lang:get_lang_main();
if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}
go_url($action);
//*/
function content(){

}

function add(){
	if(!check_purview('content_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$id,$cate_id,$_confing;
	if(!file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		msg('<span style="color:red">请先添加'.$lang.'语言频道或更新该语言频道缓存</span>');
	}
	include(DATA_PATH."cache_channel/cache_channel_all.php");
	if(empty($channel)){
		msg('<span style="color:red">请先添加频道</span>','admin_channel.php');
	}

	foreach($channel as $key=>$value){
		if($value['is_alone']||$value['is_disable']){
			continue;
		}
		$c_arr[]=$value;
	}
	$id=empty($id)?$c_arr[0]['id']:$id;
	include('template/admin_content_add.html');
}

function save_content(){
	if(!check_purview('content_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$id,$title,$filter,$thumb,$key_words,$info,$author,$source,$category,$addtime,$top,$purview,$is_html,$fields,$is_info,$first_pic,$down_file,$filter_g,$g_url,$pic_watermark,$title_color,$title_style,$is_open,$cache_time;
	if(file_exists(DATA_PATH."sys_info.php")){include(DATA_PATH."sys_info.php");}
	if(!isset($id)||empty($id)){msg('<span style="color:red">不存在相关频道,请选择频道再添加内容</span>');}
	if(empty($GLOBALS['title'])||!isset($GLOBALS['title'])){msg('<span style="color:red">标题不能为空</span>');}
	$title=empty($_sys['web_content_title'])?cn_substr($title,60):cn_substr($title,intval($_sys['web_content_title']));
	if(empty($GLOBALS['category'])){msg('<span style="color:red">栏目不能为空</span>');}
	if($GLOBALS['category']=="index"){msg('<span style="color:red">频道栏目不能发布内容</span>');}
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	if(empty($channel)){
		msg('<span style="color:red">没有找到当前操作的频道,请更新频道缓存或重新添加频道</span>');
	}
	foreach($channel as $key=>$value){
		if($value['id']==$id){
			$table=DB_PRE.$value['channel_table'];//取得附加表
			$verify=$value['is_verify'];
		}
	}
	
	$hits=($_sys['is_hits'])?$_sys['is_hits']:rand(1,500);
	$addtime=empty($addtime)?time():strtotime($addtime);
	$is_html=($is_html=='1')?1:0;
	$url_add=empty($g_url)?'http://':$g_url;
	$is_url=0;
	if($filter_g=='g'){
		$is_url=1;
	}
	
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
	$cms_path=str_replace(ADMINDIR.'/admin_content.php','',$_SERVER['PHP_SELF']);
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
	}
  $info=($is_info&&empty($info))?cn_substr(strip_tags($fields['content']),240):cn_substr($info,240);
  $key_words=empty($key_words)?'':cn_substr($key_words,150);
  $author=empty($author)?'':cn_substr($author,150);
  $source=empty($source)?'':cn_substr($source,150);
  $cache_time=empty($cache_time)?30:$cache_time;//缓存时间
	//添加主表
 $main_sql="insert into ".DB_PRE."maintb (title,filter,tbpic,keywords,info,author,source,hits,category,channel,addtime,top,purview,is_html,lang,updatetime,is_url,url_add,verify,title_color,title_style,is_open,cache_time) values ('{$title}','{$filter_str}','{$thumb}','{$key_words}','{$info}','{$author}','{$source}',{$hits},{$category},{$id},'{$addtime}',{$top},{$purview},{$is_html},'{$lang}','{$addtime}',{$is_url},'{$url_add}',{$verify},'{$title_color}',{$title_style},{$is_open},'{$cache_time}')";
	$GLOBALS['mysql']->query($main_sql);
	$last_id=$GLOBALS['mysql']->insert_id();
	//生成url
	if($is_html){
	$url='show_content.php?id='.$last_id;
	}else{
	$url=get_ct_path($addtime,$category,$last_id);
	}
	$GLOBALS['mysql']->query("update ".DB_PRE."maintb set url='{$url}' where id={$last_id}");
	//处理附加字段
	if(!empty($fields)){
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
		msg('<span style="color:red">添加附加表表发生错误</span>'.$GLOBALS['mysql']->get_error(),'',0);
	}
	
	//生成html
	global $_confing,$cate_is,$tpl,$channel_table,$language;
	global $cateid;
	$cateid=$category;
		//网站配置
if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}
if(!empty($_confing)){
 foreach($_confing as $k=>$v){
 	$_confing[$k]=stripslashes($v);
 }
}
$go_show='';

if($_sys['arc_html'][0]&&$_confing['web_html']&&!$is_html){
	include(INC_PATH.'lib.php');
//载入语言包
if(file_exists(LANG_PATH.'lang_'.$lang.'.php')){include(LANG_PATH.'lang_'.$lang.'.php');}
	if(file_exists(DATA_PATH.'cache_cate/cache_category_all.php')){
		include(DATA_PATH.'cache_cate/cache_category_all.php');
	}else{
		msg('<span style="color:red">请先添加栏目或更新栏目缓存</span>');
	}
	$cate_info=get_cate_info($cateid,$category);
	$channel_info=get_cate_info($cate_info['cate_channel'],$channel);
		//判断内容页模板
	if(!file_exists(TP_PATH.$_confing['web_template']."/{$cate_info['cate_tpl_content']}")){
		die("<p style=\"color:red\">$ct={$ct}$cat_id={$cat_id}不存在【{$lang}】语言栏目【{$cate_info['cate_name']}】的内容模板(template/{$_confing['web_template']}/{$cate_info['cate_tpl_content']});生成失败!请添加模板后从生成菜单进行手工生成</p>");
	}
			$channel_table=$channel_info['channel_table'];
				$content=get_content($last_id,$channel_info['channel_table'],$cateid);
				$content=$content[0];
				//权限跳过生成
				if(!$content['purview']){
				$c_addtime=date('Y-m-d',$content['addtime']);
				$addtime_rel=explode('-',$c_addtime);
				$fl_dir=CMS_PATH.'htm/'.$cate_info['cate_fold_name'].'/'.$addtime_rel[0].'/'.$addtime_rel[1].$addtime_rel[2].'/';
				create_folder($fl_dir);
				//文章分页
				global $id,$content_arr_num,$content_focus,$ishtml;
				$id=$last_id;
				$body_content=$content['content'];
				$content_arr=preg_split('/<div style=\"page-break-after: always[;]*\"><span style=\"display: none[;]*\">&nbsp;<\/span><\/div>/i',$content['content']);
				$content_arr_num=count($content_arr);
				$content_arr_num=($content_arr_num>1)?$content_arr_num:0;
				
				ob_start();
				if($content_arr_num){
					for($i=0;$i<$content_arr_num;$i++){
						$content_focus=$i;
						$content['content']=$content_arr[$i];
						$p=$i+1;
						$file=($i==0)?$fl_dir.$content['id'].'.html':$fl_dir.$content['id'].'_'.$p.'.html';
						$tpl_rel=explode('.',$cate_info['cate_tpl_content']);
						include(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
						$tpl->template_dir=TP_PATH.$_confing['web_template'].'/';
						$tpl->template_lang=$lang;
						$tpl->template_is_cache=0;
						$tpl->display($tpl_rel[0]);//载入模板
						creat_html($file);//生成文件
					}
				}else{
				$file=$fl_dir.$content['id'].'.html';
				$tpl_rel=explode('.',$cate_info['cate_tpl_content']);
				include(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
				$tpl->template_dir=TP_PATH.$_confing['web_template'].'/';
				$tpl->template_lang=$lang;
				$tpl->template_is_cache=0;
				$tpl->display($tpl_rel[0]);//载入模板
				creat_html($file);//生成文件
				}
				}
				echo "文章【".$content['title']."】生成完成";
				$go_show='【<a href="'.CMS_SELF.str_replace(CMS_PATH,'',$file).'" target="_blank">查看生成的文章</a>】';
				}
			//生成结束
	
	show_htm('内容添加成功,你可以选择【<a href="admin_content.php?action=add&lang='.$GLOBALS['lang'].'&id='.$id.'&cate_id='.$cateid.'">继续添加</a>】【<a href="admin_content.php?action=content_list&lang='.$GLOBALS['lang'].'&id='.$id.'">返回管理内容</a>】'.$go_show.'【<a href="admin_htm.php?lang='.$GLOBALS['lang'].'">更新html</a>】','javascript:history.go(-1);',0);
	
	
}


function content_list(){
	global $lang,$id,$page,$cate,$_confing,$verify,$order,$key_words,$cate2;
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){
		include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');
	}
	if(empty($channel)){
		msg('<span style="color:red">请先添加频道或更新频道缓存</span>','admin_channel.php');
	}
	
	foreach($channel as $key=>$value){
		if($value['channel_mark']=='alone'||$value['is_disable']){
		continue;
		}
		$c_arr[]=$value;
	}
	$id=empty($id)?$c_arr[0]['id']:$id;
	include('template/admin_content_list.html');
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
	include('template/admin_content_edit.html');
}

function save_edit_content(){
	if(!check_purview('content_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$id,$channel_id,$title,$filter,$thumb,$key_words,$info,$author,$source,$category,$updatetime,$addtime,$top,$is_info,$purview,$is_html,$fields,$filter_g,$g_url,$is_info,$first_pic,$down_file,$pic_watermark,$title_color,$title_style,$is_open,$cache_time;
	if(file_exists(DATA_PATH.'sys_info.php')){include(DATA_PATH.'sys_info.php');}
	if(!isset($channel_id)||empty($channel_id)){
		msg('<span style="color:red">不存在相关频道</span>','admin_content.php');
	}
	if(empty($GLOBALS['title'])||!isset($GLOBALS['title'])){
		msg('<span style="color:red">标题不能为空</span>');
	}
	$title=empty($_sys['web_content_title'])?cn_substr($title,60):cn_substr($title,intval($_sys['web_content_title']));
	if(empty($GLOBALS['category'])){
		msg('<span style="color:red">栏目不能为空</span>');
	}
	if($GLOBALS['category']=="index"){
		msg('<span style="color:red">频道栏目不能发布内容</span>');
	}
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	if(empty($channel)){
		msg('<span style="color:red">没有找到当前操作的频道,请更新频道缓存或重新添加频道</span>');
	}
	foreach($channel as $key=>$value){
		if($value['id']==$channel_id){
			$table=DB_PRE.$value['channel_table'];
		}
	}
	if(file_exists(DATA_PATH.$lang."_inc.php")){
		include(DATA_PATH.$lang."_inc.php");
	}

	$updatetime=empty($updatetime)?time():strtotime($updatetime);
	$is_html=($is_html=='1')?1:0;
	$url_add=empty($g_url)?'http://':$g_url;;
	$is_url=0;
	if($filter_g=='g'){
		$is_url=1;
	}
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
	$cms_path=str_replace(ADMINDIR.'/admin_content.php','',$_SERVER['PHP_SELF']);
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
	}
	$info=($is_info&&empty($info))?cn_substr(strip_tags($fields['content']),255):cn_substr($info,240);
	$key_words=empty($key_words)?'':cn_substr($key_words,60);
  	$author=empty($author)?'':cn_substr($author,60);
  	$source=empty($source)?'':cn_substr($source,60);
	$cache_time=empty($cache_time)?30:$cache_time;//缓存时间
	$main_sql="update ".DB_PRE."maintb set title='{$title}',filter='{$filter_str}',tbpic='{$thumb}',keywords='{$key_words}',info='{$info}',author='{$author}',source='{$source}',category={$category},top={$top},purview={$purview},is_html={$is_html},is_url={$is_url},url_add='{$url_add}',title_color='{$title_color}',title_style={$title_style},is_open={$is_open},cache_time='{$cache_time}',updatetime='{$updatetime}' where id={$id}";
	$GLOBALS['mysql']->query($main_sql);
	
	//生成url
	if($is_html){
	$url='show_content.php?id='.$id;
	}else{
	$url=get_ct_path($addtime,$category,$id);
	}
	$GLOBALS['mysql']->query("update ".DB_PRE."maintb set url='{$url}' where id={$id}");
	
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
	
	//生成html
	global $_confing,$cate_is,$tpl,$channel_table,$language;
	global $cateid;
	$cateid=$category;
		//网站配置
if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}
if(!empty($_confing)){
 foreach($_confing as $k=>$v){
 	$_confing[$k]=stripslashes($v);
 }
}
$go_show='';

if($_sys['arc_html'][0]&&$_confing['web_html']&&!$is_html){
	include(INC_PATH.'lib.php');
	include(INC_PATH.'tpl.class.php');
	$tpl=new tpl(TP_PATH,DATA_PATH.'cache_tpl/');
	$tpl->lang_dir($_confing['web_template'],$lang);

//载入语言包
if(file_exists(LANG_PATH.'lang_'.$lang.'.php')){include(LANG_PATH.'lang_'.$lang.'.php');}
	if(file_exists(DATA_PATH.'cache_cate/cache_category_all.php')){
		include(DATA_PATH.'cache_cate/cache_category_all.php');
	}else{
		msg('<span style="color:red">请先添加栏目或更新栏目缓存</span>');
	}
	$cate_info=get_cate_info($cateid,$category);
	$channel_info=get_cate_info($cate_info['cate_channel'],$channel);
		//判断内容页模板
	if(!file_exists(TP_PATH.$_confing['web_template']."/{$cate_info['cate_tpl_content']}")){
		die("<p style=\"color:red\">$ct={$ct}$cat_id={$cat_id}不存在【{$lang}】语言栏目【{$cate_info['cate_name']}】的内容模板(template/{$_confing['web_template']}/{$cate_info['cate_tpl_content']});生成失败!请添加模板后从生成菜单进行手工生成</p>");
	}
			$channel_table=$channel_info['channel_table'];
				$content=get_content($id,$channel_info['channel_table'],$cateid);
				$content=$content[0];
				//权限跳过生成
				if(!$content['purview']){
				$c_addtime=date('Y-m-d',$content['addtime']);
				$addtime_rel=explode('-',$c_addtime);
				$fl_dir=CMS_PATH.'htm/'.$cate_info['cate_fold_name'].'/'.$addtime_rel[0].'/'.$addtime_rel[1].$addtime_rel[2].'/';
				create_folder($fl_dir);
				//文章分页
				global $ct;
				$ct=$id;
				$body_content=$content['content'];
				$body_arr=preg_split('/<div style=\"page-break-after: always[;]*\"><span style=\"display: none[;]*\">&nbsp;<\/span><\/div>/i',$content['content']);
				global $body_n;
				$body_n=count($body_arr);
				$body_n=($body_n>1)?$body_n:0;
				
				ob_start();
				if($body_n){
				global $body_i;
					for($i=0;$i<$body_n;$i++){
						$body_i=$i;
						$content['content']=$body_arr[$i];
						$p=$i+1;
						$file=($i==0)?$fl_dir.$content['id'].'.html':$fl_dir.$content['id'].'_'.$p.'.html';
						$tpl_rel=explode('.',$cate_info['cate_tpl_content']);
						include($tpl->display($tpl_rel[0]));//载入缓存文
						creat_html($file);//生成文件
					}
				}else{
				$file=$fl_dir.$content['id'].'.html';
				$tpl_rel=explode('.',$cate_info['cate_tpl_content']);
				include($tpl->display($tpl_rel[0]));//载入缓存文
				creat_html($file);//生成文件
				}
				}
				echo "文章【".$content['title']."】生成完成";
				$go_show='【<a href="'.CMS_SELF.str_replace(CMS_PATH,'',$file).'" target="_blank">查看生成的文章</a>】';
				}
			//生成结束
			
	show_htm('内容修改成功,你可以选择【<a href="admin_content.php?action=content_list&id='.$channel_id.'&lang='.$lang.'">返回内容列表</a>】'.$go_show.'【<a href="admin_htm.php">更新html</a>】','',0);
	
}

//删除文章内容
function del(){
	if(!check_purview('content_del')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$id,$channel_id,$all;
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
	$sql="select url from ".DB_PRE."maintb where id={$id}";
	$htm_url=$GLOBALS['mysql']->get_row($sql);
	if(file_exists(CMS_PATH.$htm_url)){
		@unlink(CMS_PATH.$htm_url);
	}
	$GLOBALS['mysql']->query('delete from '.DB_PRE."maintb where id={$id}");
	$GLOBALS['mysql']->query('delete from '.DB_PRE."{$table} where id={$id}");
	msg('文章删除成功');
}

//删除文章集合
function del_all(){
	if(!check_purview('content_del')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $all,$lang,$channel_id,$step;
	if($step=='2'){
	//初始化
	if(empty($all)){msg('<span style="color:red">请选择需要删除的文章</span>');}
	$str="<?php\n\$arr=".var_export($all,true).";\n?>";
	cache_write(DATA_PATH.'cache_arr/content_arr.php',$str);
	show_htm('开始删除文章','?action=del_all&channel_id='.$channel_id.'&step=1&lang='.$lang);
	}
if($step=='1'){
	if(file_exists(DATA_PATH.'cache_arr/content_arr.php')){include(DATA_PATH.'cache_arr/content_arr.php');}
	if(!empty($arr)){
	$id=array_shift($arr);
	}
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
	if(!empty($id)){
	$sql="select url,title from ".DB_PRE."maintb where id={$id}";
	$id_arr=$GLOBALS['mysql']->fetch_asc($sql);
	$htm_url=$id_arr[0]['url'];
	if(file_exists(CMS_PATH.$htm_url)){
		@unlink(CMS_PATH.$htm_url);
	}
	$GLOBALS['mysql']->query('delete from '.DB_PRE."maintb where id={$id}");
	$GLOBALS['mysql']->query('delete from '.DB_PRE."{$table} where id={$id}");
	$str="<?php\n\$arr=".var_export($arr,true).";\n?>";
	cache_write(DATA_PATH.'cache_arr/content_arr.php',$str);
	show_htm("【{$id_arr[0]['title']}】文章成功删除",'?action=del_all&channel_id='.$channel_id.'&step=1');
	}else{
	show_htm("所选文章成功删除",'?action=content_list&channel_id='.$channel_id.'&lang='.$lang);
	}
}
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

//批量移动
function arc_move(){
	global $all,$lang,$channel;
	if(empty($all)){msg('<span style="color:red">请选择需要转移的内容！</span>');}
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');}
	include('template/admin_content_move.html');
}

function save_move(){
	global $arc_id,$move_cate,$lang,$channel;
	if(empty($move_cate)){msg('<span style="color:red">请选择需要转移的栏目</span>');}
	if(empty($arc_id)||empty($channel)){msg('<span style="color:red">参数错误,请重新操作</span>','?action=content_list&lang='.$lang);}
	$id_arr=array();
	$id_arr=explode(',',$arc_id);
	if(!empty($id_arr)){
		foreach($id_arr as $k=>$v){
			$GLOBALS['mysql']->query('update '.DB_PRE.'maintb set category='.intval($move_cate).' where id='.$v.' and channel='.intval($channel));
		}
	}
	msg('内容转移完成','?action=content_list&lang='.$lang);

}


class AdminContentPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_content_add.html');
	}
	
	function display(){
		parent::display();
	}
}

$page = new AdminContentPage;
$page->run();

?>