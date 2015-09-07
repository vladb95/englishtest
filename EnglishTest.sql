-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 07 2015 г., 23:17
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `EnglishTest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `activate`
--

CREATE TABLE IF NOT EXISTS `activate` (
  `user_id` int(11) NOT NULL,
  `activate_key` varchar(100) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `language_level`
--

CREATE TABLE IF NOT EXISTS `language_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `language_level`
--

INSERT INTO `language_level` (`id`, `level`) VALUES
(1, 'Elementary'),
(2, 'Pre-Intermediate'),
(3, 'Intermediate'),
(4, 'Upper-Intermediate');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `name`, `users_id`, `rate`, `email`) VALUES
(1, 'test', 2, 20, 'test@test.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `val`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(256) NOT NULL,
  `test_type_id` int(11) DEFAULT NULL,
  `test_context` text NOT NULL,
  `time` int(11) DEFAULT NULL,
  `language_level_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_type_id` (`test_type_id`),
  KEY `language_level_id` (`language_level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `test_name`, `test_type_id`, `test_context`, `time`, `language_level_id`) VALUES
(1, 'test', 1, '', 60, 1),
(2, 'test2', 2, '', 60, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `test_event`
--

CREATE TABLE IF NOT EXISTS `test_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `hits` float DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`),
  KEY `test_id` (`test_id`),
  KEY `status_id` (`status_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `test_event`
--

INSERT INTO `test_event` (`id`, `profile_id`, `test_id`, `hits`, `status_id`) VALUES
(3, 1, 1, 12, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `test_status`
--

CREATE TABLE IF NOT EXISTS `test_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `test_status`
--

INSERT INTO `test_status` (`id`, `status_value`) VALUES
(1, 'not checked'),
(2, 'in checking'),
(3, 'check');

-- --------------------------------------------------------

--
-- Структура таблицы `test_type`
--

CREATE TABLE IF NOT EXISTS `test_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `test_type`
--

INSERT INTO `test_type` (`id`, `type_value`) VALUES
(1, 'Speaking Test'),
(2, 'Writing Test'),
(3, 'Multiple Chois');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `activate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `role_id`, `activate`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 1);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `activate`
--
ALTER TABLE `activate`
  ADD CONSTRAINT `activate_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `FK_test_language_level` FOREIGN KEY (`language_level_id`) REFERENCES `language_level` (`id`),
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`test_type_id`) REFERENCES `test_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `test_event`
--
ALTER TABLE `test_event`
  ADD CONSTRAINT `test_event_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`),
  ADD CONSTRAINT `test_event_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`),
  ADD CONSTRAINT `test_event_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `test_status` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
