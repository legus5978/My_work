-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Лип 03 2023 р., 18:23
-- Версія сервера: 5.7.33
-- Версія PHP: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `register-bd`
--

-- --------------------------------------------------------

--
-- Структура таблиці `statuses`
--

CREATE TABLE `statuses` (
  `id` int(2) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone_number` int(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `regis_date` date DEFAULT NULL,
  `id_status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `password`, `phone_number`, `email`, `birthday`, `regis_date`, `id_status`) VALUES
(1, 'register-bd', 'Гнитка', 'oleg1995', '$2y$10$QaDD1MJnme/NcHosl5K75.z26txDCC6pAvR.TIGGJUHW7WnUOmuQO', 968511669, 'legus5978@gmail.com', '1995-08-29', '2023-06-27', 2),
(6, 'Олег', 'Гнитка', 'oleg29', '$2y$10$7iUBxxyBdWTV0DNd0Ulzsetcs9vjvm7nskj.wFyRpFT2PUuolf4Bq', 968511669, 'legus5978@gmail.com', '1995-08-29', '2023-06-30', 2),
(7, 'Галина', 'Гнитка', 'halyna1997', '$2y$10$TflUv57.I0WO9UVB29d1kevkex5r0RCeTvCySCcgt2uCtj7CWnRd.', 989028217, 'halyna@gmail.com', '1997-06-07', '2023-07-02', 2);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
