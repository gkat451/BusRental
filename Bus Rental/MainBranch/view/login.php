<?php require_once "../controller/log.php";
require_once "../controller/login.php";
$returnVal = "";?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="login.js"></script>
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
                    <h2>Please enter login credentials:</h2>
                    <form method="post" action="login.php">
                        <input name="loginName" placeholder="Username" autofocus required/><br>
                        <input name="loginPass" placeholder="Password" type="password" required/><br><br>
                        <button name="login" type="submit" required>Login</button>
                    </form>
                    <?php if(isset($_SESSION["validation"]) && !$_SESSION["validation"]): ?>
                        <br><?=$_SESSION["returnVal"]?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="right"></div>
    </body>
</html>