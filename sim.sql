-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Jan-2020 às 16:04
-- Versão do servidor: 10.3.14-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `note_t`
--

DROP TABLE IF EXISTS `note_t`;
CREATE TABLE IF NOT EXISTS `note_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `note_t`
--

INSERT INTO `note_t` (`id`, `title`, `text`, `type`, `user_id`) VALUES
(1, 'teste', 'Bacon ipsum dolor amet bacon ham buffalo shank rump fatback ribeye ball tip short loin bresaola chicken shoulder turkey burgdoggen. Landjaeger ground round fatback kielbasa pastrami cow, chislic ball tip strip steak pancetta. Pastrami shank jerky, ham hock filet mignon cow pork belly. Jerky pork chop leberkas beef, pig kevin filet mignon rump shank doner drumstick bacon. Shankle sirloin corned beef turducken ham hock short loin short ribs.', 'txt', 10),
(2, 'teste2', 'Bacon ipsum dolor amet bacon ham buffalo shank rump fatback ribeye ball tip short loin bresaola chicken shoulder turkey burgdoggen. Landjaeger ground round fatback kielbasa pastrami cow, chislic ball tip strip steak pancetta. Pastrami shank jerky, ham hock filet mignon cow pork belly. Jerky pork chop leberkas beef, pig kevin filet mignon rump shank doner drumstick bacon. Shankle sirloin corned beef turducken ham hock short loin short ribs.', 'txt', 10),
(3, 'teste3', 'Public Policy Design: from cities to Europe, and back! - foi o tema da conferência que aconteceu no dia 25 de novembro em Bruxelas, e que contou com a presença e participação do Dr. Gabriel Patrocínio, professor do Design.Ismat. \r\n\r\nDurante o evento, promovido pela municipalidade de Lille, Capital Mundial do Design em 2020, foram debatidos e avaliados pelos presentes quatro projetos de renovação social e urbana nas cidades de Bruxelas, Helsínquia, Kolding e Valencia. Os contactos realizados deverão resultar em futuras colaborações com o ISMAT.', 'txt', 10),
(4, 'teste123', 'Bacon ipsum dolor amet bacon ham buffalo shank rump fatback ribeye ball tip short loin bresaola chicken shoulder turkey burgdoggen. Landjaeger ground round fatback kielbasa pastrami cow, chislic ball tip strip steak pancetta. \r\nPastrami shank jerky, ham hock filet mignon cow pork belly. Jerky pork chop leberkas beef, pig kevin filet mignon rump shank doner drumstick bacon. Shankle sirloin corned beef turducken ham hock short loin short ribs.', 'txt', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_t`
--

DROP TABLE IF EXISTS `user_t`;
CREATE TABLE IF NOT EXISTS `user_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `hash_confirm` varchar(100) NOT NULL,
  `confirmed` int(1) NOT NULL,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique` (`username`),
  UNIQUE KEY `email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_t`
--

INSERT INTO `user_t` (`id`, `username`, `password`, `email`, `name`, `surname`, `hash_confirm`, `confirmed`, `data_nascimento`) VALUES
(10, 'djguu', '$2y$10$nsFMLYrX/S/z6OoxVrjgU.4XGbEMwikF.BR26XLMWjrh.FJTHortm', 'asd@asd.pt', 'asd', 'qwe', '74756a9acbb38238b1786f1bacd5df68', 0, '1996-09-17'),
(13, 'teste', '$2y$10$huYG3dwk5KrfWdoqHKYU/Ov36KrJN1C6HLyOHFovF/ifigbTowmyi', 'teste@teste.com', 'teste', 'teste', '55dc23ac51ce134f730a7422fce78bb1', 0, '1996-01-01');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `note_t`
--
ALTER TABLE `note_t`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_t` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
