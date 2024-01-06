-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 05:47 PM
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
-- Database: `conferencedb`
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
(1, 'Home', 'Conteudo da Home'),
(2, 'Local', 'Conteudo da Pagina Local/venue'),
(3, 'Outras Informacoes', 'Conteudo da pagina outras informacoes');

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
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `texto` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tabela serve para listar as tracks e para os conteudos';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` enum('normal','admin') NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
