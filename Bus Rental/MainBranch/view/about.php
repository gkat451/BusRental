<?php require_once "../controller/log.php";?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>About Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="about.js"></script>
    </head>
    <body>
        <div class="left"></div><div class="middle">
            <div class="header">
                <div class="title"><h1>Berwyn Buses</h1></div>
                <div class="menuHolder">
                    <a href="index.php"><div class="headerButton"><p>Home</p></div></a>
                    <a href="search.php"><div class="headerButton"><p>Search</p></div></a>
                    <a href="basket.php"><div class="headerButton"><p>Basket</p></div></a>
                    <a href="about.php"><div class="headerButton"><p>About</p></div></a>
                    <a href="<?=$_SESSION["login"]?>.php"><div class="headerButton"><p>Admin</p></div></a>
                </div>
            </div>
            <div class="padding">
                <div class="content">
                About us: We are in the process of learning PHP, Git and mySQL!
                <br>
                Created by James C, George S, Henrique N and Isaac
                </div>
            </div>
        </div>
        <div class="right"></div>
    </body>
</html>