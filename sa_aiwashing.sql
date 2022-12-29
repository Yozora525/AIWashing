-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2022-12-29 09:05:31
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
CREATE DATABASE IF NOT EXISTS `sa_aiwashing` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sa_aiwashing`;

-- --------------------------------------------------------

--
-- 資料表結構 `avatar_frame`
--

CREATE TABLE `avatar_frame` (
  `frame_id` int(11) NOT NULL COMMENT '頭像框編號',
  `frame_color` varchar(16) NOT NULL COMMENT '色碼',
  `frame_levelName` varchar(16) NOT NULL COMMENT '等級名稱',
  `frame_points` int(64) NOT NULL COMMENT '兌換頭像框之點數',
  `frame_recordTime` datetime NOT NULL COMMENT '加入時間',
  `frame_status` int(11) NOT NULL DEFAULT 1 COMMENT '頭像框狀態(1:正常,0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='頭相框表';

-- --------------------------------------------------------

--
-- 資料表結構 `cabinet_record`
--

CREATE TABLE `cabinet_record` (
  `cabinet_id` int(11) NOT NULL COMMENT '集中櫃編號',
  `order_id` int(11) NOT NULL COMMENT '訂單編號',
  `grid_num` int(11) NOT NULL COMMENT '格子號碼',
  `fettle` varchar(11) NOT NULL COMMENT '狀態(使用中/可使用)',
  `in_time` datetime NOT NULL COMMENT '放入時間',
  `out_time` datetime NOT NULL COMMENT '取出時間',
  `pick_code` varchar(24) NOT NULL COMMENT '取貨碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='集中櫃紀錄表';

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
-- 資料表結構 `delivery_method`
--

CREATE TABLE `delivery_method` (
  `delivery_id` int(11) NOT NULL COMMENT '運送編號',
  `delivery_name` varchar(64) NOT NULL COMMENT '運送名稱',
  `delivery_type` int(11) NOT NULL COMMENT '型態(1:送洗,2:領回)',
  `delivery_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常,0:停用)',
  `delivery_price` int(11) DEFAULT NULL COMMENT '運送基本定價',
  `delivery_recodeTime` datetime NOT NULL DEFAULT current_timestamp() COMMENT '運送方式加入時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='運送方式表';

-- --------------------------------------------------------

--
-- 資料表結構 `laundry_bag`
--

CREATE TABLE `laundry_bag` (
  `bag_id` int(11) NOT NULL COMMENT '洗衣袋編號',
  `mem_id` int(11) DEFAULT NULL COMMENT '會員編號',
  `bag_status` int(11) NOT NULL COMMENT '狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='洗衣袋晶片表';

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL COMMENT '會員編號',
  `mem_account` varchar(32) NOT NULL COMMENT '會員帳號(身分證字號)',
  `mem_pwd` varchar(16) NOT NULL COMMENT '會員密碼',
  `mem_name` varchar(16) NOT NULL COMMENT '會員名稱',
  `mem_phone` varchar(16) NOT NULL COMMENT '會員手機號碼',
  `mem_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常,0:停用)',
  `mem_points` int(64) DEFAULT NULL COMMENT '會員擁有點數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='會員表';

-- --------------------------------------------------------

--
-- 資料表結構 `member_avatar_frame`
--

CREATE TABLE `member_avatar_frame` (
  `frame_id` int(11) NOT NULL COMMENT '頭像框編號',
  `mem_id` int(11) NOT NULL COMMENT '會員編號',
  `memFrame_recordTime` datetime NOT NULL COMMENT '會員加入頭像框時間',
  `memFrame_status` int(11) NOT NULL DEFAULT 1 COMMENT '會員頭像框狀態(1:正常,0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='會員擁有頭像框表';

-- --------------------------------------------------------

--
-- 資料表結構 `payment`
--

CREATE TABLE `payment` (
  `card_id` int(11) NOT NULL COMMENT '付款卡編號',
  `card_num` varchar(20) NOT NULL COMMENT '付款卡號',
  `member_id` int(11) NOT NULL COMMENT '會員編號',
  `card_time` datetime NOT NULL COMMENT '付款卡註冊時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='付款卡表';

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
  `order_id` int(11) NOT NULL COMMENT '訂單編號',
  `member_id` int(11) NOT NULL COMMENT '會員編號',
  `bag_id` int(11) NOT NULL COMMENT '洗衣袋編號',
  `weight` int(11) NOT NULL COMMENT '衣服重量',
  `sent_to` varchar(11) NOT NULL COMMENT '送洗方式',
  `sent_back` varchar(11) NOT NULL COMMENT '取回方式',
  `wash_mode` varchar(11) NOT NULL COMMENT '洗衣模式',
  `wash_time` time NOT NULL COMMENT '洗衣時間',
  `drying_mode` varchar(11) NOT NULL COMMENT '乾衣模式',
  `order_time` datetime NOT NULL COMMENT '訂單成立時間',
  `carbon_emission` int(11) NOT NULL COMMENT '碳排量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='訂單紀錄表';

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `avatar_frame`
--
ALTER TABLE `avatar_frame`
  ADD PRIMARY KEY (`frame_id`);

--
-- 資料表索引 `cabinet_record`
--
ALTER TABLE `cabinet_record`
  ADD PRIMARY KEY (`order_id`);

--
-- 資料表索引 `delivery_method`
--
ALTER TABLE `delivery_method`
  ADD PRIMARY KEY (`delivery_id`);

--
-- 資料表索引 `laundry_bag`
--
ALTER TABLE `laundry_bag`
  ADD PRIMARY KEY (`bag_id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- 資料表索引 `member_avatar_frame`
--
ALTER TABLE `member_avatar_frame`
  ADD PRIMARY KEY (`frame_id`,`mem_id`);

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
  ADD PRIMARY KEY (`order_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `avatar_frame`
--
ALTER TABLE `avatar_frame`
  MODIFY `frame_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '頭像框編號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `delivery_method`
--
ALTER TABLE `delivery_method`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '運送編號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `laundry_bag`
--
ALTER TABLE `laundry_bag`
  MODIFY `bag_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '洗衣袋編號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '會員編號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `payment`
--
ALTER TABLE `payment`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '付款卡編號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `self_pick`
--
ALTER TABLE `self_pick`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `washing_order`
--
ALTER TABLE `washing_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '訂單編號';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
