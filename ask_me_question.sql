SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `ask_me_question`
--

-- --------------------------------------------------------

--
-- Структура таблиці `questions`
--

CREATE TABLE `questions` (
  `message` varchar(1000) NOT NULL,
  `is_anonymous` tinyint(1) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `creation_time` int(11) NOT NULL,
  `id` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `questions`
--

INSERT INTO `questions` (`message`, `is_anonymous`, `name`, `mail`, `creation_time`, `id`) VALUES
('                 Тестове\nпитання', 0, 'Володимир Полтавський', 'testmail@gmail.com', 1685647750, '6478f18689748');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `questions`
--
ALTER TABLE `questions`
  ADD UNIQUE KEY `questions_id_uindex` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
