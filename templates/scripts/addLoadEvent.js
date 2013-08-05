/*
项目名称：EtherJobs
作者：宋佳杰
时间：2013-07-09
*/
//此函数用于将其他函数在页面被加载时触发
function addLoadEvent(func){
	var odonload = window.onload;
	if(typeof window.onload != "function"){
		window.onload = func; 
		}else{
			window.onload = function(){
				odonload();
				func();
			}
		}
}