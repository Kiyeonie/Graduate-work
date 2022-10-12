-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 23 2022 г., 18:51
-- Версия сервера: 5.7.38
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bd_nkhz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id_basket` int(10) UNSIGNED NOT NULL,
  `checked` varchar(100) NOT NULL,
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `price_product` int(10) UNSIGNED NOT NULL,
  `number_product` int(10) UNSIGNED NOT NULL,
  `total_price` int(10) UNSIGNED NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id_basket`, `checked`, `id_order`, `id_user`, `id_product`, `name_product`, `price_product`, `number_product`, `total_price`, `photo`) VALUES
(1, 'images/no.png', 6, 7, 1, 'Бородинський', 25, 5, 125, 'images/borodynskiy.jpg'),
(2, 'images/ok.png', 4, 8, 3, 'Житньо-пшеничний формовий', 24, 10, 240, 'images/zhytnyo_pshenychniy.jpg'),
(5, 'images/no.png', 6, 8, 5, 'Житній пряник', 55, 5, 275, 'images/zhytniy_pryanyk.jpg'),
(6, 'images/ok.png', 4, 8, 4, 'Брауні', 23, 30, 690, 'images/brauni.png'),
(7, 'images/ok.png', 4, 8, 3, 'Житньо-пшеничний формовий', 24, 30, 720, 'images/zhytnyo_pshenychniy.jpg'),
(8, 'images/no.png', 6, 8, 1, 'Бородинський', 25, 15, 375, 'images/borodynskiy.jpg'),
(9, 'images/ok.png', 5, 7, 3, 'Житньо-пшеничний формовий', 24, 25, 600, 'images/zhytnyo_pshenychniy.jpg'),
(10, 'images/ok.png', 5, 7, 5, 'Житній пряник', 55, 10, 550, 'images/zhytniy_pryanyk.jpg'),
(11, 'images/no.png', 6, 7, 4, 'Брауні', 23, 6, 138, 'images/brauni.png');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_amount` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `address` varchar(300) NOT NULL,
  `delivery_date` date NOT NULL,
  `credit_card` varchar(19) DEFAULT NULL,
  `credit_card_date` varchar(5) DEFAULT NULL,
  `credit_card_cvv` int(3) UNSIGNED DEFAULT NULL,
  `cash_payment` varchar(10) DEFAULT NULL,
  `date_payment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `total_amount`, `id_user`, `address`, `delivery_date`, `credit_card`, `credit_card_date`, `credit_card_cvv`, `cash_payment`, `date_payment`) VALUES
(4, 1650, 8, 'address 6', '2022-06-30', '6666 6666 6666 6666', '06/26', 666, 'off', '2022-06-23'),
(5, 1150, 7, 'address 5', '2022-06-25', '5555 5555 5555 5555', '05/25', 555, 'off', '2022-06-23'),
(6, 0, 0, '0', '2022-06-23', '0000 0000 0000 0000', '01/30', 0, '0', '2022-06-23');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `consist` text NOT NULL,
  `weight` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `min_amount` int(11) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `consist`, `weight`, `price`, `min_amount`, `type`, `photo`) VALUES
(1, 'Бородинський', 'борошно житнє обдирне, борошно пшеничне другого ґатунку, вода питна, солод житній, цукор білий кристалічний, дріжджі хлібопекарські, сіль харчова кухонна, патока, кмин.', 400, 25, 5, 'Хліба', 'images/borodynskiy.jpg'),
(2, 'Пшеничний формовий', 'борошно пшеничне вищого ґатунку, вода питна, дріжджі хлібопекарські пресовані, сіль кухонна.', 500, 19, 5, 'Хліба', 'images/pshenychniy.jpg'),
(3, 'Житньо-пшеничний формовий', 'борошно житнє обдирне, борошно пшеничне першого ґатунку, борошно пшеничне другого ґатунку, сіль кухонна харчова, дріжджі хлібопекарські пресовані.', 600, 24, 5, 'Хліба', 'images/zhytnyo_pshenychniy.jpg'),
(4, 'Брауні', 'цукор, борошно пшеничне в/ґ, меланж яєчний, олія соняшникова, какао терте, какао-порошок зі зниженим вмістом жиру, молоко сухе незбиране, крохмаль кукурудзяний, какао-масло, розпушувач, сіль, ароматизатор, глазур шоколадна - 23%.', 100, 23, 6, 'Тістечка', 'images/brauni.png'),
(5, 'Житній пряник', 'борошно пшеничне 1 г, борошно житнє, цукор, патока крохмальна, маргарин, олія соняшникова рафінована дезодорована, розпушувачі — сода харчова, вуглеамонійна сіль, ароматизатор — rарамель, кориця.', 1000, 55, 5, 'Пряники', 'images/zhytniy_pryanyk.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `types_products`
--

CREATE TABLE `types_products` (
  `type_product` varchar(50) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `types_products`
--

INSERT INTO `types_products` (`type_product`, `photo`) VALUES
('Батони', 'images/batony.jpg'),
('Бублики', 'images/bublyky.jpg'),
('Булочки', 'images/bulochky.jpg'),
('Кекси', 'images/keksy.jpg'),
('Печіво', 'images/pechivo.jpg'),
('Пряники', 'images/pryanyky.jpg'),
('Тістечка', 'images/tistechka.jpg'),
('Торти', 'images/torty.jpg'),
('Хліба', 'images/hliba.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `telephone` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `company`, `telephone`, `email`, `pass`) VALUES
(1, 'user u', '', '+38(099)-465-37-53', 'useru@gmail.com', 'useru'),
(4, 'name 2', 'company 2', '+38(066)-434-89-24', 'name2@gmail.com', '1c1d31bacd4ab46bbcd53a32ba221825'),
(5, 'name 3', 'company 3', '+38(957)-655-42-62', 'name3@gmail.com', '482c811da5d5b4bc6d497ffa98491e38'),
(6, 'n4', '', '+38(050)-393-98-04', 'n4@gmail.com', 'd1aac471e4b9fa4e045b070a64e4fa6e'),
(7, 'n5', '', '+38(099)-588-93-57', 'n5@gmail.com', '942463e3e5932e5a6918e3e8f253e4c7'),
(8, 'n6', '', '+38(066)-495-83-97', 'n6@gmail.com', '409e21887e94ba837df4c4cbc161b733'),
(9, 'n7', '', '+38(099)-487-38-74', 'n7@gmail.com', '7a339e54a65581ad9488841d104e825b');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Индексы таблицы `types_products`
--
ALTER TABLE `types_products`
  ADD PRIMARY KEY (`type_product`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id_basket` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `basket_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`type`) REFERENCES `types_products` (`type_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
