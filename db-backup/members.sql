-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Май 22 2020 г., 21:13
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `id13494929_inteam`
--

-- --------------------------------------------------------

--
-- Структура таблицы `members`
--

CREATE TABLE `members` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_reg` datetime DEFAULT NULL,
  `date_lastseen` datetime DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `photo` varchar(700) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `summary` varchar(1000) DEFAULT NULL,
  `competencies` varchar(1000) DEFAULT NULL,
  `experience` int(11) DEFAULT 0,
  `rating` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `members`
--

INSERT INTO `members` (`id`, `email`, `password`, `date_reg`, `date_lastseen`, `name`, `surname`, `photo`, `location`, `summary`, `competencies`, `experience`, `rating`) VALUES
(22, 'Sassa', '123', '2020-05-12 09:01:47', '2020-05-12 09:01:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(23, 'oleg', 'pass', '2020-05-13 10:13:32', '2020-05-20 11:19:46', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(24, 'kock', 'pass', '2020-05-13 12:25:34', '2020-05-13 12:25:34', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(25, 's', 'pass', '2020-05-14 11:11:32', '2020-05-14 11:11:32', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(26, 's1', 'pass', '2020-05-14 11:11:38', '2020-05-14 11:11:38', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(27, 'oleg\n', 'pass', '2020-05-19 16:10:52', '2020-05-19 16:10:52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(28, 'olegs', 'pass', '2020-05-19 16:10:58', '2020-05-19 16:10:58', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(29, 'hui', 'pasasi', '2020-05-19 16:15:08', '2020-05-19 16:15:08', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(30, 'privet', 'andrey', '2020-05-20 10:23:56', '2020-05-20 10:23:56', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(31, 'poka', 'oleg', '2020-05-20 10:45:23', '2020-05-20 10:45:23', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(32, 'pooshka', '123', '2020-05-20 10:52:29', '2020-05-20 10:52:29', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
