<div class="table">
    <h1>文章列表</h1>
    <table cellpadding="0" cellspacing="0" border="0" width="900">
        <thead>
            <tr>
                <th width="8%">文章ID</th>
                <th width="10%">文章分类</th>
                <th width="55%">文章标题</th>
                <th width="10%">文章源链接</th>
                <th width="17%">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($news)): ?>
            <?php foreach($news as $list):?>
                <tr>
                    <td><?php echo $list['id'];?></td>
                    <td><a href="/index.php?c=admin&m=lists&cid=<?php echo $list['cid'];?>"><?php echo $list['cname'];?></a></td>
                    <td><a href="/index.php?c=detail&id=<?php echo $list['id'];?>" target="_blank" ><?php echo $list['title'];?></a></td>
                    <td><?php if($list['links']):?><a href="<?php echo $list['links'];?>" target="_blank">查看</a><?php endif;?></td>
                    <td>
                        <a href="javascript:void(0)" class="a_btn news_edit edit_btn">编辑</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="javascript:void(0)" class="a_btn news_del">删除</a>
                    </td>
                </tr>
            <?php endforeach;?>
            <?php endif;?>
        </tbody>
    </table>
    <div class="page right">            
            <?php if($page['prev']):?>
                <a href="/index.php?c=admin&m=lists&page=<?php echo $page['prev'];if($page['cid']){echo '&cid='.$page['cid'];}?>">上一页</a>
            <?php endif;?>
            <?php if($page['next']):?>
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php?c=admin&m=lists&page=<?php echo $page['next'];if($page['cid']){echo '&cid='.$page['cid'];}?>">下一页</a>
            <?php endif;?>
            &nbsp;&nbsp;&nbsp;&nbsp;<span>第<?php echo $page['current'];?>页</span>&nbsp;/&nbsp;<span>共<?php echo $page['sum'];?>页</span>
    </div>
</div>
