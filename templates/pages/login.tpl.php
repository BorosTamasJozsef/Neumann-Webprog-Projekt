<?php
#Ez a bejelentkezési űrlap oldala, mely NEM fog megjelenni azoknak a felhasználóknak, akik már bejelentkeztek (elérését a isset($_SESSION["uid"]
#lefuttatásával akadályozzuk meg).
#Hogyha az alábbi állítás igaz értéket ad vissza, akkor a felhasználó a profile.php oldalra lesz átirányítva!

if (isset($_SESSION["uid"])) {
	header("location:myProfile.php");
}
//Az action.php-ban, hogyha a felhasználó rákattint a "Tovább a fizetéshez" gombra, akkor egy űrlapba fogunk adatokat átküldeni az action.php oldalról.

if (isset($_POST["login_user_with_product"])) {
	//A terméklista tömb:
	$product_list = $_POST["product_id"];
	//A tömb átkonvertálása json formátumba, mivel a tömböt nem lehetséges (nekünk nem sikerült legalábbis) sütiben tárolni.
	$json_e = json_encode($product_list);
	//Süti létrehozása, annak nevének megadása (product_list)
	setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);

}
?>
<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Értesítés a regisztrációs űrlapból-->
			</div>
			<div class="col-md-2"></div>
		</div>
<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Bejelentkezés</div>
					<div class="panel-body mypanelcolor">
						<!--Felhasználói bejelentkezési űrlap-->
						<form onsubmit="return false" id="login">
							<label style="color: blue" for="email">Email</label>
							<input type="email" class="form-control" name="email" id="email" required/><br>
							<label style="color: blue" for="email">Jelszó</label>
							<input type="password" class="form-control" name="password" id="password" required/>
							<p><br/></p>
							<input type="submit" class="btn btn-info btn-lg inputStyle" Value="Bejelentkezés"><br><br>
							
							<!--Hogyha a felhasználó nem rendelkezik fiókkal, akkor itt lehetősége lesz kreálni egyet-->
							<div><a id="loginNewAcc" href="index.php?pages=registration">Új felhasználói fiók létrehozása</a></div>						
						</form>
				</div>
				
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>