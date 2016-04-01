<?php
header("Content-Type: text/html; charset=UTF-8");
if ($_POST["user_password"] != $_POST["confirm_password"]) {
	echo "the password is not equal";
	exit;
}
$username = $_POST['user_name'];
$password = $_POST['user_password'];
$email = $_POST['user_email'];
$pdo = "mysql:host=127.0.0.1; port=3306; dbname=wecanchat";
$mypdo = new PDO($pdo, "root", "");
$sql = "select * from user where email='$email'";
$rs = $mypdo->query($sql);
	if($rs->fetchColumn()>0){
		echo "账号已注�?";
	}else{
		$sql1 = "insert into user(name, password, email) values('$username', '$password', '$email')";
		if ($mypdo->exec($sql1)) {
			echo "注册成功";
			session_start();
			$_SESSION['email'] = $eamil;
			header("location: ../main/index.php ");
			exit;
		} else {
			echo "注册失败";
		}
	}

?>