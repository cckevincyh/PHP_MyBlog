<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>123</title>
<link href="/MyBlog/css/common.css" rel="stylesheet">
<link href="/MyBlog/css/setting.css" rel="stylesheet">
</head>
<script src="/MyBlog/jQuery/jquery-3.1.1.min.js"></script>
<script src="/MyBlog/js/change.js"></script>


<div class="content">
            <div class="logo">帐号设置</div>
      <div class="tabs clearfix">
		  <a href="/MyBlog/index.php?p=back&a=changePwd" class="on" target="content"  id="changepwd" onclick="onPwd()">帐号安全</a>
		  <a href="/MyBlog/index.php?p=back&a=changeMyInfo" target="content"  id="privacy" onclick="onPrivacy()">个人设置</a>
      </div>

			<iframe class="setting_pwd" src="setting_pwd.php" frameborder="0" scrolling="no" name="content" id="content"></iframe>

    <!--
       <iframe class="setting_myinfo" src="setting_myinfo.php" frameborder="0" scrolling="no" name="setting_content"></iframe>
 -->
  </div>



<body>
</body>
</html>
