//ajax请求
function _ajax(url,data){
	if(url == "" || url == null){
		return false;
	}
	if(data == "" || data == null){
		return false;
	}
	$.ajax({
		type:"POST",
		dataType:"json",
		async: false, 
		url:url,
		data:data,
		success:function(msg){
			result = msg;
		}
	});
	return result;	
}

//提示信息
function _alert(a){
	$(".alter").text(a);
	setTimeout(function(){$(".alter").text("")},2000);
	return;
}

//编辑提示信息
function _alert_edit(a){
    $(".alert_edit").text(a);
    setTimeout(function(){$(".alert_edit").text("")},2000);
    return;
}

//显示背景
function _bgshow(){
    var window_width = $(window).width();
    var window_height = $(document).height();
    $('.admin_bg').css({width:window_width,height:window_height}).show();
}

//隐藏背景
function _bghide(){
    $('.admin_bg').hide();
}
