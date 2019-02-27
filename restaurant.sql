-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 feb 2019 om 11:24
-- Serverversie: 10.1.32-MariaDB
-- PHP-versie: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menuitem`
--

CREATE TABLE `menuitem` (
  `MenuItemID` int(11) NOT NULL,
  `ItemName` varchar(255) DEFAULT NULL,
  `ItemPrice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `menuitem`
--

INSERT INTO `menuitem` (`MenuItemID`, `ItemName`, `ItemPrice`) VALUES
(1, 'pizza salami', 10),
(2, 'pizza tonno', 12);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `MenuItemID` int(11) DEFAULT NULL,
  `ReceiptID` int(11) DEFAULT NULL,
  `Res_Datum` date DEFAULT NULL,
  `Tafel_Id` int(11) DEFAULT NULL,
  `Res_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`OrderID`, `MenuItemID`, `ReceiptID`, `Res_Datum`, `Tafel_Id`, `Res_ID`) VALUES
(6, 2, 3, '2019-01-21', 3, 5),
(9, 2, 2, '2019-01-22', 5, 0),
(10, 2, 5, '2019-01-21', 5, 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `receipt`
--

CREATE TABLE `receipt` (
  `ReceiptID` int(11) NOT NULL,
  `ReceiptPrice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen`
--

CREATE TABLE `reserveringen` (
  `Reservering_Id` int(11) NOT NULL,
  `Tafel_Id` int(11) NOT NULL,
  `VoorNaam` varchar(255) NOT NULL,
  `AchterNaam` varchar(255) DEFAULT NULL,
  `TelefoonNummer` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Res_Datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reserveringen`
--

INSERT INTO `reserveringen` (`Reservering_Id`, `Tafel_Id`, `VoorNaam`, `AchterNaam`, `TelefoonNummer`, `Email`, `Res_Datum`) VALUES
(8, 5, 'bob', 'de bouwer', '0677889982', 'bobdebouwer@gmail.com', '2019-01-22');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tafels`
--

CREATE TABLE `tafels` (
  `Tafel_Id` int(11) NOT NULL,
  `tafel_Nummer` int(11) DEFAULT NULL,
  `Aantal_Personen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tafels`
--

INSERT INTO `tafels` (`Tafel_Id`, `tafel_Nummer`, `Aantal_Personen`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 4),
(4, 4, 4),
(5, 5, 6),
(6, 6, 6);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`MenuItemID`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexen voor tabel `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`ReceiptID`);

--
-- Indexen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`Reservering_Id`);

--
-- Indexen voor tabel `tafels`
--
ALTER TABLE `tafels`
  ADD PRIMARY KEY (`Tafel_Id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `MenuItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ReceiptID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `Reservering_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `tafels`
--
ALTER TABLE `tafels`
  MODIFY `Tafel_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
