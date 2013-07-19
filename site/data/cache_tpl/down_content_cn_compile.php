<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="<?php echo $content['info'];?>">
<meta name="keywords" content="<?php echo $content['keywords'];?>">
<title><?php echo $content['title'];?>_<?php echo $cateinfo['catename'];?>_<?php echo $webinfo['webname'];?></title>
<link href="<?php cmspath('template');?>/images/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php cmspath('template');?>/images/jquery.js"></script>
<script type="text/javascript" src="<?php cmspath('template');?>/images/nav.js"></script>
</head>
<body>
<?php $this->display('head',1);?>
<div class="div_margin"></div>
<div class="contain">
	<div class="contain_left">
		<div class="box left_width">
		<div class="box_left"></div>
		<div class="box_right"></div>
			<div class="box_title"><h2><?php echo $language['products_nav'];?></h2></div>
			<div class="box_in">
				<ul class="nav_list">
				<?php 
 if(isset($down_arc_nav)&&is_array($down_arc_nav)){
foreach($down_arc_nav as $v){?>
					<li class="<?php echo $v['class'];?>"><a href="<?php echo $v['url'];?>" <?php echo $v['target'];?> title="<?php echo $v['cate_name'];?>"><?php echo $v['cate_name'];?></a></li>
				<?php 
}
}?>
				</ul>
			</div>
		</div><!--容器结束-->
		<div class="div_margin"></div>
			<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2><?php echo $language['contact'];?></h2></div>
			<div class="box_in">
				<div class="contact">
				<?php echo $down_arc_link;?>
				</div>
			</div>
		</div><!--容器结束-->
		<div class="div_margin"></div>
			<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2><?php echo $language['hot_content'];?></h2></div>
			<div class="box_in">
				<div class="list_news">
					<ul>
					<?php 
 if(isset($down_arc_article)&&is_array($down_arc_article)){
foreach($down_arc_article as $v){?>
       					 <li><a title="<?php echo $v['title'];?>" <?php echo $v['target'];?> href="<?php echo $v['url'];?>"><?php echo $v['style_title'];?></a></li>
					<?php 
}
}?>
	   				</ul>  
				</div>
			</div>
		</div><!--容器结束-->
		<div class="div_margin"></div>
			<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2><?php echo $language['rec_content'];?></h2></div>
			<div class="box_in">
				<div class="list_product">
					<ul>
					 <?php 
 if(isset($down_arc_product)&&is_array($down_arc_product)){
foreach($down_arc_product as $v){?>
       					 <li><a title="<?php echo $v['title'];?>" <?php echo $v['target'];?> href="<?php echo $v['url'];?>"><img src="<?php echo $v['tbpic'];?>" alt="<?php echo $v['title'];?>" border="0" /><p><span class="title"><?php echo $v['style_title'];?></span><span><?php echo cn_substr($v['info'],50);?></span></p></a></li>
					<?php 
}
}?>
	   				</ul>
					<div class="clear"></div>  
				</div>
			</div>
		</div><!--容器结束-->
		
	</div><!--左边内容-->
	<div class="contain_right">
		
		<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2 class="position"><span><?php echo  $language['location'];?>:<?php position(); ?> > <?php echo $content['style_title'];?></span></h2></div>
			<div class="box_in">
				<p class="title"><?php echo $content['style_title'];?></p>
  <p class="info"><span><?php echo $language['content_hits'];?>:<script language="javascript" src="<?php cmspath('includes');?>/hits.php?id=<?php echo $content['id'];?>"></script></span><span><?php echo $language['content_pubdate'];?>:<?php echo $content['updatetime'];?></span><span><a href="javascript:window.print()">【<?php echo $language['print'];?>】</a></span><span><a href="javascript:self.close()">【<?php echo $language['close'];?>】</a></span></p>
 <ul class="soft_info">
  <li><span><?php echo $language['tpl_file_type'];?>:</span><?php echo $content['filetype'];?></li>
  <li><span><?php echo $language['tpl_file_size'];?>:</span><?php echo $content['filesize'];?></li>
 </ul><!--下载信息-->
 <p style="padding:5px 0; padding-left:20px; font-weight:bold; color:#777;"><?php echo $language['tpl_content'];?>:</p>
  <div class="arc_body">
  <?php echo $content['content'];?>
  </div>
  <div class="list_page" style="float:none;margin-left:300px;">
   <ul>
    <?php echo $body_pages;?>
   </ul>
   <div class="clear"></div>
  </div>
  <p style=" padding:15px 0; padding-left:18px; padding-bottom:8px; font-weight:bold;color:#999999"><?php echo $language['tpl_down_add'];?>:</p>
  <div class="soft_down">
   <a href="<?php echo $content['down'];?>" target="_blank"><?php echo $language['tpl_down'];?></a>
  </div><!--下载地址-->
 <div class="arc_link" style="clear:both"><span><?php echo $content['prev'];?></span><span><?php echo $content['next'];?></span></div>
				
			</div>
		</div><!--容器结束-->
	</div>
	<div class="clear"></div>
</div>

<?php $this->display('foot',1);?>
</body>
</html>