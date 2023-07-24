/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80018 (8.0.18)
 Source Host           : localhost:3306
 Source Schema         : webpro2_2023

 Target Server Type    : MySQL
 Target Server Version : 80018 (8.0.18)
 File Encoding         : 65001

 Date: 24/07/2023 19:19:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbuku
-- ----------------------------
DROP TABLE IF EXISTS `tbuku`;
CREATE TABLE `tbuku` (
  `id_buku` int(255) NOT NULL AUTO_INCREMENT,
  `kode_buku` char(50) NOT NULL,
  `judul_buku` char(255) NOT NULL,
  `kategori_buku` int(255) NOT NULL,
  `cover_buku` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  UNIQUE KEY `unique_id_buku` (`id_buku`),
  UNIQUE KEY `unique_kode_buku` (`kode_buku`),
  KEY `index_judul_buku` (`judul_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tbuku
-- ----------------------------
BEGIN;
INSERT INTO `tbuku` (`id_buku`, `kode_buku`, `judul_buku`, `kategori_buku`, `cover_buku`, `created_at`, `updated_at`, `id_user`) VALUES (17, 'BP-0001', 'Test BP-0001', 1, '20230619115217Test_BP-0001.png', '2023-06-05 11:56:39', NULL, 1);
INSERT INTO `tbuku` (`id_buku`, `kode_buku`, `judul_buku`, `kategori_buku`, `cover_buku`, `created_at`, `updated_at`, `id_user`) VALUES (18, 'BP-0009', 'Test BP-0002', 4, '20230619115251Test_BP-0002.png', '2023-06-05 11:56:39', NULL, 1);
INSERT INTO `tbuku` (`id_buku`, `kode_buku`, `judul_buku`, `kategori_buku`, `cover_buku`, `created_at`, `updated_at`, `id_user`) VALUES (21, 'BP-0010', 'Test Input', 3, '20230619115313Test_Input.jpg', '0000-00-00 00:00:00', NULL, 0);
INSERT INTO `tbuku` (`id_buku`, `kode_buku`, `judul_buku`, `kategori_buku`, `cover_buku`, `created_at`, `updated_at`, `id_user`) VALUES (22, 'BP-0011', 'Test Input', 2, '20230619115322Test_Input.png', '0000-00-00 00:00:00', NULL, 0);
INSERT INTO `tbuku` (`id_buku`, `kode_buku`, `judul_buku`, `kategori_buku`, `cover_buku`, `created_at`, `updated_at`, `id_user`) VALUES (24, 'OTO-0000', 'Test Input', 3, '20230619115328Test_Input.jpeg', '0000-00-00 00:00:00', NULL, 0);
INSERT INTO `tbuku` (`id_buku`, `kode_buku`, `judul_buku`, `kategori_buku`, `cover_buku`, `created_at`, `updated_at`, `id_user`) VALUES (25, 'BP-0012', 'Jajal 9 upload', 1, '20230619120251Jajal_9_upload.png', '0000-00-00 00:00:00', NULL, 0);
INSERT INTO `tbuku` (`id_buku`, `kode_buku`, `judul_buku`, `kategori_buku`, `cover_buku`, `created_at`, `updated_at`, `id_user`) VALUES (26, 'BP-0013', 'CODE IGNITER', 1, '20230619120526CODE_IGNITER.png', '0000-00-00 00:00:00', NULL, 0);
INSERT INTO `tbuku` (`id_buku`, `kode_buku`, `judul_buku`, `kategori_buku`, `cover_buku`, `created_at`, `updated_at`, `id_user`) VALUES (27, 'BHS-0000', 'CODE IGNITER', 2, NULL, '0000-00-00 00:00:00', NULL, 0);
INSERT INTO `tbuku` (`id_buku`, `kode_buku`, `judul_buku`, `kategori_buku`, `cover_buku`, `created_at`, `updated_at`, `id_user`) VALUES (28, 'BP-0014', 'CODE IGNITER', 1, '20230619112306CODE_IGNITER_.png', '0000-00-00 00:00:00', NULL, 0);
COMMIT;

-- ----------------------------
-- Table structure for tkategori
-- ----------------------------
DROP TABLE IF EXISTS `tkategori`;
CREATE TABLE `tkategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `kode_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`),
  UNIQUE KEY `kode_kategori` (`kode_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tkategori
-- ----------------------------
BEGIN;
INSERT INTO `tkategori` (`id_kategori`, `nama_kategori`, `kode_kategori`) VALUES (1, 'Pemprograman', 'BP');
INSERT INTO `tkategori` (`id_kategori`, `nama_kategori`, `kode_kategori`) VALUES (2, 'Bahasa', 'BHS');
INSERT INTO `tkategori` (`id_kategori`, `nama_kategori`, `kode_kategori`) VALUES (3, 'Otomotif', 'OTO');
INSERT INTO `tkategori` (`id_kategori`, `nama_kategori`, `kode_kategori`) VALUES (4, 'Rumah Tangga', 'RT');
INSERT INTO `tkategori` (`id_kategori`, `nama_kategori`, `kode_kategori`) VALUES (5, 'Remaja', 'RMJ');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `avatar`, `created_at`, `last_login`) VALUES (2, 'Muchlis', 'muchlis.re@gmail.com', 'muchlis', '$2y$10$eImdVKomVy8FQvEG.noYN.JCEr58l.pXReDPjmxxhZe6SaWV0CZfG', NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
