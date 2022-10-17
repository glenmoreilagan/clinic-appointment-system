-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_lj_clinic
DROP DATABASE IF EXISTS `db_lj_clinic`;
CREATE DATABASE IF NOT EXISTS `db_lj_clinic` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_lj_clinic`;

-- Dumping structure for table db_lj_clinic.tbl_announcements
DROP TABLE IF EXISTS `tbl_announcements`;
CREATE TABLE IF NOT EXISTS `tbl_announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `effectivity_date` date DEFAULT NULL,
  `is_deleted` int(1) DEFAULT 0 COMMENT '0 for not deleted 1 for deleted',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_announcements: ~22 rows (approximately)
INSERT INTO `tbl_announcements` (`id`, `title`, `description`, `effectivity_date`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 'TITLE', 'DESCRIPTION', '2022-09-01', 0, '2022-08-20 21:04:35', '2022-09-01 23:03:24'),
	(2, 'SARADO', 'SA LINGGO', '2022-09-01', 0, '2022-07-20 21:16:07', '2022-09-01 23:03:25'),
	(3, 'NEW ANNOUNCEMENT', 'WALANG PASOK BUKAS', '2022-09-01', 0, '2022-08-20 21:28:48', '2022-09-01 23:44:03'),
	(4, 'SARADO', 'SA LINGGO', '2022-09-01', 0, '2022-07-20 21:16:07', '2022-09-01 23:03:26'),
	(5, 'qwe', 'qwe', '2022-09-01', 1, '2022-08-20 21:28:48', '2022-09-01 23:48:45'),
	(6, 'TITLE', 'DESCRIPTION', '2022-09-01', 0, '2022-08-20 21:04:35', '2022-09-01 23:03:27'),
	(7, 'qwe', 'qwe', '2022-09-01', 0, '2022-08-20 21:28:48', '2022-09-01 23:03:27'),
	(8, 'qwe', 'qwe', '2022-09-01', 0, '2022-08-20 21:28:48', '2022-09-01 23:03:28'),
	(9, 'qwe', 'qwe', NULL, 1, '2022-08-20 21:28:48', '2022-09-01 23:49:26'),
	(10, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(11, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(12, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(13, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(14, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(15, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(16, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(17, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(18, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(19, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(20, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(21, 'qwe', 'qwe', NULL, 0, '2022-08-20 21:28:48', NULL),
	(22, 'KC', 'BAGYO NA MALAKAS', '2022-09-02', 0, '2022-09-01 23:43:22', NULL);

-- Dumping structure for table db_lj_clinic.tbl_appointments
DROP TABLE IF EXISTS `tbl_appointments`;
CREATE TABLE IF NOT EXISTS `tbl_appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT 0,
  `complaint` varchar(50) DEFAULT NULL,
  `date_schedule` datetime DEFAULT NULL,
  `age` int(3) DEFAULT 0,
  `service_id` int(2) DEFAULT 0,
  `status` int(1) DEFAULT 0 COMMENT '0 for pending 1 for approve',
  `remarks` varchar(100) DEFAULT NULL,
  `is_completed` int(1) DEFAULT 0,
  `is_cancelled` int(1) DEFAULT 0 COMMENT '1 is for cancelled',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_appointments: ~28 rows (approximately)
INSERT INTO `tbl_appointments` (`id`, `user_id`, `complaint`, `date_schedule`, `age`, `service_id`, `status`, `remarks`, `is_completed`, `is_cancelled`, `created_at`, `updated_at`) VALUES
	(1, 1, 'RED', '2021-09-25 21:35:00', 14, 9, 1, NULL, 0, 0, '2022-08-18 21:43:55', '2022-10-03 17:09:45'),
	(2, 1, 'BLUE', '2022-01-02 21:46:01', 44, 0, 0, NULL, 0, 1, '2022-08-18 21:46:04', '2022-09-17 23:02:20'),
	(3, 3, 'GREEN', '2022-03-03 00:00:00', 22, 0, 0, NULL, 0, 1, '2022-08-18 22:36:05', '2022-09-17 23:02:52'),
	(4, 4, 'GG', '2022-04-05 00:00:00', 22, 7, 0, 'qwewqe', 0, 1, '2022-08-18 22:36:36', '2022-09-17 23:02:55'),
	(10, 1, '', '2022-01-01 00:00:00', 0, 0, 0, NULL, 0, 1, '2022-08-18 23:00:29', '2022-09-17 23:02:21'),
	(11, 1, '', '2022-02-01 00:00:00', 0, 0, 0, 'we', 0, 1, '2022-08-18 23:00:31', '2022-09-17 23:02:49'),
	(12, 2, '', '2022-01-01 01:00:00', 0, 0, 1, NULL, 0, 0, '2022-08-18 23:00:35', '2022-09-17 23:02:41'),
	(13, 5, 'BEFORE END', '2022-08-19 05:20:00', 22, 3, 1, 'DI PWEDE', 0, 0, '2022-08-19 23:20:59', '2022-09-17 23:02:25'),
	(14, 4, 'SOSAD', '2022-08-19 17:29:00', 12, 8, 1, 'REJECTED', 0, 0, '2022-08-19 23:23:33', '2022-09-17 23:02:25'),
	(16, 1, 'SASA123', '2022-08-19 23:30:00', 12, 0, 1, NULL, 0, 0, '2022-08-19 23:26:29', '2022-09-17 23:02:26'),
	(17, 1, 'SIGE NGA', '2022-08-02 06:39:00', 123, 8, 1, NULL, 0, 0, '2022-08-20 00:39:37', '2022-09-17 23:02:26'),
	(18, 9, 'sad', '2022-08-04 00:00:00', 44, 8, 1, 'wag', 0, 0, '2022-08-20 00:41:46', '2022-09-17 23:02:27'),
	(19, 3, 'ATAY', '2022-08-09 05:51:00', 22, 3, 1, NULL, 0, 0, '2022-08-20 00:51:50', '2022-09-17 23:02:30'),
	(21, 1, 'qw', '2022-08-03 17:28:00', 14, 0, 0, 'wew', 0, 1, '2022-08-21 17:24:03', '2022-09-17 23:03:02'),
	(22, 7, 'tqwe', '2022-08-03 13:16:00', 22, 0, 0, NULL, 0, 1, '2022-08-23 16:37:35', '2022-09-17 23:03:02'),
	(23, 1, '', '2022-08-23 11:30:00', 0, 0, 0, 'WEW', 0, 1, '2022-08-23 16:39:50', '2022-09-17 23:03:03'),
	(24, 1, 'TEST', '2022-09-25 13:00:00', 14, 6, 0, NULL, 0, 1, '2022-08-23 22:58:32', '2022-10-03 17:10:34'),
	(25, 1, '', '2022-03-01 11:00:00', 0, 0, 0, 'qwe', 0, 1, '2022-08-23 23:28:48', '2022-09-17 23:03:35'),
	(26, 1, 'NEW', '2022-08-05 13:00:00', 12, 0, 1, NULL, 0, 0, '2022-08-23 23:52:40', '2022-09-17 23:03:08'),
	(27, 1, 'WQEQWE', '2022-09-09 13:00:00', 123, 0, 1, NULL, 0, 0, '2022-08-23 23:58:26', '2022-09-17 23:03:09'),
	(28, 1, 'MY COM', '2022-02-24 11:00:00', 12, 0, 1, 'TEST', 0, 0, '2022-08-24 00:02:33', '2022-09-17 23:03:24'),
	(29, 1, 'TEST COMPLAINT', '2022-02-24 11:30:00', 14, 8, 1, NULL, 0, 0, '2022-08-27 15:06:56', '2022-09-17 23:03:28'),
	(30, 1, 'WQE', '2022-08-23 11:45:00', 12, 6, 1, NULL, 0, 0, '2022-08-27 15:15:53', '2022-09-17 23:03:11'),
	(31, 2, 'QWEWQEW', '2022-08-27 23:35:12', 44, 6, 0, NULL, 0, 0, '2022-08-27 23:35:05', '2022-09-14 21:51:42'),
	(32, 2, 'qwe', '2022-09-01 09:40:00', 12, 3, 0, 'WEW', 0, 0, '2022-09-01 22:09:04', '2022-09-14 21:51:39'),
	(33, 1, 'TEST', '2022-09-04 09:00:00', 12, 5, 0, NULL, 0, 0, '2022-09-04 21:14:24', '2022-09-14 21:51:54'),
	(34, 10, 'TESTWAW', '2022-09-09 10:40:00', 22, 2, 1, NULL, 0, 0, '2022-09-09 21:46:49', '2022-10-03 21:35:32'),
	(36, 1, 'TEST COMPLAINT', '2022-09-11 12:00:00', 21, 7, 1, NULL, 0, 0, '2022-09-11 00:04:39', '2022-09-18 00:36:14'),
	(37, 2, 'Test Complaint', '2022-09-16 10:00:00', 12, 5, 1, 'wew', 0, 0, '2022-09-16 21:22:17', '2022-09-17 22:24:59'),
	(38, 1, 'WEW', '2022-10-03 08:30:00', 22, 9, 1, NULL, 1, 0, '2022-09-22 16:22:53', '2022-10-17 21:11:17'),
	(39, 1, 'NWEWW', '2022-10-03 10:30:00', 22, 4, 1, NULL, 1, 0, '2022-09-25 21:30:10', '2022-10-03 21:49:37');

-- Dumping structure for table db_lj_clinic.tbl_appointment_availability
DROP TABLE IF EXISTS `tbl_appointment_availability`;
CREATE TABLE IF NOT EXISTS `tbl_appointment_availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `services` varchar(50) DEFAULT NULL,
  `amount` double(10,2) DEFAULT 0.00,
  `date_available` datetime DEFAULT current_timestamp(),
  `is_deleted` int(1) DEFAULT 0 COMMENT '0 is not delete 1 is for delete',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_appointment_availability: ~11 rows (approximately)
INSERT INTO `tbl_appointment_availability` (`id`, `services`, `amount`, `date_available`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, '', 0.00, '2022-08-24 11:15:33', 0, '2022-08-23 16:31:43', NULL),
	(2, NULL, 0.00, '2022-08-24 11:30:09', 0, '2022-08-23 16:57:16', NULL),
	(3, NULL, 0.00, '2022-08-23 11:45:00', 1, '2022-08-23 16:57:31', '2022-09-01 22:34:38'),
	(4, NULL, 0.00, '2022-08-23 12:00:42', 1, '2022-08-23 16:57:47', '2022-09-01 22:36:02'),
	(5, NULL, 0.00, '2022-09-01 09:40:00', 0, '2022-09-01 18:39:28', '2022-09-01 22:08:50'),
	(6, NULL, 0.00, '2022-09-09 10:40:00', 0, '2022-09-01 18:40:09', '2022-09-01 22:14:04'),
	(7, NULL, 0.00, '2022-03-09 22:00:00', 0, '2022-09-01 22:11:52', NULL),
	(8, NULL, 0.00, '2022-05-09 13:30:00', 0, '2022-09-01 22:13:21', NULL),
	(9, NULL, 0.00, '2022-09-04 09:00:00', 0, '2022-09-04 21:12:04', NULL),
	(10, NULL, 0.00, '2022-09-11 12:00:00', 0, '2022-09-11 00:00:16', NULL),
	(11, NULL, 0.00, '2022-09-11 10:01:00', 0, '2022-09-11 00:01:30', NULL),
	(12, NULL, 0.00, '2022-09-11 12:00:00', 0, '2022-09-11 00:03:06', NULL),
	(13, NULL, 0.00, '2022-09-16 10:00:00', 0, '2022-09-16 21:21:56', NULL),
	(14, NULL, 0.00, '2022-09-22 20:30:00', 0, '2022-09-22 16:22:39', NULL),
	(15, NULL, 0.00, '2022-09-25 10:30:00', 0, '2022-09-25 21:29:46', NULL);

-- Dumping structure for table db_lj_clinic.tbl_appointment_payment
DROP TABLE IF EXISTS `tbl_appointment_payment`;
CREATE TABLE IF NOT EXISTS `tbl_appointment_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(50) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT 0,
  `date_paid` date DEFAULT NULL,
  `appointment_id` int(3) NOT NULL DEFAULT 0,
  `pregnant_status` varchar(50) NOT NULL DEFAULT '',
  `service_title` varchar(50) NOT NULL DEFAULT '',
  `other_services` varchar(50) NOT NULL DEFAULT '',
  `findings` varchar(50) NOT NULL DEFAULT '',
  `cost` decimal(10,2) unsigned NOT NULL DEFAULT 0.00,
  `other_cost` decimal(10,2) unsigned NOT NULL DEFAULT 0.00,
  `total_cost` decimal(10,2) unsigned NOT NULL DEFAULT 0.00,
  `file_name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_appointment_payment: ~2 rows (approximately)
INSERT INTO `tbl_appointment_payment` (`id`, `reference_no`, `user_id`, `date_paid`, `appointment_id`, `pregnant_status`, `service_title`, `other_services`, `findings`, `cost`, `other_cost`, `total_cost`, `file_name`, `created_at`, `updated_at`) VALUES
	(10, 'REF-yH5f-2IXF-1-39', 1, '2022-10-03', 39, 'Not Pregnant', 'TVS First Trimester Ultrasound', 'extra service', 'miss you', 1500.00, 143.00, 1643.00, NULL, '2022-10-03 21:49:37', '2022-10-08 20:51:18'),
	(11, 'REF-yH5f-2IXF-1-391', 1, '2022-10-04', 39, 'Not Pregnant', 'TVS First Trimester Ultrasound', 'extra service', 'miss you', 700.00, 0.00, 700.00, NULL, '2022-10-03 21:49:37', '2022-10-08 20:54:27'),
	(12, 'REF-HU4a-Q6d5-1-38', 1, '2022-10-17', 38, 'Week 1 Pregnant', 'OTHERS', '', '', 0.00, 2000.00, 2000.00, NULL, '2022-10-17 21:11:17', NULL);

-- Dumping structure for table db_lj_clinic.tbl_feedback
DROP TABLE IF EXISTS `tbl_feedback`;
CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT 0,
  `rating` int(1) DEFAULT 0,
  `feedback` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_feedback: ~4 rows (approximately)
INSERT INTO `tbl_feedback` (`id`, `user_id`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
	(1, 1, 0, '', '2022-08-18 23:08:39', NULL),
	(2, 1, 5, '', '2022-08-18 23:09:15', NULL),
	(3, 1, 5, 'test', '2022-08-18 23:09:51', NULL),
	(4, 1, 5, 'qweqwe', '2022-08-18 23:12:03', NULL),
	(5, 1, 5, 'wew', '2022-08-19 15:21:12', NULL);

-- Dumping structure for table db_lj_clinic.tbl_notification
DROP TABLE IF EXISTS `tbl_notification`;
CREATE TABLE IF NOT EXISTS `tbl_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_action` datetime DEFAULT current_timestamp(),
  `user_id` int(3) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_notification: ~8 rows (approximately)
INSERT INTO `tbl_notification` (`id`, `title`, `description`, `date_action`, `user_id`, `created_at`, `updated_at`) VALUES
	(7, 'Appointment Approved', '\r\n        <div class=\'text-muted small mt-1\'>\r\n          <span><b>glen</b></span><br>\r\n          <span>Test Complaint</span><br>\r\n          <span>TVS Gyne Ultrasound</span><br>\r\n          <span>Sep 16, 2022 15:45 PM</span><br>\r\n        </div>', '2022-09-16 21:45:32', 2, NULL, NULL),
	(9, 'Appointment Rejected/Cancelled', '\r\n        <div class=\'text-muted small mt-1\'>\r\n          <span><b>glen</b></span><br>\r\n          <span>Test Complaint</span><br>\r\n          <span>TVS Gyne Ultrasound</span><br>\r\n          <span>Sep 16, 2022 16:17 PM</span><br>\r\n        </div>', '2022-09-16 22:17:43', 2, NULL, '2022-09-16 22:18:29'),
	(10, 'Appointment Approved', '\r\n        <div class=\'text-muted small mt-1\'>\r\n          <span><b>glen</b></span><br>\r\n          <span>Test Complaint</span><br>\r\n          <span>TVS Gyne Ultrasound</span><br>\r\n          <span>Sep 16, 2022 16:23 PM</span><br>\r\n        </div>', '2022-09-16 22:23:09', 2, NULL, NULL),
	(11, 'Appointment Rejected/Cancelled', '\r\n        <div class=\'text-muted small mt-1\'>\r\n          <span><b>glen</b></span><br>\r\n          <span>Test Complaint</span><br>\r\n          <span>TVS Gyne Ultrasound</span><br>\r\n          <span>Sep 16, 2022 16:27 PM</span><br>\r\n        </div>', '2022-09-16 22:27:13', 2, NULL, NULL),
	(12, 'Appointment Approved', '\r\n        <div class=\'text-muted small mt-1\'>\r\n          <span><b>Kaye Celine Urayan</b></span><br>\r\n          <span>TEST COMPLAINT</span><br>\r\n          <span>OB Doppler Ultrasound</span><br>\r\n          <span>Sep 17, 2022 18:36 PM</span><br>\r\n        </d', '2022-09-18 00:36:14', 1, NULL, NULL),
	(13, 'New Appointment', '\r\n        <div class=\'text-muted small mt-1\'>\r\n          <span><b>Kaye Celine Urayan</b></span><br>\r\n          <span>WEW</span><br>\r\n          <span>OTHERS</span><br>\r\n          <span>Sep 22, 2022 10:23 AM</span><br>\r\n        </div>', '2022-09-22 16:22:53', 0, NULL, '2022-09-22 16:41:07'),
	(14, 'Appointment Approved', '\r\n        <div class=\'text-muted small mt-1\'>\r\n          <span><b>Kaye Celine Urayan</b></span><br>\r\n          <span>WEW</span><br>\r\n          <span>OTHERS</span><br>\r\n          <span>Sep 22, 2022 10:23 AM</span><br>\r\n        </div>', '2022-09-22 16:23:00', 1, NULL, NULL),
	(15, 'Appointment Approved', '\r\n        <div class=\'text-muted small mt-1\'>\r\n          <span><b>Kaye Celine Urayan</b></span><br>\r\n          <span>NWEWW</span><br>\r\n          <span>TVS First Trimester Ultrasound</span><br>\r\n          <span>Sep 25, 2022 15:30 PM</span><br>\r\n        </d', '2022-09-25 21:30:23', 1, NULL, NULL),
	(16, 'Appointment Approved', '\r\n        <div class=\'text-muted small mt-1\'>\r\n          <span><b>qw</b></span><br>\r\n          <span>TESTWAW</span><br>\r\n          <span>Pelvic Ultrasound</span><br>\r\n          <span>Oct 03, 2022 15:35 PM</span><br>\r\n        </div>', '2022-10-03 21:35:32', 10, NULL, NULL);

-- Dumping structure for table db_lj_clinic.tbl_period_calendar
DROP TABLE IF EXISTS `tbl_period_calendar`;
CREATE TABLE IF NOT EXISTS `tbl_period_calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL COMMENT '-1 day if you can see in the calendar',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_period_calendar: ~14 rows (approximately)
INSERT INTO `tbl_period_calendar` (`id`, `user_id`, `title`, `description`, `start`, `end`, `created_at`, `updated_at`) VALUES
	(1, 1, '1st', 'DESC1', '2022-08-16', '2022-08-20', '2022-08-20 21:44:21', '2022-08-20 21:47:57'),
	(2, 1, '2nd', 'DESC2', '2022-08-20', '2022-08-24', '2022-08-20 21:44:21', '2022-08-20 21:47:42'),
	(7, 1, 'TESTWEW', NULL, '2022-08-01', '2022-08-04', '2022-08-20 22:26:02', '2022-08-21 16:25:36'),
	(8, 1, 'qweqwe', NULL, '2022-08-09', '2022-08-12', '2022-08-20 22:26:37', NULL),
	(9, 1, 'TEST DESCRIPTION', NULL, '2022-09-01', '2022-09-18', '2022-09-18 23:36:16', NULL),
	(10, 1, 'qwe', NULL, '2022-09-18', '2022-09-21', '2022-09-18 23:38:35', NULL),
	(11, 1, 'qweqwe', NULL, '2022-09-06', '2022-09-09', '2022-09-18 23:40:04', NULL),
	(12, 1, 'qweqw', NULL, '2022-09-06', '2022-09-09', '2022-09-18 23:40:08', NULL),
	(13, 1, 'wqeqwe', NULL, '2022-09-04', '2022-09-09', '2022-09-18 23:40:11', NULL),
	(14, 1, 'swqwe', NULL, '2022-09-06', '2022-09-10', '2022-09-18 23:40:16', NULL),
	(15, 1, 'qwewe', NULL, '2022-09-06', '2022-09-09', '2022-09-18 23:40:19', NULL),
	(16, 1, 'qweqweqeqw', NULL, '2022-08-31', '2022-09-10', '2022-09-18 23:40:24', NULL),
	(17, 1, 'sADqweqwew', NULL, '2022-08-31', '2022-09-11', '2022-09-18 23:40:38', NULL),
	(18, 1, 'qew', NULL, '2022-09-11', '2022-09-25', '2022-09-18 23:40:56', NULL),
	(19, 1, 'qweqeqe', NULL, '2022-09-25', '2022-10-01', '2022-09-18 23:40:59', NULL),
	(20, 1, 'SADWEW', NULL, '2022-09-18', '2022-10-08', '2022-09-18 23:41:05', NULL);

-- Dumping structure for table db_lj_clinic.tbl_services
DROP TABLE IF EXISTS `tbl_services`;
CREATE TABLE IF NOT EXISTS `tbl_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_title` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `amount` double(10,2) NOT NULL DEFAULT 0.00,
  `is_deleted` int(1) NOT NULL DEFAULT 0 COMMENT '0 is not delete 1 is for delete',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_services: ~9 rows (approximately)
INSERT INTO `tbl_services` (`id`, `service_title`, `description`, `duration`, `amount`, `is_deleted`, `created_at`, `updated_at`) VALUES
	(1, 'OB-GYN Consultation / Check Up', 'OB-GYN Consultation / Check Up\nOB-GYN Consultation / Check Up\nOB-GYN Consultation / Check Up\nOB-GYN Consultation / Check Up', '15 mins', 700.00, 1, '2022-08-23 16:54:55', '2022-09-01 21:13:33'),
	(2, 'Pelvic Ultrasound', 'qweqw', '15 mins', 700.00, 0, '2022-08-23 16:55:08', '2022-08-28 23:19:15'),
	(3, 'BPS Ultrasound', NULL, '15 mins', 1300.00, 0, '2022-08-23 16:55:24', NULL),
	(4, 'TVS First Trimester Ultrasound', NULL, '15 mins', 1500.00, 0, '2022-08-23 16:55:37', NULL),
	(5, 'TVS Gyne Ultrasound', NULL, '15 mins', 2000.00, 0, '2022-08-23 16:55:43', NULL),
	(6, 'Transrectal Ultrasound', NULL, '15 mins', 2200.00, 0, '2022-08-23 16:56:02', NULL),
	(7, 'OB Doppler Ultrasound', NULL, '15 mins', 3500.00, 0, '2022-08-23 16:56:10', NULL),
	(8, 'Pap Smear', NULL, '15 mins', 1700.00, 0, '2022-08-23 16:56:23', NULL),
	(9, 'OTHERS', NULL, '15 mins', 0.00, 0, '2022-08-23 16:56:33', NULL);

-- Dumping structure for table db_lj_clinic.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `contactno` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 0 COMMENT '0 for user 1 for admin',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_user: ~11 rows (approximately)
INSERT INTO `tbl_user` (`id`, `fname`, `mname`, `lname`, `fullname`, `address`, `contactno`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, NULL, NULL, NULL, 'Kaye Celine Urayan', 'addr', '09125041626', 'kayecelineurayan@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2022-08-18 23:27:17', '2022-09-14 21:39:30'),
	(2, NULL, NULL, NULL, 'glen', '123', '123', 'glenilagan@llibi.com', '4297f44b13955235245b2497399d7a93', 0, '2022-08-25 19:43:05', '2022-09-16 21:44:01'),
	(3, NULL, NULL, NULL, 'qwe', '', '123qwe', 'gggqwe@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2022-08-25 19:45:41', NULL),
	(4, NULL, NULL, NULL, 'qweqeqw', 'qweqwe', 'qweqwe', 'qeqweqw123@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2022-08-25 19:46:38', NULL),
	(5, NULL, NULL, NULL, 'qwe', 'qwe', 'qwe', 'qwe2123@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2022-08-25 19:46:59', NULL),
	(6, NULL, NULL, NULL, 'qweq', 'qeqweqw', 'eqe', 'qeqwe22@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2022-08-25 19:47:15', NULL),
	(8, NULL, NULL, NULL, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2022-08-25 20:27:42', NULL),
	(9, NULL, NULL, NULL, 'qwe', 'qwe', 'qwe', 'qweqweqweqwe@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2022-08-25 20:30:42', NULL),
	(10, NULL, NULL, NULL, 'qw', 'qweqwe', 'qwe', 'qwesad123@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2022-08-25 20:31:51', NULL),
	(11, NULL, NULL, NULL, 'qwe', 'qwe', 'qwe', 'qww@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2022-08-25 20:32:30', NULL),
	(12, NULL, NULL, NULL, '1', '3', '2', 'gggqw@gmail.com', '4297f44b13955235245b2497399d7a93', 1, '2022-08-25 20:33:11', '2022-08-27 23:18:03'),
	(13, 'glenmore', 'saga', 'ilagan', 'glenmore saga, ilagan', 'caloocan city', '091234567890', 'glen11@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2022-10-17 19:30:16', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
