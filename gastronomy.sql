-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 04 2017 г., 18:28
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gastronomy`
--
CREATE DATABASE IF NOT EXISTS `gastronomy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gastronomy`;

-- --------------------------------------------------------

--
-- Структура таблицы `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dish`
--

INSERT INTO `dish` (`id`, `name`) VALUES
(1, 'Olivie'),
(2, 'Soup'),
(3, 'Salad'),
(4, 'Compote'),
(5, 'Soup2'),
(6, 'Autogenerated dish #0'),
(7, 'Autogenerated dish #1'),
(8, 'Autogenerated dish #2'),
(9, 'Autogenerated dish #3'),
(10, 'Autogenerated dish #4'),
(11, 'Autogenerated dish #5'),
(12, 'Autogenerated dish #6'),
(13, 'Autogenerated dish #7'),
(14, 'Autogenerated dish #8'),
(15, 'Autogenerated dish #9'),
(16, 'Autogenerated dish #10'),
(17, 'Autogenerated dish #11'),
(18, 'Autogenerated dish #12'),
(19, 'Autogenerated dish #13'),
(20, 'Autogenerated dish #14'),
(21, 'Autogenerated dish #15'),
(22, 'Autogenerated dish #16'),
(23, 'Autogenerated dish #17'),
(24, 'Autogenerated dish #18'),
(25, 'Autogenerated dish #19');

-- --------------------------------------------------------

--
-- Структура таблицы `dishingredientlink`
--

CREATE TABLE `dishingredientlink` (
  `id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dishingredientlink`
--

INSERT INTO `dishingredientlink` (`id`, `dish_id`, `ingredient_id`) VALUES
(18, 1, 4),
(19, 1, 5),
(20, 1, 8),
(21, 1, 9),
(22, 1, 12),
(23, 1, 13),
(24, 1, 16),
(25, 3, 1),
(26, 3, 8),
(27, 3, 12),
(28, 2, 2),
(29, 2, 3),
(30, 2, 14),
(31, 2, 15),
(41, 4, 6),
(42, 4, 7),
(43, 4, 14),
(44, 5, 2),
(45, 5, 3),
(46, 5, 5),
(47, 5, 14),
(48, 6, 1),
(49, 6, 16),
(50, 7, 13),
(51, 7, 16),
(52, 8, 2),
(53, 8, 13),
(54, 9, 4),
(55, 9, 16),
(56, 9, 14),
(57, 10, 13),
(58, 11, 2),
(59, 11, 15),
(60, 11, 7),
(61, 11, 3),
(62, 12, 13),
(63, 12, 10),
(64, 12, 3),
(65, 13, 3),
(66, 13, 3),
(67, 13, 14),
(68, 14, 1),
(69, 14, 4),
(70, 14, 13),
(71, 14, 5),
(72, 15, 6),
(73, 15, 2),
(74, 15, 12),
(75, 16, 11),
(76, 16, 2),
(77, 17, 1),
(78, 17, 10),
(79, 17, 6),
(80, 18, 1),
(81, 19, 3),
(82, 19, 13),
(83, 19, 3),
(84, 19, 12),
(85, 20, 7),
(86, 20, 8),
(87, 20, 9),
(88, 20, 3),
(89, 21, 12),
(90, 21, 9),
(91, 22, 8),
(92, 22, 15),
(93, 22, 11),
(94, 23, 9),
(95, 24, 7),
(96, 24, 13),
(97, 24, 14),
(98, 25, 10),
(99, 25, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `is_hidden` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ingredient`
--

INSERT INTO `ingredient` (`id`, `name`, `is_hidden`) VALUES
(1, 'tomato', 1),
(2, 'cabbage', 0),
(3, 'potato', 0),
(4, 'onion', 0),
(5, 'carrot', 0),
(6, 'apple', 0),
(7, 'berries', 0),
(8, 'cucumber', 0),
(9, 'peas', 0),
(10, 'corn', 0),
(11, 'rice', 0),
(12, 'mayonnaise', 0),
(13, 'sausage', 0),
(14, 'water', 0),
(15, 'meat', 0),
(16, 'egg', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dishingredientlink`
--
ALTER TABLE `dishingredientlink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dish_id` (`dish_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Индексы таблицы `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `dishingredientlink`
--
ALTER TABLE `dishingredientlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT для таблицы `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dishingredientlink`
--
ALTER TABLE `dishingredientlink`
  ADD CONSTRAINT `dishingredientlink_ibfk_1` FOREIGN KEY (`dish_id`) REFERENCES `dish` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dishingredientlink_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
