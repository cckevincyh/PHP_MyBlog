<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>123</title>
<link rel="stylesheet" href="/MyBlog/css/bootstrap.min.css">
<link rel="stylesheet" href="/MyBlog/css/bootstrap.css"><!-- 去掉模糊框的暗色背景-->
<link rel="stylesheet" href="/MyBlog/css/bootstrap-theme.min.css">
<script src="/MyBlog/js/bootstrap.min.js"></script>
<script src="/MyBlog/jQuery/jquery-3.1.1.min.js"></script>
<script src="/MyBlog/js/bootstrap-dropdown.min.js"></script>

<script src="/MyBlog/js/jquery.min.js"></script>
<script src="/MyBlog/js/bootstrap.min.js"></script>
<link href="/MyBlog/css/blog_content.css" rel="stylesheet">
<link href="/MyBlog/css/common.css" rel="stylesheet">
</head>


<?php
    for ($i = 0; $i<3; $i++) {

        ?>
        <div class="blog-div">
            <div class="blog-img-box fl">
                <a href="/Myblog/index.php?p=back&a=blog_detail" target="_blank">
                    <img class="blog-list-img" src="/Myblog/index.php?p=back&a=blog_detail" width="215" height="144" alt="个人博客">
                </a>
            </div>
            <div class="blog-content">
                <h3 class="title-h3">
                    <a href="/Myblog/index.php?p=back&a=blog_detail" target="_blank">
                        个人博客
                    </a>
                </h3>

                <p class="blog-info">
                    前言: 今天,终于能如愿以偿的把博客进行更新改版啦!之前一直有想法把博客进行重新构建,由于种种原因,就一直拖延着。 或许这也跟自己的懒惰,有一定程度的关系吧!
                    好啦,废话不多说,说说今天的正题吧!以及为什么要重新对博客进行优化构建呢? 原因如下: 1、代码...
                </p>

                <div class="author-info">
                    <div class="author">
                        <a href="/about/">
                            <span>作者：xx</span>
                        </a>
                    </div>
                    <div class="date-time">
                        <em>
                            2016-08-22 20:48:51
                        </em>
                    </div>
                    <div class="blog-type">
                        分类：<a href="#">个人博客</a>
                    </div>

                    <div class="blog-edit">
                       <a href="#">编辑</a>
                    </div>

                    <div class="blog-delete">
                        <a href="#">删除</a>
                    </div>
                </div>
            </div>

        </div>

<?php
    }
?>
<div class="pull-right"><!--右对齐--->
    <ul class="pagination">
        <li class="disabled"><a href="#">第1页/共2页</a></li>
        <li><a href="#">首页</a></li>
        <li><a href="#">&laquo;</a></li><!-- 上一页 -->

        <li class="active"><a>${i }</a><li>




        <li><a href="${pageContext.request.contextPath}/admin/articleManageAction_${pb.url }pageCode=${pb.pageCode+1}">&raquo;</a></li>

        <li><a href="${pageContext.request.contextPath}/admin/articleManageAction_${pb.url }pageCode=${pb.totaPage}">尾页</a></li>
    </ul>
</div>


<body>
</body>
</html>
