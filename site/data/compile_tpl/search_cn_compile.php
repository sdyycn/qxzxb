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
<div class="contain">
	<div class="search_title">
	搜索<span style="color:red; font-weight:bold"><?php echo $key;?></span>的结果如下<a href="<?php cmspath('index');?>">返回首页</a>
	</div>
<?php if(!$search){?>
	<div class="search_content">
		<h2>没有相关内容</h2>
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