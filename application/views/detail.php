<div class="detail">
	<div class="detail_name"><?php echo $detail['title'];?></div>
    <div class="detail_info">
    	<span class="detail_time">创建时间：<?php echo date("Y-m-d H:i:s",$detail['datetime']);?></span>
    	<span class="detail_author">创建者：<?php echo $detail['author'];?></span>
    </div>
    <div class="detail_content"><?php echo $detail['content'];?></div>
</div>