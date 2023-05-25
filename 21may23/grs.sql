-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 22 2023 г., 11:39
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pet2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `grs`
--

CREATE TABLE `grs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `phote` int(11) NOT NULL,
  `txt` text NOT NULL,
  `usa` int(11) NOT NULL,
  `pep` int(11) NOT NULL,
  `ava` int(11) NOT NULL,
  `svet` int(11) NOT NULL,
  `act` int(11) NOT NULL,
  `pip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `grs`
--

INSERT INTO `grs` (`id`, `nom`, `phote`, `txt`, `usa`, `pep`, `ava`, `svet`, `act`, `pip`) VALUES
(1, 'бык', 1, 'быки', 1, 2, 4, 4, 1, 1),
(2, 'дракон', 2, 'огнедышащее', 2, 4, 1, 1, 1, 3),
(3, 'заяц', 3, 'длинноухое', 2, 5, 9, 4, 2, 4),
(4, 'змея', 4, 'пресмыкающееся', 1, 6, 13, 3, 3, 0),
(5, 'крыса', 5, 'грызун', 2, 7, 15, 5, 3, 1),
(6, 'лошадь', 6, 'парнокопытное', 2, 8, 12, 2, 3, 2),
(7, 'обезьяна', 7, 'примат', 1, 9, 5, 5, 1, 3),
(8, 'овца', 8, 'шестяное', 1, 10, 3, 3, 1, 4),
(9, 'петух', 9, 'кукарекающее', 1, 11, 18, 2, 4, 0),
(10, 'свинья', 10, 'хрюкающее', 3, 12, 14, 4, 3, 1),
(11, 'собака', 11, 'лающее', 1, 13, 10, 5, 2, 2),
(12, 'тигр', 12, 'плотоядное', 2, 14, 20, 2, 1, 3),
(13, 'агути', 13, 'морское', 0, 1, 0, 0, 0, 0),
(14, 'Губка Боб', 14, 'Живет на дне океана.', 1, 3, 19, 0, 3, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `grs`
--
ALTER TABLE `grs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `grs`
--
ALTER TABLE `grs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
