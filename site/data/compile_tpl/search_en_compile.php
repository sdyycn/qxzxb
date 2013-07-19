<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="search">
<meta name="keywords" content="search">
<title>search_<?php echo $webinfo['webname'];?></title>
<link href="<?php cmspath('template');?>/images/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php cmspath('template');?>/images/jquery.js"></script>
<script type="text/javascript" src="<?php cmspath('template');?>/images/nav.js"></script>
</head>
<body>
<?php $this->display('head',1);?>
<div class="contain" style="margin-top:5px;">
	<div class="s_head">
		<div class="search">
		<form name="form1" action="<?php cmspath('search');?>" method="post">
		<input name="key" value="" style="width:250px; display:block; float:left; height:20px; line-height:19px;"  type="text"/><input type="submit" name="submit" value="Search" style="border:1px solid #CC3300; background:#FF9900; color:#FFFFFF; margin-left:5px; padding:2px 0;" /><div class="hot"><span>Hot：</span>
		<?php 
 if(isset($hot_key)&&is_array($hot_key)){
foreach($hot_key as $v){?>
		<a href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a>
		<?php 
}
}?>
		</div>
		<div class="clear"></div>
		</form>
	</div><!--搜索-->
	</div>
	<div class="search_title">
	Search<span style="color:red; font-weight:bold"><?php echo $key;?></span>Results are as follows<a href="<?php cmspath('index');?>">Back</a>
	</div>
<?php if(!$search){?>
	<div class="search_content">
		<h2>No Contents</h2>
	</div>
<?php }else{?>	
	<?php 
 if(isset($search)&&is_array($search)){
foreach($search as $v){?>
	<div class="search_content">
		<h2><a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['title'];?></a></h2>
		<p><?php echo $v['info'];?></p>
	</div><!--搜索内容-->
	<?php 
}
}?>
<?php }?>	
	<div class="search_page">
		<ul>
		<?php echo $search_page;?>
	</ul>
	<div class="clear"></div>
	</div><!--分页-->
</div>
<?php $this->display('foot',1);?>
</body>
</html>