-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 17 nov. 2022 à 13:01
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livres`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `auteur_id` int(11) NOT NULL,
  `auteur_nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`auteur_id`, `auteur_nom`) VALUES
(1, 'J.K. Rowling'),
(2, 'Victor Hugo'),
(3, 'Emile Zola');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `livre_id` int(11) NOT NULL,
  `livre_nom` varchar(255) NOT NULL,
  `livre_synopsis` text NOT NULL,
  `livre_auteur` int(11) NOT NULL,
  `livre_date_parution` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`livre_id`, `livre_nom`, `livre_synopsis`, `livre_auteur`, `livre_date_parution`) VALUES
(5, 'Les Misérables', 'En 1815, Jean Valjean est libéré du bagne de Toulon après y avoir purgé une peine de dix-neuf ans : victime d\'un destin tragique, initialement condamné à cinq ans de bagne pour avoir volé un pain afin de nourrir sa famille, il voit sa peine prolongée à la suite de plusieurs tentatives d\'évasion.', 2, '2022-11-15'),
(6, 'La Fortune des Rougons', 'La Fortune des Rougon raconte le coup d\'Etat du prince Louis-Napoléon Bonaparte et la naissance du Second Empire, le 2 décembre 1851. L\'action se situe en Provence à Plassans, une ville fictive que Zola a imaginée sur le modèle d\'Aix-en-Provence.', 3, '1851-12-02'),
(7, 'lo', 'adnaondadadpanaidpkjncaipjclk', 1, '2022-11-26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`auteur_id`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`livre_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `auteur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `livre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
