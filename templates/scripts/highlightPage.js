/*
项目名称：EtherJobs
作者：宋佳杰
时间：2013-07-09
*/
//此函数用于使导航栏被选中时高亮化
function highlightPage(){
	if(!document.getElementById) return false;
	if(!document.getElementsByTagName) return false;
	var headers = document.getElementsByTagName("header");
	if(headers.length == 0) return false;
	var navs = headers[0].getElementsByTagName("nav");
	if(navs.length == 0) return false;
	var links = navs[0].getElementsByTagName("a");
	var linkurl;
	for(var i=0; i<links.length; i++){
		linkurl = link[0].getAttribute("href");
		if(window.location.href.indexOf(linkurl) != -1){
			links[i].className = "here";
		}
	}
}