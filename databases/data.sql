-- MySQL dump 10.14  Distrib 5.5.64-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: nixsms2020
-- ------------------------------------------------------
-- Server version	5.5.64-MariaDB
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `hak_akses_menu`
--

INSERT INTO `hak_akses_menu` VALUES (1,1);
INSERT INTO `hak_akses_menu` VALUES (1,2);
INSERT INTO `hak_akses_menu` VALUES (1,3);
INSERT INTO `hak_akses_menu` VALUES (1,4);
INSERT INTO `hak_akses_menu` VALUES (1,5);
INSERT INTO `hak_akses_menu` VALUES (1,6);
INSERT INTO `hak_akses_menu` VALUES (1,7);
INSERT INTO `hak_akses_menu` VALUES (1,8);
INSERT INTO `hak_akses_menu` VALUES (1,9);
INSERT INTO `hak_akses_menu` VALUES (1,10);
INSERT INTO `hak_akses_menu` VALUES (1,11);
INSERT INTO `hak_akses_menu` VALUES (1,12);

--
-- Dumping data for table `halaman_menu`
--

INSERT INTO `halaman_menu` VALUES (1,'halaman_menu','Kelola Menu','Data Halaman Menu','halaman_menu','nav-icon fas fa-bars','ya');
INSERT INTO `halaman_menu` VALUES (2,'halaman_menu','Kelola Menu','Tambah Halaman Menu','halaman_menu/create','nav-icon fas fa-bars','tidak');
INSERT INTO `halaman_menu` VALUES (3,'halaman_menu','Kelola Menu','Edit Halaman Menu','halaman_menu/edit','nav-icon fas fa-bars','tidak');
INSERT INTO `halaman_menu` VALUES (4,'halaman_menu','Kelola Menu','Hapus Halaman Menu','halaman_menu/func','nav-icon fas fa-bars','tidak');
INSERT INTO `halaman_menu` VALUES (5,'pengguna','Pengguna','Data Pengguna','pengguna','nav-icon fas fa-user','ya');
INSERT INTO `halaman_menu` VALUES (6,'pengguna','Pengguna','Tambah Pengguna','pengguna/create','nav-icon fas fa-user','tidak');
INSERT INTO `halaman_menu` VALUES (7,'pengguna','Pengguna','Edit Pengguna','pengguna/edit','nav-icon fas fa-user','tidak');
INSERT INTO `halaman_menu` VALUES (8,'pengguna','Pengguna','Hapus Pengguna','pengguna/func','nav-icon fas fa-user','tidak');
INSERT INTO `halaman_menu` VALUES (9,'pengguna_grup','Pengguna','Data Pengguna Grup','pengguna_grup','nav-icon fas fa-user-friends','ya');
INSERT INTO `halaman_menu` VALUES (10,'pengguna_grup','Pengguna','Tambah Pengguna Grup','pengguna_grup/create','nav-icon fas fa-user-friends','tidak');
INSERT INTO `halaman_menu` VALUES (11,'pengguna_grup','Pengguna','Edit Pengguna Grup','pengguna_grup/edit','nav-icon fas fa-user-friends','tidak');
INSERT INTO `halaman_menu` VALUES (12,'pengguna_grup','Pengguna','Hapus Pengguna Grup','pengguna_grup/func','nav-icon fas fa-user-friends','tidak');

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` VALUES (1,'limitQuery','100');

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` VALUES (1,1,'Admin Utama','admin','admin@admin.com','7b902e6ff1db9f560443f2048974fd7d386975b0','2020-02-15 19:26:27','0000-00-00 00:00:00');

--
-- Dumping data for table `pengguna_grup`
--

INSERT INTO `pengguna_grup` VALUES (1,'Administrator');
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-02 13:53:32
