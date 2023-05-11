<!-- Ezt a fájlt alkalmazzuk a központi irányítás elérése érdekében-->
<?php
$windowTitle = array(
    'title' => 'Blue Gaming Webáruház', //ablakon megjelenő cím
);
$headerData = array (
    'shopName' => 'Blue Gaming', //Logo helyett az oldal neve fog megjelenni a fejlécben Bootstrap alkalmazásával
    'siteQuote' => 'Játékok kedvező áron!'
);
$footerData = array (
    'copyright' => 'Copyright '.date('Y').'.',
    'corpName' => 'Blue Gaming Webáruház'
);
//Hozzá a $pages, $searching alkalmazása
$pagesSearch = array (
    '/' => array('file' => 'mainpage', 'text' => 'Főoldal'),
    'contact' => array('file' => 'contact', 'text' => 'Kapcsolat'),
    'products' => array('file' => 'products', 'text' => 'Termékek'),
    'registration' => array('file' => 'registration', 'text' => 'Regisztráció'),
    'login' => array('file' => 'login', 'text' => 'Bejelentkezés')
);

$error_page = array('file' => '404', 'text' => 'A keresett oldal nem található');
//Hozzá a $pagesLog, $searchingLog alkalmazása
$pagesSearchLogged = array (
    '/' => array('fileLogged' => 'mainpage', 'text' => 'Főoldal'),
    'contact' => array('fileLogged' => 'contact', 'text' => 'Kapcsolat'),
    'productsLogged' => array('fileLogged' => 'productsLogged', 'text' => 'Termékek')
);
?>