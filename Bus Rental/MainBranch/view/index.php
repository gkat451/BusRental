<?php require_once "../controller/log.php";
require_once "../controller/newdeals.php";
require_once "../controller/basket.php";?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Berwyn Buses</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
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
                    <h2>Current Promotions!</h2>
                    <table id="table">
                        <thead>
                            <tr>
                                <th>Original Daily Rate</th>
                                <th>Special Discounted Rate</th>
                                <th>Percentage off</th>
                                <th>Current Location</th>
                                <th>Expiry date</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($promotionBus as $promo): ?>
                            <tr>
                                <td>£<?= $promo->bRate ?></td>
                                <td><b>£<?= $promo->bRate*(1-$promo->pAmount) ?><b></td>
                                <td><?=($promo->pAmount)*100?>%</td>
                                <td><?= $promo->bLocation ?></td>
                                <td><?=$promo->pExpiry?></td>
                                <td><img alt="A bus of <?=$promo->bColour?> colour." src="../view/img/<?=$promo->bColour?>.png"></td>
                                <td>
                                    <form method="post" action="../controller/addBasket.php">
                                        <input type="hidden" value="index.php" name="origin"/>
                                        <input type="hidden" value="<?=$promo->pAmount?>" name="discount"/>
                                        <input type="hidden" value="<?=$promo->bId?>" name="input"/>
                                        <input type="submit" value="Add to basket"/>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <br>
                    <h2>Newest buses now in stock!</h2>
                    <table id="table">
                        <thead>
                            <tr>
                                <th>Capacity</th>
                                <th>Daily Rate</th>
                                <th>Colour</th>
                                <th>Current Location</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($newBus as $bus): ?>
                            <tr>
                                <td><?= $bus->bCapacity ?></td>
                                <td>£<?= $bus->bRate ?></td>
                                <td><?= $bus->bColour ?></td>
                                <td><?= $bus->bLocation ?></td>
                                <td><img alt="A bus of <?=$bus->bColour?> colour." src="../view/img/<?=$bus->bColour?>.png"></td>
                                <td>
                                    <form method="post" action="../controller/addBasket.php">
                                        <input type="hidden" value="index.php" name="origin"/>
                                        <input type="hidden" value="<?=$bus->bId?>" name="input"/>
                                        <input type="submit" value="Add to basket"/>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="right"></div>
    </body>
</html>