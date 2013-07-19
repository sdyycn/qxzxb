<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="<?php echo $content['info'];?>">
<meta name="keywords" content="<?php echo $content['keywords'];?>">
<title><?php echo $content['title'];?>_<?php echo $cateinfo['catename'];?>_<?php echo $webinfo['web_name'];?></title>
<link href="<?php cmspath('template');?>/images/style.css" rel="stylesheet" type="text/css">
<link href="<?php cmspath('template');?>/images/MagicZoom.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php cmspath('template');?>/images/mz-packed.js"></script>
<script type="text/javascript" src="<?php cmspath('template');?>/images/jquery.js"></script>
<script type="text/javascript" src="<?php cmspath('template');?>/images/nav.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.q_body ul li').click(function(){
		$index=$('.q_body ul li').index(this);
		$(this).addClass('focus').siblings().removeClass('focus');
		$('.show_q_body').find('#body').eq($index).show().siblings().hide();
	});
});
</script>
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
 if(isset($content_pr_nav)&&is_array($content_pr_nav)){
foreach($content_pr_nav as $v){?>
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
				<?php echo $content_pr_link;?>
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
 if(isset($content_pr_article)&&is_array($content_pr_article)){
foreach($content_pr_article as $v){?>
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
 if(isset($content_pr_product)&&is_array($content_pr_product)){
foreach($content_pr_product as $v){?>
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
			<div class="box_title"><h2 class="position"><span><?php echo $language['location'];?>:<?php position(); ?> > <?php echo $content['style_title'];?></span></h2></div>
			<div class="box_in">
				<p class="title"><?php echo $content['style_title'];?></p>
  <p class="info"><span><?php echo $language['content_hits'];?>:<script language="javascript" src="<?php cmspath('includes');?>/hits.php?id=<?php echo $content['id'];?>"></script></span><span><?php echo $language['content_pubdate'];?>:<?php echo $content['updatetime'];?></span><span><a href="javascript:window.print()">【<?php echo $language['print'];?>】</a></span><span><a href="javascript:self.close()">【<?php echo $language['close'];?>】</a></span></p>
 
  <div class="show_product">
  <div class="show_left">
   <div class="img">
    <?php 
 if(isset($album)&&is_array($album)){
foreach($album as $v){?>
	<?php if($v['first']){?>
   <a href="<?php echo $v['url'];?>" class="MagicZoom MagicThumb" id="zoom">
    <img src="<?php echo $v['url'];?>"  width="400" height="300" title="pic"/>
   </a>
   <?php }?>
   <?php 
}
}?>
   </div>
   <div class="img_go">
    <span onmouseover="moveLeft()" onmousedown="clickLeft()" onmouseup="moveLeft()" onmouseout="scrollStop()"></span>
      <div class="gallery">
        <div id="demo">
          <div id="demo1" style="float:left">
            <ul>
            <?php 
 if(isset($album)&&is_array($album)){
foreach($album as $v){?><li><a rel="zoom" href="<?php echo $v['url'];?>" rev="<?php echo $v['url'];?>"><img src="<?php echo $v['url'];?>" alt="" class="B_blue" /></a></li><?php 
}
}?>
            </ul>
          </div>
          <div id="demo2" style="display:inline; overflow:visible;"></div>
        </div>
      </div>
      <span onmouseover="moveRight()" onmousedown="clickRight()" onmouseup="moveRight()" onmouseout="scrollStop()" class="spanR"></span>
	  <div class="clear"></div>
      <script>
      function $gg(id){  
        return (document.getElementById) ? document.getElementById(id): document.all[id]
      }
      
      var boxwidth=53;//跟图片的实际尺寸相符
      
      var box=$gg("demo");
      var obox=$gg("demo1");
      var dulbox=$gg("demo2");
      obox.style.width=obox.getElementsByTagName("li").length*boxwidth+'px';
      dulbox.style.width=obox.getElementsByTagName("li").length*boxwidth+'px';
      box.style.width=obox.getElementsByTagName("li").length*boxwidth*3+'px';
      var canroll = false;
      if (obox.getElementsByTagName("li").length >= 4) {
        canroll = true;
        dulbox.innerHTML=obox.innerHTML;
      }
      var step=5;temp=1;speed=50;
      var awidth=obox.offsetWidth;
      var mData=0;
      var isStop = 1;
      var dir = 1;
      
      function s(){
        if (!canroll) return;
        if (dir) {
      if((awidth+mData)>=0)
      {
      mData=mData-step;
      }
      else
      {
      mData=-step;
      }
      } else {
        if(mData>=0)
        {
        mData=-awidth;
        }
        else
        {
        mData+=step;
        }
      }
      
      obox.style.marginLeft=mData+"px";
      
      if (isStop) return;
      
      setTimeout(s,speed)
      }
      
      
      function moveLeft() {
          var wasStop = isStop;
          dir = 1;
          speed = 50;
          isStop=0;
          if (wasStop) {
            setTimeout(s,speed);
          }
      }
      
      function moveRight() {
          var wasStop = isStop;
          dir = 0;
          speed = 50;
          isStop=0;
          if (wasStop) {
            setTimeout(s,speed);
          }
      }
      
      function scrollStop() {
        isStop=1;
      }
      
      function clickLeft() {
          var wasStop = isStop;
          dir = 1;
          speed = 25;
          isStop=0;
          if (wasStop) {
            setTimeout(s,speed);
          }
      }
      
      function clickRight() {
          var wasStop = isStop;
          dir = 0;
          speed = 25;
          isStop=0;
          if (wasStop) {
            setTimeout(s,speed);
          }
      }
      </script> 
   </div><!--滚动-->
  </div><!--相册500px-->
  <div class="show_right">
   <ul>
    <li><span><?php echo $language['tpl_spec'];?>:</span><?php echo $content['spec'];?></li>
	<li><span><?php echo $language['tpl_marketprice'];?>:</span><?php echo $content['marketprice'];?></li>
	<li><span><?php echo $language['tpl_model'];?>:</span><?php echo $content['model'];?></li>
   </ul>
  </div><!--详细-->
  <div class="clear"></div>
  </div><!--产品展示-->
  
  <div class="arc_body">
  
   <div class="q_body">
		<ul>
		 <li class="focus"><span><?php echo $language['tpl_content'];?></span></li>
		 <li><span><?php echo $language['tpl_pfsm'];?></span></li>
		 <li><span><?php echo $language['tpl_yfsm'];?></span></li>
		 <li><span><?php echo $language['tpl_jyfs'];?></span></li>
		 <li><span><?php echo $language['contact'];?></span></li>
		 <li><span><?php echo $language['tpl_fkxx'];?></span></li>
		</ul>
	</div>
  <div class="show_q_body">	
	<div id="body">
<?php echo $content['content'];?>
   <div class="list_page" style="float:none;margin-left:300px;">
   <ul>
   <?php echo $body_pages;?>
   </ul>
   
   <div class="clear"></div>
  </div>
  </div>
  <div id="body" style="display:none">
  	<?php echo $content['wholesale'];?>
  </div>
  <div id="body" style="display:none">
  	<?php echo $content['shipping'];?>
  </div>
  <div id="body" style="display:none">
  	<?php echo $content['trading'];?>
  </div>
  <div id="body" style="display:none">
  	<?php echo $content['contact'];?><br />
                <div class="con">
                    <h2 class="title">在线联系</h2>
                    <ul>
					<?php 
 if(isset($market)&&is_array($market)){
foreach($market as $v){?>
					<?php if($v['market_type']=='1'){?>
                        <li>
						<span class="lf">
                           <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $v['market_num'];?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $v['market_num'];?>:4" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						   </span>
						   <span class="lf"><?php echo $v['market_name'];?></span>
                        </li>
					<?php }?>
						<?php if($v['market_type']=='2'){?>
						 <li>
						<span class="lf">
                        <a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo $v['market_num'];?>&s=2" ><img border="0" src="http://amos1.taobao.com/online.ww?v=2&uid=wet101&s=2" alt="点击这里给我发消息" /></a>
						   </span>
						   <span class="lf"><?php echo $v['market_name'];?></span>
                        </li><!--alww-->
						<?php }?>
						<?php 
}
}?>
                    </ul>
					
                </div>
				
  </div>
  <div id="body" style="display:none">
  	<?php echo $form;?>
  </div>
  </div>
  
  </div>
  
 <div class="arc_link" style="clear:both"><span><?php echo $content['prev'];?></span><span><?php echo $content['next'];?></span></div>
 </div><!--右边-->
 <div class="clear"></div>
				
			</div>
		</div><!--容器结束-->
	</div>
	<div class="clear"></div>
</div>

<?php $this->display('foot',1);?>
</body>
</html>