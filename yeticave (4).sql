-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 30 2022 г., 10:20
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yeticave`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `name_eng` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `name`, `name_eng`) VALUES
(1, 'Доски и лыжи', 'boards'),
(2, 'Крепления', 'attachment'),
(3, 'Ботинки', 'boots'),
(4, 'Одежда', 'clothing'),
(5, 'Инструменты', 'tools'),
(6, 'Разное', 'other');

-- --------------------------------------------------------

--
-- Структура таблицы `lot`
--

CREATE TABLE `lot` (
  `id_lot` int(11) NOT NULL,
  `id_winner` int(11) DEFAULT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_creation` datetime NOT NULL,
  `lot_name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `start_cost` int(11) NOT NULL,
  `data_stop` datetime NOT NULL,
  `shag_sravka` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lot`
--

INSERT INTO `lot` (`id_lot`, `id_winner`, `id_categorie`, `id_user`, `data_creation`, `lot_name`, `description`, `image`, `start_cost`, `data_stop`, `shag_sravka`) VALUES
(1, NULL, 1, 1, '2022-05-17 00:00:00', '2015 Rossignol District Snowboard', 'Доска', 'lot-1.jpg', 10990, '2022-05-16 00:00:00', '1'),
(2, NULL, 2, 2, '2022-05-17 00:00:00', 'DC Ply Mens 2016/2017 Snowboard', 'Лыжа', 'lot-2.jpg', 159999, '2022-05-16 00:00:00', '1'),
(3, NULL, 3, 3, '2022-05-17 00:00:00', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепление', 'lot-3.jpg', 8000, '2022-05-16 00:00:00', '1'),
(4, NULL, 4, 1, '2022-05-17 00:00:00', 'Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки', 'lot-4.jpg', 10999, '2022-05-16 00:00:00', '1'),
(5, NULL, 5, 2, '2022-05-17 00:00:00', 'Куртка для сноуборда DC Mutiny Charocal', 'Куртка', 'lot-5.jpg', 7500, '2022-05-16 00:00:00', '1'),
(6, NULL, 6, 3, '2022-05-17 00:00:00', 'Маска Oakley Canopy', 'Маска', 'lot-6.jpg', 5400, '2022-05-16 00:00:00', '1'),
(7, NULL, 5, 1, '2022-05-30 09:52:22', 'dfgdfgfd', 'гшдгшщг', '111.png', 2000, '2022-05-31 00:00:00', '200'),
(8, NULL, 6, 1, '2022-05-30 10:14:34', 'test', 'test', '123.jpg', 2790, '2022-05-31 00:00:00', '50');

-- --------------------------------------------------------

--
-- Структура таблицы `stavka`
--

CREATE TABLE `stavka` (
  `id_stavka` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `summa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stavka`
--

INSERT INTO `stavka` (`id_stavka`, `date`, `summa`, `id_user`, `id_lot`) VALUES
(1, '2022-05-16 00:00:00', 11200, 1, NULL),
(2, '2022-05-16 00:00:00', 11500, 2, NULL),
(3, '2022-05-16 00:00:00', 12700, 3, NULL),
(4, '2022-05-16 00:00:00', 13200, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `avatar` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `date_regisrtatoin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `pass`, `avatar`, `contact`, `date_regisrtatoin`) VALUES
(1, 'Павел', 'pvlst77@gmail.com', '123456', '1.jpg', '89264274444', '2016-05-22 00:00:00'),
(2, 'Дмитрий', 'dmtr77@gmail.com', '123456', '2.jpg', '89264276666', '2015-05-22 00:00:00'),
(3, 'Сергей', 'serg@gmail.com', '123456', '3.jpg', '892642755', '2014-05-22 00:00:00'),
(4, 'Антон', 'ant@gmail.com', '123456', '4.jpg', '89264275545', '2019-05-22 00:00:00'),
(5, 'Андрей', 'andr@gmail.com', '123456', '53.jpg', '89264275532', '2022-05-22 00:00:00'),
(6, 'Алексей', 'alex@gmail.com', '123456', '6.jpg', '89264275516', '2021-05-22 00:00:00'),
(7, 'уцуцкцукцу', 'pvlst56567@gmail.com', '123456', '111.png', '89585858585', '2022-05-30 10:05:14'),
(8, 'уцуцкцукцуйц', 'pvlst88@gmail.com', '123456', '111.png', '89585858589', '2022-05-30 10:13:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Индексы таблицы `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`id_lot`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_winner` (`id_winner`);

--
-- Индексы таблицы `stavka`
--
ALTER TABLE `stavka`
  ADD PRIMARY KEY (`id_stavka`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lot` (`id_lot`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `lot`
--
ALTER TABLE `lot`
  MODIFY `id_lot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `stavka`
--
ALTER TABLE `stavka`
  MODIFY `id_stavka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `lot`
--
ALTER TABLE `lot`
  ADD CONSTRAINT `lot_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lot_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lot_ibfk_3` FOREIGN KEY (`id_winner`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `stavka`
--
ALTER TABLE `stavka`
  ADD CONSTRAINT `stavka_ibfk_1` FOREIGN KEY (`id_lot`) REFERENCES `lot` (`id_lot`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stavka_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
