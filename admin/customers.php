<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Regisztrált Felhasználók Listája</h2>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Név</th>
              <th>Email cím</th>
              <th>Telefonszám</th>
              <th>Cím</th>
            </tr>
          </thead>
          <tbody id="customer_list">
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>