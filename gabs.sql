-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 28, 2022 alle 21:12
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gabs`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `form`
--

CREATE TABLE `form` (
  `nome` varchar(200) DEFAULT NULL,
  `dataora` datetime NOT NULL,
  `email` varchar(128) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `form`
--

INSERT INTO `form` (`nome`, `dataora`, `email`, `telefono`, `note`, `id`) VALUES
('Alfonso Gabriele Tinaglia', '2028-05-22 05:58:01', 'tinagliagabriele@gmail.com', '324545454', 'Planning Matrimonio', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `portate`
--

CREATE TABLE `portate` (
  `nome` varchar(255) NOT NULL,
  `prezzo` float DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `portate`
--

INSERT INTO `portate` (`nome`, `prezzo`, `categoria`) VALUES
('Astice in reverse searing con burro aromatizzato alle erbe ', 35, 'Secondi'),
('Bao buns di scampi e lime', 10, 'antipasti'),
('Brownie dello chef con penaut butter e sali', 8, 'Dolci'),
('Costata di Sakura alla maillard con fondo al brandy (min 1kg)', 40, 'Secondi'),
('Gambero Rosso in pasta Kataifi con mayo al tartufo', 15, 'antipasti'),
('Paccheri al pistacchio, gamberi rossi, guanciale e stracciatella', 18, 'Primi'),
('Petto d\'anatra, riduzione di aceto balsamico e verdure', 18, 'Secondi'),
('Raviolo di scampi e pepe rosa con bisque e zest al lime', 25, 'Primi'),
('Tacos di riso venere con pulled di wagyu', 9, 'antipasti'),
('Tagliatelle al ragù di cinghiale marinato all orientale', 20, 'Primi'),
('Tarte con gelè al passion fruit e crema di pistacchi', 6, 'Dolci'),
('Torta:biscuit cacao, gelè lamponi e bavarese pistacchio', 9, 'Dolci');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `data` varchar(255) NOT NULL,
  `commento` varchar(255) DEFAULT NULL,
  `utente` varchar(20) NOT NULL,
  `orario` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`data`, `commento`, `utente`, `orario`, `id`) VALUES
('28/5/2022', 'Ristorante al top!!!', 'Gabriele Tinaglia', '09:42:46', 1),
('28/5/2022', 'Personale cordiale', 'Giuseppe Vetro', '12:02:59', 3),
('28/5/2022', 'Menù eccezionale!', 'Gabriele Tinaglia', '17:57:03', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `reserve`
--

CREATE TABLE `reserve` (
  `data` date NOT NULL,
  `n_persone` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `utente` varchar(20) NOT NULL,
  `ora` varchar(6) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `reserve`
--

INSERT INTO `reserve` (`data`, `n_persone`, `note`, `utente`, `ora`, `id`) VALUES
('2022-05-29', 8, 'Intolleranti al lattosio', 'Gabriele Tinaglia', '21:00', 1),
('2022-05-31', 1, '', 'Giuseppe Vetro', '19:00', 2),
('2022-05-29', 1, 'Compleanno', 'Gabriele Tinaglia', '19:00', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `password`, `email`, `telefono`) VALUES
('Christian Volpe', 'ChristianV11', 'ChriChri@libero.it', '329499548'),
('Gabriele Tinaglia', 'GabrieleT11', 'tinagliagabriele@gmail.com', '32945343'),
('Giuseppe Vetro', 'giuseppeV11', 'giuseppeV@gmail.com', '543254563'),
('Jason Momoa', 'jasonMom9', 'jason@gmail.com', '329754644'),
('Johnny Deep', 'johnnyD1134', 'johnnydeep@gmail.com', '54346564'),
('Leo Davidson', 'leoDavid', 'leod@gmail.com', '5436426436'),
('Luigi Bianchi', 'LuigiB11', 'bianchiluigi@gmail.com', '3294834835'),
('Mario Rossi', 'MarioR11', 'rossimario@gmail.com', '3296452527'),
('Sonia GinoGrillo', 'SoniaGG11', 'Sonia@gmail.com', '3296945951'),
('Wario Giallo', 'warioGiallo8', 'gialloW@gmail.com', '34354353');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `portate`
--
ALTER TABLE `portate`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utente` (`utente`);

--
-- Indici per le tabelle `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utente` (`utente`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `recensione_ibfk_1` FOREIGN KEY (`utente`) REFERENCES `utente` (`username`);

--
-- Limiti per la tabella `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`utente`) REFERENCES `utente` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
