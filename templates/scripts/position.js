//收藏夹相关操作
$(document).ready(function() {
$(".itemsort dt").click(function(){
 if($(this).attr("class")=="down"){
	$(this).next("dd").slideDown("normal");
	 $(this).removeClass("down");
	 }
 else{
	  $(this).next("dd").slideUp("normal");
	  $(this).addClass("down");
	 }

})
})               
