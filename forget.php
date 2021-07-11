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
			$str = $_POST["id"] . PHP_EOL . $_POST["email"] . PHP_EOL . $_POST["phone"];
			fwrite($fp, $str);
			
		}
		fclose($fp);
	?>
	<?php
			$servername = "localhost";
			$username = "root";
			$password = '123456';
			$ip = $_SERVER["REMOTE_ADDR"];
			$conn = mysqli_connect($servername, $username, $password);
			if(! $conn){
				die("忘记密码连接失败: " . mysqli_error($conn));
			}
			 else
			{ 
				echo ('忘记密码连接成功！')."<br/>";
				/*echo ('用户信息注册成功！')."<br/>"; */  /* Close the connection 关闭连接*/
				 	$url='login.html';
					echo "<script>location.href='$url'</script>";
			}
			mysqli_select_db( $conn, 'cc');
			$sql="UPDATE biao SET password='$_POST[password]' WHERE id='$_POST[id]' AND email='$_POST[email]' AND phone='$_POST[phone]'";
			$retval = mysqli_query($conn, $sql);
			if(! $retval){
				die("忘记页面更新数据表失败" . mysqli_error($conn));
			}
			else{
				echo ('忘记页面更新数据表成功！')."<br/>";
			}
			mysqli_close($conn);
		?>
</body>
</html>
