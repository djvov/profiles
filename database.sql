-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 31 2019 г., 08:46
-- Версия сервера: 5.7.22-22-log
-- Версия PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a84228_djvovts3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL DEFAULT '0' COMMENT 'ид профиля',
  `email` char(255) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'емаил',
  `main` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'основной емаил',
  `ord` int(11) NOT NULL DEFAULT '999999' COMMENT 'порядок'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `emails`
--

INSERT INTO `emails` (`id`, `profile_id`, `email`, `main`, `ord`) VALUES
(1, 1, 'djvov@inbox.ru', 0, 1),
(4, 1, 'djvov@yandex.ru', 0, 2),
(6, 1, 'dd@dd.dd', 1, 999999),
(8, 5, 'asdsd@ff.dd', 1, 999999),
(9, 5, 'asdsd@ff.dd', 0, 999999);

-- --------------------------------------------------------

--
-- Структура таблицы `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `phone_type_id` int(11) NOT NULL DEFAULT '0' COMMENT 'тип телефона',
  `phone` char(255) NOT NULL DEFAULT '' COMMENT 'телефон',
  `profile_id` int(11) NOT NULL DEFAULT '0' COMMENT 'id профиля',
  `main` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'основной телефон',
  `ord` int(11) NOT NULL DEFAULT '999999' COMMENT 'порядок'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phones`
--

INSERT INTO `phones` (`id`, `phone_type_id`, `phone`, `profile_id`, `main`, `ord`) VALUES
(1, 2, '+7 (904) 987-69-56', 1, 0, 1),
(8, 1, '+7 (345) 345-34-45', 1, 0, 999999),
(9, 2, '+7 (777) 777-77-77', 1, 1, 999999),
(11, 1, '+7 (121) 231-23-12', 5, 1, 999999),
(12, 2, '+7 (121) 231-23-12', 5, 0, 999999);

-- --------------------------------------------------------

--
-- Структура таблицы `phone_types`
--

DROP TABLE IF EXISTS `phone_types`;
CREATE TABLE `phone_types` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL DEFAULT '' COMMENT 'тип телефона'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phone_types`
--

INSERT INTO `phone_types` (`id`, `name`) VALUES
(1, 'домашний'),
(2, 'мобильный'),
(3, 'рабочий');

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL DEFAULT '' COMMENT 'имя',
  `surname` char(255) NOT NULL DEFAULT '' COMMENT 'фамилия',
  `patronymic` char(255) NOT NULL DEFAULT '' COMMENT 'отчество'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `surname`, `patronymic`) VALUES
(1, 'Василевс', 'Василевский', 'Василевсович'),
(5, 'Петр', 'Петров', 'Петрович');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`),
  ADD KEY `email` (`email`),
  ADD KEY `main` (`main`),
  ADD KEY `ord` (`ord`);

--
-- Индексы таблицы `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_type_id` (`phone_type_id`),
  ADD KEY `phone` (`phone`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Индексы таблицы `phone_types`
--
ALTER TABLE `phone_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `surname` (`surname`),
  ADD KEY `patronymic` (`patronymic`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `phone_types`
--
ALTER TABLE `phone_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
