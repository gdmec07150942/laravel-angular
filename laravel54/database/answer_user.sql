-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-10-11 06:55:50
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xiaohu`
--

-- --------------------------------------------------------

--
-- 表的结构 `answer_user`
--

CREATE TABLE `answer_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `answer_id` int(10) UNSIGNED NOT NULL,
  `vote` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `answer_user`
--

INSERT INTO `answer_user` (`id`, `user_id`, `answer_id`, `vote`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 2, '2017-10-01 22:37:46', '2017-10-01 22:37:46'),
(3, 1, 2, 2, '2017-10-01 22:38:05', '2017-10-01 22:38:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `answer_user_user_id_answer_id_vote_unique` (`user_id`,`answer_id`,`vote`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `answer_user`
--
ALTER TABLE `answer_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
