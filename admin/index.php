<?php 
session_start();  
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}

include "./templates/top.php"; 

?>
 
<?php include "./templates/navbar.php"; ?>

<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      

      <h2>Adminisztrátoraink</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Név</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody id="admin_list">
            <tr>
              <td>azonosító</td>
              <td>teljes név</td>
              <td>email cím</td>
              <td>online / offline</td>
              <td>törlés</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/admin.js"></script>
