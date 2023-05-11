<!-- A mainpage fog szolgálni az oldal főoldalként, amely a következőket fogja tartalmazni:
    Egy slideshow, amely 5 (?) kép között fog váltogatni, melyek az oldallal kapcsolatos infokat fognak tartalmazni
    Alapvető dolgok, pl egy rövid üdvözlő szöveg
    Két darab videó a feladat leírása szerint
    Google térkép a feladat leírása szerint-->
    <div class="container-sm">		
			
            <div class="coverimgcont">
                <img class="border border-info" id="coverImage" src="mainpagecover.jpg?t=".time(). alt="BlueGamingBorito"> <!-- Böngésző megakadályozása a kép gyorsítótárban való tárolásától-->
            </div><br><br>
        
            
            <div id="demo" class="carousel slide" data-ride="carousel">
            

<div class="carousel-inner">
<div class="carousel-item active">
  <img src="slideshow1.jpg" alt="Megnyílt az oldal" width="1150" height="500">
</div>
<div class="carousel-item">
  <img src="slideshow2.jpg" alt="Termékek" width="1150" height="500">
</div>
</div>


<a class="carousel-control-prev" href="#demo" data-slide="prev">
<span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
<span class="carousel-control-next-icon"></span>
</a>
</div>

            <div class="panel panel-primary mainPagePanel">
            <div class="panel-body mypanelcolor">
            <p class="pageMaintext">Oldalunk annak a célnak az érdekében jött létre, hogy mindenki megtalálhassa az ízlésének megfelelő játékokat,
                        kedvező áron. Webáruházunk kizárólag PC-s videójátékokat forgalmaz, mely kizárja a DLC, Demó, Korai elérésű termékeket. <br>
                        <br>
                        Oldalunkon csakis a játékok fizikai másolatai vásárolhatók, vagyis termékkulcsok (mint Steam vagy Origin termékkulcsok) NEM vásárolhatók az oldalon!
                        <br><br>
                        Bármilyen kérdése lenne, ezen az oldalon lentebb megpróbálunk mindenre választ adni. Amennyiben kérdésére nem kapott választ, bátran írjon nekünk
                        a 'Kapcsolat' fül alatt feltüntetett E-mail címünkre, vagy egy üzenet formájában ossza meg gondolatait, észrevételeit, javaslatait velünk!
                    </p>
                <h2 class="text-center text-primary">Üzletünk székhelye:</h2>
                <br><br>
                
                
                </div>
            <!--Ide megy a 2 videó-->
            </div>
        </div>
        
        <div class="col-md-1"></div>
    </div>
</div>