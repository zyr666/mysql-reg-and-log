<html>
	<head>
		<title>登录</title>
		<link rel="stylesheet" href="css/input.css"/>
		<script src="js/tiaozhuan.js"></script>
	</head>
	<body>
		<?php
			$username = $_POST['username'];
			$password = $_POST['pwd'];
			$username_md5 = md5(md5($username));
			$password_md5 = md5(md5($password));
			//mysql连接
			echo("正在连接mysql服务器....<br>");
			$mysql_con = @mysqli_connect("localhost","root","xixi0219","register");
			$mysql_con_times = 0;
			if($mysql_con){
				echo("<br>mysql已连接~");
			}
			else
			{
				echo("<br>无法连接数据库,开始重新连接!<br>");
				while($mysql_con_times < 21)
				{
					$mysql_con_times = $mysql_con_times + 1;
					$mysql_con = @mysqli_connect("localhost","root","xixi0219","register");
					echo("<br>正在进行第".$mysql_con_times."次连接!");
					if($mysql_con_times > 20 and $mysql_con == FALSE)
					{
						die("<br><br>数据库连接失败!");
					}
					if($mysql_con == TRUE)
					{
						echo("<br>已连接");
						break;
					}
				}
			}
			echo("<br>");
			//调试
			/*
				echo($username_md5."<br>");
				echo($password_md5);
			*/
			//mysql查询
			$chaxun_mysql = "SELECT * FROM user WHERE username='$username_md5' and password='$password_md5';";
			//执行
			$getall = mysqli_query($mysql_con,$chaxun_mysql);
			//获取
			$line_in_mysql = mysqli_num_rows($getall);//一个很重要的东西 取mysql查询的结果!!!!
			if($line_in_mysql == 1){
					setcookie("login",$username,time()+1200);
					echo("<font size=\"6\">成功登录</font>");
			} 
			else
			{
				echo("<font size=\"5\">用户名或密码错误</font>");
			}
			mysqli_close($mysql_con);
		?>	
		<h2>1秒后将自动返回</h2>
	</body>
</html>
