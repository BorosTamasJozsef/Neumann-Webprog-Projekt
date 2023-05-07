<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $ablakcim['cim'] . ( (isset($ablakcim['oldalMotto'])) ? ('|' .$ablakcim['oldalMotto']) : '')?></title> <!--Title megjelenítése-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/styles/stilus.css"> <!-- Stíluslap-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php //komment: ./styles/ lehet nem fog működni, amennyiben nem, akkor /styles/-ra kell cserélni! (utóbbi 'hibának' volt jelezve)
        if(file_exists('./styles/'.$keres['fajl'].'.css')) {?> 
        <link rel="stylesheet" type="text/css" href="/styles/<?= $keres['fajl']?>.css">
    <?php } ?>
</head>
<body>
    <header>
        <img src="/images/<?=$fejlec['kepforras']?>" alt="<?$fejlec['kepSzoveg']?>">
        <h1><?= $fejlec['cim'] ?></h1>
        <?php if(isset($fejlec['motto'])) { ?> <h2><?= $fejlec['motto'] ?></h2>
        <?php } ?>
    </header>
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
                <?php include("/templates/pages/{$keres['fajl']}.tpl.php"); ?> <!-- A kiválasztott oldal template oldal feltöltése -->
            </div>
    </div>
    <footer> <!-- Oldal lábléce -->
        <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp; <?= $lablec['copyright'] ?> <?php } ?>
        &nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?> <?php } ?>
    </footer>
</body>
</html>