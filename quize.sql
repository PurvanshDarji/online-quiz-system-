-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2025 at 10:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quize`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_name`, `email`, `message`, `created_at`) VALUES
(1, 'meetraj', 'tuvormeet@gmail.com', 'good website for quiz ', '2025-11-14 05:30:12'),
(2, 'Purvansh', 'abhishek234@gmail.com', 'good !', '2025-11-14 05:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `question` text NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `optionD` varchar(255) NOT NULL,
  `correct` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `subject`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `correct`) VALUES
(1, 'Html', 'What does the &lt a &gt tag define?', 'Image', 'Anchor', 'Audio file', 'Animation', 'B'),
(2, 'Html', 'Which HTML element is used to display a numbered list?', '&lt UL &gt', '&lt ol &gt', '&lt li &gt', '&lt list &gt', 'B'),
(3, 'Html', 'What is the correct HTML for inserting an image?', '&lt image src=\"pic.jpg\" &gt', '&lt img href=\"pic.jpg\" &gt', '&lt img src=\"pic.jpg\" alt=\"image\" &gt', '&lt pic src=\"pic.jpg\" &gt', 'C'),
(4, 'Html', 'Which tag is used to create a table row?', '&lt td &gt', '&lt tr &gt', '&lt th &gt', '&lt table &gt', 'B'),
(5, 'Html', 'What is the correct HTML element for the largest heading?', '&lt heading &gt', '&lt h6 &gt', '&lt h1 &gt', '&lt head &gt', 'C'),
(6, 'Css', 'Which property is used to change text color in CSS?', 'font-color', 'color', 'text-color', 'fgcolor', 'B'),
(7, 'Css', 'Which symbol is used before an ID selector in CSS?', '.', '#', '@', '%', 'B'),
(8, 'Css', 'Which CSS property controls the text size?', 'font-style', 'text-size', 'font-size', 'text-style', 'C'),
(9, 'Html', 'Which of the following is used for Flexbox layout?', 'display: flex;', 'display: grid;', 'display: block;', 'display: inline;', 'A'),
(10, 'Css', 'How do you add a background color in CSS?', 'color-background: red;', 'background: red;', 'background-color: red;', 'bgcolor: red;', 'C'),
(11, 'Javascript', 'Inside which HTML element do we put JavaScript?', '&lt js &gt', '&lt script &gt', '&lt javascript &gt', '&lt code &gt', 'B'),
(12, 'Javascript', 'Which of the following is a correct way to declare a variable?', 'var name;', 'variable name;', 'v name;', 'declare name;', 'A'),
(13, 'Javascript', 'What does document.getElementById() return?', 'An array', 'A string', 'A single HTML element', 'A number', 'C'),
(14, 'Javascript', 'Which operator is used to compare both value and type?', '==', '=', '===', '!=', 'C'),
(15, 'Javascript', 'How do you write a comment in JavaScript?', '&lt  !-- comment -- &gt ', '/* comment */', '// comment', 'Both b and c', 'D'),
(16, 'Php', 'Which symbol is used to start a variable in PHP?', '#', '$', '%', '@', 'B'),
(17, 'Php', 'Which of the following is used to output text in PHP?', 'printf()', 'echo', 'write()', 'display()', 'B'),
(18, 'Php', 'PHP code is enclosed within:', '&lt php &gt  &lt /php &gt', '&lt ?php ? &gt', '&lt script &gt &lt /script &gt', '{php}', 'B'),
(19, 'Php', 'Which superglobal variable is used to collect form data sent with POST method?', '$_GET', '$_FORM', '$_POST', '$_DATA', 'C'),
(20, 'Php', 'Which function is used to connect PHP to a MySQL database?', 'mysqli_connect()', 'mysql_connect()', 'connect_db()', 'db_connect()', 'A'),
(35, 'Mat', 'solve this question : 2+ 2 = ?', '3', '4', '5', '1', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `total_questions` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `percentage` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_name`, `subject`, `total_questions`, `score`, `percentage`, `created_at`) VALUES
(1, 'Purvansh Darji', 'Php', 5, 5, 100, '2025-11-03 08:15:02'),
(2, 'darshan sindhav', 'Php', 5, 5, 100, '2025-11-14 05:24:48'),
(3, 'Darshan Sindhav', 'Php', 5, 4, 80, '2025-11-14 05:33:56'),
(4, 'Raj Patil', 'Php', 5, 4, 80, '2025-11-14 05:55:06'),
(5, 'Raj Patil', 'Html', 6, 6, 100, '2025-11-14 05:55:47'),
(6, 'Raj Gom', 'Mat', 1, 1, 100, '2025-11-14 05:57:18'),
(7, 'tuvor meetrajsinh', 'Mat', 1, 1, 100, '2025-11-14 06:01:35'),
(8, 'tuvor meetrajsinh', 'Css', 4, 2, 50, '2025-11-14 06:01:47'),
(31, 'tuvor meetrajsinh', 'Mat', 1, 1, 100, '2025-11-21 07:10:45'),
(32, 'tuvor meetrajsinh', 'Php', 5, 4, 80, '2025-11-21 07:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `studentss`
--

CREATE TABLE `studentss` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Man','Female','Other') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentss`
--

INSERT INTO `studentss` (`id`, `fullname`, `username`, `email`, `password`, `gender`, `created_at`, `photo`) VALUES
(6, 'Purvansh Darji', 'Purvansh_darji', 'purvanshdarji123@gmail.com', '$2y$10$ZJ76lNcQOMeZixRtAI.k9euvW5K23jkDjEFX/9PGwUU/OjFnLOIci', 'Man', '2025-11-14 04:20:27', '1763097513_download (2).jpg'),
(7, 'Darshan Sindhav', 'darshan01', 'darshan123@gmail.com', '$2y$10$kCQszOyjFcKtGwF5kpAoP.gB4kkmnsOmSYTpx5H/p0wpyMDQiafXW', 'Man', '2025-11-14 05:24:23', '1763097924_download.jpg'),
(8, 'tuvor meetrajsinh', 'meetrajsinh7568', 'tuvormeet@gmail.com', '$2y$10$7ngdCdE2ktfCqihxesLiYuDlvUzsWDgpcLPrOJ4Tk0YmFALcOQbEy', 'Man', '2025-11-14 05:28:27', '1763098173_download.jpg'),
(9, 'Raj Gom', 'Raj123', 'raj123@gmil.com', '$2y$10$Sv.I6IDLiYmOw.3e/R4C.uQxUIiClFN/1Nn9L0tl4fwfqiV3r6L4q', 'Man', '2025-11-14 05:53:31', '1763099663_download (1).jpg'),
(10, 'Meet', 'meet', 'meet@gmail.com', '$2y$10$mkECQn4J0QlYUY9dVkcoXeuRgYhrZ9e2py1rLTRkWshJGPw.DOZ0K', 'Female', '2025-11-20 04:30:23', '1763708512_download (2).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentss`
--
ALTER TABLE `studentss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `studentss`
--
ALTER TABLE `studentss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
