/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50532
 Source Host           : localhost:3306
 Source Schema         : lentera

 Target Server Type    : MySQL
 Target Server Version : 50532
 File Encoding         : 65001

 Date: 17/01/2020 18:05:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cj_bagi_untung
-- ----------------------------
DROP TABLE IF EXISTS `cj_bagi_untung`;
CREATE TABLE `cj_bagi_untung`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for isi_web
-- ----------------------------
DROP TABLE IF EXISTS `isi_web`;
CREATE TABLE `isi_web`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode`(`kode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 89 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of isi_web
-- ----------------------------
INSERT INTO `isi_web` VALUES (1, 'home_4_title1a', 'LENTERA DIGITAL INDONESIA');
INSERT INTO `isi_web` VALUES (2, 'home_4_title1b', 'KOPERASI SIMPAN PINJAM');
INSERT INTO `isi_web` VALUES (3, 'home_4_title1c', 'Bersama membangun ekonomi gotong royong');
INSERT INTO `isi_web` VALUES (4, 'home_4_img1', 'isi_5df060127048b5_54578535.png');
INSERT INTO `isi_web` VALUES (5, 'home_5a_judul1', 'Koperasi Digital yang');
INSERT INTO `isi_web` VALUES (6, 'home_5a_judul2', 'Tansparan');
INSERT INTO `isi_web` VALUES (7, 'home_5a_judul3', 'dan memudahkan anggota untuk mengakses segala aktivitas usaha koperasi');
INSERT INTO `isi_web` VALUES (8, 'home_5b_judul1', 'Koperasi Lentera Digital Indonesia, koperasi');
INSERT INTO `isi_web` VALUES (9, 'home_5b_judul2a', 'transparan');
INSERT INTO `isi_web` VALUES (10, 'home_5b_judul2b', 'digital');
INSERT INTO `isi_web` VALUES (11, 'home_5b_judul2c', 'terpercaya');
INSERT INTO `isi_web` VALUES (12, 'home_5b_judul3', '.');
INSERT INTO `isi_web` VALUES (13, 'home_5b_keterangan', 'Membangun professionalisme dan kemandirian');
INSERT INTO `isi_web` VALUES (14, 'home_5c_1a', 'icon-support');
INSERT INTO `isi_web` VALUES (15, 'home_5c_1b', 'CUSTOMER SUPPORT');
INSERT INTO `isi_web` VALUES (16, 'home_5c_1c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.');
INSERT INTO `isi_web` VALUES (17, 'home_5c_2a', 'icon-layers');
INSERT INTO `isi_web` VALUES (18, 'home_5c_2b', 'SLIDERS');
INSERT INTO `isi_web` VALUES (19, 'home_5c_2c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.');
INSERT INTO `isi_web` VALUES (20, 'home_5c_3a', 'icon-menu');
INSERT INTO `isi_web` VALUES (21, 'home_5c_3b', 'BUTTONS');
INSERT INTO `isi_web` VALUES (22, 'home_5c_3c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.');
INSERT INTO `isi_web` VALUES (23, 'home_5c_4a', 'icon-doc');
INSERT INTO `isi_web` VALUES (24, 'home_5c_4b', 'HTML5 / CSS3 / JS');
INSERT INTO `isi_web` VALUES (25, 'home_5c_4c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.');
INSERT INTO `isi_web` VALUES (26, 'home_5c_5a', 'icon-user');
INSERT INTO `isi_web` VALUES (27, 'home_5c_5b', 'ICONS');
INSERT INTO `isi_web` VALUES (28, 'home_5c_5c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.');
INSERT INTO `isi_web` VALUES (29, 'home_5c_6a', 'icon-screen-desktop');
INSERT INTO `isi_web` VALUES (30, 'home_5c_6b', 'LIGHTBOX');
INSERT INTO `isi_web` VALUES (31, 'home_5c_6c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.');
INSERT INTO `isi_web` VALUES (32, 'home_1_img', 'isi_5de75361ad8789_44840037.jpeg');
INSERT INTO `isi_web` VALUES (33, 'home_1_judul1', 'KSP');
INSERT INTO `isi_web` VALUES (34, 'home_1_judul2', 'Lentera Digital Indonesia');
INSERT INTO `isi_web` VALUES (35, 'home_1_isi1', 'Koperasi Simpan Pinjam yang berbasis digital untuk menyahuti kebutuhan efisiensi dan transparansi dalam pengelolaannya. Koperasi Simpan Pinjam berskala Provinsi yang didirikan pada tanggal 30 Desember 2019 di Makassar tepatnya di Jalan Toddopuli X Baru Blok A1 No. 1F.');
INSERT INTO `isi_web` VALUES (36, 'home_1_isi2', 'Digital dan Transparan');
INSERT INTO `isi_web` VALUES (40, 'home_5d_1a', 'icon-people');
INSERT INTO `isi_web` VALUES (41, 'home_5d_1b', 'TERPERCAYA');
INSERT INTO `isi_web` VALUES (42, 'home_5d_1c', 'Terpercaya');
INSERT INTO `isi_web` VALUES (43, 'home_5d_2a', 'icon-globe');
INSERT INTO `isi_web` VALUES (44, 'home_5d_2b', 'DIGITAL');
INSERT INTO `isi_web` VALUES (45, 'home_5d_2c', 'Secara Digital');
INSERT INTO `isi_web` VALUES (46, 'home_5d_3a', 'icon-docs');
INSERT INTO `isi_web` VALUES (47, 'home_5d_3b', 'TRANSPARAN');
INSERT INTO `isi_web` VALUES (48, 'home_5d_3c', 'Transparan dalam pengelolaannya');
INSERT INTO `isi_web` VALUES (49, 'home_5d_4a', 'icon-energy');
INSERT INTO `isi_web` VALUES (50, 'home_5d_4b', 'MUDAH');
INSERT INTO `isi_web` VALUES (51, 'home_5d_4c', 'Mudah');
INSERT INTO `isi_web` VALUES (52, 'tentang_1_img', '');
INSERT INTO `isi_web` VALUES (53, 'tentang_1_judul1', 'Lentera Digital Indonesia');
INSERT INTO `isi_web` VALUES (54, 'tentang_1_judul2', 'Koperasi Simpan Pinjam');
INSERT INTO `isi_web` VALUES (55, 'tentang_1_isi1', 'Koperasi Simpan Pinjam berskala Provinsi yang didirikan pada tanggal 30 Desember 2019 di Makassar tepatnya di Jalan Toddopuli X Baru Blok A1 No. 1F. Koperasi Simpan Pinjam yang berbasis digital untuk menyahuti kebutuhan efisiensi dan transparansi dalam pengelolaannya.');
INSERT INTO `isi_web` VALUES (56, 'tentang_1_isi2', 'Beranggotakan 29 orang awal.');
INSERT INTO `isi_web` VALUES (57, 'visimisi_1_title1', 'Visi dan Misi');
INSERT INTO `isi_web` VALUES (58, 'visimisi_1_title2', 'Visi dan Misi Koperasi Simpan Pinjam Lentera Digital Indonesia');
INSERT INTO `isi_web` VALUES (59, 'visimisi_1_visi', '<ul><li>Membangun professionalisme dan kemandirian</li><li>Membangun semangat berkoperasi bagi generasi muda</li><li>Mengenalkan koperasi yang bisa mengikuti perkembangan jaman</li></ul>');
INSERT INTO `isi_web` VALUES (60, 'visimisi_1_misi', '<ul><li>Meningkatkan Kesejahteraan Anggota</li><li>Transparansi dalam pengelolaan kegiatan koperasi</li><li>Melayani anggota dengan professional berdasarkan prinsip-prinsip koperasi</li></ul>');
INSERT INTO `isi_web` VALUES (61, 'visimisi_1_quotes1', 'Ayo berkoperasi!');
INSERT INTO `isi_web` VALUES (62, 'visimisi_1_quotes2', 'Kasim (Ketua KSP Lentera Digital Indonesia)');
INSERT INTO `isi_web` VALUES (63, 'visimisi_2_img2a', 'isi_5de77bcf142e34_97390963.jpeg');
INSERT INTO `isi_web` VALUES (64, 'visimisi_2_img2b', 'isi_5de77ca6979bb9_62710837.jpeg');
INSERT INTO `isi_web` VALUES (65, 'visimisi_2_img2c', 'isi_5de77cb7752d06_87640798.jpeg');
INSERT INTO `isi_web` VALUES (66, 'visimisi_2_img2d', 'isi_5de77cbe481ad1_27180750.jpeg');
INSERT INTO `isi_web` VALUES (67, 'header_1', '');
INSERT INTO `isi_web` VALUES (68, 'adrt', '<p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>BAB I<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>NAMA DAN TEMPAT KEDUDUKAN<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed><o> </o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 1<o></o></span></p><p class=\"MsoListParagraphCxSpFirst\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>1.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nini bernama Koperasi LENTERA DIGITAL INDONESIA dan selanjutnya dalam Anggaran\r\nDasar ini disebut Koperasi. <o></o></span></p><p class=\"MsoListParagraphCxSpLast\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>2.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nini berkedudukan di Jl. Toddopuli X Blok A1 No. 1F, Makassar, Sulawesi –\r\nSelatan.  <o></o></span></p><p class=\"MsoNormal\"><span xss=removed><o> </o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>BAB II<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>LANDASAN, AZAS DAN PRINSIP<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 2<o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Koperasi\r\nberdasarkan Pancasila dan Undang-Undang Dasar 1945 serta berdasarkan atas azas\r\ngotong royong. <o></o></span></p><p class=\"MsoNormal\"><span xss=removed> <o></o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 3<o></o></span></p><p class=\"MsoListParagraphCxSpFirst\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>1.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nmelakukan kegiatannya berdasarkan prinsip-prinsip Koperasi yaitu : <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>a)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Keanggotaan\r\nbersifat sukarela dan terbuka; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>b)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pengelolaan\r\ndilakukan secara demokratis; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>c)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pembagian\r\nSHU dilakukan secara adil sebanding dengan besarnya jasa usaha masing–masing\r\nanggota; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>d)<span xss=removed>    \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pemberian\r\nbalas jasa yang terbatas terhadap modal; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>e)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Kemandirian;\r\n<o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>f)<span xss=removed>      \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Melaksanakan\r\npendidikan perkoperasian bagi anggota; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>g)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Kerjasama\r\nantar Koperasi. <o></o></span></p><p class=\"MsoListParagraphCxSpLast\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>2.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nsebagai badan usaha dalam melaksanakan kegiatannya mengorganisir pemanfaatan\r\ndan pendayagunaan sumber daya ekonomi para anggotanya atas dasar\r\nprinsip-prinsip Koperasi seperti tersebut pada ayat (1) di atas dan sesuai\r\ndengan kaidah-kaidah usaha ekonomi. <o></o></span></p><p class=\"MsoNormal\" align=\"center\" xss=\"removed\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o> </o></p>');
INSERT INTO `isi_web` VALUES (69, 'adrt_title1', 'AD/ART');
INSERT INTO `isi_web` VALUES (70, 'adrt_title2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna.');
INSERT INTO `isi_web` VALUES (71, 'blog_title', 'Program Kami');
INSERT INTO `isi_web` VALUES (72, 'blog_subtitle', 'Program Kami');
INSERT INTO `isi_web` VALUES (73, 'struktur_a1', 'Pembina');
INSERT INTO `isi_web` VALUES (74, 'struktur_b1', 'Pengawas');
INSERT INTO `isi_web` VALUES (75, 'struktur_c1', 'Ketua');
INSERT INTO `isi_web` VALUES (76, 'struktur_d1', 'Sekretaris');
INSERT INTO `isi_web` VALUES (77, 'struktur_e1', 'Bendahara');
INSERT INTO `isi_web` VALUES (78, 'struktur_a2', 'isi_5de78e978e82b5_84122161.jpeg');
INSERT INTO `isi_web` VALUES (79, 'struktur_b2', '');
INSERT INTO `isi_web` VALUES (80, 'struktur_c2', '');
INSERT INTO `isi_web` VALUES (81, 'struktur_d2', '');
INSERT INTO `isi_web` VALUES (82, 'struktur_e2', '');
INSERT INTO `isi_web` VALUES (83, 'lain_header', 'isi_5df063b40813b8_59977310.png');
INSERT INTO `isi_web` VALUES (84, 'lain_footer_img', 'isi_5df0a1189d91a9_66742409.png');
INSERT INTO `isi_web` VALUES (85, 'lain_footer_ket', 'Koperasi Digital yang Tansparan dan memudahkan anggota untuk mengakses segala aktivitas usaha koperasi');
INSERT INTO `isi_web` VALUES (86, 'pengurus_adrt', '<p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>BAB I<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>NAMA DAN TEMPAT KEDUDUKAN<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed><o> </o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 1<o></o></span></p><p class=\"MsoListParagraphCxSpFirst\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>1.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nini bernama Koperasi LENTERA DIGITAL INDONESIA dan selanjutnya dalam Anggaran\r\nDasar ini disebut Koperasi. <o></o></span></p><p class=\"MsoListParagraphCxSpLast\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>2.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nini berkedudukan di Jl. Toddopuli X Blok A1 No. 1F, Makassar, Sulawesi –\r\nSelatan.  <o></o></span></p><p class=\"MsoNormal\"><span xss=removed><o> </o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>BAB II<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>LANDASAN, AZAS DAN PRINSIP<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 2<o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Koperasi\r\nberdasarkan Pancasila dan Undang-Undang Dasar 1945 serta berdasarkan atas azas\r\ngotong royong. <o></o></span></p><p class=\"MsoNormal\"><span xss=removed> <o></o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 3<o></o></span></p><p class=\"MsoListParagraphCxSpFirst\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>1.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nmelakukan kegiatannya berdasarkan prinsip-prinsip Koperasi yaitu : <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>a)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Keanggotaan\r\nbersifat sukarela dan terbuka; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>b)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pengelolaan\r\ndilakukan secara demokratis; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>c)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pembagian\r\nSHU dilakukan secara adil sebanding dengan besarnya jasa usaha masing–masing\r\nanggota; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>d)<span xss=removed>    \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pemberian\r\nbalas jasa yang terbatas terhadap modal; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>e)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Kemandirian;\r\n<o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>f)<span xss=removed>      \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Melaksanakan\r\npendidikan perkoperasian bagi anggota; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>g)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Kerjasama\r\nantar Koperasi. <o></o></span></p><p class=\"MsoListParagraphCxSpLast\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>2.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nsebagai badan usaha dalam melaksanakan kegiatannya mengorganisir pemanfaatan\r\ndan pendayagunaan sumber daya ekonomi para anggotanya atas dasar\r\nprinsip-prinsip Koperasi seperti tersebut pada ayat (1) di atas dan sesuai\r\ndengan kaidah-kaidah usaha ekonomi. <o></o></span></p><p class=\"MsoNormal\" align=\"center\" xss=\"removed\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o> </o></p>');
INSERT INTO `isi_web` VALUES (87, 'pengurus_aturan', '<p>                                    Seperti yang tertera pada AD/ART, berikut sanksi:</p><p>1.Apabila Anggota, Pengurus dan Pengawas melanggar ketentuan Anggaran Dasar/\r\nAnggaran Rumah Tangga dan Peraturan lainnya yang berlaku di Koperasi dikenakan\r\nsanksi oleh Rapat Anggota berupa:\r\n</p><p xss=removed>a) peringatan lisan;\r\n</p><p xss=removed>b) peringatan tertulis;\r\n</p><p xss=removed>c) dipecat dari keanggotaan atau jabatannya;\r\n</p><p xss=removed>d) diberhentikan bukan atas kemauannya sendiri;</p><p xss=removed>\r\ne) diajukan ke Pengadilan.</p><p>2. Ketentuan mengenai sanksi diatur lebih lanjut dalam Anggaran Rumah Tangga. </p><p><br></p>');
INSERT INTO `isi_web` VALUES (88, 'adrt_pdf', 'pdf_5e1e8e94d25682_60697144.pdf');

-- ----------------------------
-- Table structure for login_history
-- ----------------------------
DROP TABLE IF EXISTS `login_history`;
CREATE TABLE `login_history`  (
  `id_log` int(255) NOT NULL AUTO_INCREMENT,
  `id_user` int(255) NOT NULL,
  `ip_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_log`) USING BTREE,
  INDEX `id_member`(`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of login_history
-- ----------------------------
INSERT INTO `login_history` VALUES (1, 16, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'pengurus', '2020-01-15 11:47:43');
INSERT INTO `login_history` VALUES (2, 16, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'pengurus', '2020-01-15 11:50:45');
INSERT INTO `login_history` VALUES (3, 16, '36.79.141.40', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'pengurus', '2020-01-15 11:54:27');
INSERT INTO `login_history` VALUES (4, 1, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'backoffice', '2020-01-15 12:09:19');
INSERT INTO `login_history` VALUES (5, 1, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'backoffice', '2020-01-15 12:11:39');
INSERT INTO `login_history` VALUES (6, 1, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'backoffice', '2020-01-15 13:24:48');
INSERT INTO `login_history` VALUES (7, 16, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'pengurus', '2020-01-15 15:25:52');
INSERT INTO `login_history` VALUES (8, 1, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.3; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4021.2 Safari/537.36', 'anggota', '2020-01-15 16:01:35');
INSERT INTO `login_history` VALUES (9, 1, '182.0.207.183', 'Mozilla/5.0 (Linux; Android 9; MI 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.116 Mobile Safari/537.36', 'anggota', '2020-01-15 16:02:41');
INSERT INTO `login_history` VALUES (10, 1, '180.245.74.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'anggota', '2020-01-15 22:47:30');
INSERT INTO `login_history` VALUES (11, 1, '114.124.179.49', 'Mozilla/5.0 (Linux; Android 9; MI 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.116 Mobile Safari/537.36', 'anggota', '2020-01-16 15:25:35');
INSERT INTO `login_history` VALUES (12, 1, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'backoffice', '2020-01-16 18:00:05');
INSERT INTO `login_history` VALUES (13, 1, '182.1.189.168', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.116 Mobile Safari/537.36', 'anggota', '2020-01-17 10:10:37');
INSERT INTO `login_history` VALUES (14, 16, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'pengurus', '2020-01-17 13:45:48');
INSERT INTO `login_history` VALUES (15, 16, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'pengurus', '2020-01-17 14:41:38');
INSERT INTO `login_history` VALUES (16, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'anggota', '2020-01-17 14:42:50');
INSERT INTO `login_history` VALUES (17, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'anggota', '2020-01-17 16:52:56');

-- ----------------------------
-- Table structure for persen_share_profit
-- ----------------------------
DROP TABLE IF EXISTS `persen_share_profit`;
CREATE TABLE `persen_share_profit`  (
  `id_persen` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bulan` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `profit` decimal(3, 2) NOT NULL COMMENT 'persen',
  PRIMARY KEY (`id_persen`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of persen_share_profit
-- ----------------------------
INSERT INTO `persen_share_profit` VALUES (1, '01', '01', 1.00);
INSERT INTO `persen_share_profit` VALUES (2, '02', '02', 1.00);
INSERT INTO `persen_share_profit` VALUES (3, '03', '03', 1.20);
INSERT INTO `persen_share_profit` VALUES (4, '04', '04', 1.00);
INSERT INTO `persen_share_profit` VALUES (5, '05', '05', 1.00);
INSERT INTO `persen_share_profit` VALUES (6, '06', '06', 1.00);
INSERT INTO `persen_share_profit` VALUES (7, '07', '07', 1.00);
INSERT INTO `persen_share_profit` VALUES (8, '08', '08', 1.00);
INSERT INTO `persen_share_profit` VALUES (9, '09', '09', 1.00);
INSERT INTO `persen_share_profit` VALUES (10, '10', '10', 1.00);
INSERT INTO `persen_share_profit` VALUES (11, '11', '11', 1.00);
INSERT INTO `persen_share_profit` VALUES (12, '12', '12', 1.00);

-- ----------------------------
-- Table structure for pinjaman
-- ----------------------------
DROP TABLE IF EXISTS `pinjaman`;
CREATE TABLE `pinjaman`  (
  `id_setting_pinjaman` int(11) NOT NULL AUTO_INCREMENT,
  `jangka_waktu` int(11) NOT NULL COMMENT 'bulan',
  `bunga` decimal(5, 2) NOT NULL,
  `status` enum('0','1','9') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_setting_pinjaman`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pinjaman
-- ----------------------------
INSERT INTO `pinjaman` VALUES (1, 3, 12.00, '1');
INSERT INTO `pinjaman` VALUES (2, 6, 11.00, '1');
INSERT INTO `pinjaman` VALUES (3, 12, 10.00, '1');

-- ----------------------------
-- Table structure for pwdreset
-- ----------------------------
DROP TABLE IF EXISTS `pwdreset`;
CREATE TABLE `pwdreset`  (
  `id_reset` int(11) NOT NULL AUTO_INCREMENT,
  `resetEmail` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `resetSelector` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `resetToken` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `resetExpires` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_reset`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pwdreset
-- ----------------------------
INSERT INTO `pwdreset` VALUES (1, 'mpampam5@gmail.com', '31373230393638363936', '$2y$10$aPZRLPZKcosq1tBRfiO.duc8BBLYUTnd6CgX/7rLOD1oG9RkWUnvu', '1579251807');

-- ----------------------------
-- Table structure for tb_anggota
-- ----------------------------
DROP TABLE IF EXISTS `tb_anggota`;
CREATE TABLE `tb_anggota`  (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `no_anggota` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_ktp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_hp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kecamatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kelurahan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `provinsi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `pekerjaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `perusahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_perusahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota_perusahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pendidikan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass_tr` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `join_date` datetime NOT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_active` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bank` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_rekening` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE,
  UNIQUE INDEX `no_anggota`(`no_anggota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_anggota
-- ----------------------------
INSERT INTO `tb_anggota` VALUES (1, 0, '0000001', 'pakar03', '$2y$10$6H44nO1cAj26fHlevZsHS.stSp3RIPKXOlcr3V7FEitJRlIkxDn8K', 'Muhammad Fadhil Fauzan', 'mpampam5@gmail.com', 'Ujung Pandang', '01/03/1995', '7371130301950005', '08114174707', 'Jalan Veteran Selatan No 292 I', 'Mamajang', 'Bontoala', 'Makassar', 'Sulawesi Selatan', 90221, 'Wiraswasta', '', '', '', '', 'S1', '$2y$10$SA.xucisSVUYtiLFz5OEMeVlMDk7g1fkJ5Dqfxv9vQZ4Dofe4RHai', '2020-01-15 11:57:44', '1', '1', 'BCA', '7890715600');

-- ----------------------------
-- Table structure for tb_bagi_untung
-- ----------------------------
DROP TABLE IF EXISTS `tb_bagi_untung`;
CREATE TABLE `tb_bagi_untung`  (
  `id_bagi_untung` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_simp_sukarela` int(11) NOT NULL,
  `persen` decimal(3, 2) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_bagi_untung`) USING BTREE,
  INDEX `id_simp_sukarela`(`id_simp_sukarela`) USING BTREE,
  CONSTRAINT `tb_bagi_untung_ibfk_1` FOREIGN KEY (`id_simp_sukarela`) REFERENCES `tb_simpanan_sukarela` (`id_simpanan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_biaya_pendaftaran
-- ----------------------------
DROP TABLE IF EXISTS `tb_biaya_pendaftaran`;
CREATE TABLE `tb_biaya_pendaftaran`  (
  `id_biaya_daftar` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_anggota` int(11) NULL DEFAULT NULL,
  `id_child` int(11) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_biaya_daftar`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  INDEX `id_child`(`id_child`) USING BTREE,
  CONSTRAINT `tb_biaya_pendaftaran_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_biaya_pendaftaran
-- ----------------------------
INSERT INTO `tb_biaya_pendaftaran` VALUES (1, 'BP-0000001', NULL, 1, 25000, '2020-01-15 11:57:44');

-- ----------------------------
-- Table structure for tb_biaya_withdraw
-- ----------------------------
DROP TABLE IF EXISTS `tb_biaya_withdraw`;
CREATE TABLE `tb_biaya_withdraw`  (
  `id_biaya_withdraw` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_withdrawal` int(11) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `keterangan` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_biaya_withdraw`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  INDEX `id_anggota`(`id_withdrawal`) USING BTREE,
  CONSTRAINT `tb_biaya_withdraw_ibfk_1` FOREIGN KEY (`id_withdrawal`) REFERENCES `tb_withdrawal` (`id_withdrawal`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_blog
-- ----------------------------
DROP TABLE IF EXISTS `tb_blog`;
CREATE TABLE `tb_blog`  (
  `id_blog` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  `is_deleted` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_blog`) USING BTREE,
  UNIQUE INDEX `slug`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_blog
-- ----------------------------
INSERT INTO `tb_blog` VALUES (7, 'maknal-logo-lentera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (9, 'maknal-logo-lentera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (12, 'maknal-logo-lentera-digsital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (13, 'maknal-logo-lentersaa-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (14, 'madknal-logo-lentera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (15, 'maknal-logo-lntera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (16, 'maknal-logo-lentera-disital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (17, 'maknal-logo-lentrsaa-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (18, 'maknal-logo-lenytera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (19, 'maknal-ldogo-lentera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (20, 'maknal-logo-lentera-diwgsital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (21, 'maknal-logo-lenterswaa-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (22, 'madknal-logo-lenteera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (23, 'maknal-logo-lfntera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (24, 'maknal-lobgo-lentera-disital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');
INSERT INTO `tb_blog` VALUES (25, 'maknal-logo-lentrsaa-digsital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');

-- ----------------------------
-- Table structure for tb_bonus_sponsor
-- ----------------------------
DROP TABLE IF EXISTS `tb_bonus_sponsor`;
CREATE TABLE `tb_bonus_sponsor`  (
  `id_royalti` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_child` int(11) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_royalti`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  INDEX `id_anggota`(`id_anggota`) USING BTREE,
  INDEX `id_child`(`id_child`) USING BTREE,
  INDEX `id_anggota_2`(`id_anggota`) USING BTREE,
  INDEX `id_anggota_3`(`id_anggota`) USING BTREE,
  CONSTRAINT `tb_bonus_sponsor_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_deposit
-- ----------------------------
DROP TABLE IF EXISTS `tb_deposit`;
CREATE TABLE `tb_deposit`  (
  `id_deposit` int(255) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_anggota` int(255) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `last_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_gateway` int(11) NOT NULL,
  `code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('0','1','2','9') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_deposit`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  UNIQUE INDEX `code`(`code`) USING BTREE,
  INDEX `id_anggota`(`id_anggota`) USING BTREE,
  CONSTRAINT `tb_deposit_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_deposito
-- ----------------------------
DROP TABLE IF EXISTS `tb_deposito`;
CREATE TABLE `tb_deposito`  (
  `id_deposito` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `deviden` decimal(5, 1) NOT NULL,
  `royalti` decimal(5, 1) NOT NULL,
  `bulan` int(11) NOT NULL,
  `kali` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipe` enum('mikro','makro','prioritas') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_deposito`) USING BTREE,
  INDEX `id_anggota`(`id_anggota`) USING BTREE,
  CONSTRAINT `tb_deposito_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_deviden
-- ----------------------------
DROP TABLE IF EXISTS `tb_deviden`;
CREATE TABLE `tb_deviden`  (
  `id_deviden` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_deposito` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_deviden`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  INDEX `id_deposito`(`id_deposito`) USING BTREE,
  CONSTRAINT `tb_deviden_ibfk_1` FOREIGN KEY (`id_deposito`) REFERENCES `tb_deposito` (`id_deposito`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_gateway
-- ----------------------------
DROP TABLE IF EXISTS `tb_gateway`;
CREATE TABLE `tb_gateway`  (
  `id_gateway` int(11) NOT NULL AUTO_INCREMENT,
  `gateway` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_rekening` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `atas_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('1','0','9') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_gateway`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_gateway
-- ----------------------------
INSERT INTO `tb_gateway` VALUES (1, 'MANDIRI', '152-05-5524477-7', 'Koperasi Lentera Digital Indonesia', '1');
INSERT INTO `tb_gateway` VALUES (2, 'BNI', '11111111111111', 'Koperasi Lentera Digital Indonesia', '0');

-- ----------------------------
-- Table structure for tb_komisi_sponsor
-- ----------------------------
DROP TABLE IF EXISTS `tb_komisi_sponsor`;
CREATE TABLE `tb_komisi_sponsor`  (
  `id_komisi_sponsor` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_simp_sukarela` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_child` int(11) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_komisi_sponsor`) USING BTREE,
  INDEX `id_simp_sukarela`(`id_simp_sukarela`) USING BTREE,
  INDEX `id_parent`(`id_parent`) USING BTREE,
  INDEX `id_child`(`id_child`) USING BTREE,
  CONSTRAINT `tb_komisi_sponsor_ibfk_1` FOREIGN KEY (`id_simp_sukarela`) REFERENCES `tb_simpanan_sukarela` (`id_simpanan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tb_komisi_sponsor_ibfk_2` FOREIGN KEY (`id_parent`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tb_komisi_sponsor_ibfk_3` FOREIGN KEY (`id_child`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_lentera_setting
-- ----------------------------
DROP TABLE IF EXISTS `tb_lentera_setting`;
CREATE TABLE `tb_lentera_setting`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nilai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kode`(`kode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_lentera_setting
-- ----------------------------
INSERT INTO `tb_lentera_setting` VALUES (1, 'DEPOSITO_MIKRO_MIN', 'deposito mikro minimal', '500000', '1');
INSERT INTO `tb_lentera_setting` VALUES (2, 'DEPOSITO_MIKRO_MAX', 'deposito mikro maximal', '5000000', '1');
INSERT INTO `tb_lentera_setting` VALUES (3, 'DEPOSITO_MAKRO_MIN', 'deposito makro minimal', '5100000', '1');
INSERT INTO `tb_lentera_setting` VALUES (4, 'DEPOSITO_MAKRO_MAX', 'deposito makro maximal', '500000000', '1');
INSERT INTO `tb_lentera_setting` VALUES (5, 'DEPOSITO_PRIORITAS_MIN', 'deposito prioritas minimal', '501000000', '1');
INSERT INTO `tb_lentera_setting` VALUES (6, 'DEPOSITO_PRIORITAS_MAX', 'deposito prioritas maximal', '5000000000', '1');
INSERT INTO `tb_lentera_setting` VALUES (7, 'BIAYA_PENDAFTARAN', 'biaya pendaftaran', '25000', '1');
INSERT INTO `tb_lentera_setting` VALUES (8, 'DEPO_MIN', 'deposit minimal', '100000', '1');
INSERT INTO `tb_lentera_setting` VALUES (9, 'DEPO_MAX', 'deposit maximal', '5000000000', '1');
INSERT INTO `tb_lentera_setting` VALUES (10, 'CURRENCY', 'mata uang ', 'Rp', '1');
INSERT INTO `tb_lentera_setting` VALUES (11, 'DEPOSIT', 'apakah bisa deposit', '-', '1');
INSERT INTO `tb_lentera_setting` VALUES (12, 'WITHDRAW', 'apakah bisa withdraw', '-', '1');
INSERT INTO `tb_lentera_setting` VALUES (13, 'WD_MIN', 'minimal withdraw', '500000', '1');
INSERT INTO `tb_lentera_setting` VALUES (14, 'WD_MAX', 'maximal withdraw', '500000000', '1');
INSERT INTO `tb_lentera_setting` VALUES (15, 'DAFTAR_ANGGOTA', 'apakah bisa daftar anggota', '-', '1');
INSERT INTO `tb_lentera_setting` VALUES (16, 'SIMPANAN_POKOK', 'simpanan pokok', '250000', '1');
INSERT INTO `tb_lentera_setting` VALUES (17, 'SIMPANAN_WAJIB', 'simpanan wajib', '50000', '1');
INSERT INTO `tb_lentera_setting` VALUES (18, 'DEPOSITO_MIKRO_KONTRAK', 'kontrak(bulan)', '24', '1');
INSERT INTO `tb_lentera_setting` VALUES (19, 'DEPOSITO_MIKRO_DEVIDEN', 'deviden (persen) diterima langsung setelah kontrak berakhir', '100', '1');
INSERT INTO `tb_lentera_setting` VALUES (20, 'DEPOSITO_MAKRO_1_KONTRAK', 'kontrak (bulan)', '3', '1');
INSERT INTO `tb_lentera_setting` VALUES (21, 'DEPOSITO_MAKRO_1_DEVIDEN', 'deviden (persen)', '1', '1');
INSERT INTO `tb_lentera_setting` VALUES (22, 'DEPOSITO_MAKRO_2_KONTRAK', 'kontrak (bulan)', '6', '1');
INSERT INTO `tb_lentera_setting` VALUES (23, 'DEPOSITO_MAKRO_2_DEVIDEN', 'deviden (persen)', '1.5', '1');
INSERT INTO `tb_lentera_setting` VALUES (24, 'DEPOSITO_MAKRO_3_KONTRAK', 'kontrak (bulan)', '12', '1');
INSERT INTO `tb_lentera_setting` VALUES (25, 'DEPOSITO_MAKRO_3_DEVIDEN', 'deviden (persen)', '2.5', '1');
INSERT INTO `tb_lentera_setting` VALUES (26, 'DEPOSITO_PRIORITAS_KONTRAK', 'kontrak (bulan)', '36', '1');
INSERT INTO `tb_lentera_setting` VALUES (27, 'DEPOSITO_PRIORITAS_DEVIDEN', 'deviden pertahun', '50', '1');
INSERT INTO `tb_lentera_setting` VALUES (28, 'DEPOSITO_PRIORITAS_ROYALTI', 'royalti perbulan', '1', '1');
INSERT INTO `tb_lentera_setting` VALUES (29, 'DEPOSITO', 'apakah bisa deposito', '', '0');
INSERT INTO `tb_lentera_setting` VALUES (30, 'TGL', 'tanggal refresh', '2020-02-05 11:54:11', '0');
INSERT INTO `tb_lentera_setting` VALUES (31, 'REFRESH', 'apakah bisa refresh atau tidak', '', '1');
INSERT INTO `tb_lentera_setting` VALUES (32, 'TIMEZONE', 'timezone tanggal', 'Asia/Makassar', '1');
INSERT INTO `tb_lentera_setting` VALUES (33, 'PINJAMAN', 'apakah bisa meminjam', '', '1');
INSERT INTO `tb_lentera_setting` VALUES (34, 'KEUNTUNGAN_KOPERASI', 'keuntungan secara manual', '0', '1');
INSERT INTO `tb_lentera_setting` VALUES (35, 'LOGIN_ANGGOTA', 'apakah anggota bisa login', '', '1');
INSERT INTO `tb_lentera_setting` VALUES (36, 'LOGIN_PENGURUS', 'apakah pengurus bisa login', '', '1');
INSERT INTO `tb_lentera_setting` VALUES (37, 'SIMPANAN', 'apakah bisa menyimpan', '', '1');
INSERT INTO `tb_lentera_setting` VALUES (38, 'CJ_SHARE_PROFIT', 'apakah bisa bagi untung', '', '1');
INSERT INTO `tb_lentera_setting` VALUES (39, 'KOMISI_SPONSOR_AWAL', 'komisi sponsor awal', '5', '1');
INSERT INTO `tb_lentera_setting` VALUES (40, 'KOMISI_SPONSOR_BERJALAN', 'komisi sponsor berjalan', '2.5', '1');

-- ----------------------------
-- Table structure for tb_login
-- ----------------------------
DROP TABLE IF EXISTS `tb_login`;
CREATE TABLE `tb_login`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` enum('admin') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_login
-- ----------------------------
INSERT INTO `tb_login` VALUES (1, 'admin', '$2y$10$uU3FUHwq6JDhTAUqx39FIeHEQJDe2y5v3vBtndkTS.MbzorWTZQDW', 'admin', 'adminweb@gmail.com');

-- ----------------------------
-- Table structure for tb_pengurus
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengurus`;
CREATE TABLE `tb_pengurus`  (
  `id_pengurus` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengurus` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_ktp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_hp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kecamatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kelurahan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pekerjaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `perusahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_perusahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota_perusahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pendidikan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass_tr` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `join_date` datetime NOT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pengurus`) USING BTREE,
  UNIQUE INDEX `no_pengurus`(`no_pengurus`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_pengurus
-- ----------------------------
INSERT INTO `tb_pengurus` VALUES (16, '', 'pengurus', '$2y$10$gxIfxQ2Titwwg0ueGMnNN.FGbnKWKhZ6mK2D6iHoYdWH.IqrRER1i', 'Pengurus', 'aya_maruf@yahoo.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$2y$10$V5LfneQmlCgMfItcnWzEUOEsPsyYWUqM.sQSJaKlka8oZtpN0Dzye', '2019-12-24 00:00:00', '1');

-- ----------------------------
-- Table structure for tb_pinjaman
-- ----------------------------
DROP TABLE IF EXISTS `tb_pinjaman`;
CREATE TABLE `tb_pinjaman`  (
  `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `bunga` decimal(5, 0) NOT NULL COMMENT 'persen',
  `jumlah_bunga` decimal(20, 0) NOT NULL,
  `periode` int(11) NOT NULL COMMENT 'bulan',
  `angsuran` int(11) NOT NULL COMMENT 'berapa kali',
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `status` enum('0','1','9') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pinjaman`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  INDEX `id_anggota`(`id_anggota`) USING BTREE,
  CONSTRAINT `tb_pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_pinjaman_bayar
-- ----------------------------
DROP TABLE IF EXISTS `tb_pinjaman_bayar`;
CREATE TABLE `tb_pinjaman_bayar`  (
  `id_bayar` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_bayar`) USING BTREE,
  INDEX `id_pinjaman`(`id_pinjaman`) USING BTREE,
  CONSTRAINT `tb_pinjaman_bayar_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `tb_pinjaman` (`id_pinjaman`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_report
-- ----------------------------
DROP TABLE IF EXISTS `tb_report`;
CREATE TABLE `tb_report`  (
  `id_report` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `debit` decimal(20, 0) NOT NULL,
  `credit` decimal(20, 0) NOT NULL,
  `saldo` decimal(20, 0) NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipe` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_report`) USING BTREE,
  INDEX `id_anggota`(`id_anggota`) USING BTREE,
  CONSTRAINT `tb_report_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_report_activity
-- ----------------------------
DROP TABLE IF EXISTS `tb_report_activity`;
CREATE TABLE `tb_report_activity`  (
  `id_activity` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user` enum('anggota','pengurus') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_activity`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_report_activity
-- ----------------------------
INSERT INTO `tb_report_activity` VALUES (1, '16', 'pengurus', 'Update pengaturan waktu', '2020-01-15 11:48:20');
INSERT INTO `tb_report_activity` VALUES (2, '16', 'pengurus', 'Update pengaturan gateway', '2020-01-15 11:49:39');
INSERT INTO `tb_report_activity` VALUES (3, '16', 'pengurus', 'Update password', '2020-01-15 11:51:00');
INSERT INTO `tb_report_activity` VALUES (4, '16', 'pengurus', 'Update pengaturan lain', '2020-01-15 11:55:02');
INSERT INTO `tb_report_activity` VALUES (5, '16', 'pengurus', 'Update pengaturan pinjaman', '2020-01-15 11:55:27');
INSERT INTO `tb_report_activity` VALUES (6, '16', 'pengurus', 'Update pengaturan pinjaman', '2020-01-15 11:55:39');
INSERT INTO `tb_report_activity` VALUES (7, '16', 'pengurus', 'Update pengaturan pinjaman', '2020-01-15 11:55:50');
INSERT INTO `tb_report_activity` VALUES (8, '16', 'pengurus', 'Mendaftarkan anggota [0000001]', '2020-01-15 11:57:44');
INSERT INTO `tb_report_activity` VALUES (9, '16', 'pengurus', 'Update ad/art', '2020-01-15 12:01:24');
INSERT INTO `tb_report_activity` VALUES (10, '1', 'anggota', 'Update data rekening', '2020-01-15 16:01:53');
INSERT INTO `tb_report_activity` VALUES (11, '1', 'anggota', 'Update password', '2020-01-15 16:02:03');
INSERT INTO `tb_report_activity` VALUES (12, '1', 'anggota', 'Update password transaksi', '2020-01-15 16:02:10');

-- ----------------------------
-- Table structure for tb_royalti
-- ----------------------------
DROP TABLE IF EXISTS `tb_royalti`;
CREATE TABLE `tb_royalti`  (
  `id_royalti` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_deposito` int(11) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `nomor` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_royalti`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  INDEX `id_deposito`(`id_deposito`) USING BTREE,
  CONSTRAINT `tb_royalti_ibfk_1` FOREIGN KEY (`id_deposito`) REFERENCES `tb_deposito` (`id_deposito`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_setting
-- ----------------------------
DROP TABLE IF EXISTS `tb_setting`;
CREATE TABLE `tb_setting`  (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nilai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_setting
-- ----------------------------
INSERT INTO `tb_setting` VALUES (3, 'NOHP', 'No. Handphone', '6282348399955');
INSERT INTO `tb_setting` VALUES (4, 'NOWA', 'No. Whatsapp', '6282348399955');
INSERT INTO `tb_setting` VALUES (5, 'EMAIL', 'E-mail', 'koperasilenteradigital@gmail.com');
INSERT INTO `tb_setting` VALUES (6, 'ALAMAT', 'Alamat', 'Jalan Toddopuli X Blok A1 No. 1F');
INSERT INTO `tb_setting` VALUES (7, 'CS', 'email cs', 'cs@lenteradigitalindonesia.com');
INSERT INTO `tb_setting` VALUES (8, 'WEBSITE', 'link website', 'www.lenteradigitalindonesia.com');
INSERT INTO `tb_setting` VALUES (9, 'NOTLP', 'nomor tlp', '0411 409 8547');
INSERT INTO `tb_setting` VALUES (10, 'WEBNAME', 'nama website', 'Koperasi Lentera Digital Indonesia');

-- ----------------------------
-- Table structure for tb_simp_bisa_diambil
-- ----------------------------
DROP TABLE IF EXISTS `tb_simp_bisa_diambil`;
CREATE TABLE `tb_simp_bisa_diambil`  (
  `id_simp_diambil` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_simpanan` int(11) NOT NULL,
  `kode_tr_simp` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `tipe` enum('SP','SW','SS') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_simp_diambil`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  INDEX `id_anggota`(`id_anggota`) USING BTREE,
  CONSTRAINT `tb_simp_bisa_diambil_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_simpanan_pokok
-- ----------------------------
DROP TABLE IF EXISTS `tb_simpanan_pokok`;
CREATE TABLE `tb_simpanan_pokok`  (
  `id_simpanan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `date` datetime NOT NULL,
  `is_in_saldo` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_simpanan`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  UNIQUE INDEX `id_anggota`(`id_anggota`) USING BTREE,
  INDEX `id_anggota_2`(`id_anggota`) USING BTREE,
  INDEX `id_anggota_3`(`id_anggota`) USING BTREE,
  CONSTRAINT `tb_simpanan_pokok_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_simpanan_sukarela
-- ----------------------------
DROP TABLE IF EXISTS `tb_simpanan_sukarela`;
CREATE TABLE `tb_simpanan_sukarela`  (
  `id_simpanan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `date` datetime NOT NULL,
  `is_in_saldo` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_simpanan`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  INDEX `id_anggota`(`id_anggota`) USING BTREE,
  CONSTRAINT `tb_simpanan_sukarela_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_simpanan_wajib
-- ----------------------------
DROP TABLE IF EXISTS `tb_simpanan_wajib`;
CREATE TABLE `tb_simpanan_wajib`  (
  `id_simpanan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `bulan_tahun` date NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `date` datetime NOT NULL,
  `is_in_saldo` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_simpanan`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  INDEX `id_anggota`(`id_anggota`) USING BTREE,
  CONSTRAINT `tb_simpanan_wajib_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tb_withdrawal
-- ----------------------------
DROP TABLE IF EXISTS `tb_withdrawal`;
CREATE TABLE `tb_withdrawal`  (
  `id_withdrawal` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tr` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_anggota` int(255) NOT NULL,
  `amount` decimal(20, 0) NOT NULL,
  `amount_request` decimal(20, 0) NOT NULL,
  `gateway` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_rek` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('0','1','9') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_withdrawal`) USING BTREE,
  UNIQUE INDEX `kode_tr`(`kode_tr`) USING BTREE,
  INDEX `id_anggota`(`id_anggota`) USING BTREE,
  CONSTRAINT `tb_withdrawal_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
