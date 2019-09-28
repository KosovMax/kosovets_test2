-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 28 2019 г., 22:05
-- Версия сервера: 10.3.15-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kosovets_test2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `news_id` int(64) DEFAULT -1,
  `name` varchar(1024) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `time_created` timestamp NULL DEFAULT current_timestamp(),
  `time_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `name`, `text`, `time_created`, `time_updated`) VALUES
(18, 1, 'maxim', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore \' + \'et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamc', '2019-09-28 17:38:09', '2019-09-28 17:38:09'),
(22, 1, 'test', 'yhftyhfyhty', '2019-09-28 19:12:46', '2019-09-28 19:12:46'),
(23, 3, 'test', 'Широкая электрификация южных губерний даст мощный толчок подъёму сельского хозяйства', '2019-09-28 19:13:03', '2019-09-28 19:13:03');

-- --------------------------------------------------------

--
-- Структура таблицы `like_comments`
--

CREATE TABLE `like_comments` (
  `id` int(11) NOT NULL,
  `comment_id` int(64) DEFAULT -1,
  `user` varchar(256) NOT NULL,
  `thumb` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `like_comments`
--

INSERT INTO `like_comments` (`id`, `comment_id`, `user`, `thumb`) VALUES
(12, 20, '12345', 1),
(14, 18, '12345', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `like_news`
--

CREATE TABLE `like_news` (
  `id` int(11) NOT NULL,
  `news_id` int(64) DEFAULT -1,
  `user` varchar(256) NOT NULL,
  `thumb` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `like_news`
--

INSERT INTO `like_news` (`id`, `news_id`, `user`, `thumb`) VALUES
(28, 1, '12345', 1),
(29, 3, '44341', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `header` varchar(1024) DEFAULT NULL,
  `short_description` varchar(2048) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `img` varchar(1024) DEFAULT NULL,
  `tags` varchar(1024) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `status` enum('open','closed') DEFAULT 'open',
  `time_created` timestamp NULL DEFAULT current_timestamp(),
  `time_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `header`, `short_description`, `text`, `img`, `tags`, `views`, `status`, `time_created`, `time_updated`) VALUES
(1, 'News #1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore \' +\n            \'et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip\' +\n            \' ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu \' +\n            \'fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt \' +\n            \'mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore \' +\n            \'et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip\' +\n            \' ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu \' +\n            \'fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt \' +\n            \'mollit anim id est laborum.', 'https://images.unsplash.com/photo-1494783367193-149034c05e8f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80', 'кек,чебурек', 143, 'closed', '2018-08-30 13:31:14', '2019-09-28 19:46:01'),
(3, 'Эх, чужд кайф, сплющь', '<p>Широкая электрификация южных губерний даст мощный толчок подъёму сельского хозяйства.<br></p>', '<<<<<<<p>Эй, жлоб! Где туз? Прячь юных <u><b>съёмщиц</b></u> в шкаф. Съешь [же] ещё этих мягких <span style=\"background-color: rgb(255, 255, 0);\">французских</span> булок да выпей чаю. В чащах юга жил бы цитрус? Да, но фальшивый экземпляр! Эх, чужак! Общий съём <a href=\"#\" target=\"_blank\">цен</a> шляп (юфть) — вдрызг!<br></p>', 'https://media.gettyimages.com/photos/skyline-dallas-texas-america-picture-id623559564?s=612x612', NULL, 54, 'open', '2018-10-11 01:33:27', '2019-09-28 20:01:46'),
(4, 'Lorem Ipsum', 'это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.', 'это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.', 'https://ichef.bbci.co.uk/news/976/cpsprodpb/B62B/production/_108553664_knapps.png', NULL, 0, 'open', '2018-10-11 01:33:27', '2018-11-13 01:17:04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `like_comments`
--
ALTER TABLE `like_comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `like_news`
--
ALTER TABLE `like_news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `like_comments`
--
ALTER TABLE `like_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `like_news`
--
ALTER TABLE `like_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
