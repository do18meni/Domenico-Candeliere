-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 31, 2022 alle 22:46
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ricettario`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ingrediente`
--

CREATE TABLE `ingrediente` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `quantita` varchar(10) NOT NULL,
  `unita_misura` varchar(15) NOT NULL,
  `id_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `ingrediente`
--

INSERT INTO `ingrediente` (`id`, `nome`, `quantita`, `unita_misura`, `id_utente`) VALUES
(1, 'Mozzarella', '300', 'grammi', 4),
(2, 'pomodoro', '250', 'grammi', 4),
(6, 'basilico', '100', 'grammi', 4),
(7, 'pasta', '250', 'grammi', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `rel_ingredienti_ricette`
--

CREATE TABLE `rel_ingredienti_ricette` (
  `id_ingrediente` int(11) NOT NULL,
  `id_ricetta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `ricetta`
--

CREATE TABLE `ricetta` (
  `id` int(11) NOT NULL,
  `nome` varchar(75) NOT NULL,
  `difficolta` int(11) NOT NULL,
  `preparazione` varchar(1000) NOT NULL,
  `porzioni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `ricetta`
--

INSERT INTO `ricetta` (`id`, `nome`, `difficolta`, `preparazione`, `porzioni`) VALUES
(0, 'Carbonara', 2, 'rosolare il guanciale, cucinare la pasta e condire', 2),
(0, 'Carbonara', 2, 'rosolare il guanciale, cucinare la pasta e condire', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `nome`, `cognome`, `email`, `password`) VALUES
(1, 'Domenico', 'Candeliere', 'domcandeliere@yahoo.itq', '125'),
(2, 'Gianni', 'Rossi', 'giannirossi@gmail.com', '121'),
(3, 'Luca', 'Bianchi', 'luca.bianchi@outlook.com', '120'),
(4, 'domenico', 'candeliere', 'domcandeliere@gmail.com', '123'),
(6, 'Samuele', 'Rossi', 'rossi@stu.gmail.com', '011');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utente` (`id_utente`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD CONSTRAINT `proprietario` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
