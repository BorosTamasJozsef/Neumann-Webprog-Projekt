<?php
include "db.php";

session_start();


#A bejelentkezési script itt kezdődik
#If user given credential matches successfully with the data available in database then we will echo string login_success
#Hogyha a felhasználó által megadott igazoló adatok sikeresen egyeznek az adatbázisban található információkkal, akkor a
#login_succes stringet fogjuk kiírni echo-val.
#
#login_success string will go back to called Anonymous funtion $("#login").click() 
if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	$password = md5($_POST["password"]);
	$sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	
	//Hogyha a rekord elérhető az adatbázisban, akkor a $count 1-el lesz egyenlő
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["uid"] = $row["user_id"];
		$_SESSION["name"] = $row["first_name"];
		$ip_add = getenv("REMOTE_ADDR");
		/*A login_form.php oldalon már létrehoztuk egy sütit, amely hogyha aktív, akkor az azt jelenti, hogy a felhasználó
		nincsen bejelentkezve.*/
		
			if (isset($_COOKIE["product_list"])) {
				$p_list = stripcslashes($_COOKIE["product_list"]);
				//a json terméklista dekódolása a sütiből egy normál tömbbé.
				$product_list = json_decode($p_list,true);
				for ($i=0; $i < count($product_list); $i++) { 
					/*Az adatbázisból való felhasználói azonosító lekérése után ellenőrizzük, hogy van-e már termék a listán, vagy sem*/
					$verify_cart = "SELECT id FROM cart WHERE users_id = $_SESSION[uid] AND p_id = ".$product_list[$i];
					$result  = mysqli_query($con,$verify_cart);
					if(mysqli_num_rows($result) < 1){
						//Ha a felhasználó először helyezi be a terméket a kosárba, frissítjük a user_id-t az adatbázistáblában érvényes azonosítóval
						$update_cart = "UPDATE cart SET users_id = '$_SESSION[uid]' WHERE ip_add = '$ip_add' AND users_id = -1";
						mysqli_query($con,$update_cart);
					}else{
						
						//Hogyha az adott termék már elérhető az adatbázis táblában, akkor a rekord törlésre kerül
						$delete_existing_product = "DELETE FROM cart WHERE users_id = -1 AND ip_add = '$ip_add' AND p_id = ".$product_list[$i];
						mysqli_query($con,$delete_existing_product);
					}
				}
				//A felhasználói süti törlése
				setcookie("product_list","",strtotime("-1 day"),"/");
				//Hogyha a felhasználó a kosár oldal után jelentkezik be, akkor a cart_login lesz elküldve
				echo "cart_login";
				exit();
				
			}
			//Hogyha a felhasználó bejelentkezett, akkor a login_success elküldésre kerül.
			echo "login_success";
			exit();
		}else{
			echo "<span style='color:red;'>Kérjük regisztráljon, mielőtt megpróbál bejelentkezni!</span>";
			exit();
		}
	
}

?>