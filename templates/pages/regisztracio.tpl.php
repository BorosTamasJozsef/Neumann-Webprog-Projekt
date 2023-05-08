<?php //Regisztrációs űrlap adatok, elsőtől utolsó mező: vezeteknev, keresztnev, jelszo & rejelszo, email, lakcim, iranyitoszam
    include "/includes/db.php";
    //Megvizsgáljuk az űrlapot
    if (isset($_POST["vezeteknev"])) {
        $vezeteknev = $_POST["vezeteknev"];
        $keresztnev = $_POST["keresztnev"];
        $jelszo = $_POST["jelszo"];
        $rejelszo = $_POST["rejelszo"]; //a rejelszo arra alkalmas, hogy ellenőrizzük a felhasználó jelszavát ("adja meg a jelszót újra") -> nem egyezik = HIBA
        $email = $_POST["email"];
        $lakcim = $_POST["lakcim"];
        $isz = $_POST["isz"]; //irányítószám
        //Fontos az adatok érvényességének vizsgálata:
        $nev = "/^[a-zA-Z]+$/";
        $emailErvenyesseg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
        //Ki vannak-e töltve a mezők?
        if (empty($vezeteknev) || empty($keresztnev) || empty($jelszo) || empty($rejelszo) || empty($email) || empty($lakcim) || empty($isz)) {
            echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Minden mező kitöltése kötelező!</b>
                </div>
            ";
            exit();
        } else {
            if (!preg_match($nev, $vezeteknev)) {
                echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>A megadott név $vezeteknev nem érvényes!</b>
                </div>
                ";
            }
            exit();
        }
        if (!preg_match($nev, $keresztnev)) {
            echo "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>A megadott név $keresztnev nem érvényes!</b>
            </div>
            ";
            exit();
        }if (strlen($jelszo) < 9) { //jelszó min. 9 karakter lehet
            echo "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Túl rövid jelszó!</b>
            </div>
            ";
            exit();
        }
        if (strlen($rejelszo) < 9) { //jelszó min. 9 karakter lehet
            echo "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Túl rövid jelszó!</b>
            </div>
            ";
            exit();
        }
        //Természetesen megvizsgáljuk, hogy a két jelszó egyáltalán egyezik-e és nem csupán a hosszuk nem megfelelő:
        if ($jelszo != $rejelszo) {
            echo "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>A két jelszó nem egyezik!</b>
            </div>
            ";
            exit();
        }
        if (!preg_match($emailErvenyesseg, $email)) { //Email megegyezik-e az e-mail mintának
            echo "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Érvénytelen e-mail cím!</b>
            </div>
            ";
            exit();
        }
        if (strlen($isz) < 4) { //Az irányítószámot is valamilyen módon ellenőrizzük, pl. nem lehet rövidebb, mint 4 karakter
            echo "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>A megadott irányítószám túl rövid!</b>
            </div>
            ";
            exit();
        }
        //Amennyiben olyan e-mail címmel akar a felhasználó regisztrálni, ami már szerepel az adatbázisban:
        $sql = "SELECT felhasz_id FROM felhasznaloi_adat WHERE email_felhasz = '$email' LIMIT 1";
        $check_query = mysqli_query($connection, $sql);
        $email_szamitas = mysqli_num_rows($check_query);
        if($email_szamitas > 0) {
            echo
            "<div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Ezzel az e-mail címmel már regisztráltak felhasználói fiókot!</b>
            </div>
            ";
            exit();
            //Amennyiben minden adat megfelelően lett megadva és nincsen egyezés a tárolt e-mail címek és a megadott e-mail között, akkor sikeres lesz a regisztráció:
        } else {
            $jelszo = md5($jelszo); //md5 függvény alkalmazása -> röv. magy.: nagyobb fájlok tömörítése előtt alkalmazható, biz. lépés gyakorlatilag
            $sql = "INSERT INTO  'felhasznaloi_adat
            ('felhasz_id, 'vezeteknev', 'keresztnev', 'jelszo', 'email', 'lakcim', 'iranyitoszam')
            VALUES (NULL, '$vezeteknev', '$keresztnev', '$jelszo', '$email', '$lakcim', '$isz')"; //A felhasználó azonosítónál NULL értéket adunk meg (nincs ilyen bevitt adat, ill. auto incr.)
            $run_query = mysqli_query($connection, $sql);
            //Végül a regisztráció sikerességénen visszajelzése:
            if(mysqli_query($connection, $sql)) {
                echo "
                <div class='alert alert-warning'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Sikeres regisztáció!</b>
                </div>";
                exit();
            }
        }//Komment: hiba esetén kiegészítendő kód!


    }
?>
    <form action = "regisztracio.php" method = "post">
      <fieldset>
        <legend>Regisztráció</legend>
        <br>
        <input type="text" id="vezeteknev" name="vezeteknev" placeholder="Vezetéknév" required><br><br>
        <input type="text" id="utonev" name="utonev" placeholder="Keresztnév" required><br><br>
        <input type="password" id="jelszo" name="jelszo" placeholder="Adja meg a jelszót" required><br><br>
        <input type="password" id="rejelszo" name="rejelszo" placeholder="Jelszó megerősítése" required><br><br>
        <input type="text" id="email" name="email" placeholder="Adja meg az e-mail címét" required><br><br>
        <input type="text" id="lakcim" name="lakcim" placeholder="Adja meg a lakcímét (város/utca/házszám)" required><br><br>
        <input type="text" id="isz" name="isz" placeholder="Adja meg az irányítószámot" required><br><br>
        <input type="submit" name="regisztracio" value="Regisztráció">
        <br>&nbsp;
      </fieldset>
    </form>