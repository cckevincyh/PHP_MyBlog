<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>123</title>
<link rel="stylesheet" href="/MyBlog/css/bootstrap.min.css">
<link rel="stylesheet" href="/MyBlog/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/MyBlog/css/bootstrap-admin-theme.css">
<link rel="stylesheet" href="/MyBlog/css/bootstrap.css"><!-- 去掉模糊框的暗色背景-->
<script src="/MyBlog/js/bootstrap.min.js"></script>
<script src="/MyBlog/jQuery/jquery-3.1.1.min.js"></script>
<script src="/MyBlog/js/bootstrap-dropdown.min.js"></script>

<script src="/MyBlog/js/jquery.min.js"></script>
<script src="/MyBlog/js/bootstrap.min.js"></script>
<link href="/MyBlog/css/common.css" rel="stylesheet">
<script charset="utf-8" src="/MyBlog/js/add_blog_type.js"></script>
</head>
       <div class="col-md-10">
              <div class="row">
                    <div class="col-lg-10">
                        <div class="panel panel-danger bootstrap-admin-no-table-panel">
                            <div class="panel-heading">
                                <div class="text-muted bootstrap-admin-box-title">添加博文分类</div>
                            </div>
                            <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                                    <div class="col-lg-2 form-group">
                                        <button type="button" class="btn btn-danger" id="btn_add" data-toggle="modal" data-target="#addModal">添加</button>          
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
		        
   <div class="row">
                    <div class="col-lg-10">
                        <table id="data_list" class="table table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>博文分类名称</th>
                                
                                <th>操作</th>
                            </tr>
                            </thead>
                            <?php
                                if(count($result)>0){
                                   for($i = 0; $i<count($result)-1;$i++){

                            ?>
                             <tbody>
	                         	   <td><?php echo $result[$i]['tname']?></td>

	                                <td>
	                                	<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#updateModal">修改</button>
	                                	
	                                		<button type="button" class="btn btn-danger btn-xs">删除</button>
	                               	</td>                                              
                          	  </tbody>
                            <?php
                                   }
                                }else{

                                    ?>
                                        <tbody>
                                            <td>暂无数据</td>
                                            <td>暂无数据</td>

                                      </tbody>
                                    <?php

                            }
                            ?>
                            
                        </table>


                        <?php
                            //分页的处理
                            //义页码列表的长度，5个长
                            //第一条：如果总页数<=5，那么页码列表为1 ~ totaPage 从第一页到总页数
                            $begin = 1;
                            $end = 5;
                            if($result['pageBean']['totaPage']<=5){
                                $begin = 1;
                                $end = $result['pageBean']['totaPage'];
                            }else{
                                //总页数>5的情况
                                //第二条：按公式计算，让列表的头为当前页-2；列表的尾为当前页+2
                                $begin = $result['pageBean']['totaPage'] - 2;
                                $end = $result['pageBean']['totaPage'] + 2;
                            }

                        ?>



                        <div class="pull-right"><!--右对齐--->
                            <ul class="pagination _pagination">
                                <li class="disabled"><a href="#">第<?php echo $result['pageBean']['pageCode']?>页/共<?php echo $result['pageBean']['totaPage']?>页</a></li>
                                <li><a href="/Myblog/index.php?<?php echo $result['pageBean']['url']?>&pageCode=1">首页</a></li>
                                <li><a href="/Myblog/index.php?<?php echo $result['pageBean']['url']?>&pageCode=<?php echo ($result['pageBean']['pageCode']-1)<0 ? $result['pageBean']['pageCode'] : $result['pageBean']['pageCode']-1 ?>">&laquo;</a></li><!-- 上一页 -->

                                <?php
                                    //循环显示页码列表
                                    for($i = $begin; $i<=$end; $i++){
                                        //如果是当前页则设置无法点击超链接
                                        if($i == $result['pageBean']['pageCode']){


                                ?>
                                              <li class="active"><a><?php echo $i?></a><li>
                                <?php
                                        }else{
                                 ?>

                                            <li><a href="/Myblog/index.php?<?php echo $result['pageBean']['url']?>&pageCode=<?php echo $i?>"><?php echo $i?></a></li>
                                 <?php
                                          }
                                     }
                                ?>



                                <li><a href="/Myblog/index.php?<?php echo $result['pageBean']['url']?>&pageCode=<?php echo ($result['pageBean']['pageCode']+1)> $result['pageBean']['totaPage'] ? $result['pageBean']['totaPage'] : $result['pageBean']['pageCode']+1?>" >&raquo;</a></li>

                                <li><a href="/Myblog/index.php?<?php echo $result['pageBean']['url']?>&pageCode=<?php echo $result['pageBean']['totaPage']?>">尾页</a></li>
                            </ul>
                        </div>
                    </div>

                </div>



 </div> 


<body>
<!--------------------------------------添加的模糊框------------------------>
<form class="form-horizontal">   <!--保证样式水平不混乱-->
    <!-- 模态框（Modal） -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        添加分类
                    </h4>
                </div>
                <div class="modal-body">

                    <!---------------------表单-------------------->
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">分类名称</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="addTypeName"  placeholder="请输入分类名称">
                            <label class="control-label" for="addTypeName" style="display: none;"></label>
                        </div>
                    </div>



                    <!---------------------表单-------------------->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="button" class="btn btn-primary" id="addBlogType">
                        添加
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

</form>
<!--------------------------------------添加的模糊框------------------------>





<!--------------------------------------修改的模糊框------------------------>
<form class="form-horizontal">   <!--保证样式水平不混乱-->
    <!-- 模态框（Modal） -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        修改分类
                    </h4>
                </div>
                <div class="modal-body">

                    <!---------------------表单-------------------->
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">分类名称</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="addTypeName"  placeholder="请输入分类名称">
                            <label class="control-label" for="addTypeName" style="display: none;"></label>
                        </div>
                    </div>



                    <!---------------------表单-------------------->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="button" class="btn btn-primary" id="addBlogType">
                        添加
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

</form>
<!--------------------------------------修改的模糊框------------------------>


<div class="modal fade" id="modal_info" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="infoModalLabel">提示</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" id="div_info"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="btn_info_close" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
