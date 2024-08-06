-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 أغسطس 2024 الساعة 14:56
-- إصدار الخادم: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins_table`
--

CREATE TABLE `admins_table` (
  `admin_id` int(5) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `admins_table`
--

INSERT INTO `admins_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(124, 'mazen', 'mazensalu671@gmail.com', '123'),
(126, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- بنية الجدول `booking_table`
--

CREATE TABLE `booking_table` (
  `booking_id` int(12) NOT NULL,
  `office_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `services_name` varchar(100) NOT NULL,
  `service_price` varchar(50) NOT NULL,
  `service_notes` text NOT NULL,
  `customer_fullname` varchar(100) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `booking_date` varchar(65) NOT NULL,
  `passport_image` text NOT NULL,
  `payment_image` text NOT NULL,
  `booking_notes` text NOT NULL,
  `payment_methode` varchar(55) NOT NULL,
  `office_phone` varchar(18) NOT NULL,
  `statues` varchar(30) NOT NULL,
  `date_ofbooking` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `booking_table`
--

INSERT INTO `booking_table` (`booking_id`, `office_id`, `user_id`, `services_name`, `service_price`, `service_notes`, `customer_fullname`, `customer_phone`, `booking_date`, `passport_image`, `payment_image`, `booking_notes`, `payment_methode`, `office_phone`, `statues`, `date_ofbooking`) VALUES
(3, 0, 0, 'تذكرة سفر', '20', 'لا يوجد', 'مازن صالح المدخحي', '2255', '25', '', '', 'لا يوجد', 'حولة', '32', '2', '2024-05-28 23:13:34'),
(4, 3, 5, 'تذاكر', '20', 'لا', 'مازن صالح المدحجي', '22', '25', '', '', 'لا', 'حولة', '32', '2', '2024-05-29 13:49:35');

-- --------------------------------------------------------

--
-- بنية الجدول `confirm_booking`
--

CREATE TABLE `confirm_booking` (
  `confirm_id` int(12) NOT NULL,
  `response_booking` varchar(200) NOT NULL,
  `confirm_image` varchar(255) NOT NULL,
  `confirm_bookingid` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `confirm_booking`
--

INSERT INTO `confirm_booking` (`confirm_id`, `response_booking`, `confirm_image`, `confirm_bookingid`) VALUES
(7, 'done', 'pic-6.png', 4),
(8, 'تم الحجز', 'pic-6.png', 4);

-- --------------------------------------------------------

--
-- بنية الجدول `feature_table`
--

CREATE TABLE `feature_table` (
  `feature_id` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `service_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `feature_table`
--

INSERT INTO `feature_table` (`feature_id`, `user_id`, `service_id`) VALUES
(11, 0, 0),
(13, 0, 0),
(14, 0, 0),
(15, 0, 0),
(17, 0, 0),
(18, 12, 3),
(19, 12, 1),
(20, 12, 7),
(21, 12, 5),
(22, 12, 6),
(24, 12, 4);

-- --------------------------------------------------------

--
-- بنية الجدول `offices`
--

CREATE TABLE `offices` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(65) NOT NULL,
  `office_secondname` varchar(85) NOT NULL,
  `office_location` varchar(100) NOT NULL,
  `office_image` varchar(255) NOT NULL,
  `bank_account` varchar(80) NOT NULL,
  `office_rate` double NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `office_type` varchar(20) NOT NULL,
  `office_state` varchar(15) NOT NULL DEFAULT '1',
  `offowner_office` int(6) NOT NULL,
  `office_details` varchar(150) NOT NULL,
  `phone_number` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `offices`
--

INSERT INTO `offices` (`office_id`, `office_name`, `office_secondname`, `office_location`, `office_image`, `bank_account`, `office_rate`, `date_create`, `office_type`, `office_state`, `offowner_office`, `office_details`, `phone_number`) VALUES
(3, 'شركة البركة للنقل الدولي', 'البركة للنقل الدولي', 'الستين-أمام البراق لطب العيون', 'boff.jpg', 'حساب كريمي: 1201780', 4.2, '2024-05-25 14:06:14', 'نقل بري', 'مفتوح', 1, 'ترخيص رقم 9#', 0),
(4, 'مجموعة العنقزي الدولية للسفريات والسياحة', 'العنقزي الدولية للسفريات والسياحة', 'الستين-أمام فندق أبراج النيل', 'off1.jpg', 'حساب النجم: 2542980', 4.3, '2024-05-20 16:12:29', 'خدمات عامة', 'مفتوح', 2, 'ترخيص رقم4 #', 0),
(7, 'نجمة الأفضل للنقل الدولي', 'نجمة الأفضل للنقل الدولي', 'الستين-أمام', 'off3.jpg', 'حساب ون كاش: 60532489', 3.5, '2024-05-20 16:15:00', 'نقل بري', 'مفتوح', 4, 'ترخيص رقم 11#', 0),
(8, 'فور يو للسفريات والسياحة', 'فور يو للسفريات والسياحة', 'الستين-جوار مجمع الشيعاني', 'fouroff.jpg', 'حساب محفظتي: 4015623', 3.7, '2024-05-25 14:06:14', 'تذاكر طيران', 'مفتوح', 5, 'ترخيص رقم 14#', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `office_offers`
--

CREATE TABLE `office_offers` (
  `offer_id` int(11) NOT NULL,
  `offer_image` varchar(255) NOT NULL,
  `isavailable` tinyint(2) NOT NULL DEFAULT 1,
  `offer_office` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `office_offers`
--

INSERT INTO `office_offers` (`offer_id`, `offer_image`, `isavailable`, `offer_office`) VALUES
(1, 'boffer1.jpg', 1, 4),
(2, 'aoffer1.jpg', 1, 3),
(3, 'foffer1.jpg', 1, 3),
(4, 'roffer1.jpg', 1, 4);

-- --------------------------------------------------------

--
-- بنية الجدول `office_owner`
--

CREATE TABLE `office_owner` (
  `officeowner_id` int(11) NOT NULL,
  `officeowner_name` varchar(50) NOT NULL,
  `officeowner_username` varchar(50) NOT NULL,
  `officeowner_password` varchar(25) NOT NULL,
  `isactive` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `office_owner`
--

INSERT INTO `office_owner` (`officeowner_id`, `officeowner_name`, `officeowner_username`, `officeowner_password`, `isactive`) VALUES
(1, 'al_barakah', 'abc', '12345', 1),
(2, 'al_angzi', 'angzi', '1010', 1),
(3, 'rahatk', 'rahatk', '2020', 1),
(4, 'najmat_alafdal', 'najmat', '3030', 1),
(5, 'fouryou', 'fouryou', '4045', 1),
(6, 'al_motasader', 'al_motasader', '2023', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `rates`
--

CREATE TABLE `rates` (
  `rate_id` int(6) NOT NULL,
  `rate_office` int(6) NOT NULL,
  `rate_user` int(6) NOT NULL,
  `rate` double NOT NULL DEFAULT 0,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `rates`
--

INSERT INTO `rates` (`rate_id`, `rate_office`, `rate_user`, `rate`, `comment`) VALUES
(1, 3, 12, 4.5, 'good office'),
(2, 4, 10, 4.599999904632568, 'excellant'),
(3, 3, 9, 4.699999809265137, 'hhhh'),
(4, 3, 8, 4.5, 'jjjj'),
(5, 4, 10, 4.300000190734863, 'kk'),
(6, 3, 12, 5, 'good'),
(7, 3, 9, 4.900000095367432, 'perfect'),
(8, 4, 11, 5, 'well'),
(9, 4, 8, 4.800000190734863, 'wow'),
(11, 3, 3, 3, 'auful'),
(12, 4, 3, 3, 'half ok'),
(14, 8, 14, 3, 'good'),
(15, 7, 12, 4, 'wonderful'),
(16, 8, 12, 4, ''),
(17, 7, 12, 3, ''),
(18, 3, 12, 4, ''),
(20, 8, 12, 4, ''),
(21, 3, 12, 4, ''),
(22, 3, 12, 3, '');

-- --------------------------------------------------------

--
-- بنية الجدول `services_table`
--

CREATE TABLE `services_table` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(65) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `service_current_price` varchar(35) NOT NULL,
  `service_new_price` float NOT NULL,
  `service_notes` text NOT NULL,
  `isavailable` tinyint(4) NOT NULL DEFAULT 1,
  `service_type` varchar(15) NOT NULL,
  `service_office` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `services_table`
--

INSERT INTO `services_table` (`service_id`, `service_name`, `service_image`, `service_current_price`, `service_new_price`, `service_notes`, `isavailable`, `service_type`, `service_office`) VALUES
(1, 'تأشيرة عمرة لمدة ثلاثة أشهر', 'aservice1.jpg', '600 ريال سعودي', 0, 'يجب احضار ضمانة تجارية', 1, 'عمرة', 4),
(2, 'Visa for Education', 'fservice1.jpg', '850 دولار', 0, 'يجب احضار شهادة الثانوية العامة', 1, 'فيز', 8),
(5, 'تذاكر سفر الى جدة', 'nservice1.jpg', '350 ريال سعودي', 0, 'احضار الجواز ساري المفعول', 1, 'تذاكر سفر', 7),
(6, 'تأشيرة عبور الى عمان', 'aservice3.jpg', '650 ريال سعودي', 0, 'احضار ضمانة تجارية', 1, 'تأشيرات', 4),
(10, 'SA', 'pic-2.png', '20', 20, 'AZA', 1, 'A', 3),
(12, 'SA', 'pic-3.png', '20', 20, 'AZA', 1, 'aa', 3);

-- --------------------------------------------------------

--
-- بنية الجدول `service_requirements`
--

CREATE TABLE `service_requirements` (
  `service_req_id` int(10) NOT NULL,
  `service_req_name` varchar(55) NOT NULL,
  `service_req_type` varchar(35) NOT NULL,
  `ser_req_service` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` text NOT NULL,
  `user_verifycode` int(11) NOT NULL DEFAULT 12345,
  `isactive` tinyint(4) NOT NULL DEFAULT 1,
  `create_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `users_table`
--

INSERT INTO `users_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_verifycode`, `isactive`, `create_date`) VALUES
(2, 'idrees', 'isenainah@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 12345, 1, '2024-04-24'),
(3, 'zaim', 'zaim@gmail.com', '199a18cc149d29eeecd63c32bb7a24ae', 12345, 1, '2024-04-24'),
(8, 'basel', 'basel@gmail.com', 'c5fe25896e49ddfe996db7508cf00534', 12345, 1, '2024-04-25'),
(9, 'mazen', 'mazen@gmail.com', 'dcddb75469b4b4875094e14561e573d8', 12345, 1, '2024-04-25'),
(10, 'mhd', 'mhd@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 12345, 1, '2024-04-25'),
(11, 'mzn', 'mzn@gmail.com', 'dcddb75469b4b4875094e14561e573d8', 12345, 1, '2024-04-25'),
(12, 'idreesh', 'idreesh@gmail.com', '83f2550373f2f19492aa30fbd5b57512', 12345, 1, '2024-04-26'),
(14, 'zaim mohammed', 'z@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', 12345, 1, '2024-05-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins_table`
--
ALTER TABLE `admins_table`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `confirm_booking`
--
ALTER TABLE `confirm_booking`
  ADD PRIMARY KEY (`confirm_id`),
  ADD KEY `confirm_bookingid` (`confirm_bookingid`);

--
-- Indexes for table `feature_table`
--
ALTER TABLE `feature_table`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `offowner_office` (`offowner_office`);

--
-- Indexes for table `office_offers`
--
ALTER TABLE `office_offers`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `offer_office` (`offer_office`);

--
-- Indexes for table `office_owner`
--
ALTER TABLE `office_owner`
  ADD PRIMARY KEY (`officeowner_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `rate_office` (`rate_office`),
  ADD KEY `rate_user` (`rate_user`);

--
-- Indexes for table `services_table`
--
ALTER TABLE `services_table`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `service_office` (`service_office`);

--
-- Indexes for table `service_requirements`
--
ALTER TABLE `service_requirements`
  ADD PRIMARY KEY (`service_req_id`),
  ADD KEY `ser_req_service` (`ser_req_service`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins_table`
--
ALTER TABLE `admins_table`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `booking_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `confirm_booking`
--
ALTER TABLE `confirm_booking`
  MODIFY `confirm_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feature_table`
--
ALTER TABLE `feature_table`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `office_offers`
--
ALTER TABLE `office_offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `office_owner`
--
ALTER TABLE `office_owner`
  MODIFY `officeowner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `services_table`
--
ALTER TABLE `services_table`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `service_requirements`
--
ALTER TABLE `service_requirements`
  MODIFY `service_req_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `confirm_booking`
--
ALTER TABLE `confirm_booking`
  ADD CONSTRAINT `confirm_booking_ibfk_1` FOREIGN KEY (`confirm_bookingid`) REFERENCES `booking_table` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `offices_ibfk_1` FOREIGN KEY (`offowner_office`) REFERENCES `office_owner` (`officeowner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `office_offers`
--
ALTER TABLE `office_offers`
  ADD CONSTRAINT `office_offers_ibfk_1` FOREIGN KEY (`offer_office`) REFERENCES `offices` (`office_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`rate_office`) REFERENCES `offices` (`office_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`rate_user`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `services_table`
--
ALTER TABLE `services_table`
  ADD CONSTRAINT `services_table_ibfk_1` FOREIGN KEY (`service_office`) REFERENCES `offices` (`office_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `service_requirements`
--
ALTER TABLE `service_requirements`
  ADD CONSTRAINT `service_requirements_ibfk_1` FOREIGN KEY (`ser_req_service`) REFERENCES `services_table` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
