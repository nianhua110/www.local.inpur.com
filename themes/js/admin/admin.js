$(function(){
	//显示子菜单
	$(".hasChild").click(function(){
		$(this).siblings('.childNav').slideToggle(100);
	});
	
	//编辑框
	$('.edit_btn').click(function(){
	   var window_width = $(window).width();
	   var position_left = (window_width - 400) / 2;
	   $('.edit').css({left:position_left}).fadeIn(300);
	   return true;
	});
});