<div class="contain foot">
 <div class="foot_nav">
  <?php 
 if(isset($nav_bottom)&&is_array($nav_bottom)){
foreach($nav_bottom as $v){?>
  <a href="<?php echo $v['url'];?>" title="<?php echo $v['cate_name'];?>"><?php echo $v['cate_name'];?></a><?php if(!$v['last']){?>|<?php }?>
  <?php 
}
}?>
 </div>
 <p><?php echo $webinfo['powerby'];?></p>
<!-- <p>备案号：<?php echo $webinfo['beian'];?></p> -->
<!-- <p>powerd by <a href="http://www.beescms.com" target="_blank">BEESCMS</a></p>-->
</div><!--页脚-->
<?php echo $webinfo['yinxiao'];?>
<?php $this->display('kefu',1);?>

