<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="<?php echo $cateinfo['description'];?>">
<meta name="keywords" content="<?php echo $cateinfo['keywords'];?>">
<title><?php echo $cateinfo['catename'];?>_<?php echo $webinfo['webname'];?></title>
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
 if(isset($list_nav)&&is_array($list_nav)){
foreach($list_nav as $v){?>
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
				<?php echo $list_link;?>
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
 if(isset($list_article)&&is_array($list_article)){
foreach($list_article as $v){?>
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
 if(isset($list_product)&&is_array($list_product)){
foreach($list_product as $v){?>
       					 <li><a title="<?php echo $v['title'];?>" <?php echo $v['target'];?> href="<?php echo $v['url'];?>"><img src="<?php echo $v['tbpic'];?>" alt="<?php echo $v['title'];?>" border="0" /><p><?php echo $v['style_title'];?></p></a></li>
					<?php 
}
}?>
	   				</ul>  
				</div>
			</div>
		</div><!--容器结束-->
		
	</div><!--左边内容-->
	<div class="contain_right">
		
		<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2 class="position"><span><?php echo $language['location'];?>:<?php position(); ?> > <?php echo $language['tpl_list'];?></span></h2></div>
			<div class="box_in">
				<ul class="ul_list_article">
  				<?php 
 if(isset($list)&&is_array($list)){
foreach($list as $v){?>
				<?php if($v['first']){?>
			<li class="list_info">
				<dl>
					<dt><span class="title"><a href="<?php echo $v['url'];?>" <?php echo $v['target'];?>><?php echo $v['style_title'];?></a></span></dt>
					<dd><p class="in_pic"><img src="<?php echo $v['tbpic'];?>" height="60" width="60" border="0" /></p><p class="in_text"><?php echo $v['info'];?></p></dd>
				</dl>
				<div class="clear"></div>
			</li>
			<?php }else{?>
				<li><span class="time"><?php echo date('Y-m-d 	H:m:s',$v['updatetime']);?></span><a href="<?php echo $v['url'];?>" <?php echo $v['target'];?>><?php echo $v['style_title'];?></a></li>
				<?php }?>
				<?php 
}
}?>
  				</ul>
 				 <div class="list_page">
   				<ul>
    			<?php echo $list_page;?>
   				</ul>
  				</div>
				<div class="clear"></div>
			</div>
		</div><!--容器结束-->
	</div>
	<div class="clear"></div>
</div>
<?php $this->display('foot',1);?>
</body>
</html>