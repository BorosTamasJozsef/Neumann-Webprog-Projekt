<?php
require "config/constants.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:myProfile.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Best Price Penguin - Pénztár</title>

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
		<link rel="stylesheet" type="text/css" href="CheckOutStyle.css">
		<!--Kártyákhoz-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
		</style>
		<link rel="stylesheet" type="text/css" href="style2.css">
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top navbar-expand">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Best Price Penguin</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="indexLogged.php"><span class="glyphicon glyphicon-home"></span>Főoldal</a></li>
				<li><a href="productpage.php"><span class="glyphicon glyphicon-modal-window"></span>Termékek</a></li>
				<li><a href="contactLogged.php"><span class="glyphicon glyphicon-envelope"></span>Kapcsolat</a></li>
				<li><a href="demand_productLogged.php"><span class="glyphicon glyphicon-flag"></span>Termékigénylés</a></li>
				
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
	<h1 style="color: orange; text-align: center;">Pénztár</h1>
<div class="row">
  <div class="col-75">
    <div class="container">
	  <form action="payment_success.php" method="post">
		
      
        <div class="row">
          <div class="col-50">
            <h3>Számlázási adatok</h3>
            <label for="fname"><i class="fa fa-user"></i> Teljes név</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email cím</label>
            <input type="text" id="email" name="email" placeholder="uwuowo@gmail.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Szállítási cím</label>
            <input type="text" id="adr" name="address" placeholder="Petőfi Sándor u. 10.">
            <label for="city"><i class="fa fa-institution"></i> Város</label>
            <input type="text" id="city" name="city" placeholder="Simontornya">

            <div class="row">
              <div class="col-50">
                <label for="state">Megye</label>
                <input type="text" id="state" name="state" placeholder="Tolna">
              </div>
              <div class="col-50">
                <label for="zip">Irányítószám</label>
                <input type="text" id="zip" name="zip" placeholder="7081">
              </div>
			</div>
          </div>

          <div class="col-50">
            <h3>Fizetési mód</h3>
            <label for="fname">Elfogadott kártyák</label>
            <div class="icon-container rounded-top">
              <i class="fa fa-cc-visa" style="color:navy;" title="Visa"></i>
			
              <i class="fa fa-cc-mastercard" style="color:red;" title="Mastercard"></i>
              
            </div>
            <label for="cname">Kártyán szereplő név</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Kártyaszám</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Lejárati dátum</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Lejárati év</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
		  <div class="row">
          <div class="col-50">
			<h3>Szállítási adatok</h3>
			<h4>Amennyiben a számlázási és szállítási adatok megegyeznek, kérjük az alábbi mezők üresen hagyását!</h4>
            <label for="fnameNotSame"><i class="fa fa-user"></i> Teljes név</label>
            <input type="text" id="fnameNotSame" name="firstnameNotSame" placeholder="John M. Doe">
            <label for="emailNotSame"><i class="fa fa-envelope"></i> Email cím</label>
            <input type="text" id="emailNotSame" name="emailNotSame" placeholder="uwuowo@gmail.com">
            <label for="adrNotSame"><i class="fa fa-address-card-o"></i> Szállítási cím</label>
            <input type="text" id="adrNotSame" name="addressNotSame" placeholder="Petőfi Sándor u. 10.">
            <label for="cityNotSame"><i class="fa fa-institution"></i> Város</label>
            <input type="text" id="cityNotSame" name="cityNotSame" placeholder="Simontornya">

            <div class="row">
              <div class="col-50">
                <label for="stateNotSame">Megye</label>
                <input type="text" id="stateNotSame" name="stateNotSame" placeholder="Tolna">
              </div>
              <div class="col-50">
                <label for="zipNotSame">Irányítószám</label>
                <input type="text" id="zipNotSame" name="zipNotSame" placeholder="7081">

				<fieldset class="question">
			<label for="coupon_question">Rendelkezik kuponnal?</label>
			</fieldset>

			<fieldset class="answer">
				<label for="coupon_field">Ide írja a kuponkódot (pl: K10MAJ)</label>
				<input type="text" name="coupon_field" id="coupon_field" />
			</fieldset>
		
        	<input type="submit" value="Rendelés leadása" class="pay">
			</form>
	  		<form action="cart.php">
				<input style="width:100%;" value="Rendelés szerkesztése" type="submit" name="ticket_button"class="btn btn-warning btn-lg btn-block">
			</form>
              </div>
			
			  
            </div>
          </div>
        </div>
		
	  
	</div>
	
  
	
  
</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
</body>
<div class="container-fluid fixed-bottom pageFooter">
	<div class="row text-center text-uppercase font-weight-bold">
		<div class="col">
			A Best Price Penguinről
		</div>
		<div class="col">
			Közösség
		</div>
		<div class="col">
			Hogyan történik?
		</div>
	</div>
	<br><br>
	<div class="row text-center py-2">
		<div class="col">
			<a style="text-decoration: none; color: gray;" href="contactLogged.php">Kapcsolat</a>
		</div>
		<div class="col">
			<a style="text-decoration: none; color: gray;" href="BlogLogged.php">Blog</a>
		</div>
		<div class="col">
			<a style="text-decoration: none; color: gray;" href="HowtoPurchase.php">Vásárlás</a>
		</div>
	</div>

	<div class="row text-center py-2">
		<div class="col">
			<a style="text-decoration: none; color: gray;" href="OurStoryLogged.php">Történetünk</a>
		</div>
		<div class="col">
			<a style="text-decoration: none; color: gray;" href="Gift.php">Ajándéksorsolás</a>
		</div>
		<div class="col">
			<a style="text-decoration: none; color: gray;" href="HowtoDemandLogged.php">Termékigénylés</a>
		</div>
	</div>

	<div class="row text-center py-2">
		<div class="col">
			<a style="text-decoration: none; color: gray;" href="careerLogged.php">Karrier</a>
		</div>
		<div class="col">
			<a style="text-decoration: none; color: gray;" href="Package.php">Csomagösszeállítás</a>
		</div>
		<div class="col">
			<a style="text-decoration: none; color: gray;" href="SellUrOwnPLogged.php">Eladás az oldalon</a>
		</div>
	</div>
</div>

</html>
















































