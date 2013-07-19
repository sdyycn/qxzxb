<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="<?php echo $webinfo['description'];?>" />
		<meta name="keywords" content="<?php echo $webinfo['keywords'];?>" />
		<title><?php echo $webinfo['webname'];?></title>
		<link href="<?php cmspath('template');?>/images/style.css" rel="stylesheet"
			type="text/css" />
		<script type="text/javascript" src="<?php cmspath('template');?>/images/jquery.js"></script>
		<script type="text/javascript"
			src="<?php cmspath('template');?>/images/jCarouselLite.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			$(function() {
				$(".mouse .pic_contain").jCarouselLite({
	  			visible: 6,
	  			mouseWheel: true,
	  			onMouse: true,
	  			auto: true,
				speed: 4000
				});
			});
		});
		</script>
	</head>

	<?php $this->display('head',1);?>
	<div class="div_margin"></div>
	<div class="contain c_margin">
		<div class="contain_left">
			<div class="box left_width">
				<div class="box_left"></div>
				<div class="box_right"></div>
				<div class="box_title"><h2><?php echo $language['contact'];?></h2></div>
				<div class="box_in">
					<div class="contact" style="height: 190px;"><?php echo $link_us;?></div>
				</div>
			</div> <!-- box left_width end -->
		</div> <!-- contain_left end -->
		
		<div class="contain_right">
			<div class="contain_right_top">
				<div class="jianjie">
					<div class="box">
						<div class="box_left"></div>
						<div class="box_right"></div>
						<div class="box_title"><h2><?php echo $language['index_company'];?></h2></div>
						<div class="box_in">
							<div class="j_content"><?php echo $company;?></div>
						</div>
					</div> <!-- box end -->
				</div> <!-- jianjie end -->
				<div class="news">
					<div class="box">
						<div class="box_left"></div>
						<div class="box_right"></div>
						<div class="box_title">
							<h2><?php echo $language['index_news'];?></h2>
						</div>
						<div class="box_in">
							<div class="news_list">
								<?php 
 if(isset($article)&&is_array($article)){
foreach($article as $v){?>
								<div class="index_news_tj">
									<a href="<?php echo $v['url'];?>">
										<img height="90" width="120" src="<?php echo $v['tbpic'];?>" />
									</a>
									<p class="title2">
										<a href="<?php echo $v['url'];?>" <?php echo $v['target'];?> title="<?php echo $v['title'];?>">
											<?php echo $v['style_title'];?>
										</a>
									</p>
									<p class="info"><?php echo cn_substr($v['info'],140);?></p>
								</div>
								<?php 
}
}?>
								<ul>
									<?php 
 if(isset($article2)&&is_array($article2)){
foreach($article2 as $v){?>
									<li>
										<a title="<?php echo $v['title'];?>" href="<?php echo $v['url'];?>"<?php echo $v['target'];?>>
											<?php echo cn_substr($v['title'],50);?>
										</a>
										<?php echo date('Y-m-d',$v['updatetime']);?>
									</li>
									<?php 
}
}?>
								</ul>
							</div>
						</div> <!-- box_in end -->
					</div> <!-- box end -->
				</div> <!-- news end -->
				<div class="clear"></div>
			</div>
		</div> <!-- contain_right end -->

		<!----------------------------------------------------->
		<div class="clear"></div>
		<div class="div_margin"></div>
		<div class="pr">
			<div class="box">
				<div class="box_left"></div>		<!-- make top left corner  -->
				<div class="box_right"></div>		<!-- make top right corner -->
				<div class="box_title"><h2><?php echo $language['products'];?></h2></div>
				<div class="pr_box_in mouse">
					<div class="pic_contain">
						<ul class="pr_list">
							<?php 
 if(isset($article_pr)&&is_array($article_pr)){
foreach($article_pr as $v){?>
							<li>
								<a href="<?php echo $v['url'];?>">
									<img src="<?php echo $v['tbpic'];?>" border="0" width="120" height="120" />
								</a>
								<p><a href="<?php echo $v['url'];?>"><?php echo $v['style_title'];?></a></p>
								<p class="look"><a href="<?php echo $v['url'];?>"><?php echo $language['tpl_look'];?>></a></p>
							</li>
							<?php 
}
}?>
						</ul>
					</div> <!-- pic_contain end -->
					<div class="clear"></div>
				</div> <!-- box_in end -->
			</div> <!--box end -->
		</div>  <!-- product end -->

		<!----------------------------------------------------->
		<div class="clear"></div>
		<div class="div_margin"></div>
		<div class="web_link">
			<div class="box">
				<div class="box_left"></div>
				<div class="box_right"></div>
				<div class="box_title"><h2><?php echo $language['links'];?></h2></div>
				<div class="box_in">
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
				</div> <!-- box_in end -->
			</div> <!-- box end -->
		</div>
	</div>
	<?php $this->display('foot',1);?>

	</body>
</html>