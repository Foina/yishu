-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 �?07 �?22 �?17:26
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- 表的结构 `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `book_id` bigint(20) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `views` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_count` bigint(20) unsigned NOT NULL DEFAULT '0',
  `page_num` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `user_id`, `book_id`, `created_at`, `updated_at`, `views`, `comment_count`, `page_num`) VALUES
(1, 'dfdgfd', '请输入.', 1, 1, '2014-02-23 17:59:57', '2014-04-14 20:12:47', 7, 0, 1),
(2, 'dfdgfd', '<p>请输入.的范德萨发</p>\r\n', 1, 1, '2014-04-13 10:56:25', '2014-04-14 20:13:04', 0, 0, 2),
(3, 'dfdgfd', '<p>dhfkdshfk</p>\r\n', 1, 1, '2014-04-13 11:01:34', '2014-04-13 11:01:34', 0, 0, 1),
(4, 'dfdgfd鼎飞丹砂', '<p>dhfkdshfk</p>\r\n', 1, 1, '2014-04-13 11:02:38', '2014-04-14 20:13:21', 0, 0, 3),
(5, '丁香花', '<p>sssssssssssssssssssssssssssssssskkkkk</p>\r\n', 1, 1, '2014-04-13 11:03:35', '2014-04-14 20:13:48', 1, 0, 3);

-- --------------------------------------------------------

--
-- 表的结构 `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `viewNum` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tag_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bid` (`id`),
  UNIQUE KEY `bookname` (`name`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `books`
--

INSERT INTO `books` (`id`, `name`, `category_id`, `path`, `cover`, `created_at`, `updated_at`, `viewNum`, `tag_id`, `user_id`, `info`) VALUES
(1, '搜索引擎技术基础', 0, 'static/upload/', 'prod1.gif', '2013-08-12 09:00:00', '0000-00-00 00:00:00', 15, 1, 1, '《搜索引擎技术基础》从研究实践者的角度角度出介绍了搜索引擎的相关技术及其产业，并试图协助读者成为搜索引擎领域的局内人。与传统的将搜索引擎作为信息检索系统实现的一个特殊实例的做法不同，作者试图把搜索引擎作为一个独立的研究课题，从纷繁复杂的互联网数据现象和搜索引擎工作案例中提炼知识点，对现代商业搜索引擎的体系结构，运行原理，运营机制和核心算法进行总结和讲解。'),
(2, '3241234', 0, 'public/img/', 'HtfNCG_1.jpg', '2014-05-23 09:11:28', '2014-05-23 09:11:28', 1, 0, 1, ''),
(4, '三毛的故事', 1, 'public/img/', 'gVZrjc_1.jpg', '2014-05-23 10:22:10', '2014-05-23 10:22:10', 0, 0, 1, '三毛跟丈夫荷西的故事'),
(5, '旅行者', 1, 'public/img/', 'BHHsP7_5.jpg', '2014-05-23 10:28:01', '2014-05-23 10:28:01', 0, 0, 1, '旅行必备'),
(7, 'abc', 1, 'public/img/', 'kd6Ugc_21.jpg', '2014-06-03 07:22:37', '2014-06-04 12:06:55', 0, 0, 1, '地方是'),
(9, 'abcd', 1, 'public/img/', 'O6xIj8_1.jpg', '2014-06-04 11:44:14', '2014-06-10 08:13:35', 0, 0, 1, '地方是');

-- --------------------------------------------------------

--
-- 表的结构 `book_article`
--

CREATE TABLE IF NOT EXISTS `book_article` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `book_id` bigint(20) unsigned NOT NULL,
  `article_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `book_article`
--

INSERT INTO `book_article` (`id`, `book_id`, `article_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, '文学');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `article_id` bigint(20) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `article_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '路过', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, '普通用户', '很普通的用户');

-- --------------------------------------------------------

--
-- 表的结构 `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `states`
--

INSERT INTO `states` (`id`, `created_at`, `user`, `event`) VALUES
(1, '2012-10-23 00:00:00', '小优', '发表文章');

-- --------------------------------------------------------

--
-- 表的结构 `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, '搜索引擎'),
(2, '散文');

-- --------------------------------------------------------

--
-- 表的结构 `tag_book`
--

CREATE TABLE IF NOT EXISTS `tag_book` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` bigint(20) unsigned NOT NULL,
  `book_id` bigint(20) unsigned NOT NULL,
  `frequency` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_id` (`tag_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tag_book`
--

INSERT INTO `tag_book` (`id`, `tag_id`, `book_id`, `frequency`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tag_category`
--

CREATE TABLE IF NOT EXISTS `tag_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tag_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tag_category`
--

INSERT INTO `tag_category` (`id`, `tag_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `qq` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role_id`, `created_at`, `sex`, `birthday`, `email`, `address`, `phone`, `qq`, `active`, `activation_code`, `updated_at`) VALUES
(1, 'Foina', '$2y$08$nSJ2Z0QqB6rmRr00qDMu1.eUXtqYg0lLqvX1GMB9btSMF2jT7dIDa', 1, '2013-09-04 16:58:47', 'female', 19915, '1552988785@qq.com', '', '', '', 0, 'a34034e29d933c1ecd5088d61ae80a5a', '2013-09-04 16:58:47'),
(2, '幽', '$2y$08$0XtBdWFggsWBnDvTzLPu.e1qA8k2D.LqwXHDo4WPHSHFls.lEi0cy', 1, '2013-08-12 11:24:30', 'female', 19001, '1@qq.com', '', '', '', 0, '99f04eb4f5f4bcd43eb1a2424e7e91da', '2013-08-12 11:24:30'),
(3, 'dfg', '$2y$08$dPRkYV9DQ2DCygfNoNayuuN76HwJXivm4KEOds8TdsV2ea5VYDfzW', 1, '2013-08-12 11:26:31', '', 19001, '12@qq.com', '', '', '', 0, 'b8895cdfbb168f4f3c591ebf66a10a31', '2013-08-12 11:26:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
