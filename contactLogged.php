<?php
require "config/constants.php";
include('./config/config.inc.php');
session_start();
if(!isset($_SESSION["uid"])){
	header("location:myProfile.php");
}
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Blue Gaming</title>
		
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>


		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="style2.css">
		
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
<div class="navbar navbar-inverse navbar-fixed-top navbar-expand">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Blue Gaming Webáruház</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="indexLogged.php"><span class="glyphicon glyphicon-home"></span>Főoldal</a></li>
				<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Termékek</a></li>
				<li><a href="contactLogged.php"><span class="glyphicon glyphicon-envelope"></span>Kapcsolat</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="cart.php" id="cart_container"><span class="glyphicon glyphicon-shopping-cart"></span>Kosár<span class="badge">0</span></a>
				</li>
				<li><a href="myProfile.php"><span class="glyphicon glyphicon-user"></span><?php echo "Üdv,".$_SESSION["name"]; ?></a>
				</li>
				
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 col-xs-12">
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">Elérhetőségeink</div>
					<div class="panel-body" style="background: #4D4A47  !important;">
						<h2 style="text-align: center; color: cyan">E-mail Elérhetőség: </h2><h3 style="text-align: center; color: cyan">bluegaming2023@gmail.com</h3>
						<br><br>
						<h2 style="text-align: center; color: cyan">Üzenet Küldése:</h2><br><br>
						
					
				</div>
			</div>
			<div class="container-fluid fixed-bottom pageFooter">
    <div class="row text-center text-uppercase font-weight-bold">
        <?php if(isset($footerData['copyright'])) { ?>&copy;&nbsp;<?= $footerData['copyright'] ?> <?php } ?>
		    &nbsp;
        <?php if(isset($footerData['corpName'])) { ?><?= $footerData['corpName']; ?><?php } ?>
    </div>
</div>	
</body>
</html>
















































