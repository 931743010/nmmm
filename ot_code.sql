-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 04 月 20 日 14:19
-- 服务器版本: 5.7.10
-- PHP 版本: 5.5.31

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `haikeyi`
--

-- --------------------------------------------------------

--
-- 表的结构 `ot_code`
--

CREATE TABLE IF NOT EXISTS `ot_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1未使用2已使用',
  `onwer` varchar(255) DEFAULT NULL COMMENT '拥有者',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=389 ;

--
-- 转存表中的数据 `ot_code`
--

INSERT INTO `ot_code` (`id`, `code`, `addtime`, `status`, `onwer`) VALUES
(152, '56ac763289a266901', '2016-01-30 16:37:06', 2, '651951769@qq.com'),
(151, '56ac7632820141322', '2016-01-30 16:37:06', 2, '651951769@qq.com'),
(150, '56ac5ccc768f94837', '2016-01-30 14:48:44', 2, 'maosuqie2005@163.com'),
(172, '56adf8e6b39899026', '2016-01-31 20:07:02', 2, '8888'),
(153, '56ac763289a265182', '2016-01-30 16:37:06', 2, '651951769@qq.com'),
(154, '56ac763289a269490', '2016-01-30 16:37:06', 2, '651951769@qq.com'),
(157, '56ac9511f0a191257', '2016-01-30 18:48:49', 2, '448976173@qq.com'),
(158, '56ac9511f0a198122', '2016-01-30 18:48:50', 2, '448976173@qq.com'),
(359, '56ed21ca11b275834', '2016-03-19 17:54:18', 2, 'admin@qq.com'),
(367, '56ed21ca14abf2857', '2016-03-19 17:54:18', 1, 'admin@qq.com'),
(368, '56ed21ca152593098', '2016-03-19 17:54:18', 1, 'admin@qq.com'),
(369, '570bb2deb6b639190', '2016-04-11 22:21:18', 1, 'admin@qq.com'),
(370, '570bb2deb766d2426', '2016-04-11 22:21:18', 1, 'admin@qq.com'),
(371, '570bb2deb7c235614', '2016-04-11 22:21:18', 1, 'admin@qq.com'),
(372, '570bb2deb82dd4619', '2016-04-11 22:21:18', 1, 'admin@qq.com'),
(373, '570bb2deb88bf8771', '2016-04-11 22:21:18', 1, 'admin@qq.com'),
(374, '570bb2deb8e159114', '2016-04-11 22:21:18', 1, 'admin@qq.com'),
(375, '570bb2deb93787331', '2016-04-11 22:21:18', 1, 'admin@qq.com'),
(376, '570bb2deb99b31963', '2016-04-11 22:21:18', 1, 'admin@qq.com'),
(377, '570bb2deb9ea63159', '2016-04-11 22:21:18', 2, 'admin@qq.com'),
(379, '5712faf81efe44494', '2016-04-17 10:54:48', 2, 'a1@qq.com'),
(380, '5712faf820cb11585', '2016-04-17 10:54:48', 2, 'a1@qq.com'),
(381, '5712faf8212aa9877', '2016-04-17 10:54:48', 2, 'a1@qq.com'),
(382, '5712faf8218e72664', '2016-04-17 10:54:48', 2, 'a1@qq.com'),
(383, '5712faf821ea58001', '2016-04-17 10:54:48', 2, 'a1@qq.com'),
(384, '5712faf8224c36321', '2016-04-17 10:54:48', 1, 'a1@qq.com'),
(385, '5712faf822a223108', '2016-04-17 10:54:48', 1, 'a1@qq.com'),
(386, '5712faf82311c2974', '2016-04-17 10:54:48', 1, 'a1@qq.com'),
(387, '5712faf82374c4936', '2016-04-17 10:54:48', 1, 'a1@qq.com'),
(388, '5712faf823d451443', '2016-04-17 10:54:48', 2, 'a1@qq.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
