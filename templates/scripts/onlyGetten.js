/*
项目名称：EtherJobs
作者：宋佳杰
时间：2013-07-19
*/
//此函数用于取消冒泡状态
function stopBubble(e){
  //一般用在鼠标或键盘事件上
  if(e && e.stopPropagation){
  //W3C取消冒泡事件
  e.stopPropagation();
  }else{
  //IE取消冒泡事件
  window.event.cancelBubble = true;
  }
  
  return true;
};