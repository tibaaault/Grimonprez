-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 09 jan. 2023 à 07:33
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `grimonprez`
--

-- --------------------------------------------------------

--
-- Structure de la table `Questions`
--

CREATE TABLE `Questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Questions`
--

INSERT INTO `Questions` (`id`, `question`, `reponse`, `prenom`) VALUES
(1, 'Comment approuver l\'autorisation de l\'appareil photo sur mon téléphone ?', 'Aller dans \"Réglage\" puis \"Autorisation\". Chercher le nom de l\'application puis cliquer dessus. Valider \"Autoriser l\'appareil photo sur cette application\"', ''),
(2, 'Où se trouve le bouton pour la fin de service ?', 'Se rendre dans ... puis défiler vers le bas ensuite ........', ''),
(3, 'Troisième question ?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', ''),
(4, 'Une question sans réponse ?', '', ''),
(5, 'Réponse avec prénom', 'J\'ai répondu avec mon prénom', 'Thibault'),
(6, 'Comment faire pour connecter son téléphone grâce au QR code du camion ?', ' test4634567 ', ''),
(7, 'Test dernière question', ' 2eme message ', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
