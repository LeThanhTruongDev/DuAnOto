-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ltw_db_car
CREATE DATABASE IF NOT EXISTS `ltw_db_car` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ltw_db_car`;

-- Dumping structure for table ltw_db_car.car
CREATE TABLE IF NOT EXISTS `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `thumbnail` varchar(250) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `color` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `yearOfProduction` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ltw_db_car.car: ~6 rows (approximately)
INSERT INTO `car` (`id`, `name`, `thumbnail`, `brand`, `color`, `price`, `yearOfProduction`, `description`) VALUES
	(1, 'Toyota Vios', '65789db82986c.jpg', 'Toyota', 'Trắng', 500000000, 2023, 'Xe sedan hạng B với thiết kế trẻ trung, hiện đại, vận hành linh hoạt, tiết kiệm nhiên liệu.'),
	(2, 'Honda City', '65787fba95d45.jpg', 'Honda', 'Xám', 550000000, 2023, 'Xe sedan hạng B với thiết kế sang trọng, nội thất tiện nghi, vận hành mạnh mẽ, tiết kiệm nhiên liệu.'),
	(3, 'Hyundai Accent', '65787fd838573.jpg', 'Hyundai', 'Bạc', 470000000, 2023, 'Xe sedan hạng B với thiết kế hiện đại, nội thất rộng rãi, vận hành êm ái, tiết kiệm nhiên liệu.'),
	(4, 'VinFast Fadil', '65788131744c8.jpg', 'VinFast', 'Đỏ', 387000000, 2023, 'Xe hatchback hạng A với thiết kế cá tính, nội thất tiện nghi, vận hành êm ái, tiết kiệm nhiên liệu.'),
	(5, 'Toyota Corolla Cross', '6578801f9fca4.jpg', 'Toyota', 'Đen', 700000000, 2023, 'Xe SUV cỡ C với thiết kế hiện đại, nội thất rộng rãi, vận hành linh hoạt, tiết kiệm nhiên liệu.'),
	(6, 'Honda CR-V', '657887166d1b6.jpg', 'Honda', 'Trắng', 998000000, 2023, 'Xe SUV cỡ C với thiết kế sang trọng, nội thất tiện nghi, vận hành mạnh mẽ, tiết kiệm nhiên liệu.');

-- Dumping structure for table ltw_db_car.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` longtext DEFAULT NULL,
  `fullName` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `birthDay` date DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ZiZiint.user: ~2 rows (approximately)
INSERT INTO `user` (`id`, `username`, `password`, `fullName`, `address`, `email`, `birthDay`, `role`) VALUES
	(1, 'trieuvi01', 'Nguyentrieuvi2302', 'Nguyễn Triệu Vĩ', '159 đường 5 lakeviewcity q2, HCM', 'nguyentrieuvi23022004@gmail.com', '2004-02-23', 'admin'),
	(9, 'trieuvi02', 'Nguyentrieuvi23022004', 'Triệu Vĩ', '159 lakeview city', 'nguyentrieuvi23022004@gmail.com', '2023-02-23', 'customer');

CREATE TABLE IF NOT EXISTS `pr_dowload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) DEFAULT NULL,
  `linkImage`varchar(50)DEFAULT NULL
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci


INSERT INTO `pr_dowload` (`id`, `image`,`linkImage`) VALUES
	(1,'appstore','apstore.png'),
  (2,'ch_play','gg_play.png'),
  (3,'pr_code','pr_code.png');
	



/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
