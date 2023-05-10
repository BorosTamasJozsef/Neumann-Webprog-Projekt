-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 10. 15:04
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `gremanandboros`
--
CREATE DATABASE IF NOT EXISTS `gremanandboros` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci;
USE `gremanandboros`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `name_admin` varchar(45) NOT NULL,
  `email_admin` varchar(75) NOT NULL,
  `jelszo_admin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznaloi_adat`
--

DROP TABLE IF EXISTS `felhasznaloi_adat`;
CREATE TABLE `felhasznaloi_adat` (
  `felhasz_id` int(10) NOT NULL,
  `keresztnev` varchar(45) NOT NULL,
  `vezeteknev` varchar(45) NOT NULL,
  `email_felhasz` varchar(75) NOT NULL,
  `jelszo_felhasz` varchar(60) NOT NULL,
  `lakcim` varchar(100) NOT NULL,
  `iranyitoszam` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

DROP TABLE IF EXISTS `kategoria`;
CREATE TABLE `kategoria` (
  `kat_id` int(10) NOT NULL,
  `kat_cim` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoria`
--

INSERT INTO `kategoria` (`kat_id`, `kat_cim`) VALUES
(1, 'szerszámok'),
(2, 'szerszámgépek'),
(3, 'faanyag'),
(4, 'fém/acél nyersanyagok'),
(5, 'egyéb fa termékek');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kosar`
--

DROP TABLE IF EXISTS `kosar`;
CREATE TABLE `kosar` (
  `id_kosar` int(10) NOT NULL,
  `term_azonosit` int(10) NOT NULL,
  `felhasz_azonosit` int(10) NOT NULL,
  `term_menny` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `leadott`
--

DROP TABLE IF EXISTS `leadott`;
CREATE TABLE `leadott` (
  `rendeles_id` int(10) NOT NULL,
  `felhasz_azon` int(10) NOT NULL,
  `termek_azon` int(10) NOT NULL,
  `rendelt_menny` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

DROP TABLE IF EXISTS `termekek`;
CREATE TABLE `termekek` (
  `termek_id` int(10) NOT NULL,
  `termek_kategoria` int(10) NOT NULL,
  `termek_neve` varchar(100) NOT NULL,
  `termek_ar` int(10) NOT NULL,
  `termek_raktaron` int(10) NOT NULL,
  `termek_leiras` varchar(200) NOT NULL,
  `termek_illusztracio` varchar(100) NOT NULL,
  `termek_kulcsszo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`termek_id`, `termek_kategoria`, `termek_neve`, `termek_ar`, `termek_raktaron`, `termek_leiras`, `termek_illusztracio`, `termek_kulcsszo`) VALUES
(1, 3, 'Gyalult léc - luc', 2000, 400, 'Szárított luc-, illetve borovi fenyő, négy oldalon gyalult, toldásmentes, natúr, kezeletlen faanyag, szegőléc. Mérete: 200 cm x 8 cm x 2 cm.', 'Gyalul_Lec.png', 'gyalult, léc, luc, fenyő'),
(2, 3, 'Fenyő homoklap', 3400, 430, 'Homloklap anyaga:  szárított borovi fenyő, 40 -70 mm széles elemekből ragasztott, táblásított, gyalult, natúr, kezeletlen faanyag. Mérete: 80 cm x 19,5 cm x 1,8 cm.', 'Homoklap.png', 'homoklap, fenyő, homok, lap'),
(3, 3, 'Polc lap', 1700, 250, 'Polc lap anyaga: lucfenyő, 40 -70 mm széles elemekből ragasztott, táblásított, gyalult, natúr, kezeletlen faanyag. Esztétikus göcsök előfordulhatnak. Mérete: 150 cm x 19,5 cm x 1,8 cm.', 'Polc_Lap.png', 'polc, lap, lucfenyő, luc, fenyő'),
(4, 1, 'Falbontó Kalapács', 4300, 30, 'Méret: 1 kg', 'Falbonto_Kalapacs.png', 'kalapács, falbontó'),
(5, 1, 'Gumikalapács', 3400, 30, 'Méret: 25dkg', 'Gumikalapacs.png', 'kalapács, gumi, gumikalapács'),
(6, 1, 'Kalapács', 1200, 60, 'Méret: 0,8 kg', 'Kalapacs_Sima.png', 'kalapács'),
(7, 1, 'Kőműves Kalapács', 6500, 30, 'Festa fanyelű', 'Kalapacs_Komuves.png', 'kalapács, kőműves'),
(8, 1, 'Szerelő Kalapács', 2000, 78, 'Gumi-műanyag', 'Kalapacs_Szerelo.png', 'kalapács, szerelő, gumi, műanyag'),
(9, 1, 'Imbuszkulcs nyeles \'L\' gömb végű', 3200, 82, 'Méret: 2×100', 'Imbuszkulcs_I', 'imbuszkulcs, imbusz, kulcs, nyeles, L, gömb'),
(10, 1, 'Imbuszkulcs Hosszított', 1300, 120, 'Méret: 7', 'Imbuszkulcs_II', 'imbuszkulcs, kulcs, imbusz, hosszított'),
(11, 1, 'Marokcsavarhúzó (PH)', 890, 30, 'Fekete-piros nyél, Penge: CroMoV-acélötvözet, matt, fekete hegy, Nyél: kétkomponensű (gumi+műanyag), ergonómikus, csúszásmentes, olaj-, és vegyszerálló', 'Csavarzhuo_Marok.png', 'csavarhúzó, csavar, húzó, marok, marokcsavarhúzó, PH'),
(12, 1, 'Csavarhúzó', 1000, 45, 'Fekete-piros nyél, Penge: CroMoV-acélötvözet, matt, fekete hegy, Nyél: kétkomponensű (gumi+műanyag), ergonómikus, csúszásmentes, olaj-, és vegyszerálló', 'Csavarhuzo_Alap.png', 'csavarhúzó, csavar, húzó'),
(13, 1, 'Csavarhúzó 1000V, fázisceruza', 2300, 12, 'piros nyéllel, VDE DIN EN 60900 és IEC 900 szabványok szerint, ipari és professzionális célokra', 'Csavarhuzo_1000V.png', 'csavarhúzó, csavar, húzó, 1000V, fázisceruza, fázis, ceruza'),
(14, 1, 'Csavarhúzó általános', 1100, 10, 'Fekete-piros nyél, Penge: CroMoV-acélötvözet, matt, fekete hegy, Nyél: kétkomponensű (gumi+műanyag), ergonómikus, csúszásmentes, olaj-, és vegyszerálló', 'Csavarhuzo_Alap2.png', 'csavarhúzó, csavar, húzó, általános'),
(15, 1, 'Adapter készlet', 2000, 50, 'Adapterek', 'Adapterek.png', 'adapter, készlet'),
(16, 1, 'Bit adapter', 980, 43, 'Kivitel: E6,3 – 1/4 50mm', 'Bit_Adapter.png', 'bit, adapter'),
(17, 1, 'Tűzőgép', 13560, 10, ' Stanley fémházas \'A\' 6-10mm', 'Tuzogep.png', 'tűzőgép, tűző, gép'),
(18, 1, 'Ragasztópisztoly', 8000, 12, 'Topex 78W', 'RagasztoP.png', 'ragasztópisztoly, ragasztó, pisztoly'),
(19, 1, 'Popszegecshúzó 2,4-4,8', 8700, 20, 'Kivitel: Stanley profi', 'Szegecshuzo.png', 'popszegecshúzó, popszegecs, szegecs, húzó'),
(20, 1, 'Ragasztórúd', 400, 120, 'Pattex', 'RagasztoR.png', 'ragasztórúd, ragasztó, rúd'),
(21, 1, 'Csőfogó YATO', 7800, 25, 'Csőfogó', 'Csofogo.png', 'csőfogó, yato, cső, fogó'),
(22, 1, 'Blankolófogó automata Modeco', 3400, 12, 'Fogó', 'Blankolofog.png', 'blankolófogó, automata, blankoló, fogó, modeco'),
(23, 1, 'Falc fogó Neo', 17600, 10, 'Kivitel: 180 fokos', 'Falcfogo.png', 'falc, fogó, neo'),
(24, 1, 'Kábelvágó YATO', 4000, 45, 'Méret: 210mm max. 7mm', 'Kabelvago.png', 'kábelvágó, kábel, vágó, yato'),
(25, 1, 'Patentfogó', 4500, 67, 'Típus: 240mm YATO', 'Patentfogo.png', 'patentfogó, patent, fogó'),
(26, 1, 'Rádiós fogó', 2300, 15, 'Típus: 130mm műszerész Modeco', 'Radios_Fogo.png', 'rádiós, fogó, rádió'),
(27, 1, 'Vízpumpafogó', 6721, 12, 'Méret: 250mm YATO', 'Vizpumpafogo.png', 'vízpumpafogó, víz, pumpa, fogó'),
(28, 1, 'Zégerfogó külső Modeco', 1240, 56, 'Méret: 150mm hajlított', 'Zegerfogo.png', 'zégerfogó, külső, modeco, hajlított, zéger, fogó'),
(29, 1, 'Csillag-villás kulcs Vorel - Készlet', 6700, 20, 'Méret: 6, 7, 8, 9, 10, 11, 12, 13, 14, 15', 'Csillag_Kulcs.png', 'csillag-villás, csillag, villás, kulcs, vorel, készlet'),
(30, 1, 'Kerékkulcs', 4500, 30, 'Kerékkulcs', 'Kerek_Kulcs.png', 'kerékkulcs, kerék, kulcs'),
(31, 1, 'Csőkulcs - Készlet', 5600, 12, 'Méret: 6-7, 8-9, 10-11, 12-13, 14-15', 'Csokulcs.png', 'csőkulcs, cső, kulcs, készlet'),
(32, 1, 'Villáskulcs nagyméretű', 4000, 33, 'Méret: 36', 'Villas_Kulcs.png', 'villáskulcs, nagyméretű, villás, kulcs, nagy'),
(33, 1, 'Csavarkulcs állítható YATO', 5000, 12, 'Méret: 150mm', 'Csavarkulcs.png', 'csavarkulcs, csavar, kulcs, állítható, yato'),
(34, 1, 'Asztalos szorító egykezes', 4530, 10, 'Méret: 50x150mm Topex', 'Asztalszorito.png', 'asztalos, szorító, egykezes, topex'),
(35, 1, 'Asztalos szorító Modeco', 10000, 5, 'Méret: 120x1000mm', 'Asztalszorito2.png', 'asztalos, szorító, modeco'),
(36, 1, 'Derékszög acél - Készlet', 12300, 8, 'Méret: 100×60, 100×60 talpas, 160×100, 160×100 talpas, 250×160, 250×160 talpas', 'Derek_Acel.png', 'derékszög, acél, derék, szög, készlet, talpas'),
(37, 1, 'Derékszög Topex', 1000, 56, 'Méret: 250mm', 'Derek_Topex.png', 'derékszög, derék, szög, topex'),
(38, 1, 'Makita lézeres távolságmérő', 28900, 10, 'A Makita LD030P lézeres távolságmérő por és cseppálló készülék. Gyors és megbízható működése, pontos mérési eredményeket tesz lehetővé.', 'Lezeres_Tav.png', 'makita, lézeres, lézer, távolságmérő, távolság, mérő'),
(39, 3, 'Gyalult szegőléc - luc', 800, 230, 'Gyalult léc: Szárított luc-, illetve borovi fenyő, négy oldalon gyalult, toldásmentes, natúr, kezeletlen faanyag, szegőléc. Mérete: 200 cm x 1 cm x 1 cm', 'Gyalult_Lec2.png', 'gyalult, szegőléc, luc, szegő, léc'),
(40, 3, 'Borovi fenyő lépcsőlap', 5600, 150, 'Lépcsőlap: Szárított borovi fenyő, táblásított, gyalult, natúr, kezeletlen faanyag. Mérete: 80 cm x 28 cm x 2,8 cm', 'Lepcsolap.png', 'borovi, fenyő, lépcsőlap, lépcső, lap'),
(41, 5, 'Virágdézsa 32cm x 30cm', 8700, 2, 'Anyaga: Akácfa virágdézsa, kívül lakkozott, 2 cm vastag, I. osztályú faanyag fém abroncsokkal. Mérete: 32 cm x ⌀ 30 cm', 'ViragDezsa.jpg', 'virágdézsa, virág, dézsa, akác'),
(42, 1, 'Sniccer 25mm', 1300, 67, 'Típus: Olfa normál, Staley tekerős, YATO normál, Topex tekerős', 'Sniccer.png', 'sniccer, tekerős, yato'),
(43, 1, 'Zsebkés', 2310, 12, 'Kivitel: YATO profi', 'Zsebkes.png', 'zsebkés, zseb, kés, yato'),
(44, 1, 'Ablak kaparó', 450, 12, 'Típus: Olfa XSR-200 üthető', 'Ablak_Kaparo.png', 'ablak, kaparó, olfa'),
(45, 1, 'Drótkefe - Készlet', 5670, 8, 'Kivitel: Íves piros acél dróttal, Íves zöld inox dróttal, Íves szürke sárgaréz dróttal, 5 soros fanyelű, 5 soros műanyag nyelű, Gyertyakefe sárgaréz dróttal', 'Drotkefe.png', 'drótkefe, drót, kefe, készlet'),
(46, 2, 'Makita dekopírfűrész 450W (4329)', 28900, 5, 'A Makita 4329 szúrófűrész fa, műanyag, fém vágására használható.', 'Dekopir_Furesz.png', 'makita, dekopírfűrész, dekopir, fűrész, 450W'),
(47, 2, 'Makita akkus ütvefúró-csavarbehajtó 18V (DHP453RFE)', 98900, 2, 'Makita DHP453RFE akkus ütvefúró-csavarbehajtó 2 db 3,0 Ah akkumulátorral gyorstöltővel hordtáskában', 'Utvefuro.png', 'makita, akkus, ütvefúró-csavarbehajtó, ütvefúró, fúró, csavarbehajtó, ');

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
-- A tábla indexei `felhasznaloi_adat`
--
ALTER TABLE `felhasznaloi_adat`
  ADD PRIMARY KEY (`felhasz_id`);

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`kat_id`);

--
-- A tábla indexei `kosar`
--
ALTER TABLE `kosar`
  ADD PRIMARY KEY (`id_kosar`),
  ADD KEY `fk_felhasz_azonosit` (`felhasz_azonosit`),
  ADD KEY `fk_term_azonosit` (`term_azonosit`);

--
-- A tábla indexei `leadott`
--
ALTER TABLE `leadott`
  ADD PRIMARY KEY (`rendeles_id`),
  ADD KEY `fk_felhasz_azon` (`felhasz_azon`),
  ADD KEY `fk_termek_azon` (`termek_azon`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`termek_id`),
  ADD KEY `fk_termek_kategoria` (`termek_kategoria`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `felhasznaloi_adat`
--
ALTER TABLE `felhasznaloi_adat`
  MODIFY `felhasz_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `kat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `kosar`
--
ALTER TABLE `kosar`
  MODIFY `id_kosar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `leadott`
--
ALTER TABLE `leadott`
  MODIFY `rendeles_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `termek_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `kosar`
--
ALTER TABLE `kosar`
  ADD CONSTRAINT `fk_felhasz_azonosit` FOREIGN KEY (`felhasz_azonosit`) REFERENCES `felhasznaloi_adat` (`felhasz_id`),
  ADD CONSTRAINT `fk_term_azonosit` FOREIGN KEY (`term_azonosit`) REFERENCES `termekek` (`termek_id`);

--
-- Megkötések a táblához `leadott`
--
ALTER TABLE `leadott`
  ADD CONSTRAINT `fk_felhasz_azon` FOREIGN KEY (`felhasz_azon`) REFERENCES `felhasznaloi_adat` (`felhasz_id`),
  ADD CONSTRAINT `fk_termek_azon` FOREIGN KEY (`termek_azon`) REFERENCES `termekek` (`termek_id`);

--
-- Megkötések a táblához `termekek`
--
ALTER TABLE `termekek`
  ADD CONSTRAINT `fk_termek_kategoria` FOREIGN KEY (`termek_kategoria`) REFERENCES `kategoria` (`kat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
