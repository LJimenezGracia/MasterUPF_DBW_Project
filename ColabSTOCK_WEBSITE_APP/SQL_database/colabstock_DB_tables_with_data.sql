-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: db5000124250.hosting-data.io
-- Generation Time: Apr 13, 2021 at 06:15 AM
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

--
-- Dumping data for table `BindingSite`
--

INSERT INTO `BindingSite` (`idBindingSite`, `BindingSite_name`, `Target_GenBank_id`) VALUES
('gene1-123', 'gene1', 123),
('promotor-854068', 'promotor', 854068),
('stopcodon-850840', 'stopcodon', 850840),
('stopcodon-850845', 'stopcodon', 850845),
('stopcodon-851161', 'stopcodon', 851161),
('stopcodon-851482', 'stopcodon', 851482),
('stopcodon-852106', 'stopcodon', 852106),
('stopcodon-852107', 'stopcodon', 852107),
('stopcodon-852108', 'stopcodon', 852108),
('stopcodon-852109', 'stopcodon', 852109),
('stopcodon-852110', 'stopcodon', 852110),
('stopcodon-852111', 'stopcodon', 852111),
('stopcodon-852112', 'stopcodon', 852112),
('stopcodon-852113', 'stopcodon', 852113),
('stopcodon-852114', 'stopcodon', 852114),
('stopcodon-852556', 'stopcodon', 852556),
('stopcodon-852557', 'stopcodon', 852557),
('stopcodon-852558', 'stopcodon', 852558),
('stopcodon-852559', 'stopcodon', 852559),
('stopcodon-852560', 'stopcodon', 852560),
('stopcodon-852561', 'stopcodon', 852561),
('stopcodon-852562', 'stopcodon', 852562),
('stopcodon-852649', 'stopcodon', 852649),
('stopcodon-852732', 'stopcodon', 852732),
('stopcodon-853017', 'stopcodon', 853017),
('stopcodon-853019', 'stopcodon', 853019),
('stopcodon-853020', 'stopcodon', 853020),
('stopcodon-853021', 'stopcodon', 853021),
('stopcodon-853022', 'stopcodon', 853022),
('stopcodon-853023', 'stopcodon', 853023),
('stopcodon-853024', 'stopcodon', 853024),
('stopcodon-853942', 'stopcodon', 853942),
('stopcodon-854898', 'stopcodon', 854898),
('stopcodon-855463', 'stopcodon', 855463);

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

--
-- Dumping data for table `History`
--

INSERT INTO `History` (`idHistory`, `idUser`, `Change_info`, `Lab_idLabs`) VALUES
(1, 1, 'The primer hello has been properly ADDED in the database. (idPrimer: hello-1)', 1),
(2, 1, 'The primer 100 has been properly ADDED in the database. (idPrimer: 100-1)', 1),
(3, 1, 'The primer 101 has been properly ADDED in the database. (idPrimer: 101-1)', 1),
(4, 1, 'The primer 102 has been properly ADDED in the database. (idPrimer: 102-1)', 1),
(5, 1, 'The primer 103 has been properly ADDED in the database. (idPrimer: 103-1)', 1),
(6, 1, 'The primer 104 has been properly ADDED in the database. (idPrimer: 104-1)', 1),
(7, 1, 'The primer 105 has been properly ADDED in the database. (idPrimer: 105-1)', 1),
(8, 1, 'The primer 106 has been properly ADDED in the database. (idPrimer: 106-1)', 1),
(9, 1, 'The primer 107 has been properly ADDED in the database. (idPrimer: 107-1)', 1),
(10, 1, 'The primer 108 has been properly ADDED in the database. (idPrimer: 108-1)', 1),
(11, 1, 'The primer 109 has been properly ADDED in the database. (idPrimer: 109-1)', 1),
(12, 1, 'The primer 110 has been properly ADDED in the database. (idPrimer: 110-1)', 1),
(13, 1, 'The primer 111 has been properly ADDED in the database. (idPrimer: 111-1)', 1),
(14, 1, 'The primer 112 has been properly ADDED in the database. (idPrimer: 112-1)', 1),
(15, 1, 'The primer 113 has been properly ADDED in the database. (idPrimer: 113-1)', 1),
(16, 1, 'The primer 114 has been properly ADDED in the database. (idPrimer: 114-1)', 1),
(17, 1, 'The primer 115 has been properly ADDED in the database. (idPrimer: 115-1)', 1),
(18, 1, 'The primer 116 has been properly ADDED in the database. (idPrimer: 116-1)', 1),
(19, 1, 'The primer 117 has been properly ADDED in the database. (idPrimer: 117-1)', 1),
(20, 1, 'The primer 118 has been properly ADDED in the database. (idPrimer: 118-1)', 1),
(21, 1, 'The primer 119 has been properly ADDED in the database. (idPrimer: 119-1)', 1),
(22, 1, 'The primer 120 has been properly ADDED in the database. (idPrimer: 120-1)', 1),
(23, 1, 'The primer 121 has been properly ADDED in the database. (idPrimer: 121-1)', 1),
(24, 1, 'The primer 122 has been properly ADDED in the database. (idPrimer: 122-1)', 1),
(25, 1, 'The primer 123 has been properly ADDED in the database. (idPrimer: 123-1)', 1),
(26, 1, 'The primer 124 has been properly ADDED in the database. (idPrimer: 124-1)', 1),
(27, 1, 'The primer 125 has been properly ADDED in the database. (idPrimer: 125-1)', 1),
(28, 1, 'The primer 126 has been properly ADDED in the database. (idPrimer: 126-1)', 1),
(29, 1, 'The primer 127 has been properly ADDED in the database. (idPrimer: 127-1)', 1),
(30, 1, 'The primer 128 has been properly ADDED in the database. (idPrimer: 128-1)', 1),
(31, 1, 'The primer 129 has been properly ADDED in the database. (idPrimer: 129-1)', 1),
(32, 1, 'The primer 130 has been properly ADDED in the database. (idPrimer: 130-1)', 1),
(33, 1, 'The primer 131 has been properly ADDED in the database. (idPrimer: 131-1)', 1),
(34, 1, 'The primer 132 has been properly ADDED in the database. (idPrimer: 132-1)', 1),
(35, 1, 'The primer 133 has been properly ADDED in the database. (idPrimer: 133-1)', 1),
(36, 1, 'The primer 134 has been properly ADDED in the database. (idPrimer: 134-1)', 1),
(37, 1, 'The primer 135 has been properly ADDED in the database. (idPrimer: 135-1)', 1);

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

--
-- Dumping data for table `Lab`
--

INSERT INTO `Lab` (`idLabs`, `Institution`, `Group_name`, `Country`, `Email`, `Lab_code`, `Database_forward`, `Database_reverse`) VALUES
(1, 'ColabSTOCK', 'PrimerSTOCK group', 'Spain', 'info@colabstock.com', 'ES3973', '', ''),
(2, 'PRBB', 'group1', 'Italy', 'alda.sabalic@gmail.com', 'IT7411', '', ''),
(3, 'UPF', 'DSB', 'Spain', 'alda.sabalic@hotmail.com', 'ES1523', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `Ordered`
--

CREATE TABLE `Ordered` (
  `idOrdered` int(11) NOT NULL,
  `is_ordered` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ordered`
--

INSERT INTO `Ordered` (`idOrdered`, `is_ordered`) VALUES
(1, 0x79),
(2, 0x6e),
(3, 0x30),
(4, 0x31);

-- --------------------------------------------------------

--
-- Table structure for table `Organism`
--

CREATE TABLE `Organism` (
  `idOrganism` int(11) NOT NULL,
  `Taxonomic_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Organism`
--

INSERT INTO `Organism` (`idOrganism`, `Taxonomic_name`) VALUES
(5, 'S cerevisae'),
(6, 'S.Cerevisae');

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

--
-- Dumping data for table `Primer`
--

INSERT INTO `Primer` (`idPrimer`, `Primer_name`, `Sequence_5to3`, `Direction_FwRv`, `Length`, `Tm`, `pGC`, `Concentration`, `Storage_position`, `Comments`, `Ordered_idOrdered`, `Lab_idLabs`, `Stock_idStock`, `Provider_idProvider`, `BindingSite_idBindingSite`) VALUES
('ACAAAGGAAATATTAAAATGGCAG-1', '109', 'ACAAAGGAAATATTAAAATGGCAG', 'Rv', 24, '0', '0', '100', '9', '', 3, 1, 4, 3, 'stopcodon-855463'),
('ACACAGAAATTTCTAAATTTAATGAG-1', '110', 'ACACAGAAATTTCTAAATTTAATGAG', 'Fw', 26, '0', '0', '100', '10', '', 3, 1, 4, 3, 'stopcodon-850840'),
('AGATATCAATAGTGATGAAGATCTG-1', '103', 'AGATATCAATAGTGATGAAGATCTG', 'Rv', 25, '0', '0', '100', '3', '', 3, 1, 4, 3, 'stopcodon-853019'),
('AGTACTAAGTAAGTGTGCATTC-1', '124', 'AGTACTAAGTAAGTGTGCATTC', 'Fw', 22, '0', '0', '100', '24', '', 3, 1, 4, 3, 'stopcodon-853942'),
('ATGAATCAT-1', 'hello', 'ATGAATCAT', 'Fw', 9, '0', '0', '100', 'A1', '', 4, 1, 3, 3, 'gene1-123'),
('CAAAACGGATAATGTTACGAATTC-1', '105', 'CAAAACGGATAATGTTACGAATTC', 'Rv', 24, '0', '0', '100', '5', '', 3, 1, 4, 3, 'stopcodon-853021'),
('CAAGTCACAGATGTGAATATAG-1', '118', 'CAAGTCACAGATGTGAATATAG', 'Fw', 22, '0', '0', '100', '18', '', 3, 1, 4, 3, 'stopcodon-852110'),
('CAATAAACCCAATCCCTTCAG-1', '129', 'CAATAAACCCAATCCCTTCAG', 'Rv', 21, '0', '0', '100', '29', '', 3, 1, 4, 3, 'stopcodon-852560'),
('CACACATCAAAGATGGATGAG-1', '123', 'CACACATCAAAGATGGATGAG', 'Rv', 21, '0', '0', '100', '23', '', 3, 1, 4, 3, 'stopcodon-851482'),
('CAGAGTTGCTATCTGTCATAG-1', '104', 'CAGAGTTGCTATCTGTCATAG', 'Fw', 21, '0', '0', '100', '4', '', 3, 1, 4, 3, 'stopcodon-853020'),
('CATAAACCTTCCCTCGATATAC-1', '121', 'CATAAACCTTCCCTCGATATAC', 'Rv', 22, '0', '0', '100', '21', '', 3, 1, 4, 3, 'stopcodon-852113'),
('CATTATGGAAAAAGCTATGGAG-1', '120', 'CATTATGGAAAAAGCTATGGAG', 'Fw', 22, '0', '0', '100', '20', '', 3, 1, 4, 3, 'stopcodon-852112'),
('CCATAGACGAAAGATCTGAAC-1', '119', 'CCATAGACGAAAGATCTGAAC', 'Rv', 21, '0', '0', '100', '19', '', 3, 1, 4, 3, 'stopcodon-852111'),
('CGTTACGCTCCATTACAC-1', '100', 'CGTTACGCTCCATTACAC', 'Fw', 18, '0', '0', '100', '0', '', 3, 1, 4, 3, 'stopcodon-854898'),
('CGTTAGTCGAAGCTAAGAAG-1', '116', 'CGTTAGTCGAAGCTAAGAAG', 'Fw', 20, '0', '0', '100', '16', '', 3, 1, 4, 3, 'stopcodon-852108'),
('CTAGAGTTTCTCAAACGGAG-1', '117', 'CTAGAGTTTCTCAAACGGAG', 'Rv', 20, '0', '0', '100', '17', '', 3, 1, 4, 3, 'stopcodon-852109'),
('CTGAAGAATCAAACGTGTTTC-1', '111', 'CTGAAGAATCAAACGTGTTTC', 'Rv', 21, '0', '0', '100', '11', '', 3, 1, 4, 3, 'stopcodon-850845'),
('GAACAAGAGCGGATTGAG-1', '126', 'GAACAAGAGCGGATTGAG', 'Fw', 18, '0', '0', '100', '26', '', 3, 1, 4, 3, 'stopcodon-852557'),
('GAACTTTGGGAATTCATGATTAAC-1', '122', 'GAACTTTGGGAATTCATGATTAAC', 'Fw', 24, '0', '0', '100', '22', '', 3, 1, 4, 3, 'stopcodon-852114'),
('GAAGAAATTAATAAGGTTGAAGTGAC-1', '108', 'GAAGAAATTAATAAGGTTGAAGTGAC', 'Fw', 26, '0', '0', '100', '8', '', 3, 1, 4, 3, 'stopcodon-853024'),
('GACCGTTACGAATATTTCGAC-1', '107', 'GACCGTTACGAATATTTCGAC', 'Rv', 21, '0', '0', '100', '7', '', 3, 1, 4, 3, 'stopcodon-853023'),
('GATGATGCATTGAAACAATATATTG-1', '101', 'GATGATGCATTGAAACAATATATTG', 'Rv', 25, '0', '0', '100', '1', '', 3, 1, 4, 3, 'stopcodon-852649'),
('GATGCGCTACACGATAC-1', '131', 'GATGCGCTACACGATAC', 'Rv', 17, '0', '0', '100', '31', '', 3, 1, 4, 3, 'stopcodon-852562'),
('GGATGTCTGGAAACAAATATTTG-1', '128', 'GGATGTCTGGAAACAAATATTTG', 'Fw', 23, '0', '0', '100', '28', '', 3, 1, 4, 3, 'stopcodon-852559'),
('GTAAAGGATGAATTGGATTATGATATG-1', '106', 'GTAAAGGATGAATTGGATTATGATATG', 'Fw', 27, '0', '0', '100', '6', '', 3, 1, 4, 3, 'stopcodon-853022'),
('GTAACCATTCACAATTGACAG-1', '102', 'GTAACCATTCACAATTGACAG', 'Fw', 21, '0', '0', '100', '2', '', 3, 1, 4, 3, 'stopcodon-853017'),
('GTCAAAGTAGGGGAAATAATAAAC-1', '130', 'GTCAAAGTAGGGGAAATAATAAAC', 'Fw', 24, '0', '0', '100', '30', '', 3, 1, 4, 3, 'stopcodon-852561'),
('GTGGAAACGGATCCAATG-1', '125', 'GTGGAAACGGATCCAATG', 'Rv', 18, '0', '0', '100', '25', '', 3, 1, 4, 3, 'stopcodon-852556'),
('GTGTTTGAAATTTGTCAAGAAG-1', '112', 'GTGTTTGAAATTTGTCAAGAAG', 'Fw', 22, '0', '0', '100', '12', '', 3, 1, 4, 3, 'stopcodon-851161'),
('GTTATTGTTAACTATTTTACGGAGTC-1', '113', 'GTTATTGTTAACTATTTTACGGAGTC', 'Rv', 26, '0', '0', '100', '13', '', 3, 1, 4, 3, 'stopcodon-852732'),
('GTTGATTCAAAAGATTATAGAGGATTC-1', '115', 'GTTGATTCAAAAGATTATAGAGGATTC', 'Rv', 27, '0', '0', '100', '15', '', 3, 1, 4, 3, 'stopcodon-852107'),
('tagtatagatctAACCATCCAATTCATTTACATATG-1', '134', 'tagtatagatctAACCATCCAATTCATTTACATATG', 'Fw', 36, '0', '0', '100', '34', 'Amplify ADH1 promoter with SacI site', 3, 1, 4, 3, 'promotor-854068'),
('tagtatagatctAGTTGATTGTATGCTTGGTATAG-1', '133', 'tagtatagatctAGTTGATTGTATGCTTGGTATAG', 'Rv', 35, '0', '0', '100', '33', 'Amplify ADH1 promoter with XbaI site', 3, 1, 4, 3, 'promotor-854068'),
('tagtatagatctATAATTAATCCATGAATGAAGTGTAAT-1', '135', 'tagtatagatctATAATTAATCCATGAATGAAGTGTAAT', 'Rv', 39, '0', '0', '100', '35', 'Amplify ADH1 promoter with XbaI site', 3, 1, 4, 3, 'promotor-854068'),
('tagtatgagctcTAAAACAAGAAGAGGGTTGAC-1', '132', 'tagtatgagctcTAAAACAAGAAGAGGGTTGAC', 'Fw', 33, '0', '0', '100', '32', 'Amplify ADH1 promoter with SacI site', 3, 1, 4, 3, 'promotor-854068'),
('TCTCGATATACTGCAGTTTATC-1', '127', 'TCTCGATATACTGCAGTTTATC', 'Rv', 22, '0', '0', '100', '27', '', 3, 1, 4, 3, 'stopcodon-852558'),
('TTTCAGAAGTGTAGAAAAATACATAG-1', '114', 'TTTCAGAAGTGTAGAAAAATACATAG', 'Fw', 26, '0', '0', '100', '14', '', 3, 1, 4, 3, 'stopcodon-852106');

-- --------------------------------------------------------

--
-- Table structure for table `Provider`
--

CREATE TABLE `Provider` (
  `idProvider` int(11) NOT NULL,
  `Provider_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Provider`
--

INSERT INTO `Provider` (`idProvider`, `Provider_name`) VALUES
(3, 'sigma');

-- --------------------------------------------------------

--
-- Table structure for table `Stock`
--

CREATE TABLE `Stock` (
  `idStock` int(11) NOT NULL,
  `in_stock` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Stock`
--

INSERT INTO `Stock` (`idStock`, `in_stock`) VALUES
(3, 0x30),
(4, 0x31),
(2, 0x6e),
(1, 0x79);

-- --------------------------------------------------------

--
-- Table structure for table `Target`
--

CREATE TABLE `Target` (
  `GenBank_id` int(11) NOT NULL,
  `Target_name` varchar(45) NOT NULL,
  `Organism_idOrganism` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Target`
--

INSERT INTO `Target` (`GenBank_id`, `Target_name`, `Organism_idOrganism`) VALUES
(123, 'gene1', 5),
(850840, 'Pep3', 6),
(850845, 'Pep5', 6),
(851161, 'Sec39', 6),
(851482, 'Vam6', 6),
(852106, 'Vps3', 6),
(852107, 'Vps8', 6),
(852108, 'Vps16', 6),
(852109, 'Vps33', 6),
(852110, 'Vps51', 6),
(852111, 'Vps52', 6),
(852112, 'Vps53', 6),
(852113, 'Vps54', 6),
(852114, 'Vps41', 6),
(852556, 'Trs20', 6),
(852557, 'Trs23', 6),
(852558, 'Trs31', 6),
(852559, 'Trs33', 6),
(852560, 'Trs65', 6),
(852561, 'Trs120', 6),
(852562, 'Trs130', 6),
(852649, 'Cog1', 6),
(852732, 'Tip20', 6),
(853017, 'Cog2', 6),
(853019, 'Cog3', 6),
(853020, 'Cog4', 6),
(853021, 'Cog5', 6),
(853022, 'Cog6', 6),
(853023, 'Cog7', 6),
(853024, 'Cog8', 6),
(853942, 'Bet3', 6),
(854068, 'ADH1', 6),
(854898, 'Bet5', 6),
(855463, 'Dsl1', 6);

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
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`idUsers`, `User_name`, `Surname`, `Email`, `Password`, `Cookies`, `Lab_idLabs`) VALUES
(1, 'Carla', 'Castignani Viladomiu', 'carla.castignani@gmail.com', '$2y$10$EYbIhyf2YFRGUDNOVHSNuuKQS550yEkzl.f415y/uy/D/lRmkl9F6', '', 1);

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
  MODIFY `idHistory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `Lab`
--
ALTER TABLE `Lab`
  MODIFY `idLabs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Ordered`
--
ALTER TABLE `Ordered`
  MODIFY `idOrdered` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Organism`
--
ALTER TABLE `Organism`
  MODIFY `idOrganism` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Provider`
--
ALTER TABLE `Provider`
  MODIFY `idProvider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Stock`
--
ALTER TABLE `Stock`
  MODIFY `idStock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
