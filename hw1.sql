-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 05, 2024 alle 22:27
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `libri`
--

CREATE TABLE `libri` (
  `user_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `stato` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `libri`
--

INSERT INTO `libri` (`user_id`, `id`, `titolo`, `stato`) VALUES
(4, 11, 'Il mastino dei Baskerville', 'letti'),
(4, 12, 'Uno studio in Rosso', 'letti'),
(4, 13, 'Il segno dei quattro', 'letti'),
(4, 14, 'Uno scandalo in Boemia', 'non_letti'),
(4, 15, 'Il carbonchio azzurro', 'non_letti'),
(1, 16, 'Il mastino dei Baskerville', 'letti'),
(1, 17, 'Uno studio in Rosso', 'letti'),
(1, 18, 'Il segno dei quattro', 'letti'),
(1, 19, 'Uno scandalo in Boemia', 'letti'),
(1, 20, 'Il carbonchio azzurro', 'letti');

-- --------------------------------------------------------

--
-- Struttura della tabella `ol_salvati`
--

CREATE TABLE `ol_salvati` (
  `id_user` int(11) DEFAULT NULL,
  `id_salvato` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `cover_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ol_salvati`
--

INSERT INTO `ol_salvati` (`id_user`, `id_salvato`, `title`, `cover_id`) VALUES
(3, 128, 'Memoirs of Sherlock Holmes [11 stories]', '9246429'),
(3, 130, 'The Adventures of Sherlock Holmes [12 stories]', '6717853'),
(3, 131, 'His Last Bow [8 stories]', '8243267'),
(3, 132, 'The Return of Sherlock Holmes', '9246467'),
(3, 135, 'Memoirs of Sherlock Holmes [11 stories]', '9246429'),
(1, 139, 'Memoirs of Sherlock Holmes [11 stories]', '9246429'),
(1, 142, 'Memoirs of Sherlock Holmes [11 stories]', '9246429'),
(1, 143, 'The Case-Book of Sherlock Holmes', '8350410'),
(1, 144, 'The Return of Sherlock Holmes', '9246467'),
(1, 145, 'The Valley of Fear', '8350377'),
(1, 146, 'The Sign of Four', '9247987'),
(1, 147, 'A Study in Scarlet', '13405534');

-- --------------------------------------------------------

--
-- Struttura della tabella `ricerche_spotify`
--

CREATE TABLE `ricerche_spotify` (
  `id_user` int(11) DEFAULT NULL,
  `id_ricerca` int(11) NOT NULL,
  `ricerca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ricerche_spotify`
--

INSERT INTO `ricerche_spotify` (`id_user`, `id_ricerca`, `ricerca`) VALUES
(3, 159, 'Sherlock'),
(1, 215, 'pippo');

-- --------------------------------------------------------

--
-- Struttura della tabella `titoli_libri`
--

CREATE TABLE `titoli_libri` (
  `id` int(11) NOT NULL,
  `titolo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `titoli_libri`
--

INSERT INTO `titoli_libri` (`id`, `titolo`) VALUES
(1, 'Il mastino dei baskerville'),
(2, 'Uno studio in rosso'),
(3, 'Il segno dei quattro'),
(4, 'Uno scandalo in Boemia'),
(5, 'Il carbonchio azzurro');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `surname`) VALUES
(1, 'MarkPane_44', '$2y$10$pi/kmA6fXGGuq0uqRGoszOMQNWD9Kp88RvxO2OEJyorNDi9f5MeIy', 'markpane@gmail.com', 'Marco', 'Panettiere'),
(2, 'pippoimpasta', '$2y$10$sFXne5Lv7KOWagDzc5jdIewuMwb6JazuPuXqivQPKnfiaugTG62rK', 'pippoimpasta@gmail.com', 'Giuseppe', 'Impastato'),
(3, 'magikPaolo', '$2y$10$xKPRF./ReFoiCswNuWtSxufzVmCfz6WSL50TeSSgsPp/4uKfTqseW', 'magikpaolo@gmail.com', 'Paolo', 'Magikarp'),
(4, 'cl16', '$2y$10$SMTFx2vNDbDyfTXTNSpQCurWos3ejDTWc7nC0gYWQNpbtup8DO2m6', 'cl16@gmail.com', 'charles', 'leclerc');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `ol_salvati`
--
ALTER TABLE `ol_salvati`
  ADD PRIMARY KEY (`id_salvato`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `ricerche_spotify`
--
ALTER TABLE `ricerche_spotify`
  ADD PRIMARY KEY (`id_ricerca`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `titoli_libri`
--
ALTER TABLE `titoli_libri`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `libri`
--
ALTER TABLE `libri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `ol_salvati`
--
ALTER TABLE `ol_salvati`
  MODIFY `id_salvato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT per la tabella `ricerche_spotify`
--
ALTER TABLE `ricerche_spotify`
  MODIFY `id_ricerca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT per la tabella `titoli_libri`
--
ALTER TABLE `titoli_libri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `libri`
--
ALTER TABLE `libri`
  ADD CONSTRAINT `libri_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `ol_salvati`
--
ALTER TABLE `ol_salvati`
  ADD CONSTRAINT `ol_salvati_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `ricerche_spotify`
--
ALTER TABLE `ricerche_spotify`
  ADD CONSTRAINT `ricerche_spotify_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
