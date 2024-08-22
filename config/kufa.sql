-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2024 at 11:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kufa`
--

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `facebook` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `instagram` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `twitter` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `pinterest` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `user_id`, `facebook`, `instagram`, `twitter`, `pinterest`) VALUES
(1, '5', 'https://www.facebook.com/p/Fahim-Hossain-Munna-100007336865704/?_rdr', 'https://www.instagram.com/i_d/?hl=en', 'https://x.com/thetrampmusic?mx=2', '');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `subtitle` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `subtitle`, `description`, `image`, `status`) VALUES
(9, 'jawojyc@mailinator.com', 'cazivif@mailinator.com', 'vixecymy@mailinator.com', '10-jawojyc@mailinator.com-22-08-2024.jpg', 'active'),
(10, 'jarudeqeg@mailinator.com', 'civesokobo@mailinator.com', 'lyqavyceh@mailinator.com', '10-jarudeqeg@mailinator.com-22-08-2024.png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon`, `status`) VALUES
(2, 'App Development', 'The Google Play short description is a visible element that can convey an important message to potential users', 'fa fa-tablet', 'deactive'),
(6, 'gadom@mailinator.com', 'zimep@mailinator.com', 'fa fa-address-book-o', 'deactive'),
(7, 'dizoxocob@mailinator.com', 'finut@mailinator.com', 'fa fa-arrow-circle-up', 'deactive'),
(8, 'goroqykehy@mailinator.com', 'sycozyxulo@mailinator.com', 'fa fa-address-card-o', 'deactive'),
(9, 'Amazon', 'zelukatuta@mailinator.com', 'fa fa-amazon', 'deactive'),
(10, 'gekyrilo@mailinator.com', 'sadegykil@mailinator.com', 'fa fa-comment', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.jpg',
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`) VALUES
(1, 'Cedric Brock', 'nenehelowy@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(2, 'Ella Weber', 'xaxuvaj@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(3, 'Evangeline Palmer', 'qybezoro@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(5, 'Yo Mama', 'higyte@mailinator.com', '5-Yo Mama-15-08-2024.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(6, 'Kibo Acosta', 'dapazyg@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(7, 'Nolan Stone', 'vufizakozy@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(8, 'Mechelle Stephenson', 'wurus@mailinator.com', '8-Mechelle Stephenson-15-08-2024.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(9, 'Doyal Baba', 'qojoq@mailinator.com', '9-Doyal Baba-17-08-2024.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(10, 'Noah Miller', 'titid@mailinator.com', 'default.jpg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
