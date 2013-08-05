$(document).ready(function() {
	//非第一列表项隐藏
	$(".list-record").not(":first").hide();
	$(".list-tit .col-1 span").click(function() {
		$(this).siblings("span").removeClass("current").end().addClass("current");
		var index = $(".list-tit .col-1 span").index($(this));
		$(".list-record").eq(index).siblings(".list-record").hide().end().show();
	})
	//账号修改验证
})