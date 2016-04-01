<?php
/**
 * Created by PhpStorm.
 * User: whistle ting
 * Date: 2015/12/16
 * Time: 18:37
 */
header("Content-Type: text/html; charset=UTF-8");
$receive = json_decode(file_get_contents('php://input', 'r'), true);
$pdo = "mysql:host=127.0.0.1; port=3306; dbname=wecanchat";
$mypdo = new PDO($pdo, 'root', '');
$password = null;
session_start();
$email = $_SESSION['email'];
$currentPassword = $receive["current"];
$afterPassword = $receive["after"];
$sql = "select password from user where email='$email'";
$result = $mypdo->query($sql);
$res = $result->fetch();
$password = $res["password"];
if($password == $currentPassword){
    $sql = "update user set password='$afterPassword' where email='$email'";
    if($mypdo->exec($sql)){
          echo "change password success";
    }else{
          echo "change password fail";
    }
}else{
  echo "password error";
}
unset($mypdo);
?>