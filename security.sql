-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 04 2020 г., 01:26
-- Версия сервера: 8.0.20
-- Версия PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `security`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `login` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`login`, `password`) VALUES
('admin', 1111);

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `initials` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rank` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id` int NOT NULL,
  `department_id` int NOT NULL,
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`initials`, `rank`, `id`, `department_id`, `login`, `password`) VALUES
('Кротко Ф.Ы.', 'Начальник отдела', 563, 1, 'user2', 1234);

-- --------------------------------------------------------

--
-- Структура таблицы `inkas`
--

CREATE TABLE `inkas` (
  `date` date NOT NULL,
  `sum` int NOT NULL,
  `responsible` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `inkas`
--

INSERT INTO `inkas` (`date`, `sum`, `responsible`) VALUES
('2020-06-03', 33333, 'Крич Ф.Ф.'),
('2009-12-12', 3421, 'Мирко В.В.');

-- --------------------------------------------------------

--
-- Структура таблицы `visitors`
--

CREATE TABLE `visitors` (
  `id` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `visitors`
--

INSERT INTO `visitors` (`id`, `date`) VALUES
(234, '2020-06-01'),
(6777, '2020-02-04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
