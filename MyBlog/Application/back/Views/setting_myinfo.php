<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>123</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/MyBlog/css/bootstrap.min.css">
<link rel="stylesheet" href="/MyBlog/css/bootstrap.css">
<link rel="stylesheet" href="/MyBlog/css/bootstrap-theme.min.css">
<script src="/MyBlog/js/bootstrap.min.js"></script>
<script src="/MyBlog/jQuery/jquery-3.1.1.min.js"></script>
<script src="/MyBlog/js/bootstrap-dropdown.min.js"></script>
<script src="/MyBlog/js/bootstrap.min.js"></script>
<script src="/MyBlog/jQuery/ajaxfileupload.js"></script>
<script src="/MyBlog/js/ajaxHeardImgUpload.js"></script>
</head>



                                      
<form class="form-horizontal">   <!--保证样式水平不混乱-->

        <div class="form-group">
            <label for="firstname" class="col-sm-1 control-label">头像</label>
            <div class="col-sm-2">
             <label for="inputfile"></label>

            <input type="hidden" id="heardImg"/>

            <input type="file" id="heardImgUpload" name="heardImgUpload"/><br/>
            <label class="control-label" for="heardImgUpload" style="display: none;"></label>
            <p class="help-block"><img class="img-rounded" src="#" width="100" height="100" id="img1" alt="请上传头像"  /></p>
            </div>
        </div>



        <div class="form-group">
            <label for="firstname" class="col-sm-1 control-label">QQ</label>
                <div class="col-sm-2">
                    <input type="hidden" id="updateId">
                    <input type="text" class="form-control" id="updateName" placeholder="请输入QQ号码">
                <label class="control-label" for="updateName" style="display: none;"></label>
                </div>
        </div>


        <div class="form-group">
            <label for="firstname" class="col-sm-1 control-label">Email</label>
            <div class="col-sm-2">
                    <input type="text" class="form-control" id="updateName2" placeholder="请输入Email地址">
                    <label class="control-label" for="updateDesc" style="display: none;"></label>
            </div>
        </div>


        <div class="form-group">
            <label for="firstname" class="col-sm-1 control-label">微信二维码</label>
            <div class="col-sm-2">
             <label for="inputfile"></label>

            <input type="hidden" id="wechatImg"/>
            <input type="file" id="wechatImgUpload" name="wechatImgUpload"/><br/>
            <label class="control-label" for="wechatImgUpload" style="display: none;"></label>
            <p class="help-block"><img class="img-rounded" src="#" width="100" height="100" id="img2" alt="请上传微信二维码"  /></p>
            </div>
        </div>




            <div class="form-group">
            <label for="firstname" class="col-sm-1 control-label"></label>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-danger" id="updateProductInfo">
                        修改
                    </button>
                </div>
            </div>


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


 </form>
                              

<body>
</body>
</html>
