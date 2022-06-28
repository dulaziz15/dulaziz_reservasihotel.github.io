/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.20-MariaDB : Database - hotel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hotel` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `hotel`;

/*Table structure for table `fasilitas` */

DROP TABLE IF EXISTS `fasilitas`;

CREATE TABLE `fasilitas` (
  `id_fasilitas` varchar(13) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jumlah` int(13) NOT NULL,
  `keadaan` varchar(20) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  PRIMARY KEY (`id_fasilitas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `fasilitas` */

insert  into `fasilitas`(`id_fasilitas`,`nama`,`jumlah`,`keadaan`,`lokasi`) values 
('F-001','AC',40,'Baik','Semua kamar'),
('F-003','Kasur',40,'Baik','semua kamar'),
('F-004','kolam renang',4,'Baik','lantai 6');

/*Table structure for table `fasilitas_kamar` */

DROP TABLE IF EXISTS `fasilitas_kamar`;

CREATE TABLE `fasilitas_kamar` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `type_kamar` varchar(20) NOT NULL,
  `fasilitas` varchar(254) NOT NULL,
  `keadaan` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `fasilitas_kamar` */

insert  into `fasilitas_kamar`(`id`,`type_kamar`,`fasilitas`,`keadaan`) values 
(2,'President Suite','AC','Baik'),
(3,'President Suite','Kamar Mandi','Baik'),
(4,'President Suite','Kasur','Baik'),
(5,'President Suite','Lemari','Baik'),
(6,'President Suite','Wi-Fi','Baik'),
(7,'Premium','AC','Baik'),
(8,'President Suite','TV','Baik'),
(9,'Premium','TV','Baik'),
(12,'Premium','Kamar Mandi','Baik'),
(13,'Premium','Kasur','Baik'),
(14,'President Suite','Lemari','Baik'),
(15,'Suite','AC','Baik'),
(16,'Suite','TV','Baik'),
(17,'Suite','Kamar Mandi','Baik'),
(18,'Suite','Kasur','Baik'),
(19,'Suite','Lemari','Baik'),
(20,'Executive','TV','Baik'),
(22,'Executive','Kamar Mandi','Baik'),
(23,'Executive','Kasur','Baik'),
(24,'Executive','Lemari','Baik'),
(25,'VIP','TV','Baik'),
(26,'Executive','AC','Baik'),
(28,'VIP','Lemari','Baik'),
(29,'VIP','Kasur',''),
(30,'VVIP','TV','Baik'),
(31,'VVIP','AC','Baik'),
(32,'VVIP','Kasur','Baik'),
(33,'VVIP','Kamar Mandi','Baik'),
(34,'VVIP','Lemari','Baik'),
(35,'VIP','AC','Baik');

/*Table structure for table `kamar` */

DROP TABLE IF EXISTS `kamar`;

CREATE TABLE `kamar` (
  `id_kamar` varchar(13) NOT NULL,
  `type` varchar(15) NOT NULL,
  `lantai` int(5) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `harga` int(20) NOT NULL,
  `gambar` varchar(254) NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kamar` */

insert  into `kamar`(`id_kamar`,`type`,`lantai`,`jumlah`,`harga`,`gambar`) values 
('K-001','President Suite',1,20,200000,'2.jpg'),
('K-002','Premium',2,16,150000,'3.jpg'),
('K-003','Suite',2,30,200000,'superior_room_14__OzcWSm.webp'),
('K-004','Executive',3,15,300000,'2233210159.jpg'),
('K-005','VIP',4,25,250000,'selection-126-500x500.png'),
('K-006','VVIP',6,22,400000,'11.jpg');

/*Table structure for table `operator` */

DROP TABLE IF EXISTS `operator`;

CREATE TABLE `operator` (
  `id_operator` varchar(13) NOT NULL,
  `nama_operator` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(254) NOT NULL,
  PRIMARY KEY (`id_operator`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `operator` */

insert  into `operator`(`id_operator`,`nama_operator`,`email`,`alamat`) values 
('O-001','abdulaziz','aziz123@gmail.com','cirebon');

/*Table structure for table `pemesanan` */

DROP TABLE IF EXISTS `pemesanan`;

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(13) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `id_kamar` varchar(13) NOT NULL,
  `jumlah_kamar` int(20) NOT NULL,
  `tgl_mulai` varchar(25) NOT NULL,
  `tgl_selesai` varchar(23) NOT NULL,
  `lama_tinggal` int(20) NOT NULL,
  `harga` int(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pemesanan` */

insert  into `pemesanan`(`id_pemesanan`,`nama_pemesan`,`nomor_telepon`,`id_kamar`,`jumlah_kamar`,`tgl_mulai`,`tgl_selesai`,`lama_tinggal`,`harga`,`status`) values 
('P-001','abdulaziz','081312050947','K-001',10,'2022-03-29','2022-03-31',2,4000000,4),
('P-002','deny kurniawan','0895360038160','K-002',5,'2022-03-15','2022-03-31',16,12000000,4);

/*Table structure for table `pengunjung` */

DROP TABLE IF EXISTS `pengunjung`;

CREATE TABLE `pengunjung` (
  `id_tamu` varchar(13) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(254) NOT NULL,
  PRIMARY KEY (`id_tamu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengunjung` */

insert  into `pengunjung`(`id_tamu`,`nama_lengkap`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`agama`,`alamat`) values 
('U-001','abdul aziz','Cirebon','2004-07-15','Perempuan','Islam','cirebon'),
('U-002','masduqi','cirebon','0000-00-00','Laki-Laki','Islam','cirebon'),
('U-003','abdulaziz','cirebon','2004-12-07','laki-laki','islam','cirebon'),
('U-004','deny kurniawan','kediri','2000-12-12','Laki-laki','islam','jl.setono Gg VI ');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_pengguna` varchar(13) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id_user`,`email`,`password`,`id_pengguna`) values 
('A-001','dulaziz123@gmail.com','202cb962ac59075b964b07152d234b70','U-001'),
('R-001','masduqi123@gmail.com','202cb962ac59075b964b07152d234b70','U-002'),
('U-001','aziz123@gmail.com','202cb962ac59075b964b07152d234b70','U-003'),
('U-002','goblind03@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','U-004');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
