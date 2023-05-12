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
            <h2 class="text-center text-primary">Fontos videók:</h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Fl8CpSj9bz0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <video width="420" controls>
                <source src="WALTUH.mp4" type="video/mp4">
                <source src="WALTUH.ogg" type="video/ogg">
                A böngészője nem támogatja a HTML videót.
            </video>
                <h2 class="text-center text-primary">Üzletünk székhelye:</h2>
                <br><br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2294.1637566576037!2d23.906070377109693!3d54.900047957347965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e723d32b3a77c3%3A0xf735e84a28882d48!2sEneba!5e0!3m2!1shu!2shu!4v1683889815294!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <br>
                <a target="_blank" href="https://www.google.com/maps/place/Eneba/@54.900048,23.9060704,17z/data=!3m1!4b1!4m6!3m5!1s0x46e723d32b3a77c3:0xf735e84a28882d48!8m2!3d54.9000449!4d23.9086453!16s%2Fg%2F11h77lq53l">Nagyobb térkép</a>
                
                <h2 class="text-center text-primary">Linkek a példaként szolgáló weboldalakhoz:</h2>
                <a href="https://www.eneba.com/">Eneba - termékek oldal kialakításához, illetve termék illusztrációk</a><br>
                <a href="https://theliquidcity.com/">The Liquid City - Slideshow ötlet</a><br>
                <a href="https://www.pcx.hu/">PCX - keresőmező, slideshow</a>
                
                </div>
            
            </div>
        </div>
        
        <div class="col-md-1"></div>
    </div>
</div>