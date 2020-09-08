<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Your receipt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="../view/main.css" />
        <script src="receipt.js"></script>
    </head>
    <body>
        <div class="left"></div><div class="middle">
            <div class="header">
                <div class="title"><h1>Berwyn Buses</h1></div>
                <div class="menuHolder">
                    <a href="../view/index.php"><div class="headerButton"><p>Home</p></div></a>
                    <a href="../view/search.php"><div class="headerButton"><p>Search</p></div></a>
                    <a href="../view/basket.php"><div class="headerButton"><p>Basket</p></div></a>
                    <a href="../view/about.php"><div class="headerButton"><p>About</p></div></a>
                    <a href="../view/<?=$_SESSION["login"]?>.php"><div class="headerButton"><p>Admin</p></div></a>
                </div>
            </div>
            <div class="padding">
                <div class="content">
                    <h2>Thank you <?=$firstname?> <?=$lastname?> at <?=$email?> for your booking. <br>
                    Enjoy your trip!</h2> 
                    Booked pickup: <?=$_SESSION["pickup"]?><br>
                    Booked dropoff: <?=$_SESSION["dropoff"]?><br>
                    <br>
                    <a href="../view/index.php">Your Payment will now be taken</a>  
                </div>
            </div>
        </div>
        <div class="right"></div>
    </body>
</html>