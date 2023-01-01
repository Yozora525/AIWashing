-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2023-01-01 06:43:52
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
  `frame_id` varchar(64) NOT NULL COMMENT '頭像框編號',
  `frame_color` varchar(16) NOT NULL COMMENT '色碼',
  `frame_levelName` varchar(16) NOT NULL COMMENT '等級名稱',
  `frame_points` int(64) NOT NULL COMMENT '兌換頭像框之點數',
  `frame_recordTime` datetime NOT NULL DEFAULT current_timestamp() COMMENT '加入時間',
  `frame_status` int(11) NOT NULL DEFAULT 1 COMMENT '頭像框狀態(1:正常,0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='頭相框表';

--
-- 傾印資料表的資料 `avatar_frame`
--

INSERT INTO `avatar_frame` (`frame_id`, `frame_color`, `frame_levelName`, `frame_points`, `frame_recordTime`, `frame_status`) VALUES
('F0001', '#7D7DFF', '等級一', 30, '2022-12-31 12:20:47', 1),
('F0002', '#00AEAE', '等級二', 50, '2022-12-31 12:22:47', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `bag_borrow_record`
--

CREATE TABLE `bag_borrow_record` (
  `bad_id` varchar(128) NOT NULL COMMENT '洗衣袋編號',
  `mem_id` varchar(64) NOT NULL COMMENT '會員編號',
  `borrow_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '租借時間',
  `return_time` datetime DEFAULT current_timestamp() COMMENT '歸還時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `delivery_id` varchar(64) NOT NULL COMMENT '運送編號',
  `delivery_name` varchar(64) NOT NULL COMMENT '運送名稱',
  `delivery_type` int(11) NOT NULL COMMENT '型態(1:送洗,2:領回)',
  `delivery_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常,0:停用)',
  `delivery_price` int(11) DEFAULT NULL COMMENT '運送基本定價',
  `delivery_recodeTime` datetime NOT NULL DEFAULT current_timestamp() COMMENT '運送方式加入時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='運送方式表';

--
-- 傾印資料表的資料 `delivery_method`
--

INSERT INTO `delivery_method` (`delivery_id`, `delivery_name`, `delivery_type`, `delivery_status`, `delivery_price`, `delivery_recodeTime`) VALUES
('D001', '到店送洗', 1, 1, NULL, '2022-12-31 13:19:12'),
('D002', '到店取衣', 2, 1, NULL, '2022-12-31 13:22:17'),
('D003', '外送洗衣', 1, 1, NULL, '2022-12-31 13:22:50'),
('D004', '外送取衣', 2, 1, NULL, '2022-12-31 13:23:53');

-- --------------------------------------------------------

--
-- 資料表結構 `laundry_bag`
--

CREATE TABLE `laundry_bag` (
  `bag_id` varchar(128) NOT NULL COMMENT '洗衣袋編號',
  `bag_addTime` datetime DEFAULT current_timestamp() COMMENT '洗衣袋加入時間',
  `bag_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常,0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='洗衣袋晶片表';

--
-- 傾印資料表的資料 `laundry_bag`
--

INSERT INTO `laundry_bag` (`bag_id`, `bag_addTime`, `bag_status`) VALUES
('B01', '2022-12-31 12:12:58', 1),
('B02', '2022-12-31 12:15:58', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `mem_id` varchar(64) NOT NULL COMMENT '會員編號',
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
  `frame_id` varchar(11) NOT NULL COMMENT '頭像框編號',
  `mem_id` varchar(11) NOT NULL COMMENT '會員編號',
  `memFrame_recordTime` datetime NOT NULL COMMENT '會員加入頭像框時間',
  `memFrame_status` int(11) NOT NULL DEFAULT 1 COMMENT '會員頭像框狀態(1:正常,0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='會員擁有頭像框表';

-- --------------------------------------------------------

--
-- 資料表結構 `payment`
--

CREATE TABLE `payment` (
  `card_id` varchar(64) NOT NULL COMMENT '付款卡編號',
  `member_id` varchar(64) NOT NULL COMMENT '會員編號',
  `card_num` varchar(20) NOT NULL COMMENT '付款卡號',
  `card_name` varchar(64) NOT NULL COMMENT '卡片名稱',
  `owner_name` varchar(64) NOT NULL COMMENT '持卡人姓名',
  `expired_month` int(11) NOT NULL COMMENT '到期月',
  `expired_year` int(11) NOT NULL COMMENT '到期年',
  `security_code` varchar(3) NOT NULL COMMENT '安全碼',
  `card_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '付款卡註冊時間',
  `card_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常,0:停用)'
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

-- --------------------------------------------------------

--
-- 資料表結構 `wash_mode`
--

CREATE TABLE `wash_mode` (
  `mode_id` varchar(64) NOT NULL COMMENT '模式編號',
  `mode_name` varchar(128) NOT NULL COMMENT '模式名稱',
  `mode_type` int(11) NOT NULL COMMENT '型態(1:洗衣,2:乾衣,3:熨燙,4:摺衣)',
  `mode_demand` int(11) DEFAULT NULL COMMENT '熨燙及摺衣需求(0:否,1:是)',
  `mode_point` float NOT NULL COMMENT '碳點數/公斤',
  `carbonEmissions` float NOT NULL COMMENT '碳排放/公斤',
  `mode_price` float NOT NULL COMMENT '定價',
  `mode_needTime` int(11) NOT NULL COMMENT '需要的時間(單位：秒)',
  `mode_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常,0:停用)',
  `mode_recordTime` datetime NOT NULL DEFAULT current_timestamp() COMMENT '模式加入時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='洗脫烘衣模式表';

--
-- 傾印資料表的資料 `wash_mode`
--

INSERT INTO `wash_mode` (`mode_id`, `mode_name`, `mode_type`, `mode_demand`, `mode_point`, `carbonEmissions`, `mode_price`, `mode_needTime`, `mode_status`, `mode_recordTime`) VALUES
('M001', '冷水洗', 1, NULL, 15, 3.5, 15, 1800, 1, '2023-01-01 12:51:46'),
('M002', '溫水洗', 1, NULL, 14.5, 3.55, 15.5, 1800, 1, '2023-01-01 13:03:01'),
('M003', '乾洗', 1, NULL, 15.5, 3.45, 18, 9600, 1, '2023-01-01 13:03:01'),
('M004', '脫水', 2, NULL, 0.5, 0.9, 2, 900, 1, '2023-01-01 13:03:01'),
('M005', '烘乾', 2, NULL, 1, 0.6, 2.5, 1500, 1, '2023-01-01 13:10:35'),
('M006', '自然晾曬', 2, NULL, 3, 0, 1, 86400, 1, '2023-01-01 13:21:11'),
('M007', '熨燙', 3, 1, 1, 0.6, 4, 720, 1, '2023-01-01 13:21:11'),
('M008', '熨燙', 3, 0, 3, 0, 0, 0, 1, '2023-01-01 13:21:11'),
('M009', '摺衣', 4, 1, 1, 0.5, 4, 720, 1, '2023-01-01 13:21:11'),
('M010', '摺衣', 4, 0, 3, 0, 0, 0, 1, '2023-01-01 13:21:11');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `avatar_frame`
--
ALTER TABLE `avatar_frame`
  ADD PRIMARY KEY (`frame_id`);

--
-- 資料表索引 `bag_borrow_record`
--
ALTER TABLE `bag_borrow_record`
  ADD PRIMARY KEY (`bad_id`,`mem_id`,`borrow_time`);

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
-- 資料表索引 `wash_mode`
--
ALTER TABLE `wash_mode`
  ADD PRIMARY KEY (`mode_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

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
