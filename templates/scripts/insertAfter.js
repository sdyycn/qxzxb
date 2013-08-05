/*
项目名称：EtherJobs
作者：宋佳杰
时间：2013-07-09
*/
//此函数用于将新元素插入目标元素之后
function insertAfter(newEllement, targetElement){
	var parent = targetElement.parentNode;
	if(parent.lastChild == targetElement){
		parent.apprendChild(newElement);
	}else{
		parent.insertBefore(newElement, targetElement, nextSibling);
	}
}