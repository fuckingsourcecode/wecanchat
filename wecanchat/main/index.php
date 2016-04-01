<?php
/**
 * Created by PhpStorm.
 * User: whistle ting
 * Date: 2015/12/14
 * Time: 21:53
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/index.js"></script>
</head>
<body>
<header id="header" class="">
    <ul>
        <li><a href="../index.html  ">主页</a></li><!--
	     --><li><a href="#">通知</a></li><!--
	     --><li><a href="query.html">查找日记</a></li><!--
	     -->
        <li><a id="username" href="person_information.php"><?php session_start(); echo $_SESSION['email'];?></a></li>
    </ul>
</header><!-- /header -->
<section class="container">
    <aside>

    </aside>
    <article>
        <section class="write">
            <textarea name="" id="writeArticle"></textarea>
            <button type="submit" id="sub">
                发<br/>表
            </button>
        </section>
        <section id="content">

        </section>
    </article>
    <aside>

    </aside>
</section>

<footer>

</footer>
</body>
</html>