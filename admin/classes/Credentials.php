<?php 
session_start();

class Credentials
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	//Adminisztrátori fiók létrehozása:
	public function createAdminAccount($name_admin, $email_admin, $password_admin){
		$q = $this->con->query("SELECT email_admin FROM admin WHERE email_admin = '$email_admin'");
		if ($q->num_rows > 0) {
			return ['status'=> 303, 'message'=> 'Ezzel az email címmel már létezik adminisztrátori fiók!'];
		}else{
			$password_admin = password_hash($password_admin, PASSWORD_BCRYPT, ["COST"=> 8]);
			$q = $this->con->query("INSERT INTO `admin`(`name_admin`, `email_admin`, `password_admin`, `is_active`) VALUES ('$name_admin','$email_admin','$password_admin','0')");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Adminisztrátori fiók sikeresen létrehozva!'];
			}

		}
	}
	//Adminisztrátori bejelentkezés:
	public function loginAdmin($email_admin, $password_admin){
		$q = $this->con->query("SELECT * FROM admin WHERE email_admin = '$email_admin' LIMIT 1");
		if ($q->num_rows > 0) {
			$row = $q->fetch_assoc();
			if (password_verify($password_admin, $row['password_admin'])) {
				$_SESSION['admin_name'] = $row['name_admin'];
				$_SESSION['admin_id'] = $row['id_admin'];
				return ['status'=> 202, 'message'=> 'Sikeres Bejelentkezés'];
			}else{
				return ['status'=> 303, 'message'=> 'Sikertelen Bejelentkezés'];
			}
		}else{
			return ['status'=> 303, 'message'=> 'Nem létező adminisztrátori fiók!'];
		}
	}

}



//Regisztrációs folyamat ellenőrzése:
if (isset($_POST['admin_register'])) {
	extract($_POST);
	if (!empty($name_admin) && !empty($email_admin) && !empty($password_admin) && !empty($cpassword_admin)) {
		if ($password_admin == $cpassword_admin) {
			$c = new Credentials();
			$result = $c->createAdminAccount($name_admin, $email_admin, $password_admin);
			echo json_encode($result);
			exit();
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Jelszavak nem egyeznek!']);
			exit();
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Minden mező kitöltése kötelező!']);
		exit();
	}
}

if (isset($_POST['admin_login'])) {
	extract($_POST);
	if (!empty($email_admin) && !empty($password_admin)) {
		$c = new Credentials();
		$result = $c->loginAdmin($email_admin, $password_admin);
		echo json_encode($result);
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Minden mező kitöltése kötelező!']);
		exit();
	}
}


?>