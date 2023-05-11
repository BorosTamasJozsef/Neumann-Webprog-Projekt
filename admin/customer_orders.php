<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Regisztrált Felhasználóink Rendelései</h2>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Rendelési Azon.</th>
              <th>Termék Azon.</th>
              <th>Termék Név</th>
              <th>Mennyiség</th>
              <th>Tranzakció Referencia ID</th>
              <th>Állapot</th>
            </tr>
          </thead>
          <tbody id="customer_order_list">
           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Termék hozzáadása</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Termék neve</label>
		        		<input type="text" name="product_name" class="form-control" placeholder="Adja meg a termék nevét">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Akció</label>
		        		<select class="form-control discount_list" name="discount_id">
		        			<option value="">Válassza ki a kiszabott akciót</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Kategória</label>
		        		<select class="form-control category_list" name="category_id">
		        			<option value="">Válassza ki a kategóriát</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Termékleírás</label>
		        		<textarea class="form-control" name="product_desc" placeholder="Adja meg a termékhez tartozó leírást"></textarea>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Termék ára (HUF)</label>
		        		<input type="number" name="product_price" class="form-control" placeholder="Adja meg a termék árát (HUF)">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Kulcsszavak <small>(pl: elder, scrolls, online)</small></label>
		        		<input type="text" name="product_keywords" class="form-control" placeholder="Adja meg a termékhez tartozó kulcsszavakat!">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Termék ábra <small>(elfogadott formátum: jpg, jpeg, png)</small></label>
		        		<input type="file" name="product_image" class="form-control">
		        	</div>
        		</div>
        		<input type="hidden" name="add_product" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-product">Termék feltöltése</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>