<html>
	<head>
		<title>登录</title>
		<link rel="stylesheet" href="css/input.css"/>
	</head>
	<body>
		<form action="login_2.php" method="post">
			<h2>登录:</h2>
			<br>
			<h3>账号:</h3>
			<input type="text" class="login" name="username"/>
			<h3>密码:</h3>
			<input type="password" class="login" name="pwd"/>
			&nbsp;&nbsp;
			<input type="submit" value="登录" class="sub"/>
		</form>
			<input type="button" value="没有账号?注册一个!" onclick="location='reg_1.php'" style="height: 40px; width: 200px; background-color: #4892ff; color: #24ff5b; font-size: inherit;"/>
	</body>
</html>