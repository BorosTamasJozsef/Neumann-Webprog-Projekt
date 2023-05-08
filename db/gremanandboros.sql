-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 08. 18:23
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
  MODIFY `kat_id` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `termek_id` int(10) NOT NULL AUTO_INCREMENT;

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
