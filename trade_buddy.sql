-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2026 at 12:04 AM
-- Server version: 10.6.24-MariaDB-cll-lve
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trade_buddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `board games`
--

CREATE TABLE `board games` (
  `id` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board games`
--

INSERT INTO `board games` (`id`, `name`, `description`, `price`) VALUES
('2', 'Codenames', 'A word-based game where tems guess secret words based on single-word clues.', '30'),
('4', 'Jenga', 'A block-stacking game of physical and mental skill where players try to avoid toppling the tower.', '70'),
('5', 'Cluedo', 'A mystery-solving game where players deduce the who, what, and where of a crime.', '65'),
('6', 'Scrabble', 'A classic word game where players form words on a board using lettered tiles to score points.', '30'),
('1', 'Chess', 'Chess is a strategic two-player board game where opponents aim to checkmate the other\'s king using a variety of pieces, each with distinct movements, on a 64-square board.', '70'),
('3', 'Monopoly Classic', 'A property trading game where players buy, sell, and build to dominate the market.', '50'),
('2', 'Codenames', 'A word-based game where tems guess secret words based on single-word clues.', '30'),
('4', 'Jenga', 'A block-stacking game of physical and mental skill where players try to avoid toppling the tower.', '70'),
('5', 'Cluedo', 'A mystery-solving game where players deduce the who, what, and where of a crime.', '65'),
('6', 'Scrabble', 'A classic word game where players form words on a board using lettered tiles to score points.', '30'),
('1', 'Chess', 'Chess is a strategic two-player board game where opponents aim to checkmate the other\'s king using a variety of pieces, each with distinct movements, on a 64-square board.', '70'),
('3', 'Monopoly Classic', 'A property trading game where players buy, sell, and build to dominate the market.', '50');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `description`, `price`) VALUES
(1, 'Harry Potter', 'Seven-book box set. The hourney of a young wizrd, Harry Potter, and his friends at Hogwarts School of Witchcraft and Wizardry.', 300),
(2, 'Percy Jackson & the Olympians', 'Five-book box set. This serioes follows Percy Jackson, a demigod son of Poseidon, on his adventures among Greek gods and monsters.', 150),
(3, 'Kane Chronicles', 'Trilogy box set. Siblings Carter and Sadie Kane discover their connection to ancient Egyptian gods and embark on perilous quests. ', 120),
(4, 'Magnus Chase and the Gods of Asgard', 'Trilogy box set. Follows Magnus CHase, a teenager who discovers he\'s the son of a Norse god, as he navigates the Nine Worlds.', 130),
(5, 'The Heroes of Olympus', 'Five-book box set. A sequel to the Percy Jackson series, blending Greek and Roman myhtology as new demigods embark on epic quests.', 200),
(6, 'The Trials of Apollo', 'Five-book box set. Follows the Greek god Apollo, cast down to Earth as a mortal teenager, navigating quests to regain his immortality.', 250),
(1, 'Harry Potter', 'Seven-book box set. The hourney of a young wizrd, Harry Potter, and his friends at Hogwarts School of Witchcraft and Wizardry.', 300),
(2, 'Percy Jackson & the Olympians', 'Five-book box set. This serioes follows Percy Jackson, a demigod son of Poseidon, on his adventures among Greek gods and monsters.', 150),
(3, 'Kane Chronicles', 'Trilogy box set. Siblings Carter and Sadie Kane discover their connection to ancient Egyptian gods and embark on perilous quests. ', 120),
(4, 'Magnus Chase and the Gods of Asgard', 'Trilogy box set. Follows Magnus CHase, a teenager who discovers he\'s the son of a Norse god, as he navigates the Nine Worlds.', 130),
(5, 'The Heroes of Olympus', 'Five-book box set. A sequel to the Percy Jackson series, blending Greek and Roman myhtology as new demigods embark on epic quests.', 200),
(6, 'The Trials of Apollo', 'Five-book box set. Follows the Greek god Apollo, cast down to Earth as a mortal teenager, navigating quests to regain his immortality.', 250);

-- --------------------------------------------------------

--
-- Table structure for table `clothing and accessories`
--

CREATE TABLE `clothing and accessories` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothing and accessories`
--

INSERT INTO `clothing and accessories` (`id`, `name`, `description`, `price`) VALUES
(1, 'T-shirt', 'A T-shirt is a lightweight, short-sleeved top made of soft fabric, designed for casual wear and available in various styles and colors.', 55),
(2, 'Hoodie', 'A hoodie is a warm, long-sleeved sweatshirt with a hood, often featuring a front pocket, designed for casual and comfortable wear.', 55),
(3, 'Polo shirt', 'A polo shirt is a short-sleeved, collared shirt with a buttoned placket, blending casual and formal styles, often made of breathable fabric.', 69),
(4, 'Baseball cap', 'A baseball cap is a soft, round-brimmed hat with a curved visor and an adjustable strap, designed for casual wear and sun protection.', 72),
(5, 'Sunhat', 'A sunhat is a wide-brimmed hat designed to provide shade and protect the face and neck from the sun, often used for outdoor activities.', 90),
(6, 'Jeans', 'Jeans are durable, casual trousers made from denim, featuring a timeless style with riveted pockets, suitable for everyday wear.', 99),
(1, 'T-shirt', 'A T-shirt is a lightweight, short-sleeved top made of soft fabric, designed for casual wear and available in various styles and colors.', 55),
(2, 'Hoodie', 'A hoodie is a warm, long-sleeved sweatshirt with a hood, often featuring a front pocket, designed for casual and comfortable wear.', 55),
(3, 'Polo shirt', 'A polo shirt is a short-sleeved, collared shirt with a buttoned placket, blending casual and formal styles, often made of breathable fabric.', 69),
(4, 'Baseball cap', 'A baseball cap is a soft, round-brimmed hat with a curved visor and an adjustable strap, designed for casual wear and sun protection.', 72),
(5, 'Sunhat', 'A sunhat is a wide-brimmed hat designed to provide shade and protect the face and neck from the sun, often used for outdoor activities.', 90),
(6, 'Jeans', 'Jeans are durable, casual trousers made from denim, featuring a timeless style with riveted pockets, suitable for everyday wear.', 99);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `child_year_grade` varchar(50) DEFAULT NULL,
  `terms_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `parent_name`, `email`, `password`, `child_year_grade`, `terms_accepted`, `created_at`) VALUES
(1, 'a', 'a@gmail.com', '1', NULL, 0, '2025-11-17 13:30:22'),
(2, 'wadud', 'wadud@gmail.com', 'wadud', NULL, 0, '2025-11-17 13:30:22'),
(3, 'wadud', 'wadud@gmail.com', '456', NULL, 0, '2025-11-17 13:30:22'),
(4, 'w', 'w@gmail.com', '1', NULL, 0, '2025-11-17 13:30:22'),
(5, 'Maloy Burman', 'maloy.burman@premiergenie.com', '123456', NULL, 0, '2025-11-17 13:30:22'),
(6, 'skwadudali', 'skwadudali48@gmail.com', '12345', NULL, 0, '2025-11-17 13:30:22'),
(7, 'w', 'w@gmail.com', '1', NULL, 0, '2025-11-17 13:30:22'),
(8, 'wadud', 'ww@gmail.com', 'ww', NULL, 0, '2025-11-17 13:30:22'),
(9, 'wadudali', 'wadud@gmail.com', 'wadudali', NULL, 0, '2025-11-17 13:30:22'),
(10, 'skwadudali123', 'skwadudali48@gmail.com', '1234', NULL, 0, '2025-11-17 13:30:22'),
(11, 'wadud', '123@gmail.com', '123', NULL, 0, '2025-11-17 13:30:22'),
(12, '1', '1@gmail.com', '1', NULL, 0, '2025-11-17 13:30:22'),
(13, 'suman', 'suman@gmail.com', 'suman', '11', 0, '2025-11-17 13:30:22'),
(14, 'wadud ali', 'aliwadud@gmail.com', 'aliwadud', '12', 1, '2025-11-17 13:47:33'),
(15, 'new', 'new@gmail.com', 'new', '11', 1, '2025-11-24 14:27:52'),
(16, 'new3', 'new3@gmail.com', 'new3', '11', 1, '2025-12-07 09:22:05'),
(17, 'Arhan Harchandani', 'arhan.harchandani@gmail.com', 'Radha7232!', '', 1, '2025-12-08 11:21:19'),
(18, 'Jasmine', 'jasmineharchandani@gmail.com', 'Radha7232', '12', 1, '2025-12-11 09:12:52'),
(19, 'Sara', 'shradha.sahu@addededucation.com', 'ss12345', '', 1, '2025-12-17 18:44:44'),
(20, 'Dhiren', 'sdffdsdfsdsdfhui@gmail.com', '67676767667', '12', 1, '2026-01-06 08:09:22'),
(21, 'Dhiren', 'eudwjioadjisdfij@gmail.com', 'poo', '134', 1, '2026-01-06 08:09:50'),
(22, 'nikhita samnani', 'nikhitasamnani@gmail.com', 'ShlSuv@99', '', 1, '2026-01-12 15:28:01'),
(23, '\' OR \'1\'=\'1', 'chopped@chopped.chopped', '\' OR \'1\'=\'1', '\' OR \'1\'=\'1', 1, '2026-01-13 07:06:24'),
(24, 'fdsfds', 'fsfsdfsd@gmail.com', 'Hello123*', '', 1, '2026-01-13 07:07:14'),
(25, 'dfjsdklfjds', 'surabhi@gmail.com', 'Hello123*', '4', 1, '2026-01-13 07:07:35'),
(26, '* * * $3,222 credit available! Confirm your transfer here: https://schilderemaille.de/?j8by0j * * * hs=de74a8e3e81c0e212ec143d32473abb2* Ñ…Ñ…Ñ…*', 'ydx~nwa9pwyxz@mailbox.in.ua', 'vV{KJR_l(mht', 'xstp0r', 1, '2026-01-13 19:58:38'),
(27, 'arhan', 'Arhan9499@dubaicollege.org', 'Arhan67', '7', 1, '2026-01-14 08:08:50'),
(28, 'Wadud1', 'wadud1@gmail.com', 'wadud11', '1', 1, '2026-01-14 11:00:53'),
(29, 'Sid', 'sid@gmail.com', 'sid123', 'Sid123', 1, '2026-01-14 13:17:10'),
(30, 'PHHiWFiDSbJWQEHqikuiQqk', 'ipo.w.eh.i.f.uqo.34@gmail.com', '1fbQXWWGElP5jAa1!', 'lINgCKZpcVSURMYUPhj', 1, '2026-01-15 04:15:57'),
(31, 'unNHBXdToHgWawvIf', 'j.o.powudu.w.an.9.1@gmail.com', 'KUFIq4aw6xMXCAa1!', 'eAiygmpwIXlQFmGZXF', 1, '2026-01-19 13:13:30'),
(32, 'ðŸ˜© Adult Dating. Add âž¸ yandex.com/poll/43o224okZdReGRb1Q8PXXJ?hs=7a528e2836b1b46073ee200f5d4f07f3& Incident # GSTX2614376 ðŸ˜©', 'deanmoon@tmxttvmail.com', 'BRHoZtRo8N4F', 'ke1jl9', 1, '2026-01-19 21:50:03'),
(33, 'â›“ï¸ Adult Dating. Proceed ðŸ’¥â–¶ yandex.com/poll/43o224okZdReGRb1Q8PXXJ?hs=7a528e2836b1b46073ee200f5d4f07f3& Issue # LKTR0431765 â›“ï¸', 'roofa2000@automisly.org', 'NP5I66FTukAw', 'et4ze5', 1, '2026-01-26 04:45:33'),
(34, 'fVsQCIwrorQzlSgv', 'idibu.q.u.f.i.yi.27.2@gmail.com', 'rRQZs6dGwfwFSAa1!', 'gxOikGZeNXpBOaNBfYdpFnUN', 1, '2026-02-04 09:17:08'),
(35, 'ðŸ¶ Dating for sex. Complete â‡¢ yandex.com/poll/43o224okZdReGRb1Q8PXXJ?hs=7a528e2836b1b46073ee200f5d4f07f3& Direct Message # FEVB8186713 ðŸ¶', 'charvard1@shopcobe.com', '0CWt8PwgVJvB', 'c6c82g', 1, '2026-02-05 11:21:02'),
(36, 'QjCNxTyxzszqwWpCtsGwuUCh', 'w.a.so.z.i.nu.p.1.69@gmail.com', 'efQAnd8q0L0fLAa1!', 'aeqHIGcYgOfBinzFuEMz', 1, '2026-02-13 19:55:34'),
(37, 'gvmuepxwyf', 'letpnxjv@checkyourform.xyz', 'mgndjnwfohog', 'piuofrtqdh', 1, '2026-02-14 09:46:53'),
(38, 'ztxkrhinyq', 'izdqnukm@checkyourform.xyz', 'vmpijqptfshf', 'iynotolkeo', 1, '2026-02-14 09:47:06'),
(39, 'Ahmed', 'ibtesaamxhmed007@gmail.com', 'Test@1234', '2002', 1, '2026-02-18 13:41:34'),
(40, 'ðŸ˜ Money transfer to your account. Get ðŸ‘‰ðŸ¿ yandex.com/poll/CzcnvHQfzj9AHyPPgwtJKk?hs=7a528e2836b1b46073ee200f5d4f07f3&  ðŸ˜', 'termn8er@ship79.com', 'DZvsAGOKWtz8', 'j1980a', 1, '2026-02-19 06:07:58'),
(41, 'ðŸŒ¶ï¸ Balance 1.824730 BTC. Get > yandex.com/poll/PdZ7vgekGrNakuXZcpiB6b?hs=7a528e2836b1b46073ee200f5d4f07f3& ðŸŒ¶ï¸', 'xatunahome@warunkpedia.com', 'kXShaHDNeqJT', 'mk6j28', 1, '2026-02-20 04:49:27'),
(42, 'ktmuluystZPKTufYlHCE', 'yoj.af.umeco.6.2@gmail.com', 'SVs4XNm0ohrHmAa1!', 'cgNJydKDKVULFJLEK', 1, '2026-02-24 23:31:55'),
(43, 'Julio Pineda', 'julioangel.pineda@gmail.com', 'mzBachicuy1001*', '', 1, '2026-03-03 16:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `item_condition` varchar(100) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `availability_date` date NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE `electronics` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electronics`
--

INSERT INTO `electronics` (`id`, `name`, `description`, `price`) VALUES
(1, 'Smartphone', 'A smartphone is a portable device that combines a mobile phone with advanced computing capabilites, enabling internet access, apps, messaging, and multimedia functions.', 3500),
(2, 'Laptop', 'A laptop is a portable computer with a built-in screen, keyboard, and battery, designed for on-the-go productivity, internet access, and multimedia use.', 5000),
(3, 'TV', 'A TV is an electronic device with a screen that displays audiovisual content for entertainment, news, and information, often supporting streaming and smart features.', 3500),
(4, 'Tablet', 'A tablet is a portable touchscreen device that combines features of a smartphone and laptop, ideal for browsing, media consumption, and light productivity.', 2000),
(5, 'Smartwatch', 'A smartwatch is a wearabe device that combines timekeeping with smart features like fitness tracking, notifications, and app access, often syncing with smartphones.', 1000),
(6, 'Game console', 'A smartwatch is a wearable device that combines timekeeping with smart features like fitness tracking, notifications, and app access, often syncing with smartphones.', 2000),
(1, 'Smartphone', 'A smartphone is a portable device that combines a mobile phone with advanced computing capabilites, enabling internet access, apps, messaging, and multimedia functions.', 3500),
(2, 'Laptop', 'A laptop is a portable computer with a built-in screen, keyboard, and battery, designed for on-the-go productivity, internet access, and multimedia use.', 5000),
(3, 'TV', 'A TV is an electronic device with a screen that displays audiovisual content for entertainment, news, and information, often supporting streaming and smart features.', 3500),
(4, 'Tablet', 'A tablet is a portable touchscreen device that combines features of a smartphone and laptop, ideal for browsing, media consumption, and light productivity.', 2000),
(5, 'Smartwatch', 'A smartwatch is a wearabe device that combines timekeeping with smart features like fitness tracking, notifications, and app access, often syncing with smartphones.', 1000),
(6, 'Game console', 'A smartwatch is a wearable device that combines timekeeping with smart features like fitness tracking, notifications, and app access, often syncing with smartphones.', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`id`, `name`, `description`, `price`) VALUES
(1, 'Couch', 'A couch is comfortable, upholstered piece of furniture designed for seating multiple people, commonly used in living rooms for relaxation and socialising.', 1430),
(2, 'Cabinet', 'A cabinet is a storage unit with shelves, drawers, or doors, deisnged to organise and sotre items in homes, offices, or kitchens.', 425),
(3, 'Cupboard', 'A cupboard is a storage cabinet with shelves and doors, used for organising and storing items like dishes, clothes or household essentials.', 275),
(4, 'Ottoman', 'An ottoman is a low, upholstered piece of furniture often used as a footrest, extra seating, or storage, adding functionality and style to a room.', 499),
(5, 'Desk', 'A desk is a sturdy piece of furniture with a flat surface, designed for working, studying, or organizing, often featuring drawers or compartments for storage', 345),
(6, 'Bedside table', 'A bedside table is a small table or cabinet placed next to a bed, designed for holding essentials like a lamp, alarm clock, or personal items.', 320),
(1, 'Couch', 'A couch is comfortable, upholstered piece of furniture designed for seating multiple people, commonly used in living rooms for relaxation and socialising.', 1430),
(2, 'Cabinet', 'A cabinet is a storage unit with shelves, drawers, or doors, deisnged to organise and sotre items in homes, offices, or kitchens.', 425),
(3, 'Cupboard', 'A cupboard is a storage cabinet with shelves and doors, used for organising and storing items like dishes, clothes or household essentials.', 275),
(4, 'Ottoman', 'An ottoman is a low, upholstered piece of furniture often used as a footrest, extra seating, or storage, adding functionality and style to a room.', 499),
(5, 'Desk', 'A desk is a sturdy piece of furniture with a flat surface, designed for working, studying, or organizing, often featuring drawers or compartments for storage', 345),
(6, 'Bedside table', 'A bedside table is a small table or cabinet placed next to a bed, designed for holding essentials like a lamp, alarm clock, or personal items.', 320);

-- --------------------------------------------------------

--
-- Table structure for table `household items`
--

CREATE TABLE `household items` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `household items`
--

INSERT INTO `household items` (`id`, `name`, `description`, `price`) VALUES
(1, 'Washing Machine', 'A washing machine is an appliance designed to automate the cleaning of clothes and textiles, using water, detergent, and various wash cycles.', 2500),
(2, 'Sofa', 'A sofa is a comfortable, upholstered piece of furniture designed for seating multiple people, commonly used in living rooms for relaxation and socializing.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 4000),
(3, 'Dining Table', 'A dining table is a sturdy table designed for meals, typically placed in a dining area, providing space for people to gather and eat together.', 2500),
(4, 'Bed', 'A bed is a piece of furniture with a frame and mattress, designed for sleeping and relaxation, often featuring headboards and optional storage.', 3000),
(6, 'Bookshelf', 'A bookshelf is a piece of furniture with multiple shelves, designed to store and display books, decorative items, and other essentials.', 800),
(5, 'Wardrobe', 'A wardobe is a large, often freestanding storage unit with doors, shelves, and hanging space, designed for organising and storing clothes and accessories.', 2000),
(1, 'Washing Machine', 'A washing machine is an appliance designed to automate the cleaning of clothes and textiles, using water, detergent, and various wash cycles.', 2500),
(2, 'Sofa', 'A sofa is a comfortable, upholstered piece of furniture designed for seating multiple people, commonly used in living rooms for relaxation and socializing.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 4000),
(3, 'Dining Table', 'A dining table is a sturdy table designed for meals, typically placed in a dining area, providing space for people to gather and eat together.', 2500),
(4, 'Bed', 'A bed is a piece of furniture with a frame and mattress, designed for sleeping and relaxation, often featuring headboards and optional storage.', 3000),
(6, 'Bookshelf', 'A bookshelf is a piece of furniture with multiple shelves, designed to store and display books, decorative items, and other essentials.', 800),
(5, 'Wardrobe', 'A wardobe is a large, often freestanding storage unit with doors, shelves, and hanging space, designed for organising and storing clothes and accessories.', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jewelry and watches`
--

CREATE TABLE `jewelry and watches` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jewelry and watches`
--

INSERT INTO `jewelry and watches` (`id`, `name`, `description`, `price`) VALUES
(1, 'Gold ring with round-cut diamond', 'A gold ring with a round-cut diamond is a timeless piece of jewelry, featuring a circular, brilliantly faceted diamond set in a gold band, symbolizing elegance and sophistication.', 16000),
(2, 'Luxury watch', 'A luxury watch is a high-end timepiece crafted with precision and premium materials, often featuring intricate designs, advanced functions, and renowned brand craftsmanship.', 75000),
(3, 'Diamond stud earrings', 'Diamond stud earrings are elegant jewelry pieces featuring single, sparkling diamonds set in minimalistic settings, designed to add timeless sophistication to any outfit.', 4430),
(4, 'Minimalist gold bracelet with diamond accent', 'A minimalist gold bracelet with a diamond accent is a sleek and understated jewelry piece, featuring a delicate gold band adorned with a single sparkling diamond for a touch of elegance.', 1500),
(5, 'Diamond pendant necklace', 'A diamond pendant necklace is a timeless jewelry piece featuring a single diamond or diamond cluster as the centerpiece, elegantly suspended from a chain to add sophistication and sparkle.', 3230),
(6, 'Minimalist watch', 'A minimalist watch is a sleek and understated timepiece with a simple design, clean lines, and a focus on functionality, often featuring a plain dial and minimal embellishments.', 495),
(1, 'Gold ring with round-cut diamond', 'A gold ring with a round-cut diamond is a timeless piece of jewelry, featuring a circular, brilliantly faceted diamond set in a gold band, symbolizing elegance and sophistication.', 16000),
(2, 'Luxury watch', 'A luxury watch is a high-end timepiece crafted with precision and premium materials, often featuring intricate designs, advanced functions, and renowned brand craftsmanship.', 75000),
(3, 'Diamond stud earrings', 'Diamond stud earrings are elegant jewelry pieces featuring single, sparkling diamonds set in minimalistic settings, designed to add timeless sophistication to any outfit.', 4430),
(4, 'Minimalist gold bracelet with diamond accent', 'A minimalist gold bracelet with a diamond accent is a sleek and understated jewelry piece, featuring a delicate gold band adorned with a single sparkling diamond for a touch of elegance.', 1500),
(5, 'Diamond pendant necklace', 'A diamond pendant necklace is a timeless jewelry piece featuring a single diamond or diamond cluster as the centerpiece, elegantly suspended from a chain to add sophistication and sparkle.', 3230),
(6, 'Minimalist watch', 'A minimalist watch is a sleek and understated timepiece with a simple design, clean lines, and a focus on functionality, often featuring a plain dial and minimal embellishments.', 495);

-- --------------------------------------------------------

--
-- Table structure for table `kitchen items`
--

CREATE TABLE `kitchen items` (
  `kitchen items` int(30) NOT NULL,
  `furniture` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kitchen items`
--

INSERT INTO `kitchen items` (`kitchen items`, `furniture`, `description`, `price`) VALUES
(1, 'Cutting Board', 'A cutting board is a flat, durable surface used for chopping, slicing, and preparing food, protecting countertops and maintaining knife sharpness.', 185),
(2, 'Peeler', 'A peeler is a handheld kitchen tool with a sharp blade designed to remove the outer skin or peel from fruits and vegetables efficiently.', 37),
(3, 'Saucepan', 'A saucepan is a deep, round cooking pot with a long handle, designed for simmering, boiling, and preparing sauces or other liquid-based dishes.', 367),
(4, 'Kitchen Knives', 'Kitchen knives are essential culinary tools with sharp blades, designed for slicing, chopping, and dicing ingredients, available in various types for specific tasks.', 920),
(5, 'Measuring Spoons', 'Measuring spoons are small, precise tools used to measure and portion out ingredients in specific quantities, essential for accurate cooking and baking.', 55),
(6, 'Grater', 'A grater is a kitchen tool with a surface of sharp-edged holes or slots, designed to shred, slice, or zest foods like cheese, vegetables, and citrus.', 35),
(1, 'Cutting Board', 'A cutting board is a flat, durable surface used for chopping, slicing, and preparing food, protecting countertops and maintaining knife sharpness.', 185),
(2, 'Peeler', 'A peeler is a handheld kitchen tool with a sharp blade designed to remove the outer skin or peel from fruits and vegetables efficiently.', 37),
(3, 'Saucepan', 'A saucepan is a deep, round cooking pot with a long handle, designed for simmering, boiling, and preparing sauces or other liquid-based dishes.', 367),
(4, 'Kitchen Knives', 'Kitchen knives are essential culinary tools with sharp blades, designed for slicing, chopping, and dicing ingredients, available in various types for specific tasks.', 920),
(5, 'Measuring Spoons', 'Measuring spoons are small, precise tools used to measure and portion out ingredients in specific quantities, essential for accurate cooking and baking.', 55),
(6, 'Grater', 'A grater is a kitchen tool with a surface of sharp-edged holes or slots, designed to shred, slice, or zest foods like cheese, vegetables, and citrus.', 35);

-- --------------------------------------------------------

--
-- Table structure for table `lost_found_items`
--

CREATE TABLE `lost_found_items` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_type` enum('Lost','Found') NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_reported` date NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lost_found_items`
--

INSERT INTO `lost_found_items` (`id`, `customer_id`, `item_type`, `item_name`, `category`, `location`, `date_reported`, `contact_info`, `description`, `image`, `created_at`) VALUES
(1, 16, 'Found', 'waterbottle', 'Other', 'school', '2025-12-25', 'arhan@gmail.com', 'new product', '1766922100_schoolUniform.jfif', '2025-12-28 04:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `product_id`, `message`, `is_read`, `created_at`) VALUES
(1, 8, 8, NULL, 'hi', 1, '2025-04-03 09:06:59'),
(2, 8, 8, NULL, 'hello seller', 1, '2025-04-03 09:14:42'),
(3, 2, 8, NULL, 'hi seller', 1, '2025-04-03 09:18:15'),
(4, 8, 8, NULL, 'hwl', 1, '2025-04-06 08:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `pokemon cards`
--

CREATE TABLE `pokemon cards` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'Uncategorized',
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `customer_id`, `product_name`, `product_description`, `price`, `image`, `category`, `is_active`) VALUES
(17, 17, 'Sixth form uniform', 'Size: large', 40.00, 'D6698042-6BEA-4B08-9439-0FB5C92D672F.png', 'School Uniform', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sports equipment`
--

CREATE TABLE `sports equipment` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports equipment`
--

INSERT INTO `sports equipment` (`id`, `name`, `description`, `price`) VALUES
(1, 'Basketball', 'A basketball is a spherical, inflated ball designed for the sport of basketball, typically made of leather, rubber, or synthetic materials, and used for dribbling, passing, and shooting into a hoop.', 150),
(2, 'Football', 'A football is an inflated, spherical ball used in the sport of soccer, typically made of leather or synthetic materials, designed for kicking, passing, and scoring goals.', 139),
(3, 'Tennis racket and balls', 'A tennis racket is a lightweight frame strung with taut cords, designed for striking tennis balls, which are small, hollow, and covered with felt, used in the sport of tennis.', 320),
(4, 'Cricket bat', 'A cricket bat is a flat, elongated piece of equipment made of wood, designed for striking the cricket ball, with a handle for grip and a broad blade for hitting.', 400),
(5, 'Badminton racket and shuttlecock', 'A badminton racket is a lightweight, oval-shaped frame with strings, designed for striking a shuttlecock, which is a feathered or synthetic projectile used in the sport of badminton.', 150),
(6, 'Boxing gloves', 'Boxing gloves are padded hand coverings designed to protect the hands and reduce impact during training or competitive boxing matches.', 350),
(1, 'Basketball', 'A basketball is a spherical, inflated ball designed for the sport of basketball, typically made of leather, rubber, or synthetic materials, and used for dribbling, passing, and shooting into a hoop.', 150),
(2, 'Football', 'A football is an inflated, spherical ball used in the sport of soccer, typically made of leather or synthetic materials, designed for kicking, passing, and scoring goals.', 139),
(3, 'Tennis racket and balls', 'A tennis racket is a lightweight frame strung with taut cords, designed for striking tennis balls, which are small, hollow, and covered with felt, used in the sport of tennis.', 320),
(4, 'Cricket bat', 'A cricket bat is a flat, elongated piece of equipment made of wood, designed for striking the cricket ball, with a handle for grip and a broad blade for hitting.', 400),
(5, 'Badminton racket and shuttlecock', 'A badminton racket is a lightweight, oval-shaped frame with strings, designed for striking a shuttlecock, which is a feathered or synthetic projectile used in the sport of badminton.', 150),
(6, 'Boxing gloves', 'Boxing gloves are padded hand coverings designed to protect the hands and reduce impact during training or competitive boxing matches.', 350);

-- --------------------------------------------------------

--
-- Table structure for table `toys`
--

CREATE TABLE `toys` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`id`, `name`, `description`, `price`) VALUES
(1, 'LEGO Classic Creative Build Box', 'A versatile building set that encourages creativity with various LEGO bricks in different colors and shapes. ', 150),
(2, 'Barbie Dreamhouse Playset', 'A three-story dollhouse with interactive features and accessories for imaginative play.', 1200),
(3, 'Hot Wheels Ultimate Garage', 'A multi-level garage playset with parking spacse, a racing track, and a shark obstacle.', 500),
(4, 'Nerf N-Strike Elite Disruptor Blaster', 'A quick-draw blaster with a rotating drum holding six foam darts for active play.', 85),
(5, 'Play-Doh Modeling Compound 10-Pack', 'A set of colorful modeling clay encouraging creativity and hands-on play.', 36),
(6, 'Fisher-Price Laugh & Learn Smart Stages Chair', 'An interactive learnign chair that offers songs, stories, and educational content for toddlers.', 250),
(1, 'LEGO Classic Creative Build Box', 'A versatile building set that encourages creativity with various LEGO bricks in different colors and shapes. ', 150),
(2, 'Barbie Dreamhouse Playset', 'A three-story dollhouse with interactive features and accessories for imaginative play.', 1200),
(3, 'Hot Wheels Ultimate Garage', 'A multi-level garage playset with parking spacse, a racing track, and a shark obstacle.', 500),
(4, 'Nerf N-Strike Elite Disruptor Blaster', 'A quick-draw blaster with a rotating drum holding six foam darts for active play.', 85),
(5, 'Play-Doh Modeling Compound 10-Pack', 'A set of colorful modeling clay encouraging creativity and hands-on play.', 36),
(6, 'Fisher-Price Laugh & Learn Smart Stages Chair', 'An interactive learnign chair that offers songs, stories, and educational content for toddlers.', 250);

-- --------------------------------------------------------

--
-- Table structure for table `video games`
--

CREATE TABLE `video games` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video games`
--

INSERT INTO `video games` (`id`, `name`, `description`, `price`) VALUES
(1, 'Minecraft', 'A sandbox game where players explore, build, and survive in an open-world environment made of blocks.', 100),
(2, 'Grand Theft Auto V (GTA V)', 'An action-adventure game featuring an open-world city, missions, heists, and multiplayer gameplay. ', 150),
(3, 'The Legend of Zelda: Breath of the Wild', 'An open-world adventure where players control Link, solving puzzles and battling enemies to save Hyrule. ', 250),
(4, 'Call of Duty: Modern Warfare II', 'A first-person shooter known for its intense multiplayer battles and cinematic single-player campaign.', 220),
(5, 'FIFA 23', 'A football simulation game that lets players compete in realistic matches with licensed teams and leagues.', 200),
(6, 'NBA 2K25', 'A basketball simulation game offering realistic gameplay, various modes, and the latest NBA rosters.', 199),
(1, 'Minecraft', 'A sandbox game where players explore, build, and survive in an open-world environment made of blocks.', 100),
(2, 'Grand Theft Auto V (GTA V)', 'An action-adventure game featuring an open-world city, missions, heists, and multiplayer gameplay. ', 150),
(3, 'The Legend of Zelda: Breath of the Wild', 'An open-world adventure where players control Link, solving puzzles and battling enemies to save Hyrule. ', 250),
(4, 'Call of Duty: Modern Warfare II', 'A first-person shooter known for its intense multiplayer battles and cinematic single-player campaign.', 220),
(5, 'FIFA 23', 'A football simulation game that lets players compete in realistic matches with licensed teams and leagues.', 200),
(6, 'NBA 2K25', 'A basketball simulation game offering realistic gameplay, various modes, and the latest NBA rosters.', 199);

-- --------------------------------------------------------

--
-- Table structure for table `wanted_items`
--

CREATE TABLE `wanted_items` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `size_edition` varchar(100) DEFAULT NULL,
  `contact_info` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `lost_found_items`
--
ALTER TABLE `lost_found_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `item_type` (`item_type`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `wanted_items`
--
ALTER TABLE `wanted_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lost_found_items`
--
ALTER TABLE `lost_found_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wanted_items`
--
ALTER TABLE `wanted_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lost_found_items`
--
ALTER TABLE `lost_found_items`
  ADD CONSTRAINT `lost_found_items_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wanted_items`
--
ALTER TABLE `wanted_items`
  ADD CONSTRAINT `wanted_items_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
