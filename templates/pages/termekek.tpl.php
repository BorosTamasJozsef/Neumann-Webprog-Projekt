<?php
if(isset($_POST[""])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	//NEM bejelentkezett felhasználó esetén lefut:
	$product_query = "SELECT * FROM termekek LIMIT $start,$limit";
	$run_query = mysqli_query($connection,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$term_id    = $row['termek_id'];
			$term_kat   = $row['termek_kategoria'];
			$term_nev = $row['termek_neve'];
			$term_ar = $row['termek_ar'];
			$term_kep = $row['termek_illusztracio'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-primary'>
								<div class='panel-heading panel-height'>$term_nev</div>
								<div class='panel-body panel-img' style='background: #26394C !important;'>
									<img src='images/$term_kep' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>".CURRENCY." $pro_price
									<button pid='$term_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Kosárba helyez</button>
								</div>
							</div>
						</div>	
			";
		}
	}
}





?><!-- A termékek oldalra az adatbázisból fogjuk kinyerni az információkat.
    Amire szükség lesz: termék neve, termék illusztrációja, termék ára
    Minden termék rendelkezni fog egy külön "kártyával", amelyen elhelyezünk egy
    gombot, amive la kosárba helyezheti a felhasználó a terméket.-->

    <div class="col-md-8 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-xs-12" id="termek_tarolo">
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Termék kínálatunk</div>
            <div class="panel-body panel-img" style="background: #26394C !important;">
                <div id="termek_leker">
                    <!-- A termékek itt kerülnek elhelyezésre -->
                </div>
            </div>
        </div>
    </div>
<script src="/js/main.js" type="text/javascript"></script>
            