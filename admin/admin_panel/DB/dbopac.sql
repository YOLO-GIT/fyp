-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 12:52 PM
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
  `book_language` varchar(25) NOT NULL,
  `book_illustration` varchar(15) NOT NULL,
  `book_matter1` varchar(25) NOT NULL,
  `book_matter2` varchar(25) NOT NULL,
  `book_matter3` varchar(25) NOT NULL,
  `book_status` varchar(15) NOT NULL,
  `book_added` datetime DEFAULT NULL,
  `book_image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`book_ID`, `book_title`, `book_author`, `book_ISBN`, `publisher`, `book_dewey`, `book_category`, `book_desc`, `book_language`, `book_illustration`, `book_matter1`, `book_matter2`, `book_matter3`, `book_status`, `book_added`, `book_image`) VALUES
(7578, 'Super Storymorie Certot#2 Sukan', 'Kumpulan Penulis', '978-967-411-759-7', 'PTS Publishing House Sdn ', '899.23 STO', 'Fiction', 'Antologi Cerita Kontol', '', '', '', '', '', '', '2023-10-23 12:49:19', 'uploads/Certot_3-Ayahku_Superhero.jpg'),
(7574, 'Ilmu Keusahawanan Agrikultur', 'Suriatiyah', '978-967-371-054-6', 'Synergy Media Sdn Bhd', '338.1 SUR', 'Science', 'Berkaitan Agrikultur', '', '', '', '', '', '', '2023-10-23 12:21:32', 'uploads/Watermark.jpg'),
(7575, 'Membuat Baja Kompos', 'L. Murbandono HS', '978-967-371-076-8', 'Synergy Media Sdn Bhd', '631.875 MUR', 'Science', 'Siri Agro itu Pertanian', '', '', '', '', '', '', '2023-10-23 12:26:11', 'uploads/default_book.jpg'),
(7576, 'Misteri Disebalik Gerakan Solat 5 Waktu', 'H. Muhammad Nasir, MA', '978-967-048-281-1', 'Pustaka Al-Ehsan', '297.283 MUH', 'History', 'Nikmati Lazatnya Solat', '', '', '', '', '', '', '2023-10-23 12:30:45', 'uploads/default_book.jpg'),
(7577, 'SAYA , SHERLOCK DAN LUPIN', 'Adler, Irene', '978-967-411-854-9', 'PTS Publishing House Sdn ', '823 IRE', 'Fiction', 'Babak terakhir opera', '', '', '', '', '', '', '2023-10-23 12:35:08', 'uploads/default_book.jpg'),
(7573, 'Cina Muslim & Hubungannya dengan Alam Melayu', 'Yusuf Liu Baojun', '978-967-163-870-5', 'CM Diverse Sdn Bhd', '305.69 LIU', 'History', 'Buku berkaitan perkembangan islam', '', '', '', '', '', '', '2023-10-23 12:17:08', 'uploads/Cina-Muslim-dan-Hubungan-dengan-Alam-Melayu.jpg'),
(7579, 'Super Robotik', 'Ahmad Nabil Musyiri', '978-967-411-882-2', 'PTS Publishing House Sdn ', '899.23 AHM', 'Fiction', 'Alumni Tunas Super', '', '', '', '', '', '', '2023-10-23 12:52:55', 'uploads/default_book.jpg'),
(7580, 'Mr Gamer VS Miss H', 'Azim Hakimi', '978-967-411-806-8', 'PTS Publishing House Sdn ', '899.23 AZI', 'Fiction', 'Penulis Tunas Super', '', '', '', '', '', '', '2023-10-23 12:54:14', 'uploads/default_book.jpg'),
(7581, 'Clash Of Crowns', 'Farhan Hakimi', '978-967-411-490-9', 'PTS Publishing House Sdn ', '899.23 FAR', 'Action', 'Clash Of Crowns', '', '', '', '', '', '', '2023-10-23 12:55:11', 'uploads/clash_of_the_crown_CO_correction.jpg'),
(7582, 'Fairies of Carina ', 'Farrah Hana', '978-967-411-481-7', 'PTS Publishing House Sdn ', '899.23 FAR', 'Fiction', 'Penulis Tunas Super', '', '', '', '', '', '', '2023-10-23 12:56:05', 'uploads/default_book.jpg'),
(7583, 'Pocket Time', 'Nur Erisha', '978-967-411-483-1', 'PTS Publishing House Sdn ', '899.23 NUR', 'Fiction ', 'Penulis Tunas Super', 'BM', 'Ya ', 'Malay fictio', '-', '-', 'Ada', '2023-10-29 23:38:22', 'uploads/default_book.jpg'),
(7584, 'My Best Buddy', 'Sharina Elisa', '978-967-369-423-5', 'Bookiut', '899.23 SHA', 'Fiction ', '-', 'Bahasa M', 'Ya ', 'Malay fiction, Malay', '-', '-', 'Ada', '2023-10-30 01:30:54', 'uploads/default_book.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `booking_ID` varchar(25) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `user_Name` varchar(25) NOT NULL,
  `user_ID` varchar(25) NOT NULL,
  `date_booked` date DEFAULT NULL,
  `time_booked` time DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`booking_ID`, `book_title`, `user_Name`, `user_ID`, `date_booked`, `time_booked`, `status`) VALUES
('230002', 'Ilmu Keusahawanan Agrikultur', 'Ahmad Aziz', 'SJ0435', '2023-11-07', '05:53:42', 'isBooking'),
('230001', 'Super Storymorie Certot#2 Sukan', 'Ahmad Aziz', 'SJ0435', '2023-11-07', '05:53:12', 'isBooking'),
('230003', 'Membuat Baja Kompos', 'Ahmad Aziz', 'SJ0435', '2023-11-07', '05:54:02', 'isBooking');

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
  `librarians_ID` varchar(25) NOT NULL,
  `librarians_name` varchar(25) NOT NULL,
  `librarians_uname` varchar(25) NOT NULL,
  `librarians_password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbllibrarians`
--

INSERT INTO `tbllibrarians` (`librarians_ID`, `librarians_name`, `librarians_uname`, `librarians_password`) VALUES
('A0525J', 'Ahmad Sufi', 'sufi123', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2');

-- --------------------------------------------------------

--
-- Table structure for table `tblprofile`
--

CREATE TABLE `tblprofile` (
  `user_id` varchar(25) NOT NULL,
  `bio` varchar(50) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `negeri` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `stud_ID` varchar(25) NOT NULL,
  `stud_Name` varchar(35) NOT NULL,
  `stud_username` varchar(25) NOT NULL,
  `stud_Class` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `stud_pwd` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `verification_code` varchar(100) NOT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `reset_token` varchar(25) NOT NULL,
  `book_count` int(25) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`stud_ID`, `stud_Name`, `stud_username`, `stud_Class`, `email`, `stud_pwd`, `date`, `verification_code`, `is_verified`, `reset_token`, `book_count`) VALUES
('1', 'Sufi', '', 'Al - Arabi', '', '', NULL, '', 0, '', 0),
('525', 'Sufi', '', '5 Al - Arabi', 'user@gmail.com', '3c9909afec', NULL, '', 0, '', 0),
('0527', 'Sufi', '', '4 Al - Arabi', 'user@gmail.com', '3627909a29', NULL, '', 0, '', 0),
('J0525', 'Sufi', '', '3 Al - Arabi', 'user@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', NULL, '', 0, '', 0),
('B0522', 'Sufi&nbsp;Danial', '', '3 ABU', '', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '2023-10-15', '', 0, '', 0),
('SJ0435', 'Ahmad Aziz', 'Sufi123', '5 Al - Arabi', 'ahmadsufi345@gmail.com', 'd9f7dfaf83ff1753bdd85e9cd77d18c876040a6f60f04b8330e76fdd198882612fd7439a2419e320395eea18406ccfadb65c7bc069cf8d94e9336a5813dfadcc', '2023-11-04', '4591ba', 1, '', 4),
('SJ0417', 'Ahmad Aziz', 'Sufi1234', '5 Al - Arabi', 'ahmadsufi345@gmail.com', '7e5b9a6029b64c52cd6a6ad186653195b70cfb7770b6d71c3eb4ddf16f1e270f6852ee9c61d9a7f07f897459fcf2d68b0c2e6ad4ebc0a8f38efd72382e471176', '2023-11-04', 'aa0943', 1, '', 0),
('SB0522', 'Mohd Saufi', 'Saufi125', '5 Al - Arabi', 'ahmadsufi345@gmail.com', '591f110c5f0e1bdce3ce99ee4d25a60959f343e90d120e4d473e3ccae5811d5d07cd991a64b6f18ef670b772d48adbb9c08206bb99e621b60046b3921b204b77', '2023-11-04', '478b98', 1, '', 0),
('SJ0455', 'Ahmad Nasik', 'Nasik123', '3 Al - Arabi', 'ahmadsufi345@gmail.com', '15e62c3a41b7c6e3aa01d53ea6fe3db11427947991e70634b0480b1d48c8331839ec136cf7a28833b60dc9588f160ac57a299a72d271c58d52991bc6e9301d4b', '2023-11-04', '30b230', 1, '', 0),
('SJ0467', 'Mohd Saufi', 'Saufi1235', '5 Al - Arabi', 'ahmadsufi345@gmail.com', '60919c8c5deb1bd7fd88002210b3317ea7157017385c1056b2d7e1d9936406bff0fc0bbf0a5690e73a10742e7e6b7f03cf8dc44b7eee0d777853dd92ea832b62', '2023-11-04', 'a32636', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblteachers`
--

CREATE TABLE `tblteachers` (
  `teachers_ID` varchar(25) NOT NULL,
  `teachers_Name` varchar(35) NOT NULL,
  `teachers_username` varchar(25) NOT NULL,
  `teachers_Password` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `date_teachers` date DEFAULT NULL,
  `verification_code` varchar(100) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `reset_token` varchar(25) NOT NULL,
  `book_count` int(25) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblteachers`
--

INSERT INTO `tblteachers` (`teachers_ID`, `teachers_Name`, `teachers_username`, `teachers_Password`, `email`, `date_teachers`, `verification_code`, `is_verified`, `reset_token`, `book_count`) VALUES
('TJ0525', 'Mohd Saufi', 'Saufi123', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'ahmadsufi345@gmail.com', '2023-11-06', '2aa822', 1, '', 0);

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
  ADD PRIMARY KEY (`librarians_ID`);

--
-- Indexes for table `tblprofile`
--
ALTER TABLE `tblprofile`
  ADD PRIMARY KEY (`user_id`);

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
  ADD PRIMARY KEY (`teachers_ID`);

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
  MODIFY `book_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7585;

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
-- AUTO_INCREMENT for table `tblreport`
--
ALTER TABLE `tblreport`
  MODIFY `report_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
