<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php
		$file_path = "info.txt";
		if(file_exists($file_path)){
			$fp = fopen($file_path, "w");
			$str = $_POST["id"] . PHP_EOL . $_POST["name"] . PHP_EOL . $_POST["password"] .PHP_EOL . $_POST["phone"] .PHP_EOL . $_POST["IpAddress"];//换行符
			fwrite($fp, $str);
			
		}
		fclose($fp);
	?>
	<?php
			//面向过程  菜鸟教程
			$servername = "localhost";//主机
			$username = "root";//用户名
			$password = '123456';//密码
			$ip = $_SERVER["REMOTE_ADDR"];//服务器变量：$_SERVER $_SERVER 是一个包含诸如头信息（header）、路径（path）和脚本位置（script locations）的数组。 “REMOTE_ADDR”正在浏览当前页面用户的 IP 地址。 “REMOTE_HOST”正在浏览当前页面用户的主机名。反向域名解析基于该用户的 REMOTE_ADDR。 
			$dbname="cc";//数据库名字
			//创建链接
			$conn = mysqli_connect($servername, $username, $password);
			//检测链接
			if(! $conn){
				die("用户信息注册连接失败" . mysqli_connect_error());//连接失败
			}
			 else
			{ 
				echo ('用户信息注册成功！')."<br/>";/*echo ('用户信息注册成功！')."<br/>"; */  /* mysqli_close($conn);  关闭连接*/
				$url='login.html';//链接改变
				echo "<script>location.href='$url'</script>";
			}	
			//创建数据库
			// $sqlchuangjian="CREATE DATABASE C";
			// if (mysqli_query($conn, $sqlchuangjian)) {
			// 	echo "数据库创建成功";
			// } else {
			// 	echo "数据库创建失败: " . mysqli_error($conn);
			// }
			//创建数据表
			// 使用 sql 创建数据表
			// $sql = "CREATE TABLE MyGuests (
			// 	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			// 	firstname VARCHAR(30) NOT NULL,
			// 	lastname VARCHAR(30) NOT NULL,
			// 	email VARCHAR(50),
			// 	reg_date TIMESTAMP
			// 	)";	
			mysqli_select_db( $conn, 'cc');//选择要操作的数据库
			//插入一条数据
			$sql="INSERT INTO biao (id, name, password , phone, qauto, remember, lastlogin, readpolicy, IpAddress, showstatus, loginflag, showlogin,email)
			VALUES
			('$_POST[id]','$_POST[name]','$_POST[password]','$_POST[phone]' ,'1','1','0','1','$ip','离线','2','0', '$_POST[id]@qq.com')";
			if(!mysqli_query($conn, $sql) ){
				die("注册页面新数据插入失败" . mysqli_error($conn));
			}
			else{
				echo ('注册页面新数据插入成功!')."<br/>";
			}
			//插入多条数据
			// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
			// VALUES ('John', 'Doe', 'john@example.com');";
			// $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
			// VALUES ('Mary', 'Moe', 'mary@example.com');";
			// $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
			// VALUES ('Julie', 'Dooley', 'julie@example.com')";
			// if(mysqli_multi_query($conn, $sql))
			mysqli_close($conn);
		?>
</body>
</html>
