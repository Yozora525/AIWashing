-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2022-12-28 03:44:46
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `sa_aiwashing`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cabinet`
--

CREATE TABLE `cabinet` (
  `cabinet_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `grid_num` int(11) NOT NULL,
  `fettle` int(11) NOT NULL,
  `in_time` datetime NOT NULL,
  `out_time` datetime NOT NULL,
  `pick_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='集中櫃';

-- --------------------------------------------------------

--
-- 資料表結構 `delivery`
--

CREATE TABLE `delivery` (
  `order_id` int(11) NOT NULL,
  `delivery_address` varchar(45) NOT NULL,
  `de_cabinet_id` int(11) NOT NULL,
  `de_grid_id` int(11) NOT NULL,
  `fettle` int(11) NOT NULL,
  `de_in_time` int(11) NOT NULL,
  `de_out_time` int(11) NOT NULL,
  `de_pick_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `laundry_bag`
--

CREATE TABLE `laundry_bag` (
  `bag_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `payment`
--

CREATE TABLE `payment` (
  `card_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `card_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `self_pick`
--

CREATE TABLE `self_pick` (
  `order_id` int(11) NOT NULL,
  `sp_cabinet_id` int(11) NOT NULL,
  `sp_grid_id` int(11) NOT NULL,
  `fettle` int(11) NOT NULL,
  `sp_in_time` datetime NOT NULL,
  `sp_out_time` datetime NOT NULL,
  `sp_pick_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `washing_order`
--

CREATE TABLE `washing_order` (
  `order_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `sent_to` int(11) NOT NULL,
  `sent_back` int(11) NOT NULL,
  `laundry_time` time NOT NULL,
  `laundry_way` int(11) NOT NULL,
  `drying_way` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `carbon_emission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cabinet`
--
ALTER TABLE `cabinet`
  ADD PRIMARY KEY (`order_id`);

--
-- 資料表索引 `laundry_bag`
--
ALTER TABLE `laundry_bag`
  ADD PRIMARY KEY (`bag_id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- 資料表索引 `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`card_id`);

--
-- 資料表索引 `self_pick`
--
ALTER TABLE `self_pick`
  ADD PRIMARY KEY (`order_id`);

--
-- 資料表索引 `washing_order`
--
ALTER TABLE `washing_order`
  ADD PRIMARY KEY (`member_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `payment`
--
ALTER TABLE `payment`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `self_pick`
--
ALTER TABLE `self_pick`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `washing_order`
--
ALTER TABLE `washing_order`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
