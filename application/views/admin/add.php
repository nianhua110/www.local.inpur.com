<script type="text/javascript" src="/themes/other/kindeditor/kindeditor.js"></script>
<script type="text/javascript" src="/themes/other/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#ueditor');
        });
</script> 
<div class="table">
    <ul>
        <li>文章标题：<input type="text" value="" name="title" class="iptext2 ipc" />&nbsp;&nbsp;<span class="red">*</span></li>
        <li>文章作者：<input type="text" value="<?php echo $author;?>" name="author" class="iptext2" />&nbsp;&nbsp;<span class="red">*</span></li>
        <li>文章链接：<input type="text" value="" name="links" class="iptext2 ipc" /></li>
        <li>文章分类：<select name="category" class="opt">
                <?php foreach($category as $list):?>
                    <option value="<?php echo $list['cid'];?>"><?php echo $list['cname'];?></option>
                <?php endforeach;?>
            </select>&nbsp;&nbsp;<span class="red">*</span>
        </li>
        <li style="height:450px;">文章内容：<textarea name="content" id="ueditor" style="width:680px; height:400px;"></textarea></li>
        <li><a href="javascript:void(0)" class="a_btn news_add">添加</a>&nbsp;&nbsp;&nbsp;&nbsp;<span class="red alter"></span></li>
    </ul>
</div>
<script type="text/javascript">
    $(".news_add").click(function(){
       var title = $('input[name=title]').val();
       var author = $('input[name=author]').val();
       var links = $('input[name=links]').val();
       var cid = $('select[name=category]').val();
       var content = editor.html();
       
       if(title.length == 0 || title == '') {
           $('input[name=title]').focus();
           _alert('请输入标题');
           return false;
       }
       
       if(author.length == 0 || author == '') {
           $('input[name=author]').focus();
           _alert('请输入作者');
           return false;
       }
       
       var url = '/index.php?c=admin&m=addcontent';
       var data = {title:title,author:author,links:links,cid:cid,content:content};
       var res = _ajax(url,data);
       if(!res.status){
            _alert(res.info);
            return false;
       }else{
            _alert(res.info);
            $('.ipc').val("");
            setTimeout(function(){window.location.reload();},1500);
            return true;
       }       
    });
</script>