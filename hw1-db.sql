-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 04, 2024 alle 15:19
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw1-db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `IDArticolo` int(11) NOT NULL,
  `NomeArticolo` varchar(255) NOT NULL,
  `ColoreArticolo` varchar(255) NOT NULL,
  `PrezzoArticolo` float NOT NULL,
  `ImmagineArticolo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`IDArticolo`, `NomeArticolo`, `ColoreArticolo`, `PrezzoArticolo`, `ImmagineArticolo`) VALUES
(1, 'Nine | T-Shirt – Zero 2', 'Nero', 20, 'art1-ninesquared-zero2-black-bk-U.jpg'),
(2, 'Nine | T-Shirt – Zero 2', 'Rosso', 25, 'art2-ninesquared-zero2-img2-U.jpg'),
(3, 'Nine | T-Shirt – Stargazer Anniversary', 'Nero', 20, 'art3-ninesquared-tshirt-stargazer-anniversary-bk-U.jpg'),
(4, 'Nine | T-Shirt – Stargazer Elements', 'Nero', 30, 'art4-ninesquared-tshirt-stargazer-elements-bk-U.jpg'),
(5, 'Nine | Felpa – Slide Zip', 'Nero', 50, 'art5-ninesquared-slide-zip-black-bk-U.jpg'),
(6, 'Nine | Felpa – Slide Grey', 'Grigio', 40, 'art6-ninesquared-slide-grey-bk-M.jpg'),
(7, 'Nine | Felpa – Free Crew', 'Oliva', 50, 'art7-ninesquared-free-crew-olive-bk-U.jpg'),
(8, 'Nine | Felpa – Cropped Element', 'Bianco', 60, 'art8-ninesquared-cropped-white-elements-bk.jpg'),
(9, 'Nine | Polo – Presser 2', 'Blue Navy', 45, 'art9-ninesquared-presser2-blue-navy-bk-M.jpg'),
(10, 'Nine | Polo – Presser 2', 'Rosso', 45, 'art10-ninesquared-presser2-img2-M.jpg'),
(11, 'Nine | Pantaloncini – Osaka', 'Azzurro/Viola', 40, 'art11-ninesquared-quattro-shorts-osaka-M-white-blue-Copia.jpg'),
(12, 'Nine | Pantaloncini – Quick 2', 'Royal Blue', 20, 'art12-ninesquared-quick2-royal-blue-bk-U.jpg'),
(13, 'Nine | Pantaloncini – Fast 3', 'Blu', 30, 'art13-ninesquared-fast3-img1-W.jpg'),
(14, 'Nine | Ginocchiere – Shield Back', 'Bianco', 30, 'art14-ninesquared-new-shield-back-bianco.jpg'),
(15, 'Nine | Ginocchiere – Sleek Black', 'Nero', 35, 'art15-ninesquared-sleek-black-img1-U.jpg'),
(16, 'Nine | Ginocchiere – Next Generation', 'Bianco', 25, 'art16-ninesquared-next-generation-short-white-back.jpg'),
(17, 'Nine | Gomitiere – Elbow Pads NG', 'Bianco', 25, 'art17-ninesquared-elbow-pads-white-img1-U.jpg'),
(18, 'Nine | Gomitiere – Elbow Pads NG', 'Blu', 25, 'art18-ninesquared-elbow-pads-blue-navy-img1-U.jpg'),
(19, 'Nine | Gomitiere – Elbow Pads NG', 'Nero', 25, 'art19-ninesquared-elbow-pads-black-img1-U.jpg'),
(20, 'Nine | Zaino – Calle 2', 'Nero', 80, 'art20-ninesquared-calle2-black-fr2-U.jpg'),
(21, 'Nine | Zaino – Riva', 'Blu', 65, 'art21-ninesquared-riva-blue-navy-bk-U.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID` int(11) NOT NULL,
  `NomeUtente` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Cognome` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID`, `NomeUtente`, `Password`, `Nome`, `Cognome`, `Email`) VALUES
(2, 'Mattia03', 'MattiaBombace03', 'Mattia', 'Bombace', 'mb@gmail.com'),
(3, 'St3ph4ndr0', 'Stefano010203!', 'Stefano', 'Occhipinti', 'stefanocchipinti@gmail.com'),
(4, 'MartaHitler69', 'Mussolini13!', 'Marta', 'Pandolfo', 'steguwjblvnp@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `wishlist`
--

CREATE TABLE `wishlist` (
  `ID_wish` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`IDArticolo`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NomeUtente` (`NomeUtente`),
  ADD UNIQUE KEY `UC_NomeUtente` (`NomeUtente`);

--
-- Indici per le tabelle `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID_wish`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_id` (`article_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `ID_wish` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utenti` (`ID`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articoli` (`IDArticolo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
