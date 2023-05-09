<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $ablakcim['cim'] . ( (isset($ablakcim['oldalMotto'])) ? ('|' .$ablakcim['oldalMotto']) : '')?></title> <!--Title megjelenítése-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/jquery2.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="/bootstrap/bootstrap.min.css"> <!-- Bootstrap lap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./styles/stilus.css"> <!-- Stíluslap-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if(file_exists('./bootstrap/'.$keres['fajl'].'.min.css')) {?> 
            <link rel="stylesheet" type="text/css" href="./boostrap/<?= $keres['fajl']?>.min.css">
    <?php } ?>
    <?php //komment: ./styles/ lehet nem fog működni, amennyiben nem, akkor /styles/-ra kell cserélni! (utóbbi 'hibának' volt jelezve)
        if(file_exists('./styles/'.$keres['fajl'].'.css')) {?> 
        <link rel="stylesheet" type="text/css" href="./styles/<?= $keres['fajl']?>.css">
    <?php } ?>
    <style>
        body {
            background-color: #00FFE0 !important; /*Felülírjuk a bootstrap-et*/
            font-family: 'Times New Roman', Times, serif !important;
        }
        .myMenu {
            background-color: #26394C !important;
            font-size: large;
            font-variant: small-caps;
            border-radius: 10px;
            padding: 10px;
            margin: 10px;
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
            <div class="collapse navbar-collapse myMenu" id="collapse"> <!-- vízszintes menü -->
                
                    <ul class="nav navbar-nav">
                        <?php foreach ($oldalak as $url => $oldal) {?> <!-- Végighaladunk az $oldalak tömbön -->
                            <li <?= (($oldal == $keres) ? ' class="active"' : '') ?>> <!-- Amennyiben az oldal a jelenlegi, akkor az activate osztály fog érvényesülni -->
                                <a href="index.php<?= ($url == '/') ? '' : ('?oldal=' . $url) ?>">
                                <?= $oldal['szoveg'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                
            </div>
            <div id="pageCont">
                <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?> <!-- A kiválasztott oldal template oldal feltöltése -->
            </div>
    </div>
    <footer class="navbar-fixed-bottom"> <!-- Oldal lábléce -->
        <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp; <?= $lablec['copyright'] ?> <?php } ?>
        &nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?> <?php } ?>
    </footer>
</body>
</html>