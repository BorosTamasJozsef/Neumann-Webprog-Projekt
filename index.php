<?php //minden hivatkozás esetében ez a fájl fog betöltődni
    include('./includes/config.inc.php');
    if (isset($_GET['oldal'])) { //címlaptól eltérés esetén
        $oldal = $_GET['oldal'];
        if (isset($oldalak[$oldal]) && file_exists ("./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php") ) { //oldal keresése és vizsgálat, hogy az adott oldal létezik-e
            $keres = $oldalak[$oldal]; //oldalak tömb adott sora
        }
        else {
            $keres = $hiba_oldal; //hibaüzenet megjelenítése
            header("HTTP/1.0 404 Not Found");
        }
    }
    else $keres = $oldalak['/']; //első beolvasás, vagy címlappal való egyezés
    include('./templates/index.tpl.php');
?>