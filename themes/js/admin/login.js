$(function(){
	$('.login_btn').click(function(){
		var username = $("input[name=username]").val();
		var password = $("input[name=password]").val();
		
		if(username.length == 0){
			_alert("请输入帐号");
			return;
		}
		
		if(password.length == 0){
			_alert("请输入密码");
			return;
		}
		
		var url  = "/index.php?c=admin&m=goLogin";
		var data = {username:username,password:password};
		var res  = _ajax(url, data);
		if(!res.status){
			_alert(res.info);
			return;
		}else{
			_alert(res.info);
			setTimeout(function(){window.location.href='/index.php?c=admin';},2000);
			return;
		}
	});
});