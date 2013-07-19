<div class="head_login" id="user_login">
<form name="form1" action="<?php cmspath('cms');?>member.php" method="post">
<label><?php echo $language['member_login_user'];?>:</label><input type="text" id="ajax_user" name="user" style="width:100px" />
<label><?php echo $language['member_login_pass'];?>:</label><input type="password" id="ajax_password" name="password" style="width:100px" />
<label><?php echo $language['member_login_code'];?>:</label><input type="text" name="code" id="ajax_code" style="width:50px" /><img src="<?php cmspath('plus');?>/code.php" name="code" border="0" id="code" style="display:block; float:left;cursor:pointer; margin-left:5px; display:inline"/>
<input type="hidden" id="ajax_lang" value="<?php echo $lang;?>" name="lang" /><input type="button" style="border:0; margin-left:5px; display:inline; padding:0" src="<?php cmspath('template');?>/images/login_input2.gif" name="go" id="ajax_login" />
<label><a href="<?php cmspath('cms');?>member.php?action=regist&lang=<?php echo $lang;?>"><?php echo $language['member_regist'];?></a></label>
</form>
<div class="clear"></div>
</div><!--登录-->
<script type="text/javascript">
$(document).ready(function(){
	$('#code').click(function(){
	$(this).attr('src','<?php cmspath('plus');?>/code.php?tag='+new Date().getTime());
	});
	$.ajax({
			type:"POST",
			url:"<?php cmspath('cms');?>member.php",
			data:"action=is_ajax_login&lang="+"<?php echo $lang;?>",
			dataType:"json",
			success:function(data){
				if(data.login==1){
					$('#user_login').html(data.info);
				}
			}	
	});
	$('#ajax_login').click(function(){
		$.ajax({
			type:"POST",
			url:"<?php cmspath('cms');?>member.php",
			data:"action=ajax_login&lang="+$('#ajax_lang').val()+"&password="+$('#ajax_password').val()+"&user="+$('#ajax_user').val()+"&code="+$('#ajax_code').val(),
			dataType:"json",
			success:function(data){
				if(data.login==1){
					$('#user_login').html(data.info);
				}else{
					alert(data.info);
				}
			}
		});
	});
	
});
</script>

<div class="contain">
<div class="head">
 <div class="head_top"><a href="#">Contact Us</a><a href="#">Add To Favorites</a><?php 
 if(isset($langs)&&is_array($langs)){
foreach($langs as $v){?><a href="<?php echo $v['url'];?>" <?php echo $v['class'];?>><?php echo $v['lang_name'];?></a><?php 
}
}?></div>
 <div class="head_logo">
  <div class="logo"></div>
  <div class="nav">
  <div class="nav_right">
   <ul>
    <li class="nav_left"></li>
	<li><a href="<?php cmspath('index');?>"><?php echo $language['index'];?></a></li>
	<?php 
 if(isset($nav_middle)&&is_array($nav_middle)){
foreach($nav_middle as $v){?>
	<li class="<?php echo $v['class'];?>"><a href="<?php echo $v['url'];?>" <?php echo $v['target'];?> title="<?php echo $v['cate_name'];?>"><?php echo $v['cate_name'];?></a></li>
	<?php 
}
}?>
   </ul>
   </div>
   <div class="clear"></div>
  </div>
 </div><!--导航-->
</div>
</div><!--顶部-->
<div class="flash">
<?php echo flash_ad();?>
</div><!--幻灯-->