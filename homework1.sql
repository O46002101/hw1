-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2021 alle 21:38
-- Versione del server: 10.4.16-MariaDB
-- Versione PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `abbonamento`
--

CREATE TABLE `abbonamento` (
  `prezzo` float DEFAULT NULL,
  `titolo` varchar(60) NOT NULL,
  `piattaforma` varchar(20) DEFAULT NULL,
  `immagine` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `abbonamento`
--

INSERT INTO `abbonamento` (`prezzo`, `titolo`, `piattaforma`, `immagine`, `id`) VALUES
(9.99, 'PlayStation Now Card 1 Mese', 'Playstation Network', 'https://i.imgur.com/wvq5Hoo.png', 1),
(24.99, 'Playstation Now Card 3 Mesi', 'Playstation Network', 'https://i.imgur.com/PIIB8UK.png', 2),
(59.99, 'Playstation Now Card 12 Mesi', 'Playstation Network', 'https://i.imgur.com/7kfrPTE.png', 3),
(9.99, 'Playstation Plus Card 1 Mese', 'Playstation Network', 'https://i.imgur.com/UfLPpba.png', 4),
(24.99, 'Playstation Plus Card 3 Mesi', 'Playstation Network', 'https://i.imgur.com/BycdRrt.png', 5),
(59.99, 'PlayStation Plus Card 12 Mesi', 'Playstation Network', 'https://i.imgur.com/Jvpl26H.png', 6),
(15, 'Ricarica Netflix 15€', 'Netflix', 'https://i.imgur.com/swD38MQ.png', 7),
(25, 'Ricarica Netflix 25€', 'Netflix', 'https://i.imgur.com/pUi4F6O.png', 8),
(50, 'Ricarica Netflix 50€', 'Netflix', 'https://i.imgur.com/INI87fJ.png', 9),
(15, 'Ricarica Nintendo eShop 15€', 'Nintendo eShop', 'https://i.imgur.com/vSZuF6u.png', 10),
(25, 'Ricarica Nintendo eShop 25€', 'Nintendo eShop', 'https://i.imgur.com/pgG1DxA.png', 11),
(10, 'Spotify - Abbonamento 1 Mese', 'Spotify', 'https://i.imgur.com/HEjO5D6.png', 12),
(30, 'Spotify - Abbonamento 3 Mesi', 'Spotify', 'https://i.imgur.com/Vdh7qMo.png', 13),
(60, 'Spotify - Abbonamento 6 Mesi', 'Spotify', 'https://i.imgur.com/vz2ny84.png', 14);

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `username` varchar(50) NOT NULL,
  `articolo` varchar(100) NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzo` float NOT NULL,
  `immagine` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`username`, `articolo`, `quantita`, `prezzo`, `immagine`) VALUES
('barbytrapani', 'Funko Pop - Lara Croft (Survivor)', 2, 15.99, 'https://i.imgur.com/uWuyE1q.jpg'),
('barbytrapani', 'Mario Golf Super Rush', 1, 60.99, 'https://i.imgur.com/CGO9WXB.jpg'),
('barbytrapani', 'Zaino Pokémon Pikachu', 1, 35.99, 'https://i.imgur.com/JJ4ElOh.jpg'),
('maria_poli', 'Detroit : Become Human', 1, 39.99, 'https://i.imgur.com/f0MMMeR.png'),
('maria_poli', 'Life is Strange: True Colors', 2, 59.99, 'https://i.imgur.com/eiW2YxP.png'),
('maria_poli', 'Ratchet and Clank Rift Apart', 1, 79.99, 'https://i.imgur.com/gwhP2ps.png'),
('maria_poli', 'Ricarica Nintendo eShop 25€', 1, 25, 'https://i.imgur.com/pgG1DxA.png'),
('maria_poli', 'Tazza Minecraft', 1, 12.99, 'https://i.imgur.com/vpz8Ibw.png'),
('whiteconti91', 'Assassin\'s Creed Valhalla', 1, 59.99, 'https://i.imgur.com/3nJsDon.png'),
('whiteconti91', 'Biomutant', 1, 60.98, 'https://i.imgur.com/QGVBCcv.png'),
('whiteconti91', 'Ricarica Netflix 25€', 2, 25, 'https://i.imgur.com/pUi4F6O.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `merchandise`
--

CREATE TABLE `merchandise` (
  `titolo` varchar(50) NOT NULL,
  `immagine` varchar(200) NOT NULL,
  `prezzo` float NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `merchandise`
--

INSERT INTO `merchandise` (`titolo`, `immagine`, `prezzo`, `brand`) VALUES
('Funko Pop - Lara Croft (Survivor)', 'https://i.imgur.com/uWuyE1q.jpg', 15.99, 'Funko'),
('Amiibo 3-Pack Animal Crossing', 'https://i.imgur.com/qjZQVNj.png', 39.99, 'Nintendo'),
('UNO! - Carte da gioco', 'https://i.imgur.com/JKPNhiP.jpg', 11.99, 'Mattel'),
('Cappello Super Mario Odyssey', 'https://i.imgur.com/ecarcPW.jpg', 19.99, 'Nintendo'),
('Collana Anello Nathan Drake', 'https://i.imgur.com/rYeKPMI.png', 21.99, 'Uncharted 4'),
('Lampada LED PlayStation', 'https://i.imgur.com/7M6kY8q.png', 29.99, 'Sony'),
('T-Shirt Zelda Breath of the Wild', 'https://i.imgur.com/6iq4DT9.png', 15.99, 'Nintendo'),
('Zaino Pokémon Pikachu', 'https://i.imgur.com/JJ4ElOh.jpg', 35.99, 'Loungefly'),
('Guanto dell\'Infinito di Thanos', 'https://i.imgur.com/PCj7jNm.jpg', 119.99, 'Hasbro'),
('Monopoly Super Mario Celebration', 'https://i.imgur.com/AIS7U0Z.png', 29.99, 'Hasbro'),
('Risk Game of Thrones', 'https://i.imgur.com/kfw4T1Y.png', 59.99, 'HBO'),
('Tazza Minecraft', 'https://i.imgur.com/vpz8Ibw.png', 12.99, 'Minecraft'),
('LEGO Harry Potter Torre dell\'Orologio', 'https://i.imgur.com/obniF2K.png', 89.99, 'LEGO'),
('Action Figure Ellie', 'https://i.imgur.com/KiCXFO8.png', 49.99, 'The Last of Us Part II');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `nome`, `cognome`, `email`, `password`) VALUES
(1, 'whiteconti91', 'Bianca', 'Conti', 'bianca-conti91@homework1.it', 'Sesamo91!'),
(2, 'maria_poli', 'Maria', 'Poli', 'polimaria@homework1.it', 'erbaGialla7+'),
(12, 'barbytrapani', 'Barbara', 'Trapani', 'barbara.trapani@homework1.it', 'Caramello123_');

-- --------------------------------------------------------

--
-- Struttura della tabella `videogiochi`
--

CREATE TABLE `videogiochi` (
  `titolo` varchar(50) NOT NULL,
  `anno` int(11) DEFAULT NULL,
  `genere` varchar(20) DEFAULT NULL,
  `prezzo` float NOT NULL,
  `immagine` varchar(200) NOT NULL,
  `nuovi_arrivi` int(11) NOT NULL,
  `preordine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `videogiochi`
--

INSERT INTO `videogiochi` (`titolo`, `anno`, `genere`, `prezzo`, `immagine`, `nuovi_arrivi`, `preordine`) VALUES
('A Way Out', 2018, 'Avventura', 19.99, 'https://i.imgur.com/R5vxFwu.png', 0, 0),
('Animal Crossing: New Horizons', 2020, 'Simulatore di vita', 49.99, 'https://i.imgur.com/F3vGroW.jpg', 0, 0),
('Assassin\'s Creed Valhalla', 2020, 'Action RPG', 59.99, 'https://i.imgur.com/3nJsDon.png', 0, 0),
('Biomutant', 2021, 'Action RPG', 60.98, 'https://i.imgur.com/QGVBCcv.png', 1, 0),
('Control', 2019, 'Avventura', 29.99, 'https://i.imgur.com/y88boRC.png', 0, 0),
('Cyberpunk 2077', 2020, 'GdR', 59.99, 'https://i.imgur.com/1rv0gFz.jpg', 0, 0),
('Days Gone', 2019, 'Survival horror', 29.99, 'https://i.imgur.com/3WHueNH.png', 0, 0),
('Death Stranding', 2020, 'Avventura', 39.99, 'https://i.imgur.com/6EvxwkW.png', 0, 0),
('Detroit : Become Human', 2018, 'Avventura grafica', 39.99, 'https://i.imgur.com/f0MMMeR.png', 0, 0),
('Far Cry 6', 2021, 'Avventura', 70.99, 'https://i.imgur.com/BZT1BHw.jpg', 0, 1),
('Ghost of Tsushima', 2020, 'Avventura', 69.99, 'https://i.imgur.com/mub39WA.png', 0, 0),
('God of War', 2018, 'Avventura', 29.99, 'https://i.imgur.com/oYjz8VY.png', 0, 0),
('Grand Theft Auto V', 2013, 'Avventura', 49.99, 'https://i.imgur.com/7QOS3mV.png', 0, 0),
('Hitman III', 2021, 'Azione', 49.99, 'https://i.imgur.com/aix4ef4.png', 1, 0),
('Horizon Zero Dawn', 2017, 'Action RPG', 19.99, 'https://i.imgur.com/y0e5ouQ.png', 0, 0),
('Life is Strange: True Colors', 2021, 'Avventura grafica', 59.99, 'https://i.imgur.com/eiW2YxP.png', 0, 1),
('Little Nightmares II', 2021, 'Platform', 29.99, 'https://i.imgur.com/Vwo7YeH.png', 1, 0),
('Man of Medan', 2019, 'Survival horror', 24.99, 'https://i.imgur.com/BNFYd14.png', 0, 0),
('Mario Golf Super Rush', 2021, 'Golf', 60.99, 'https://i.imgur.com/CGO9WXB.jpg', 0, 1),
('Mario Kart 8 Deluxe', 2017, 'Simulatore di guida', 59.99, 'https://i.imgur.com/W3cg431.jpg', 0, 0),
('Marvel\'s Avengers', 2020, 'Avventura', 29.99, 'https://i.imgur.com/2Ymmphs.png', 0, 0),
('Marvel\'s Spiderman', 2018, 'Avventura', 29.99, 'https://i.imgur.com/Z4INNqc.png', 0, 0),
('Marvel\'s Spiderman: Miles Morales', 2020, 'Avventura', 51.99, 'https://i.imgur.com/YNuTikJ.jpg', 0, 0),
('Mass Effect: Legendary Edition', 2021, 'Action RPG', 69.99, 'https://i.imgur.com/d3BLbdB.jpg', 1, 0),
('Miitopia', 2021, 'GdR', 49.99, 'https://i.imgur.com/csEloms.jpg', 1, 0),
('Monster Hunter Rise', 2021, 'Action RPG', 54.99, 'https://i.imgur.com/BeRkjxQ.jpg', 1, 0),
('Necromunda: Hired Gun', 2021, 'Avventura', 40.98, 'https://i.imgur.com/8T5Nm4C.png', 0, 1),
('Outriders', 2021, 'Action RPG', 59.99, 'https://i.imgur.com/m7zAclL.png', 1, 0),
('Ratchet and Clank Rift Apart', 2021, 'Platform', 79.99, 'https://i.imgur.com/gwhP2ps.png', 0, 1),
('Red Dead Redemption II', 2018, 'Avventura', 69.99, 'https://i.imgur.com/QSn5y9X.png', 0, 0),
('Remothered: Broken Porcelain', 2018, 'Survival', 39.99, 'https://i.imgur.com/PcUtn2j.png', 0, 0),
('Remothered: Tormented Fathers', 2020, 'Survival', 39.99, 'https://i.imgur.com/M5ArVSj.png', 0, 0),
('Resident Evil 2', 2019, 'Survival horror', 19.99, 'https://i.imgur.com/PFT7S4V.png', 0, 0),
('Resident Evil Village', 2021, 'Survival horror', 69.99, 'https://i.imgur.com/9DDb2RI.png', 1, 0),
('Returnal', 2021, 'Horror psicologico', 66.99, 'https://i.imgur.com/4MvTWwN.png', 1, 0),
('Rise of the Tomb Raider', 2015, 'Avventura', 29.99, 'https://i.imgur.com/FiZOgrH.jpg', 0, 0),
('Sekiro: Shadows Die Twice', 2019, 'Avventura', 39.99, 'https://i.imgur.com/HAjYgif.jpg', 0, 0),
('Shadow of the Tomb Raider', 2018, 'Avventura', 39.99, 'https://i.imgur.com/4u78Bpa.jpg', 0, 0),
('Super Mario 3D World', 2021, 'Platform', 59.99, 'https://i.imgur.com/Nf71vV9.jpg', 1, 0),
('Super Mario Odyssey', 2017, 'Platform', 59.99, 'https://i.imgur.com/HZe95M6.jpg', 0, 0),
('Tell Me Why', 2020, 'Avventura grafica', 29.99, 'https://i.imgur.com/j6JuTWN.jpg', 0, 0),
('The Last of Us Parte II', 2020, 'Survival', 59.99, 'https://i.imgur.com/Lv5qfq9.png', 0, 0),
('The Medium', 2021, 'Horror psicologico', 39.99, 'https://i.imgur.com/6wRNaor.jpg', 1, 0),
('The Witcher 3 : Wild Hunt', 2015, 'GdR', 39.99, 'https://i.imgur.com/uixBvOM.png', 0, 0),
('Twin Mirror', 2020, 'Avventura grafica', 29.99, 'https://i.imgur.com/otfa3VV.png', 0, 0),
('Uncharted 4: Fine di un ladro', 2016, 'Avventura', 19.99, 'https://i.imgur.com/kkJjuIn.png', 0, 0),
('Until Dawn', 2016, 'Survival horror', 19.99, 'https://i.imgur.com/9qxzFa8.jpg', 0, 0),
('Watch Dogs: Legion', 2020, 'Avventura', 59.99, 'https://i.imgur.com/49Myr1k.png', 0, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `abbonamento`
--
ALTER TABLE `abbonamento`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`username`,`articolo`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `videogiochi`
--
ALTER TABLE `videogiochi`
  ADD PRIMARY KEY (`titolo`),
  ADD UNIQUE KEY `titolo` (`titolo`),
  ADD KEY `ind_1` (`titolo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `abbonamento`
--
ALTER TABLE `abbonamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
