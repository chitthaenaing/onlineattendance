-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 08:21 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineattendancedatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` varchar(9) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`, `semester_id`, `year`, `start_date`, `end_date`) VALUES
(7, 'Batch-1', 4, 'Second Year', '2017-09-04', '2018-01-28'),
(9, 'Batch-2', 3, 'First Year', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `batchandsubject`
--

CREATE TABLE `batchandsubject` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batchandsubject`
--

INSERT INTO `batchandsubject` (`id`, `batch_id`, `subject_id`) VALUES
(2, 7, 1),
(3, 7, 2),
(4, 7, 3),
(5, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dailyattendance`
--

CREATE TABLE `dailyattendance` (
  `d_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL,
  `time` int(1) NOT NULL,
  `d_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyattendance`
--

INSERT INTO `dailyattendance` (`d_id`, `student_id`, `subject_id`, `day`, `date`, `status`, `time`, `d_remark`) VALUES
(1, 1, 2, 'Tuesday', '2017-10-10', 0, 2, ''),
(2, 2, 2, 'Tuesday', '2017-10-10', 1, 2, ''),
(3, 3, 2, 'Tuesday', '2017-10-10', 1, 2, ''),
(4, 1, 2, 'Tuesday', '2017-10-10', 0, 2, ''),
(5, 2, 2, 'Tuesday', '2017-10-10', 1, 2, ''),
(6, 3, 2, 'Tuesday', '2017-10-10', 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `monthlyattendance`
--

CREATE TABLE `monthlyattendance` (
  `m_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `monthly_percentage` int(3) NOT NULL,
  `m_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`) VALUES
(2, 'Foundation'),
(3, 'First Year First Semester'),
(4, 'First Year Second Semester'),
(5, 'Second Year First Semester'),
(6, 'Second Year Second Semester');

-- --------------------------------------------------------

--
-- Table structure for table `semesterattendance`
--

CREATE TABLE `semesterattendance` (
  `s_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `semester_percentage` int(3) NOT NULL,
  `s_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `batch_id`) VALUES
(1, 'Kyaw Zin Thant', 7),
(2, 'Htet Yatanar Oo', 7),
(3, 'Chit Thae Naing', 7),
(5, 'Aung Ko Ko Oo', 9);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`) VALUES
(1, 'Object Oriented Programming'),
(2, 'Computer System'),
(3, 'Networking Technologies'),
(4, 'Virtualization');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`) VALUES
(1, 'Tin Htoo Zaw'),
(2, 'Hay Mar Lwin');

-- --------------------------------------------------------

--
-- Table structure for table `teacherandbatch`
--

CREATE TABLE `teacherandbatch` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherandbatch`
--

INSERT INTO `teacherandbatch` (`id`, `teacher_id`, `batch_id`) VALUES
(1, 1, 7),
(2, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `teacherandsubject`
--

CREATE TABLE `teacherandsubject` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherandsubject`
--

INSERT INTO `teacherandsubject` (`id`, `teacher_id`, `subject_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `t_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`t_id`, `batch_id`, `day`, `subject_id`, `time`) VALUES
(1, 7, 'Monday', 1, 1),
(2, 7, 'Tuesday', 1, 2),
(3, 7, 'Monday', 2, 1),
(4, 7, 'Monday', 2, 2),
(5, 7, 'Monday', 1, 3),
(6, 7, 'Tuesday', 1, 1),
(7, 7, 'Tuesday', 1, 2),
(8, 7, 'Tuesday', 1, 3),
(9, 7, 'Wednesday', 2, 1),
(10, 7, 'Wednesday', 4, 2),
(11, 7, 'Wednesday', 3, 3),
(12, 7, 'Thursday', 4, 1),
(13, 7, 'Thursday', 1, 2),
(14, 7, 'Thursday', 1, 3),
(15, 7, 'Friday', 4, 1),
(16, 7, 'Friday', 1, 2),
(17, 7, 'Friday', 2, 3),
(18, 7, 'Monday', 2, 1),
(19, 7, 'Monday', 1, 2),
(20, 7, 'Monday', 2, 3),
(21, 7, 'Tuesday', 2, 1),
(22, 7, 'Tuesday', 2, 2),
(23, 7, 'Tuesday', 4, 3),
(24, 7, 'Wednesday', 3, 1),
(25, 7, 'Wednesday', 4, 2),
(26, 7, 'Wednesday', 1, 3),
(27, 7, 'Thursday', 1, 1),
(28, 7, 'Thursday', 2, 2),
(29, 7, 'Thursday', 3, 3),
(30, 7, 'Friday', 3, 1),
(31, 7, 'Friday', 1, 2),
(32, 7, 'Friday', 4, 3),
(33, 7, 'Wednesday', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`account_id`, `username`, `password`, `type`, `created_date`, `modified_date`) VALUES
(2, 'chitthaenaing', '7815696ecbf1c96e6894b779456d330e', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'kyawzinthant', '7815696ecbf1c96e6894b779456d330e', 'admin', '2017-09-30 01:45:58', '0000-00-00 00:00:00'),
(4, 'aungko', '7815696ecbf1c96e6894b779456d330e', 'teacher', '2017-09-30 02:10:06', '2017-10-06 20:46:48'),
(5, 'htethtet', '7815696ecbf1c96e6894b779456d330e', 'teacher', '2017-09-30 02:16:44', '0000-00-00 00:00:00'),
(6, 'swegyi', '7815696ecbf1c96e6894b779456d330e', 'teacher', '2017-09-30 02:17:17', '0000-00-00 00:00:00'),
(10, 'myo htet kyaw', '7815696ecbf1c96e6894b779456d330e', 'admin', '2017-10-06 20:27:11', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `batchandsubject`
--
ALTER TABLE `batchandsubject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `dailyattendance`
--
ALTER TABLE `dailyattendance`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `monthlyattendance`
--
ALTER TABLE `monthlyattendance`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `semesterattendance`
--
ALTER TABLE `semesterattendance`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacherandbatch`
--
ALTER TABLE `teacherandbatch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacherandsubject`
--
ALTER TABLE `teacherandsubject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `batchandsubject`
--
ALTER TABLE `batchandsubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dailyattendance`
--
ALTER TABLE `dailyattendance`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `monthlyattendance`
--
ALTER TABLE `monthlyattendance`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `semesterattendance`
--
ALTER TABLE `semesterattendance`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teacherandbatch`
--
ALTER TABLE `teacherandbatch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teacherandsubject`
--
ALTER TABLE `teacherandsubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`);

--
-- Constraints for table `batchandsubject`
--
ALTER TABLE `batchandsubject`
  ADD CONSTRAINT `batchandsubject_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `batchandsubject_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `monthlyattendance`
--
ALTER TABLE `monthlyattendance`
  ADD CONSTRAINT `monthlyattendance_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `monthlyattendance_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `semesterattendance`
--
ALTER TABLE `semesterattendance`
  ADD CONSTRAINT `semesterattendance_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `semesterattendance_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `semesterattendance_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `teacherandbatch`
--
ALTER TABLE `teacherandbatch`
  ADD CONSTRAINT `teacherandbatch_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `teacherandbatch_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `teacherandsubject`
--
ALTER TABLE `teacherandsubject`
  ADD CONSTRAINT `teacherandsubject_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `teacherandsubject_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
