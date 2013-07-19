<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="转向泵,助力泵,转向助力泵">
<meta name="keywords" content="转向泵,助力泵,转向助力泵">
<title>转向助力泵YBZ1319-080_产品展示_</title>
<link href="/template/default/images/style.css" rel="stylesheet" type="text/css">
<link href="/template/default/images/MagicZoom.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/template/default/images/mz-packed.js"></script>
<script type="text/javascript" src="/template/default/images/jquery.js"></script>
<script type="text/javascript" src="/template/default/images/nav.js"></script>
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
<div class="head_login" id="user_login">
	<form name="form1" action="/member.php" method="post">
		<label>用户名:</label>
		<input type="text" id="ajax_user" name="user" style="width:100px" />
		<label>登陆密码:</label>
		<input type="password" id="ajax_password" name="password" style="width:100px" />
		<label>验证码:</label>
		<input type="text" name="code" id="ajax_code" style="width:50px" />
		<img src="/plus/code.php" name="code" border="0" id="code" style="display:block; float:left;cursor:pointer; margin-left:5px; display:inline"/>
		<input type="hidden" id="ajax_lang" value="cn" name="lang" />
		<input type="button" style="border:0; margin-left:5px; display:inline; padding:0" src="/template/default/images/login_input2.gif" name="go" id="ajax_login" />
		<label>
			<a href="/member.php?action=regist&lang=cn">注册会员</a>
		</label>
	</form>
	
	<div class="head_right">
		<a href="#" onclick="javascript:window.external.AddFavorite('http://www.qxzxb.com','')" title="收藏本站到你的收藏夹">加入收藏</a>
				<a href="/index.php?lang=cn" class="focus" >简体中文</a>
				<a href="/index.php?lang=en"  >English</a>
			</div>
	<div class="clear"></div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#code').click(function(){
	$(this).attr('src','/plus/code.php?tag='+new Date().getTime());
	});
	$.ajax({
			type:"POST",
			url:"/member.php",
			data:"action=is_ajax_login&lang="+"cn",
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
			url:"/member.php",
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

<div class="head">
	<div class="head_left">
		<div class="logo"><a href="/index.php?lang=cn"><img src="/template/default/images/logo.jpg" border="0" /></a></div>
	</div>
	<div class="clear"></div>
</div>

<div class="head_nav"><!--head-->
	<div class="nav_left">
	<div class="nav_right">
	<ul>
		<li>
		<div id ='nav_time'>
		</div>
		<script type="text/javascript">
			nav_timer();
			setInterval("nav_timer()", 1000);
			function nav_timer(){
				document.getElementById("nav_time").innerHTML=new Date().toLocaleString()+'&nbsp;&nbsp;'
			}
		</script>
		</li>
		<li><a href="/index.php?lang=cn">首页</a></li>
		 
		<li class="">
			<a href="/show_list.php?id=11" >企业介绍</a>
					</li>
		 
		<li class="focus">
			<a href="/show_list.php?id=5" >产品展示</a>
					</li>
		 
		<li class="">
			<a href="/show_list.php?id=6" >新闻中心</a>
					</li>
		 
		<li class="">
			<a href="/show_list.php?id=7" >联系我们</a>
					</li>
		 
		<li class="">
			<a href="/book.php?lang=cn" >留言本</a>
					</li>
			</ul>
	</div>
	</div>
</div><!--head -->

<div class="div_margin"></div>

<div class="flash">
<script language='javascript'>
linkarr = new Array();
picarr = new Array();
textarr = new Array();
var swf_width=950;
var swf_height=200;
var text_height=0;
var files = "";
var links = "";
var texts = "";
//这里设置调用标记
linkarr[1] = "http://www.qxzxb.com";
picarr[1]  = "/upload/img/20110529/20110529223910.jpg";
linkarr[2] = "http://www.qxzxb.com";
picarr[2]  = "/upload/img/20110529/20110529223952.JPG";
linkarr[3] = "http://www.qxzxb.com";
picarr[3]  = "/upload/img/20110529/20110529224020.JPG";
linkarr[4] = "http://www.qxzxb.com";
picarr[4]  = "/upload/img/20110529/20110529224047.JPG";
for(i=1;i<picarr.length;i++){
  if(files=="") files = picarr[i];
  else files += "|"+picarr[i];
}
for(i=1;i<linkarr.length;i++){
  if(links=="") links = linkarr[i];
  else links += "|"+linkarr[i];
}
for(i=1;i<textarr.length;i++){
  if(texts=="") texts = textarr[i];
  else texts += "|"+textarr[i];
}
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
document.write('<param name="movie" value="/data/flash_ad/ad_3/bcastr.swf"><param name="quality" value="high">');
document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
document.write('<param name="FlashVars" value="pics='+files+'&links='+links+'&texts='+texts+'&borderwidth='+swf_width+'&borderheight='+swf_height+'&textheight='+text_height+'">');
document.write('<embed src="/data/flash_ad/ad_3/bcastr.swf" wmode="opaque" FlashVars="pics='+files+'&links='+links+'&texts='+texts+'&borderwidth='+swf_width+'&borderheight='+swf_height+'&textheight='+text_height+'" menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>'); 
</script></div><div class="div_margin"></div>
<div class="contain">
	<div class="contain_left">
		<div class="box left_width">
		<div class="box_left"></div>
		<div class="box_right"></div>
			<div class="box_title"><h2>产品导航</h2></div>
			<div class="box_in">
				<ul class="nav_list">
								</ul>
			</div>
		</div><!--容器结束-->
		<div class="div_margin"></div>
			<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2>联系方式</h2></div>
			<div class="box_in">
				<div class="contact">
								</div>
			</div>
		</div><!--容器结束-->
		<div class="div_margin"></div>
			<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2>热门内容</h2></div>
			<div class="box_in">
				<div class="list_news">
					<ul>
						   				</ul>  
				</div>
			</div>
		</div><!--容器结束-->
		<div class="div_margin"></div>
			<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2>推荐产品</h2></div>
			<div class="box_in">
				<div class="list_product">
					<ul>
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
			<div class="box_title"><h2 class="position"><span>当前位置:<a href="/index.php?lang=cn">首页</a> > <a href="/show_list.php?id=5">产品展示</a> > <font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1319-080</font></span></h2></div>
			<div class="box_in">
				<p class="title"><font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1319-080</font></p>
  <p class="info"><span>点击次数:<script language="javascript" src="/includes/hits.php?id=54"></script></span><span>更新时间:2011-07-24 14:07:18</span><span><a href="javascript:window.print()">【打印】</a></span><span><a href="javascript:self.close()">【关闭】</a></span></p>
 
  <div class="show_product">
  <div class="show_left">
   <div class="img">
    	   <a href="/upload/img/20110724/201107241442450.JPG" class="MagicZoom MagicThumb" id="zoom">
    <img src="/upload/img/20110724/201107241442450.JPG"  width="400" height="300" title="pic"/>
   </a>
      	      </div>
   <div class="img_go">
    <span onmouseover="moveLeft()" onmousedown="clickLeft()" onmouseup="moveLeft()" onmouseout="scrollStop()"></span>
      <div class="gallery">
        <div id="demo">
          <div id="demo1" style="float:left">
            <ul>
            <li><a rel="zoom" href="/upload/img/20110724/201107241442450.JPG" rev="/upload/img/20110724/201107241442450.JPG"><img src="/upload/img/20110724/201107241442450.JPG" alt="" class="B_blue" /></a></li><li><a rel="zoom" href="/upload/no_pc.gif" rev="/upload/no_pc.gif"><img src="/upload/no_pc.gif" alt="" class="B_blue" /></a></li>            </ul>
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
    <li><span>产品规格:</span><p>产品型号: &nbsp;&nbsp;&nbsp; YBZ1319-080<br />
原图号&nbsp;&nbsp;&nbsp; :<br />
适用车型: &nbsp;&nbsp;&nbsp; 青岛王-2<br />
公称排量: &nbsp;&nbsp;&nbsp; 15.77 ml/r<br />
最大压力: &nbsp;&nbsp;&nbsp; 13.0 Mpa<br />
最高流量: &nbsp;&nbsp;&nbsp; 3600 r/min<br />
控制流量: &nbsp;&nbsp;&nbsp; 16.0 L/min<br />
进油孔&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; M20x1.5<br />
出油孔&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; M18x1.5<br />
旋向&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; 逆转<br />
&nbsp;</p></li>
	<li><span>产品价格:</span>电询</li>
	<li><span>产品型号:</span>YBZ1319-080</li>
   </ul>
  </div><!--详细-->
  <div class="clear"></div>
  </div><!--产品展示-->
  
  <div class="arc_body">
  
   <div class="q_body">
		<ul>
		 <li class="focus"><span>详细内容</span></li>
		 <li><span>批发说明</span></li>
		 <li><span>运费说明</span></li>
		 <li><span>交易方式</span></li>
		 <li><span>联系方式</span></li>
		 <li><span>反馈信息</span></li>
		</ul>
	</div>
  <div class="show_q_body">	
	<div id="body">
<p>产品型号: &nbsp;&nbsp;&nbsp; YBZ1319-080<br />
原图号&nbsp;&nbsp;&nbsp; :<br />
适用车型: &nbsp;&nbsp;&nbsp; 青岛王-2<br />
公称排量: &nbsp;&nbsp;&nbsp; 15.77 ml/r<br />
最大压力: &nbsp;&nbsp;&nbsp; 13.0 Mpa<br />
最高流量: &nbsp;&nbsp;&nbsp; 3600 r/min<br />
控制流量: &nbsp;&nbsp;&nbsp; 16.0 L/min<br />
进油孔&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; M20x1.5<br />
出油孔&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; M18x1.5<br />
旋向&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; 逆转<br />
&nbsp;</p>   <div class="list_page" style="float:none;margin-left:300px;">
   <ul>
      </ul>
   
   <div class="clear"></div>
  </div>
  </div>
  <div id="body" style="display:none">
  	我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发  </div>
  <div id="body" style="display:none">
  	  </div>
  <div id="body" style="display:none">
  	  </div>
  <div id="body" style="display:none">
  	<br>联系人：韩先生
<br>电话：86-0575-85182445
<br>传真：86-0575-85574156
<br>地址：绍兴县齐贤工业园
<br>邮编：312066
<br>公司网站：http://www.qxzxb.com<br />
                <div class="con">
                    <h2 class="title">在线联系</h2>
                    <ul>
										                        <li>
						<span class="lf">
                           <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=0575-85182445&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:0575-85182445:4" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						   </span>
						   <span class="lf">0575-85182445</span>
                        </li>
																	                    </ul>
					
                </div>
				
  </div>
  <div id="body" style="display:none">
  	  </div>
  </div>
  
  </div>
  
 <div class="arc_link" style="clear:both"><span>上一条:<a href="/show_content.php?id=55" title="转向助力泵YBZ1319-16T-010">转向助力泵YBZ1319-16T-010</a></span><span>下一条:<a href="/show_content.php?id=53" title="转向助力泵YBZ1318-STR-014"><font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1318-STR-014</font></a></span></div>
 </div><!--右边-->
 <div class="clear"></div>
				
			</div>
		</div><!--容器结束-->
	</div>
	<div class="clear"></div>
</div>

<div class="contain foot">
 <div class="foot_nav">
    <a href="/show_list.php?id=11" title="企业介绍">企业介绍</a>|    <a href="/show_list.php?id=5" title="产品展示">产品展示</a>|    <a href="/show_list.php?id=6" title="新闻中心">新闻中心</a>|    <a href="/show_list.php?id=7" title="联系我们">联系我们</a>|    <a href="/show_list.php?id=9" title="下载中心">下载中心</a>|    <a href="/sitemap.php?lang=cn" title="网站地图">网站地图</a>|    <a href="/book.php?lang=cn" title="留言本">留言本</a>   </div>
 <p>copyright by 绍兴县申达液压机械厂</p>
<!-- <p>备案号：</p> -->
<!-- <p>powerd by <a href="http://www.beescms.com" target="_blank">BEESCMS</a></p>-->
</div><!--页脚-->
    <style type="text/css">
        /*浮动QQ在线客服*/
        .kf_contain{z-index:99; width:142px; right:0; top:100px; position:absolute}
        .kf_contain .kf_list{ width:142px; margin:0 auto; background:#3e3e48}
        .kf_contain .kf_list .t{background:url(/template/default/images/kf_top.gif) no-repeat left 0; height:66px; font-size:1px}
        .kf_contain .kf_list .b{background:#3e3e48;height:2px}
        .kf_contain .kf_list .con{margin:0 auto; background:#fff; margin:0 3px 3px 3px; width:136px; overflow:hidden; text-align:center}
        .kf_contain .kf_list .con .title{font-size:12px; margin-bottom:5px; margin-left:5px; text-align:left; height:20px; padding-left:20px; background:url(/template/default/images/kf_icon.gif) no-repeat left center; line-height:20px; color:#000000}
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
		<div class="on_kf" id="on" onmouseover="kf_on();"><img src="/template/default/images/on.gif"  border="0" alt="客服"/></div>
        <div >
            <div class="kf_list" id="off" onmouseout="kf_off();" onmousemove="kf_on();">
                <div class="t"></div>
				
                <div class="con">
                    <ul>
										                        <li>
						<span class="lf">
                           <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=0575-85182445&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:0575-85182445:4" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						   </span>
						   <span class="lf">0575-85182445</span>
                        </li>
											
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
</body>
</html>