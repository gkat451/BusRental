<?php require_once "../controller/log.php";
require_once "../controller/basket.php";?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Your Basket</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="basket.js"></script>
    </head>
    <body>
        <div class="left"></div><div class="middle">
            <div class="header">
                <div class="title"><h1>Berwyn Buses</h1></div>
                <div class="menuHolder">
                    <a href="index.php"><div class="headerButton"><p>Home</p></div></a>
                    <a href="search.php"><div class="headerButton"><p>Search</p></div></a>
                    <a href="basket.php"><div class="headerButton"><p>Basket (<?=count($foundBuses)?>)</p></div></a>
                    <a href="about.php"><div class="headerButton"><p>About</p></div></a>
                    <a href="<?=$_SESSION["login"]?>.php"><div class="headerButton"><p>Admin</p></div></a>
                </div>
            </div>
            <div class="padding">
                <div class="content">
                    <h2>Basket contents:</h2>
					<table id="table">
                        <thead><tr>
                            <th id="capacity">Capacity</th>
                            <th id="rate">Daily Rate</th>
                            <th id="colour">Colour</th>
                            <th id="location">Pickup Location</th>
                            <th></th>
                            <th></th>
                        </tr></thead>
                        <tbody>
                            <?php foreach ($foundBuses as $bus): ?>
                            <tr>
                                <td><?= $bus->bCapacity ?></td>
                                <td>£<?=$bus->bRate ?></td>
                                <td><?= $bus->bColour ?></td>
                                <td><?= $bus->bLocation ?></td>
                                <td><img alt="A bus of <?=$bus->bColour?> colour." src="../view/img/<?=$bus->bColour?>.png"></td>
                                <td>
                                    <form method="post" action="../controller/removeBasket.php">
                                        <input type="hidden" value="search.php" name="origin"/>
                                        <input type="hidden" value="<?=$bus->bId?>" name="input"/>
                                        <input type="submit" value="Remove from basket"/>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>                  
                    <br>
                    <!-- clear basket, unset session basket -->
                    <form method="post" action="../controller/clearBasket.php">
                        <input type="hidden" value="basket.php" name="origin"/>
                        <input type="hidden" value="all" name="input"/>
                        <input type="submit" value="Clear basket"/>
                    </form>
                    <br>Total cost of basket: £<?=$_SESSION["sum"]?>
                    <hr>
                    <h3>Finished shopping?</h3>
                    <!-- proceed to checkout, redirect to view, if successful the booking added to database -->
                    <form method="post" action="../controller/checkout.php">
                        Pickup date: <input type="date" name="pickup" required/><br>
                        <br>
                        Dropoff date: <input type="date" name="dropoff" required/><br>
                        <br>
                        <input type="submit" value="Proceed to checkout"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="right"></div>
    </body>
</html>