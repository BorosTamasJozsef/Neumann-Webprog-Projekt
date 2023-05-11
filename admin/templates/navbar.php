 <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Blue Gaming Webáruház - Adminisztráció</a>
  
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    	<?php
    		if (isset($_SESSION['admin_id'])) {
    			?>
    				<a class="nav-link" href="../admin/admin-logout.php">Kijelentkezés</a>
    			<?php
    		}else{
    			$uriAr = explode("/", $_SERVER['REQUEST_URI']);
    			$page = end($uriAr);
    			if ($page === "login.php") {
    				?>
	    				<a class="nav-link" href="../admin/register.php">Regisztráció</a>
	    			<?php
    			}else{
    				?>
	    				<a class="nav-link" href="../admin/login.php">Bejelentkezés</a>
	    			<?php
    			}


    			
    		}

    	?>
      
    </li>
  </ul>
</nav>