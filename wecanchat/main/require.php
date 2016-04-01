<?php
/**
 * Created by PhpStorm.
 * User: whistle ting
 * Date: 2015/12/14
 * Time: 22:20
 */
$data = json_decode(file_get_contents('php://input', 'r'), true);
session_start();
$email = $_SESSION['email'];;
$content = $data["content"];
$pdo = "mysql:host=127.0.0.1; port=3306; dbname=wecanchat";
$mypdo = new PDO($pdo, 'root', '');

if($content!=null){
    $sql = "insert into tweet(email, content) values('$email', '$content')";
    $mypdo->exec($sql);
}
$result = $mypdo->query("select * from tweet where email='$email' order by time desc");
while($res=$result->fetch()){
    if($res['content']!=null){
        echo "<div><dl><dt>email : ".$res['email'].
            "</dt><dd>"."<p style='text-align: left;'>推文 : ".
            $res["content"]."</p>"."<p style='text-align: right;'>时间 : "
            .$res['time']."</p></dd></dl></div>";
    }
}
unset($mypdo);
?>