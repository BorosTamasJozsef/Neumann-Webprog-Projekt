<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">

          <?php 


            $uri = $_SERVER['REQUEST_URI']; 
            $uriAr = explode("/", $uri);
            $page = end($uriAr);

          ?>


          <li class="nav-item">
            <a class="nav-link <?php echo ($page == '' || $page == 'index.php') ? 'active' : ''; ?>" href="index.php">
              <span data-feather="home"></span>
              Irányítópult <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'customer_orders.php') ? 'active' : ''; ?>" href="customer_orders.php">
              <span data-feather="file"></span>
              Rendelések
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'products.php') ? 'active' : ''; ?>" href="products.php">
              <span data-feather="shopping-cart"></span>
              Termékek
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'discounts.php') ? 'active' : ''; ?>" href="discounts.php">
              <span data-feather="shopping-cart"></span>
              Akciók
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'categories.php') ? 'active' : ''; ?>" href="categories.php">
              <span data-feather="shopping-cart"></span>
              Kategóriák
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'customers.php') ? 'active' : ''; ?>" href="customers.php">
              <span data-feather="users"></span>
              Felhasználók
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'messages.php') ? 'active' : ''; ?>" href="messages.php">
              <span data-feather="file"></span>
              Beérkező Üzenetek
            </a>
          </li>
        </ul>

       
      </div>
    </nav>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Üdv, <?php echo $_SESSION["admin_name"]; ?></h1>
       
        
      </div>