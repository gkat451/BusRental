<?php require_once "../controller/getdrivers.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Choose your driver</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="../view/main.css" />
        <script type="text/javascript" src="search.js"></script>
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
                    <a href="<?=$_SESSION["login"]?>.php"><div class="headerButton"><p>Admin</p></div></a>
                </div>
            </div>
            <div class="padding">
                <div class="content">
                    <table id="table">
                        <thead><tr>
                            <th id="drfname">First Name</th>
                            <th id="drlname">Last Name</th>
                            <th></th>
                        </tr></thead>
                        <form method="post" action="../controller/addDriver.php">
                            <tbody>
                                <?php foreach ($allDrivers as $driver): ?>
                                <tr>
                                    <td><?= $driver->drfname ?></td>
                                    <td><?= $driver->drlname ?></td>
                                    <td>
                                        <input type="radio" value="<?=$driver->drId?>" name="input[]" required/>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            <input type="hidden" value="<?=$firstname?>" name="firstName"/>
                            <input type="hidden" value="<?=$lastname?>" name="lastName"/>
                            <input type="hidden" value="<?=$email?>" name="email"/>
                            <input type="submit" value="Add driver"/>
                        </form>
                    </table>                  
                </div>
            </div>
        </div>
        <div class="right"></div>
    </body>
</html>