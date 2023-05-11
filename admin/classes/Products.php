<?php 
session_start();

class Products
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getProducts(){
		$q = $this->con->query("SELECT p.product_id, p.product_title, p.product_price,p.product_qty, p.product_desc, p.product_image, p.product_keywords, c.cat_title, c.cat_id, d.discount_id, d.discount_title FROM products p JOIN categories c ON c.cat_id = p.product_cat JOIN discounts d ON d.discount_id = p.product_discount");
		
		$products = [];
		if ($q->num_rows > 0) {
			while($row = $q->fetch_assoc()){
				$products[] = $row;
			}
			//return ['status'=> 202, 'message'=> $ar];
			$_DATA['products'] = $products;
		}

		$categories = [];
		$q = $this->con->query("SELECT * FROM categories");
		if ($q->num_rows > 0) {
			while($row = $q->fetch_assoc()){
				$categories[] = $row;
			}
			//return ['status'=> 202, 'message'=> $ar];
			$_DATA['categories'] = $categories;
		}

		$discounts = [];
		$q = $this->con->query("SELECT * FROM discounts");
		if ($q->num_rows > 0) {
			while($row = $q->fetch_assoc()){
				$discounts[] = $row;
			}
			//return ['status'=> 202, 'message'=> $ar];
			$_DATA['discounts'] = $discounts;
		}


		return ['status'=> 202, 'message'=> $_DATA];
	}

	public function addProduct($product_title,
								$discount_id,
								$category_id,
								$product_desc,
								$product_qty,
								$product_price,
								$product_keywords,
								$file){


		$fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
			
			//print_r($file['size']);

			if ($file['size'] > (1024 * 2)) {
				
				$uniqueImageName = time()."_".$file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/BlueGaming/product_images/".$uniqueImageName)) {
					
					$q = $this->con->query("INSERT INTO `products`(`product_cat`, `product_discount`, `product_title`, `product_qty`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES ('$category_id', '$discount_id', '$product_title', '$product_qty', '$product_price', '$product_desc', '$uniqueImageName', '$product_keywords')");

					if ($q) {
						return ['status'=> 202, 'message'=> 'Termék sikeresen hozzá lett adva a listához!'];
					}else{
						return ['status'=> 303, 'message'=> 'A művelet sikertelen volt!'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'A kép feltöltése sikertelen!'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'A kép mérete túl nagy, maximum 2 MB feltöltése megengedett!'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Érvénytelen képformátum [Érvényes formátumok : jpg, jpeg, png]'];
		}

	}


	public function editProductWithImage($pid,
										$product_title,
										$discount_id,
										$category_id,
										$product_desc,
										$product_qty,
										$product_price,
										$product_keywords,
										$file){


		$fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
			
			//print_r($file['size']);

			if ($file['size'] > (1024 * 2)) {
				
				$uniqueImageName = time()."_".$file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/BlueGaming/product_images/".$uniqueImageName)) {
					
					$q = $this->con->query("UPDATE `products` SET 
										`product_cat` = '$category_id', 
										`product_discount` = '$discount_id', 
										`product_title` = '$product_title', 
										`product_qty` = '$product_qty', 
										`product_price` = '$product_price', 
										`product_desc` = '$product_desc', 
										`product_image` = '$uniqueImageName', 
										`product_keywords` = '$product_keywords'
										WHERE product_id = '$pid'");

					if ($q) {
						return ['status'=> 202, 'message'=> 'A termék sikeresen lett módosítva!'];
					}else{
						return ['status'=> 303, 'message'=> 'A művelet sikertelen volt!'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'A kép feltöltése sikertelen!'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'A kép mérete túl nagy, maximum 2 MB feltöltése megengedett!'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Érvénytelen képformátum [Érvényes formátumok : jpg, jpeg, png]'];
		}

	}

	public function editProductWithoutImage($pid,
										$product_title,
										$discount_id,
										$category_id,
										$product_desc,
										$product_qty,
										$product_price,
										$product_keywords){

		if ($pid != null) {
			$q = $this->con->query("UPDATE `products` SET 
										`product_cat` = '$category_id', 
										`product_discount` = '$discount_id', 
										`product_title` = '$product_title', 
										`product_qty` = '$product_qty', 
										`product_price` = '$product_price', 
										`product_desc` = '$product_desc',
										`product_keywords` = '$product_keywords'
										WHERE product_id = '$pid'");

			if ($q) {
				return ['status'=> 202, 'message'=> 'A termék sikeresen lett módosítva!'];
			}else{
				return ['status'=> 303, 'message'=> 'Művelet sikertelen volt!'];
			}
			
		}else{
			return ['status'=> 303, 'message'=> 'Érvénytelen termék azonosító!'];
		}
		
	}


	public function getDiscounts(){
		$q = $this->con->query("SELECT * FROM discounts");
		$ar = [];
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$ar[] = $row;
			}
		}
		return ['status'=> 202, 'message'=> $ar];
	}

	public function addCategory($name){
		$q = $this->con->query("SELECT * FROM categories WHERE cat_title = '$name' LIMIT 1");
		if ($q->num_rows > 0) {
			return ['status'=> 303, 'message'=> 'Ez a kategória már létezik!'];
		}else{
			$q = $this->con->query("INSERT INTO categories (cat_title) VALUES ('$name')");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Az új kategória sikeresen létrehozva!'];
			}else{
				return ['status'=> 303, 'message'=> 'A művelet során hiba lépett fel!'];
			}
		}
	}

	public function getCategories(){
		$q = $this->con->query("SELECT * FROM categories");
		$ar = [];
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$ar[] = $row;
			}
		}
		return ['status'=> 202, 'message'=> $ar];
	}

	public function deleteProduct($pid = null){
		if ($pid != null) {
			$q = $this->con->query("DELETE FROM products WHERE product_id = '$pid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'A termék eltávolításra került!'];
			}else{
				return ['status'=> 202, 'message'=> 'A művelet során hiba lépett fel!'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Érvénytelen termék azonosító!'];
		}

	}

	public function deleteCategory($cid = null){
		if ($cid != null) {
			$q = $this->con->query("DELETE FROM categories WHERE cat_id = '$cid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'A kategória törölve lett!'];
			}else{
				return ['status'=> 202, 'message'=> 'A művelet során hiba lépett fel!'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Érvénytelen kategória azonosító'];
		}

	}
	
	

	public function updateCategory($post = null){
		extract($post);
		if (!empty($cat_id) && !empty($e_cat_title)) {
			$q = $this->con->query("UPDATE categories SET cat_title = '$e_cat_title' WHERE cat_id = '$cat_id'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Kategória módosítva!'];
			}else{
				return ['status'=> 202, 'message'=> 'A művelet során hiba lépett fel!'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Érvénytelen kategória azonosító!'];
		}

	}

	public function addDiscount($name){
		$q = $this->con->query("SELECT * FROM discounts WHERE discount_title = '$name' LIMIT 1");
		if ($q->num_rows > 0) {
			return ['status'=> 303, 'message'=> 'Ilyen akció már létezik!'];
		}else{
			$q = $this->con->query("INSERT INTO discounts (discount_title) VALUES ('$name')");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Új akció sikeresen felvéve a listára!'];
			}else{
				return ['status'=> 303, 'message'=> 'A művelet során hiba lépett fel!'];
			}
		}
	}

	public function deleteDiscount($did = null){
		if ($did != null) {
			$q = $this->con->query("DELETE FROM discounts WHERE discount_id = '$did'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Akció eltávolítva a listáról!'];
			}else{
				return ['status'=> 202, 'message'=> 'A művelet során hiba lépett fel!'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Érvénytelen akció azonosító!'];
		}

	}
	
	

	public function updateDiscount($post = null){
		extract($post);
		if (!empty($discount_id) && !empty($e_discount_title)) {
			$q = $this->con->query("UPDATE discounts SET discount_title = '$e_discount_title' WHERE discount_id = '$discount_id'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Akció módosítva!'];
			}else{
				return ['status'=> 202, 'message'=> 'A művelet során hiba lépett fel!'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Érvénytelen akció azonosító!'];
		}

	}

	

}


if (isset($_POST['GET_PRODUCT'])) {
	if (isset($_SESSION['admin_id'])) {
		$p = new Products();
		echo json_encode($p->getProducts());
		exit();
	}
}


if (isset($_POST['add_product'])) {

	extract($_POST);
	if (!empty($product_title) 
	&& !empty($discount_id) 
	&& !empty($category_id)
	&& !empty($product_desc)
	&& !empty($product_qty)
	&& !empty($product_price)
	&& !empty($product_keywords)
	&& !empty($_FILES['product_image']['name'])) {
		

		$p = new Products();
		$result = $p->addProduct($product_title,
								$discount_id,
								$category_id,
								$product_desc,
								$product_qty,
								$product_price,
								$product_keywords,
								$_FILES['product_image']);
		
		header("Content-type: application/json");
		echo json_encode($result);
		http_response_code($result['status']);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Minden mező kitöltése kötelező!']);
		exit();
	}



	
}


if (isset($_POST['edit_product'])) {

	extract($_POST);
	if (!empty($pid)
	&& !empty($e_product_title) 
	&& !empty($e_discount_id) 
	&& !empty($e_category_id)
	&& !empty($e_product_desc)
	&& !empty($e_product_qty)
	&& !empty($e_product_price)
	&& !empty($e_product_keywords) ) {
		
		$p = new Products();

		if (isset($_FILES['e_product_image']['name']) 
			&& !empty($_FILES['e_product_image']['name'])) {
			$result = $p->editProductWithImage($pid,
								$e_product_title,
								$e_discount_id,
								$e_category_id,
								$e_product_desc,
								$e_product_qty,
								$e_product_price,
								$e_product_keywords,
								$_FILES['e_product_image']);
		}else{
			$result = $p->editProductWithoutImage($pid,
								$e_product_title,
								$e_discount_id,
								$e_category_id,
								$e_product_desc,
								$e_product_qty,
								$e_product_price,
								$e_product_keywords);
		}

		echo json_encode($result);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Minden mező kitöltése kötelező!']);
		exit();
	}



	
}

if (isset($_POST['GET_DISCOUNT'])) {
	$p = new Products();
	echo json_encode($p->getDiscounts());
	exit();
	
}

if (isset($_POST['add_category'])) {
	if (isset($_SESSION['admin_id'])) {
		$cat_title = $_POST['cat_title'];
		if (!empty($cat_title)) {
			$p = new Products();
			echo json_encode($p->addCategory($cat_title));
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Minden mező kitöltése kötelező!']);
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Hiba történt!']);
	}
}

if (isset($_POST['GET_CATEGORIES'])) {
	$p = new Products();
	echo json_encode($p->getCategories());
	exit();
	
}

if (isset($_POST['DELETE_PRODUCT'])) {
	$p = new Products();
	if (isset($_SESSION['admin_id'])) {
		if(!empty($_POST['pid'])){
			$pid = $_POST['pid'];
			echo json_encode($p->deleteProduct($pid));
			exit();
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Érvénytelen termék azonosító!']);
			exit();
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Hiba történt!']);
	}


}


if (isset($_POST['DELETE_CATEGORY'])) {
	if (!empty($_POST['cid'])) {
		$p = new Products();
		echo json_encode($p->deleteCategory($_POST['cid']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Hiba történt!']);
		exit();
	}
}

if (isset($_POST['edit_category'])) {
	if (!empty($_POST['cat_id'])) {
		$p = new Products();
		echo json_encode($p->updateCategory($_POST));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Hiba történt!']);
		exit();
	}
}

if (isset($_POST['add_discount'])) {
	if (isset($_SESSION['admin_id'])) {
		$discount_title = $_POST['discount_title'];
		if (!empty($discount_title)) {
			$p = new Products();
			echo json_encode($p->addDiscount($discount_title));
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Minden mező kitöltése kötelező!']);
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Hiba történt!']);
	}
}

if (isset($_POST['DELETE_DISCOUNT'])) {
	if (!empty($_POST['did'])) {
		$p = new Products();
		echo json_encode($p->deleteDiscount($_POST['did']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Hiba történt!']);
		exit();
	}
}

if (isset($_POST['edit_discount'])) {
	if (!empty($_POST['discount_id'])) {
		$p = new Products();
		echo json_encode($p->updateDiscount($_POST));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Hiba történt!']);
		exit();
	}
}

?>