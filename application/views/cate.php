<div class="cate">
    <div class="cate_left">
        <div class="cate_pin">专&nbsp;&nbsp;&nbsp;&nbsp;业</div>
        <div class="cate_pin">专&nbsp;&nbsp;&nbsp;&nbsp;注</div>
        <div class="cate_pin">专&nbsp;&nbsp;&nbsp;&nbsp;心</div>
    </div>
    <div class="cate_right">
        <h1><a href="/">首页</a>&nbsp;&nbsp;>>&nbsp;&nbsp;<?php echo $title;?></h1>
        <ul>
            <?php foreach($list as $lists):?>
            <li><a href="/index.php?c=detail&id=<?php echo $lists['id'];?>"><?php echo $lists['title'];?></a><span><?php echo date("Y-m-d",$lists['datetime']);?></span></li>
            <?php endforeach;?>
        </ul>
        <div class="page">
            <a href="#">首页</a>
            <a href="#">上一页</a>
            <a href="#">下一页</a>
            <a href="#">尾页</a>
            <span>第1页&nbsp;/&nbsp;共10页</span>
        </div>
    </div>
    <div class="clearfix"></div>
</div>