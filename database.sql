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
  `description` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_announcements: ~21 rows (approximately)
INSERT INTO `tbl_announcements` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'TITLE', 'DESCRIPTION', '2022-08-20 21:04:35', NULL),
	(2, 'SARADO', 'SA LINGGO', '2022-07-20 21:16:07', '2022-08-20 21:26:07'),
	(3, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(4, 'SARADO', 'SA LINGGO', '2022-07-20 21:16:07', '2022-08-20 21:26:07'),
	(5, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(6, 'TITLE', 'DESCRIPTION', '2022-08-20 21:04:35', NULL),
	(7, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(8, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(9, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(10, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(11, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(12, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(13, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(14, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(15, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(16, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(17, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(18, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(19, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(20, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL),
	(21, 'qwe', 'qwe', '2022-08-20 21:28:48', NULL);

-- Dumping structure for table db_lj_clinic.tbl_appointments
DROP TABLE IF EXISTS `tbl_appointments`;
CREATE TABLE IF NOT EXISTS `tbl_appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT 0,
  `complaint` varchar(50) DEFAULT NULL,
  `date_schedule` datetime DEFAULT NULL,
  `age` int(11) DEFAULT 0,
  `status` int(1) DEFAULT 0 COMMENT '0 for pending 1 form approve',
  `remarks` varchar(50) DEFAULT NULL,
  `is_completed` int(1) DEFAULT 0,
  `is_cancelled` int(1) DEFAULT 0 COMMENT '1 is for cancelled',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_appointments: ~16 rows (approximately)
INSERT INTO `tbl_appointments` (`id`, `user_id`, `complaint`, `date_schedule`, `age`, `status`, `remarks`, `is_completed`, `is_cancelled`, `created_at`, `updated_at`) VALUES
	(1, 1, 'RED', '2022-08-01 21:35:00', 14, 1, NULL, 1, 0, '2022-08-18 21:43:55', '2022-08-23 23:13:47'),
	(2, 1, 'BLUE', '2022-08-02 21:46:01', 44, 1, NULL, 0, 0, '2022-08-18 21:46:04', '2022-08-23 23:14:49'),
	(3, 1, 'GREEN', '2022-08-03 00:00:00', 22, 0, NULL, 0, 0, '2022-08-18 22:36:05', '2022-08-23 23:13:58'),
	(4, 1, 'GG', '2022-08-05 00:00:00', 22, 0, NULL, 0, 1, '2022-08-18 22:36:36', '2022-08-23 23:58:13'),
	(10, 1, '', '0000-00-00 00:00:00', 0, 0, NULL, 0, 0, '2022-08-18 23:00:29', NULL),
	(11, 1, '', '0000-00-00 00:00:00', 0, 0, NULL, 0, 0, '2022-08-18 23:00:31', NULL),
	(12, 1, '', '0000-00-00 00:00:00', 0, 0, NULL, 0, 0, '2022-08-18 23:00:35', NULL),
	(13, 1, 'BEFORE END', '2022-08-19 05:20:00', 22, 0, NULL, 0, 0, '2022-08-19 23:20:59', '2022-08-23 23:58:02'),
	(14, 1, 'SOSAD', '2022-08-19 17:29:00', 12, 0, NULL, 0, 0, '2022-08-19 23:23:33', '2022-08-23 23:58:03'),
	(16, 1, 'SASA123', '2022-08-19 23:30:00', 12, 0, NULL, 0, 0, '2022-08-19 23:26:29', '2022-08-23 23:58:01'),
	(17, 1, 'SIGE NGA', '2022-08-02 06:39:00', 123, 1, NULL, 1, 0, '2022-08-20 00:39:37', '2022-08-23 23:14:23'),
	(18, 1, 'sad', '2022-08-04 00:00:00', 44, 0, NULL, 0, 0, '2022-08-20 00:41:46', NULL),
	(19, 1, 'ATAY', '2022-08-09 05:51:00', 22, 0, NULL, 0, 0, '2022-08-20 00:51:50', '2022-08-23 23:58:00'),
	(21, 1, 'qw', '2022-08-03 17:28:00', 14, 0, NULL, 0, 0, '2022-08-21 17:24:03', '2022-08-23 23:58:00'),
	(22, 1, 'tqwe', '2022-08-03 13:16:00', 22, 0, NULL, 0, 0, '2022-08-23 16:37:35', NULL),
	(23, 1, '', '2022-08-23 11:45:00', 0, 0, NULL, 0, 0, '2022-08-23 16:39:50', '2022-08-23 23:57:57'),
	(24, 1, 'TEST', '2022-08-06 13:00:00', 14, 0, NULL, 0, 1, '2022-08-23 22:58:32', '2022-08-23 23:58:09'),
	(25, 1, '', '2022-08-01 11:00:00', 0, 0, NULL, 0, 0, '2022-08-23 23:28:48', '2022-08-23 23:57:58'),
	(26, 1, 'NEW', '2022-08-05 13:00:00', 12, 0, NULL, 0, 10, '2022-08-23 23:52:40', '2022-08-23 23:57:59'),
	(27, 1, 'WQEQWE', '2022-08-05 13:00:00', 123, 0, NULL, 0, 0, '2022-08-23 23:58:26', NULL),
	(28, 1, 'MY COM', '2022-08-24 11:00:00', 12, 0, NULL, 0, 0, '2022-08-24 00:02:33', NULL);

-- Dumping structure for table db_lj_clinic.tbl_appointment_availability
DROP TABLE IF EXISTS `tbl_appointment_availability`;
CREATE TABLE IF NOT EXISTS `tbl_appointment_availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `services` varchar(50) DEFAULT NULL,
  `amount` double(10,2) DEFAULT 0.00,
  `date_available` datetime DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_appointment_availability: ~0 rows (approximately)
INSERT INTO `tbl_appointment_availability` (`id`, `services`, `amount`, `date_available`, `created_at`, `updated_at`) VALUES
	(1, '', 0.00, '2022-08-24 11:15:33', '2022-08-23 16:31:43', NULL),
	(2, NULL, 0.00, '2022-08-24 11:30:09', '2022-08-23 16:57:16', NULL),
	(3, NULL, 0.00, '2022-08-23 11:45:23', '2022-08-23 16:57:31', NULL),
	(4, NULL, 0.00, '2022-08-23 12:00:42', '2022-08-23 16:57:47', NULL);

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

-- Dumping data for table db_lj_clinic.tbl_feedback: ~5 rows (approximately)
INSERT INTO `tbl_feedback` (`id`, `user_id`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
	(1, 1, 0, '', '2022-08-18 23:08:39', NULL),
	(2, 1, 5, '', '2022-08-18 23:09:15', NULL),
	(3, 1, 5, 'test', '2022-08-18 23:09:51', NULL),
	(4, 1, 5, 'qweqwe', '2022-08-18 23:12:03', NULL),
	(5, 1, 5, 'wew', '2022-08-19 15:21:12', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_period_calendar: ~4 rows (approximately)
INSERT INTO `tbl_period_calendar` (`id`, `user_id`, `title`, `description`, `start`, `end`, `created_at`, `updated_at`) VALUES
	(1, 1, '1st', 'DESC1', '2022-08-16', '2022-08-20', '2022-08-20 21:44:21', '2022-08-20 21:47:57'),
	(2, 1, '2nd', 'DESC2', '2022-08-20', '2022-08-24', '2022-08-20 21:44:21', '2022-08-20 21:47:42'),
	(7, 1, 'TESTWEW', NULL, '2022-08-01', '2022-08-04', '2022-08-20 22:26:02', '2022-08-21 16:25:36'),
	(8, 1, 'qweqwe', NULL, '2022-08-09', '2022-08-12', '2022-08-20 22:26:37', NULL);

-- Dumping structure for table db_lj_clinic.tbl_services
DROP TABLE IF EXISTS `tbl_services`;
CREATE TABLE IF NOT EXISTS `tbl_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_title` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `amount` double(10,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_services: ~0 rows (approximately)
INSERT INTO `tbl_services` (`id`, `service_title`, `duration`, `amount`, `created_at`, `updated_at`) VALUES
	(1, 'OB-GYN Consultation / Check Up', '15 mins', 700.00, '2022-08-23 16:54:55', NULL),
	(2, 'Pelvic Ultrasound', '15 mins', 700.00, '2022-08-23 16:55:08', NULL),
	(3, 'BPS Ultrasound', '15 mins', 1300.00, '2022-08-23 16:55:24', NULL),
	(4, 'TVS First Trimester Ultrasound', '15 mins', 1500.00, '2022-08-23 16:55:37', NULL),
	(5, 'TVS Gyne Ultrasound', '15 mins', 2000.00, '2022-08-23 16:55:43', NULL),
	(6, 'Transrectal Ultrasound', '15 mins', 2200.00, '2022-08-23 16:56:02', NULL),
	(7, 'OB Doppler Ultrasound', '15 mins', 3500.00, '2022-08-23 16:56:10', NULL),
	(8, 'Pap Smear', '15 mins', 1700.00, '2022-08-23 16:56:23', NULL),
	(9, 'OTHERS', '15 mins', 0.00, '2022-08-23 16:56:33', NULL);

-- Dumping structure for table db_lj_clinic.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contactno` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 0 COMMENT '0 for user 1 for admin',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_lj_clinic.tbl_user: ~0 rows (approximately)
INSERT INTO `tbl_user` (`id`, `fullname`, `address`, `contactno`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'test', 'addr', '123123', 'qweqwe@gmail.com', '4297f44b13955235245b2497399d7a93', 0, '2022-08-18 23:27:17', '2022-08-18 23:29:09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
