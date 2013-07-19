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
<div class="book_contain">
	<h2><?php echo $language['book'];?>：</h2>
	<?php 
 if(isset($book)&&is_array($book)){
foreach($book as $v){?>
	<div class="book">
		<div class="book_head">[<?php echo $v['book_name'];?>]:<span class="title"><?php echo $v['book_title'];?></span><span class="time"><?php echo date('Y-m-d H:m:s',$v['addtime']);?></span></div>
		<div class="book_content"><?php echo $v['book_content'];?></div>
		<?php if($v['reply']){?>
		<div class="book_reply"><?php echo $language['member_msg43'];?>：<?php echo $v['reply'];?></div>
		<?php }?>
	</div><!--列表-->
	<?php 
}
}?>
	<div class="page">
 	<ul>
		<?php echo $page;?>
	</ul>
 </div>
</div>
<div class="book_contain" style="margin-top:10px;">
<div class="book_form">
	<form action="?action=add&lang=<?php echo $lang;?>" method="post" name="form">
		<p><label><?php echo $language['book_msg5'];?>：</label><input name="book_name" style="width:200px; padding:2px 0" /></p>
		<p><label><?php echo $language['book_msg6'];?>：</label><input name="book_title" style="width:400px;padding:2px 0" /></p>
		<p><label><?php echo $language['book_msg7'];?>：</label><textarea name="book_content" style="width:400px; height:100px;"></textarea></p>
		<p><input style="margin-left:80px;" type="submit" name="submit" value="<?php echo $language['member_msg47'];?>" /></p>
	</form>
</div>	
</div>
</div>
<?php $this->display('foot',1);?>
</body>
</html>