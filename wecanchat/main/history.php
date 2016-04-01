
<?php
/**
 * Created by PhpStorm.
 * User: whistle ting
 * Date: 2015/12/17
 * Time: 16:02
 */
header("Content-Type: text/html; charset=UTF-8");
$data = json_decode(file_get_contents('php://input', 'r'), true);
session_start();
$email = $_SESSION['email'];
$time = date('Y-m-d',strtotime($data['time']));
$next = strtotime(date("Y-m-d",$time+86400));
$pdo = "mysql:host=127.0.0.1; port=3306; dbname=wecanchat";
$mypdo = new PDO($pdo, 'root', '');
$result = $mypdo->query("select * from tweet where email='$email' and time>='$time' and time<='$next'");
while($res=$result->fetch()){
    echo "<div><dl><dt>email : ".$res['email'].
        "</dt><dd>"."<p style='text-align: left;'>text : ".
        $res["content"]."</p>"."<p style='text-align: right;'>time : "
        .$res['time']."</p></dd></dl></div>";
}
unset($mypdo);
?>

