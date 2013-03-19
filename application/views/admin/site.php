<div class="site">
	<table cellpadding="0" cellspacing="0" border="0">
    	<tr>
        	<th>备案号：</th><td><input type="text" name="copyright" class="ipt_blank_min" value="<?php echo $copyright;?>" /></td>
        </tr>
        <tr>
            <th>地址：</th><td><input type="text" name="address" class="inputtext" value="<?php echo $address;?>" /></td>
        </tr>
        <tr>
            <th>邮编：</th><td><input type="text" name="zipcode" class="inputtext" value="<?php echo $zipcode;?>" /></td>
        </tr>
        <tr>
            <th>电话：</th><td><input type="text" name="tel" class="inputtext" value="<?php echo $tel;?>" /></td>
        </tr>
        <tr>
            <th>传真：</th><td><input type="text" name="fax" class="inputtext" value="<?php echo $fax;?>" /></td>
        </tr>
        <tr>
            <th>邮箱：</th><td><input type="text" name="email" class="inputtext" value="<?php echo $email;?>" /></td>
        </tr>
        <tr>
        	<th></th><td><a class="a_btn site_update">保存</a>&nbsp;&nbsp;&nbsp;&nbsp;<span class="red alter"></span></td>
        </tr>
    </table>
</div>

<script type="text/javascript">
    //更新站点设置
    $(".site_update").click(function(){
        var copyright = $("input[name=copyright]").val();
        var address = $("input[name=address]").val();
        var zipcode = $("input[name=zipcode]").val();
        var tel = $("input[name=tel]").val();
        var fax = $("input[name=fax]").val();
        var email = $("input[name=email]").val();
        var url = "/index.php?c=admin&m=updateSite";
        var data = {copyright:copyright,address:address,zipcode:zipcode,tel:tel,fax:fax,email:email};
        var res = _ajax(url,data);
        if(res.status) {
            _alert("更新成功");
            window.location.reload();
            return;
        }else{
            _alert("网络异常，更新失败");
            window.location.reload();
            return;
        }       
    });
</script>