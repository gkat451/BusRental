<?php require_once "../controller/log.php";
require_once "../controller/adminCheck.php";
require_once "../controller/admin.php";?>
<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Berwyn Buses Admin View</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="../view/main.css" />
        <script src="admin.js"></script><!-- note: will do these functions using ajax/jquery-->
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
                    <a href="../controller/logout.php"><p>Logout</p></a>
                    <h1>
                    Berwyn Buses Admin View<br>
                    Customers, Addresses and Buses
                    </h1>
                    <table id="table">
                        <thead><tr>
                            <th>Customer ID</th>
                            <th>First Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Alter Options</th>
                        </tr></thead>
                        <tbody>
                            <?php foreach ($customerResults as $customer): ?>
                            <tr>
                                <td><?= $customer->cId ?></td>
                                <td><?= $customer->cFirName ?></td>
                                <td><?= $customer->cSurName ?></td>
                                <td><?= $customer->cEmail ?></td>
                                <td><?= $customer->cPhone ?></td>
                                <td>
                                    <form method="post" action="../controller/removeCustomer.php">
                                        <input type="hidden" value="<?=$customer->cId?>" name="input"/>
                                        <input type="submit" value="Delete?"/>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <br>
                    <form method="post" action="../controller/addCustomer.php">
                        <input type="text" placeholder="First Name" name="firName"/>
                        <input type="text" placeholder="Surname" name="surName"/>
                        <input type="text" placeholder="Email Address" name="email"/>
                        <input type="text" placeholder="Phone Number" name="phone"/>
                        <input type="submit" value="Add a Customer"/>
                    </form>
                    <br>
                    <form method="post" action="../controller/updateCustomerName.php">
                        <input type="text" placeholder="Customer ID" name="id"/>
                        <input type="text" placeholder="First Name" name="fname"/>
                        <input type="text" placeholder="Surname" name="sname"/>
                        <input type="submit" value="Update Customer name"/>
                    </form>
                    <br>
                    <form method="post" action="../controller/updateCustomerContact.php">
                        <input type="text" placeholder="Customer ID" name="id"/>
                        <input type="text" placeholder="Email" name="email"/>
                        <input type="text" placeholder="Phone Number" name="phone"/>
                        <input type="submit" value="Update Customer details"/>
                    </form>
                    <br>
                    <form method="post" action="../view/admin.php">
                        Filter results by surname:
                        <input name="cSearch"/>
                        <input type="submit" value="Search"/>
                        <form action="../view/admin.php">
                            <input type="submit" value="Clear">
                        </form>
                    </form>
                    <br><hr><br>
                    <table id="table">
                        <thead><tr>
                            <th>Bus ID</th>
                            <th>Capacity</th>
                            <th>Daily Rate</th>
                            <th>Colour</th>
                            <th>Location</th>
                            <th>Booking Start</th>
                            <th>Booking End</th>
                            <th>Alter Options</th>
                        </tr></thead>
                        <tbody>
                            <?php foreach ($busResults as $bus): ?>
                            <tr>
                                <td><?= $bus->bId ?></td>
                                <td><?= $bus->bCapacity ?></td>
                                <td>£<?= $bus->bRate ?></td>
                                <td><?= $bus->bColour ?></td>
                                <td><?= $bus->bLocation ?></td>
                                <td><?= $bus->bBookStart ?></td>
                                <td><?= $bus->bBookEnd ?></td>
                                <td>
                                    <form method="post" action="../controller/removeBus.php">
                                        <input type="hidden" value="<?=$bus->bId?>" name="input"/>
                                        <input type="submit" value="Delete?"/>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <br>
                    <form method="post" action="../controller/addBus.php">
                        <input type="text" placeholder="Capacity" name="capacity"/>
                        <input type="text" placeholder="Daily Rate" name="rate"/>
                        <input type="text" placeholder="Colour" name="colour"/>
                        <input type="text" placeholder="Where" name="location"/>
                        <!-- placeholder dates, to be filled in by customer on booking -->
                        <input type="hidden" value="0000-00-00" name="start"/>
                        <input type="hidden" value="0000-00-00" name="end"/>
                        <input type="submit" value="Add a Bus"/>
                    </form>
                    <br>
                    <form method="post" action="../controller/editBus.php">
                        <input type="text" placeholder="Bus ID" name="id"/>
                        <input type="text" placeholder="Daily Rate" name="rate"/>
                        <input type="text" placeholder="Where" name="location"/>
                        <input type="submit" value="Edit Bus by ID"/>
                    </form>
                    <br>
                    <form method="post" action="../view/admin.php">
                        Filter results by bus ID:
                        <input name="bSearch"/>
                        <input type="submit" value="Search"/>
                        <form action="../view/admin.php">
                            <input type="submit" value="Clear">
                        </form>
                    </form>
                    <br><hr><br>
                    <table id="table">
                        <thead><tr>
                            <th>Booking ID</th>
                            <th>Departure date</th>
                            <th>Return date</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Customer ID</th>
                        </tr></thead>
                        <tbody>
                            <!-- Foreign key - Customer -->
                            <?php foreach ($bookingResults as $booking): ?>
                            <tr>
                                <td><?= $booking->boId ?></td>
                                <td><?= $booking->boDepartDate ?></td>
                                <td><?= $booking->boReturnDate ?></td>
                                <td><?= $booking->boOrigin ?></td>
                                <td><?= $booking->boDestination ?></td>
                                <td><?= $booking->boCustomer ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <br>
                    <form method="post" action="../view/admin.php">
                        Filter results by booking ID:
                        <input name="boSearch"/>
                        <input type="submit" value="Search"/>
                        <form action="../view/admin.php">
                            <input type="submit" value="Clear">
                        </form>
                    </form>
                    <br><hr><br>
                    <table id="table">
                        <thead>
                            <tr>
                                <th>Promotion ID</th>
                                <th>Percentage off</th>
                                <th>Expiry date</th>
                                <th>Registered Bus</th>
                                <th>Alter Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($promotions as $promo): ?>
                            <tr>
                                <td><?=$promo->pId?></td>
                                <td><?=$promo->pAmount . " (" . ($promo->pAmount)*100 . "%)"?></td>
                                <td><?=$promo->pExpiry?></td>
                                <td><?=$promo->pBus?></td>
                                <td>
                                    <form method="post" action="../controller/removePromo.php">
                                        <input type="hidden" value="<?=$promo->pId?>" name="input"/>
                                        <input type="submit" value="Delete?"/>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <br>
                    <form method="post" action="../controller/addPromo.php">
                        <input type="text" placeholder="Percentage" name="percent"/>
                        <input type="date" name="date"/>
                        <input type="text" placeholder="Bus ID" name="busId"/>
                        <input type="submit" value="Add a Promotion"/>
                    </form>
                    <br>
                    <form method="post" action="../view/admin.php">
                        Filter results by promotion ID:
                        <input name="pSearch"/>
                        <input type="submit" value="Search"/>
                        <form action="../view/admin.php">
                            <input type="submit" value="Clear">
                        </form>
                    </form>
                </div>
            </div>
        </div>
        <div class="right"></div>
    </body>
</html>