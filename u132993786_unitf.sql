-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Mar 2015, 07:52
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `u132993786_unitf`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE IF NOT EXISTS `klienci` (
`id` int(11) NOT NULL,
  `imie` varchar(15) NOT NULL,
  `nazwisko` varchar(25) NOT NULL,
  `data-wpisania` datetime NOT NULL,
  `kod-pocztowy` varchar(6) NOT NULL,
  `miejscowosc` varchar(30) NOT NULL,
  `ulica` varchar(45) NOT NULL,
  `firma` varchar(45) DEFAULT NULL,
  `e-mail` varchar(45) NOT NULL,
  `telefon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowania`
--

CREATE TABLE IF NOT EXISTS `logowania` (
`id` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `logowania`
--

INSERT INTO `logowania` (`id`, `data`) VALUES
(1, '2015-03-06 19:12:37'),
(2, '2015-03-07 07:51:35');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `notatki_zgloszen`
--

CREATE TABLE IF NOT EXISTS `notatki_zgloszen` (
  `id` int(11) NOT NULL,
  `tresc` mediumtext NOT NULL,
  `data_dodania` datetime NOT NULL,
  `urzytkownicy_id` int(11) NOT NULL,
  `zgloszenie_kod_kreskowy` varchar(5) NOT NULL,
  `statusy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE IF NOT EXISTS `pracownicy` (
`id` int(11) NOT NULL,
  `imie` varchar(15) NOT NULL,
  `nazwisko` varchar(25) NOT NULL,
  `data-urodzenia` date NOT NULL,
  `data-zatrudnienia` date NOT NULL,
  `kod-pocztowy` varchar(6) NOT NULL,
  `miejscowosc` varchar(45) NOT NULL,
  `ulica` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id`, `imie`, `nazwisko`, `data-urodzenia`, `data-zatrudnienia`, `kod-pocztowy`, `miejscowosc`, `ulica`) VALUES
(1, 'admin', 'admin', '2015-01-01', '2015-01-01', '00-000', 'Warszawa', 'Słoneczna 1'),
(2, 'Jan', 'Kowalski', '2015-01-01', '2015-01-01', '00-000', 'Warszawa', 'Słoneczna 1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statusy`
--

CREATE TABLE IF NOT EXISTS `statusy` (
`id` int(11) NOT NULL,
  `nazwa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
`id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `haslo` varchar(32) NOT NULL,
  `data_utworzenia` datetime NOT NULL,
  `kto_utworzyl` varchar(20) NOT NULL,
  `logowania_id` int(11) NOT NULL,
  `pracownicy_id` int(11) NOT NULL,
  `rola` enum('admin','pracownik') NOT NULL DEFAULT 'pracownik'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `data_utworzenia`, `kto_utworzyl`, `logowania_id`, `pracownicy_id`, `rola`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-01-01 00:00:00', 'admin', 1, 1, 'admin'),
(2, 'kowalski', '7f78c715b9e2e417a810039c9f8b0d11', '2015-01-01 00:00:00', 'admin', 2, 2, 'pracownik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenie`
--

CREATE TABLE IF NOT EXISTS `zgloszenie` (
  `kod_kreskowy` varchar(5) NOT NULL,
  `nazwa` varchar(45) NOT NULL,
  `data_przyjecia` datetime NOT NULL,
  `usuniety` bit(1) NOT NULL DEFAULT b'0',
  `urzytkownicy_id` int(11) NOT NULL,
  `klienci_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `klienci`
--
ALTER TABLE `klienci`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logowania`
--
ALTER TABLE `logowania`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notatki_zgloszen`
--
ALTER TABLE `notatki_zgloszen`
 ADD PRIMARY KEY (`id`,`urzytkownicy_id`,`zgloszenie_kod_kreskowy`,`statusy_id`), ADD KEY `fk_Notatki_zgloszen_urzytkownicy1_idx` (`urzytkownicy_id`), ADD KEY `fk_Notatki_zgloszen_zgloszenie1_idx` (`zgloszenie_kod_kreskowy`), ADD KEY `fk_Notatki_zgloszen_statusy1_idx` (`statusy_id`);

--
-- Indexes for table `pracownicy`
--
ALTER TABLE `pracownicy`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statusy`
--
ALTER TABLE `statusy`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
 ADD PRIMARY KEY (`id`,`logowania_id`,`pracownicy_id`), ADD KEY `fk_urzytkownicy_logowania_idx` (`logowania_id`), ADD KEY `fk_urzytkownicy_pracownicy1_idx` (`pracownicy_id`);

--
-- Indexes for table `zgloszenie`
--
ALTER TABLE `zgloszenie`
 ADD PRIMARY KEY (`kod_kreskowy`,`urzytkownicy_id`,`klienci_id`), ADD KEY `fk_zgloszenie_urzytkownicy1_idx` (`urzytkownicy_id`), ADD KEY `fk_zgloszenie_klienci1_idx` (`klienci_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `logowania`
--
ALTER TABLE `logowania`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `statusy`
--
ALTER TABLE `statusy`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `notatki_zgloszen`
--
ALTER TABLE `notatki_zgloszen`
ADD CONSTRAINT `fk_Notatki_zgloszen_statusy1` FOREIGN KEY (`statusy_id`) REFERENCES `statusy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Notatki_zgloszen_urzytkownicy1` FOREIGN KEY (`urzytkownicy_id`) REFERENCES `uzytkownicy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Notatki_zgloszen_zgloszenie1` FOREIGN KEY (`zgloszenie_kod_kreskowy`) REFERENCES `zgloszenie` (`kod_kreskowy`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
ADD CONSTRAINT `fk_urzytkownicy_logowania` FOREIGN KEY (`logowania_id`) REFERENCES `logowania` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_urzytkownicy_pracownicy1` FOREIGN KEY (`pracownicy_id`) REFERENCES `pracownicy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `zgloszenie`
--
ALTER TABLE `zgloszenie`
ADD CONSTRAINT `fk_zgloszenie_klienci1` FOREIGN KEY (`klienci_id`) REFERENCES `klienci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_zgloszenie_urzytkownicy1` FOREIGN KEY (`urzytkownicy_id`) REFERENCES `uzytkownicy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
