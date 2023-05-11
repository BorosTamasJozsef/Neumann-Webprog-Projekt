<?php
require "config/constants.php";
include('./config/config.inc.php');
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
}


	if (isset($_GET['pages'])) {
		$pages = $_GET['pages'];
		if (isset($pagesSearch[$pages]) && file_exists("./templates/pages/{$pagesSearch[$pages]['file']}.tpl.php")) {
			$searching = $pagesSearch[$pages];
		}
		else { 
			$searching = $error_page;
			header("HTTP/1.0 404 Not Found");
		}
	}
	else $searching = $pagesSearch['/'];
	include('./templates/index.tpl.php');
?>

















































