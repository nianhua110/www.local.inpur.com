<div class="table">
	<h1>分类列表</h1>
    <table cellpadding="0" cellspacing="0" border="0" width="800">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="20%">分类名称</th>
                <th width="30%">分类链接</th>
                <th width="10%">排序</th>
                <th width="30%">操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach($category as $list):?>
            <tr>
            	<td><?php echo $list['cid'];?></td>
                <td><a href="/index.php?c=admin&m=lists&cid=<?php echo $list['cid'];?>"><?php echo $list['cname'];?></a></td>
                <td>/index.php?c=cate&cid=<?php echo $list['cid'];?></td>
                <td><?php echo $list['view_order'];?></td>
                <td>
                    <a href="javascript:void(0)" class="a_btn cate_edit edit_btn">编辑</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="javascript:void(0)" class="a_btn cate_del">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <div class="h50"></div>
    <h1>添加分类</h1>
    <ul>
    	<li><span>分类名称：</span><input type="text" name="cname" value="" class="iptext" />&nbsp&nbsp<span class="red">*</span></li>
        <li><span>分类排序：</span><input type="text" name="view_order" value="" class="iptext" />&nbsp&nbsp<span class="red">*</span></li>
        <li><span>分类链接：</span><input type="text" name="links" value="" class="iptext" />&nbsp;&nbsp;无则不需特殊指定</li>
        <li><a href="javascript:void(0)" class="a_btn cate_add">添加</a><span class="red alter"></span></li>
    </ul>
</div>

<script type="text/javascript">
	$(function(){
	    //添加新分类
		$('.cate_add').click(function(){
			var cname = $('input[name=cname]').val();
			var view_order = $('input[name=view_order]').val();
			var links = $('input[name=links]').val();
			
			if(cname == '' || cname.length == 0) {
				_alert('请输入分类名称');
				return;
			}
			
			if(view_order == '' || view_order.length == 0) {
				_alert('请输入分类排序');
				return;
			}
			
			var url = "/index.php?c=admin&m=addcategory";
			var data = {cname:cname,view_order:view_order,links:links};			
			var res = _ajax(url,data);
			if(!res.status){
				_alert(res.info);
				return;
			}else{
				_alert(res.info);
				setTimeout(function(){window.location.reload();},1500);
				return;
			}
		});
		
		//删除分类
		$(".cate_del").click(function(){
		    var a = confirm("确认删除？");
		    var cid = $(this).parents('td').siblings('td:eq(0)').text();
		    if(a) {
		        if(cid == '' || cid < 0 || cid.length == 0) {
		            alert('网络错误，请刷新后重新删除!');
                    return false;
                }
                var url = '/index.php?c=admin&m=delcate';
                var data = {cid:cid};
                var res = _ajax(url,data);
                alert(res.info);
                window.location.reload();
                return true;;
		    }
		    return false;
		});
		
		//编辑分类
		$(".cate_edit").click(function(){
		    var cid = $(this).parents('td').siblings('td:eq(0)').text();
		    var cname = $(this).parents('td').siblings('td:eq(1)').text();
		    var links = $(this).parents('td').siblings('td:eq(2)').text();
		    var view_order = $(this).parents('td').siblings('td:eq(3)').text();
		    var html = '';		    
		    html += '<ul>';
		    html += '<li><span>分类ID：</span>'+cid+'</li>';
		    html += '<li><span>分类名称：</span><input type="text" name="update_cname" value="'+cname+'" class="iptext" /></li>';
		    html += '<li><span>分类链接：</span><input type="text" name="update_links" value="'+links+'" class="iptext" /></li>';
		    html += '<li><span>分类排序：</span><input type="text" name="update_view_order" value="'+view_order+'" class="iptext" /></li>';
		    html += '<li><a href="javascript:void(0)" class="a_btn cate_update" cid="'+cid+'">更新</a>&nbsp;&nbsp;<a href="javascript:void(0)" class="a_btn cate_cancel">取消</a>&nbsp;&nbsp;&nbsp;&nbsp;<span class="red alert_edit"></span></li>';
		    html += '</ul>';		    
		    _bgshow();
		    $('.edit').html(html);
		});
		
		//取消编辑
		$(".cate_cancel").live('click',function(){
		   _bghide();
		   $('.edit').html("").hide(); 
		});
		
		//更新分类
		$('.cate_update').live('click',function(){
		    var cid = $(this).attr('cid');
		    var cname = $('input[name=update_cname]').val();
		    var links = $('input[name=update_links]').val();
		    var view_order = $('input[name=update_view_order]').val();
		    var url = '/index.php?c=admin&m=updatecate';
		    var data = {cid:cid,cname:cname,links:links,view_order:view_order};
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
	});
</script>