<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>123</title>
<link href="css/common.css" rel="stylesheet">
<link href="css/setting.css" rel="stylesheet">
</head>
<script src="jQuery/jquery-3.1.1.min.js"></script>
<script src="js/change.js"></script>


<div class="content">
            <div class="logo">设置</div>
      <div class="tabs clearfix">
		  <a href="index.php?p=back&a=changePwd" class="on" target="content"  id="changepwd" onclick="onPwd()">帐号安全</a>
		  <a href="index.php?p=back&c=MyInfo&a=getMyInfo" target="content"  id="privacy" onclick="onPrivacy()">个人设置</a>
          <a href="index.php?p=back&c=ArticleType" target="content"  id="blog_type" onclick="onBlogType()">博文分类设置</a>
      </div>

			<iframe class="setting_pwd" src="index.php?p=back&a=setting_pwd" frameborder="0" scrolling="no" name="content" id="content"></iframe>


  </div>





<body>
</body>
</html>
