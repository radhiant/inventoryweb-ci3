/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - inventoryweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventoryweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `inventoryweb`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(60) DEFAULT NULL,
  `stok` varchar(4) DEFAULT NULL,
  `id_satuan` int(20) DEFAULT NULL,
  `id_jenis` int(20) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`nama_barang`,`stok`,`id_satuan`,`id_jenis`,`foto`) values 
('BRG-0001','Teh Pucuk Harum','0',2,1,'d4f130cc51185c56c9effcfa0b4a30a0.jpg'),
('BRG-0002','Aqua','0',1,1,'aqua.jpg');

/*Table structure for table `barang_keluar` */

DROP TABLE IF EXISTS `barang_keluar`;

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` varchar(30) NOT NULL,
  `id_barang` varchar(30) DEFAULT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `jumlah_keluar` varchar(5) DEFAULT NULL,
  `tgl_keluar` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_barang_keluar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang_keluar` */

insert  into `barang_keluar`(`id_barang_keluar`,`id_barang`,`id_user`,`jumlah_keluar`,`tgl_keluar`) values 
('BRG-K-0001','BRG-0002','USR-001','20','2020-09-15');

/*Table structure for table `barang_masuk` */

DROP TABLE IF EXISTS `barang_masuk`;

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` varchar(40) NOT NULL,
  `id_supplier` varchar(30) DEFAULT NULL,
  `id_barang` varchar(30) DEFAULT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `jumlah_masuk` int(10) DEFAULT NULL,
  `tgl_masuk` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_barang_masuk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang_masuk` */

insert  into `barang_masuk`(`id_barang_masuk`,`id_supplier`,`id_barang`,`id_user`,`jumlah_masuk`,`tgl_masuk`) values 
('BRG-M-0001','SPLY-0003','BRG-0002','USR-001',30,'2020-09-15');

/*Table structure for table `jenis` */

DROP TABLE IF EXISTS `jenis`;

CREATE TABLE `jenis` (
  `id_jenis` int(20) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(20) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis` */

insert  into `jenis`(`id_jenis`,`nama_jenis`,`ket`) values 
(1,'Minuman',''),
(3,'Kemasan','');

/*Table structure for table `satuan` */

DROP TABLE IF EXISTS `satuan`;

CREATE TABLE `satuan` (
  `id_satuan` int(20) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(60) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `satuan` */

insert  into `satuan`(`id_satuan`,`nama_satuan`,`ket`) values 
(1,'Box',''),
(2,'Unit',''),
(4,'Pack','');

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(60) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `supplier` */

insert  into `supplier`(`id_supplier`,`nama_supplier`,`notelp`,`alamat`) values 
('SPLY-0001','Radhian Sobarna','087817379229','Sumedang'),
('SPLY-0002','Heri Perdiansyah','089829128118','Sumedang'),
('SPLY-0003','Widi Priansyah','089876261556','Sumedang');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `level` enum('gudang','admin','manajer') NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama`,`username`,`email`,`notelp`,`level`,`password`,`foto`,`status`) values 
('USR-001','Administrasi','admin','admin@admin.com','087856123445','admin','0192023a7bbd73250516f069df18b500','user.png','Aktif'),
('USR-002','Gudang','gudang','gudang@gmail.com','087817379229','gudang','202446dd1d6028084426867365b0c7a1','user.png','Aktif'),
('USR-003','Manajer','manajer','manajer@gmail.com','089291889228','manajer','69b731ea8f289cf16a192ce78a37b4f0','user.png','Aktif');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
