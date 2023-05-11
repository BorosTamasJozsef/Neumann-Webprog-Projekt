-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 29. 22:20
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `bluegaming`
--
CREATE DATABASE IF NOT EXISTS `bluegaming` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bluegaming`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name_admin` varchar(50) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `email_admin`, `password_admin`) VALUES
(11, 'Boros', 'tamasboros664@gmail.com', '$2y$10$amfws5fS4y3lBOaIds2mzOsCm28EulNtTcHTbolWeJy2CckgbNfmK');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Horror'),
(2, 'Akció'),
(3, 'Lövöldözős'),
(4, 'Szerepjáték'),
(5, 'Szimulátor'),
(6, 'Sport'),
(8, 'Kaland'),
(9, 'Nyomozós'),
(10, 'Stratégiai'),
(11, 'Platform'),
(12, 'Verekedős'),
(13, 'Versenyzős');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE `discounts` (
  `discount_id` int(10) NOT NULL,
  `discount_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `discounts`
--

INSERT INTO `discounts` (`discount_id`, `discount_title`) VALUES
(1, '80% akció'),
(2, '50% akció'),
(3, '30% akció'),
(4, '15% akció'),
(5, '5% akció');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `id_users` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_cat` int(10) NOT NULL,
  `product_discount` int(10) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_qty` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_discount`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 4, 2, 'Elder Scrolls V: Skyrim - Special Edition', 6700, 30, 'Az Elder Scrolls V: Skyrim játék egy újabb fejezetet jelent a híres Elder Scrolls sagában, amelyet a Bethesda Game Studios fejlesztett ki. Nyitott világélmény, izgalmas történet a régi időkről, amelyek legendákat mesélnek el az északi országokban bátran harcoló dicső harcosokról, és olyan küldetésekről, amelyek még a legjobb RPG-játékosokat is kihívásokkal töltik el és szórakoztatják – ebben a címben minden benne van. Bár több éve megjelent, a játék jól megöregedett, és játékosok ezreinek nyújtott szórakozást világszerte, ezért vásárolja meg a The Elder Scrolls V: Skyrim Special Edition Steam kulcsot, és csatlakozzon a nagy utazáshoz!', 'ESSKYRIMSPECIAL.jpg', 'skyrim, ES'),
(2, 8, 2, 'Alone in the Dark - Anthology', 2560, 40, 'Alone in the Dark - Anthology', 'AloneintheDANTHOLOGY.jpg', 'alone, dark, anthology'),
(3, 1, 2, 'Amnesia Collection', 3000, 17, 'Amnesia Collection', 'AmnesiaColl.jpeg', 'amnesia, collection'),
(4, 1, 1, 'Amnesia: A Machine for Pigs', 1500, 20, 'Amnesia: A Machine for Pigs', 'AmnesiaPIGS.jpeg', 'amnesia, pigs, machine, for'),
(5, 1, 3, 'Amnesia: Rebirth', 1400, 50, 'Amnesia: Rebirth', 'AmnesiaRebirth.jpeg', 'amnesia, rebirth'),
(6, 1, 2, 'Amnesia: The Dark Descent', 900, 15, 'Amnesia: The Dark Descent', 'AmnesiaTDD.jpeg', 'amnesia, the, dark, descent'),
(7, 2, 2, 'Assassin\'s Creed III', 2000, 30, 'Az év 1775, és az amerikai gyarmatok a szabadságuk küszöbén állnak. Sok fiatal csatlakozik az Amerikai Egyesült Államok létrehozásának forradalmához, de egy ember számára az utazás más fordulatot vesz. Connor, az indián és brit származású harcos harcolni kezd klánjáért, és a forradalom régóta szükséges szikrája lesz.\n\n\nHa Connort játszod, nemcsak a történelem szemtanúja leszel, hanem a város utcáin vagy a vadon mélyén vívod csatáidat.', 'ASS3.jpeg', 'assassin, assassin\'s, creed, 3, III'),
(8, 2, 3, 'Assassin\'s Creed IV: Black Flag', 7000, 70, 'A Ubisoft bemutatja nagysikerű Assassin’s Creed franchise hatodik nagy részét – az Assassin’s Creed IV: Black Flag Uplay kulcsot! Folytatják híres akció-, kaland- és lopakodási képletüket, de néhány új fordulattal. Fogd a legénységet, tölts magadnak egy kis rumot, és kezdd el énekelni azokat a jó tengeri kunyhókat – az 1715-ös évbe, a kalózkodás aranykorába utazol. Ezek az ördögi rablók létrehozták saját köztársaságukat a Karib-térségben. Itt a kegyetlenség és a kapzsiság a természeted részévé válik. Készen állsz kifosztani néhány gyanútlan bolondot?', 'ASSblackF.jpg', 'assassin, assassin\'s, creed, black, flag, 4, IV'),
(9, 2, 2, 'Assassin\'s Creed Freedom Cry', 2890, 40, 'Assassin\'s Creed Freedom Cry', 'AssFreedomCry.jpeg', 'assassin, assassin\'s, creed, freedom, cry'),
(10, 2, 2, 'Assassin\'s Creed: Liberation HD', 2300, 50, 'Az Assassin\'s Creed: Liberation segítségével játszhatsz Aveline de Grandpreként, egy bérgyilkosként, akinek történetét az Abstergo Entertainment meglehetősen cenzúrázza, és az Assassins-t próbálják rosszfiúknak mutatni.\n\n\nEzzel a játékkal térjen vissza a 18. századi New Orleansba, mivel a franciák hamarosan véget akarnak vetni az indiánokkal vívott háborúnak, és a játék előrehaladtával többet megtudhat Aveline de Grandpre-ről, és megtalálhatja az igaz történetet.', 'ASSliberation.jpg', 'assassin, assassin\'s, creed, liberation, HD'),
(11, 2, 3, 'Assassin\'s Creed: Rogue', 3450, 40, 'Nagyot fordult a dagály az Assassin’s Creed: Rogue-ban, egy olyan játékban, amelyben nem csak a vadász, hanem a vadászott is!\n\nA játék a 18. századi Egyesült Államokba visz vissza, ahol egy küldetés rosszul sül el, és hátat fordít a többi Asszaszinnak, akik most cserébe meg akarnak ölni. Az egyetlen módja annak, hogy túlélje, ha először megöli őket. Fedezze fel az Egyesült Államokat a kezdetekkor, New York városától a River Valley-ig, az Atlanti-óceán északi részének jeges vizeiig, miközben megpróbálja lerombolni korábbi testvéreit!', 'ASSrogue.jpg', 'assassin, assassin\'s, creed, rogue'),
(12, 2, 2, 'Assassin\'s Creed: Syndicate', 4000, 34, 'A Ubisoft akciódús lopakodó sorozatának legújabb tagja, az Assassin’s Creed 1868-ba kalauzolja el a játékosokat, amikor London az ipari forradalom csúcsán van. A találmányok kora olyan technológiai fejlődést hozott, amely egy új világhoz vezetett, tele lehetőségekkel. Az ember már nincs béklyózva a királyok és politikusok kénye-kedvének – most a pénz diktálja a szabályokat. Míg egyesek boldogulnak, nem mindenki olyan szerencsés, hogy luxusban éljen. A Brit Birodalmat irányító alsó osztály azért küzd, hogy túlélje a rabszolga-szerű munka, a rossz életkörülmények és a betegségek nehézségeit. Lépjen be az Assassins-ba - ők mindent megtesznek, hogy segítsenek a szerencsétleneken. Vásárold meg az Assassin’s Creed: Syndicate Uplay kulcsot, és lépj fel a korrupt London ellen.', 'ASSsyndicate.jpg', 'assassin, assassin\'s, creed, syndicate'),
(13, 2, 1, 'Assassin\'s Creed: Unity', 5560, 23, 'Térjen vissza az 1789-es francia forradalom kaotikus idejébe az Assassin\'s Creed: Unity játékkal. Arnoként fogsz játszani, és a küldetésed ebben a kalandjátékban nagyon fontos: ki kell derítened, ki szervezte igazán a forradalmat.', 'ASSunity.jpg', 'assassin, assassin\'s, creed, unity'),
(14, 2, 3, 'Assassin\'s Creed Valhalla', 8850, 70, 'A Ubisoft bemutatja az Assassin’s Creed-et a 9. századi Angliában, ahol vikingekkel találkozunk! Ez így van, az RPG címe a vikingek körül forog, így halálos összecsapásokat láthatunk majd a bátor skandináv harcosok között, akik a ravasz szászok ellen állnak. Vásárold meg az Assassin’s Creed Valhalla Uplay kulcsot, és készülj fel egy kíméletlen háborúra a kontinens népe és bátor skandináv harcosaid serege között, miközben elvállalod a viking vezér szerepét!', 'ASSvalhalla.jpeg', 'assassin, assassin\'s, creed, valhalla'),
(15, 2, 1, 'Alien vs Predator Classic 2000', 2000, 30, 'Alien vs Predator Classic 2000', 'AVP2000.jpeg', 'alien, vs, predator, classic, 2000'),
(16, 2, 1, 'Aliens vs. Predator Collection', 2000, 35, 'Aliens vs. Predator Collection', 'AVPCOLL.jpg', 'alien, aliens, vs, predator, collection'),
(17, 2, 3, 'A Way Out', 4500, 60, 'Nagyon jól érezte magát a Brothers - A Tale of Two Sons című filmben? Akkor készülj fel, hogy kiszabadulj a börtönből ebben a kizárólagos kooperatív akció-kalandjátékban, amelyet ugyanazok az alkotók készítettek, a MicroPHAZE-t, és az EA adta ki – A Way Out Origin kulcs! Az első néhány percben egy egyszerű börtönbetörési rendszert ismerhetünk meg, de ne tévesszen meg bennünket. Ez az egyszerű terv gyorsan bonyolulttá és kiszámíthatatlanná válik. Rengeteg fordulat vár rád, ezért mindenképpen ragadj meg egy barátot, és éld át együtt a történetet helyi vagy online játékon keresztül.', 'AWayOut.jpg', 'way, out'),
(18, 2, 3, 'Back 4 Blood', 8995, 120, 'A kultikus klasszikus Left 4 Dead megalkotói egy újabb izgalmas kooperatív zombilövővel kedveskednek rajongóiknak! A Back 4 Blood, a Turtle Rock Studios és a Warner Bros. Games közös projektje egy adrenalinnal teli akcióélmény, ahol az emberiség sorsa a te és barátaid vállán nyugszik. Egy halálos parazitafertőzés gyorsan elpusztította civilizációnkat, és ami megmaradt, az a táplálékforrásuk lett. A Ridden vad és fürge, de a halálos fegyverekkel felfegyverzett immuntúlélők egy csoportja képes lehet elnyomni az egykori emberek kísérteties héját. Vásárolj vissza 4 Blood Steam kulcsot, és vedd meg a véres harcot az ellenséggel!', 'BACK4BLOOD.jpeg', 'back, 4, for, blood, zombie'),
(19, 3, 2, 'Battlefield 1', 4000, 70, 'Az EA Battlefield 1 kulcsa visszafordítja az időt, és elvezet minket a modern kor legelső hatalmas globális konfliktusához, az első világháborúhoz. Ez az ötödik játék a sorozatban, de a legkorábbi abban az időkeretben, ahol az akció zajlik. A Battlefield széles körben ismert masszív többjátékos mód, a hihetetlen, folyamatosan változó környezet, a különféle légi és földi járművek, valamint az akkoriban használt fegyverek újrateremtődnek a játék környezetében. Van még ennél is több, a Battlefield 1-nek van egy jól megírt egyjátékos történetmódja is, amely 5 mélyreható történetet tartalmaz a korszakból.', 'BF1.jpg', 'battlefield, battle, field, 1'),
(20, 3, 2, 'Battlefield 3', 3800, 40, 'Az amerikai tengerészgyalogosoknak ebben a játékban nincs könnyű dolguk: úgy kell végigmenniük a különféle nehéz küldetéseken, hogy alig jutnak ki élve. Ugorj a cipőjükbe a Battlefield 3-ban, és légy részese a legveszélyesebb küldetéseknek Párizsban, New Yorkban és Teheránban. A többjátékos első személyű lövöldözős játék egy igazi csatatér kaotikus ábrázolásával vonz: amint a golyók közvetlenül a füled mellett repülnek el, és a pulzusod felgyorsul, rajtad és csapatodon múlik, hogy befejezzék a munkát.', 'BF3.jpg', 'battlefield, battle, field, 3'),
(21, 3, 3, 'Battlefield 4', 3870, 50, 'A Battlefield 4 PC egy első személyű lövöldözős játék folytatása, amelyet az EA DICE fejlesztett és az Electronic Arts adott ki. A márka továbbra is jelöli sorozatbeli relevanciáját az örökké tartó online hadviselésben. A cselekmény ezúttal egy kitalált háborúban játszódik, amely 2020-ban, hat évvel az előzmény eseményei után játszódik. Ismét egy teljes konfliktusról van szó az Egyesült Államok és Oroszország között, ezúttal azonban Kína is pályára lép. A teljesen új Frostbite 3 motorral a Battlefield 4 Origin kulcs még részletesebb, rendkívül valósághű környezeteket, valódi minőségi felbontású textúrákat és részecskeeffektusokat hoz egyjátékos kampányába és hét többjátékos módba.', 'BF4.jpg', 'battlefield, battle, field, 4'),
(22, 3, 3, 'Battlefield 2042', 10000, 30, 'A Dice és az Electronic Arts kínálatában a híres katonai juggernaut sorozat új iterációja érkezik, hogy teljes háborút indítson a Battlefield megrögzött rajongói számára. A Battlefield 2042 Origin kulcs mindent magában foglal, ami a sorozatot népszerűvé tette a játékközösségben, a szélek mentén alakította, és olyan újításokkal ruházta fel a játékosokat, amelyek a legjobbat az EA Battlefielde által kínálni tudták. Az első személyű lövöldözős játék a közeljövőben játszódik: dinamikusan változó csataterek, futurisztikus fegyverzet és végtelen őrület. Ha többjátékos élményt keresel, amellyel új élmények előtt nyithatod meg az ajtót, akkor a Battlefield 2042 kulcsa a sikátorban van.', 'BF2042.jpeg', 'battle, field, battlefield, 2042'),
(23, 8, 2, 'Bioshock: The Collection', 21000, 16, 'Ez a csomag lehetővé teszi az összes eddig megjelent Bioshock játék lejátszását:\n• BioShock Remastered;\n• BioShock 2 Remastered;\n• Bioshock 2: Minerva’s Den Remastered;\n• BioShock Infinite;\n• BioShock Infinite: Season Pass;\n• BioShock Infinite: Columbia’s Finest.\n\nHa olyan játékot keresel, amivel bővítheted játékkönyvtáradat, és potenciálisan az egyik kedvenc akciójátékod lehet, akkor a Bioshock: The Collection kulcs pontosan az lehet, amit keresel! 2016-09-13 az a nap, amikor ezt a címet kiadta a Steamen a széles körben elismert 2K. Az Irrational Games fejlesztői keményen dolgoztak és kívülről gondolkodtak a játék elkészítésekor, ezért ügyelj arra, hogy ne maradj le egy olyan élményről, amely a játék első pillanataitól kezdve magával ragad. Vásárolja meg Bioshock: The Collection Steam kulcsot olcsón, érezze magát kényelmesen, és merüljön el a sokórás zengő szórakozásban!', 'BioShockCollection.jpg', 'bio, shock, bioshock, collection'),
(24, 3, 3, 'Borderlands 2 (GOTY)', 3500, 56, 'A játék, amely keveredik az FPS-ben és az RPG-vel – Borderlands 2. Hozd ki mindkettőből a legjobbat: lépj szintet karakteredbe, szerezd be a legkeresettebb fegyvereket a játékban, majd öld meg az ellenségeket csapatoddal.\n\nNégy karakterosztály közül választhatsz a fejlődéshez, új barátokkal találkozhatsz és csapatokat alakíthatsz velük, felfedezheted a történetet, amely Pandora bolygóján keresztül vezet. A jól kidolgozott történettel, amelyet lenyűgöző grafika egészít ki, nem csoda, hogy ez a játék miért vonzza ekkora közönséget.', 'BorderL2GOTY.jpg', 'border, lands, borderlands, 2, goty, year'),
(25, 8, 1, 'Call of Cthulhu', 3450, 40, 'Call of Cthulhu', 'CallofC.jpeg', 'call, of, cthulhu'),
(26, 8, 3, 'Chernobylite', 11000, 20, 'Azok számára, akiket még mindig lenyűgöz az HBO csodálatos csernobili minisorozata, és kíváncsiak a csernobili erőműben 1986-ban történt eseményekre, ez a játék jó néhány dolgot kínál majd. A The Farm 51 lengyel stúdió által kifejlesztett és kiadott Chernobylite egy nyílt világú túlélési-horror első személyű lövöldözős játék lopakodó elemekkel, nagyon hasonlít az olyan játékokhoz, mint az S.T.A.L.K.E.R. vagy a Metro játéksorozat címei. Vásároljon Chernobylite kulcsot, és merüljön el az emberiség történetének egyik legnagyobb technológiai katasztrófája által létrehozott titokzatos világban.', 'ChernoB.jpg', 'cher, cherno, chernobylite, indie'),
(27, 8, 1, 'Call of Cthulhu: Dark Corners of the Earth', 1000, 10, 'Call of Cthulhu: Dark Corners of the Earth', 'CoC.jpeg', 'call, of, cthulhu, dark, corners, of, earth, the'),
(28, 2, 1, 'Call Of Duty 2', 12300, 7, 'Call Of Duty 2', 'COD2.jpeg', 'call, of, duty, 2'),
(29, 2, 3, 'Call of Duty: Black Ops 2', 17200, 50, 'A Call of Duty: Black Ops 2 az FPS játékmenetet hozza magával, amely magával ragad, és érintetlen marad napokon, hónapokon és éveken keresztül. A játékot a Treyarch fejlesztette ki, és az Activision adta ki még 2012-ben, és a mai napig megrázza a lövöldözős rajongók világát intenzív akciókkal, precíz mechanikával, taktikus csapatjátékkal és a valódi érzésekkel. Ha teljes körű lövöldözős élményre vágysz, ennek a címnek egyenesen a játékgyűjteményedbe kell kerülnie.', 'CODBlackO2.jpg', 'call, of, duty, black, ops, 2'),
(30, 2, 2, 'Call of Duty: Black Ops', 8898, 40, 'A Call of Duty: Black Ops kulcs egy akciós FPS többjátékos játékot hoz, amely órákon át elbűvöl majd a képernyő előtt! Minden átjátszásod egyre mélyebbre és mélyebbre merít a játék által létrehozott környezetbe, és biztosan szeretni fogod az eredményeket! A Treyarch által fejlesztett és az Activision által kiadott cím fergeteges akciókat, precíz mechanikát, lenyűgöző látványt és összességében olyan játékmenetet mutat be, amelyet nem fog tudni elfelejteni.', 'CODBLACKOPS.jpg', 'call, of, duty, black, ops'),
(31, 2, 3, 'Call of Duty: Ghosts', 5670, 30, 'A Call of Duty: Ghosts az Infinity Ward által fejlesztett COD akciós lövöldözős játéksorozat 6. jelentős kiegészítője. Az USA már nem a világ hatalma, a háború áthelyezte a hatalmi tengelyt, és közeledik az ismeretlen ellenség. A katonai ágak egyesültek, és egy különleges egységet alkottak, a Szellemeket. Az Ön célja a közelgő fenyegetés kiirtása, bármilyen szükséges eszközzel.', 'CODGhosts.jpg', 'call, of, duty, ghosts'),
(32, 2, 2, 'Call of Duty: Infinite Warfare', 6780, 45, 'A Call of Duty: Infinite Warfare egy FPS akciójáték, amelyet az Infinity Ward fejlesztett és az Activision adott ki! A játék három egyedi játékmódot kínál futurisztikus hadviselési környezetben! Új kihívásokkal kell szembenéznie a Kampány, a Többjátékos és a Zombik módban!\n\nA Campaignben játssz Reyes kapitányként, egy pilótaként, akinek most a megmaradt koalíciós erőket kell irányítania a könyörtelen és őszintén fanatikus ellenséges erőkkel szemben. Nem csak az, hogy az űr halálos környezete egy kicsit sem jelent kisebb kihívást, mint az ellenségek.', 'CODINFINITE.jpg', 'call, of, duty, infinite, warfare'),
(33, 2, 2, 'Call of Duty: Modern Warfare 2', 3450, 12, 'Call of Duty 2: Modern Warfare', 'CODModernW2.jpg', 'call, of, duty, modern, warfare, 2'),
(34, 2, 3, 'Call of Duty 4: Modern Warfare', 6500, 40, 'Call of Duty 4: Modern Warfare', 'CODMODERW.jpeg', 'call, of, duty, modern, warfare, 4'),
(35, 2, 2, 'Call of Duty: World at War', 18000, 10, 'Call of Duty: World at War', 'CODWAT.jpeg', 'call, of, duty, world, at, war'),
(36, 2, 1, 'Call of Duty: World War II', 20000, 30, 'A Call of Duty franchise a Call of Duty: WW2 kulcsával a gyökerekhez nyúlik vissza. Az Activision évek óta ad ki olyan játékokat, amelyek a jövő vagy a jelen háborúira fókuszálnak, mégis több mint egy évtized telt el az utolsó, klasszikus World War 2 kiadás óta. És most lehetőséged lesz ráharapni a múltra! Vásárolja meg a Call of Duty: WWII Steam kulcsot, és tapasztalja meg az egyszerű férfiak megtörhetetlen testvériségét, akik életüket kockáztatják, hogy megőrizzék szabadságukat a zsarnokság szélén álló világban.', 'CODWW2.jpg', 'call, of, duty, world, war, 2, II, wwII'),
(37, 11, 3, 'Crash Bandicoot N. Sane Trilogy', 16700, 50, 'A legendás Crash Bandicoot platformer újra életre kel, grafikáját és textúráját teljesen átformálták, és mégis ugyanolyan szokatlan és hírhedt, mint évtizedekkel ezelőtt! A Crash Bandicoot N. Sane Trilógia a Crash Bandicoot sorozat első három címéből áll: Crash Bandicoot, Cortex Strikes Back és Warped! Az összeállítást a semmiből fejlesztette ki a Vicarious Visions.\n\nCsatlakozz még egyszer a PS egyik legikonikusabb játékához, és éld át ugyanazt az izgalmas utazást egy teljesen új szinten.', 'CrashBandicootTrilogy.jpg', 'crash, bandi, bandicoot, N., sane, trilogy'),
(38, 2, 2, 'Crysis 3', 6100, 50, 'A Crysis 3 kulcs egy harmadik játékot kínál a Crysis franchise-hoz, és egy folytatást, amely eseményekhez vezet 24 évvel a 2. játék akciója után. Folytassa az Alpha Ceph keresését, és fedezze fel a C.E.L.L. mögötti igazságot. corp. Útja tele lesz kihívásokkal, de mi a modern korban élünk, és most van egy nanoruha, amelyet arra terveztek, hogy a próbaidő alatt számos ellenséggel szemben nagyon szükséges előnyt biztosítson!', 'Crysis3.jpg', 'crysis, 3, cry'),
(39, 2, 3, 'Crysis Remastered', 12650, 10, 'Crysis Remastered', 'CrysisREM.jpeg', 'crysis, remastered, re, cry'),
(40, 4, 3, 'Dragon Age: Inquisition', 5000, 65, 'Ha te is lelkes játékos vagy, mint mi, akkor tudnod kell, hogy a Dragon Age: Inquisition Origin az egyik legnépszerűbb játék az RPG videojátékok között. Mindenképpen meg kell jelennie a birtokodban, ha szeretnéd a legjobbat kihozni ebből a műfajból! Az RPG-iről híres stúdió, a BioWare fejlesztette ki, és a neves videojáték-cég, az Electronic Arts adta ki 2014. november 18-án. lábujjak, amíg ki nem kapcsolja a játékot, így a csoda érzése marad el. Vásárold meg a Dragon Age: Inquisition Origin Key kulcsot, légy a kiválasztott hős, és mentsd meg a királyságot a pusztulástól!', 'DAInquisition.jpeg', 'dragon, age, inq, inquisition, inqui'),
(41, 2, 2, 'Darksiders 2 (Deathinitive Edition)', 26500, 11, 'A Darksiders 2 (Deathinitve Edition) kulcsa a következőket tartalmazza:\n\n• Darksiders 2 a fő játékmenetbe integrált DLC-vel;\n• Átdolgozott és hangolt játékegyensúlyozás, beleértve a jobb zsákmányelosztást;\n• Jobb vizuális minőség a továbbfejlesztett Graphic Render Engine-nek köszönhetően;\n• Natív 1080p felbontás;\n• Átdolgozott szintek, karakterek, textúrák, környezetek és egyebek;\n• Steam kereskedési kártyák;\n• Olcsó Darksiders 2 (Deathinitive Edition) ár.\nKövesd Halált, az Apokalipszis lovasát és tetteit ebben az akciódús kiadásban, amelyet a Nordic Games készített és adott ki – Darksiders 2 (Deathinitive Edition) Steam kulcs! Ez a hack & slash kaland párhuzamosan fut az eredeti Darksiders történetével, és különféle környezetekben mozgatja a játékosokat, nevezetesen a „The White City”, egy angyali előőrsben és „The Eternal Throne”, a holtak urainak erődjében.', 'DARKS2DIEDITION.jpg', 'dark, siders, darksiders, sider, death, edition, deathinitive, initive, 2'),
(42, 2, 4, 'Darksiders III', 2340, 30, 'Végre megérkezett a Darksiders sorozat régóta várt hármas része. A Gunfire Games által kifejlesztett új hack-n-slash akciókaland ismét próbára teszi a pusztítást, a káoszt és a káoszt okozó képességeidet.', 'DARKS3.jpg', 'dark, siders, darksiders, sider, 3, III'),
(43, 2, 4, 'Darksiders Complete Collection', 12560, 30, 'Darksiders Complete Collection', 'DARKSCC.jpeg', 'dark, siders, darksiders, sider, complete, collection'),
(44, 2, 3, 'Darksiders (Warmastered Edition)', 3400, 40, 'A Darksiders (Warmastered Edition) jellemzői:\n\n4k videó kimeneti felbontás támogatása\n\nMegkettőzött textúrafelbontás\n\nÚjra renderelt vágójelenetek, immár HD minőségben\n\nA renderelés különféle fejlesztései és átalakításai\n\nJobb minőség az árnyék renderinghez', 'DARKSWMEDITION.jpg', 'dark, siders, darksiders, sider, war, warmaster, warmastered, edition'),
(45, 8, 3, 'Darkwood', 3000, 20, 'Darkwood', 'DARKWOOD.jpg', 'dark, wood, darkwood, indie'),
(46, 2, 3, 'Dead by Daylight', 6000, 30, 'A Dead by Daylight Steam kulcs egy túlélő horror többjátékos kooperatív játékot kínál, amelyet a Behavior Digital Inc fejlesztett. Készülj fel, hogy elmerülj a bújócska izgalmas játékmenetében, melynek fődíja az életed lesz! Te és három másik vándor keresztezi útjait a pszichogyilkossal, a célod az, hogy a pokolba kerülj a területről, miközben a gyilkost csak az áldozat és a vérontás érdekli!', 'DBD.jpeg', 'dead, by, daylight, day, light'),
(47, 10, 2, 'Darkest Dungeon', 4000, 40, 'A Darkest Dungeons a Red Hook Studiostól egy szerepjátékos videojáték RTS/TBS elemekkel keverve, és még soha nem tapasztalt. Sötét, fordulatos, érdekes és érzelmileg enyhén szólva is lehengerlő. Egy birtokot örökölsz, amely alatt más dimenziókba nyíló portálok terülnek el, ahol súlyos szörnyek találnak kiutat, és megrontják a földeket. A birtok és a környező területek jelenlegi tulajdonosaként különféle kalandorokat kell toboroznod, el kell küldened őket, hogy fedezzék fel ezeket a portálokat, és oltsák el a benne lévő gonoszságokat.', 'DD.jpg', 'darkest, dark, dungeon, indie'),
(48, 2, 3, 'Dead Island (Definitive Collection)', 5000, 30, 'Dead Island (Definitive Collection)', 'DeadIslandDEFCOLL.jpg', 'dead, island, definitive, collection'),
(49, 2, 2, 'Dead Island (Definitive Edition)', 4000, 45, 'Dead Island (Definitive Edition)', 'DeadIslandDEFED.jpeg', 'dead, island, definitive, edition'),
(50, 2, 1, 'Deadlight', 2300, 20, 'A Deadlight egy 2,5D oldalra görgető túlélő horror platformer, amelyet a Tequila Works fejlesztett ki. A játék az 1980-as években játszódik, és a világ a kihalás szélén áll, miközben zombik vették át a hatalmat, és a túlélők éber bandákká alakultak.\nRandall Wayneként, egykori parkőrként játszol. A célod nem csak az, hogy túléld a zombikat és az éber csoportokat, hanem az is, hogy megtaláld az eltűnt családodat.', 'DEADLIGHT.jpeg', 'dead, light, deadlight, indie'),
(51, 2, 1, 'Deadpool', 2300, 30, 'Deadpool', 'DEADPOOL.jpg', 'dead, pool, deadpool'),
(52, 2, 1, 'Dead Rising 2', 6700, 40, 'Dead Rising 2', 'DeadR2.jpg', 'dead, rising, 2'),
(53, 2, 2, 'Dead Rising 3', 4000, 60, 'Los Perdidos egy zombiktól hemzsegő város. A hadsereg felrobbantja az egészet, hogy megfékezzék a járványt. Nincs halálvágyad. Két választásod van: megszökni Los Perdidosból vagy meghalni. Ez az alapötlet ennek a véres nyílt világú játéknak. Megvan, ami ahhoz kell, hogy túlélje a zombiapokalipszist ÉS a hadsereg ellenintézkedéseit?', 'DeadR3.jpg', 'dead, rising, 3'),
(54, 2, 3, 'Dead Rising 4', 1200, 7, 'A Dead Rising 4 lehetőséget kínál arra, hogy irányítsd Frank Westet, a sorozat egyik jól ismert főszereplőjét. Ismét az a célod, hogy túlélj, miközben pusztítást végzel egy zombikkal teli városban, de közben ne felejts el szórakozni is.', 'DeadR4.jpg', 'dead, rising, 4'),
(55, 8, 3, 'Dishonored (Complete Collection)', 23200, 40, 'Dishonored: Complete Collection', 'DISHONOREDCC.jpeg', 'dishonored, honor, complete, collection'),
(56, 2, 3, 'DOOM', 3000, 30, 'Az eredeti Doom több mint 20 éves, és annak idején ez a legendás játék alapvetően elindította az egész első személyű lövöldözős játék műfaját, ahogyan ma ismerjük. A Doom nélkül nem lennének Call of Duty, Halo, Battlefield vagy bármely más nagyszerű FPS-játék franchise, amelyet az évek során hoztak létre.\n\nVásároljon Doom Steam kulcsot, és tapasztalja meg az 1993-as klasszikus modern újragondolását. A Doom új iterációját az id Software fejlesztette ki, a Bethesda adta ki és 2016-ban jelent meg. Ez nem csupán az eredeti egy sekély grafikus reskinje. A legújabb Doom megragadja az 1990-es évek lövöldözőinek hangulatát, és lehetővé teszi a játékos számára, hogy újra átélje az FPS dicsőséges napjait egy új, új módon.', 'DOOM.jpg', 'doom'),
(57, 12, 2, 'Dragon Ball FighterZ', 4300, 30, 'Nem meglepő, hogy a Bandai Namco a világ egyik legjobb verekedős játékfejlesztőjével, az Arc System Networks-szel, a világ egyik legismertebb animesorozatával, a Dragon Ball-al párosítva egy teljesen fantasztikus harci játékot, a Dragont eredményezett. Ball FighterZ Steam kulcs. Vegyen részt a legkirívóbb és legkönnyebben eligazítható anime-alapú harci játékban, amely életre kelti kedvenc Dragon Ball Z karaktereit a világ valaha látott legvadabb csatáiban! Készen állsz arra, hogy az egyik legnagyobb harcossá válj, és addig harcolj, amíg el nem ejtesz?', 'DragonBallFighter.jpg', 'dragon, ball, fighter, fighterz'),
(58, 4, 2, 'Dark Souls 2', 8000, 30, 'Dark Souls 2', 'DS2.jpeg', 'dark, soul, souls, 2, II'),
(59, 4, 3, 'Dark Souls 3', 14000, 40, 'Dark Souls 3', 'DS3.jpg', 'dark, soul, souls, 3, III'),
(60, 4, 3, 'Dark Souls: Remastered', 10000, 60, 'Dark Souls - Remastered', 'DSremastered.jpg', 'dark, souls, soul, remastered, remaster'),
(61, 2, 1, 'Duke Nukem Forever', 4300, 20, 'Ha nem ismeri Duke Nukemet, hát akkor - egy csemege. És ha ismeri a Duke Nukemet, készüljön fel arra, hogy az izomszemüveges fickó visszatért a nyugdíjából, hogy a földönkívülieknek adjon egy darabot az elméjéből, figyelembe véve az összes inváziót!', 'DukeNukemForever.jpg', 'duke, nukem, forever'),
(62, 2, 5, 'Dying Light 2 Stay Human Deluxe Edition', 25000, 40, 'A Dying Light és a DLC-bővítések megkérdőjelezhetetlen sikert arattak, így nem meglepő, hogy a fejlesztő és a kiadó, a Techland elkezdett dolgozni a folytatáson. A Dying Light 2 Steam kulcs lehetőséget ad a 2015-ös eredeti folytatásának élvezetére, amely nem kevésbé ambiciózus, mint elődje, és alaposan kibővít minden olyan szempontot, amely annyira emlékezetessé és magával ragadóvá tette az első zombi témájú nyílt világú túlélési élményt.', 'DyingL2DE.jpeg', 'dying, light, 2, II, stay, human, deluxe, edition'),
(63, 2, 4, 'Dying Light 2 Stay Human', 16700, 50, 'A Dying Light és a DLC-bővítések megkérdőjelezhetetlen sikert arattak, így nem meglepő, hogy a fejlesztő és a kiadó, a Techland elkezdett dolgozni a folytatáson. A Dying Light 2 Steam kulcs lehetőséget ad a 2015-ös eredeti folytatásának élvezetére, amely nem kevésbé ambiciózus, mint elődje, és alaposan kibővít minden olyan szempontot, amely annyira emlékezetessé és magával ragadóvá tette az első zombi témájú nyílt világú túlélési élményt.', 'DyingLight2.jpeg', 'dying, light, 2, II, stay, human'),
(64, 2, 2, 'Dying Light', 6500, 50, 'A Dying Light és a DLC-bővítések megkérdőjelezhetetlen sikert arattak, így nem meglepő, hogy a fejlesztő és a kiadó, a Techland elkezdett dolgozni a folytatáson. A Dying Light 2 Steam kulcs lehetőséget ad a 2015-ös eredeti folytatásának élvezetére, amely nem kevésbé ambiciózus, mint elődje, és alaposan kibővít minden olyan szempontot, amely annyira emlékezetessé és magával ragadóvá tette az első zombi témájú nyílt világú túlélési élményt.', 'DyingLight.jpg', 'dying, light'),
(65, 4, 1, 'The Elder Scrolls III: Morrowind', 14000, 6, 'Morrowind', 'ESMorrowind.jpg', 'the, elder, scrolls, scroll, 3, II, morrow, morrowind, morro'),
(66, 4, 1, 'The Elder Scrolls IV: Oblivion (GOTY)', 16000, 12, 'A The Elder Scrolls IV: Oblivion egy nyitott világú akció-szerepjáték. A története a játékos azon erőfeszítései körül forog, hogy meghiúsítsa a \"Mythic Dawn\" fanatikus céhet, amely portálkapukat kíván kinyitni, hogy megidézze az Oblivion nevű démont. Ha érdekesnek tűnik számodra a világ felfedezése saját testreszabott karaktereddel, különféle küldetések, varázslatok használata és céhekkel való harc, ne habozz, és menj a végső kalandba.', 'ESOBLIVION.jpg', 'the, elder, scrolls, scroll, 4, IV, oblivion, goty, game, of, the, year'),
(67, 4, 2, 'The Elder Scrolls V: Skyrim', 6000, 40, 'Skyrim', 'ESSKYRIM.jpg', 'the, elder, scrolls, scroll, 5, V, skyrim'),
(68, 4, 4, 'The Elder Scrolls V: Skyrim Anniversary Edition', 16000, 50, 'Skyrim Anniversary', 'ESSKYRIManniversary.jpeg', 'the, elder, scrolls, scroll, 5, V, skyrim, anniversary, edition'),
(69, 4, 3, 'The Elder Scrolls V: Skyrim (Legendary Edition)', 4800, 60, 'Skyrim Legendary', 'ESskyrimLegendary.jpeg', 'the, elder, scrolls, scroll, 5, V, skyrim, legendary, edition'),
(70, 5, 3, 'Euro Truck Simulator 2', 5600, 50, 'Az Euro Truck Simulator sorozat második játéka, az Euro Truck Simulator 2 Steam kulcs segítségével igazán átérezheted, milyen távolsági teherautó-sofőrnek lenni. Ezzel a szimulátorral kiválaszthatja teherautóját, felveszi rakományát és eljuttatja azt a kívánt rendeltetési helyre valahol Európában vagy az Egyesült Államokban.', 'EuroTSim2.jpg', 'euro, truck, simulator, 2, II'),
(71, 13, 2, 'F1 2015', 6000, 13, 'F1 2015', 'F12015.jpg', 'F1, 2015, Formula, 1'),
(72, 13, 3, 'F1 2018', 6700, 16, 'F1 2018', 'F12018.jpeg', 'F1, 2018, Formula, 1'),
(73, 2, 1, 'Fallout 3', 3000, 50, 'A Fallout 3 2008-ban jelent meg, és ez volt az első Fallout játék, amelyet a Bethesda fejlesztett és adott ki. Ez egyben az első 3D-s játék a Fallout sorozatban, az előző részek körökre osztott lövöldözős játékok voltak, amelyek izometrikus perspektívából mutatták be az eseményeket. Ahogy megjelent, a Fallout 3 azonnali kritikai elismerést kapott, és bebiztosította helyét az olyan legendás sci-fi akció-RPG-k között, mint a Deus Ex, a Mass Effect és a Star Wars: Knights of the Old Republic. Vásárolja meg a Fallout 3 kulcsot, és merüljön el egy poszt-apokaliptikus játékban, amely ennek a műfajnak a meghatározó címe lett.', 'FallOut3.jpg', 'fall, fallout, out, 3'),
(74, 2, 2, 'Fallout 3 (GOTY)', 4500, 40, 'A Fallout 3 2008-ban jelent meg, és ez volt az első Fallout játék, amelyet a Bethesda fejlesztett és adott ki. Ez egyben az első 3D-s játék a Fallout sorozatban, az előző részek körökre osztott lövöldözős játékok voltak, amelyek izometrikus perspektívából mutatták be az eseményeket. Ahogy megjelent, a Fallout 3 azonnali kritikai elismerést kapott, és bebiztosította helyét az olyan legendás sci-fi akció-RPG-k között, mint a Deus Ex, a Mass Effect és a Star Wars: Knights of the Old Republic. Vásárolja meg a Fallout 3 kulcsot, és merüljön el egy poszt-apokaliptikus játékban, amely ennek a műfajnak a meghatározó címe lett.', 'Fallout3GOTY.jpg', 'fall, fallout, out, 3, year, goty'),
(75, 2, 3, 'Fallout 4', 7000, 60, 'Fallout 4', 'FallOut4.jpg', 'fall, fallout, out, 4'),
(76, 2, 1, 'Fallout New Vegas', 8000, 20, 'Fallout', 'FallOutNV.jpeg', 'fall, fallout, out, new, vegas'),
(77, 2, 1, 'Far Cry', 7800, 10, 'Far Cry by Ubisoft', 'FarC.jpeg', 'far, cry'),
(78, 2, 2, 'Far Cry 4', 6000, 40, 'Far Cry by Ubisoft', 'FarCry4.jpg', 'far, cry, 4'),
(79, 2, 3, 'Far Cry 5', 4500, 60, 'Far Cry by Ubisoft', 'FarCry5.jpg', 'far, cry, 5'),
(80, 2, 2, 'Far Cry New Dawn', 6700, 35, 'Far Cry by Ubisoft', 'FarCryNewDawn.jpeg', 'far, cry, new, dawn'),
(81, 2, 2, 'Far Cry Primal', 4300, 20, 'Far Cry by Ubisoft', 'FarCryPrimal.jpg', 'far, cry, primal'),
(82, 5, 1, 'Farming Simulator 17', 6000, 40, 'A Giants Software magával ragadó mezőgazdasági szimulátor játéka teljesen új játékmechanizmussal és rengeteg további funkcióval tér vissza. Készüljön fel néhány csúcsminőségű grafikára, valamint a gazdálkodás legteljesebb és legteljesebb megközelítésére a mai napig a Farming Simulator 22 segítségével! Fejlessze gazdaságát, tartsa az állatállományát, fedezzen fel és tartson fenn messzire kiterjedő területeket, vegyen részt számos mezőgazdasági tevékenységben, és vigye online élményeit akár 16 játékossal. Az állattenyésztéstől és a mezőgazdaságtól az erdészetig és még sok minden mást feldob az új szezonális ciklus – vásárolja meg a Farming Simulator 22 Steam kulcsot, és hagyja, hogy a jó idő növekedjen!', 'FarmS17.jpg', 'farm, farming, simulator, sim, 17, 2017'),
(83, 5, 2, 'Farming Simulator 19', 7000, 30, 'A Giants Software magával ragadó mezőgazdasági szimulátor játéka teljesen új játékmechanizmussal és rengeteg további funkcióval tér vissza. Készüljön fel néhány csúcsminőségű grafikára, valamint a gazdálkodás legteljesebb és legteljesebb megközelítésére a mai napig a Farming Simulator 22 segítségével! Fejlessze gazdaságát, tartsa az állatállományát, fedezzen fel és tartson fenn messzire kiterjedő területeket, vegyen részt számos mezőgazdasági tevékenységben, és vigye online élményeit akár 16 játékossal. Az állattenyésztéstől és a mezőgazdaságtól az erdészetig és még sok minden mást feldob az új szezonális ciklus – vásárolja meg a Farming Simulator 22 Steam kulcsot, és hagyja, hogy a jó idő növekedjen!', 'FarmS19.jpg', 'farm, farming, simulator, sim, 19, 2019'),
(84, 5, 3, 'Farming Simulator 22', 12300, 80, 'A Giants Software magával ragadó mezőgazdasági szimulátor játéka teljesen új játékmechanizmussal és rengeteg további funkcióval tér vissza. Készüljön fel néhány csúcsminőségű grafikára, valamint a gazdálkodás legteljesebb és legteljesebb megközelítésére a mai napig a Farming Simulator 22 segítségével! Fejlessze gazdaságát, tartsa az állatállományát, fedezzen fel és tartson fenn messzire kiterjedő területeket, vegyen részt számos mezőgazdasági tevékenységben, és vigye online élményeit akár 16 játékossal. Az állattenyésztéstől és a mezőgazdaságtól az erdészetig és még sok minden mást feldob az új szezonális ciklus – vásárolja meg a Farming Simulator 22 Steam kulcsot, és hagyja, hogy a jó idő növekedjen!', 'FarmS22.jpeg', 'farm, farming, simulator, sim, 22, 2022'),
(85, 2, 1, 'FEAR - Ultimate Shooter Edition', 2300, 30, 'FEAR - Ultimate Shooter Edition', 'FEAR.jpeg', 'fear, f.e.a.r, f.e.a.r., ultimate, shooter, edition'),
(86, 2, 2, 'F.E.A.R. 2: Project Origin', 4000, 23, 'Készülj fel, hogy visszatérj az ülés szélére a F.E.A.R. 3, az 1. nap stúdiójában egy újabb horror remekmű.', 'FEAR2.jpg', 'fear, f.e.a.r, f.e.a.r., 2, project, origin'),
(87, 4, 2, 'Final Fantasy III', 8000, 20, 'FF3', 'FF3.jpeg', 'final, fantasy, 3, III'),
(88, 4, 3, 'Final Fantasy VI', 9780, 50, 'FF6', 'FF6.jpeg', 'final, fantasy, 6, VI'),
(89, 4, 3, 'Final Fantasy VIII', 10000, 60, 'FF8', 'FF8.jpeg', 'final, fantasy, 8, VIII'),
(90, 4, 3, 'Final Fantasy XIII', 13450, 30, 'FF13', 'FF13.jpg', 'final, fantasy, 13, XIII'),
(91, 4, 4, 'Final Fantasy XV', 15000, 17, 'FF15', 'FF15.jpg', 'final, fantasy, 15, XV'),
(92, 4, 2, 'Final Fantasy IX', 12300, 30, 'FF9', 'FFIX.jpeg', 'final, fantasy, 9, IX'),
(93, 4, 1, 'Final Fantasy VII', 8700, 30, 'FF7', 'FFVII.jpeg', 'final, fantasy, 7, VII'),
(94, 6, 3, 'FIFA 21', 15000, 60, 'FIFA21', 'FIFA21.jpeg', 'fifa, 21'),
(95, 6, 2, 'FIFA 19', 13400, 40, 'FIFA19', 'FIFA19.jpeg', 'fifa, 19'),
(96, 6, 4, 'FIFA 22', 23560, 120, 'FIFA22', 'FIFA22.jpeg', 'fifa, 22'),
(97, 13, 1, 'FlatOut', 5000, 30, 'Flatout', 'FlatOut.jpeg', 'flatout, flat, out'),
(98, 13, 1, 'FlatOut 2', 4560, 40, 'Flatout2', 'Flatout2.jpeg', 'flatout, flat, out, 2, II'),
(99, 13, 1, 'Flatout 3: Chaos & Destruction', 6000, 10, 'Flatout3', 'Flatout3.jpeg', 'flatout, flat, out, 3, II, chas, destruction, and'),
(100, 13, 2, 'FlatOut: Complete Pack', 5650, 12, 'Flatout pack', 'FlatOutCompPACK.jpeg', 'flatout, flat, out, complete, pack'),
(101, 13, 2, 'FlatOut 4: Total Insanity', 4500, 40, 'Flatout4', 'FlatoutTotalInsanity.jpg', 'flatout, flat, out, total, insanity, 4, IV'),
(102, 13, 2, 'FlatOut: Ultimate Carnage', 5000, 50, 'Flatout ultimate', 'FlatOutUltimateC.jpeg', 'flatout, flat, out, ultimate, carnage'),
(103, 2, 4, 'God of War', 15670, 30, 'Teljesen váratlan és nagyszerű hírek érkeztek a PC-s játékosokhoz szerte a világon – négy évvel az eredeti megjelenés után érkezik a Steam platformra a „Santa Monica Studios” God of War (PC) Steam kulcsa, amely korábban kizárólag PlayStation 4-re volt. . Ez az első játék a God of War sorozatban, amely személyi számítógépeken jelenik meg. A PC-játékosok egyedülálló lehetőséget kapnak arra, hogy megtapasztalják a sorozat főszereplőjének, Kratosnak és fiának példátlan utazását a mitológiai Skandináviában. Célja az egyik legnagyobb és legfényűzőbb élmény az egész játékiparban.', 'GOW.jpeg', 'god, of, war, gow'),
(104, 13, 2, 'GRID', 3400, 30, 'Szeretnél a legjobb versenyző lenni? Vásároljon GRID Steam kulcsot. Ez egy versenysport játék, amely a soha nem látott versenyzési élményt a tökéletességig szimulálja. A Codemasters által kifejlesztett és kiadott cím még több valósághűséggel, mechanikai pontossággal és elképesztő fizikai motorral tér vissza. Döntsd el saját hitedet, kövesd megérzéseidet, és légy a legjobb a motorsportban, amit valaha látott!', 'GRID.jpeg', 'grid'),
(105, 13, 3, 'GRID 2', 4000, 40, 'A GRID 2 a lehetőség, hogy megszerezd a Race Driver: Grid ambiciózus folytatását a Steam platformon! Ez az egyik legismertebb versenycím, amelyet eredetileg az említett videojáték-műfaj szakértői – a Codemasters Studios – készítették és publikáltak. A fejlesztők az olyan elismert versenyjáték-sorozatokról is ismertek, mint az F1, a DiRT és a TOCA franchise egyéb részei.', 'GRID2.jpg', 'grid, 2, II'),
(106, 2, 1, 'Grand Theft Auto 3', 6000, 30, 'A Memory Lane a Liberty City egy másik neve! Térjünk vissza ahhoz az időhöz, amikor a Grand Theft Auto a ma ismert 3D-s valós akciójátékká vált. Nem baj, ha érzelmes leszel!', 'GTA3.jpg', 'grand, theft, auto, 3, III, gta'),
(107, 2, 3, 'GTA IV: Complete Edition', 5600, 50, 'A Grand Theft Auto IV Rockstar Games Launcher kulccsal (Complete Edition) mindent megtapasztalhat, amit a Liberty City kínál, és rengeteg kínálat található itt. Mind a játékmenet, mind a történet, amit ez az izgalmas, nyitott világ akciódús élménykínálata a legapróbb részletekig kivételes, úgyhogy ne várjon tovább, és induljon útnak itt, most!', 'GTA4COMPLETE.jpg', 'grand, theft, auto, 4, IV, complete, edition, gta'),
(108, 2, 4, 'Grand Theft Auto V', 8900, 60, 'GTA V', 'GTA5.jpg', 'grand, theft, auto, 5, V, gta'),
(109, 2, 2, 'Grand Theft Auto: San Andreas', 10000, 100, 'San Andreas', 'GTASA.jpg', 'grand, theft, auto, san, andreas, gta'),
(110, 2, 3, 'Grand Theft Auto : The Trilogy', 7800, 50, 'GTA Trilogy', 'GTATRILOGY.jpg', 'grand, theft, auto, the, trilogy, gta'),
(111, 2, 3, 'Grand Theft Auto: Vice City', 5600, 40, 'Vice City', 'GTAVICE.jpg', 'grand, theft, auto, vice, city, gta'),
(112, 2, 3, 'GTFO', 8000, 25, 'A GTFO játék egy népszerű első személyű lövöldözős kooperatív játék, amelyet a 10 Chambers Collective fejlesztett és adott ki. Miután megvásárolta a GTFO Steam kulcsot, élvezheti a lebilincselő és kifizetődő csapatközpontú horror FPS-t lopakodó elemekkel. A cím rendkívül hangulatos, titokzatos, és akciójával, lopakodásával, rejtvényeivel és a kísérteties egyedi érzésével meg fogja nyugtatni. Gyűjtsd össze a legénységet, ereszkedj le a sötét, külvárosi komplexumba, és tartsd szem előtt a játék fő szlogenjét: dolgozz együtt vagy halj meg együtt!', 'GTFO.jpg', 'gtfo, tf, gt, of'),
(113, 4, 3, 'Guild Wars 2: Heart of Thorns', 4300, 50, 'Guild Wars 2', 'GW2HeartofT.jpg', 'guild, wars, 2, war, heart, of, thorns, thorn'),
(114, 4, 3, 'Guild Wars 2 (Heroic Edition)', 5600, 40, 'Guild Wars 2 Heroic', 'GW2HEROIC.jpg', 'guild, wars, 2, war, heroic, edition, hero'),
(115, 4, 4, 'Guild Wars 2: Path of Fire', 6700, 30, 'PoF', 'GW2PoF.jpg', 'guild, wars, 2, war, path, of, fire'),
(116, 8, 3, 'Hellblade: Senua\'s Sacrifice', 6700, 45, 'Hellblade: Senua\'s Sacrifice', 'HellbladeSS.jpeg', 'hell, blade, hellblade, senua, sacrifice, senua\'s'),
(117, 2, 1, 'Hitman 2', 3300, 60, 'Hitman 2', 'Hitman2.jpg', 'hitman, 2'),
(118, 2, 1, 'Hitman: Absolution', 4000, 70, 'Hitman abs', 'HITMANabsolution.jpg', 'hitman, 2, II'),
(119, 2, 1, 'Hitman: Blood Money', 4560, 28, 'Hitman Blood M', 'HitmanBloodM.jpeg', 'hitman, blood, money'),
(120, 2, 1, 'Hitman: Contracts', 4600, 62, 'Hitman Contracts', 'HitmanContracts.jpeg', 'hitman, contracts, contract'),
(121, 11, 3, 'Hollow Knight', 7000, 45, 'A 2D-s kalandjátékok nem haltak meg! Nem messze! Bizonyítékra van szüksége? Hollow Knight!\n\nA Team Cherry fejlesztői elképesztő munkát végeztek egy olyan világ létrehozásában, amely hihetetlen, különösen, ha figyelembe vesszük azt a tényt, hogy az egész fejlesztőcsapat mindössze 3 főből áll!', 'HOLLOWK.jpeg', 'hollow, knight'),
(122, 2, 1, 'Homefront', 3400, 10, 'HomeFront', 'Homefront.jpg', 'homefront, home, front'),
(123, 11, 2, 'Human: Fall Flat', 3000, 40, 'HFF', 'HumanFF.jpg', 'human, fall, flat'),
(124, 5, 2, 'Hunting Simulator', 4030, 30, 'Hunting Sim', 'HuntingSim.jpg', 'hunting, simulator, hunt'),
(125, 2, 4, 'Hunt: Showdown', 12300, 120, 'A fenébe Louisiana, ijesztő vagy! A Pelikán Államot kísérteties szörnyek kísértik, amelyek mocsaraiban és falvaiban ólálkodnak, és végre elegük van belőle, rengeteg pénzt rakva minden szörny fejére. Legyél fejvadász a Crytek hihetetlen horror FPS Hunt: Showdown című játékában!', 'HUNTshowdown.jpeg', 'hunt, showdown, show, down'),
(126, 8, 1, 'Just Cause', 6000, 50, 'JC', 'jc.jpg', 'just, cause'),
(127, 2, 1, 'Just Cause 2', 6870, 60, 'JC2', 'JC2.jpg', 'just, cause, 2, II'),
(128, 2, 1, 'Just Cause 3', 9000, 70, 'JC3', 'JC3.jpg', 'just, cause, 3, III'),
(129, 2, 3, 'Just Cause 4 (Complete Edition)', 10670, 30, 'JC4 Complete', 'JC4.jpg', 'just, cause, 4, IV, complete, edition'),
(130, 2, 1, 'Killing Floor', 3450, 50, 'KF', 'KillingF.jpg', 'killing, floor, kill'),
(131, 2, 2, 'Killing Floor 2', 4300, 60, 'KF2', 'KillingFloor2.jpg', 'killing, floor, kill, 2, II'),
(132, 2, 1, 'Left 4 Dead', 2300, 45, 'A Valve arról híres a játékközösségben, hogy az évtizedek legjobb lövöldözős játékaival rukkolt elő, és a Left 4 Dead is ezek közé tartozik. Ha van valaki, akiben megbízhatsz, hogy jó FPS-t készítsen, az a srácok, akik már megalkották a Counter-Strike-ot és a Half-Life-ot.', 'L4D.jpg', 'left, 4, dead'),
(133, 2, 2, 'Left 4 Dead 2', 5600, 30, 'A Valve arról híres a játékközösségben, hogy az évtizedek legjobb lövöldözős játékaival rukkolt elő, és a Left 4 Dead is ezek közé tartozik. Ha van valaki, akiben megbízhatsz, hogy jó FPS-t készítsen, az a srácok, akik már megalkották a Counter-Strike-ot és a Half-Life-ot.', 'L4D2.jpg', 'left, 4, dead, 2, II'),
(134, 1, 1, 'Layers of Fear', 2340, 40, 'Layers of Fear', 'LayersOF.jpeg', 'layers, layer, of, fear'),
(135, 8, 3, 'Layers of Fear 2', 12340, 30, 'A Layers of Fear 2 kulcs egy első személyű pszichológiai horrorjátékot mutat be, amelyet a Bloober Team fejlesztett és a Gun Media adott ki. Ez a megdöbbentő folytatás, az eredetihez hasonlóan, egy észbontó horror létrehozására összpontosít egy történetvezérelt élményben. Te vagy a színész, és az elhagyott óceánjáró a te színpadod. Hogy ezt a filmes témájú élményt végigjárva mit találsz, az teljesen a képességeiden múlik. Te vagy a főszerep, és minden kamera a tiéd, hogy lenyűgözzön.', 'LayersOF2.jpeg', 'layers, layer, of, fear, 2, II'),
(136, 1, 1, 'Layers of Fear: Masterpiece Edition', 3400, 20, 'Layers of Fear: Masterpiece Edition', 'LayersOFMasterPED.jpg', 'layers, layer, of, fear, master, masterpiece, edition'),
(137, 8, 3, 'LEGO: The Hobbit', 4500, 60, 'LEGO', 'LEGOhobbit.jpeg', 'lego, the, hobbit'),
(138, 8, 1, 'LEGO: Harry Potter Years 5-7', 5000, 60, 'LEGO', 'LEGOhp.jpeg', 'lego, harry, potter, years, 5, 7'),
(139, 8, 1, 'LEGO Indiana Jones: The Original Adventures', 5650, 60, 'LEGO', 'LEGOindiana.jpeg', 'lego, indiana, jones, the, original, adventures, adventure'),
(140, 8, 1, 'LEGO: Pirates of the Caribbean', 3456, 60, 'LEGO', 'LegoPirate.jpg', 'lego, pirate, pirates, of, the, caribbean'),
(141, 8, 2, 'LEGO: Harry Potter Years 1-4', 4300, 60, 'LEGO', 'LEGOpotter.jpeg', 'lego, harry, potter, years, 1, 4'),
(142, 8, 2, 'LEGO: Star Wars III - The Clone Wars', 5000, 60, 'LEGO', 'LEGOsw3.jpg', 'lego, star, wars, 3, III, the, clone, wars, war'),
(143, 11, 1, 'Little Nightmares', 2300, 60, 'Little Nightmares', 'LillNightmares.jpg', 'little, nightmares, nightmare'),
(144, 11, 3, 'Little Nightmares II', 3000, 60, 'Little Nightmares 2', 'LillNightmares2.jpeg', 'little, nightmares, nightmare, 2, II'),
(145, 11, 2, 'Little Nightmares (Complete Edition)', 2710, 60, 'Little Nightmares Complete', 'LillNightmaresCE.jpg', 'little, nightmares, nightmare, complete, edition'),
(146, 11, 1, 'Limbo', 2000, 15, 'Limbo', 'LIMBO.jpeg', 'limbo, indie'),
(147, 6, 2, 'Madden NFL 22', 8900, 20, 'Madden', 'Madden22.jpeg', 'madden, mad, nfl, 22'),
(148, 8, 1, 'Mad Max', 3000, 40, 'MM', 'MADMAX.jpg', 'mad, max'),
(149, 2, 1, 'Max Payne', 4500, 30, 'MP', 'MaxP.jpeg', 'max, payne'),
(150, 2, 2, 'Max Payne 3', 6500, 20, 'MP3', 'MaxP3.jpg', 'max, payne, 3, III'),
(151, 2, 3, 'Max Payne Bundle', 7000, 64, 'Max Payne Bundle', 'MaxPbundle.jpeg', 'max, payne, bundle'),
(152, 2, 2, 'Mass Effect 2', 6500, 23, 'MF2', 'ME2.jpg', 'mass, effect, 2, II'),
(153, 2, 3, 'Mass Effect: Andromeda', 7000, 45, 'MF Andromeda', 'MEandromeda.jpg', 'mass, effect, andromeda'),
(154, 2, 2, 'Mass Effect Legendary Edition', 10000, 20, 'MF Legendary', 'MElegendaryED.jpeg', 'mass, effect, legendary, edition'),
(155, 2, 4, 'Metal Gear Rising - Revengeance', 12600, 60, 'nanomachines', 'MetalGRising.jpg', 'metal, gear, rising, revengeance'),
(156, 2, 2, 'Metro 2033 Redux', 4500, 30, 'Metro', 'METRO2033.jpeg', 'metro, 2033, redux'),
(157, 2, 2, 'Metro Exodus', 9800, 40, 'Metro Exodus', 'METROEX.jpeg', 'metro, exodus'),
(158, 2, 1, 'Metro Last Light Redux', 3450, 19, 'Metro Last Light', 'MetroLL.jpeg', 'metro, last, light, redux'),
(159, 2, 4, 'Metal Gear Solid V: The Phantom Pain', 25600, 12, 'big boss', 'MGSTHEPHANTOMPAIN.jpg', 'metal, gear, solid, 5, V, the, phantom, pain'),
(160, 12, 2, 'Mortal Kombat X', 5600, 40, 'MKX', 'MKX.jpg', 'mortal, kombat, x'),
(161, 12, 2, 'Mortal Kombat XL', 6000, 45, 'MKXL', 'MKXL.jpg', 'mortal, kombat, xl, x'),
(162, 2, 2, 'Medal of Honor (Standard Edition)', 6000, 30, 'MoH', 'MOH.jpeg', 'medal, of, honor, standard, edition'),
(163, 2, 3, 'Medal of Honor: Warfighter', 16000, 45, 'MoHW', 'MOHWarfighter.jpg', 'medal, of, honor, war, warfighter, fighter'),
(164, 4, 3, 'Mortal Shell', 12300, 15, 'Mortal Shell souls like', 'MortalShell.jpeg', 'mortal, shell'),
(165, 6, 1, 'NBA 2k9', 6000, 16, 'nba', 'NBA2K9.jpeg', 'nba, 2009, 2k9, 2k'),
(166, 6, 3, 'NBA 2K21', 10000, 23, 'nba 2021', 'NBA2K21.jpeg', 'nba, 2021, 2k21, 2k'),
(167, 6, 4, 'NBA 2K22', 11230, 40, 'nba 2022', 'NBA2K22.jpeg', 'nba, 2022, 2k22, 2k'),
(168, 13, 3, 'Need For Speed', 3000, 31, 'NFS', 'NFS.jpg', 'need, for, speed, nfs'),
(169, 13, 4, 'Need for Speed: Heat', 3450, 34, 'NFSH', 'NFSHEAT.jpeg', 'need, for, speed, nfs, heat'),
(170, 13, 1, 'Need for Speed: Most Wanted', 5400, 50, 'MOST WANTED', 'NFSMOST.jpg', 'need, for, speed, nfs, most, wanted, want'),
(171, 13, 1, 'Need for Speed: Rivals', 5000, 45, 'NFS RIVALS', 'NFSrivals.jpg', 'need, for, speed, nfs, rival, rivals'),
(172, 13, 3, 'Need for Speed: Shift', 6000, 56, 'NFS shift', 'NFSSHIFT.jpg', 'need, for, speed, nfs, shift'),
(173, 13, 3, 'Need for Speed: The Run', 5600, 50, 'nfs the run', 'NFSTheRUN.jpg', 'need, for, speed, nfs, the, run'),
(174, 4, 4, 'Nier: Automata', 10000, 40, 'nier', 'NIER.jpg', 'nier, automata, auto'),
(175, 11, 1, 'Ori and the Blind Forest (Definitive Edition)', 7000, 30, 'Őshonos erdőd haldoklik, miután egy hatalmas vihart számos pusztító esemény követett, és mindenkinek az az érzése, hogy ezek nem véletlenek, és minden mögött egy sötét erő áll.', 'ORI.jpg', 'ori, and, the, blind, forest, definitive, edition'),
(176, 1, 2, 'Outlast Trinity', 5670, 11, 'Outlast package', 'OutlastTrinity.jpeg', 'outlast, last, out, trinity'),
(177, 2, 1, 'Postal', 7000, 5, 'Postal', 'POSTAL.jpeg', 'postal'),
(178, 2, 1, 'POSTAL 2', 12000, 20, 'A napi házimunkák elvégzése egyszerű, ugyanakkor rendkívül unalmas! Mindez a Running With Scissors csapata által kifejlesztett POSTAL 2-ben megtörténik, ahol minden apró hiba veszélybe kerülhet az életedben!\n\nItt semmi sem tiltott, ezért ne lepődjön meg, ha azt tapasztalja, hogy egy csomag tej 5 dollárba is kerülhet, vagy hogy a könyvtárba való késői visszatérés felháborodást válthat ki a könyvtárosban!', 'POSTAL2.jpg', 'postal, 2, II'),
(179, 2, 1, 'Postal 3', 4000, 40, 'A napi házimunkák elvégzése egyszerű, ugyanakkor rendkívül unalmas! Mindez a Running With Scissors csapata által kifejlesztett POSTAL 2-ben megtörténik, ahol minden apró hiba veszélybe kerülhet az életedben!\n\nItt semmi sem tiltott, ezért ne lepődjön meg, ha azt tapasztalja, hogy egy csomag tej 5 dollárba is kerülhet, vagy hogy a könyvtárba való késői visszatérés felháborodást válthat ki a könyvtárosban!', 'POSTAL3.jpeg', 'postal, 3, III'),
(180, 2, 1, 'Quake', 8000, 20, 'Az egész retro stílusú FPS alműfajt megalapozó játék néhány jól megérdemelt fejlesztéssel tér vissza. A díjnyertes id Software stúdió egy újradefiniált kultikus klasszikust – a Quake! Tapasztalja meg az eredeti játék durvását, amelyet most frissítettek, hogy megfeleljen a modern játékszabványoknak 4K felbontás támogatásával, élsimítással, dinamikus világítással, FOV-val, átdolgozott modellekkel és még sok mással. Különféle sötét dimenziókból származó pokoli spawnok szállják meg világodat a négy mágikus rúna után. Az Ön feladata, hogy a Ranger véget vessen ennek az őrületnek. Vásárolj Quake Steam kulcsot, gyűjtsd össze a hatalmas műtárgyakat, és használd a hatalmat, hogy legyőzd az ősi gonoszt!', 'QUAKE.jpg', 'quake'),
(181, 2, 1, 'Quake IV', 5600, 34, 'Az egész retro stílusú FPS alműfajt megalapozó játék néhány jól megérdemelt fejlesztéssel tér vissza. A díjnyertes id Software stúdió egy újradefiniált kultikus klasszikust – a Quake! Tapasztalja meg az eredeti játék durvását, amelyet most frissítettek, hogy megfeleljen a modern játékszabványoknak 4K felbontás támogatásával, élsimítással, dinamikus világítással, FOV-val, átdolgozott modellekkel és még sok mással. Különféle sötét dimenziókból származó pokoli spawnok szállják meg világodat a négy mágikus rúna után. Az Ön feladata, hogy a Ranger véget vessen ennek az őrületnek. Vásárolj Quake Steam kulcsot, gyűjtsd össze a hatalmas műtárgyakat, és használd a hatalmat, hogy legyőzd az ősi gonoszt!', 'Quake4.jpeg', 'quake, IV, 4');
INSERT INTO `products` (`product_id`, `product_cat`, `product_discount`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`) VALUES
(182, 2, 1, 'QUAKE III Arena', 3440, 40, 'Az egész retro stílusú FPS alműfajt megalapozó játék néhány jól megérdemelt fejlesztéssel tér vissza. A díjnyertes id Software stúdió egy újradefiniált kultikus klasszikust – a Quake! Tapasztalja meg az eredeti játék durvását, amelyet most frissítettek, hogy megfeleljen a modern játékszabványoknak 4K felbontás támogatásával, élsimítással, dinamikus világítással, FOV-val, átdolgozott modellekkel és még sok mással. Különféle sötét dimenziókból származó pokoli spawnok szállják meg világodat a négy mágikus rúna után. Az Ön feladata, hogy a Ranger véget vessen ennek az őrületnek. Vásárolj Quake Steam kulcsot, gyűjtsd össze a hatalmas műtárgyakat, és használd a hatalmat, hogy legyőzd az ősi gonoszt!', 'QuakeARENA.jpg', 'quake, arena, 3, III'),
(183, 8, 2, 'Resident Evil - Biohazard HD Remaster', 5000, 30, 'resident evil hd', 'RE.jpeg', 'resident, evil, biohazard, hd, remaster, RE'),
(184, 2, 1, 'Resident Evil 0 / Biohazard 0 HD Remaster', 6000, 30, 'resident evil 0', 'RE0HDREM.jpg', 'resident, evil, biohazard, 0, hd, remaster, RE'),
(185, 1, 2, 'Resident Evil 2 / Biohazard RE:2', 5400, 17, 'resident evil 2', 'RE2.jpeg', 'resident, evil, biohazard, 2, II, RE'),
(186, 1, 1, 'Resident Evil: Revelations 2', 7000, 40, 'resident evil revelations 2', 'RE2revelations.jpg', 'resident, evil, biohazard, revelations, revelation, 2, II'),
(187, 2, 2, 'Resident Evil 3', 4500, 30, 'resident evil 3', 'RE3.jpeg', 'resident, evil, biohazard, 3, III'),
(188, 2, 1, 'Resident Evil 7 - Biohazard', 8000, 50, 'resident evil 7', 'RE7.jpg', 'resident, evil, biohazard, VII, 7'),
(189, 2, 4, 'Resident Evil Village / Resident Evil 8', 12560, 60, 'resident evil village', 'RE8.jpeg', 'resident, evil, biohazard, 8, VIII, village'),
(190, 2, 1, 'Resident Evil: Revelations', 3470, 34, 'resident evil revelations', 'RErevelations.jpg', 'resident, evil, biohazard, revelations, revelation'),
(191, 2, 1, 'S.T.A.L.K.E.R: Call of Pripyat', 10000, 30, 'stalker', 'StalkerCallofP.jpg', 'stalker, s.t.a.l.k.e.r, call, of, pripyat'),
(192, 2, 1, 'S.T.A.L.K.E.R.: Clear Sky', 5600, 40, 'stalker CS', 'StalkerClearSky.jpg', 'stalker, s.t.a.l.k.e.r, clear, sky'),
(193, 2, 1, 'S.T.A.L.K.E.R.: Shadow of Chernobyl', 13400, 45, 'stalker SoC', 'StalkerShadowOC.jpg', 'stalker, s.t.a.l.k.e.r, shadow, of, chernobyl');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(6, 'Boros', 'Tamas', 'tamasboros664@gmail.com', '1afc1a0f1ab9feec79a8461c92648c71', '0620416105', 'Simontornya, Ady Endre u. 14/c', '7081');


--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email_admin` (`email_admin`);

--
-- A tábla indexei `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id` (`users_id`);

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- A tábla indexei `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_product_id` (`product_id`),
  ADD KEY `fk_id_users` (`id_users`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_cat` (`product_cat`),
  ADD KEY `fk_product_discount` (`product_discount`);

--
-- A tábla indexei `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT a táblához `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`users_id`) REFERENCES `user_info` (`user_id`);

--
-- Megkötések a táblához `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_id_users` FOREIGN KEY (`id_users`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Megkötések a táblához `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `fk_product_discount` FOREIGN KEY (`product_discount`) REFERENCES `discounts` (`discount_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
