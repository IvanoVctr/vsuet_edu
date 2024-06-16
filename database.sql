-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 16 2024 г., 21:20
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(5, 'admin', '$2y$10$x7Ofc6CIicBzLKytKf3flumUer0kor7IrngtLlrVNwrSnxwCwR23.', 'admin@gmail.com', '2024-06-14 06:59:03', '2024-06-14 06:59:03'),
(6, 'Kirill', '$2y$10$lGKf7.vgozEvKF7/6gdfzuMpb45gQjNDsfzz3rut3YBWcnHd5IlNW', 'kirill@kirill.com', '2024-06-16 15:01:15', '2024-06-16 15:01:15'),
(7, 'qweqwee', '$2y$10$fp8zGUohT7uJYN3XaAW/xeTHD9Uul14ElQGQin.VIpiUkP6.DI5km', 'qweqwee@gmail.com', '2024-06-16 15:29:09', '2024-06-16 15:29:09'),
(8, 'qweqwee', '$2y$10$txJ0kqHKuj8vrjgLKCTKFOeckd2jFXYgK.FmKE/DDL1L/IB3xPpaK', 'qweqwee@gmail.com', '2024-06-16 15:30:19', '2024-06-16 15:30:19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_username` (`username`),
  ADD KEY `idx_email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
