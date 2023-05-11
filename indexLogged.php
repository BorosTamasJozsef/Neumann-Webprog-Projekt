<?php
require "config/constants.php";
include('./config/config.inc.php');
session_start();
if(!isset($_SESSION["uid"])){
	header("location:myProfile.php");
}
if (isset($_GET['pagesLog'])) {
	$pages = $_GET['pagesLog'];
	if (isset($pagesSearchLogged[$pagesLog]) && file_exists("./templates/pages/{$pagesSearchLogged[$pagesLog]['fileLogged']}.tpl.php")) {
		$searchingLog = $pagesSearchLogged[$pagesLog];
	}
	else { 
		$searchingLog = $error_page;
		header("HTTP/1.0 404 Not Found");
	}
}
else $searchingLog = $pagesSearchLogged['/'];
include('./templates/indexLogged.tpl.php'); //Bejelentkezett felhasználó esetében a 'Logged' példányt tartalmazza
?>

















































