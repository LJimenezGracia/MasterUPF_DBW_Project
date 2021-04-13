-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: db5000124250.hosting-data.io
-- Generation Time: Apr 13, 2021 at 06:16 AM
-- Server version: 5.7.32-log
-- PHP Version: 7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs118862`
--

-- --------------------------------------------------------

--
-- Table structure for table `BindingSite`
--

CREATE TABLE `BindingSite` (
  `idBindingSite` varchar(45) NOT NULL,
  `BindingSite_name` varchar(45) NOT NULL,
  `Target_GenBank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `History`
--

CREATE TABLE `History` (
  `idHistory` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Change_info` varchar(255) NOT NULL,
  `Lab_idLabs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Lab`
--

CREATE TABLE `Lab` (
  `idLabs` int(11) NOT NULL,
  `Institution` varchar(45) NOT NULL,
  `Group_name` varchar(45) NOT NULL,
  `Country` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Lab_code` varchar(45) NOT NULL,
  `Database_forward` varchar(100) NOT NULL,
  `Database_reverse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Ordered`
--

CREATE TABLE `Ordered` (
  `idOrdered` int(11) NOT NULL,
  `is_ordered` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Organism`
--

CREATE TABLE `Organism` (
  `idOrganism` int(11) NOT NULL,
  `Taxonomic_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Primer`
--

CREATE TABLE `Primer` (
  `idPrimer` varchar(45) NOT NULL,
  `Primer_name` varchar(45) NOT NULL,
  `Sequence_5to3` varchar(45) NOT NULL,
  `Direction_FwRv` varchar(2) NOT NULL,
  `Length` int(11) NOT NULL,
  `Tm` decimal(2,0) NOT NULL,
  `pGC` decimal(2,0) NOT NULL,
  `Concentration` decimal(3,0) NOT NULL,
  `Storage_position` varchar(10) DEFAULT NULL,
  `Comments` varchar(50) DEFAULT NULL,
  `Ordered_idOrdered` int(11) NOT NULL,
  `Lab_idLabs` int(11) NOT NULL,
  `Stock_idStock` int(11) NOT NULL,
  `Provider_idProvider` int(11) NOT NULL,
  `BindingSite_idBindingSite` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Provider`
--

CREATE TABLE `Provider` (
  `idProvider` int(11) NOT NULL,
  `Provider_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Stock`
--

CREATE TABLE `Stock` (
  `idStock` int(11) NOT NULL,
  `in_stock` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Target`
--

CREATE TABLE `Target` (
  `GenBank_id` int(11) NOT NULL,
  `Target_name` varchar(45) NOT NULL,
  `Organism_idOrganism` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `idUsers` int(11) NOT NULL,
  `User_name` varchar(45) NOT NULL,
  `Surname` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Cookies` varchar(45) NOT NULL,
  `Lab_idLabs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BindingSite`
--
ALTER TABLE `BindingSite`
  ADD PRIMARY KEY (`idBindingSite`),
  ADD KEY `fk_BindingSite_Target1_idx` (`Target_GenBank_id`);

--
-- Indexes for table `History`
--
ALTER TABLE `History`
  ADD PRIMARY KEY (`idHistory`),
  ADD KEY `fk_History_Lab1_idx` (`Lab_idLabs`);

--
-- Indexes for table `Lab`
--
ALTER TABLE `Lab`
  ADD PRIMARY KEY (`idLabs`),
  ADD UNIQUE KEY `Name_UNIQUE` (`Lab_code`);

--
-- Indexes for table `Ordered`
--
ALTER TABLE `Ordered`
  ADD PRIMARY KEY (`idOrdered`);

--
-- Indexes for table `Organism`
--
ALTER TABLE `Organism`
  ADD PRIMARY KEY (`idOrganism`),
  ADD UNIQUE KEY `Taxonomic_name_UNIQUE` (`Taxonomic_name`);

--
-- Indexes for table `Primer`
--
ALTER TABLE `Primer`
  ADD PRIMARY KEY (`idPrimer`),
  ADD UNIQUE KEY `idPrimer_UNIQUE` (`idPrimer`),
  ADD KEY `fk_Primer_Ordered1_idx` (`Ordered_idOrdered`),
  ADD KEY `fk_Primer_Lab1_idx` (`Lab_idLabs`),
  ADD KEY `fk_Primer_Stock1_idx` (`Stock_idStock`),
  ADD KEY `fk_Primer_Provider1_idx` (`Provider_idProvider`),
  ADD KEY `fk_Primer_BindingSite1_idx` (`BindingSite_idBindingSite`);

--
-- Indexes for table `Provider`
--
ALTER TABLE `Provider`
  ADD PRIMARY KEY (`idProvider`);

--
-- Indexes for table `Stock`
--
ALTER TABLE `Stock`
  ADD PRIMARY KEY (`idStock`),
  ADD UNIQUE KEY `Is_in_Stock_UNIQUE` (`in_stock`);

--
-- Indexes for table `Target`
--
ALTER TABLE `Target`
  ADD PRIMARY KEY (`GenBank_id`),
  ADD KEY `fk_Target_Organism1_idx` (`Organism_idOrganism`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`idUsers`),
  ADD KEY `fk_Users_Lab1_idx` (`Lab_idLabs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `History`
--
ALTER TABLE `History`
  MODIFY `idHistory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Lab`
--
ALTER TABLE `Lab`
  MODIFY `idLabs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Ordered`
--
ALTER TABLE `Ordered`
  MODIFY `idOrdered` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Organism`
--
ALTER TABLE `Organism`
  MODIFY `idOrganism` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Provider`
--
ALTER TABLE `Provider`
  MODIFY `idProvider` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Stock`
--
ALTER TABLE `Stock`
  MODIFY `idStock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BindingSite`
--
ALTER TABLE `BindingSite`
  ADD CONSTRAINT `fk_BindingSite_Target1` FOREIGN KEY (`Target_GenBank_id`) REFERENCES `Target` (`GenBank_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `History`
--
ALTER TABLE `History`
  ADD CONSTRAINT `fk_History_Lab1` FOREIGN KEY (`Lab_idLabs`) REFERENCES `Lab` (`idLabs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Primer`
--
ALTER TABLE `Primer`
  ADD CONSTRAINT `fk_Primer_BindingSite1` FOREIGN KEY (`BindingSite_idBindingSite`) REFERENCES `BindingSite` (`idBindingSite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Primer_Lab1` FOREIGN KEY (`Lab_idLabs`) REFERENCES `Lab` (`idLabs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Primer_Ordered1` FOREIGN KEY (`Ordered_idOrdered`) REFERENCES `Ordered` (`idOrdered`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Primer_Provider1` FOREIGN KEY (`Provider_idProvider`) REFERENCES `Provider` (`idProvider`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Primer_Stock1` FOREIGN KEY (`Stock_idStock`) REFERENCES `Stock` (`idStock`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Target`
--
ALTER TABLE `Target`
  ADD CONSTRAINT `fk_Target_Organism1` FOREIGN KEY (`Organism_idOrganism`) REFERENCES `Organism` (`idOrganism`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `fk_Users_Lab1` FOREIGN KEY (`Lab_idLabs`) REFERENCES `Lab` (`idLabs`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
