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
			$str = $_POST["id"] . PHP_EOL . $_POST["password"];
			echo(id);
			fwrite($fp, $str);
			
		}
		fclose($fp);
	?>
	<?php
			$servername = "localhost";
			$username = "root";
			$password = '123456';
			$dbname = "cc";

			$conn = mysqli_connect($servername, $username, $password ,$dbname);
			if(! $conn){
				die("登录页面连接失败: " . mysqli_error($conn));
			}
			 else
			{ 
				echo ('登录页面连接成功！')."<br/>";
			}
			$sql="SELECT  id,password FROM biao WHERE id = $_POST[id] AND password = '$_POST[password]'";			
			$result = mysqli_query($conn, $sql);
			if($row = mysqli_fetch_array($result))//数组 输出
			{
				$url='http://localhost:8090/ChangChun/index.html';
				echo "<script>location.href='$url'</script>";
			}else{
					$url = 'login.html';
					echo "<script> alert('账户或密码输入有误！'); </script>"; 
					echo "<meta http-equiv='Refresh' content='0;URL=$url'>";  
			}		
			
			mysqli_close($conn);
		?>
</body>
</html>
