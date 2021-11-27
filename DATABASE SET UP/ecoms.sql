-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2021 at 12:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecoms`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `item_id` int(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_image` varchar(255) DEFAULT NULL,
  `item_condition` enum('New','Used') DEFAULT NULL,
  `item_rating` int(5) DEFAULT NULL,
  `item_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`item_id`, `item_name`, `item_price`, `item_image`, `item_condition`, `item_rating`, `item_description`) VALUES
(1, 'Kind Girls', '99.99', 'assets/51f6hwGlOoL.png', 'New', 5, 'This small, portable book presents a unique perspective on the human body for artists to study and implement in their drawing work. In this book, artist and teacher Michel Lauricella simplifies the human body into basic, synthetic shapes and forms, offering profound insight for artists of all kinds, sparking the imagination and improving one’s observational abilities. Rather than going the traditional route of memorizing a repertoire of poses, Lauricella instead stresses learning this small collection of forms, which can then be combined and shaped into the more complex and varied forms and postures we see in the living body.'),
(2, 'Souidmy Electric Drum Set, 8 Piece All Mesh Electronic Drum Kit with Dual Zone\r\n                            Pad/Cymbals, MIDI Support Lesson APP and Games, Reinforced Steel Frame, 20 Preset Drum\r\n                            Sources, 42 Play-Along Tracks', '399.99', 'assets/drum.jpg', 'Used', 4, '[EXPRESSIVE DRUM PAD] The upgraded mesh drum head not only obtains better percussion\r\n                            feedback and reduce physical noise but also restores real and high-quality drum sounds . The\r\n                            better experience will get in the process of playing.\r\n                            [EXCELLENT PLAYING PERFORMANCE]The dual-trigger technology reproduces the sounding method of\r\n                            the acoustic drum hitting and faithfully restores the changes in the drum sound, including\r\n                            cymbal stop and side strike sound. The upgraded snare drum even has dynamics induction,\r\n                            which can stimulate the rich potential of drummers whether it is a live performance or\r\n                            percussion practice.\r\n                            [EXTENSIVE TRAINING FUNCTIONS]This mesh kit has an advanced metronome with light guidance\r\n                            and record function. With 450 sounds, 20 drum kits, and 43 training songs, you can learn and\r\n                            familiarize yourself with various music styles. Both beginners and professionals will find\r\n                            TDX25\'s training function very helpful for daily practice.\r\n                            [RELIABLE SOUIDMY HARDWARE]Strengthening the four-post frame while simplifies the\r\n                            installation of electronic drums. Each age group can adjust the position and angle of the\r\n                            cymbals, snare drums, and tom drums as needed, and play in the correct posture. The foldable\r\n                            design, drumstick storage, and drum-cover greatly increasing convenience.\r\n                            [EVERYTHING NEEDED]Souidmy Mesh drum kit includes all the accessories you need, from a\r\n                            4-post frame to the included bass drum pedal and pedal-controller. This electronic drum kit\r\n                            package even comes with a drum cover, audio line, installation drum key, and a pair of drum\r\n                            sticks.'),
(3, '[LEZHIN] Point Character Drawing [paperback]', '50.00', 'assets/point draw.jpg', 'New', 5, 'A distinctive tutorial book that was compiled with secret techniques to help readers with difficult artwork. As you learn to draw with this book, you will feel as if there is tutor who guides you along. This purchase includes a set of 2 volumes of Point Character Drawing Books that are extremely useful to teach you how to character draw, in both Korean and English.');

-- --------------------------------------------------------

--
-- Table structure for table `thisisatesttable`
--

CREATE TABLE `thisisatesttable` (
  `itemIndexPos` int(11) NOT NULL,
  `itemID` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thisisatesttable`
--

INSERT INTO `thisisatesttable` (`itemIndexPos`, `itemID`, `username`, `quantity`) VALUES
(1, 1, 'ThisisaTest', 1),
(2, 3, 'ThisisaTest', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'ThisisaTest', '$2y$10$9jdZFknfTGhC1ISPtDlehud/YSiedpF3XOPKt8LMv9/0U6aT5eSX6', '2021-11-24 21:05:37'),
(2, 'ReneAllen', '$2y$10$91XeOfiAdhBEOvNZO/Xbrexgih530143JtHk4LiMJmb/LQFW91U5K', '2021-11-25 11:11:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `thisisatesttable`
--
ALTER TABLE `thisisatesttable`
  ADD PRIMARY KEY (`itemIndexPos`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thisisatesttable`
--
ALTER TABLE `thisisatesttable`
  MODIFY `itemIndexPos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
