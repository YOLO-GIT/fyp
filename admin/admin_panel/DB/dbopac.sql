-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 09:44 AM
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
  `book_ID` varchar(25) NOT NULL,
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
('7578', 'Super Storymorie Certot#2 Sukan', 'Kumpulan Penulis', '978-967-411-759-6', 'PTS Publishing House Sdn ', '899.23 STO', 'Fiction', 'Antologi Cerita Kontol', '', '', '', '', '', '', '2023-10-23 12:49:19', 'uploads/Certot_3-Ayahku_Superhero.jpg'),
('7574', 'Ilmu Keusahawanan Agrikultur', 'Suriatiyah', '978-967-371-054-6', 'Synergy Media Sdn Bhd', '338.1 SUR', 'Science', 'Berkaitan Agrikultur', '', '', '', '', '', '', '2023-10-23 12:21:32', 'uploads/Watermark.jpg'),
('7575', 'Membuat Baja Kompos', 'L. Murbandono HS', '978-967-371-076-8', 'Synergy Media Sdn Bhd', '631.875 MUR', 'Science', 'Siri Agro itu Pertanian', '', '', '', '', '', '', '2023-10-23 12:26:11', 'uploads/default_book.jpg'),
('7576', 'Misteri Disebalik Gerakan Solat 5 Waktu', 'H. Muhammad Nasir, MA', '978-967-048-281-1', 'Pustaka Al-Ehsan', '297.283 MUH', 'History', 'Nikmati Lazatnya Solat', '', '', '', '', '', '', '2023-10-23 12:30:45', 'uploads/default_book.jpg'),
('7577', 'SAYA , SHERLOCK DAN LUPIN', 'Adler, Irene', '978-967-411-854-9', 'PTS Publishing House Sdn ', '823 IRE', 'Fiction', 'Babak terakhir opera', '', '', '', '', '', '', '2023-10-23 12:35:08', 'uploads/default_book.jpg'),
('7573', 'Cina Muslim & Hubungannya dengan Alam Melayu', 'Yusuf Liu Baojun', '978-967-163-870-5', 'CM Diverse Sdn Bhd', '305.69 LIU', 'History', 'Buku berkaitan perkembangan islam', '', '', '', '', '', '', '2023-10-23 12:17:08', 'uploads/Cina-Muslim-dan-Hubungan-dengan-Alam-Melayu.jpg'),
('7579', 'Super Robotik', 'Ahmad Nabil Musyiri', '978-967-411-882-2', 'PTS Publishing House Sdn ', '899.23 AHM', 'Fiction', 'Alumni Tunas Super', '', '', '', '', '', '', '2023-10-23 12:52:55', 'uploads/default_book.jpg'),
('7580', 'Mr Gamer VS Miss H', 'Azim Hakimi', '978-967-411-806-8', 'PTS Publishing House Sdn ', '899.23 AZI', 'Fiction', 'Penulis Tunas Super', '', '', '', '', '', '', '2023-10-23 12:54:14', 'uploads/default_book.jpg'),
('7581', 'Clash Of Crowns', 'Farhan Hakimi', '978-967-411-490-9', 'PTS Publishing House Sdn ', '899.23 FAR', 'Action', 'Clash Of Crowns', '', '', '', '', '', '', '2023-10-23 12:55:11', 'uploads/clash_of_the_crown_CO_correction.jpg'),
('7582', 'Fairies of Carina ', 'Farrah Hana', '978-967-411-481-7', 'PTS Publishing House Sdn ', '899.23 FAR', 'Fiction', 'Penulis Tunas Super', '', '', '', '', '', '', '2023-10-23 12:56:05', 'uploads/default_book.jpg'),
('7583', 'Pocket Time', 'Nur Erisha', '978-967-411-483-1', 'PTS Publishing House Sdn ', '899.23 NUR', 'Fiction ', 'Penulis Tunas Super', 'BM', 'Ya ', 'Malay fictio', '-', '-', 'Ada', '2023-10-29 23:38:22', 'uploads/default_book.jpg'),
('7584', 'My Best Buddy', 'Sharina Elisa', '978-967-369-423-5', 'Bookiut', '899.23 SHA', 'Fiction ', '-', 'Bahasa M', 'Ya ', 'Malay fiction, Malay', '-', '-', 'Ada', '2023-10-30 01:30:54', 'uploads/default_book.jpg'),
('7587', 'Sang Kancil', 'Kumpulan Penulis', '978-967-411-759-6', 'PTS Publishing House Sdn ', '899.23 STA', 'Fiction ', 'Testing', 'Bahasa Melayu', 'Ya ', 'Malay fiction', '', '', 'Ada', '2023-11-13 21:15:57', 'uploads/default_book.jpg'),
('78431', 'Kisah Sang Hadi', 'Haikal ', '122-255-128-512-1', 'SMOworkshop', '123412312', 'History ', 'Kisah Sang Hadi bermula daripada tahun 2001', 'Bahasa Melayu', 'Ya ', '', '', '', 'Ada', '2023-11-14 11:11:12', 'uploads/default_book.jpg');

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
  `status_ID` int(10) NOT NULL DEFAULT 0,
  `status` varchar(25) NOT NULL,
  `timestamp_column` timestamp NOT NULL DEFAULT current_timestamp()
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
-- Table structure for table `tblrecord`
--

CREATE TABLE `tblrecord` (
  `record_ID` varchar(25) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `user_ID` varchar(25) NOT NULL,
  `user_name` varchar(35) NOT NULL,
  `record_date` date DEFAULT NULL,
  `record_time` time DEFAULT NULL,
  `record_name` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblrecord`
--

INSERT INTO `tblrecord` (`record_ID`, `book_title`, `user_ID`, `user_name`, `record_date`, `record_time`, `record_name`) VALUES
('230001', '', '', '', NULL, NULL, 'Borrowing'),
('230001', '', '', '', NULL, NULL, 'Booking'),
('230004', '', '', '', NULL, NULL, 'Borrowing'),
('230004', '', '', '', NULL, NULL, 'Booking');

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
-- Table structure for table `tblreturning`
--

CREATE TABLE `tblreturning` (
  `return_ID` varchar(25) NOT NULL,
  `user_IC` varchar(35) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `book_title` varchar(35) NOT NULL,
  `book_condition` varchar(25) NOT NULL,
  `date_returned` date DEFAULT NULL,
  `return_approval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreturning`
--

INSERT INTO `tblreturning` (`return_ID`, `user_IC`, `user_name`, `book_title`, `book_condition`, `date_returned`, `return_approval`) VALUES
('230001', '031022140525', 'Sufi', 'Super Storymorie Certot#2 Sukan', 'Terbaik', '2023-11-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `stud_ID` varchar(25) NOT NULL,
  `stud_roles` varchar(9) NOT NULL,
  `stud_Name` varchar(35) NOT NULL,
  `stud_username` varchar(25) NOT NULL,
  `stud_Class` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `stud_pwd` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `verification_code` varchar(100) NOT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `reset_token` varchar(25) NOT NULL,
  `book_count` int(25) NOT NULL DEFAULT 0,
  `bio` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `negeri` varchar(50) NOT NULL,
  `report` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`stud_ID`, `stud_roles`, `stud_Name`, `stud_username`, `stud_Class`, `email`, `stud_pwd`, `date`, `verification_code`, `is_verified`, `reset_token`, `book_count`, `bio`, `birthday`, `negeri`, `report`) VALUES
('031022140525', '', 'Ahmad Sufi', 'user123', '3 ABU', 'alexandriad431@gmail.com', 'cdd994caa5e0aa64c607fc2e97e8b3c92d2475601574e6f2c66303bbd3374e1f640f9cbc5f6cfc2975ca99d0037c4eef326e31e9b9997c33ec6ef9c6e9150b84', '2023-11-16', '9f464d', 1, '', 15, 'Saya Student di SMK Tok Dor', '2009-06-16', 'Kelantan', 'Ada Buku terkoyak.'),
('041222032456', 'Student', 'Ali Abu', 'Ali345', 'Kelas 3 AB', 'alexandriad431@gmail.com', 'cdd994caa5e0aa64c607fc2e97e8b3c92d2475601574e6f2c66303bbd3374e1f640f9cbc5f6cfc2975ca99d0037c4eef326e31e9b9997c33ec6ef9c6e9150b84', '2023-11-21', 'Sa50158', 1, '', 2, '', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblteachers`
--

CREATE TABLE `tblteachers` (
  `teachers_ID` varchar(25) NOT NULL,
  `teacher_roles` varchar(9) NOT NULL,
  `teachers_Name` varchar(35) NOT NULL,
  `teachers_username` varchar(25) NOT NULL,
  `teachers_Password` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `date_teachers` date DEFAULT NULL,
  `verification_code` varchar(100) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `reset_token` varchar(25) NOT NULL,
  `book_count` int(25) NOT NULL DEFAULT 0,
  `bio` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `negeri` varchar(50) NOT NULL,
  `report` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblteachers`
--

INSERT INTO `tblteachers` (`teachers_ID`, `teacher_roles`, `teachers_Name`, `teachers_username`, `teachers_Password`, `email`, `date_teachers`, `verification_code`, `is_verified`, `reset_token`, `book_count`, `bio`, `birthday`, `negeri`, `report`) VALUES
('031022140445', '', 'Danial Sufi', 'abu123', '3393f30f7162c1beed2a4ea2eb0e7bf5eadeabb6d00b91cbd481b516eecd1ae07750fc917e3ce86c49d2f3774ff6a7d772b08ade6861ce635c5649df84cb6b57', 'alexandriad431@gmail.com', '2023-11-18', 'T6f4c71', 1, '', 13, '', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `transc_ID` varchar(25) NOT NULL,
  `transc_name` varchar(35) NOT NULL,
  `isBooked` tinyint(1) NOT NULL,
  `book_ID` varchar(25) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `user_ID` varchar(25) NOT NULL,
  `user_Name` varchar(25) NOT NULL,
  `user_role` varchar(25) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`transc_ID`, `transc_name`, `isBooked`, `book_ID`, `book_title`, `user_ID`, `user_Name`, `user_role`, `start_date`, `end_date`, `time`) VALUES
('BR044575782023', 'Borrowing', 0, '7578', 'Super Storymorie Certot#2 Sukan', '031022140445', 'Danial Sufi', 'Teacher', '2023-11-24', '2023-11-24', '2023-11-24 15:05:12');

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
-- Indexes for table `tblreport`
--
ALTER TABLE `tblreport`
  ADD PRIMARY KEY (`report_ID`);

--
-- Indexes for table `tblreturning`
--
ALTER TABLE `tblreturning`
  ADD PRIMARY KEY (`return_ID`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
