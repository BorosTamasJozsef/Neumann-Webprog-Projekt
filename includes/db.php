<?php
//Ezt a fájlt alkalmazzuk az adatbázishoz történő kapcsolódáshoz
require "config.inc.php"; //amennyiben nem működik, tartalmazó mappa hozzáadása
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