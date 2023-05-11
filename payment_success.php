<?php
require "config/constants.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:myProfile.php");
}

if (isset($_GET["st"])) {

	
	$trx_id = $_GET["tx"];
		$p_st = $_GET["st"];
		$amt = $_GET["amt"];
		$cc = $_GET["cc"];
		$cm_users_id = $_GET["cm"];
		$c_amt = $_COOKIE["ta"];
	if ($p_st == "Completed") {

		

		include_once("db.php");
		$sql = "SELECT p_id,qty FROM cart WHERE users_id = '$cm_users_id'";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			
			while ($row=mysqli_fetch_array($query)) {
			$product_id[] = $row["p_id"];
			$qty[] = $row["qty"];
			}

			for ($i=0; $i < count($product_id); $i++) { 
				$sql = "INSERT INTO orders (id_users,product_id,qty,trx_id,p_status) VALUES ('$cm_users_id','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st')";
				mysqli_query($con,$sql);
			}

			$sql = "DELETE * FROM cart WHERE users_id = '$cm_users_id'";
			if (mysqli_query($con,$sql)) {
				?>
					<!DOCTYPE html>
					<html>
						<head>
							<meta charset="UTF-8">
							<title>Best Price Penguin - Sikeres fizetés</title>
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
							
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						<div class="navbar navbar-inverse navbar-fixed-top">
							<div class="container-fluid">	
								<div class="navbar-header">
									<a href="#" class="navbar-brand">Best Price Penguin</a>
								</div>
								<ul class="nav navbar-nav">
									<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Főoldal</a></li>
									<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Termékek</a></li>
								</ul>
							</div>
						</div>
						<p><br/></p>
						<p><br/></p>
						<p><br/></p>
						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Köszönjük, hogy nálunk vásárolt! </h1>
											<hr/>
											<p><?php echo "<b>".$_SESSION["name"]."</b>"; ?>! A vásárlása sikeresen
											befejeződött, a tranzakció azonosítója: <b><?php echo $trx_id; ?></b><br/>
											
											Folytathatja a vásárlást! <br/></p>
											<a href="indexLogged.php" class="btn btn-success btn-lg">Folytatom a vásárlást</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php
			}
		}else{
			header("location:indexLogged.php");
		}
		
	}
}



?>

















































