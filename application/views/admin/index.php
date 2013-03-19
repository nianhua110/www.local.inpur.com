<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/themes/css/admin/index.css" type="text/css" charset="utf-8" />
<script type="text/javascript" src="/themes/js/base/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/themes/js/admin/admin.js"></script>
<title>后台管理 - 上海浪潮工贸有限公司</title>
</head>

<body id="index">
<h1>后台管理系统<a href="/" target="_blank" class="back"><img src="/themes/images/home.png" width="22" height="22" alt="" title="返回首页" /></a></h1>
<ul id="globalNav">
	<li><a href="/index.php?c=admin&m=info" target="frameBord">网站信息</a></li>
	<li><a href="/index.php?c=admin&m=site" target="frameBord">站点设置</a></li>
	<li>
    	<a href="javascript:void(0)" class="hasChild">内容管理</a>
        <ul class="childNav">
        	<li><a href="/index.php?c=admin&m=category" target="frameBord">分类管理</a></li>
        	<li><a href="/index.php?c=admin&m=lists" target="frameBord">文章管理</a></li>
        	<li><a href="/index.php?c=admin&m=addnews" target="frameBord">添加文章</a></li>
        </ul>
    </li>
	<li><a href="/index.php?c=admin&m=user" target="frameBord">用户管理</a></li>
    <li><a href="/index.php?c=admin&m=logout">退出</a></li>
</ul>
<iframe id="frameBord" name="frameBord" frameborder="0" width="100%" height="100%" src="/index.php?c=admin&m=info"></iframe>
</body>
</html>