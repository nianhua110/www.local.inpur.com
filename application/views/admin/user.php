<div class="table">
	<h1>用户列表</h1>
    <table cellpadding="0" cellspacing="0" border="0" width="800">
    	<thead>
            <tr>
                <th width="20%">ID</td>
                <th width="25%">用户名</td>
                <th width="25%">创建时间</td>
                <th width="30%">操作</td>
            </tr>
        </thead>
        <tbody>
			<?php foreach($user as $list):?>
            <tr>
                <td><?php echo $list['id'];?></td>
                <td><?php echo $list['username'];?></td>
                <td><?php echo date("Y-m-d H:i:s",$list['created']);?></td>
                <td><a href="javascript:void(0)" class="a_btn user_edit edit_btn">编辑</a><?php if(count($user)>1): ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="a_btn user_del" id = "<?php echo $list['id'];?>">删除</a><?php endif;?></td>
            </tr>
            <?php endforeach;?>       
        </tbody>
    </table>
    <div class="h50"></div>
    <h1>添加用户</h1>
    <ul>
    	<li><span>用&nbsp;&nbsp;户&nbsp;&nbsp;名：</span><input type="text" name="username" class="iptext" value="" /></li>
        <li><span>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input type="password" name="password" class="iptext" value="" /></li>
        <li><span>确认密码：</span><input type="password" name="confirm_password" class="iptext" value="" /></li>
        <li><a href="javascript:void(0)" class="a_btn user_add">添加</a><span class="red alter"></span></li>
    </ul>
</div>
<script type="text/javascript">
    //添加新用户
    $(".user_add").click(function(){
        var username = $("input[name=username]").val();
        var password = $("input[name=password]").val();
        var confirm_password = $("input[name=confirm_password]").val();
        
        if(username.length == 0 || password.length == 0){
            _alert("用户名或密码不能为空");
        }
        
        if(password != confirm_password){
            _alert("密码不一致");
            return;
        }
        
        var url = "/index.php?c=admin&m=adduser";
        var data = {username:username,password:password};
        var res = _ajax(url,data);
        $("input[name=username]").val("");
        $("input[name=password]").val("");
        $("input[name=confirm_password]").val("");
        if(!res.status){
            _alert(res.info);
            return;
        }else{
            _alert(res.info);
            setTimeout(function(){window.location.reload();},1500);
            return;
        }
    });
    
    //删除用户
    $(".user_del").click(function(){
        var a = confirm("确认删除？");
        if(a){
            var id = $(this).attr("id");
            var url = "/index.php?c=admin&m=deluser";
            var data = {id:id};
            var res = _ajax(url,data);
            alert(res.info);
            window.location.reload();
            return;
        }
        return;
    });
    
    //编辑用户
    $('.user_edit').click(function(){
        var uid = $(this).parents('td').siblings('td:eq(0)').text();
        var username = $(this).parents('td').siblings('td:eq(1)').text();
        var html = '';
        html += '<ul>';
        html += '<li><span>用户ID：</span>'+uid+'</li>';
        html += '<li><span>用户名：</span>'+username+'</li>';
        html += '<li><span>新&nbsp;&nbsp;&nbsp;&nbsp;密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input type="password" name="update_password" value="" class="iptext" /></li>';
        html += '<li><span>确认新密码：</span><input type="password" name="update_password_confirm" value="" class="iptext" /></li>';
        html += '<li><a href="javascript:void(0)" class="a_btn user_update" uid="'+uid+'">更新</a>&nbsp;&nbsp;<a href="javascript:void(0)" class="a_btn user_cancel">取消</a>&nbsp;&nbsp;&nbsp;&nbsp;<span class="red alert_edit"></span></li>';
        html += '</ul>';
        _bgshow();
        $('.edit').html(html);
    });
    
    //取消编辑
    $('.user_cancel').live('click',function(){
        _bghide();
        $('.edit').html("").hide(); 
    });
    
    //更新用户
    $('.user_update').live('click',function(){
        var uid = $(this).attr('uid');
        var update_password = $('input[name=update_password]').val();
        var update_password_confirm = $('input[name=update_password_confirm]').val();
        
        if(update_password.length == 0 || update_password == null || update_password == '') {
            _alert_edit('请输入新密码!');
            $('input[name=update_password]').focus();
            return false;
        }
        
        if(update_password != update_password_confirm) {
            _alert_edit('密码不一致');
            $('input[name=update_password_confirm]').val('').focus();
            return false;
        }
        
        var url = '/index.php?c=admin&m=updateuser';
        var data = {id:uid,password:update_password,password_confirm:update_password_confirm};
        var res = _ajax(url,data);
        if(!res.status){
            _alert_edit(res.info);
            return false;
        }else{
            _alert_edit(res.info);
            setTimeout(function(){window.location.reload();},1000);
            return true;
        }
    });
</script>