-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 05:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `artigo`
--

CREATE TABLE `artigo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `autores` varchar(200) NOT NULL,
  `descricao` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artigo`
--

INSERT INTO `artigo` (`id`, `titulo`, `autores`, `descricao`) VALUES
(25, 'Dancing with Quarks: Navigating the Subatomic Realm', 'Dr. Elena Rodriguez, Particle Physicist', 'Delve into the intricate world of particle physics with Dr. Elena Rodriguez as she explores the fascinating dance of quarks, providing insights into the fundamental building blocks of the universe and the cutting-edge discoveries shaping our understanding.'),
(28, 'Genomic Revolution: A Journey into the Human Blueprint', 'Prof. Jonathan Chen, Genomics Researcher', 'Embark on a genomic odyssey guided by Prof. Jonathan Chen, as he unveils the latest breakthroughs in deciphering the human genome. Gain a deeper appreciation for the transformative impact of genomics on medicine, genetics, and personalized healthcare.'),
(29, 'Mind Matters: Unraveling the Intricacies of Neural Connectivity', 'Dr. Sarah Williams, Neuroscientist', 'Join Dr. Sarah Williams on a captivating exploration of neural networks and the complexities of the human mind. From synaptic connections to cognitive functions, this article provides a comprehensive view of the latest advancements in neuroscience.'),
(30, 'Exoplanets and Extraterrestrial Life: Beyond Our Cosmic Borders', 'Prof. Alexander Patel, Astrobiologist', 'Prof. Alexander Patel invites you to peer beyond Earth\'s atmosphere as he investigates exoplanets and the potential for extraterrestrial life. This article unravels the mysteries of distant worlds and the ongoing quest to discover signs of life beyond our solar system.'),
(31, 'Greentech Renaissance: Innovations Shaping a Sustainable Future', 'Dr. Mia Thompson, Environmental Scientist', 'Dr. Mia Thompson presents a compelling narrative on the forefront of environmental science. Explore groundbreaking innovations in greentech that promise to revolutionize our approach to sustainability, offering solutions to address the pressing challenges of a changing planet.');

-- --------------------------------------------------------

--
-- Table structure for table `conteudo`
--

CREATE TABLE `conteudo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='contedudos das paginas';

--
-- Dumping data for table `conteudo`
--

INSERT INTO `conteudo` (`id`, `titulo`, `texto`) VALUES
(1, 'Home bio', 'Immerse yourself in a dynamic program featuring expert-led sessions, interactive workshops, and thought-provoking discussions. Explore the latest advancements and contribute to the collective knowledge that propels our understanding of Science.'),
(2, 'Local', 'Avenida da Ciência,567 Bairro da Descoberta, Cidade do Saber 1234-567, Portugal'),
(3, 'Outras Informacoes', 'rrrrrr');

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `idArtigo` int(11) NOT NULL,
  `idTrack` int(11) NOT NULL,
  `sala` varchar(1) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`id`, `idArtigo`, `idTrack`, `sala`, `data`, `hora`) VALUES
(6, 25, 4, 'A', '2024-02-12', '10:00:00'),
(7, 28, 5, 'B', '2024-02-12', '13:00:00'),
(8, 29, 6, 'A', '2024-02-13', '10:00:00'),
(9, 30, 7, 'B', '2024-02-13', '13:00:00'),
(10, 31, 8, 'A', '2024-02-14', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int(11) NOT NULL,
  `first` varchar(50) NOT NULL,
  `last` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `first`, `last`, `mail`, `phone`) VALUES
(1, '123', '123', '123@gmail.com', 123),
(2, 'dfghiuhdfg', 'poiudsfegjdrj', 'jefwoigods@gmail.com', 123456789),
(3, 'dfghiuhdfg', 'poiudsfegjdrj', 'jefwoigods@gmail.com', 123456789),
(4, 'fbdug', 'ijfndfgf', 'diogomartim@gmail.com', 123456789),
(5, 'edfio[jgpoifd[kgpofds', 'ofgdofifgp', 'asbdsfos@gmasil.com', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `pergunta`
--

CREATE TABLE `pergunta` (
  `id` int(11) NOT NULL,
  `idArtigo` int(11) NOT NULL,
  `pergunta` varchar(2000) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(20) NOT NULL,
  `userId` int(20) NOT NULL,
  `Text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `texto` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tabela serve para listar as tracks e para os conteudos';

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`id`, `nome`, `texto`) VALUES
(4, 'Quantum Horizons', 'Exploring the Frontiers of Particle Physics'),
(5, 'Genomic Odyssey', 'Unraveling the Code of Life'),
(6, 'Synaptic Symposium', 'Decoding the Complexity of Neural Networks'),
(7, 'Beyond Earth', 'Astrobiology and the Search for Extraterrestrial Life'),
(8, 'Innovations in Green Tech', 'Sustainable Solutions for a Changing Planet');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` enum('normal','admin','trackadmin') NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `type`) VALUES
(3, 'www', '0740d7491669795fa4ee0f6df7c34008', 'cool@gmail.com', ''),
(4, 'ww', '0740d7491669795fa4ee0f6df7c34008', 'gon@gmail.com', ''),
(5, '123', '0740d7491669795fa4ee0f6df7c34008', 'teste@gmail.com', 'admin'),
(6, 'util', '223a5fb31b5f4714d2f2bbae82f9e41c', 'testee@gmail.com', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conteudo`
--
ALTER TABLE `conteudo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idArtigo` (`idArtigo`,`idTrack`),
  ADD KEY `idTrack` (`idTrack`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idArtigo` (`idArtigo`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artigo`
--
ALTER TABLE `artigo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`idArtigo`) REFERENCES `artigo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`idTrack`) REFERENCES `track` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pergunta`
--
ALTER TABLE `pergunta`
  ADD CONSTRAINT `pergunta_ibfk_1` FOREIGN KEY (`idArtigo`) REFERENCES `artigo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
