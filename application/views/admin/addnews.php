<script type="text/javascript" src="/themes/other/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    window.onload = function()
    {
        CKEDITOR.replace( 'ueditor' );
    };
</script> 
<div class="table">
    <ul>
        <form action="/index.php?c=admin&a=addcontent"  method="post" name="addlist" >
            <li>文章标题：<input type="text" value="" name="title" class="iptext2 ipc" />&nbsp;&nbsp;<span class="red">*</span></li>
            <li>文章作者：<input type="text" value="<?php echo $author;?>" name="author" class="iptext2" />&nbsp;&nbsp;<span class="red">*</span></li>
            <li>文章链接：<input type="text" value="" name="links" class="iptext2 ipc" /></li>
            <li>文章分类：<select name="category" class="opt">
                            <?php foreach($category as $list):?>
                                <option value="<?php echo $list['cid'];?>"><?php echo $list['cname'];?></option>
                            <?php endforeach;?>
                          </select>&nbsp;&nbsp;<span class="red">*</span>
            </li>
            <li style="height:360px;">文章内容：<textarea name="content" id="ueditor"></textarea></li>
            <li><a href="javascript:void(0)" class="a_btn news_add">添加</a>&nbsp;&nbsp;&nbsp;&nbsp;<span class="red alter"></span></li>
        </form>
    </ul>
</div>
<script type="text/javascript">
    $(".news_add").click(function(){
       var title = $('input[name=title]').val();
       var author = $('input[name=author]').val();
       var links = $('input[name=links]').val();
       var cid = $('select[name=category]').val();
       
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
       
       $("form[name=addlist]").submit();
    });
</script>