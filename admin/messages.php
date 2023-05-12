<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Beérkező üzenetek</h2>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Keresztnév</th>
              <th>Vezetéknév</th>
              <th>E-mail cím</th>
              <th>Üzenet tartalma</th>
            </tr>
          </thead>
          <tbody id="message_list">
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>