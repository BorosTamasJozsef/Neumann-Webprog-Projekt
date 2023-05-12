<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
//Kategóriák megjelenítése a bal oldalon elhelyezett tárolóban:
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav flex-column nav-pills nav-stacked'>
			<li class='active'><a style='background: blueviolet;' href='#'><h4>Kategóriák</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a style='color: cyan;' href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
//Akciók megjelenítése a bal oldalon elhelyezett tárolóban:
if(isset($_POST["discount"])){
	$discount_query = "SELECT * FROM discounts";
	$run_query = mysqli_query($con,$discount_query);
	echo "
		<div class='nav flex-column nav-pills nav-stacked'>
			<li class='active'><a  style='background: blueviolet;' href='#'><h4>Ajánlataink</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$did = $row["discount_id"];
			$discount_name = $row["discount_title"];
			echo "
					<li><a style='color: cyan;' href='#' class='selectDiscount' did='$did'>$discount_name</a></li>
			";
		}
		echo "</div>";
	}
}
//Oldalak
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	//NEM bejelentkezett felhasználó esetén lefut:
	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_discount = $row['product_discount'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-primary'>
								<div class='panel-heading panel-height'>$pro_title</div>
								<div class='panel-body panel-img' style='background: #252525 !important;'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>".CURRENCY." $pro_price
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-info btn-xs'>Kosárba helyez</button>
								</div>
							</div>
						</div>	
			";
		}
	}
}
//Bejelentkezett felhasználó esetén lefut:
if(isset($_POST["get_selected_Category"]) || isset($_POST["selectDiscount"]) || isset($_POST["search"])){
	if(isset($_POST["get_selected_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}else if(isset($_POST["selectDiscount"])){
		$id = $_POST["discount_id"];
		$sql = "SELECT * FROM products WHERE product_discount = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_discount = $row['product_discount'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-primary'>
								<div class='panel-heading panel-height'>$pro_title</div>
								<div class='panel-body panel-img' style='background: #252525 !important;'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>HUF $pro_price
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-info btn-xs'>Kosárba helyez</button>
								</div>
							</div>
						</div>	
			";
		}
	}
	

	//Termék hozzáadása a kosárhoz:
	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND users_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		//Hogyha a felhasználó bejelentkezett (user ID):
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>A terméket már hozzáadta a kosárhoz!</b>
				</div>
			";
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `users_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>A termék hozzáadásra került!</b>
					</div>
				";
			}
		}
		}
		
		
		
		
		
	}

//A felhasználói kosár elemeinek megszámolása:
if (isset($_POST["count_item"])) {
	//Amikor a felhasználó be van jelentkezve, akkor a felhasználói ID alkalmazásával fogjuk megszámolni a kosár elemeinek számát:
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE users_id = $_SESSION[uid]";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//A VÉGE a felhasználói kosár elemeinek megszámolásának

//Kosár elemeinek lekérése:
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.users_id='$_SESSION[uid]'";
	}else{
		
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.users_id < 0";
	}
	$query = mysqli_query($con,$sql);
	
	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			
			//Felhasználói kosár megjelenítése a "Tovább a fizetéshez" gombbal:
			//-------------VALSZEG SZERKESZTÉS
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						'<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$product_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="product_images/'.$product_image.'"></div>
								<div class="col-md-2">'.$product_title.'</div>
								<div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
							</div>';
				}
				
				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
				
					
				if(isset($_SESSION["uid"])){
					//Fizetés:
					echo '
						</form>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="shoppingcart@bluegaming.com">
							<input type="hidden" name="upload" value="1">'; //Paypal meghívása fizetéskor (külön fizetési oldal helyett). A fizetés nem lehetséges természetesen.
							  
							$x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.users_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo  	
									'<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
								}
							  
							echo   
								'
									<input style="float:right;margin-right:80px;" type="submit" name="submit"
									value="Tovább a fizetéshez" class="btn btn-warning btn-lg">
									
								</form>';
				}
			}
	}
	
	
}

//Termék eltávolítása a kosárból:
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND users_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>A termék el lett távolítva!</b>
				</div>";
		exit();
	}
}


//Termék frissítése a kosárban:
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND users_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>A termék frissítve!</b>
				</div>";
		exit();
	}
}




?>






