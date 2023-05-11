<!--Ez az oldal a kosár ikonra történő kattintásra fog megjelenni (elemek szerkesztése). Tartalmazza a kosárba helyezett termékeket, lehetőség van eltávolítani és
frissíteni a behelyezett termékeket, illetve tovább lehet innen lépni a fizetéshez.-->

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
<style type="text/css">
   body { background: black !important; } /*Az !important arra kényszeríti a böngészőt, hogy felülírja a bootstrapet*/
</style>
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
		<link rel="stylesheet" href="css/bootstrap.min.css">
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
					<span class="sr-only">navigation</span>
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
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Kosár tartalma:--> 
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading"><h3>Kosár</h3></div>
					<div class="panel-body" style="background: #7C7C7C !important;">
						<div class="row">
							<div class="col-md-2 col-xs-2"><b>Műveletek</b></div>
							<div class="col-md-2 col-xs-2"><b>Termék ábra</b></div>
							<div class="col-md-2 col-xs-2"><b>Termék név</b></div>
							<div class="col-md-2 col-xs-2"><b>Mennyiség</b></div>
							<div class="col-md-2 col-xs-2"><b>Termék ára</b></div>
							<div class="col-md-2 col-xs-2"><b>Mennyiség összege <?php echo CURRENCY; ?></b></div>
						</div>
						<div id="cart_checkout"></div>
						<br><br>
						</div> 
					</div>
					
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading"><h4 style="text-align: center;">Tisztelt Vásárlóink!</h4></div>
			<div class="panel-body" style="background: #7C7C7C !important;">
				<a class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
				<p style="color: cyan">Ennek a gombnak a segítségével van lehetőség a termék eltávolítására a kosárból!</p><br><br>
				<a class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
				<p style="color: cyan">Ennek a gombnak a segítségével van lehetőség a termék frissítésére! Kérjük, amint egy megrendelni kívánt termék mennyiségén szeretne változtatni, a megrendelendő mennyiség megadása után
				kattintsanak erre a gombra!</p>
			</div>
		</div>
		<br><br><br><br><br><br><br><br><br>
<!--Script a végösszeg megjelenítése-->
<script>var CURRENCY = '<?php echo CURRENCY; ?>';</script>

<div class="container-fluid fixed-bottom pageFooter">
    <div class="row text-center text-uppercase font-weight-bold">
        <?php if(isset($footerData['copyright'])) { ?>&copy;&nbsp;<?= $footerData['copyright'] ?> <?php } ?>
		    &nbsp;
        <?php if(isset($footerData['corpName'])) { ?><?= $footerData['corpName']; ?><?php } ?>
    </div>
</div>	
</body>
</html>
















		