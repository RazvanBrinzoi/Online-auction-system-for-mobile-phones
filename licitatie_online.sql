-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 21, 2021 la 03:43 AM
-- Versiune server: 10.4.14-MariaDB
-- Versiune PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `licitatie_online`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `anunt`
--

CREATE TABLE `anunt` (
  `anuntid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `vanzatorid` int(11) NOT NULL,
  `tarifactual` int(11) NOT NULL,
  `detalii` varchar(255) NOT NULL,
  `dataexpirare` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `anunt`
--

INSERT INTO `anunt` (`anuntid`, `id`, `vanzatorid`, `tarifactual`, `detalii`, `dataexpirare`) VALUES
(1, 0, 2, 150, 'Samsung Galaxy S4', '2021-01-21'),
(2, 0, 3, 250, 'Iphone 4', '2021-01-25'),
(3, 0, 4, 650, 'Iphone SE', '2021-02-25'),
(4, 1, 1, 4599, 'Iphone 12', '2021-02-19'),
(5, 7, 5, 4500, 'Iphone 11 PRO 256GB', '2021-02-10'),
(6, 3, 6, 5999, 'Samsung Galaxy S21 Ultra 5G', '2021-03-01');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `curier`
--

CREATE TABLE `curier` (
  `curierid` int(11) NOT NULL,
  `NumeFirma` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `curier`
--

INSERT INTO `curier` (`curierid`, `NumeFirma`, `Contact`, `Email`) VALUES
(1, 'DPD', '07219873456', 'DPD@yahoo.com'),
(2, 'NEMO EXPRESS', '0783123456', 'nemoexpres@yahoo.com'),
(3, 'URGENT CARGUS', '076298456', 'urgentcargus@gmail.com'),
(4, 'FAN CURIER', '0789654148', 'fancurier@yahoo.com'),
(5, 'INTELLIGENTLOGISTIK', '079456192', 'Intelligentlogistik@yahoo.com'),
(6, 'SAMEDAY', '0742159876', 'sameday@gmail.com'),
(7, 'GLS', '072469002', 'gls@gmail.com');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `finalizarelicitatie`
--

CREATE TABLE `finalizarelicitatie` (
  `finalizareid` int(11) NOT NULL,
  `anuntid` int(11) NOT NULL,
  `curierid` int(11) NOT NULL,
  `SumaFinala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `finalizarelicitatie`
--

INSERT INTO `finalizarelicitatie` (`finalizareid`, `anuntid`, `curierid`, `SumaFinala`) VALUES
(1, 4, 3, 4599),
(2, 5, 3, 4500),
(3, 6, 3, 5999);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orase`
--

CREATE TABLE `orase` (
  `orasid` int(11) NOT NULL,
  `Nume` varchar(255) NOT NULL,
  `Judet` varchar(255) NOT NULL,
  `NumarAnunturi` int(11) NOT NULL,
  `NumarPersoane` int(11) NOT NULL,
  `NumarVanzatori` int(11) NOT NULL,
  `NumarFirmeCurierat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `orase`
--

INSERT INTO `orase` (`orasid`, `Nume`, `Judet`, `NumarAnunturi`, `NumarPersoane`, `NumarVanzatori`, `NumarFirmeCurierat`) VALUES
(1, 'Bucuresti', 'Bucuresti', 0, 1, 0, 1),
(2, 'Slobozia', 'Ialomita', 3, 4, 3, 1),
(3, 'Brasov', 'Brasov', 1, 1, 1, 1),
(4, 'Pitesti', 'Arges', 2, 2, 2, 1),
(5, 'Ploiesti', 'Prahova', 0, 2, 0, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orasecurierat`
--

CREATE TABLE `orasecurierat` (
  `orasid` int(11) NOT NULL,
  `curierid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `orasecurierat`
--

INSERT INTO `orasecurierat` (`orasid`, `curierid`) VALUES
(1, 6),
(2, 3),
(3, 6),
(4, 2),
(5, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `participapersoana`
--

CREATE TABLE `participapersoana` (
  `id` int(11) NOT NULL,
  `anuntid` int(11) NOT NULL,
  `SumaBani` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `participapersoana`
--

INSERT INTO `participapersoana` (`id`, `anuntid`, `SumaBani`) VALUES
(1, 4, 4599),
(3, 6, 5999),
(7, 5, 4500);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `orasid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `orasid`, `email`, `telefon`) VALUES
(1, 'razvan', '1234', 'razvan', 5, 'razvan@yahoo.com', '0720135857'),
(2, 'adi', '11111', 'adi', 2, 'adibalan@yahoo.com', '0729829012'),
(3, 'tecu', '22222', 'tecu', 2, 'teculescuandrei@yahoo.com', '0789090013'),
(4, 'alina', '33333', 'alina', 2, 'alinacustura@yahoo.com', '0989913567'),
(5, 'anda', '44444', 'anda', 2, 'andaalexandrescu@gmail.com', '0789093567'),
(6, 'costica', '55555', 'costica', 1, 'costicasmecherul@yahoo.com', '07889993567'),
(7, 'raducanu', '66666', 'adiraducanu', 5, 'adiraducanu@yahoo.com', '0789567123'),
(8, 'gigel', '77777', 'gigel', 3, 'gigelintegralistul@yahoo.com', '0777879456'),
(9, 'ion', '88888', 'ionel', 4, 'ionelseflabani@yahoo.com', '0980013567'),
(10, 'alexandru', '99999', 'alexandru', 4, 'alexandruman@yahoo.com', '0789345678');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `vanzator`
--

CREATE TABLE `vanzator` (
  `vanzatorid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `TarifMinim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `vanzator`
--

INSERT INTO `vanzator` (`vanzatorid`, `id`, `TarifMinim`) VALUES
(1, 4, 4599),
(2, 8, 150),
(3, 9, 250),
(4, 10, 650),
(5, 5, 4500),
(6, 2, 5999);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `anunt`
--
ALTER TABLE `anunt`
  ADD PRIMARY KEY (`anuntid`);

--
-- Indexuri pentru tabele `curier`
--
ALTER TABLE `curier`
  ADD PRIMARY KEY (`curierid`);

--
-- Indexuri pentru tabele `finalizarelicitatie`
--
ALTER TABLE `finalizarelicitatie`
  ADD PRIMARY KEY (`finalizareid`);

--
-- Indexuri pentru tabele `orase`
--
ALTER TABLE `orase`
  ADD PRIMARY KEY (`orasid`);

--
-- Indexuri pentru tabele `orasecurierat`
--
ALTER TABLE `orasecurierat`
  ADD PRIMARY KEY (`orasid`);

--
-- Indexuri pentru tabele `participapersoana`
--
ALTER TABLE `participapersoana`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `vanzator`
--
ALTER TABLE `vanzator`
  ADD PRIMARY KEY (`vanzatorid`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `anunt`
--
ALTER TABLE `anunt`
  MODIFY `anuntid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pentru tabele `curier`
--
ALTER TABLE `curier`
  MODIFY `curierid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `finalizarelicitatie`
--
ALTER TABLE `finalizarelicitatie`
  MODIFY `finalizareid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `orase`
--
ALTER TABLE `orase`
  MODIFY `orasid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `orasecurierat`
--
ALTER TABLE `orasecurierat`
  MODIFY `orasid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `participapersoana`
--
ALTER TABLE `participapersoana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `vanzator`
--
ALTER TABLE `vanzator`
  MODIFY `vanzatorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
