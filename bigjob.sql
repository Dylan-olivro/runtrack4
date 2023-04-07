-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 07 avr. 2023 à 08:22
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bigjob`
--

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `request` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `isAccepted` varchar(255) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `presence`
--

INSERT INTO `presence` (`id`, `date`, `request`, `username`, `isAccepted`) VALUES
(1, '2023-04-07 09:10:00', 'Test request', 'user1', 'accepted'),
(2, '2023-04-21 22:11:00', 'test 2 request', 'user1', 'declined'),
(3, '2023-05-04 22:11:00', 'test 3 request', 'user1', 'accepted'),
(4, '2023-04-24 22:11:00', 'test 4 request', 'user2', 'declined'),
(5, '2023-05-25 22:11:00', 'test 5 request', 'user2', 'waiting');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'dylan', 'dylan@laplateforme.io', '$2y$10$2R4HuyeuB.Qsa6U1kvXsG.9dR/xOaDGNkfMcMYPCe1mA79YSedNyu', 2),
(2, 'admin', 'admin@laplateforme.io', '$2y$10$reVX08ta9Ya1vBho9aTPUuI2yAlUSWEauYR27g1clZ/Ftzit/haqS', 2),
(3, 'modo', 'modo@laplateforme.io', '$2y$10$253vyp.kbXYB4i0axv99C.rEWPqLwYmLftALS3XMgcKMKpP0rWgGW', 1),
(4, 'user1', 'user1@laplateforme.io', '$2y$10$rBX1.e1EJ9xOXRfB6JsKPeUToFp3YnNH4yUgMVSioYcoEZ4GzEY7u', 0),
(5, 'user2', 'user2@laplateforme.io', '$2y$10$PHVpx03CJ17BGAI4YnzeIezh4l4m3qwBH.RY/XPJRmvraH8vHIupW', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
