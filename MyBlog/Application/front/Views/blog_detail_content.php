
<!DOCTYPE html>
<html lang="zh-CN" class="ax-vertical-centered">
<head>
	<meta charset="UTF-8">
	<title>个人博客</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/MyBlog/css/bootstrap.min.css">
<link rel="stylesheet" href="/MyBlog/css/bootstrap-theme.min.css">
<script src="/MyBlog/js/bootstrap.min.js"></script>
<script src="/MyBlog/jQuery/jquery-3.1.1.min.js"></script>
<script src="/MyBlog/js/bootstrap-dropdown.min.js"></script>

<script src="/MyBlog/js/jquery.min.js"></script>
<script src="/MyBlog/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/MyBlog/css/blog_detail.css">
<link rel="stylesheet" href="/MyBlog/css/common.css">
<script charset="utf-8" src="/MyBlog/js/kindeditor-4.1.10/kindeditor-min.js"></script>
<script charset="utf-8" src="/MyBlog/js/kindeditor-4.1.10/lang/zh_CN.js"></script>
<script charset="utf-8" src="/MyBlog/js/front_blog_detail.js"></script>
</head>
<script>

    getBlogDetail(<?php echo $id?>);
</script>

<body>
   
		<div class="page-header">
			<h1 id="title"></h1>
		</div>
		<div class="blog-info">
				<span class="link_postdate" title="发布时间" id="postdate"></span>
				<span class="link_view" title="阅读次数" id="page_view"></span>
				<span class="link_like" title="点赞次数" > <a href="#" id="like_num">点赞</a></span>
		</div>
		
		 <hr>
		<div class="category_div">
           <img src="/Myblog/img/category_icon.png">
            <span>分类：</span> <span id="type"></span>
        </div>
        <hr>
        
        
        <div class="article_content">
        	
        	<textarea id="blog_detail_content" ></textarea>
        </div>
        
      
</body>

</html>