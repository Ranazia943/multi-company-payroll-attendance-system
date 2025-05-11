-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
--
-- Database: `payroll`
--
CREATE DATABASE IF NOT EXISTS `payroll` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `payroll`;

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE `allowances` (
  `id` int(11) NOT NULL,
  `allowance` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allowances`
--

INSERT INTO `allowances` (`id`, `allowance`, `description`) VALUES
(1, 'Sample', 'Sample Allowance'),
(2, 'Phone', 'Phone Allowance'),
(4, 'House', 'House Allowance'),
(5, 'Marriage', 'Marriage ceremony');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `log_type` tinyint(1) NOT NULL COMMENT '1 = AM IN,2 = AM out, 3= PM IN, 4= PM out\r\n',
  `datetime_log` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `log_type`, `datetime_log`, `date_updated`, `company_id`) VALUES
(190, 10, 1, '2022-10-12 21:00:00', '2022-10-13 10:39:00', 1),
(191, 10, 4, '2022-10-12 22:00:00', '2022-10-13 10:39:00', 1),
(193, 10, 1, '2022-10-13 04:00:00', '2022-10-13 12:50:04', 1),
(194, 10, 1, '2022-10-14 00:50:00', '2022-10-13 12:50:26', 1),
(195, 10, 1, '2022-10-15 00:50:00', '2022-10-13 12:50:54', 1),
(196, 10, 1, '2022-10-16 04:00:00', '2022-10-13 12:54:34', 1),
(197, 10, 1, '2022-10-17 00:51:00', '2022-10-13 12:54:34', 1),
(198, 10, 1, '2022-10-18 04:00:00', '2022-10-13 12:54:34', 1),
(199, 10, 1, '2022-10-19 14:00:00', '2022-10-13 12:54:34', 1),
(200, 10, 1, '2022-10-20 13:00:00', '2022-10-13 12:54:34', 1),
(201, 10, 1, '2022-10-23 05:00:00', '2022-10-13 12:54:34', 1),
(202, 10, 1, '2022-11-24 00:53:00', '2022-10-13 12:54:34', 1),
(203, 10, 1, '2022-10-25 06:00:00', '2022-10-13 12:54:35', 1),
(204, 10, 1, '2022-10-26 00:53:00', '2022-10-13 12:54:35', 1),
(205, 10, 1, '2022-10-27 00:54:00', '2022-10-13 12:54:35', 1),
(206, 10, 1, '2022-11-28 05:00:00', '2022-10-13 12:54:35', 1),
(207, 17, 1, '2022-10-13 10:00:00', '2022-10-13 14:34:52', 1),
(208, 17, 1, '2022-10-14 09:00:00', '2022-10-13 14:34:52', 1),
(209, 17, 1, '2022-10-15 09:00:00', '2022-10-13 14:34:53', 1),
(210, 17, 1, '2022-10-22 07:00:00', '2022-10-13 14:34:53', 1),
(211, 52, 1, '2022-10-13 07:00:00', '2022-10-13 14:39:44', 3),
(212, 10, 1, '2022-10-24 11:00:00', '2022-10-13 18:00:49', 1),
(213, 10, 1, '2022-10-16 06:00:00', '2022-10-13 18:00:49', 1),
(214, 17, 1, '2022-10-16 10:00:00', '2022-10-16 19:27:24', 2),
(215, 55, 1, '2022-10-16 15:00:00', '2022-10-16 22:31:20', 1),
(216, 17, 1, '2022-10-20 01:37:00', '2022-10-17 13:37:24', 1),
(217, 17, 1, '1970-01-01 05:00:00', '2022-10-17 13:37:24', 1),
(218, 55, 1, '2022-10-20 01:38:00', '2022-10-17 13:38:56', 1),
(219, 55, 1, '2022-11-17 06:00:00', '2022-10-17 13:38:56', 1),
(220, 55, 1, '2022-01-21 06:00:00', '2022-10-17 13:39:28', 1),
(221, 17, 1, '2022-11-17 05:00:00', '2022-10-17 13:40:12', 1),
(222, 17, 1, '2022-01-19 06:00:00', '2022-10-17 13:40:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `place` int(11) NOT NULL DEFAULT 2,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `password`, `company`, `status`, `place`, `phone`) VALUES
(1, 'Sohail Ali', 'adamjee@gmail.com', 'adamjee', 'Adamjee Insurance', 1, 10, '066-64543434-4'),
(2, 'Ali Rehman', 'altern@gmail.com', 'altern', 'Altern Energy Ltd.\r\n', 2, 10, '066-43454345-4'),
(3, 'Kamran Shafi ', 'light@gmail.com', 'light', 'Limelight.', 3, 10, '066-43454345-4');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(11) NOT NULL,
  `deduction` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `deduction`, `description`) VALUES
(1, 'Cash Advance', 'Cash Advance');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `company_id`) VALUES
(1, 'IT Department', 1),
(9, 'Social Media Marketing', 2),
(11, 'Corporate Owner', 3);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `salary` double NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `company_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `finger` varchar(20) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `phone_p` int(11) NOT NULL,
  `phone_e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_no`, `firstname`, `lastname`, `email`, `password`, `department_id`, `position_id`, `salary`, `role`, `company_id`, `photo`, `finger`, `address`, `phone_p`, `phone_e`) VALUES
(10, '2022-4951', 'khan', 'Hamza', 'admin@gmail.com', 'admin', 1, 6, 10000, 2, 1, '', '', '', 0, 0),
(17, '2022-5601', 'Asad', 'Ali', 'Imran@gmail.com', '123', 1, 8, 34000, 2, 1, '', '', '', 0, 0),
(37, '2022-5632', 'Omer ', 'Hayat', 'omer@gmail.com', 'omer', 1, 11, 34000, 2, 1, '', '', '', 0, 0),
(42, '2022-6199', 'Suriya', 'Hayat', 'suriya@gmail.com', '123', 1, 8, 7800, 2, 1, '', '23,32', '', 0, 0),
(43, '2022-1197', 'Areeba', 'Dua', 'areeba@gmail.com', '123', 1, 8, 23000, 2, 2, '', '2,3', '', 0, 0),
(44, '2022-1514', 'Faryal', 'Asam', 'faryal@gmail.com', '123', 1, 8, 34000, 2, 2, '', '23,23', '', 0, 0),
(46, '2022-6211', 'adil', 'hayat', 'adil@gmail.com', 'adil', 1, 8, 23199, 2, 2, '', '323,', '', 0, 0),
(47, '2022-3102', 'Rana', 'Zia', 'altern@gmail.com', 'altern', 1, 11, 1200067, 2, 2, '', '12', '', 0, 0),
(54, '2022-2733', 'Usman', 'Ali ', 'usman@gmail.com', 'usman', 1, 5, 50000, 2, 1, '', '23', '', 0, 0),
(55, '2022-1334', 'Niku', 'Bhai', 'niku@gmail.com', 'niku', 1, 6, 20000, 2, 1, '', '34', '', 0, 0),
(56, '2022-156', 'ali', 'raza', 'allrounder', '7ujm&5tgb%', 1, 5, 340000, 2, 1, '', '23', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_allowances`
--

CREATE TABLE `employee_allowances` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `allowance_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = Monthly, 2= Semi-Montly, 3 = once',
  `amount` float NOT NULL,
  `effective_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_allowances`
--

INSERT INTO `employee_allowances` (`id`, `employee_id`, `allowance_id`, `type`, `amount`, `effective_date`, `date_created`) VALUES
(1, 9, 4, 1, 1000, '0000-00-00', '2020-09-29 11:20:04'),
(3, 9, 3, 2, 300, '0000-00-00', '2020-09-29 11:37:31'),
(5, 9, 1, 3, 1000, '2020-09-16', '2020-09-29 11:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `employee_deductions`
--

CREATE TABLE `employee_deductions` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `deduction_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = Monthly, 2= Semi-Montly, 3 = once',
  `amount` float NOT NULL,
  `effective_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_deductions`
--

INSERT INTO `employee_deductions` (`id`, `employee_id`, `deduction_id`, `type`, `amount`, `effective_date`, `date_created`) VALUES
(2, 9, 3, 2, 500, '0000-00-00', '2020-09-29 11:52:46'),
(3, 9, 1, 3, 1500, '2020-09-16', '2020-09-29 11:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(100) NOT NULL,
  `date_apply` date NOT NULL,
  `date_leave` date NOT NULL,
  `leave_status` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_leave`
--

INSERT INTO `employee_leave` (`id`, `employee_no`, `date_apply`, `date_leave`, `leave_status`, `message`, `company_id`) VALUES
(177, '2022-3102', '2022-10-06', '2022-10-07', '1', 'hello', 2),
(181, '2022-6623', '2022-10-13', '2022-10-19', '2', 'Urgent work ', 1),
(182, '2022-2733', '2022-10-18', '2022-10-18', '2', 'TEST', 1),
(184, '2022-1334', '2022-10-17', '2022-10-20', '2', 'Urgent work ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int(11) NOT NULL,
  `leave_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `leave_type`) VALUES
(1, 'Earned'),
(2, 'Sick\r\n'),
(3, 'Casual\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `ref_no` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = monthly ,2 semi-monthly',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 =New,1 = computed',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `ref_no`, `date_from`, `date_to`, `type`, `status`, `date_created`) VALUES
(1, '2020-3543', '2020-09-16', '2020-09-30', 2, 1, '2020-09-29 15:04:13'),
(2, '2022-4033', '2022-10-03', '2022-10-03', 1, 1, '2022-10-03 13:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_items`
--

CREATE TABLE `payroll_items` (
  `id` int(11) NOT NULL,
  `payroll_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `present` int(11) NOT NULL,
  `absent` int(11) NOT NULL,
  `late` text NOT NULL,
  `salary` double NOT NULL,
  `allowance_amount` double NOT NULL,
  `allowances` text NOT NULL,
  `deduction_amount` double NOT NULL,
  `deductions` text NOT NULL,
  `net` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll_items`
--

INSERT INTO `payroll_items` (`id`, `payroll_id`, `employee_id`, `present`, `absent`, `late`, `salary`, `allowance_amount`, `allowances`, `deduction_amount`, `deductions`, `net`, `date_created`) VALUES
(10, 1, 9, 1, 10, '0', 30000, 1300, '[{\"aid\":\"3\",\"amount\":\"300\"},{\"aid\":\"1\",\"amount\":\"1000\"}]', 2000, '[{\"did\":\"3\",\"amount\":\"500\"},{\"did\":\"1\",\"amount\":\"1500\"}]', 664, '2020-09-29 18:46:59'),
(11, 2, 10, 0, 22, '0', 10000, 0, '[]', 0, '[]', 0, '2022-10-03 17:31:23'),
(12, 2, 12, 0, 22, '0', 10000, 0, '[]', 0, '[]', 0, '2022-10-03 17:31:23'),
(13, 2, 17, 0, 22, '0', 34000, 0, '[]', 0, '[]', 0, '2022-10-03 17:31:23'),
(14, 2, 36, 0, 22, '0', 34300, 0, '[]', 0, '[]', 0, '2022-10-03 17:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `department_id`, `name`, `company_id`) VALUES
(1, 1, 'Programmer', 1),
(5, 1, 'Developer', 1),
(6, 1, 'Graphic Designer', 1),
(8, 1, 'Excel Expert', 1),
(11, 1, 'Fresh Grapher', 1),
(18, 9, 'Manager', 2),
(19, 11, 'Manager', 3),
(20, 11, 'Assistant Manager', 3);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(1, '07:00:00', '16:00:00'),
(2, '08:00:00', '17:00:00'),
(3, '09:00:00', '18:00:00'),
(4, '10:00:00', '19:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_allowances`
--
ALTER TABLE `employee_allowances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_deductions`
--
ALTER TABLE `employee_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_items`
--
ALTER TABLE `payroll_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `employee_allowances`
--
ALTER TABLE `employee_allowances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_deductions`
--
ALTER TABLE `employee_deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payroll_items`
--
ALTER TABLE `payroll_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
