-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: mysql-db
-- Время создания: Май 19 2024 г., 01:23
-- Версия сервера: 8.0.36
-- Версия PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ale`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories6`
--

CREATE TABLE `categories6` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories6`
--

INSERT INTO `categories6` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Category 0', 'category-0', NULL, NULL),
(2, 'Category 1', 'category-1', NULL, NULL),
(3, 'Category 2', 'category-2', NULL, NULL),
(4, 'Category 3', 'category-3', NULL, NULL),
(5, 'Category 4', 'category-4', NULL, NULL),
(6, 'Category 5', 'category-5', NULL, NULL),
(7, 'Category 6', 'category-6', NULL, NULL),
(8, 'Category 7', 'category-7', NULL, NULL),
(9, 'Category 8', 'category-8', NULL, NULL),
(10, 'Category 9', 'category-9', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int NOT NULL,
  `name` char(35) NOT NULL DEFAULT '',
  `population` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`, `population`) VALUES
(1, 'Kabul', 1780000),
(2, 'Qandahar', 237500),
(3, 'Herat', 186800),
(4, 'Mazar-e-Sharif', 127800),
(5, 'Amsterdam', 731200),
(6, 'Rotterdam', 593321),
(7, 'Haag', 440900),
(8, 'Utrecht', 234323),
(9, 'Eindhoven', 201843),
(10, 'Tilburg', 193238),
(11, 'Groningen', 172701),
(12, 'Breda', 160398),
(13, 'Apeldoorn', 153491),
(14, 'Nijmegen', 152463),
(15, 'Enschede', 149544),
(16, 'Haarlem', 148772),
(17, 'Almere', 142465),
(18, 'Arnhem', 138020),
(19, 'Zaanstad', 135621),
(20, '´s-Hertogenbosch', 129170),
(21, 'Amersfoort', 126270),
(22, 'Maastricht', 122087),
(23, 'Dordrecht', 119811),
(24, 'Leiden', 117196),
(25, 'Haarlemmermeer', 110722),
(26, 'Zoetermeer', 110214),
(27, 'Emmen', 105853),
(28, 'Zwolle', 105819),
(29, 'Ede', 101574),
(30, 'Delft', 95268),
(31, 'Heerlen', 95052),
(32, 'Alkmaar', 92713),
(33, 'Willemstad', 2345),
(34, 'Tirana', 270000),
(35, 'Alger', 2168000),
(36, 'Oran', 609823),
(37, 'Constantine', 443727),
(38, 'Annaba', 222518),
(39, 'Batna', 183377),
(40, 'Sétif', 179055),
(41, 'Sidi Bel Abbès', 153106),
(42, 'Skikda', 128747),
(43, 'Biskra', 128281),
(44, 'Blida (el-Boulaida)', 127284),
(45, 'Béjaïa', 117162),
(46, 'Mostaganem', 115212),
(47, 'Tébessa', 112007),
(48, 'Tlemcen (Tilimsen)', 110242),
(49, 'Béchar', 107311),
(50, 'Tiaret', 100118),
(51, 'Ech-Chleff (el-Asnam)', 96794),
(52, 'Ghardaïa', 89415),
(53, 'Tafuna', 5200),
(54, 'Fagatogo', 2323),
(55, 'Andorra la Vella', 21189),
(56, 'Luanda', 2022000),
(57, 'Huambo', 163100),
(58, 'Lobito', 130000),
(59, 'Benguela', 128300),
(60, 'Namibe', 118200),
(61, 'South Hill', 961),
(62, 'The Valley', 595),
(63, 'Saint John´s', 24000),
(64, 'Dubai', 669181),
(65, 'Abu Dhabi', 398695),
(66, 'Sharja', 320095),
(67, 'al-Ayn', 225970),
(68, 'Ajman', 114395),
(69, 'Buenos Aires', 2982146),
(70, 'La Matanza', 1266461),
(71, 'Córdoba', 1157507),
(72, 'Rosario', 907718),
(73, 'Lomas de Zamora', 622013),
(74, 'Quilmes', 559249),
(75, 'Almirante Brown', 538918),
(76, 'La Plata', 521936),
(77, 'Mar del Plata', 512880),
(78, 'San Miguel de Tucumán', 470809),
(79, 'Lanús', 469735),
(80, 'Merlo', 463846),
(81, 'General San Martín', 422542),
(82, 'Salta', 367550),
(83, 'Moreno', 356993),
(84, 'Santa Fé', 353063),
(85, 'Avellaneda', 353046),
(86, 'Tres de Febrero', 352311),
(87, 'Morón', 349246),
(88, 'Florencio Varela', 315432),
(89, 'San Isidro', 306341),
(90, 'Tigre', 296226),
(91, 'Malvinas Argentinas', 290335),
(92, 'Vicente López', 288341),
(93, 'Berazategui', 276916),
(94, 'Corrientes', 258103),
(95, 'San Miguel', 248700),
(96, 'Bahía Blanca', 239810),
(97, 'Esteban Echeverría', 235760),
(98, 'Resistencia', 229212),
(99, 'José C. Paz', 221754),
(4079, 'Rafah', 92020),
(4081, 'city101', 101),
(4082, 'City102', 102),
(4083, 'aaaa', 11),
(4084, '111', 111),
(4085, '111', 111),
(4086, 'qqq', 111),
(4087, '111', 11),
(4103, 'new5', 5),
(4105, 'd10', 10),
(4106, 'Kabul2', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `dep_inject`
--

CREATE TABLE `dep_inject` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `dep_inject`
--

INSERT INTO `dep_inject` (`id`, `name`, `email`) VALUES
(1, 'John', 'John@example.com'),
(2, 'Jane', 'Jane@example.com');

-- --------------------------------------------------------

--
-- Структура таблицы `dep_posts`
--

CREATE TABLE `dep_posts` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `dep_posts`
--

INSERT INTO `dep_posts` (`id`, `title`) VALUES
(1, 'test first text'),
(2, 'dependency injection check');

-- --------------------------------------------------------

--
-- Структура таблицы `posts1`
--

CREATE TABLE `posts1` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts1`
--

INSERT INTO `posts1` (`id`, `name`, `text`, `created_at`, `updated_at`) VALUES
(1, 'post 1', 'text 1', '2024-05-15 12:12:24', '2024-05-15 14:31:17'),
(2, 'post 21', 'text 21', '2024-05-15 12:56:30', '2024-05-18 22:54:01'),
(3, 'post 3', 'text 3', '2024-05-15 14:29:37', '2024-05-18 22:45:05'),
(4, 'post 4', 'text 4', '2024-05-15 14:30:02', '2024-05-15 14:30:02');

-- --------------------------------------------------------

--
-- Структура таблицы `posts6`
--

CREATE TABLE `posts6` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts6`
--

INSERT INTO `posts6` (`id`, `category_id`, `title`, `description`, `text`, `slug`, `created_at`, `updated_at`) VALUES
(1, 8, 'Post 0', 'Description of post 0', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>0</p>', 'post-0', NULL, NULL),
(2, 4, 'Post 1', 'Description of post 1', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>1</p>', 'post-1', NULL, NULL),
(3, 7, 'Post 2', 'Description of post 2', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>2</p>', 'post-2', NULL, NULL),
(4, 10, 'Post 3', 'Description of post 3', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>3</p>', 'post-3', NULL, NULL),
(5, 10, 'Post 4', 'Description of post 4', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>4</p>', 'post-4', NULL, NULL),
(6, 6, 'Post 5', 'Description of post 5', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>5</p>', 'post-5', NULL, NULL),
(7, 10, 'Post 6', 'Description of post 6', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>6</p>', 'post-6', NULL, NULL),
(8, 6, 'Post 7', 'Description of post 7', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>7</p>', 'post-7', NULL, NULL),
(9, 2, 'Post 8', 'Description of post 8', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>8</p>', 'post-8', NULL, NULL),
(10, 6, 'Post 9', 'Description of post 9', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>9</p>', 'post-9', NULL, NULL),
(11, 4, 'Post 10', 'Description of post 10', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>10</p>', 'post-10', NULL, NULL),
(12, 4, 'Post 11', 'Description of post 11', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>11</p>', 'post-11', NULL, NULL),
(13, 1, 'Post 12', 'Description of post 12', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>12</p>', 'post-12', NULL, NULL),
(14, 8, 'Post 13', 'Description of post 13', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>13</p>', 'post-13', NULL, NULL),
(15, 3, 'Post 14', 'Description of post 14', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>14</p>', 'post-14', NULL, NULL),
(16, 2, 'Post 15', 'Description of post 15', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>15</p>', 'post-15', NULL, NULL),
(17, 5, 'Post 16', 'Description of post 16', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>16</p>', 'post-16', NULL, NULL),
(18, 8, 'Post 17', 'Description of post 17', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>17</p>', 'post-17', NULL, NULL),
(19, 10, 'Post 18', 'Description of post 18', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>18</p>', 'post-18', NULL, NULL),
(20, 10, 'Post 19', 'Description of post 19', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>19</p>', 'post-19', NULL, NULL),
(21, 3, 'Post 20', 'Description of post 20', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>20</p>', 'post-20', NULL, NULL),
(22, 10, 'Post 21', 'Description of post 21', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>21</p>', 'post-21', NULL, NULL),
(23, 1, 'Post 22', 'Description of post 22', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>22</p>', 'post-22', NULL, NULL),
(24, 8, 'Post 23', 'Description of post 23', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>23</p>', 'post-23', NULL, NULL),
(25, 3, 'Post 24', 'Description of post 24', '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>24</p>', 'post-24', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(1, 'Admin', 'admin@test'),
(2, 'Test1', 'test1@gmail.com'),
(3, 'user', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `users_1`
--

CREATE TABLE `users_1` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `flag` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users_1`
--

INSERT INTO `users_1` (`id`, `name`, `email`, `flag`) VALUES
(1, 'new1', 'new1@gmail.com', 0),
(2, 'new2', 'new2@gmail.com', 0),
(3, 'new3', 'new3@gmail.com', 0),
(4, 'test123', 'Test233', 0),
(5, 'test5', 'test5@gmail.com', 0),
(6, 'wewew', 'wewew', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users_3`
--

CREATE TABLE `users_3` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users_3`
--

INSERT INTO `users_3` (`id`, `login`, `pass`, `name`) VALUES
(1, 'admin', '682cc6048a862e18538ae3215c95f3a5', 'admin'),
(2, 'admin1', '825746f799f1b182a12445ec34ec7d61', 'admin1');

-- --------------------------------------------------------

--
-- Структура таблицы `users_5`
--

CREATE TABLE `users_5` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users_5`
--

INSERT INTO `users_5` (`id`, `name`, `email`, `password`) VALUES
(1, '111', 'test1@gmail.com', '$2y$10$bYi6/aHmV/Z7xA6ODuT.XOjPyilgk7upGfMgu/OXxE.wZie8Qqv5e'),
(2, '122', 'test2@gmail.com', '$2y$10$J8gUKs7nPU3ksvjZ9Iv/uelL75L6ffaPb4ooaAAj2cUNLzfQfvNs2'),
(3, '123', 'test3@gmail.com', '$2y$10$T4Ze0NmgoCT6C6CQi1DPDevkGUJu3k6IhviEc2N/RziQlGzDx74Wa'),
(4, '124', 'test4@gmail.com', '$2y$10$vNukQvWust/EjBQFoM/8t.FXg8VxGpIMpLG/scVXaR7JxcxpIOkoa'),
(5, '125', 'test5@gmail.com', '$2y$10$45NLbS5fO8fsvVQAuJDhR.OXGIrraHadG.u6pQ.BjgoygfbrP6wxu'),
(6, 'user1', 'user1@gmail.com', '$2y$10$xHVhnYwFTzk0uymjanlAz.L6sHOKACXS1DzPPdAUFlDaw4SGPibGW'),
(7, 'test1', 'test6@gmail.com', '$2y$10$ZPbwYJJeto.v2.Tp2.JC7.eICYXofxOG76fxuKRq2BSA4Hx66Yx3G'),
(8, 'test7', 'test7@gmail.com', '$2y$10$DuI0wZt05iX/IdY8ZSYxKO.SyuTArDCLuU24g1DhFvZ/0D/w9f41O'),
(9, 'test8', 'test8@gmail.com', '$2y$10$fQtWI7oGY5etigWhwklDV.6V6zCjJkEBrfGg1rPsE5bsrDpwZNkGO'),
(10, 'test9', 'test9@gmail.com', '$2y$10$tAtIUaWLlUpdudFLr2y.oen30R2vA5cvxSRD896lbfeEOckJy8nfS'),
(11, 'test10', 'test10@gmail.com', '$2y$10$fDvwsgj5mRwZ7oV8KbrE.OjfB1HyFiSihsbnB3yXy0PmftEa3pdHG'),
(12, 'test11', 'test11@gmail.com', '$2y$10$XEtVG7EAxDxRiwJq6K44VObx/x0QzFcCBvIyIy395Z0Hm7uxvIbGS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories6`
--
ALTER TABLE `categories6`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `dep_inject`
--
ALTER TABLE `dep_inject`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dep_posts`
--
ALTER TABLE `dep_posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts1`
--
ALTER TABLE `posts1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts6`
--
ALTER TABLE `posts6`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_1`
--
ALTER TABLE `users_1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_3`
--
ALTER TABLE `users_3`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_5`
--
ALTER TABLE `users_5`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories6`
--
ALTER TABLE `categories6`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4107;

--
-- AUTO_INCREMENT для таблицы `dep_inject`
--
ALTER TABLE `dep_inject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `dep_posts`
--
ALTER TABLE `dep_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `posts1`
--
ALTER TABLE `posts1`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `posts6`
--
ALTER TABLE `posts6`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT для таблицы `users_1`
--
ALTER TABLE `users_1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users_3`
--
ALTER TABLE `users_3`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users_5`
--
ALTER TABLE `users_5`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
