<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="齿轮泵,叶片泵,汽车转向助力泵,汽车转向泵,绍兴县申达液压机械厂是一家专业生产汽车转向泵,转向泵配件企业，企业现生产上百种规格汽车转向泵，产品被国内各大中型汽车公司所广泛采用。企业秉承“顾客至上，锐意进取”的经营理念，坚持“客户第一”的原则为广大客户提供优质的服务。欢迎来电来函咨询洽谈!" />
		<meta name="keywords" content="齿轮泵,叶片泵,汽车转向助力泵,汽车转向泵,汽车液压转向泵,汽车液压转向助力泵,汽车助力泵,方向助力泵,申达助力泵,转向助力泵,助力器,助力泵,转向系统,汽摩及配件" />
		<title>汽车转向泵,齿轮泵,叶片泵-绍兴县申达液压机械厂,Shenda Hydraulic Machinery Factory, Power Steering Pump</title>
		<link href="/template/default/images/style.css" rel="stylesheet"
			type="text/css" />
		<script type="text/javascript" src="/template/default/images/jquery.js"></script>
		<script type="text/javascript"
			src="/template/default/images/jCarouselLite.js"></script>
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
		 
		<li class="">
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
</script></div>	<div class="div_margin"></div>
	<div class="contain c_margin">
		<div class="contain_left">
			<div class="box left_width">
				<div class="box_left"></div>
				<div class="box_right"></div>
				<div class="box_title"><h2>联系方式</h2></div>
				<div class="box_in">
					<div class="contact" style="height: 190px;"><p>联 系 人：&nbsp; 韩先生</p>
<p>联系电话：&nbsp; 86-0575-85182445&nbsp;</p>
<p>传&nbsp;&nbsp;&nbsp; 真：&nbsp; 86-0575-85574156</p>
<p>邮&nbsp;&nbsp;&nbsp; 编：&nbsp; 312066&nbsp;</p>
<p>EMail&nbsp; &nbsp;：&nbsp; <a href="mailto:sdyycn@163.com">sdyycn@163.com</a></p>
<p>地&nbsp;&nbsp;&nbsp; 址：&nbsp;&nbsp;浙江省绍兴市灵芝镇原汽车仪表厂内&nbsp;</p></div>
				</div>
			</div> <!-- box left_width end -->
		</div> <!-- contain_left end -->
		
		<div class="contain_right">
			<div class="contain_right_top">
				<div class="jianjie">
					<div class="box">
						<div class="box_left"></div>
						<div class="box_right"></div>
						<div class="box_title"><h2>公司简介</h2></div>
						<div class="box_in">
							<div class="j_content"><p>&nbsp;<strong><font color="#ff0000">&nbsp;&nbsp;&nbsp;</font></strong><span style="font-size: medium"><strong><font color="#ff0000"> 绍兴县申达液压机械厂</font></strong>是一家专业生产汽车转向泵,转向泵配件企业，企业现生产一百多种各种规格汽车转向泵，产品被国内各大中型汽车公司所广泛采用。</span></p>
<p><span style="font-size: medium">&nbsp;&nbsp;&nbsp; 企业秉承&ldquo;顾客至上，锐意进取&rdquo;的经营理念，坚持&ldquo;客户第一&rdquo;的原则为广大客户提供优质的服务。欢迎来电来函咨询洽谈!</span></p></div>
						</div>
					</div> <!-- box end -->
				</div> <!-- jianjie end -->
				<div class="news">
					<div class="box">
						<div class="box_left"></div>
						<div class="box_right"></div>
						<div class="box_title">
							<h2>新闻中心</h2>
						</div>
						<div class="box_in">
							<div class="news_list">
																<ul>
																		<li>
										<a title="热烈祝贺企业网站正式启用!" href="/show_content.php?id=4">
											热烈祝贺企业网站正式启用!										</a>
										2011-06-01									</li>
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
				<div class="box_title"><h2>产品展示</h2></div>
				<div class="pr_box_in mouse">
					<div class="pic_contain">
						<ul class="pr_list">
														<li>
								<a href="/show_content.php?id=1">
									<img src="/upload/img/20110529/20110529230003_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=1"><font style="color:#fe0000;font-weight:bold;">转向助力泵CACB1318-6110-065</font></a></p>
								<p class="look"><a href="/show_content.php?id=1">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=53">
									<img src="/upload/img/20110724/20110724143647_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=53"><font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1318-STR-014</font></a></p>
								<p class="look"><a href="/show_content.php?id=53">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=11">
									<img src="/upload/img/20110531/20110531152043_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=11"><font style="color:#fe0000;font-weight:bold;">转向泵CLCB1318-6105-066</font></a></p>
								<p class="look"><a href="/show_content.php?id=11">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=58">
									<img src="/upload/img/20110724/20110724145310_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=58"><font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1319-6DF2-009</font></a></p>
								<p class="look"><a href="/show_content.php?id=58">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=51">
									<img src="/upload/img/20110724/20110724143045_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=51"><font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1316-6110-076</font></a></p>
								<p class="look"><a href="/show_content.php?id=51">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=50">
									<img src="/upload/img/20110724/20110724142922_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=50"><font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1316-6110-007</font></a></p>
								<p class="look"><a href="/show_content.php?id=50">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=5">
									<img src="/upload/img/20110530/20110530201221_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=5"><font style="color:#fe0000;font-weight:bold;">汽车转向泵CACB1419-6110-064</font></a></p>
								<p class="look"><a href="/show_content.php?id=5">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=55">
									<img src="/upload/img/20110724/20110724144344_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=55">转向助力泵YBZ1319-16T-010</a></p>
								<p class="look"><a href="/show_content.php?id=55">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=8">
									<img src="/upload/img/20110531/20110531191216_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=8"><font style="color:#fe0000;font-weight:bold;">转向助力泵CLCB1316-6108-067</font></a></p>
								<p class="look"><a href="/show_content.php?id=8">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=42">
									<img src="/upload/img/20110724/20110724141826_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=42"><font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1316-6108-022</font></a></p>
								<p class="look"><a href="/show_content.php?id=42">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=12">
									<img src="/upload/img/20110531/20110531153126_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=12"><font style="color:#fe0000;font-weight:bold;">转向泵CLCB1416-6105-68</font></a></p>
								<p class="look"><a href="/show_content.php?id=12">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=44">
									<img src="/upload/img/20110724/20110724142133_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=44">转向助力泵YBZ1316-6108-024</a></p>
								<p class="look"><a href="/show_content.php?id=44">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=13">
									<img src="/upload/img/20110531/20110531153232_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=13"><font style="color:#fe0000;font-weight:bold;">转向泵SYBZ1419-6110-017</font></a></p>
								<p class="look"><a href="/show_content.php?id=13">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=49">
									<img src="/upload/img/20110724/20110724142815_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=49"><font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1316-6110-005</font></a></p>
								<p class="look"><a href="/show_content.php?id=49">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=59">
									<img src="/upload/img/20110724/20110724145515_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=59">转向助力泵YBZ1319-6DF3-013</a></p>
								<p class="look"><a href="/show_content.php?id=59">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=43">
									<img src="/upload/img/20110724/20110724141957_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=43"><font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1316-6108-023</font></a></p>
								<p class="look"><a href="/show_content.php?id=43">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=56">
									<img src="/upload/img/20110724/20110724144912_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=56"><font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1319-16T-011</font></a></p>
								<p class="look"><a href="/show_content.php?id=56">详细查看></a></p>
							</li>
														<li>
								<a href="/show_content.php?id=48">
									<img src="/upload/img/20110724/20110724142706_thumb.jpeg" border="0" width="120" height="120" />
								</a>
								<p><a href="/show_content.php?id=48"><font style="color:rgb(254, 0, 0);font-weight:bold;">转向助力泵YBZ1316-6110-003</font></a></p>
								<p class="look"><a href="/show_content.php?id=48">详细查看></a></p>
							</li>
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
				<div class="box_title"><h2>友情链接</h2></div>
				<div class="box_in">
					<ul>
												<li><a href="HTTP://WWW.QXZXB.COM">申达液压</a></li>
											</ul>
					<div class="clear"></div>
				</div> <!-- box_in end -->
			</div> <!-- box end -->
		</div>
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