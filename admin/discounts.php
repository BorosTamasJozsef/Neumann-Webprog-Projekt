<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>


      <div class="row">
      	<div class="col-10">
      		<h2>Akciók Kezelése</h2>
      	</div>
      	<div class="col-2">
      		<a href="#" data-toggle="modal" data-target="#add_discount_modal" class="btn btn-primary btn-sm">Akció Hozzáadása</a>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Akció</th>
              <th>Műveletek</th>
            </tr>
          </thead>
          <tbody id="discount_list">
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add_discount_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Új Akció Felvétele</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-discount-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Százalék</label>
		        		<input type="text" name="discount_title" class="form-control" placeholder="Adja meg az akciót %-ban!">
		        	</div>
        		</div>
        		<input type="hidden" name="add_discount" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-discount">Akció Felvétele</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Szerkesztéshez -->
<div class="modal fade" id="edit_discount_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Akció Szerkesztése</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-discount-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="discount_id">
              <div class="form-group">
                <label>Százalék</label>
                <input type="text" name="e_discount_title" class="form-control" placeholder="Adja meg az akciót %-ban!">
              </div>
            </div>
            <input type="hidden" name="edit_discount" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary edit-discount-btn">Akció Frissítése</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/discounts.js"></script>