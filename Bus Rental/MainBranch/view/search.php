<?php require_once "../controller/log.php";
require_once "../controller/search.php";
require_once "../controller/basket.php";?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Searching for...</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script type="text/javascript" src="search.js"></script>
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
                    <h3>Search</h3><hr>
                    Search by webservice:<br>
                    <div id="ajax">
                        <input id="searchField" name="ajaxSearch" type="text" placeholder="Location Pickup"/>
                        <input id="searchButton" type="button" value="Search"/>
                        <div class="ajaxResults"><div class="result"></div></div>
                    </div>
                    <br>
                    Search by PHP request:<br>
                    <form method="post" action="../view/search.php">
                        <input name="bSearch" placeholder="Seating"/>
                        <input type="submit" value="Search">
                    </form><br>
                    Sort by pure javascript:<br>
                    <div id="ajaxSort">
                        <select>
                            <option value="capacity">Capacity</option>
                            <option value="rate">Daily Rate</option>
                            <option value="colour">Colour</option>
                            <option value="location">Location</option>
                        </select>
                    </div>
                    <br><hr><br>
                    Items in basket: <?= count($foundBuses) ?>.
                    <br>
                    <!-- clear basket, unset session basket -->
                    <form method="post" action="../controller/clearBasket.php">
                        <input type="hidden" value="search.php" name="origin"/>
                        <input type="hidden" value="all" name="input"/>
                        <input type="submit" value="Clear basket"/>
                    </form>
                    <br><hr><br>
                    Amount of results: <?= count($busResults) ?><br><br>
                    <table id="table">
                        <thead><tr>
                            <th id="capacity">Capacity</th>
                            <th id="rate">Daily Rate</th>
                            <th id="colour">Colour</th>
                            <th id="location">Current Location</th>
                            <th></th>
                            <th></th>
                        </tr></thead>
                        <tbody>
                            <?php foreach ($busResults as $bus): ?>
                            <tr>
                                <td><?= $bus->bCapacity ?></td>
                                <td>£<?= $bus->bRate ?></td>
                                <td><?= $bus->bColour ?></td>
                                <td><?= $bus->bLocation ?></td>
                                <td><img alt="A bus of <?=$bus->bColour?> colour." src="../view/img/<?=$bus->bColour?>.png"></td>
                                <td>
                                    <form method="post" action="../controller/addBasket.php">
                                        <input type="hidden" value="search.php" name="origin"/>
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