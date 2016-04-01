<?php
/**
 * Created by PhpStorm.
 * User: whistle ting
 * Date: 2015/12/15
 * Time: 0:40
 */
?>
<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
$email = $_SESSION['email'];
$username = null;
$pdo = "mysql:host=127.0.0.1; port=3306; dbname=wecanchat";
$mypdo = new PDO($pdo, "root", "");
$password = null;
$sql = "select * from user where email='$email'";
//	foreach($mypdo->query($sql) as $row){
//		echo $row["email"];
//		echo $row["password"];
//	}
$rs = $mypdo->query($sql);
if($rs->fetchColumn()>0){
    $rs1 = $mypdo->query("select * from user where email = '$email'");
    $result = $rs1->fetch();
    $username = $result['name'];
    $password = $result['password'];
}
unset($mypdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="person_information.css">
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/json2.js"></script>
</head>
<body>
<header id="header" class="">
    <ul>
        <li><a href="index.php">我的主页</a></li><!--
	     --><li><a href="#">通知</a></li><!--
	     --><li><a href="query.html">查找日记</a></li><!--
	     -->
        <li><a href="#" title=""><?php echo $_SESSION['email']; ?></a></li>
    </ul>
</header><!-- /header -->
<nav class="">
    <ul id="navigation">
        <li><a href="#tab_account"  title="">修改资料</a></li>
        <li><a href="#tab_password" title="">修改密码</a></li>
        <li><a href="#tab_seek"     title="">寻找好友</a></li>
        <li><a href="#tab_theme"    title="">更换主题</a></li>
        <li><a href="#tab_binging"  title="">最近登录</a></li>
    </ul>
    <article>
        <div class="content" id="tab_account">

           <p><span>用户名</span>:<input type="text" id="Name" value="<?php echo $username ?>"/></p>
            <p><span>邮箱</span>:<input  disabled="true" type="email" name="" value="<?php echo $_SESSION['email'];?>"/></p>
           <p><span>性别</span>:<select id="sex">
                <option selected="selected" value="male">男</option>
                <option value="female">女</option>
            </select></p>
            <input style="margin-right: 14em" type="button" id="changeName" value="确定">
        </div>
        <div class="content" id="tab_password">
            <p><span>当前密码</span>:<input type="password" name="" value="" id="currentPassword"
                                                                  placeholder="密码"  /></p>
            <p><span>修改后密码</span>:<input type="password" name="" value="" id="afterPassword"
                                                                   placeholder="密码"  /></p>
            <p><span>确认密码</span>:<input type="password" name="" value=""    id="makesurePassword"
                                                                  placeholder="密码"  /></p>
            <input style="margin-right: 14em" type="button" id="changeWord" value="确定">
        </div>
        <div class="content" id="tab_seek">
            <p><span>用户名</span>:<input type="text"    name="" value=""
                                                                 placeholder="用户名" /></p>
            <p><span>邮箱</span>:<input type="email"   name="" value=""
                                                                placeholder="邮箱"   /></p>
            <input style="margin-right: 14em" type="button" id="findFriend" value="确定">
        </div>
        <div class="content" id="tab_theme">
            <img src="" alt="">
            <img src="" alt="">
            <img src="" alt="">
        </div>
        <div class="content" id="tab_binging">
            <p></p>
            <p></p>
        </div>
    </article>
</nav>
<section>
    <article>
        <aside>

        </aside>
    </article>
</section>
<footer>

</footer>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#changeWord").click(function(){
            if($("#afterPassword").val()==$("#makesurePassword").val()){
                var data = {
                    current:$("#currentPassword").val(),
                    after: $("#makesurePassword").val()
                };
                var jsonData = JSON.stringify(data);
;                $.post(
                    "changePassword.php",
                    jsonData,
                    function(data){
                        alert(data);
                    }
                );
            }
        });
        $("#changeName").click(function(){
            if($("#Name").val()&&$("#sex").val()){
                var data = {
                    Name:$("#Name").val(),
                    Sex: $("#sex").val()
                };
                var jsonData = JSON.stringify(data);
                $.post(
                    "changeName.php",
                    jsonData,
                    function(data){
                        alert(data);
                    }
                );
            }
        });
    });
</script>
