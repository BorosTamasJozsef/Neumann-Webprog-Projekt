<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Termékek Listája</h2>
      	</div>
      	<div class="col-2">
      		<a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Termék Felvétele</a>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Termék Neve</th>
              <th>Illusztráció</th>
              <th>Ár HUF</th>
              <th>Mennyiség Raktáron</th>
              <th>Kategória</th>
              <th>Akció</th>
              <th>Műveletek</th>
            </tr>
          </thead>
          <tbody id="product_list">
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- Termék felvétele Modal start -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Termék felvétele</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Termék Neve</label>
		        		<input type="text" name="product_title" class="form-control" placeholder="Ide írja a termék nevét!">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Kiszabott Akció</label>
		        		<select class="form-control discount_list" name="discount_id">
		        			<option value="">Válassz ki akciót</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Kategória</label>
		        		<select class="form-control category_list" name="category_id">
		        			<option value="">Válassz ki egy kategóriát</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Termék Leírása</label>
		        		<textarea class="form-control" name="product_desc" placeholder="Ide írja a leírást!"></textarea>
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Raktáron Lévő Mennyiség</label>
                <input type="number" name="product_qty" class="form-control" placeholder="Ide írja hány darab van raktáron (vagy használja a csúszkát)!">
              </div>
            </div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Termék Ár (HUF)</label>
		        		<input type="number" name="product_price" class="form-control" placeholder="Ide írja a termék árat (vagy használja a csúszkát)!">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Kulcsszavak <small>(pl: elder, scrolls, online)</small></label>
		        		<input type="text" name="product_keywords" class="form-control" placeholder="Adja meg a kulcsszavakat (termék neve felbontva)!">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Kép a termékhez <small>(formátum: jpg, jpeg, png)</small></label>
		        		<input type="file" name="product_image" class="form-control">
		        	</div>
        		</div>
        		<input type="hidden" name="add_product" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-product">Termék Feltöltése</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Termék felvétele Modal end -->

<!-- Termék szerkesztése Modal start -->
<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Termék Frissítése</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-product-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Termék Neve</label>
                <input type="text" name="e_product_title" class="form-control" placeholder="Adja meg a termék teljes nevét! (kiadás nevét lehet rövidíteni)">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Kiszabott Akció</label>
                <select class="form-control discount_list" name="e_discount_id">
                  <option value="">Válassz ki akciót</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Kategória</label>
                <select class="form-control category_list" name="e_category_id">
                  <option value="">Válasszon ki kategóriát</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Termék leírása</label>
                <textarea class="form-control" name="e_product_desc" placeholder="Ide írja a leírást!"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Raktáron Lévő Mennyiség</label>
                <input type="number" name="e_product_qty" class="form-control" placeholder="Ide írja hány darab van raktáron (vagy használja a csúszkát)!">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Termék Ár (HUF)</label>
                <input type="number" name="e_product_price" class="form-control" placeholder="Ide írja a termék árat (vagy használja a csúszkát)!">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Kulcsszavak <small>(pl: elder, scrolls, online)</small></label>
                <input type="text" name="e_product_keywords" class="form-control" placeholder="Adja meg a kulcsszavakat (termék neve felbontva)!">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Kép a termékhez <small>(formátum: jpg, jpeg, png)</small></label>
                <input type="file" name="e_product_image" class="form-control">
                <img src="../product_images/1.0x0.jpg" class="img-fluid" width="50">
              </div>
            </div>
            <input type="hidden" name="pid">
            <input type="hidden" name="edit_product" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary submit-edit-product">Termék Frissítése</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Termék szerkesztése Modal end -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/products.js"></script>