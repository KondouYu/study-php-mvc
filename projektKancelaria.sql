-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2018 at 07:44 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projektKancelaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `czynnosci`
--

CREATE TABLE `czynnosci` (
  `id` int(11) NOT NULL,
  `koszt` int(11) NOT NULL,
  `sprawaID` int(11) NOT NULL,
  `symbol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `miejsce` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `typCzynnosci` int(1) NOT NULL,
  `podtypCzynnosci` int(1) NOT NULL,
  `dataRozpoczecia` datetime NOT NULL,
  `dataZakonczenia` datetime NOT NULL,
  `opis` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `czynnosci`
--

INSERT INTO `czynnosci` (`id`, `koszt`, `sprawaID`, `symbol`, `nazwa`, `miejsce`, `typCzynnosci`, `podtypCzynnosci`, `dataRozpoczecia`, `dataZakonczenia`, `opis`) VALUES
(1, 0, 1, 'T - ROZ', 'Rozmowa z klientem', 'Biuro kancelarii', 1, 5, '2018-01-17 12:00:00', '2018-01-17 12:30:00', 'Rozmowa z klientem na temat zaistniałej sprawy i oferowanych przez kancelarię usług.'),
(2, 400, 1, 'D - ROZ', 'Dojazd do klienta', 'Mieszkanie klienta', 1, 3, '2018-01-17 14:00:00', '2018-01-17 15:00:00', 'Wizyta u klienta w celu ustalenia szczegółów.'),
(3, 1200, 4, 'AKT - PM', 'Sporządzenie aktu dla klienta', 'Biuro kancelarii', 1, 9, '2018-01-17 14:00:00', '2018-01-17 15:00:00', ''),
(4, 4500, 2, 'UR - BOP-K', 'Udział w rozprawie karnej', 'Sąd Rejonowy w Katowicach', 1, 2, '2018-01-17 16:00:00', '2018-01-17 17:00:00', 'Ustalono termin kolejnej rozprawy.'),
(5, 50, 2, 'KAR', 'Kara za zwłokę zapłaty za usługę', 'Biuro kancelarii', 4, 7, '2018-01-19 16:00:00', '2018-01-19 16:00:00', 'Klient zwleka ze spłatą.');

-- --------------------------------------------------------

--
-- Table structure for table `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `symbol` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imie` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nazwisko` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pesel` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrUmowy` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id`, `symbol`, `imie`, `nazwisko`, `pesel`, `email`, `nrUmowy`) VALUES
(1, 'JK', 'Jan', 'Kowalski', '81071194857', 'jan.kowalski@kancelaria.pl', '0001/01/2018'),
(2, 'AK', 'Anna', 'Kowalska', '80012409674', 'anna.kowalska@kancelaria.pl', '0002/01/2018'),
(3, 'DY', 'Dawid', 'Yerginyan', '96091163862', 'dawid.yerginyan@edu.uekat.pl', '0003/01/2018');

-- --------------------------------------------------------

--
-- Table structure for table `konta`
--

CREATE TABLE `konta` (
  `id` int(11) NOT NULL,
  `login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ziarno` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `haslo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `typ` int(1) DEFAULT NULL,
  `aktywne` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `konta`
--

INSERT INTO `konta` (`id`, `login`, `ziarno`, `haslo`, `typ`, `aktywne`) VALUES
(1, 'root@kancelaria.pl', '0f470aff', '8d8ff2d329176e5b28ddeb61577b80c0597f14bb7022a5c6def2ac0d34b3285858b2f68c4afefe5d9ec8195571b88fd2ae4df810ccfa1dc83dd7a5bce8ea3065', 1, 1),
(2, 'uzyszkodnik@kancelaria.pl', 'fe43f10b', '7f3b098b5f510718fb65db3485970d751134ad66eb44800fc03735e7e5de4804b40ad31c55d7758a50016c3ce505fcd6220cbcb462f71ec757a36560b6c8bd8f', 2, 1),
(3, 'klient@kancelaria.pl', '1c4fea0d', 'c302d2d0408aa790e5e494aeb6577e1e2a37e8fba4876360f2a06afd357bf0eabd1d0e0e97b961c1d3e8fbde558a36304ea46d1c0fa3534479fcc23fa6e1da81', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontaTyp`
--

CREATE TABLE `kontaTyp` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kontaTyp`
--

INSERT INTO `kontaTyp` (`id`, `nazwa`) VALUES
(1, 'Administrator'),
(2, 'Prawnik'),
(3, 'Klient');

-- --------------------------------------------------------

--
-- Table structure for table `podtypCzynnosci`
--

CREATE TABLE `podtypCzynnosci` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `podtypCzynnosci`
--

INSERT INTO `podtypCzynnosci` (`id`, `nazwa`) VALUES
(2, 'Udział w rozprawie'),
(3, 'Spotkania i porady ustne w rozmowie bezpośredniej'),
(4, 'Udział w negocjacjach'),
(5, 'Konsultacje telefoniczne'),
(6, 'Analiza prawna'),
(7, 'Informacja prawna'),
(8, 'Studiowanie dokumentów'),
(9, 'Sporządzenie aktu prawnego');

-- --------------------------------------------------------

--
-- Table structure for table `rozliczenia`
--

CREATE TABLE `rozliczenia` (
  `id` int(11) NOT NULL,
  `sprawaID` int(11) NOT NULL,
  `kwota` int(11) NOT NULL,
  `opis` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rozliczenia`
--

INSERT INTO `rozliczenia` (`id`, `sprawaID`, `kwota`, `opis`) VALUES
(1, 1, 400, 'Wpłata klienta'),
(2, 4, 2000, 'Nadpłata klienta z informacją o terminie wizyty w celu skorzystania z dodatkowych usług.');

-- --------------------------------------------------------

--
-- Table structure for table `sprawy`
--

CREATE TABLE `sprawy` (
  `id` int(11) NOT NULL,
  `symbol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dziedzina` int(1) NOT NULL,
  `nazwaInstytucji` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresInstytucji` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uwagi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `klientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sprawy`
--

INSERT INTO `sprawy` (`id`, `symbol`, `nazwa`, `dziedzina`, `nazwaInstytucji`, `adresInstytucji`, `uwagi`, `klientID`) VALUES
(1, 'ROZ', 'Rozwód', 11, 'Sąd Okręgowy w Katowicach', 'ul. Andrzeja 16-18', 'Brak.', 2),
(2, 'BOP-K', 'Bieżąca obsługa prawna - karne', 2, 'Sąd Rejonowy w Katowicach', 'ul. Lompy 14', 'Bieżąca obsługa prawna klienta z zakresu prawa karnego.', 3),
(3, 'BOP-E', 'Bieżąca obsługa prawna - egzekucja', 8, 'Sąd Okręgowy w Katowicach', 'ul. Andrzeja 16-18', 'Bieżąca obsługa prawna klienta podlegającego egzekucji komorniczej.', 1),
(4, 'PM', 'Podział majątku', 11, 'Sąd Rejonowy w Katowicach', 'ul. Lompy 14', 'Podział majątku będący skutkiem sprawy rozwodowej.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sprawyDziedzina`
--

CREATE TABLE `sprawyDziedzina` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sprawyDziedzina`
--

INSERT INTO `sprawyDziedzina` (`id`, `nazwa`) VALUES
(1, 'Prawo cywilne'),
(2, 'Prawo karne'),
(3, 'Prawo administracyjne'),
(4, 'Prawo finansowe'),
(5, 'Prawo międzynarodowe'),
(6, 'Prawo pracy'),
(7, 'Prawo budowlane'),
(8, 'Prawo egzekucyjne'),
(9, 'Prawo gospodarcze'),
(10, 'Prawo procesowe'),
(11, 'Prawo rodzinne'),
(12, 'Prawo konstytucyjne');

-- --------------------------------------------------------

--
-- Table structure for table `typCzynnosci`
--

CREATE TABLE `typCzynnosci` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `typCzynnosci`
--

INSERT INTO `typCzynnosci` (`id`, `nazwa`) VALUES
(1, 'Czynności na rzecz klientów'),
(2, 'Czynności nadzorcze'),
(3, 'Czynności administracyjne'),
(4, 'Czynności finansowe'),
(5, 'Czynności promocyjne');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `czynnosci`
--
ALTER TABLE `czynnosci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typCzynnosci` (`typCzynnosci`),
  ADD KEY `podtypCzynnosci` (`podtypCzynnosci`),
  ADD KEY `sprawaID` (`sprawaID`);

--
-- Indexes for table `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typ` (`typ`);

--
-- Indexes for table `kontaTyp`
--
ALTER TABLE `kontaTyp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podtypCzynnosci`
--
ALTER TABLE `podtypCzynnosci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rozliczenia`
--
ALTER TABLE `rozliczenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sprawaID` (`sprawaID`);

--
-- Indexes for table `sprawy`
--
ALTER TABLE `sprawy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dziedzina` (`dziedzina`),
  ADD KEY `klientID` (`klientID`);

--
-- Indexes for table `sprawyDziedzina`
--
ALTER TABLE `sprawyDziedzina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typCzynnosci`
--
ALTER TABLE `typCzynnosci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `czynnosci`
--
ALTER TABLE `czynnosci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konta`
--
ALTER TABLE `konta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kontaTyp`
--
ALTER TABLE `kontaTyp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `podtypCzynnosci`
--
ALTER TABLE `podtypCzynnosci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rozliczenia`
--
ALTER TABLE `rozliczenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sprawy`
--
ALTER TABLE `sprawy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sprawyDziedzina`
--
ALTER TABLE `sprawyDziedzina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `typCzynnosci`
--
ALTER TABLE `typCzynnosci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `czynnosci`
--
ALTER TABLE `czynnosci`
  ADD CONSTRAINT `czynnosci_ibfk_1` FOREIGN KEY (`sprawaID`) REFERENCES `sprawy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `czynnosci_ibfk_2` FOREIGN KEY (`podtypCzynnosci`) REFERENCES `podtypCzynnosci` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `czynnosci_ibfk_3` FOREIGN KEY (`typCzynnosci`) REFERENCES `typCzynnosci` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konta`
--
ALTER TABLE `konta`
  ADD CONSTRAINT `konta_ibfk_1` FOREIGN KEY (`typ`) REFERENCES `kontaTyp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rozliczenia`
--
ALTER TABLE `rozliczenia`
  ADD CONSTRAINT `rozliczenia_ibfk_1` FOREIGN KEY (`sprawaID`) REFERENCES `sprawy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sprawy`
--
ALTER TABLE `sprawy`
  ADD CONSTRAINT `sprawy_ibfk_1` FOREIGN KEY (`dziedzina`) REFERENCES `sprawyDziedzina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sprawy_ibfk_2` FOREIGN KEY (`klientID`) REFERENCES `klienci` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
