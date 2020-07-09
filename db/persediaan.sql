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
  `id_masuk` int(11) DEFAULT NULL,
  `jumlah_keluar` int(11) DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_keluar`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang_keluar` */

insert  into `barang_keluar`(`id_keluar`,`id_masuk`,`jumlah_keluar`,`tanggal_keluar`,`id_pengguna`) values 
(18,34,1,'2020-07-05',18),
(19,34,3,'2020-07-05',18),
(21,32,2,'2020-07-05',18),
(22,32,11,'2020-07-05',18),
(23,34,1,'2020-07-05',18),
(24,34,1,'2020-07-05',18),
(25,34,2,'2020-07-05',18);

/*Table structure for table `barang_masuk` */

DROP TABLE IF EXISTS `barang_masuk`;

CREATE TABLE `barang_masuk` (
  `id_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) DEFAULT NULL,
  `jumlah_masuk` int(11) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang_masuk` */

insert  into `barang_masuk`(`id_masuk`,`nama_barang`,`jumlah_masuk`,`tanggal_masuk`,`id_pengguna`) values 
(32,'Foxs',1,'2020-07-05',18),
(33,'Foxs',1,'2020-07-05',18),
(34,'Lemon',2,'2020-07-05',18),
(35,'Lemon',2,'2020-07-05',18),
(36,'Foxs',11,'2020-07-05',18),
(37,'Lemon',12,'2020-07-05',18),
(38,'Lemon',1,'2020-07-05',18),
(39,'tahu',8,'2020-07-05',18);

/*Table structure for table `barang_tersedia` */

DROP TABLE IF EXISTS `barang_tersedia`;

CREATE TABLE `barang_tersedia` (
  `id_tersedia` int(11) NOT NULL AUTO_INCREMENT,
  `id_masuk` int(11) DEFAULT NULL,
  `jumlah_tersedia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tersedia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang_tersedia` */

insert  into `barang_tersedia`(`id_tersedia`,`id_masuk`,`jumlah_tersedia`) values 
(4,32,0),
(5,34,9),
(6,39,8);

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
