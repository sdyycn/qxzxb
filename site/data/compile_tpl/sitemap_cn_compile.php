<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="<?php echo $language['sitemap'];?>">
<meta name="keywords" content="<?php echo $language['sitemap'];?>">
<title><?php echo $language['sitemap'];?>_<?php echo $webinfo['web_name'];?></title>
<link href="<?php cmspath('template');?>/images/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php cmspath('template');?>/images/jquery.js"></script>
<script type="text/javascript" src="<?php cmspath('template');?>/images/nav.js"></script>
</head>
<body>
<?php $this->display('head',1);?>
<div class="div_margin"></div>
<div class="contain">
	<div class="sitemap">
	  <div class="sitemap_box">
	  <?php 
 if(isset($sitemap)&&is_array($sitemap)){
foreach($sitemap as $child){?>
	  <h2><a href="<?php echo $child['url'];?>" title="<?php echo $child['name'];?>"><?php echo $child['name'];?></a></h2>
	  <?php if($child['child']){?>
	    <ul>
		<?php 
 if(isset($child['child'])&&is_array($child['child'])){
foreach($child['child'] as $v){?>
		 <li><a href="<?php echo $v['url'];?>" title="<?php echo $v['name'];?>"><?php echo $v['name'];?></a></li>
		 <?php 
}
}?>
		</ul>
	  <?php }?>	
		<div class="clear"></div>
		<?php 
}
}?>
	  </div>	 
	</div><!--网站地图-->
</div>
<?php $this->display('foot',1);?>
</body>
</html>