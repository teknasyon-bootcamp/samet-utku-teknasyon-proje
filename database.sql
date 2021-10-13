-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: database:3306
-- Üretim Zamanı: 13 Eki 2021, 20:45:58
-- Sunucu sürümü: 8.0.26
-- PHP Sürümü: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `database`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `newsID` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `comments` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `latest`
--

CREATE TABLE `latest` (
  `id` int NOT NULL,
  `username` int NOT NULL,
  `value` varchar(500) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(250) NOT NULL,
  `imageURL` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `categoryID` int NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `title`, `imageURL`, `description`, `content`, `categoryID`, `update_at`) VALUES
(1, 'Bursa', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Bursa018.jpg/300px-Bursa018.jpg', 'bursa', 'bursa', 1, '2021-10-13 18:43:51'),
(2, 'Bursa 2', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Bursa018.jpg/300px-Bursa018.jpg', 'bursa 2', 'bursa 2', 1, '2021-10-13 18:44:04'),
(3, 'İstanbul', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Bosphorus_Bridge_(235499411).jpeg/1200px-Bosphorus_Bridge_(235499411).jpeg', 'istanbul', 'istanbul ', 2, '2021-10-13 18:44:47'),
(4, 'Bartın', 'https://upload.wikimedia.org/wikipedia/commons/d/d1/Amasra,_Bartın,_Turkey.jpg', 'Bartın haberleri', 'bartın haber içeriği', 3, '2021-10-13 20:38:29'),
(5, 'Tokat', 'https://upload.wikimedia.org/wikipedia/commons/6/6b/Tokat_panorama_2012.JPG', 'tokat haber açıklaması', 'tokat haber içeriği', 4, '2021-10-13 20:39:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int NOT NULL,
  `title` varchar(300) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `news_categories`
--

INSERT INTO `news_categories` (`id`, `title`, `updated_at`) VALUES
(1, 'Bursa', '2021-10-13 18:43:03'),
(2, 'İstanbul', '2021-10-13 18:43:13'),
(3, 'Bartın', '2021-10-13 18:43:23'),
(4, 'Tokat', '2021-10-13 18:43:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `role`
--

INSERT INTO `role` (`id`, `name`, `permissions`) VALUES
(1, 'User', '{\"user\":1}'),
(2, 'Editor', '{\"user\":1,\"editor\":1}'),
(3, 'Moderator', '{\"user\":1,\"editor\":1,\"moderator\":1}'),
(4, 'Admin', '{\"user\":1,\"editor\":1,\"moderator\":1,\"admin\":1}');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mail` varchar(150) NOT NULL,
  `roleID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `mail`, `roleID`) VALUES
(4, 'user', '202cb962ac59075b964b07152d234b70', 'user@gmail.com', 1),
(5, 'editor', '202cb962ac59075b964b07152d234b70', 'editor@gmail.com', 2),
(6, 'moderator', '202cb962ac59075b964b07152d234b70', 'moderator@gmail.com', 3),
(7, 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 4);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `latest`
--
ALTER TABLE `latest`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `latest`
--
ALTER TABLE `latest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
