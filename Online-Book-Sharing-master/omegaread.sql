-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 09:47 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omegaread`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(10) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `author`, `edition`, `genre`, `description`, `user_id`) VALUES
(37, 'Alice\'s Adventures in Wonderland\r\n', 'Lewis Carroll', '1', 'Novel', 'The most famous book in good condition', 'siddharth'),
(38, 'Frankenstein\r\n', 'Mary Shelley', '1', 'Novel', 'My favorite novel in good state', 'siddharth'),
(39, 'The Catcher in the Rye\r\n', 'J. D. Salinger', '1', 'Novel', 'In good state', 'siddharth'),
(41, 'Lolita\r\n', 'Vladimir Nabokov', '1', 'Novel', 'The state is good anyone interested?', 'rahulsahu'),
(42, 'Winnie-the-Pooh\r\n', 'A. A. Milne', '1', 'Children\'s literature, Fiction', 'My childhood book for someone else\'s childhood ', 'rahulsahu'),
(43, 'Little Women\r\n', 'Louisa May Alcott', '3', 'Novel', 'good state', 'rahulsahu'),
(44, 'One Hundred Years of Solitude\r\n', 'Gabriel García Márquez', '2', 'Novel', 'In a good state', 'dhar1mesh'),
(45, 'Great Expectations\r\n', 'Charles Dickens', '4', 'Novel', 'Good state', 'dhar1mesh'),
(46, 'The Cat in the Hat', 'Dr. Seuss', '2', 'Children\'s literature, Picture book, Fiction', 'In good state', 'dhar1mesh'),
(47, 'War and Peace\r\n', 'Leo Tolstoy', '4', 'Novel', 'A good novel', 'dhar1mesh'),
(48, 'Beloved\r\n', 'Toni Morrison', '5', 'Novel', 'Best of Toni Morrison', 'siddharth'),
(49, 'asfjdla', 'kjdslafk', 'kjdkasfjkj', 'kljk', 'kljfdkjkl', 'rahulsahu');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `email`, `password`, `first_name`, `last_name`, `area`, `locality`, `city`, `mobile_no`, `pincode`) VALUES
('akasharsude', 'arsude.akash@gmail.com', 'akash', 'Akash', 'Arsude', 'MANIT', 'Near Mata Mandir', 'Bhopal', '677867897', 462003),
('dhar1mesh', 'dhrmeshydv@gmail.com', 'dhar1mesh', 'Dharmesh', 'Yadav', 'MANIT', 'Near Mata Mandir', 'Bhopal', '9782072145', 462003),
('rahulsahu', 'rs8489501@gmail.com', 'rahulsahu', 'Rahul', 'Sahu', 'Manit', 'Mata', 'Bhopal', '8173014504', 462003),
('siddharth', 'sid94048.more@gmail.com', 'thermo1020', 'Siddharth', 'More', 'Bhopal', 'Manit', 'Bhopal', '2147483647', 462003);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
