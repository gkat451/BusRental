<?php require_once "../controller/log.php";
require_once "../controller/basket.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Checking out</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="checkout.js"></script>
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
                    <form action="../controller/completeBooking.php" method = "post">
                        First name:<br>
                        <input type="text" name="firstName" required><br><br>
                        Last name:<br>
                        <input type="text" name="lastName" required><br><br>
                        Enter Your E-mail:<br>
                        <input type="text" name="email" required><br><br>
                        Enter Your Phone Number:<br>
                        <input type="text" name="phoneNumber" required><br><br>
                        Note: A Full Driving Licence is required for self-driving<br>
                        Do you have a valid licence?<br>
                        <br>
                        <input type="radio" name="licence" value = "yes"> Yes<br>
                        <br>
                        <input type="radio" name="licence" value = "no"> No<br>
                        <br>
                        <input type="submit" value="Submit">
                    </form>                
                </div>
            </div>
        </div>
        <div class="right"></div>
    </body>
</html>