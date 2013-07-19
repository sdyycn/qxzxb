$(document).ready(function() {
	$(".list-sort dt").click(function() {
		var index = $(".list-sort dt").index($(this));
		$(".list-sort dt").eq(index).addClass("opened");
		$(".list-sort dd").eq(index).siblings(".list-sort dd").hide().end().show();
	})
})