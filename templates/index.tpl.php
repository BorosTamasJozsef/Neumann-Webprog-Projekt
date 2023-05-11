<!-- Ez a fájl fogja tartalmazni gyakorlatilag a keretet a többi oldal számára, vagyis a fejlécet és a láblécet, illetve a menüt/menüket -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		
		<title><?= $windowTitle['title'] . ( (isset($windowTitle['siteQuote'])) ? ('|' .$windowTitle['siteQuote']) : '')?></title> <!--Title megjelenítése-->
  		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="style2.css">
		
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top navbar-expand">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">Blue Gaming Webáruház</a> <!-- Kattintható oldalcím, visszavezet a főoldalra-->
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<?php 
                    foreach($pagesSearch as $url => $pages) { ?> <!-- Végighaladunk a $pagesSearch tömbön-->
                        <li <?= (($pages == $searching) ? ' class="active"' : '') ?>>
                            <a href="index.php<?= ($url == '/') ? '' : ('?pages=' . $url) ?>">
                            <?=$pages['text'] ?></a>
                        </li>
                <?php } ?>        
			</ul>
			
		</div>
	</div>
</div>
<!-- Az oldal törzse-->
<div id="pageCont">
    <?php include("./templates/pages/{$searching['file']}.tpl.php"); ?> <!-- A kiválasztott oldal template oldal feltöltése -->
</div>
<div class="container-fluid fixed-bottom pageFooter">
    <div class="row text-center text-uppercase font-weight-bold">
        <?php if(isset($footerData['copyright'])) { ?>&copy;&nbsp;<?= $footerData['copyright'] ?> <?php } ?>
		    &nbsp;
        <?php if(isset($footerData['corpName'])) { ?><?= $footerData['corpName']; ?><?php } ?>
    </div>
</div>	