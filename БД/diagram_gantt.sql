-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 13 2018 г., 21:52
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `diagram_gantt`
--

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `res` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `links`
--

INSERT INTO `links` (`id`, `name`, `start`, `end`, `color`, `comp`, `group`, `parent`, `res`) VALUES
(13, 'Создание интернет магазина ', '2018-05-12', '2018-05-20', '000000', '20', '0', '0', 'Валик'),
(15, 'Разработка корпоративного портала', '2018-10-03', '2018-12-05', 'ff0000', '0', '1', '', 'Петров'),
(16, 'Создание макета ', '2018-05-17', '2018-05-23', '8080ff', '30', '1', '', 'Терехов'),
(17, 'Кодирование ', '2018-05-24', '2018-06-15', '00ffff', '20', '0', '1', 'Терехов,Валентин');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
