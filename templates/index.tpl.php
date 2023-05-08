<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $ablakcim['cim'] . ( (isset($ablakcim['oldalMotto'])) ? ('|' .$ablakcim['oldalMotto']) : '')?></title> <!--Title megjelenítése-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="./styles/stilus.css"> <!-- Stíluslap-->
    <link rel="stylesheet" type="text/css" href="/bootstrap/bootstrap.min.css"> <!-- Bootstrap lap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php //komment: ./styles/ lehet nem fog működni, amennyiben nem, akkor /styles/-ra kell cserélni! (utóbbi 'hibának' volt jelezve)
        if(file_exists('./styles/'.$keres['fajl'].'.css')) {?> 
        <link rel="stylesheet" type="text/css" href="./styles/<?= $keres['fajl']?>.css">
    <?php } ?>
    <?php
        if(file_exists('./bootstrap/'.$keres['fajl'].'.min.css')) {?> 
            <link rel="stylesheet" type="text/css" href="./boostrap/<?= $keres['fajl']?>.min.css">
    <?php } ?>
    <style>
        body {
            background-color: #00FFE0 !important; /*Felülírjuk a bootstrap-et*/
            font-family: 'Times New Roman', Times, serif !important;
        }
    </style>
</head>
<body>
    <header>
        <img src="/images/<?=$fejlec['oldalLogo']?>" alt="<?=$fejlec['kepSzoveg']?>">
        <h1><?= $fejlec['cim'] ?></h1>
        <?php if(isset($fejlec['motto'])) { ?> <h2><?= $fejlec['motto'] ?></h2>
        <?php } ?>
    </header>
    <div class="collapse navbar-collapse" id="Menu"> <!-- Fejléc alatti vízszintes menü, ami eltárolja a Bejelentkezés/Regisztráció opciókat-->
        <ul class="nav navbar-nav">
                <li><a href="./templates/pages/regisztracio.tpl.php"><span class="glyphicon glyphicon-pencil"></span>Regisztráció</a></li>
                <li><a href="./templates/pages/belepes.tpl.php"><span class="glyphicon glyphicon-user"></span>Bejelentkezés</a></li>
        </ul>

    </div>
    <div id="mainCont"> <!-- Oldal fő tartalma-->
            <aside id="nav"> <!-- oldalsó menü -->
                <nav>
                    <ul>
                        <?php foreach ($oldalak as $url => $oldal) {?> <!-- Végighaladunk az $oldalak tömbön -->
                            <li <?= (($oldal == $keres) ? ' class="active"' : '') ?>> <!-- Amennyiben az oldal a jelenlegi, akkor az activate osztály fog érvényesülni -->
                                <a href="index.php<?= ($url == '/') ? '' : ('?oldal=' . $url) ?>">
                                <?= $oldal['szoveg'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </aside>
            <div id="pageCont">
                <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?> <!-- A kiválasztott oldal template oldal feltöltése -->
            </div>
    </div>
    <footer> <!-- Oldal lábléce -->
        <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp; <?= $lablec['copyright'] ?> <?php } ?>
        &nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?> <?php } ?>
    </footer>
</body>
</html>