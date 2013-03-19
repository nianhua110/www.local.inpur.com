<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="/themes/css/base.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="/themes/css/layout.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="/themes/css/style.css" type="text/css" charset="utf-8" />
<script type="text/javascript" src="/themes/js/base/jquery-1.7.2.min.js"></script>
<title><?php echo $title;?> - 上海浪潮工贸有限公司</title>
</head>
<body>
<div class="wrapper">
	<div class="main">
    	<div class="header">
        	<div class="logo"><img src="/themes/images/logo.png" width="100" alt="" /></div>
            <div class="name"><img src="/themes/images/title.png" alt="" /></div>
            <div class="clearfix"></div>
        </div>
        <div class="nav">
        	<ul>
            	<li><a href="/">首页</a></li>
            	<?php foreach($category as $list): ?>
            	<li><a href="<?php echo ($list['links']) ? $list['links'] : '/index.php?c=cate&cid='.$list['cid'];?>"><?php echo $list['cname'];?></a></li>
                <?php endforeach;?>
                <div class="clearfix"></div>
            </ul>            
        </div>