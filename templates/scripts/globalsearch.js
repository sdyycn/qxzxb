$(document).ready(function() {
	//下拉列表框隐藏与显示
	$(".global-search-input  .select").click(function() {
		$(".downselect").slideToggle();
	})
	//鼠标移动改变颜色
	$(".downselect li").mouseover(function() {
		$(this).addClass("hoverbg");
	})
	//鼠标移出改变颜色
	$(".downselect li").mouseout(function() {
		$(this).removeClass("hoverbg");
	})
	//
	$(".downselect li").click(function() {
		var strtype = $(this).html();
		$(".downselect").hide();
		$(".global-search-input .select").html(strtype);
	})
})