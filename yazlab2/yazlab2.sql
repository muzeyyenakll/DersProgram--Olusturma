-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Oca 2024, 15:01:39
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yazlab2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hoca`
--

CREATE TABLE `hoca` (
  `hoca_id` int(11) NOT NULL,
  `hoca_adi` varchar(255) NOT NULL,
  `ders_adi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hoca`
--

INSERT INTO `hoca` (`hoca_id`, `hoca_adi`, `ders_adi`) VALUES
(1, 'müzeyyen', 'fizik'),
(3, 'Süleyman Eken', 'Nesne Y');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `hoca_id` int(11) NOT NULL,
  `sinif_id` int(11) NOT NULL,
  `gun` varchar(10) NOT NULL,
  `saat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `program`
--

INSERT INTO `program` (`program_id`, `hoca_id`, `sinif_id`, `gun`, `saat`) VALUES
(7, 1, 5, 'Pazartesi', '9.00'),
(8, 3, 7, 'Salı', '15.00'),
(9, 3, 5, 'Pazartesi', '16.00'),
(11, 3, 5, 'Pazartesi', '15.00'),
(12, 1, 5, 'Salı', '9.00'),
(13, 3, 5, 'Perşembe', '15.00'),
(14, 1, 5, 'Çarşamba', '15.00'),
(15, 1, 5, 'Cuma', '16.00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinif`
--

CREATE TABLE `sinif` (
  `sinif_id` int(11) NOT NULL,
  `sinif_adi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sinif`
--

INSERT INTO `sinif` (`sinif_id`, `sinif_adi`) VALUES
(5, '1036'),
(7, '1044'),
(8, '1040'),
(9, '1041');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `hoca`
--
ALTER TABLE `hoca`
  ADD PRIMARY KEY (`hoca_id`);

--
-- Tablo için indeksler `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `hoca_id` (`hoca_id`),
  ADD KEY `program_ibfk_2` (`sinif_id`);

--
-- Tablo için indeksler `sinif`
--
ALTER TABLE `sinif`
  ADD PRIMARY KEY (`sinif_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `hoca`
--
ALTER TABLE `hoca`
  MODIFY `hoca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `sinif`
--
ALTER TABLE `sinif`
  MODIFY `sinif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`hoca_id`) REFERENCES `hoca` (`hoca_id`),
  ADD CONSTRAINT `program_ibfk_2` FOREIGN KEY (`sinif_id`) REFERENCES `sinif` (`sinif_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
