<html>
	<head>
		<title>注册结果</title>
		<script src="js/tiaozhuan.js"></script>
	</head>
	<body bgcolor="#e2e2e2">
		<?php
			$username = $_POST['username'];
			$password = $_POST['pwd'];
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
					if($mysql_con)
					{
						echo("<br>已连接");
						break;
					}
				}
			}
			echo("<br>");
			//进行数据库操作
			//数据库插入语句
			$username_md5 = md5(md5($username));
			$password_md5 = md5(md5($password));
			$db_doin = "INSERT INTO `user` (`username`, `password`)
			 VALUES ('$username_md5', '$password_md5');";
			 //这里的mysql的执行语句必须是这样子的 不然无法插入英文字符!!!!
			mysqli_query($mysql_con,"set user 'GBK'");
			$mysql_que = mysqli_query($mysql_con,$db_doin);
			if($mysql_que){
				echo("写入成功~");
			}
			else
			{
				echo("写入失败qaq");
			}
			mysqli_close($mysql_con);
		?>
	</body>
</html>