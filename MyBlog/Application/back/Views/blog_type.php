<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>123</title>
<link rel="stylesheet" href="/MyBlog/css/bootstrap.min.css">
<link rel="stylesheet" href="/MyBlog/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/MyBlog/css/bootstrap-admin-theme.css">
<link rel="stylesheet" href="/MyBlog/css/bootstrap-admin-theme.css">
<script src="/MyBlog/js/bootstrap.min.js"></script>
<script src="/MyBlog/jQuery/jquery-3.1.1.min.js"></script>
<script src="/MyBlog/js/bootstrap-dropdown.min.js"></script>

<script src="/MyBlog/js/jquery.min.js"></script>
<script src="/MyBlog/js/bootstrap.min.js"></script>
<link href="/MyBlog/css/common.css" rel="stylesheet">

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
                            
                            
                            <!---在此插入信息-->

                             <tbody>
	                         	   <td><s:property value="#readerType.readerTypeName"/></td>
	                             
	                                <td>
	                                	<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#updateModal">修改</button>
	                                	
	                                		<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#updateModal">删除</button>
	                               	</td>                                              
                          	  </tbody>

                            	<tbody>
	                         	   	<td>暂无数据</td>
	                         	   	<td>暂无数据</td>
	                                                                        
                          	  </tbody>

                            
                        </table>

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
                    </div>

                </div>



 </div> 


<body>
</body>
</html>
