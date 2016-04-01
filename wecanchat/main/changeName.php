<?php
/**
 * Created by PhpStorm.
 * User: whistle ting
 * Date: 2015/12/16
 * Time: 19:34
 */
header("Content-Type: text/html; charset=UTF-8");
$receive = json_decode(file_get_contents('php://input', 'r'), true);
session_start();
$email = $_SESSION["email"];
$pdo = "mysql:host=127.0.0.1; port=3306; dbname=wecanchat";
$mypdo = new PDO($pdo, 'root', '');
$sql = "select * from user where email='$email'";
$name = $receive['Name'];
$sex = $receive["Sex"];
$result = $mypdo->query($sql);
if($result->fetchColumn()>0){
    $sql = "update user set name='$name',sex='$sex' where email='$email'";
    if($mypdo->exec($sql)){
        echo "name change success";
    }else{
        echo "name change fail";
    }
}
unset($mypdo);
?>