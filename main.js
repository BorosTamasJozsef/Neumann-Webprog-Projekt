$(document).ready(function(){
	cat();
	discount();
	product();
	//A cat() egy függvény, amely összegyűjti a kategória rekordokat az adatbázisból, amikor az oldal betölt

	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
				
			}
		})
	}
	//A discount() egy függvény, amely összegyűjti az akció rekordokat az adatbázisból, amikor az oldal betölt
	
	function discount(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{discount:1},
			success	:	function(data){
				$("#get_discount").html(data);
			}
		})
	}
	//A product() egy függvény, amely összegyűjti a termék rekordokat az adatbázisból, amikor az oldal betölt
	
		function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	}
	/*
		Amikor az oldal sikeresen betöltődött, akkor a kategória listában, hogyha a felhasználó rákattint az egyik kategóriára
		(pl. Sport), akkor a kategória azonosítóját használva megjelenítjük azokat a termékeket, melyek megfelelnek
		a besorolásnak.
	*/
	$("body").delegate(".category","click",function(event){
		$("#get_product").html("<h3>Töltés...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_selected_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})

	/*	
		Amikor az oldal sikeresen betöltődött, akkor az akció listában, hogyha a felhasználó rákattint az egyik akcióra
		(pl. 80%-os akció), akkor az akció azonosítóját használva megjelenítjük azokat a termékeket, melyek megfelelnek
		a besorolásnak.
	*/
	$("body").delegate(".selectDiscount","click",function(event){
		$("#get_product").html("<h3>Töltés...</h3>");
		event.preventDefault();
		var did = $(this).attr('did');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectDiscount:1,discount_id:did},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})
	/*
		Az oldal tetején található egy keresődoboz, mely egy kereső gombbal van ellátva. Ebbe a keresődobozva a felhasználó
		megadhatja az adott termék nevét, amit követően a felhasználó által adott string és sql lekérdezés segítségével
		összehasonlítjuk a keresett termék nevet az adatbázisban található nevekkel. Hogyha van egyezés, akkor a keresett termék
		megjelenítésre kerül az oldalon.
	*/
	$("#search_btn").click(function(){
		$("#get_product").html("<h3>Töltés...</h3>");
		var keyword = $("#search").val();
		if(keyword != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{search:1,keyword:keyword},
			success	:	function(data){ 
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
		}
	})
	//end


	/*
		Itt a #login a login form id és ez a form (űrlap) elérhető az index.php oldalon
		Innen a bevitt adatok elküldésre kerülnek a login.php oldalra.
		Login_success string esetében (melyet a login.php oldalról kapunk) a felhasználó sikeresen bejelentkezett és a
		window.location átirányítja majd őt a profile.php oldalra.
	*/
	//SZERKESZTÉS LESZ
	$("#login").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url	:	"login.php",
			method:	"POST",
			data	:$("#login").serialize(),
			success	:function(data){
				if(data == "login_success"){
					window.location.href = "indexLogged.php?pages=products"; //??????
				}else if(data == "cart_login"){
					window.location.href = "cart.php";
				}else{
					$("#e_msg").html(data);
					$(".overlay").hide();
				}
			}
		})
	})
	//end

	//Felhasználói információk lekérése pénztár előtt
	$("#signup_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "register.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "cart.php";
				}else{
					$("#signup_msg").html(data);
				}
				
			}
		})
	})
	//Felhasználói információk lekérése pénztár előtt vége
	

	//Termék hozzáadása a kosárhoz
	$("body").delegate("#product","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart:1,proId:pid},
			success : function(data){
				count_item();
				getCartItem();
				$('#product_msg').html(data);
				$('.overlay').hide();
			}
		})
	})
	//Termék hozzáadása a kosárhoz vége

	//A felhasználói kosár elemek megszámolása
	count_item();
	function count_item(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {count_item:1},
			success : function(data){
				$(".badge").html(data);
			}
		})
	}
	//A felhasználói kosár elemek megszámolásának vége

	//Kosár elem kigyűjtése az adatbázisból a legördülő menübe
	getCartItem();
	function getCartItem(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,getCartItem:1},
			success : function(data){
				$("#cart_product").html(data);
			}
		})
	}


	/*
		Amikor a felhasználó módosítja a mennyiséget, azonnal frissítjük a teljes összeget a keyup funkció használatával
		de amikor a felhasználó a számon kívül valami mást (például ?''"",.()''stb) ad meg, akkor qty=1
		Ha a felhasználó qty 0-t vagy 0-nál kisebb értéket ad meg, akkor ismét 1 qty=1 lesz.

		('.total').each() ez a ciklus függvény ismétlése a .total osztályhoz, és minden ismétlésnél végrehajtjuk 
		a .total value osztály összegző műveletét majd megjelenítjük az eredményt a .net_total osztályban.
	*/
	$("body").delegate(".qty","keyup",function(event){
		event.preventDefault();
		var row = $(this).parent().parent();
		var price = row.find('.price').val();
		var qty = row.find('.qty').val();
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		row.find('.total').val(total);
		var net_total=0;
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : HUF " +net_total);

	})
	//mennyiség megváltoztatás vége

	/*
		Amikor a felhasználó "rákattint a .remove osztályra", akkor annak a sornak a termék azonosítóját
		elküldjük az action.php-nak, hogy egy termék eltávolítási operációt hajtson végre.
	*/
	$("body").delegate(".remove","click",function(event){
		var remove = $(this).parent().parent().parent();
		var remove_id = remove.find(".remove").attr("remove_id");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{removeItemFromCart:1,rid:remove_id},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})
	})
	/*
		Amikor a felhasználó rákattint az .update osztályra, akkor annak a sornak a termék azonosítóját
		elküldjük az action.php-nak, hogy egy termékmennyiség (qty) frissítést hajtson végre.
	*/
	$("body").delegate(".update","click",function(event){
		var update = $(this).parent().parent().parent();
		var update_id = update.find(".update").attr("update_id");
		var qty = update.find(".qty").val();
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{updateCartItem:1,update_id:update_id,qty:qty},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})


	})
	checkOutDetails();
	net_total();
	/*
		chechOutDetails() függvény két célt szolgál:
		Először is, engedélyezi a php isset($_POST["Common"])-ot az action.php-n és azon belül
		két isset függvényt is, amelyek az isset($_POST["getCartItem"]) és az isset($_POST["checkOutDetails"]).
		
		
	*/
	function checkOutDetails(){
	 $('.overlay').show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,checkOutDetails:1},
			success : function(data){
				$('.overlay').hide();
				$("#cart_checkout").html(data);
					net_total();
			}
		})
	}

	/*
		A net_total függvényt arra alkalmazzuk, hogy kiszámítsuk a kosár teljes értékét
		
	*/
	function net_total(){
		var net_total = 0;
		$('.qty').each(function(){
			var row = $(this).parent().parent();
			var price  = row.find('.price').val();
			var total = price * $(this).val()-0;
			row.find('.total').val(total);
		})
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Végösszeg : "+ CURRENCY+ " " +net_total);
	}

	//termék eltávolítása a kosárból

	page();
	function page(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{page:1},
			success	:	function(data){
				$("#pageno").html(data);
			}
		})
	}
	$("body").delegate("#page","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getProduct:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	})
})




















