<?php
	header("Content-Type: text/html; charset=UTF-8");
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$pdo = "mysql:host=127.0.0.1; port=3306; dbname=wecanchat";
	$mypdo = new PDO($pdo, "root", "");
	
	$sql = "select * from user where email='$email'";
//	foreach($mypdo->query($sql) as $row){
//		echo $row["email"];
//		echo $row["password"];	
//	}
	$rs = $mypdo->query($sql);
	if($rs->fetchColumn()>0){
		$rs1 = $mypdo->query("select * from user where email = '$email' and password = '$password'");
		if($rs1->fetchColumn()>0){
			echo "登陆成功";
			session_start();
			$_SESSION['email'] = $email;
			header("location: main/index.php ");
			exit;
		}else{
			echo "密码错误";
		}
	}else{
		echo "账号不存在";
	}
unset($mypdo);
?>