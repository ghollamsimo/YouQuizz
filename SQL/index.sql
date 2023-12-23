-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 23 déc. 2023 à 19:58
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE database quizz;

CREATE TABLE `answers` (
                           `Idanswer` int(11) NOT NULL,
                           `Answer` varchar(250) DEFAULT NULL,
                           `Idquestion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`Idanswer`, `Answer`, `Idquestion`) VALUES
                                                               (1, 'A) Amazon EC2 costs are billed on a monthly basis.\r\n', 1),
                                                               (2, 'B) Users retain full administrative access to their Amazon EC2 instances', 1),
                                                               (3, 'C) Amazon EC2 instances can be launched on demand when needed', 1),
                                                               (4, 'D) Users can permanently run enough instances to handle peak workloads.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
                            `Idquestion` int(11) NOT NULL,
                            `Question` varchar(255) DEFAULT NULL,
                            `Idtheme` int(11) DEFAULT NULL,
                            `Idanswer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`Idquestion`, `Question`, `Idtheme`, `Idanswer`) VALUES
                                                                             (1, 'Why is AWS more economical than traditional data centers for applications with varying compute\r\nworkloads?', NULL, 1),
                                                                             (2, ' Which AWS service would simplify the migration of a database to AWS?', NULL, NULL),
                                                                             (3, ' Which AWS offering enables users to find, buy, and immediately start using software solutions in their\r\nAWS environment?', NULL, NULL),
                                                                             (4, 'Which AWS networking service enables a company to create a virtual network within AWS?', NULL, NULL),
                                                                             (5, ' Which of the following is an AWS responsibility under the AWS shared responsibility model?', NULL, NULL),
                                                                             (6, ' Which component of the AWS global infrastructure does Amazon CloudFront use to ensure low-latency\r\ndelivery?', NULL, NULL),
                                                                             (7, 'How would a system administrator add an additional layer of login security to a user\'s AWS\r\nManagement Console?\r\n', NULL, NULL),
(8, ' Which service can identify the user that made the API call when an Amazon EC2 instance is\r\nterminated?', NULL, NULL),
(9, 'Which service would be used to send alerts based on Amazon CloudWatch alarms', NULL, NULL),
(10, ' Where can a user find information about prohibited actions on the AWS infrastructure?', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `Idtheme` int(11) NOT NULL,
  `Nametheme` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`Idtheme`, `Nametheme`) VALUES
(1, 'Cloud Concepts'),
(2, 'Security and Compliance.'),
(3, 'Cloud Technology and Services'),
(4, 'Billing, Pricing, and Support');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`Idanswer`),
  ADD KEY `Idquestion` (`Idquestion`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Idquestion`),
  ADD KEY `Idtheme` (`Idtheme`),
  ADD KEY `fk_aid_us` (`Idanswer`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`Idtheme`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `Idanswer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `Idquestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `Idtheme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`Idquestion`) REFERENCES `question` (`Idquestion`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_aid_us` FOREIGN KEY (`Idanswer`) REFERENCES `answers` (`Idanswer`),
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`Idtheme`) REFERENCES `theme` (`Idtheme`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
