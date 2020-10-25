<?php
if($_GET['user']==$user&&$_GET['password']==$password){
	setcookie($cookie_name,$cookie,time()+3600,"/");
	echo "<meta http-equiv=\"refresh\" content=\"0;url=../write\">";
}
else if($_COOKIE['write']!=$cookie){
?>
	<head>
		<meta charset="utf-8">
		<title>write登录</title>
<link rel="stylesheet" type="text/css" href="css/index.css" />
	</head>
	<body>
		<div class="wrap">
			<div class="login-wrap">
				<div class="login-title">
					Login
				</div>
				<div class="login-form"><form  method="get">
					<input type="text" name="user" class="login-input">
					<input type="password" name="password" class="login-input">
					<input type="submit" value="Login" class="login-submit"/>
				</form></div>
				<div class="tip">
					不是管理员?<a href="/">回到主页</a>
				</div>
			</div>
		</div>
<?php
}
?>
