-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2016 at 08:22 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediatheque`
--

-- --------------------------------------------------------

--
-- Table structure for table `bd`
--

CREATE TABLE `bd` (
  `id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `auteur` varchar(60) NOT NULL,
  `illustrateur` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bd`
--

INSERT INTO `bd` (`id`, `document_id`, `auteur`, `illustrateur`) VALUES
(1, 1, 'Goscinny', 'Uderzo'),
(2, 2, 'Hergé', 'Hergé'),
(3, 3, 'Jean Roba', 'Jean Roba'),
(4, 9, 'Franquin', 'Franquin'),
(5, 10, 'Franquin', 'Franquin'),
(6, 11, 'Goscinny', 'Uderzo');

-- --------------------------------------------------------

--
-- Table structure for table `cd`
--

CREATE TABLE `cd` (
  `id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `auteur` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cd`
--

INSERT INTO `cd` (`id`, `document_id`, `auteur`) VALUES
(1, 4, 'Pink Floyd'),
(2, 5, 'The Smashing Pumpkins'),
(3, 6, 'Christophe Maé');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `code_ref` varchar(20) NOT NULL,
  `date_d_enregistrement` date NOT NULL,
  `titre` varchar(120) NOT NULL,
  `image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `code_ref`, `date_d_enregistrement`, `titre`, `image`) VALUES
(1, 'BD-GOS-0001', '2016-12-01', 'la Zizanie', 'zizanie.png'),
(2, 'BD-HER-0001', '2016-10-02', 'Tintin au Congo', 'tintin-au-congo.jpg'),
(3, 'BD-ROB-0001', '2016-12-14', 'Boule et Bill créent une entreprise!', 'boule-et-bill-creent-une-entreprise.jpg'),
(4, 'CD-PIN-0001', '2016-12-14', 'The Wall', 'the-wall.png'),
(5, 'CD-SMA-0001', '2016-12-10', 'Adore', 'adore.jpg'),
(6, 'CD-MAE-0001', '2016-10-02', 'Mon Paradis', 'mon-paradis.jpg'),
(7, 'LIV-CAM-0001', '2016-09-04', 'La Peste', 'peste.jpg'),
(8, 'LIV-LEV-0001', '2016-12-14', 'L\'Horizon à l\'envers', 'horizon-a-l-envers.jpg'),
(9, 'BD-FRA-0001', '2016-12-21', 'Lagaffe mérite des baffes', 'gaston13.jpg'),
(10, 'BD-FRA-0002', '2016-12-21', 'Lagaffe nous gâte', 'gastoncouv08.jpg'),
(11, 'BD-GOS-0002', '2016-12-21', 'Astérix le gaulois', 'asterix01_22940.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(11) NOT NULL,
  `date_emprunt` datetime NOT NULL,
  `date_retour` datetime DEFAULT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emprunt`
--

INSERT INTO `emprunt` (`id`, `date_emprunt`, `date_retour`, `utilisateur_id`, `document_id`) VALUES
(2, '2016-12-20 00:00:00', NULL, 1, 3),
(4, '2016-12-22 16:55:33', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `isbn` varchar(20) NOT NULL,
  `document_id` int(11) NOT NULL,
  `auteur` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`isbn`, `document_id`, `auteur`) VALUES
('978-2070360420', 7, 'Albert Camus'),
('978-2221157848', 8, 'Marc Levy');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `date_reservation` datetime NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `traitee` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `date_reservation`, `utilisateur_id`, `document_id`, `traitee`) VALUES
(1, '2016-12-21 16:20:48', 1, 5, NULL),
(4, '2016-12-21 15:44:28', 2, 5, NULL),
(10, '2016-12-22 15:37:38', 1, 2, 1),
(11, '2016-12-22 15:37:46', 1, 4, NULL),
(12, '2016-12-22 15:38:26', 1, 7, NULL),
(13, '2016-12-22 15:38:40', 1, 6, NULL),
(14, '2016-12-22 15:38:49', 1, 9, NULL),
(15, '2016-12-22 15:38:53', 1, 11, NULL),
(16, '2016-12-22 15:39:00', 1, 3, NULL),
(17, '2016-12-22 15:39:23', 1, 1, NULL),
(18, '2016-12-22 15:40:34', 2, 7, NULL),
(19, '2016-12-22 15:40:43', 2, 8, NULL),
(20, '2016-12-22 15:40:47', 2, 10, NULL),
(21, '2016-12-22 15:40:51', 2, 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `password`) VALUES
(1, 'Pogba', 'Paul', 'user1', '$2y$10$XF19Owt90bblEneXsHnXqeilUdWj1m1hqmZ.U7FlJY/Kixef6GHL.'),
(2, 'Federer', 'Roger', 'user2', '$2y$10$XF19Owt90bblEneXsHnXqeilUdWj1m1hqmZ.U7FlJY/Kixef6GHL.'),
(3, 'Simon', 'Christophe', 'admin', '$2y$10$vDaRXrf23Onxt.Xw1V23ceWKukrLy3ue2IeKplZ8PDLNtsN10aF86');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bd`
--
ALTER TABLE `bd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `document_id_2` (`document_id`),
  ADD KEY `document_id` (`document_id`);

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilisateur_id_2` (`utilisateur_id`,`document_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `document_id` (`document_id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bd`
--
ALTER TABLE `bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cd`
--
ALTER TABLE `cd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`document_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `document` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
