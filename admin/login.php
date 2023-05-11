<?php include "./templates/top.php"; ?>

<?php include "./templates/navbar.php"; ?>

<div class="container">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
			<h4>Adminisztrátor bejelentkezés</h4>
			<p class="message"></p>
			<form id="admin-login-form">
			  <div class="form-group">
			    <label for="email_admin">Email cím</label>
			    <input type="email" class="form-control" name="email_admin" id="email_admin"  placeholder="Email cím">
			    <small id="emailHelp" class="form-text text-muted">Adja meg az email címét.</small>
			  </div>
			  <div class="form-group">
			    <label for="password_admin">Jelszó</label>
			    <input type="password" class="form-control" name="password_admin" id="password_admin" placeholder="Jelszó">
			  </div>
			  <input type="hidden" name="admin_login" value="1">
			  <button type="button" class="btn btn-primary login-btn">Bejelentkezés adminisztrátorként</button>
			</form>
		</div>
	</div>
</div>





<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
