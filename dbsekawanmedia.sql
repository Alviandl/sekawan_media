/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : dbsekawanmedia

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 23/03/2023 07:06:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `t_jabatan`;
CREATE TABLE `t_jabatan`  (
  `id_jabatan` int(10) NOT NULL AUTO_INCREMENT,
  `nm_jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_atasan` int(10) NOT NULL,
  `created` datetime(0) NOT NULL,
  `updated` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_jabatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 101 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_jabatan
-- ----------------------------
INSERT INTO `t_jabatan` VALUES (1, 'Manager 1', 2, '2023-03-21 16:08:57', '2023-03-22 16:13:16');
INSERT INTO `t_jabatan` VALUES (2, 'Senior Manager 1', 0, '2023-03-21 16:10:51', '2023-03-22 16:14:28');
INSERT INTO `t_jabatan` VALUES (3, 'Manager 2', 4, '2023-03-21 16:10:51', '2023-03-22 16:13:42');
INSERT INTO `t_jabatan` VALUES (4, 'Senior Manager 2', 0, '2023-03-21 16:10:51', NULL);
INSERT INTO `t_jabatan` VALUES (99, 'ADMIN', 0, '2023-03-21 16:07:44', '2023-03-22 15:46:08');

-- ----------------------------
-- Table structure for t_kendaraan
-- ----------------------------
DROP TABLE IF EXISTS `t_kendaraan`;
CREATE TABLE `t_kendaraan`  (
  `id_kendaraan` int(10) NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `merk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_pelayanan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `updated` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_kendaraan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_kendaraan
-- ----------------------------
INSERT INTO `t_kendaraan` VALUES (1, 'N 9000 ABC', 'Avanza', 'Penumpang', '2023-03-21 16:36:38', NULL);
INSERT INTO `t_kendaraan` VALUES (2, 'N 9001 ABC', 'Xenia', 'Penumpang', '2023-03-21 16:37:03', NULL);
INSERT INTO `t_kendaraan` VALUES (3, 'N 9002 ABC', 'Xenia', 'Penumpang', '2023-03-21 16:38:08', NULL);
INSERT INTO `t_kendaraan` VALUES (4, 'N 8000 CBA', 'Daihatsu Gran Max', 'Barang', '2023-03-21 16:39:53', '2023-03-21 16:42:11');
INSERT INTO `t_kendaraan` VALUES (5, 'N 7000 BCA', 'L300', 'Barang', '2023-03-21 16:44:46', NULL);

-- ----------------------------
-- Table structure for t_log
-- ----------------------------
DROP TABLE IF EXISTS `t_log`;
CREATE TABLE `t_log`  (
  `id_log` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nipp` int(10) NOT NULL,
  `aksi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 98 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_log
-- ----------------------------
INSERT INTO `t_log` VALUES (1, '127.0.0.1', 1234, 'Logout Aplikasi', '2023-03-22 16:52:07');
INSERT INTO `t_log` VALUES (2, '127.0.0.1', 123, 'Login Gagal', '2023-03-22 16:52:14');
INSERT INTO `t_log` VALUES (3, '127.0.0.1', 1234, 'Login Sukses', '2023-03-22 16:52:34');
INSERT INTO `t_log` VALUES (4, '127.0.0.1', 1234, 'Tambah Data Pengajuan Pemakaian Mobil', '2023-03-22 16:53:20');
INSERT INTO `t_log` VALUES (5, '127.0.0.1', 1234, 'Ubah Data Pengajuan Pemakaian Mobil', '2023-03-22 16:54:59');
INSERT INTO `t_log` VALUES (6, '127.0.0.1', 1234, 'Tambah Data Pengajuan Pemakaian Mobil', '2023-03-22 16:56:39');
INSERT INTO `t_log` VALUES (7, '127.0.0.1', 1234, 'Ubah Data Pengajuan Pemakaian Mobil', '2023-03-22 16:56:57');
INSERT INTO `t_log` VALUES (8, '127.0.0.1', 1234, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 17:02:57');
INSERT INTO `t_log` VALUES (9, '127.0.0.1', 1234, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 17:03:02');
INSERT INTO `t_log` VALUES (10, '127.0.0.1', 1234, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 17:03:36');
INSERT INTO `t_log` VALUES (11, '127.0.0.1', 1234, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 17:03:38');
INSERT INTO `t_log` VALUES (12, '127.0.0.1', 1234, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 17:03:50');
INSERT INTO `t_log` VALUES (13, '127.0.0.1', 1234, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 17:04:20');
INSERT INTO `t_log` VALUES (14, '127.0.0.1', 1234, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 17:04:39');
INSERT INTO `t_log` VALUES (15, '127.0.0.1', 1234, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 17:05:03');
INSERT INTO `t_log` VALUES (16, '127.0.0.1', 1234, 'Logout Aplikasi', '2023-03-22 17:39:00');
INSERT INTO `t_log` VALUES (17, '127.0.0.1', 0, 'Login Gagal', '2023-03-22 17:39:14');
INSERT INTO `t_log` VALUES (18, '127.0.0.1', 1111, 'Login Sukses', '2023-03-22 17:39:24');
INSERT INTO `t_log` VALUES (19, '127.0.0.1', 7904125, 'Logout Aplikasi', '2023-03-22 18:05:34');
INSERT INTO `t_log` VALUES (20, '127.0.0.1', 1234, 'Login Sukses', '2023-03-22 18:05:39');
INSERT INTO `t_log` VALUES (21, '127.0.0.1', 1234, 'Logout Aplikasi', '2023-03-22 18:05:47');
INSERT INTO `t_log` VALUES (22, '127.0.0.1', 1111, 'Login Sukses', '2023-03-22 18:05:55');
INSERT INTO `t_log` VALUES (23, '127.0.0.1', 1111, 'Logout Aplikasi', '2023-03-22 18:42:51');
INSERT INTO `t_log` VALUES (24, '127.0.0.1', 4444, 'Login Sukses', '2023-03-22 18:46:44');
INSERT INTO `t_log` VALUES (25, '127.0.0.1', 4444, 'Logout Aplikasi', '2023-03-22 18:47:35');
INSERT INTO `t_log` VALUES (26, '127.0.0.1', 1111, 'Login Sukses', '2023-03-22 18:47:44');
INSERT INTO `t_log` VALUES (27, '127.0.0.1', 1111, 'Logout Aplikasi', '2023-03-22 18:47:52');
INSERT INTO `t_log` VALUES (28, '127.0.0.1', 4444, 'Login Sukses', '2023-03-22 18:50:34');
INSERT INTO `t_log` VALUES (29, '127.0.0.1', 4444, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 18:50:39');
INSERT INTO `t_log` VALUES (30, '127.0.0.1', 4444, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 18:51:17');
INSERT INTO `t_log` VALUES (31, '127.0.0.1', 4444, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 18:51:37');
INSERT INTO `t_log` VALUES (32, '127.0.0.1', 4444, 'Logout Aplikasi', '2023-03-22 18:53:29');
INSERT INTO `t_log` VALUES (33, '127.0.0.1', 1234, 'Login Sukses', '2023-03-22 18:55:31');
INSERT INTO `t_log` VALUES (34, '127.0.0.1', 1234, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 18:55:45');
INSERT INTO `t_log` VALUES (35, '127.0.0.1', 1234, 'Logout Aplikasi', '2023-03-22 18:55:49');
INSERT INTO `t_log` VALUES (36, '127.0.0.1', 1111, 'Login Sukses', '2023-03-22 18:55:55');
INSERT INTO `t_log` VALUES (37, '127.0.0.1', 1111, 'Menyetujui Data Pengajuan Pemakaian Mobil', '2023-03-22 18:56:03');
INSERT INTO `t_log` VALUES (38, '127.0.0.1', 1111, 'Menyetujui Data Pengajuan Pemakaian Mobil', '2023-03-22 18:57:17');
INSERT INTO `t_log` VALUES (39, '127.0.0.1', 1111, 'Lihat Detail Data Pengajuan Pemakaian Mobil', '2023-03-22 19:42:56');
INSERT INTO `t_log` VALUES (40, '127.0.0.1', 1111, 'Logout Aplikasi', '2023-03-22 19:49:36');
INSERT INTO `t_log` VALUES (41, '127.0.0.1', 1234, 'Login Sukses', '2023-03-22 19:49:41');
INSERT INTO `t_log` VALUES (42, '127.0.0.1', 1234, 'Logout Aplikasi', '2023-03-22 19:50:14');
INSERT INTO `t_log` VALUES (43, '127.0.0.1', 1111, 'Login Sukses', '2023-03-22 19:50:19');
INSERT INTO `t_log` VALUES (44, '127.0.0.1', 1111, 'Logout Aplikasi', '2023-03-22 19:50:27');
INSERT INTO `t_log` VALUES (45, '127.0.0.1', 3333, 'Login Sukses', '2023-03-22 19:50:38');
INSERT INTO `t_log` VALUES (46, '127.0.0.1', 3333, 'Logout Aplikasi', '2023-03-22 19:50:46');
INSERT INTO `t_log` VALUES (47, '127.0.0.1', 1111, 'Login Sukses', '2023-03-22 19:50:52');
INSERT INTO `t_log` VALUES (48, '127.0.0.1', 1111, 'Menyetujui Data Pengajuan Pemakaian Mobil', '2023-03-22 19:50:57');
INSERT INTO `t_log` VALUES (49, '127.0.0.1', 1111, 'Logout Aplikasi', '2023-03-22 19:51:01');
INSERT INTO `t_log` VALUES (50, '127.0.0.1', 3333, 'Login Sukses', '2023-03-22 19:51:07');
INSERT INTO `t_log` VALUES (51, '127.0.0.1', 3333, 'Logout Aplikasi', '2023-03-22 20:01:04');
INSERT INTO `t_log` VALUES (52, '127.0.0.1', 1111, 'Login Sukses', '2023-03-22 20:01:10');
INSERT INTO `t_log` VALUES (53, '127.0.0.1', 1111, 'Logout Aplikasi', '2023-03-22 20:03:59');
INSERT INTO `t_log` VALUES (54, '127.0.0.1', 3333, 'Login Sukses', '2023-03-22 20:04:04');
INSERT INTO `t_log` VALUES (55, '127.0.0.1', 3333, 'Menyetujui Data Pengajuan Pemakaian Mobil', '2023-03-22 20:04:10');
INSERT INTO `t_log` VALUES (56, '127.0.0.1', 3333, 'Logout Aplikasi', '2023-03-22 20:04:15');
INSERT INTO `t_log` VALUES (57, '127.0.0.1', 3333, 'Login Sukses', '2023-03-22 20:06:23');
INSERT INTO `t_log` VALUES (58, '127.0.0.1', 3333, 'Logout Aplikasi', '2023-03-22 20:06:31');
INSERT INTO `t_log` VALUES (59, '127.0.0.1', 1111, 'Login Sukses', '2023-03-22 20:06:35');
INSERT INTO `t_log` VALUES (60, '127.0.0.1', 1111, 'Logout Aplikasi', '2023-03-22 20:07:15');
INSERT INTO `t_log` VALUES (61, '127.0.0.1', 3333, 'Login Sukses', '2023-03-22 20:07:31');
INSERT INTO `t_log` VALUES (62, '127.0.0.1', 3333, 'Logout Aplikasi', '2023-03-22 20:07:37');
INSERT INTO `t_log` VALUES (63, '127.0.0.1', 1111, 'Login Sukses', '2023-03-22 20:07:55');
INSERT INTO `t_log` VALUES (64, '127.0.0.1', 1111, 'Menyetujui Data Pengajuan Pemakaian Mobil', '2023-03-22 20:08:03');
INSERT INTO `t_log` VALUES (65, '127.0.0.1', 1111, 'Logout Aplikasi', '2023-03-22 20:08:12');
INSERT INTO `t_log` VALUES (66, '127.0.0.1', 3333, 'Login Sukses', '2023-03-22 20:08:17');
INSERT INTO `t_log` VALUES (67, '127.0.0.1', 3333, 'Menolak Data Pengajuan Pemakaian Mobil', '2023-03-22 20:09:34');
INSERT INTO `t_log` VALUES (68, '127.0.0.1', 3333, 'Logout Aplikasi', '2023-03-22 20:09:57');
INSERT INTO `t_log` VALUES (69, '127.0.0.1', 1111, 'Login Sukses', '2023-03-22 20:10:01');
INSERT INTO `t_log` VALUES (70, '127.0.0.1', 1111, 'Logout Aplikasi', '2023-03-22 20:10:08');
INSERT INTO `t_log` VALUES (71, '127.0.0.1', 1234, 'Login Sukses', '2023-03-22 20:10:15');
INSERT INTO `t_log` VALUES (72, '127.0.0.1', 1234, 'Logout Aplikasi', '2023-03-22 20:11:46');
INSERT INTO `t_log` VALUES (73, '127.0.0.1', 1111, 'Login Sukses', '2023-03-22 20:11:55');
INSERT INTO `t_log` VALUES (74, '127.0.0.1', 1111, 'Logout Aplikasi', '2023-03-22 20:12:05');
INSERT INTO `t_log` VALUES (75, '127.0.0.1', 1234, 'Login Sukses', '2023-03-22 20:12:10');
INSERT INTO `t_log` VALUES (76, '127.0.0.1', 1234, 'Login Sukses', '2023-03-23 03:35:53');
INSERT INTO `t_log` VALUES (77, '127.0.0.1', 1234, 'Tambah Data Pengajuan Pemakaian Mobil', '2023-03-23 03:37:28');
INSERT INTO `t_log` VALUES (78, '127.0.0.1', 1234, 'Logout Aplikasi', '2023-03-23 03:37:38');
INSERT INTO `t_log` VALUES (79, '127.0.0.1', 2222, 'Login Sukses', '2023-03-23 03:37:54');
INSERT INTO `t_log` VALUES (80, '127.0.0.1', 2222, 'Menyetujui Data Pengajuan Pemakaian Mobil', '2023-03-23 03:38:01');
INSERT INTO `t_log` VALUES (81, '127.0.0.1', 2222, 'Logout Aplikasi', '2023-03-23 03:38:03');
INSERT INTO `t_log` VALUES (82, '127.0.0.1', 3333, 'Login Sukses', '2023-03-23 03:38:09');
INSERT INTO `t_log` VALUES (83, '127.0.0.1', 3333, 'Menyetujui Data Pengajuan Pemakaian Mobil', '2023-03-23 03:38:24');
INSERT INTO `t_log` VALUES (84, '127.0.0.1', 3333, 'Logout Aplikasi', '2023-03-23 03:38:30');
INSERT INTO `t_log` VALUES (85, '127.0.0.1', 2222, 'Login Sukses', '2023-03-23 03:38:39');
INSERT INTO `t_log` VALUES (86, '127.0.0.1', 2222, 'Logout Aplikasi', '2023-03-23 03:38:46');
INSERT INTO `t_log` VALUES (87, '127.0.0.1', 1234, 'Login Sukses', '2023-03-23 03:39:06');
INSERT INTO `t_log` VALUES (88, '127.0.0.1', 1234, 'Export Data Laporan Pemakaian Mobil', '2023-03-23 05:13:00');
INSERT INTO `t_log` VALUES (89, '127.0.0.1', 1234, 'Export Data Laporan Pemakaian Mobil', '2023-03-23 05:13:06');
INSERT INTO `t_log` VALUES (90, '127.0.0.1', 1234, 'Export Data Laporan Pemakaian Mobil', '2023-03-23 05:23:41');
INSERT INTO `t_log` VALUES (91, '127.0.0.1', 1234, 'Export Data Laporan Pemakaian Mobil', '2023-03-23 05:29:00');
INSERT INTO `t_log` VALUES (92, '127.0.0.1', 1234, 'Export Data Laporan Pemakaian Mobil', '2023-03-23 05:49:00');
INSERT INTO `t_log` VALUES (93, '127.0.0.1', 1234, 'Logout Aplikasi', '2023-03-23 07:02:03');
INSERT INTO `t_log` VALUES (94, '127.0.0.1', 1234, 'Login Sukses', '2023-03-23 07:02:10');
INSERT INTO `t_log` VALUES (95, '127.0.0.1', 1234, 'Logout Aplikasi', '2023-03-23 07:02:15');
INSERT INTO `t_log` VALUES (96, '127.0.0.1', 1111, 'Login Sukses', '2023-03-23 07:02:22');
INSERT INTO `t_log` VALUES (97, '127.0.0.1', 1111, 'Logout Aplikasi', '2023-03-23 07:02:31');

-- ----------------------------
-- Table structure for t_pemeriksa
-- ----------------------------
DROP TABLE IF EXISTS `t_pemeriksa`;
CREATE TABLE `t_pemeriksa`  (
  `id_pemeriksa` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `id_pengajuan` int(10) NOT NULL,
  `no_urut` int(10) NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pemeriksa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pemeriksa
-- ----------------------------
INSERT INTO `t_pemeriksa` VALUES (3, 2, 1, 1, 'Z');
INSERT INTO `t_pemeriksa` VALUES (4, 4, 1, 2, 'Y');
INSERT INTO `t_pemeriksa` VALUES (7, 5, 2, 1, 'Y');
INSERT INTO `t_pemeriksa` VALUES (8, 6, 2, 2, 'X');
INSERT INTO `t_pemeriksa` VALUES (9, 3, 3, 1, 'Z');
INSERT INTO `t_pemeriksa` VALUES (10, 4, 3, 2, 'Z');

-- ----------------------------
-- Table structure for t_pengajuan
-- ----------------------------
DROP TABLE IF EXISTS `t_pengajuan`;
CREATE TABLE `t_pengajuan`  (
  `id_pengajuan` int(10) NOT NULL AUTO_INCREMENT,
  `no_pengajuan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_mobil` int(10) NULL DEFAULT NULL,
  `id_sopir` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  `lokasi_awal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi_tujuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jam_mulai_aktual` datetime(0) NOT NULL,
  `jam_selesai_aktual` datetime(0) NOT NULL,
  `alasan_pemakaian` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime(0) NOT NULL,
  `updated` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `is_deleted` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_pengajuan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pengajuan
-- ----------------------------
INSERT INTO `t_pengajuan` VALUES (1, 'PM-xVsqYZ', 2, 1, 4, 'Kantor Pusat', 'Kantor Cabang', '2023-03-22 09:00:00', '2023-03-22 10:00:00', 'Menyerahkan Dokumen Penting', '2023-03-22 16:53:20', '2023-03-22 20:09:34', 0);
INSERT INTO `t_pengajuan` VALUES (2, 'PM-UvTOkq', 5, 4, 1, 'Tambang 1', 'Tambang 4', '2023-03-23 09:00:00', '2023-03-23 11:00:00', 'Mengantar Barang/Kabel', '2023-03-22 16:56:39', '2023-03-23 05:39:38', 0);
INSERT INTO `t_pengajuan` VALUES (3, 'PM-B4zFfi', 1, 1, 3, 'Kantor Pusat', 'Tambang 1', '2023-03-23 08:00:00', '2023-03-23 11:00:00', 'Ada Keperluan', '2023-03-23 03:37:28', '2023-03-23 05:18:01', 0);

-- ----------------------------
-- Table structure for t_sopir
-- ----------------------------
DROP TABLE IF EXISTS `t_sopir`;
CREATE TABLE `t_sopir`  (
  `id_sopir` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `umur` int(2) NOT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `updated` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_sopir`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_sopir
-- ----------------------------
INSERT INTO `t_sopir` VALUES (1, 'Ujang', 27, '2023-03-21 16:17:37', NULL);
INSERT INTO `t_sopir` VALUES (2, 'Bagus', 30, '2023-03-21 16:17:53', NULL);
INSERT INTO `t_sopir` VALUES (3, 'Diar', 28, '2023-03-21 16:18:09', NULL);
INSERT INTO `t_sopir` VALUES (4, 'Parto', 32, '2023-03-21 16:18:39', NULL);

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user`  (
  `id_user` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` int(10) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_jabatan` int(10) NOT NULL,
  `role` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `created` datetime(0) NOT NULL DEFAULT current_timestamp(),
  `updated` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES (1, 'Admin', 1234, 'e10adc3949ba59abbe56e057f20f883e', 99, 1, 1, '2023-03-21 15:46:48', '2023-03-22 15:46:28');
INSERT INTO `t_user` VALUES (2, 'Agus', 1111, 'e10adc3949ba59abbe56e057f20f883e', 1, 2, 1, '2023-03-21 15:48:05', '2023-03-21 15:49:02');
INSERT INTO `t_user` VALUES (3, 'Ahmad', 2222, 'e10adc3949ba59abbe56e057f20f883e', 1, 2, 1, '2023-03-21 15:49:40', '2023-03-22 18:54:35');
INSERT INTO `t_user` VALUES (4, 'Budi', 3333, 'e10adc3949ba59abbe56e057f20f883e', 2, 2, 1, '2023-03-21 15:50:04', '2023-03-22 18:54:40');
INSERT INTO `t_user` VALUES (5, 'Bambang', 4444, 'e10adc3949ba59abbe56e057f20f883e', 3, 2, 1, '2023-03-21 15:50:24', '2023-03-22 18:54:41');
INSERT INTO `t_user` VALUES (6, 'Cepi', 5555, 'e10adc3949ba59abbe56e057f20f883e', 4, 2, 1, '2023-03-21 16:02:24', '2023-03-22 16:14:50');

SET FOREIGN_KEY_CHECKS = 1;
