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

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dep_inject`
--
ALTER TABLE `dep_inject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dep_inject`
--
ALTER TABLE `dep_inject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

--=======================================
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

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dep_posts`
--
ALTER TABLE `dep_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dep_posts`
--
ALTER TABLE `dep_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

