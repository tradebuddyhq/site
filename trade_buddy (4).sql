-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2025 at 02:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `cname` varchar(100) NOT NULL,
  `cemail` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cname`, `cemail`, `password`) VALUES
(1, 'a', 'a@gmail.com', '1'),
(2, 'wadud', 'wadud@gmail.com', 'wadud'),
(3, 'wadud', 'wadud@gmail.com', '456'),
(4, 'w', 'w@gmail.com', '1'),
(5, 'Maloy Burman', 'maloy.burman@premiergenie.com', '123456'),
(6, 'skwadudali', 'skwadudali48@gmail.com', '12345'),
(7, 'w', 'w@gmail.com', '1'),
(8, 'wadud', 'ww@gmail.com', 'ww'),
(9, 'wadudali', 'wadud@gmail.com', 'wadudali'),
(10, 'skwadudali123', 'skwadudali48@gmail.com', '1234');

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
  `category` varchar(255) NOT NULL DEFAULT 'Uncategorized'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `customer_id`, `product_name`, `product_description`, `price`, `image`, `category`) VALUES
(1, 8, 'knife', 'its a good knife', 23.00, 'uploads/99.jpg', 'Uncategorized'),
(2, 8, 'headphones', 'its a very good headphones.\r\nevryone should buy', 123.00, 'electronics.png', 'Uncategorized'),
(3, 8, 'pokemon card', 'this a very good cards for playing ', 123.00, 'pokemoncards.png', 'Uncategorized'),
(4, 8, 'Board Game 1', 'A word-based game where tems guess secret words ba.', 100.00, 'boardgames.png', 'Uncategorized'),
(5, 8, 'Electronics Item 1', 'A smartphone is a portable device that combines a mobile phone with advanced computing capabilites, enabling internet access, apps, messaging, and multimedia functions.', 3500.00, 'phone.png', 'Uncategorized'),
(6, 8, 'smartphone', 'its a new phone ', 2345.00, 'phone.png', 'Electronics'),
(7, 8, 'mobile', 'its a mobile ', 2345.00, 'phone.png', 'Electronics'),
(8, 8, 'furniture items', 'this is a furniture', 220.00, 'furniture.png', 'Furniture'),
(9, 8, 'mobile', 'its a mobile ', 999.94, 'phone.png', 'Electronics'),
(10, 8, 'cloths', 'its a cloths', 100.00, 'denim_jeans_image.jpg', 'Clothing');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
