-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 04:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbllr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `book_ID` int(25) NOT NULL,
  `book_title` varchar(35) NOT NULL,
  `book_author` varchar(25) NOT NULL,
  `book_ISBN` int(35) NOT NULL,
  `publisher` varchar(25) NOT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `num_pages` int(11) DEFAULT NULL,
  `stock_availability` int(11) DEFAULT NULL,
  `cover_image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`book_ID`, `book_title`, `book_author`, `book_ISBN`, `publisher`, `publication_year`, `genre`, `language`, `num_pages`, `stock_availability`, `cover_image_url`, `description`) VALUES
(1, 'Seekor Ikan Aya', 'Jonny ', 1234567890, 'Cetak Rompak Ins', 2022, 'Fiction', 'English', 300, 10, 'book1_cover.jpg', 'Inilah karya cetak rompak '),
(2, 'Kisah Kapibara', 'Armughem', 2147483647, 'Nosional Gegrafik', 2021, 'Documentary', 'English', 250, 5, 'book2_cover.jpg', 'Kapibara is a kapibelapi'),
(3, 'The book of oYen', 'Author 3', 2147483647, 'Publisher C', 2023, 'Science Fiction', 'Melayu', 400, 15, 'book3_cover.jpg', 'The oyen final destiny awaiting him'),
(9, 'Book 1 Title', 'Author 1', 1234567890, 'Publisher A', 2022, 'Fiction', 'English', 300, 10, 'book1_cover.jpg', 'Description of Book 1'),
(10, 'Book 2 Title', 'Author 2', 2147483647, 'Publisher B', 2021, 'Mystery', 'English', 250, 5, 'book2_cover.jpg', 'Description of Book 2'),
(11, 'Sopeebara', 'Armughem', 2147483647, 'Jonn', 2023, 'Science Fiction', 'English', 400, 15, 'book3_cover.jpg', 'Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `booking_ID` int(25) NOT NULL,
  `book_ID` int(35) NOT NULL,
  `stud_ID` int(25) NOT NULL,
  `lect_ID` int(35) NOT NULL,
  `date_booked` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`booking_ID`, `book_ID`, `stud_ID`, `lect_ID`, `date_booked`) VALUES
(1, 1, 1, 1, '2023-10-21'),
(2, 2, 2, 2, '2023-10-22'),
(3, 3, 3, 3, '2023-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `tblborrowing`
--

CREATE TABLE `tblborrowing` (
  `borrowing_ID` int(25) NOT NULL,
  `book_ID` int(25) NOT NULL,
  `stud_ID` int(25) NOT NULL,
  `lect_ID` int(35) NOT NULL,
  `date_borrowed` varchar(25) NOT NULL,
  `date_returned` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblborrowing`
--

INSERT INTO `tblborrowing` (`borrowing_ID`, `book_ID`, `stud_ID`, `lect_ID`, `date_borrowed`, `date_returned`) VALUES
(1, 1, 1, 1, '2023-10-21', '2023-10-28'),
(2, 2, 2, 2, '2023-10-22', '2023-10-29'),
(3, 3, 3, 3, '2023-10-23', '2023-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `tblheadstaff`
--

CREATE TABLE `tblheadstaff` (
  `check_ID` int(25) NOT NULL,
  `head_name` varchar(35) NOT NULL,
  `status_approved` varchar(25) NOT NULL,
  `status_declined` varchar(35) NOT NULL,
  `report_ID` int(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblheadstaff`
--

INSERT INTO `tblheadstaff` (`check_ID`, `head_name`, `status_approved`, `status_declined`, `report_ID`) VALUES
(1, 'Head Staff 1', 'Approved', 'Declined', 1),
(2, 'Head Staff 2', 'Approved', 'Declined', 2),
(3, 'Head Staff 3', 'Approved', 'Declined', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbllibrarians`
--

CREATE TABLE `tbllibrarians` (
  `status_ID` int(25) NOT NULL,
  `librarians_name` varchar(35) NOT NULL,
  `status_approved` varchar(25) NOT NULL,
  `status_declined` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbllibrarians`
--

INSERT INTO `tbllibrarians` (`status_ID`, `librarians_name`, `status_approved`, `status_declined`) VALUES
(1, 'Librarian 1', 'Approved', 'Declined'),
(2, 'Librarian 2', 'Approved', 'Declined'),
(3, 'Librarian 3', 'Approved', 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `tblreport`
--

CREATE TABLE `tblreport` (
  `report_ID` int(25) NOT NULL,
  `transc_ID` int(35) NOT NULL,
  `borrowing_ID` int(25) NOT NULL,
  `booking_ID` int(35) NOT NULL,
  `report_date` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreport`
--

INSERT INTO `tblreport` (`report_ID`, `transc_ID`, `borrowing_ID`, `booking_ID`, `report_date`) VALUES
(1, 1, 1, 1, '2023-10-28'),
(2, 2, 2, 2, '2023-10-29'),
(3, 3, 3, 3, '2023-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `stud_ID` int(25) NOT NULL,
  `stud_Name` varchar(35) NOT NULL,
  `stud_Class` varchar(12) NOT NULL,
  `stud_Password` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`stud_ID`, `stud_Name`, `stud_Class`, `stud_Password`) VALUES
(1, 'Student 1', 'Class A', 'password1'),
(2, 'Student 2', 'Class B', 'password2'),
(3, 'Student 3', 'Class C', 'password3');

-- --------------------------------------------------------

--
-- Table structure for table `tblteachers`
--

CREATE TABLE `tblteachers` (
  `lect_ID` int(25) NOT NULL,
  `lect_Name` int(35) NOT NULL,
  `lect_Password` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblteachers`
--

INSERT INTO `tblteachers` (`lect_ID`, `lect_Name`, `lect_Password`) VALUES
(1, 0, 0),
(2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `transc_ID` int(25) NOT NULL,
  `transc_name` varchar(35) NOT NULL,
  `borrowing_ID` int(25) NOT NULL,
  `stud_ID` int(35) NOT NULL,
  `lect_ID` int(25) NOT NULL,
  `booking_ID` int(25) NOT NULL,
  `status_ID` int(25) NOT NULL,
  `transc_date` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`transc_ID`, `transc_name`, `borrowing_ID`, `stud_ID`, `lect_ID`, `booking_ID`, `status_ID`, `transc_date`) VALUES
(1, 'Transaction 1', 1, 1, 1, 1, 1, '2023-10-28'),
(2, 'Transaction 2', 2, 2, 2, 2, 2, '2023-10-29'),
(3, 'Transaction 3', 3, 3, 3, 3, 3, '2023-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `username`, `password`) VALUES
(1, 'sopee', 'sopee123', 'sopeeddt'),
(2, 'eaby', 'sahabat', 'password@1234'),
(3, 'Azimah', 'bujim123', 'Azimhebat123'),
(4, '', 'capybaraBlaster', '$2y$10$DCmkWa3PLNvWwc3anO2sLejNLrwoAXA.Md9H9Q6vCVGCmhzHUsz3.'),
(5, '', 'doloh', '$2y$10$TSbGa4K5dDDUIDFHSL4bFeCi0wk8Nfw6HwgFTMCjf/.H43g3gdVwu'),
(6, 'User 1', 'user1', 'userpass1'),
(7, 'User 2', 'user2', 'userpass2'),
(8, 'User 3', 'user3', 'userpass3');

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
-- Indexes for table `tblheadstaff`
--
ALTER TABLE `tblheadstaff`
  ADD PRIMARY KEY (`check_ID`);

--
-- Indexes for table `tbllibrarians`
--
ALTER TABLE `tbllibrarians`
  ADD PRIMARY KEY (`status_ID`);

--
-- Indexes for table `tblreport`
--
ALTER TABLE `tblreport`
  ADD PRIMARY KEY (`report_ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`stud_ID`);

--
-- Indexes for table `tblteachers`
--
ALTER TABLE `tblteachers`
  ADD PRIMARY KEY (`lect_ID`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD PRIMARY KEY (`transc_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `book_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `booking_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblborrowing`
--
ALTER TABLE `tblborrowing`
  MODIFY `borrowing_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblheadstaff`
--
ALTER TABLE `tblheadstaff`
  MODIFY `check_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbllibrarians`
--
ALTER TABLE `tbllibrarians`
  MODIFY `status_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblreport`
--
ALTER TABLE `tblreport`
  MODIFY `report_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `stud_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblteachers`
--
ALTER TABLE `tblteachers`
  MODIFY `lect_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  MODIFY `transc_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
