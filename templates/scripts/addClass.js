/*
项目名称：EtherJobs
作者：宋佳杰
时间：2013-07-09
*/
//此函数用于给任意元素增加class，从而使之获得对应class在CSS中的布局效果
function addClass(element, value){
	if(!element.className){
		element.className = value;
	}else{
		newClassName = element.className;
		newClassName += " ";
		newClassName += value;
		element.className = newClassName;
	}
}