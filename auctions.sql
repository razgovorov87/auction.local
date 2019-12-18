-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2019 г., 14:44
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `auctions`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auction`
--

CREATE TABLE `auction` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `specification_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `auction`
--

INSERT INTO `auction` (`id`, `title`, `start_date`, `specification_id`) VALUES
(1, 'Gosdirect', '2019-10-10', 1),
(5, 'Zonzone', '2019-09-30', 1),
(6, 'Konktrans', '2019-10-04', 9),
(7, 'Quotetrax', '2019-09-13', 6),
(8, 'Funzenzone', '2019-10-18', 8),
(9, 'Sailzatcan', '2019-10-05', 7),
(10, 'Dingstreet', '2019-09-14', 5),
(11, 'Trueplus', '2019-11-01', 1),
(12, 'Striptax', '2017-10-04', 1),
(13, 'Stimlux', '2019-10-18', 9),
(14, 'Golddrill', '2019-09-06', 6),
(15, 'Quadtech', '2019-10-10', 8),
(16, 'Drillzap', '2019-10-03', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE `item` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `title`, `description`) VALUES
(1, 'BMW M5', 'Машина '),
(2, 'Картина \"Мона Лиза\"', 'Объект живописи'),
(3, 'Склад с вещами', 'Брошенный контейнер'),
(4, 'Автомат M4A1-S', 'Натовская штурмовая винтовка'),
(5, 'Часы Rolex', 'Золотые часы от известной компании \"Rolex\"'),
(6, 'Ваза династии Цынь', 'Древняя китайская реликвия'),
(7, 'Футболка с автографом', 'Автограф принадлежит супер-пупер звезде'),
(8, 'Квартира', 'Площадь: 50км2, 3 этаж'),
(9, 'Lada Kalina', 'Автомобиль российского производства'),
(10, 'Марка \"Ленину 50 лет\"', 'Очень ценная почтовая марка');

-- --------------------------------------------------------

--
-- Структура таблицы `lots`
--

CREATE TABLE `lots` (
  `id` int(11) UNSIGNED NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `start_price` int(11) UNSIGNED DEFAULT NULL,
  `final_price` int(11) UNSIGNED DEFAULT NULL,
  `item_id` int(11) UNSIGNED DEFAULT NULL,
  `seller_id` int(11) UNSIGNED DEFAULT NULL,
  `buyer_id` int(11) UNSIGNED DEFAULT NULL,
  `auction_id` int(11) UNSIGNED DEFAULT NULL,
  `status_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lots`
--

INSERT INTO `lots` (`id`, `number`, `start_date`, `start_price`, `final_price`, `item_id`, `seller_id`, `buyer_id`, `auction_id`, `status_id`) VALUES
(4, '859461', '2019-12-20', 1000000, NULL, 1, 2, NULL, 10, 2),
(5, '654M41', '2019-12-01', 10000, 35000, 4, 5, 6, 16, 1),
(6, '78315A', '2019-12-06', 5000000, NULL, 2, 3, NULL, 8, 2),
(7, 'K76953', '2019-11-07', 8000, 20000, 9, 4, 2, 1, 1),
(8, '147963', '2019-12-04', 0, 500, 3, 1, 3, 6, 1),
(9, '758B125', '2019-12-07', 800, NULL, 10, 6, NULL, 7, 2),
(10, '8R5214', '2019-12-01', 90000, 180000, 6, 4, 5, 15, 1),
(11, '758RT2', '2019-12-12', 5000, 10000, 7, 2, 1, 9, 1),
(12, '789RE1', '2019-12-07', 3000000, 3500000, 8, 6, 2, 13, 1),
(13, 'RTE258', '2019-12-27', 50000, NULL, 5, 4, NULL, 5, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `peoples`
--

CREATE TABLE `peoples` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `peoples`
--

INSERT INTO `peoples` (`id`, `name`, `surname`, `birthday`) VALUES
(1, 'Оливер', 'Ковальчук', '1982-07-21'),
(2, 'Мирослав', 'Логинов', '1999-08-31'),
(3, 'Емельян', 'Фёдоров', '1956-11-30'),
(4, 'Николай', 'Фокин', '1982-01-07'),
(5, 'Денис', 'Фролов', '1986-05-21'),
(6, 'Иннокентий', 'Никифоров', '1975-02-22');

-- --------------------------------------------------------

--
-- Структура таблицы `specification`
--

CREATE TABLE `specification` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specification`
--

INSERT INTO `specification` (`id`, `title`) VALUES
(1, 'Машины'),
(5, 'Картины'),
(6, 'Оружие'),
(7, 'Склады'),
(8, 'Драгоценности'),
(9, 'Мебель\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `title`) VALUES
(1, 'Продано'),
(2, 'Торг');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES
(1, 'admin', 'razgovorov87@gmail.com', '$2y$10$2E4NR9YsvYMW9hn6eJ4yFOZsvEJc4pPmfgP/.ctceWeK6DYFZwq5e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_auctions_specification` (`specification_id`);

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_lots_item` (`item_id`),
  ADD KEY `index_foreignkey_lots_seller` (`seller_id`),
  ADD KEY `index_foreignkey_lots_buyer` (`buyer_id`),
  ADD KEY `index_foreignkey_lots_auction` (`auction_id`),
  ADD KEY `index_foreignkey_lots_status` (`status_id`);

--
-- Индексы таблицы `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auction`
--
ALTER TABLE `auction`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `specification`
--
ALTER TABLE `specification`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `c_fk_auctions_specification_id` FOREIGN KEY (`specification_id`) REFERENCES `specification` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `lots`
--
ALTER TABLE `lots`
  ADD CONSTRAINT `c_fk_lots_auction_id` FOREIGN KEY (`auction_id`) REFERENCES `auction` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_lots_buyer_id` FOREIGN KEY (`buyer_id`) REFERENCES `peoples` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_lots_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_lots_seller_id` FOREIGN KEY (`seller_id`) REFERENCES `peoples` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_lots_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
