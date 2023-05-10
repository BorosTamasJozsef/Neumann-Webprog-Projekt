<?php 
    if(isset($_GET["register"])) {


?>
<!-- Az oldalon megjelenő űrlap:-->
<div class="container-fluid">
    <div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">	
			</div>
			<div class="col-md-2"></div>
	</div>
		<div class="row">
			<div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="color: #00FFE0">Regisztráció</div>
                    <div class="panel-body" style="background-color: #26394C !important;">
                        <form id="regisztracios_f">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="vezeteknev" style="color: #00FFE0">Vezetéknév</label>
                                    <input type="text" id="vezeteknev" name="vezeteknev" class="form-control" placeholder="Adja meg a vezetéknevét">
                                </div>
                                <div class="col-md-6">
                                    <label for="keresztnev" style="color: #00FFE0">Keresztnév</label>
                                    <input type="text" id="keresztnev" name="keresztnev" class="form-control" placeholder="Adja meg a keresztnevét">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="jelszo" style="color: #00FFE0">Jelszó</label>
                                    <input type="password" id="jelszo" name="jelszo" class="form-control" placeholder="Adja meg a jelszavát">
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="rejelszo" style="color: #00FFE0">Jelszó megerősítése</label>
                                    <input type="password" id="rejelszo" name="rejelszo" class="form-control" placeholder="Erősítse meg a jelszavát">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email" style="color: #00FFE0">E-mail cím</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Adja meg az e-mail címét">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="lakcim" style="color: #00FFE0">Lakcím</label>
                                    <input type="text" id="lakcim" name="lakcim" class="form-control" placeholder="Adja meg a lakcímét (város/utca/házszám)">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="isz" style="color: #00FFE0">Irányítószám</label>
                                    <input type="text" id="isz" name="isz" class="form-control" placeholder="Adja meg a település irányítószámát">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input style="width: 100%" type="submit" value="Regisztráció" name="signup_button" class="btn btn-info btn-lg">
                                </div>
                            </div>
        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>