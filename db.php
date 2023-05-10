<?php
//Ezt a fájlt alkalmazzuk az adatbázishoz történő kapcsolódáshoz
//lehet kell a require, de eddig errort dobott
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE_NAME', 'gremanandboros');
define('CURRENCY', 'HUF');
$servername = HOST;
$username = USER;
$password = PASSWORD;
$db = DATABASE_NAME;
//A configban meghatározott állandók szerint

//Kapcsolat létrehozása:
$connection = mysqli_connect($servername, $username, $password, $db);
//Kapcsolat ellenőrzése (amennyiben nem tudott létrejönni, akkor az alábbi megjelenítése):
if (!$connection) {
    die("A kapcsolat nem tudott létrejönni: " . mysqli_connect_error());
}


?>