-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Mag 31, 2019 alle 00:35
-- Versione del server: 10.1.19-MariaDB
-- Versione PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cipurza`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `artista`
--

CREATE TABLE `artista` (
  `CodA` int(4) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `CodC` int(4) NOT NULL,
  `Descrizione` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `commenti`
--

CREATE TABLE `commenti` (
  `CodE` int(4) NOT NULL,
  `CodU` int(4) NOT NULL,
  `Contenuto` varchar(50) NOT NULL,
  `Data` date NOT NULL,
  `Voti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `evento`
--

CREATE TABLE `evento` (
  `CodE` int(4) NOT NULL,
  `Titolo` varchar(50) NOT NULL,
  `Data` date NOT NULL,
  `CodC` int(4) NOT NULL,
  `CodU` int(4) NOT NULL,
  `CodL` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `iscrive`
--

CREATE TABLE `iscrive` (
  `CodC` int(4) NOT NULL,
  `CodU` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `luogo`
--

CREATE TABLE `luogo` (
  `CodL` int(4) NOT NULL,
  `Citta` varchar(50) NOT NULL,
  `Regione` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `luogo`
--

INSERT INTO `luogo` (`CodL`, `Citta`, `Regione`) VALUES
(1, 'Milano', 'Lombardia');

-- --------------------------------------------------------

--
-- Struttura della tabella `partecipa`
--

CREATE TABLE `partecipa` (
  `CodE` int(4) NOT NULL,
  `CodA` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `CodU` int(4) NOT NULL,
  `Token` varchar(256) NOT NULL DEFAULT '0',
  `Cognome` varchar(50) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nickname` varchar(50) NOT NULL,
  `Indirizzo` varchar(50) NOT NULL,
  `CodL` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`CodU`, `Token`, `Cognome`, `Nome`, `Password`, `Email`, `Nickname`, `Indirizzo`, `CodL`) VALUES
(2, '6e5L372705pj3TcO6Juw6v1579H16GrYSoj5p38AQ42E6G0Bw72jB24G586K163xCW541sxF6ei82q4L4Ze78618TnJMaajt8A1hCAgG9VT3IWDS30LAZ82JIC442E7LAC09k1A1735u7Zfwt001496tGnZ3825ao04n1E1Zw7sBO9s84911394958vAv1S44u1ZeC6R3zH27w5u56maQT6020Bq1z2V74fhqwNffC122675Z22ugLf0hdrC9rD0', 'Burza', 'Alessandro', '8f4bc1b1a8ae8b3bbe57da5295030f3f87ba2808883c21c26e', 'thelorizz@gmail.com', 'TheLorizz', 'Via Pismonte 9', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`CodA`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CodC`);

--
-- Indici per le tabelle `commenta`
--
ALTER TABLE `commenta`
  ADD KEY `FK_commenta_evento` (`CodE`),
  ADD KEY `FK_commenta_utente` (`CodU`);

--
-- Indici per le tabelle `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`CodE`),
  ADD KEY `FK_evento_categoria` (`CodC`),
  ADD KEY `FK_evento_utente` (`CodU`),
  ADD KEY `FK_evento_luogo` (`CodL`);

--
-- Indici per le tabelle `iscrive`
--
ALTER TABLE `iscrive`
  ADD KEY `FK_iscrive_categoria` (`CodC`),
  ADD KEY `FK_iscrive_utente` (`CodU`);

--
-- Indici per le tabelle `luogo`
--
ALTER TABLE `luogo`
  ADD PRIMARY KEY (`CodL`);

--
-- Indici per le tabelle `partecipa`
--
ALTER TABLE `partecipa`
  ADD KEY `FK_partecipa_evento` (`CodE`),
  ADD KEY `FK_partecipa_artista` (`CodA`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`CodU`),
  ADD UNIQUE KEY `Nickname` (`Nickname`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `FK_utente_luogo` (`CodL`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `artista`
--
ALTER TABLE `artista`
  MODIFY `CodA` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CodC` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `evento`
--
ALTER TABLE `evento`
  MODIFY `CodE` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `luogo`
--
ALTER TABLE `luogo`
  MODIFY `CodL` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `CodU` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `commenta`
--
ALTER TABLE `commenta`
  ADD CONSTRAINT `FK_commenta_evento` FOREIGN KEY (`CodE`) REFERENCES `evento` (`CodE`),
  ADD CONSTRAINT `FK_commenta_utente` FOREIGN KEY (`CodU`) REFERENCES `utente` (`CodU`);

--
-- Limiti per la tabella `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_evento_categoria` FOREIGN KEY (`CodC`) REFERENCES `categoria` (`CodC`),
  ADD CONSTRAINT `FK_evento_luogo` FOREIGN KEY (`CodL`) REFERENCES `luogo` (`CodL`),
  ADD CONSTRAINT `FK_evento_utente` FOREIGN KEY (`CodU`) REFERENCES `utente` (`CodU`);

--
-- Limiti per la tabella `iscrive`
--
ALTER TABLE `iscrive`
  ADD CONSTRAINT `FK_iscrive_categoria` FOREIGN KEY (`CodC`) REFERENCES `categoria` (`CodC`),
  ADD CONSTRAINT `FK_iscrive_utente` FOREIGN KEY (`CodU`) REFERENCES `utente` (`CodU`);

--
-- Limiti per la tabella `partecipa`
--
ALTER TABLE `partecipa`
  ADD CONSTRAINT `FK_partecipa_artista` FOREIGN KEY (`CodA`) REFERENCES `artista` (`CodA`),
  ADD CONSTRAINT `FK_partecipa_evento` FOREIGN KEY (`CodE`) REFERENCES `evento` (`CodE`);

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `FK_utente_luogo` FOREIGN KEY (`CodL`) REFERENCES `luogo` (`CodL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
