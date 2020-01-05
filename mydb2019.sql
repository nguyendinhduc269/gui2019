-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 02:10 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(10) UNSIGNED NOT NULL,
  `information_id` int(10) UNSIGNED DEFAULT NULL,
  `students_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `information_id`, `students_id`, `created_at`, `updated_at`) VALUES
(100, 16, 41, '2019-10-17 00:52:34', '2019-10-17 00:52:34'),
(108, 20, 41, '2019-10-20 16:35:44', '2019-10-20 16:35:44'),
(109, 19, 41, '2019-10-20 16:35:53', '2019-10-20 16:35:53'),
(110, 23, 41, '2019-10-20 16:35:59', '2019-10-20 16:35:59'),
(111, 23, 32, '2019-11-26 20:50:28', '2019-11-26 20:50:28'),
(112, 23, 35, '2019-11-26 20:50:38', '2019-11-26 20:50:38'),
(113, 42, 32, '2020-01-04 09:26:22', '2020-01-04 09:26:22'),
(114, 47, 32, '2020-01-04 09:26:39', '2020-01-04 09:26:39'),
(115, 63, 32, '2020-01-05 04:09:15', '2020-01-05 04:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `company_images`
--

CREATE TABLE `company_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `infor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(10) UNSIGNED NOT NULL,
  `location_info` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `written_test` varchar(255) DEFAULT NULL,
  `written_test_content` varchar(255) DEFAULT NULL,
  `interview` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `recruited_occupation` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `age_limit` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `graduate` varchar(255) DEFAULT NULL,
  `condidate` varchar(255) DEFAULT NULL,
  `job_vote` varchar(255) DEFAULT NULL,
  `part_time_job` varchar(255) DEFAULT NULL,
  `intership` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) NOT NULL DEFAULT '/Template/Gui2019/img/sample.png',
  `url` varchar(255) DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `location_info`, `date`, `company_name`, `info`, `written_test`, `written_test_content`, `interview`, `industry`, `country`, `recruited_occupation`, `qualification`, `age_limit`, `grade`, `graduate`, `condidate`, `job_vote`, `part_time_job`, `intership`, `created_at`, `updated_at`, `logo`, `url`) VALUES
(19, '111', '2018-02-23', '第一工業大学', '第一工業大学の説明', '有り', 'SPI検査', '学校で行います', '学校', NULL, '教師', 'N1', NULL, '4年生', '無し', '無し', '', '無し', '不可', NULL, '2019-11-26 20:04:44', '/uploads/images/logo/_1572402766.jpg', 'http://ueno.daiichi-koudai.ac.jp/'),
(20, '444', '2016-12-20', 'LABI', 'LABIの説明', '不明', 'SPI検査', '学校で行い', NULL, '特に無し', '販売', 'N2以上', NULL, '4年生', '無し', '無し', '', '有り', '不可', NULL, '2019-11-26 20:05:16', '/uploads/images/logo/labi_1572403366.jpg', 'http://www.yamadalabi.com/'),
(21, '555', '2018-12-20', '東芝株式会社', '東芝株式会社の説明', '有り', '不明', '会社で第一次', NULL, NULL, 'SE', NULL, NULL, '4年生', '無し', '無し', '', '無し', '相談による', NULL, '2019-11-26 20:06:52', '/uploads/images/logo/_1572403388.png', 'https://www.toshiba.co.jp/'),
(23, '777', '2017-06-08', 'ドンキホーテ', 'ドンキホーテの説明', '不明', '無し', NULL, '営業', '中国', NULL, 'N1', '28まで', '4年生', '有り', '無し', '', '有り', '相談による', NULL, '2019-11-26 20:07:36', '/uploads/images/logo/_1572403572.png', 'https://www.donki.com/'),
(24, '333', '2017-01-01', 'ビックカメラ', 'ビックカメラの説明', '有り', '無し', '一次面接　3号館', '小売業', '中国', 'SE', 'N1', '30', '4年生', '有り', '有り', '', '有り', '有り', NULL, '2019-11-26 20:08:09', '/uploads/images/logo/_1572403591.jpg', 'https://www.biccamera.com/'),
(29, '381', '2017-11-07', '日建リース', '会社の説明', '有り', '無し', NULL, '営業', 'ベトナム', NULL, 'N1', '30', '4年生', '有り', '無し', '', '無し', '可能', NULL, '2019-11-26 20:12:03', '/uploads/images/logo/_1574831523.png', 'https://nikken-lease.co.jp/'),
(30, '381', '2017-11-21', '株式会社ラピニクス', '会社の説明', '有り', '有り', '一次面接', '情報系', NULL, 'SE', 'N1', NULL, '4年生', '有り', '無し', '', '無し', '無し', NULL, '2020-01-03 04:10:13', '/uploads/images/logo/_1578057013.jfif', 'https://www.rapinics.co.jp/'),
(63, '381', '2020-10-27', 'FTS株式会社', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-04 23:19:01', '2020-01-05 04:08:43', '/uploads/images/logo/fts_1578229723.png', 'https://www.fts.co.jp/'),
(70, '255', '2020-07-03', 'ヤマト運輸株式会社', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-05 03:37:02', '2020-01-05 03:37:02', '/Template/Gui2019/img/sample.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_27_094252_edit_studens', 1),
(2, '2019_07_27_103126_edit_information', 2),
(6, '2019_07_27_113942_create_company_images_table', 3),
(7, '2019_07_27_114006_create_student_images_table', 3),
(8, '2019_07_27_125839_edit_student_images', 4),
(9, '2019_07_28_105306_create_foreign_key_company_images', 5),
(10, '2019_07_28_111157_edit_information', 6),
(11, '2019_07_28_111336_edit_company_images', 7),
(12, '2019_07_28_144051_edit_id_information', 8),
(13, '2019_07_28_144156_edit_id_students', 9),
(14, '2019_07_28_144307_edit_id_student_images', 10),
(15, '2019_07_28_144553_edit_id_book', 11),
(16, '2019_07_28_144647_create_fk_student_images', 12),
(17, '2019_07_28_145232_create_fk_student_images', 13),
(18, '2019_07_28_145450_crate_fk_company_image', 14),
(19, '2019_07_28_145640_create_fk_book', 15),
(20, '2019_07_31_172329_user', 16),
(21, '2019_08_07_061337_edit_information', 16),
(22, '2019_08_17_163552_edit_infor', 17),
(23, '2019_08_22_120835_add_created_at_student', 18),
(24, '2019_09_22_033811_create_sermina', 19),
(25, '2019_10_02_021255_edit_studentcode_unique', 20),
(26, '2019_10_09_071138_edit_book', 21),
(27, '2019_10_29_065810_add_logo_to_information', 22),
(28, '2019_11_01_094145_create_users_table', 23),
(29, '2019_11_27_041028_insert_homepage_information', 23);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sermina`
--

CREATE TABLE `sermina` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serminaName` varchar(255) NOT NULL,
  `teacherName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sermina`
--

INSERT INTO `sermina` (`id`, `serminaName`, `teacherName`, `created_at`, `updated_at`) VALUES
(2, '渡辺研究室', '渡辺　哲', '2019-09-21 19:09:56', '2019-09-21 19:09:56'),
(3, '第一工大上野研究室', '上野　仁', '2019-09-21 19:16:07', '2019-09-21 19:16:07'),
(4, '建宮研究室', '建宮　努', '2019-09-21 19:17:15', '2019-09-21 19:17:15'),
(5, '衣川研究室', '衣川 功一', '2019-09-21 19:17:39', '2019-09-21 19:17:39'),
(6, '木下研究室', '木下 和歩', '2019-09-21 19:18:23', '2019-09-21 19:18:23'),
(7, '陳研究室', '陳　泓', '2019-09-21 19:18:45', '2019-09-21 19:18:45'),
(8, '丹野研究室', '丹野　健一郎', '2019-09-21 19:19:10', '2019-09-21 19:19:10'),
(9, '鮑研究室', '鮑 慎琪', '2019-09-21 19:19:31', '2019-09-21 19:19:31'),
(10, '第一工大鈴木研究室', '鈴木 康治', '2019-09-21 19:20:25', '2019-09-21 19:20:25'),
(11, '平田研究室', '平田 昌子', '2019-09-21 19:20:51', '2019-09-21 19:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `seminar_room` varchar(255) DEFAULT NULL,
  `grade` varchar(255) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_code`, `name`, `password`, `picture`, `email`, `seminar_room`, `grade`, `resume`, `isAdmin`, `created_at`, `updated_at`, `remember_token`) VALUES
(25, '10te555', '555', '$2y$10$VoW7oxyHle3/F7tFMVbSxOQyR.Jq5ASUSxgIbBZV.gkK0k8I.AC7q', '20161219191306dream.jpg', 'houkowamail@gamil.com', '陳', '3年生', NULL, NULL, NULL, NULL, NULL),
(31, '10te250', 'zh', '3dd635a808ddb6dd4b6731f7c409d53dd4b14df2', 'Lighthouse.jpg', '11419125@qq.com', '鮑 研', '1年生', '', NULL, NULL, NULL, NULL),
(32, '16te435', 'Duc', '$2y$10$z3YEofTROwvneoXju5dMCeGaH0kTG6e39UoS33YgEB9y/JmE9g62W', '/uploads/images/user/duc_1572332912.jpg', 'nguyendinhduc269@gmail.com', '鮑研究室', '1', NULL, 1, NULL, NULL, 'uKuT2LMSFdFiH0htD6q1xBIVXeZhEL4IsIZKOV09PX30UYDdRfIfApZY8YVC'),
(34, '16TE436', 'Kuro Neko', '$2y$10$P7.Fe/KwaNJPhA8863sriOgaVw0Cjq7UAvIkvFyQ0VX41StHyZBM2', 'C:\\xampp\\tmp\\php6A6.tmp', 'kuroneko@gmail.com', 'aaa', '4', NULL, NULL, NULL, NULL, NULL),
(35, '17TE222', '山本　太郎', '$2y$10$/Vg1eLNKKFueiKxj/w1WEu5mznX1fPkgByNKt3TkfTiFBG8znf/1W', '/uploads/images/_1566915445.jpg', 'yamamototaro@gmail.com', 'あああ', '3', NULL, NULL, NULL, NULL, NULL),
(36, '17TE999', '大和　太郎', '$2y$10$zw3aDs4SVS5Zn2fzEsm82uZF3Bu.5FTcAWVGnSZy11PFnQJBXlJaq', '/Template/Gui2019/img/avatar-mini.jpg', 'yamatotaro@gmail.com', '丹野研究室', '3', NULL, NULL, NULL, NULL, NULL),
(37, '17TE８８８', '川口　みつき', '$2y$10$MH1DJI/j6PS2nFWKYdLg6uoRbwKLjUtk4Ewoe5JqXU.cM61Y.1TE2', '/Template/Gui2019/img/avatar-mini.jpg', 'kawaguchimitsuki@gmail.com', '無し', '1年', NULL, NULL, NULL, NULL, NULL),
(41, '16te219', 'Test', '$2y$10$4hR6MCbaOtEj0bm0u422hO.V.YE1lUhc/f3FzLl5EVbMJL1NcL0yS', 'http://localhost:8000/Template/Gui2019/img/user.jpg', 'test@yahoo.com', '鮑研究室', '1', NULL, NULL, NULL, NULL, NULL),
(43, '10te998', '田中 二朗', '$2y$10$CRavmhRY1CjQk7TdkPGxn.l6GhglhWce21WAYiJITD3xLL4yVAvTS', '/uploads/images/_1570001778.jpg', 'tanakajiro@gmail.com', '鮑研究室', '3', NULL, NULL, NULL, NULL, NULL),
(44, '10te001', 'Admin', '$2y$10$q8eUFHnmIqgeTeQE6.OePuOKf5gO4Llpb2lsBe7dft.IlaK.BPuM6', '/Template/Gui2019/img/user.jpg', 'admin@gmail.com', '渡辺研究室', '1', NULL, NULL, NULL, NULL, NULL),
(46, '16te452', 'DucDat', '$2y$10$u70zU8x9XG9ntXxsnXVIs.Y8ki0HsBmynD..fcldthi/xxpr8ycY6', 'http://localhost/Gui2019/public/Template/Gui2019/img/user.jpg', 'vuducdat@gmail.com', '研究室選択', '1', NULL, NULL, '2020-01-02 09:16:22', '2020-01-02 09:16:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infor` (`information_id`),
  ADD KEY `student` (`students_id`);

--
-- Indexes for table `company_images`
--
ALTER TABLE `company_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_company_image` (`infor_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `information_id_unique` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sermina`
--
ALTER TABLE `sermina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_code` (`student_code`),
  ADD UNIQUE KEY `students_student_code_unique` (`student_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `company_images`
--
ALTER TABLE `company_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sermina`
--
ALTER TABLE `sermina`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
