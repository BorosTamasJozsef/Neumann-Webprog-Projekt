<?php

require "config/constants.php";

$servername = HOST;
$username = USER;
$password = PASSWORD;
$db = DATABASE_NAME;

// Kapcsolat létrehozása az adatbázissal
$con = mysqli_connect($servername, $username, $password,$db);

// A létrehozott kapcsolat ellenőrzése. Hogyha nem jó a kapcsolat, akkor a lenti szöveg lesz látható:
if (!$con) {
    die("A kapcsolat nem tudott létrejönni: " . mysqli_connect_error());
}


?>