-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Чрв 05 2016 р., 15:40
-- Версія сервера: 10.1.10-MariaDB
-- Версія PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `test_otakoi`
--

-- --------------------------------------------------------

--
-- Структура таблиці `ot_posts`
--

CREATE TABLE `ot_posts` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `site` varchar(1000) NOT NULL,
  `date` varchar(32) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `ot_users`
--

CREATE TABLE `ot_users` (
  `id` int(2) NOT NULL,
  `login` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `ot_users`
--

INSERT INTO `ot_users` (`id`, `login`, `pass`) VALUES
(1, 'admin', 'admin');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `ot_posts`
--
ALTER TABLE `ot_posts`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `ot_users`
--
ALTER TABLE `ot_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `ot_posts`
--
ALTER TABLE `ot_posts`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `ot_users`
--
ALTER TABLE `ot_users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
