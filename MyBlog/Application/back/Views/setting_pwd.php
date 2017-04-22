
<html>
<head>
<meta charset="utf-8">
<title>123</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="jQuery/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap-dropdown.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/changePwd.js"></script>
</head>



<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="firstname" class="col-sm-1 control-label">原密码</label>
    <div class="col-sm-2">
      <input type="password" class="form-control" id="oldPwd" placeholder="请输入原密码">
        <label class="control-label" for="oldPwd" style="display:none;"></label>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-1 control-label">新密码</label>
    <div class="col-sm-2">
      <input type="password" class="form-control" id="newPwd" placeholder="请输入新密码">
        <label class="control-label" for="newPwd" style="display:none;"></label>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-1 control-label">确认密码</label>
    <div class="col-sm-2">
      <input type="password" class="form-control" id="confirmPwd" placeholder="请输入确认密码">
        <label class="control-label" for="confirmPwd" style="display:none;"></label>
    </div>
  </div>
  
  <div class="form-group">
    <label for="firstname" class="col-sm-1 control-label"></label>
    <div class="col-sm-2">
      <button type="button" class="btn btn-danger" id="btn_changePwd">确认修改</button>
    </div>
  </div>
    
  
</form>



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


<body>
</body>
</html>
