<!DOCTYPE html>
<html lang="zh-CN" class="ax-vertical-centered">
<head>
	<meta charset="UTF-8">
	<title>个人博客</title>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link href="css/blog_index.css" rel="stylesheet">

</head>


<body>
   
<table class="table" align="center" style="height:auto">
	 <tr>
		 <td colspan="3" >
			<iframe class="blog_top" src="Application\back\Views\blog.php" frameborder="0" scrolling="no"></iframe>
		 </td>
 	</tr>
    <tr>
		<td width="20%">
			<iframe class="blog_left"  src="Application\back\Views\left_panel.php" frameborder="0" scrolling="no" ></iframe>
		 </td>
		 <td width="60%">
			<iframe class="blog_center"   src="Application\back\Views\blog_content.php" frameborder="0" scrolling="no" ></iframe>
		 </td>
		 <td width="20%">
			<iframe class="blog_right"  src="?c=MyInfo" frameborder="0" scrolling="no"></iframe>
		 </td>
 	</tr>
     
     </table>
</body>

</html>