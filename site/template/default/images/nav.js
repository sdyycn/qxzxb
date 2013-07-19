$(document).ready(function(){
	$('.nav_right').find('li').hover(function(){
		$(this).find('p').slideDown('fast');
	},function(){
		$(this).find('p').slideUp('fast');
	});	
});