-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-12-04 17:22:26
-- 服务器版本： 10.4.21-MariaDB
-- PHP 版本： 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `love_calculator`
--

-- --------------------------------------------------------

--
-- 表的结构 `calculation`
--

CREATE TABLE `calculation` (
  `name1` varchar(30) NOT NULL,
  `name2` varchar(30) NOT NULL,
  `percentage` varchar(20) NOT NULL,
  `result` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `candidate1`
--

CREATE TABLE `candidate1` (
  `name1` varchar(30) NOT NULL,
  `age1` varchar(30) NOT NULL,
  `constellation1` varchar(30) NOT NULL,
  `bloodtype1` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `candidate2`
--

CREATE TABLE `candidate2` (
  `name2` varchar(30) NOT NULL,
  `age2` varchar(30) NOT NULL,
  `constellation2` varchar(30) NOT NULL,
  `bloodtype2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转储表的索引
--

--
-- 表的索引 `calculation`
--
ALTER TABLE `calculation`
  ADD KEY `name1` (`name1`,`name2`),
  ADD KEY `name2` (`name2`);

--
-- 表的索引 `candidate1`
--
ALTER TABLE `candidate1`
  ADD KEY `name1` (`name1`);

--
-- 表的索引 `candidate2`
--
ALTER TABLE `candidate2`
  ADD KEY `name2` (`name2`);

--
-- 限制导出的表
--

--
-- 限制表 `calculation`
--
ALTER TABLE `calculation`
  ADD CONSTRAINT `calculation_ibfk_1` FOREIGN KEY (`name1`) REFERENCES `candidate1` (`name1`),
  ADD CONSTRAINT `calculation_ibfk_2` FOREIGN KEY (`name2`) REFERENCES `candidate2` (`name2`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
