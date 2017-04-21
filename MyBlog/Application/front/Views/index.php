<!DOCTYPE html>
<html lang="zh-CN" class="ax-vertical-centered">
<head>
<meta charset="UTF-8">
<title>个人博客</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link href="css/blog_index.css" rel="stylesheet">
<link href="/MyBlog/css/common.css" rel="stylesheet">
<link href="/MyBlog/css/left_panel.css" rel="stylesheet">

</head>


<body>
   
<table class="table" align="center" style="height:auto">
	 <tr>
		 <td colspan="3" >
			<iframe class="blog_top" src="Application\front\Views\blog.php" frameborder="0" scrolling="no"></iframe>
		 </td>
 	</tr>
    <tr>
		<td width="20%">
            <div class="blog_left" >


                <div class="panel_Category">
                    <ul class="panel_head"><span>文章分类</span></ul>
                    <ul class="panel_body">
                        <li class="panel_li">
                            <a href="#" target="center">数据结构</a><span>(86)</span>
                        </li>
                        <li class="panel_li">
                            <a href="#" >算法入门</a><span>(36)</span>
                        </li>
                        <li class="panel_li">
                            <a href="#" >Struts2</a><span>(18)</span>
                        </li>
                        <li class="panel_li">
                            <a href="#" >Hibernate</a><span>(26)</span>
                        </li>
                        <li class="panel_li">
                            <a href="#" >Spring</a><span>(7)</span>
                        </li>
                        <li class="panel_li">
                            <a href="#" >SSH框架</a><span>(48)</span>
                        </li>

                    </ul>
                </div>


                <div class="panel_Search">
                    <ul class="panel_head"><span>文章搜索</span></ul>
                    <ul class="panel_body">
                        <span><input id="inputSearch" type="text" class="blogsearch" title="请输入关键字"></span>
                        <input class="btnSubmit"  type="button" value="搜索" title="search in blog">

                    </ul>
                </div>


                <div class="panel_Click_Ranking">
                    <ul class="panel_head"><span>阅读排行</span></ul>
                    <ul class="panel_body">
                        <?php
                            for($i = 0; $i<count($watchList);$i++){

                        ?>
                            <li class="panel_li">
                                <a href="#" ><?php echo $watchList[$i]['atitle']?></a><span>(<?php echo $watchList[$i]['page_view']?>)</span>
                            </li>
                        <?php
                           }
                        ?>

                    </ul>
                </div>


                <div class="panel_Comment_Ranking">
                    <ul class="panel_head"><span>点赞排行</span></ul>
                    <ul class="panel_body">
                        <?php
                        for($i = 0; $i<count($likeList);$i++){

                        ?>
                        <li class="panel_li">
                            <a href="#" ><?php echo $likeList[$i]['atitle']?></a><span>(<?php echo $likeList[$i]['like_num']?>)</span>
                        </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

            </div>


		 </td>
		 <td width="60%">
			<iframe class="blog_center" name="center"  src="/MyBlog/index.php?c=Article&a=getLimitBlogs" frameborder="0" scrolling="no" ></iframe>
		 </td>
		 <td width="20%">
			<iframe class="blog_right"  src="Application\front\Views\right_panel.php" frameborder="0" scrolling="no"></iframe>
		 </td>
 	</tr>
     
     </table>
</body>

</html>