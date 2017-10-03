<html>
	<head>
		<title>注册/登录mysql实例</title>
		<link rel="stylesheet" href="css/input.css"/>
		<style type="text/css">
			#top
			{
				text-align: center;
				color: #28ffbe;
			}
			body
			{
				text-align: center;
				height: auto;
				width: auto;
			}
		</style>
	</head>
	<body bgcolor="#e4e4e4">
		<h1 id="top">紫衣人团队-注册/登录mysql实例</h1>
		<br>
		<br>
		<input type="button" value="登录去" onclick="location='login_1.php'" class="sub"/>
		<br>
		<br>
		<br>
		<input type="button" value="去注册" onclick="location='reg_1.php'" class="sub"/>
		<!--登录判断-->
		<?php
			setcookie("login","访客",time()+1200);
			if(isset($_COOKIE['login'])){
				echo("<h2>欢迎,".$_COOKIE['login']."!");
			}
		?>
	</body>
</html>