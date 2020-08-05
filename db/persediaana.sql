/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - persediaan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`persediaan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `persediaan`;

/*Table structure for table `barang_keluar` */

DROP TABLE IF EXISTS `barang_keluar`;

CREATE TABLE `barang_keluar` (
  `id_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` int(11) DEFAULT NULL,
  `jumlah_keluar` int(11) DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_keluar`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang_keluar` */

insert  into `barang_keluar`(`id_keluar`,`kd_barang`,`jumlah_keluar`,`tanggal_keluar`,`id_pengguna`) values 
(47,6,5,'2020-08-05',18),
(48,6,5,'2020-08-05',18),
(49,7,50,'2020-08-05',18);

/*Table structure for table `barang_masuk` */

DROP TABLE IF EXISTS `barang_masuk`;

CREATE TABLE `barang_masuk` (
  `id_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` varchar(50) DEFAULT NULL,
  `jumlah_masuk` int(11) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang_masuk` */

insert  into `barang_masuk`(`id_masuk`,`kd_barang`,`jumlah_masuk`,`tanggal_masuk`,`id_pengguna`) values 
(58,'6',110,'2020-08-05',18),
(60,'6',100,'2020-08-05',18),
(61,'7',100,'2020-08-05',18);

/*Table structure for table `barang_tersedia` */

DROP TABLE IF EXISTS `barang_tersedia`;

CREATE TABLE `barang_tersedia` (
  `id_tersedia` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` varchar(11) DEFAULT NULL,
  `jumlah_tersedia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tersedia`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang_tersedia` */

insert  into `barang_tersedia`(`id_tersedia`,`kd_barang`,`jumlah_tersedia`) values 
(8,'6',200),
(9,'7',50);

/*Table structure for table `bulan` */

DROP TABLE IF EXISTS `bulan`;

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bulan` */

insert  into `bulan`(`id`,`bulan`) values 
(1,'Januari'),
(2,'Febuari'),
(3,'Maret'),
(4,'April'),
(5,'Mei'),
(6,'Juni'),
(7,'Juli'),
(8,'Agustus'),
(9,'September'),
(10,'Oktober'),
(11,'November'),
(12,'Desember');

/*Table structure for table `nama_barang` */

DROP TABLE IF EXISTS `nama_barang`;

CREATE TABLE `nama_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `nama_barang` */

insert  into `nama_barang`(`id`,`nama_barang`,`kd_barang`) values 
(6,'barang a','KD-001'),
(7,'barang b','KD-007');

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id_pengguna`,`username`,`password`,`nama`,`jabatan`) values 
(1,'pemilik','c4ca4238a0b923820dcc509a6f75849b','pemilik','1'),
(16,'gudang','c4ca4238a0b923820dcc509a6f75849b','gudang','2'),
(17,'sales','c4ca4238a0b923820dcc509a6f75849b','sales','3'),
(18,'admin','c4ca4238a0b923820dcc509a6f75849b','admin','0');

/* Trigger structure for table `barang_keluar` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tambah_b_keluar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tambah_b_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
    UPDATE barang_tersedia SET jumlah_tersedia=jumlah_tersedia-new.jumlah_keluar WHERE kd_barang=new.kd_barang;
    END */$$


DELIMITER ;

/* Trigger structure for table `barang_keluar` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_b_keluar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_b_keluar` AFTER UPDATE ON `barang_keluar` FOR EACH ROW BEGIN
    UPDATE barang_tersedia SET jumlah_tersedia=(jumlah_tersedia+old.jumlah_keluar)-new.jumlah_keluar WHERE kd_barang=old.kd_barang; 
    END */$$


DELIMITER ;

/* Trigger structure for table `barang_keluar` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_b_keluar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_b_keluar` AFTER DELETE ON `barang_keluar` FOR EACH ROW BEGIN
    UPDATE barang_tersedia SET jumlah_tersedia=jumlah_tersedia+old.jumlah_keluar WHERE kd_barang=old.kd_barang;
    END */$$


DELIMITER ;

/* Trigger structure for table `barang_masuk` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `barang_masuk` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `barang_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
    UPDATE barang_tersedia SET jumlah_tersedia=jumlah_tersedia+new.jumlah_masuk WHERE kd_barang=new.kd_barang;
    END */$$


DELIMITER ;

/* Trigger structure for table `barang_masuk` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_data_masuk` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_data_masuk` AFTER UPDATE ON `barang_masuk` FOR EACH ROW BEGIN
    UPDATE barang_tersedia SET jumlah_tersedia=(jumlah_tersedia-old.jumlah_masuk)+new.jumlah_masuk WHERE kd_barang=old.kd_barang; 
    END */$$


DELIMITER ;

/* Trigger structure for table `barang_masuk` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_barang_masuk` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_barang_masuk` AFTER DELETE ON `barang_masuk` FOR EACH ROW BEGIN
    Update barang_tersedia set jumlah_tersedia=jumlah_tersedia-old.jumlah_masuk where kd_barang=old.kd_barang;
    END */$$


DELIMITER ;

/* Trigger structure for table `nama_barang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `add_nama_stok` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `add_nama_stok` AFTER INSERT ON `nama_barang` FOR EACH ROW BEGIN
    INSERT into barang_tersedia values('',new.id,0);
    END */$$


DELIMITER ;

/* Trigger structure for table `nama_barang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_nama_barang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_nama_barang` AFTER DELETE ON `nama_barang` FOR EACH ROW BEGIN
    delete from barang_tersedia where kd_barang=old.id;
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
