-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vygenerováno: Pon 07. dub 2014, 15:35
-- Verze serveru: 5.6.11
-- Verze PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `ukolnicek`
--
CREATE DATABASE IF NOT EXISTS `ukolnicek` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `ukolnicek`;

-- --------------------------------------------------------

--
-- Struktura tabulky `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Zahrádka');

-- --------------------------------------------------------

--
-- Struktura tabulky `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci NOT NULL,
  `category` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `assignee` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `term` datetime NOT NULL,
  `done` int(11) NOT NULL,
  `date_done` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- RELACE PRO TABULKU `tasks`:
--   `assignee`
--       `users` -> `id`
--   `author`
--       `users` -> `id`
--   `category`
--       `categories` -> `id`
--

--
-- Vypisuji data pro tabulku `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `category`, `author`, `assignee`, `created`, `term`, `done`, `date_done`) VALUES
(1, 'Posekat', 'Posekat zahrádku', 1, 2, 1, '2014-04-03 00:00:00', '2014-04-19 00:00:00', 0, '0000-00-00 00:00:00'),
(2, '', 'Pokus', 0, 0, 0, '2014-04-07 12:56:29', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'pokus2', 'sfsadfsdjsdlkjsldjsldkfsdůlajůsdksdůlfsdf', 0, 0, 0, '2014-04-07 13:39:04', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(250) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_czech_ci NOT NULL,
  `surname` varchar(250) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `email`) VALUES
(1, 'perteus', 'blanka', 'Tomáš', 'Zmek', 'perteus@gmail.com'),
(2, 'janie', 'matyas', 'Žaneta', 'Velebová', 'janie@seznam.cz');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
