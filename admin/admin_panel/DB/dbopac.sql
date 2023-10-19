-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 05:11 PM
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
-- Database: `dbopac`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `book_ID` int(25) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(25) NOT NULL,
  `book_ISBN` varchar(35) NOT NULL,
  `publisher` varchar(25) NOT NULL,
  `book_dewey` varchar(25) NOT NULL,
  `book_category` varchar(25) NOT NULL,
  `book_desc` varchar(255) NOT NULL,
  `book_added` datetime DEFAULT NULL,
  `book_image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`book_ID`, `book_title`, `book_author`, `book_ISBN`, `publisher`, `book_dewey`, `book_category`, `book_desc`, `book_added`, `book_image`) VALUES
(7573, 'Cina Muslimin', 'Yusuf Liu Baojun', '2147483647', 'CM Diverse Sdn Bhd', '30569', 'History', '-', NULL, 'uploads/default_book.jpg'),
(3, 'Sang Dugong', 'Azim', '123456789', 'SMOBookstore', '123', 'History', 'Cerita Sang Kancil Dan Bu', NULL, 'uploads/default_book.jpg'),
(7358, 'Puteri Gunung ', 'Raja Zuraidah', '2147483647', 'Dewan Bahasa Dan Pustaka', '123', 'Fiction', 'Mengisahkan berkaitan Put', NULL, 'uploads/default_book.jpg'),
(7578, 'Tunas Super: Certot #3: Antologi Cerita Kontot: Ayahku Superhero', 'Kumpulan Penulis', '2147483647', 'CM Diverse Sdn Bhd', '899.23 STO', 'Fiction', 'Antologi Cerita Certot', '2023-10-18 22:36:03', 'uploads/Certot_3-Ayahku_Superhero.jpg'),
(7581, 'Clash Of Crowns', 'Farhan Hakimi', '978-967-411-759-7', 'PTS Publishing House Sdn ', '899.23 FAR', 'Action', 'fdgdfgf', '2023-10-19 17:10:01', 'uploads/clash_of_the_crown_CO_correction.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `booking_ID` int(25) NOT NULL,
  `book_ID` int(35) NOT NULL,
  `stud_ID` int(25) NOT NULL,
  `teachers_ID` int(35) NOT NULL,
  `date_booked` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblborrowing`
--

CREATE TABLE `tblborrowing` (
  `borrowing_ID` int(25) NOT NULL,
  `book_ID` int(35) NOT NULL,
  `stud_ID` int(25) NOT NULL,
  `teachers_ID` int(35) NOT NULL,
  `date_borrowed` varchar(25) NOT NULL,
  `date_returned` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbllibrarians`
--

CREATE TABLE `tbllibrarians` (
  `status_ID` int(25) NOT NULL,
  `librarians_name` varchar(20) NOT NULL,
  `status_approved` varchar(25) NOT NULL,
  `status_declined` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `stud_ID` varchar(25) NOT NULL,
  `stud_Name` varchar(35) NOT NULL,
  `stud_username` varchar(25) NOT NULL,
  `stud_Class` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `stud_pwd` varchar(255) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`stud_ID`, `stud_Name`, `stud_username`, `stud_Class`, `email`, `stud_pwd`, `date`) VALUES
('1', 'Sufi', '', 'Al - Arabi', '', '', NULL),
('525', 'Sufi', '', '5 Al - Arabi', 'user@gmail.com', '3c9909afec', NULL),
('0527', 'Sufi', '', '4 Al - Arabi', 'user@gmail.com', '3627909a29', NULL),
('J0525', 'Sufi', '', '3 Al - Arabi', 'user@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', NULL),
('B0522', 'Sufi&nbsp;Danial', '', '3 ABU', '', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `tblteachers`
--

CREATE TABLE `tblteachers` (
  `teachers_ID` varchar(25) NOT NULL,
  `teachers_Name` varchar(35) NOT NULL,
  `teachers_username` varchar(25) NOT NULL,
  `teachers_Password` int(255) NOT NULL,
  `date_teachers` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblteachers`
--

INSERT INTO `tblteachers` (`teachers_ID`, `teachers_Name`, `teachers_username`, `teachers_Password`, `date_teachers`) VALUES
('1', 'Azim Ghazali', '', 123, NULL),
('2', 'Sufi', '', 12345, '2023-10-14'),
('3', 'AzizAbdul', '', 12345, '2023-10-15'),
('B0526', 'Aliya<br>Natasha', '', 12345678, '2023-10-15'),
('B0522', 'Aliya&nbsp;Abdul', '', 234432, '2023-10-16'),
('J0527', 'Sufi&nbsp;Aziz', 'user123', 9, '2023-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `transc_ID` int(25) NOT NULL,
  `transc_name` varchar(35) NOT NULL,
  `borrowing_ID` int(25) NOT NULL,
  `stud_ID` int(35) NOT NULL,
  `teachers_ID` int(25) NOT NULL,
  `booking_ID` int(25) NOT NULL,
  `transc_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`transc_ID`, `transc_name`, `borrowing_ID`, `stud_ID`, `teachers_ID`, `booking_ID`, `transc_date`) VALUES
(2, 'IsReturning', 0, 1, 0, 1, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`book_ID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`booking_ID`);

--
-- Indexes for table `tblborrowing`
--
ALTER TABLE `tblborrowing`
  ADD PRIMARY KEY (`borrowing_ID`);

--
-- Indexes for table `tbllibrarians`
--
ALTER TABLE `tbllibrarians`
  ADD PRIMARY KEY (`status_ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`stud_ID`);

--
-- Indexes for table `tblteachers`
--
ALTER TABLE `tblteachers`
  ADD PRIMARY KEY (`teachers_ID`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD PRIMARY KEY (`transc_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `booking_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblborrowing`
--
ALTER TABLE `tblborrowing`
  MODIFY `borrowing_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbllibrarians`
--
ALTER TABLE `tbllibrarians`
  MODIFY `status_ID` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  MODIFY `transc_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
