<!-- Ez az oldal fogja tartalmazni mindazokat a paramétereket és változókat, amelyek szükségesek a különböző oldalrészekhez-->
<?php 
$ablakcim = array (
    'cim' => 'Greman & Boros Üzlet', //ablakon megjelenő cím
);
$fejlec = array (
    'oldalLogo' => './images/Logo.png', //fejlécben elhelyezett logó, amennyiben a logó nem jeleníthető meg, akkor helyére a szöveg, illetve weboldal neve és a mottója
    'kepSzoveg' => 'Oldal logo',
    'cim' => 'Greman & Boros Üzlet',
    'oldalMotto' => 'Nyersanyagok és szerszámok kedvező áron!'
);
$lablec = array (
    'copyright' => 'Copyright '.date('Y').'.',
    'ceg' => 'German & Boros Üzlet'
);
$oldalak = array (
    '/' => array('fajl' => 'Fooldal', 'szoveg' =>'Főoldal'),
    'bemutatkozas' => array('fajl' => 'bemutatkozas', 'szoveg' => 'Bemutatkozás'),
    'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat'),
    'termekek' => array('fajl' =>'termekek', 'szoveg' => 'Termékek')
);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');

//Állandók meghatározása adatbázishoz:

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE_NAME', 'gremanandboros');

//Az oldalon alkalmazott pénznem meghatározása:
define('CURRENCY', 'HUF');

?>