<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="">
<meta name="keywords" content="">
<title>产品展示_汽车转向泵,齿轮泵,叶片泵-绍兴县申达液压机械厂,申达液压机械厂,Shenda Hydraulic Machinery Factory, Power Steering Pump</title>
<link href="/template/default/images/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/template/default/images/jquery.js"></script>
<script type="text/javascript" src="/template/default/images/nav.js"></script>
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
				<p>联 系 人：&nbsp; 韩先生</p>
<p>联系电话：&nbsp; 86-0575-85182445&nbsp;</p>
<p>传&nbsp;&nbsp;&nbsp; 真：&nbsp; 86-0575-85574156</p>
<p>邮&nbsp;&nbsp;&nbsp; 编：&nbsp; 312066&nbsp;</p>
<p>EMail&nbsp; &nbsp;：&nbsp; <a href="mailto:sdyycn@163.com">sdyycn@163.com</a></p>
<p>地&nbsp;&nbsp;&nbsp; 址：&nbsp;&nbsp;浙江省绍兴市灵芝镇原汽车仪表厂内&nbsp;</p>				</div>
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
				</div>
			</div>
		</div><!--容器结束-->
		
	</div><!--左边内容-->
	<div class="contain_right">
		
		<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2 class="position"><span>当前位置:<a href="/index.php?lang=cn">首页</a> > <a href="/show_list.php?id=5">产品展示</a> > 列表页</span></h2></div>
			<div class="box_in">
				<ul class="ul_list_pic">
     <li><a href="/show_content.php?id=39" ><img src="/upload/img/20110724/20110724141037_thumb.jpeg" width="120" height="120" border="0" alt="助力泵YBZ1316-6105-052" /><span class="time"><font style="color:rgb(254, 0, 0);font-weight:bold;">助力泵YBZ1316-6105-052</font></span></a></li>
      <li><a href="/show_content.php?id=38" ><img src="/upload/img/20110707/20110707205840_thumb.jpeg" width="120" height="120" border="0" alt="供应转向泵YBZ1316-6102-051" /><span class="time"><font style="color:rgb(254, 0, 0);font-weight:bold;">供应转向泵YBZ1316-6102-051</font></span></a></li>
      <li><a href="/show_content.php?id=37" ><img src="/upload/img/20110706/20110706214223_thumb.jpeg" width="120" height="120" border="0" alt="供应转向泵YBZ1316-6102-019" /><span class="time"><font style="color:#fe0000;font-weight:bold;">供应转向泵YBZ1316-6102-019</font></span></a></li>
      <li><a href="/show_content.php?id=36" ><img src="/upload/img/20110706/20110706214031_thumb.jpeg" width="120" height="120" border="0" alt="供应YBZ1316-4113-056" /><span class="time"><font style="color:#fe0000;font-weight:bold;">供应YBZ1316-4113-056</font></span></a></li>
      <li><a href="/show_content.php?id=35" ><img src="/upload/img/20110706/20110706213729_thumb.jpeg" width="120" height="120" border="0" alt="供应转向泵YBZ1316-4112-043" /><span class="time"><font style="color:#fe0000;font-weight:bold;">供应转向泵YBZ1316-4112-043</font></span></a></li>
      <li><a href="/show_content.php?id=34" ><img src="/upload/img/20110620/20110620204613_thumb.jpeg" width="120" height="120" border="0" alt="转向助力泵YBZ1316-4110-059" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向助力泵YBZ1316-4110-059</font></span></a></li>
      <li><a href="/show_content.php?id=33" ><img src="/upload/img/20110710/20110710161122_thumb.jpeg" width="120" height="120" border="0" alt="汽车转向泵YBZ1316-4108-057" /><span class="time"><font style="color:#fe0000;font-weight:bold;">汽车转向泵YBZ1316-4108-057</font></span></a></li>
      <li><a href="/show_content.php?id=30" ><img src="/upload/img/20110609/20110609194903_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ1316-4102-021" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ1316-4102-021</font></span></a></li>
      <li><a href="/show_content.php?id=26" ><img src="/upload/img/20110531/20110531191557_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ1316-4100-078" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ1316-4100-078</font></span></a></li>
      <li><a href="/show_content.php?id=25" ><img src="/upload/img/20110531/20110531162354_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ1316-077" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ1316-077</font></span></a></li>
      <li><a href="/show_content.php?id=24" ><img src="/upload/img/20110531/20110531162104_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ1316-6CT-081" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ1316-6CT-081</font></span></a></li>
      <li><a href="/show_content.php?id=23" ><img src="/upload/img/20110531/20110531160158_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ1316-6CT-044" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ1316-6CT-044</font></span></a></li>
      <li><a href="/show_content.php?id=22" ><img src="/upload/img/20110531/20110531160057_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ1316-4_6-050" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ1316-4_6-050</font></span></a></li>
      <li><a href="/show_content.php?id=21" ><img src="/upload/img/20110531/20110531155942_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ1310-6110-002" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ1310-6110-002</font></span></a></li>
      <li><a href="/show_content.php?id=20" ><img src="/upload/img/20110531/20110531154937_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ1113-4110-058" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ1113-4110-058</font></span></a></li>
      <li><a href="/show_content.php?id=19" ><img src="/upload/img/20110531/20110531154131_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ1016-049" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ1016-049</font></span></a></li>
      <li><a href="/show_content.php?id=18" ><img src="/upload/img/20110531/20110531191408_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ1010-048" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ1010-048</font></span></a></li>
      <li><a href="/show_content.php?id=17" ><img src="/upload/img/20110531/20110531153847_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ611-236E-042" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ611-236E-042</font></span></a></li>
      <li><a href="/show_content.php?id=16" ><img src="/upload/img/20110531/20110531153741_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ410-071" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ410-071</font></span></a></li>
      <li><a href="/show_content.php?id=15" ><img src="/upload/img/20110531/20110531153540_thumb.jpeg" width="120" height="120" border="0" alt="转向泵YBZ216Q-120_100-018" /><span class="time"><font style="color:#fe0000;font-weight:bold;">转向泵YBZ216Q-120_100-018</font></span></a></li>
     </ul>
  <div class="clear"></div>
  <div class="list_page">
   <ul>
   <li><a href="show_list.php?page=1&id=5">首页</a></li><li><a href="show_list.php?page=1&id=5">上一页</a></li><li class=""><a href="show_list.php?page=1&id=5">1</a></li><li class="focus"><a href="show_list.php?page=2&id=5">2</a></li><li class=""><a href="show_list.php?page=3&id=5">3</a></li><li><a href="show_list.php?page=3&id=5">下一页</a></li><li><a href="show_list.php?page=3&id=5">尾页</a></li><li>转到<select style="width:40px;" onchange="location.href=this.options[this.selectedIndex].value;"><option value="?page=1&id=5" >1</option><option value="?page=2&id=5" selected="selected">2</option><option value="?page=3&id=5" >3</option></select></li><li>共49条记录,当前第2/3</li>   </ul>
  
  </div> 
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