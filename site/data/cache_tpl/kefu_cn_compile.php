    <style type="text/css">
        /*浮动QQ在线客服*/
        .kf_contain{z-index:99; width:142px; right:0; top:100px; position:absolute}
        .kf_contain .kf_list{ width:142px; margin:0 auto; background:#3e3e48}
        .kf_contain .kf_list .t{background:url(<?php cmspath('template');?>/images/kf_top.gif) no-repeat left 0; height:66px; font-size:1px}
        .kf_contain .kf_list .b{background:#3e3e48;height:2px}
        .kf_contain .kf_list .con{margin:0 auto; background:#fff; margin:0 3px 3px 3px; width:136px; overflow:hidden; text-align:center}
        .kf_contain .kf_list .con .title{font-size:12px; margin-bottom:5px; margin-left:5px; text-align:left; height:20px; padding-left:20px; background:url(<?php cmspath('template');?>/images/kf_icon.gif) no-repeat left center; line-height:20px; color:#000000}
        .kf_contain .kf_list .con ul{margin:0 auto; padding:0; width:133px; background-color:#FFFFFF; border:#FFFFFF 1px solid}
        .kf_contain .kf_list .con li{font-size:9pt; list-style-type:none; height:25px; padding-right:5px; clear:both; display:block;}
        .kf_contain .kf_list .con li span{line-height:25px; margin-left:10px;  display:block; vertical-align:middle}
		.kf_contain .kf_list .con li span.lf{float:left}
		.kf_contain .kf_list .con li span.lr{float:right}
		.on_kf{width:25px; height:120px; float:right}
        /*浮动QQ在线客服*/
    </style>
    <form id="form1" runat="server">
    <div>
	<div  class="kf_contain" id="kf_contain">
		<div class="on_kf" id="on" onmouseover="kf_on();"><img src="<?php cmspath('template');?>/images/on.gif"  border="0" alt="客服"/></div>
        <div >
            <div class="kf_list" id="off" onmouseout="kf_off();" onmousemove="kf_on();">
                <div class="t"></div>
				
                <div class="con">
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
					<?php if($v['market_type']=='3'){?>	
						 <li>
						<span class="lf">
                          <a href="msnim:add?contact=<?php echo $v['market_num'];?>" title="<?php echo $v['market_num'];?>"><img src="<?php cmspath('template');?>/images/msn.gif" border="0"></a>
						   </span>
						   <span class="lf"><?php echo $v['market_name'];?></span>
                        </li><!--msn-->
					<?php }?>	
					<?php if($v['market_type']=='4'){?>
						 <li>
						<span class="lf">
                          <a href="skype:mengsajewel?call" onclick="return skypeCheck();"><img src=http://mystatus.skype.com/smallclassic/<?php echo $v['market_num'];?> style="border: none;" alt="Call me!" /></a> 
						   </span>
                        </li><!--skype-->
						<?php }?>
						<?php if($v['market_type']=='2'){?>
						 <li>
						<span class="lf">
                        <a target="_blank" title="<?php echo $v['market_num'];?>" href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo $v['market_num'];?>&s=2" ><img border="0" src="http://amos1.taobao.com/online.ww?v=2&uid=wet101&s=2" alt="点击这里给我发消息" /></a>
						   </span>
						   <span class="lf"><?php echo $v['market_name'];?></span>
                        </li><!--alww-->
						<?php }?>
						<?php if($v['market_type']=='5'){?>
						 <li>
						<span class="lf">
                      电话：
						   </span>
						   <span class="lf"><?php echo $v['market_num'];?></span>
                        </li><!--tel-->
						<?php }?>
						<?php if($v['market_type']=='6'){?>
						 <li>
						<span class="lf">
                       手机：
						   </span>
						   <span class="lf"><?php echo $v['market_num'];?></span>
                        </li><!--phone-->
						<?php }?>
						<?php 
}
}?>
                    </ul>
					
                </div>
				
                <div class="b"></div>
            </div>
        </div>
    </div>
	</div>
    </form>
</body>
</html>
<script type="text/javascript">
    var tips;
    var theTop = 100/*这是默认高度,越大越往下*/;
    var old = theTop;
	var $on_e= document.getElementById("on");
	var	$off_e=document.getElementById("off");
    function initFloatTips() {
        document.getElementById("off").style.display = "none";
        tips = document.getElementById("kf_contain");
        moveTips();
    };
    function moveTips() {
        var sped = 50;
        if (window.innerHeight) {
            pos = window.pageYOffset
        }
        else if (document.documentElement && document.documentElement.scrollTop) {
            pos = document.documentElement.scrollTop
        }
        else if (document.body) {
            pos = document.body.scrollTop;
        }
        pos = pos - tips.offsetTop + theTop;
        pos = tips.offsetTop + pos / 10;
        if (pos < theTop) pos = theTop;
        if (pos != old) {
            tips.style.top = pos + "px";
            sped = 10;
        }
        old = pos;
        setTimeout(moveTips, sped);
    }
    initFloatTips();
	function kf_on(){
		$on_e.style.display = "none";
		$off_e.style.display = "block";
	}
	function kf_off(){
		$on_e.style.display = "block";
		$off_e.style.display = "none";
	}
</script>