<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="<?php echo $webinfo['description'];?>">
<meta name="keywords" content="<?php echo $webinfo['keywords'];?>">
<title><?php echo $webinfo['webname'];?></title>
<link href="<?php cmspath('template');?>/images/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php cmspath('template');?>/images/jquery.js"></script>
</head>
<body>
<?php $this->display('head',1);?>
<div class="contain" style="margin-top:8px;">
 <div class="main_left">
  <h2 class="title"><span class="search_icon">Search</span></h2>
  <div class="search">
  <form name="form1" action="<?php cmspath('search');?>" method="post" style="margin-top:5px;">
  <input name="key" style="width:100px; display:block; float:left; height:20px; line-height:19px;"/><input type="submit" name="submit" value="Search" style="border:1px solid #CC3300; background:#FF9900; color:#FFFFFF; margin-left:5px; padding:2px 0;" />
  </form>
  </div><!--搜索-->
  <h2 class="title" style="margin-top:15px;"><span class="link_icon"><?php echo $language['contact'];?></span></h2>
  <div class="link">
 <?php echo $link_us;?>
  </div>
  <h2 class="title"><span class="pr_icon"><?php echo $language['products_nav'];?></span></h2>
  <ul class="pr_nav">
  <?php 
 if(isset($list_nav)&&is_array($list_nav)){
foreach($list_nav as $v){?>
   <li class="<?php echo $v['class'];?>"><a href="<?php echo $v['url'];?>" <?php echo $v['target'];?> title="<?php echo $v['cate_name'];?>"><?php echo $v['cate_name'];?></a></li>
   <?php 
}
}?>
  </ul>
 </div><!--左边-->
 <div class="main_right">
  <h2 class="title2"><span><?php echo $language['index_company'];?></span></h2>
  <div class="us"><?php echo $about;?>
</div>
  <div class="index_pr_list">
   <div class="list_top">
    <div class="list_btn">
	<div class="dl_list">
	<?php 
 if(isset($article_pr)&&is_array($article_pr)){
foreach($article_pr as $v){?>
	<dl>
	<dt><div class="img_top"><div class="img_btn"><a href="<?php echo $v['url'];?>" <?php echo $v['target'];?> title="<?php echo $v['title'];?>"><img src="<?php echo $v['tbpic'];?>" border="0" height="90" width="90" alt="<?php echo $v['title'];?>" /></a></div></div></dt>
	<dd class="title"><a href="<?php echo $v['url'];?>" <?php echo $v['target'];?> title="<?php echo $v['title'];?>"><?php echo $v['style_title'];?></a></dd>
	<dd class="info"><?php echo $v['info'];?></dd>
	</dl>
	<?php 
}
}?>
	
	</div>
	<div class="clear"></div>
	</div>
   </div>
  </div>
 </div><!--右边-->
 <div class="clear"></div>
</div><!--主体-->
<div class="index_link">
<h2 class="title2" style="border:none"><span><?php echo $language['links'];?></span></h2>
<ul>
<?php 
 if(isset($weblink)&&is_array($weblink)){
foreach($weblink as $v){?>
<li><a href="<?php echo $v['link_url'];?>"><?php echo $v['link_name'];?></a></li>
<?php 
}
}?>
</ul>
<div class="clear"></div>
</div><!--友情-->
<?php $this->display('foot',1);?>
</body>
</html>