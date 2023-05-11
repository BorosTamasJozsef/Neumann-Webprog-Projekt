<?php include "./templates/top.php"; ?>

<?php include "./templates/navbar.php"; ?>

<div class="container">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
			<h4>Adminisztrátor Regisztráció</h4>
			<p class="message"></p>
			<form id="admin-register-form">
			  <div class="form-group">
			    <label for="name_admin">Név</label>
			    <input type="text" class="form-control" name="name_admin" id="name_admin" placeholder="Vezetéknév, nagybetűvel kezdve!">
			  </div>
			  <div class="form-group">
			    <label for="email_admin">Email cím</label>
			    <input type="email" class="form-control" name="email_admin" id="email_admin" placeholder="Email megadása">
			    <small id="emailHelp" class="form-text text-muted">Adja meg az email címét</small>
			  </div>
			  <div class="form-group">
			    <label for="password_admin">Jelszó</label>
			    <input type="password" class="form-control" name="password_admin" id="password_admin" placeholder="Jelszó">
			  </div>
			  <div class="form-group">
			    <label for="cpassword_admin">Jelszó megerősítése</label>
			    <input type="password" class="form-control" name="cpassword_admin" id="cpassword_admin" placeholder="Jelszó újra">
			  </div>
			  <input type="hidden" name="admin_register" value="1">
			  <button type="button" class="btn btn-primary register-btn">Adminisztrátori fiók létrehozása</button>
			</form>
		</div>
	</div>
</div>





<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
