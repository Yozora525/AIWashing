-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2023-01-10 03:14:01
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='洗衣袋租借紀錄表';

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
('D1673178468095', '到店送洗', 1, 1, NULL, '2022-12-31 13:19:12'),
('D1673178468096', '到店取衣', 2, 1, NULL, '2022-12-31 13:22:17'),
('D1673178468097', '外送洗衣', 1, 1, NULL, '2022-12-31 13:22:50'),
('D1673178468098', '外送取衣', 2, 1, NULL, '2022-12-31 13:23:53'),
('D1673178468099', '集中櫃送洗', 1, 1, NULL, '2023-01-08 15:45:18'),
('D1673178468100', '集中櫃取衣', 2, 1, NULL, '2023-01-08 15:47:18');

-- --------------------------------------------------------

--
-- 資料表結構 `laundry_bag`
--

CREATE TABLE `laundry_bag` (
  `bag_id` varchar(128) NOT NULL COMMENT '洗衣袋編號',
  `bag_addTime` datetime DEFAULT current_timestamp() COMMENT '洗衣袋加入時間',
  `bag_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常,0:停用)',
  `mem_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='洗衣袋晶片表';

--
-- 傾印資料表的資料 `laundry_bag`
--

INSERT INTO `laundry_bag` (`bag_id`, `bag_addTime`, `bag_status`, `mem_id`) VALUES
('B01', '2022-12-31 12:12:58', 1, 'M1673277903215'),
('B02', '2022-12-31 12:15:58', 1, '');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `mem_id` varchar(64) NOT NULL COMMENT '會員編號',
  `mem_account` varchar(32) NOT NULL COMMENT '會員帳號(身分證字號)',
  `mem_pwd` varchar(16) NOT NULL COMMENT '會員密碼',
  `pwd_confirm` varchar(16) NOT NULL COMMENT '確認密碼',
  `mem_name` varchar(16) NOT NULL COMMENT '會員名稱',
  `mem_phone` varchar(16) NOT NULL COMMENT '會員手機號碼',
  `mem_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常,0:停用)',
  `mem_points` int(64) DEFAULT NULL COMMENT '會員擁有點數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='會員表';

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`mem_id`, `mem_account`, `mem_pwd`, `pwd_confirm`, `mem_name`, `mem_phone`, `mem_status`, `mem_points`) VALUES
('M1673277903215', '1', '1', '1', '1', '1', 1, NULL);

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
  `mem_id` varchar(64) NOT NULL COMMENT '會員編號',
  `card_num` varchar(20) NOT NULL COMMENT '付款卡號',
  `card_name` varchar(64) NOT NULL COMMENT '卡片名稱',
  `owner_name` varchar(64) NOT NULL COMMENT '持卡人姓名',
  `expired_month` int(11) NOT NULL COMMENT '到期月',
  `expired_year` int(11) NOT NULL COMMENT '到期年',
  `security_code` varchar(3) NOT NULL COMMENT '安全碼',
  `card_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '付款卡註冊時間',
  `card_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常,0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='付款卡表';

--
-- 傾印資料表的資料 `payment`
--

INSERT INTO `payment` (`card_id`, `mem_id`, `card_num`, `card_name`, `owner_name`, `expired_month`, `expired_year`, `security_code`, `card_time`, `card_status`) VALUES
('C1673277919954', 'M1673277903215', '8745854774588965', '中國信託', '黃大千', 12, 300, '456', '2023-01-09 23:25:19', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `serve_store`
--

CREATE TABLE `serve_store` (
  `store_id` varchar(64) NOT NULL COMMENT 'AI櫃門市編號',
  `store_name` varchar(64) NOT NULL COMMENT '門市名稱',
  `store_type` int(11) NOT NULL COMMENT '類別(1:店內櫃, 2:集中櫃)',
  `address` int(11) NOT NULL COMMENT '地址',
  `store_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常, 0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='自取櫃和集中櫃服務門市';

--
-- 傾印資料表的資料 `serve_store`
--

INSERT INTO `serve_store` (`store_id`, `store_name`, `store_type`, `address`, `store_status`) VALUES
('S001', '桃園門市', 1, 0, 0),
('S002', '新竹門市', 2, 0, 0),
('S003', '中壢門市', 2, 0, 0),
('S004', '竹北門市', 1, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `washing_order`
--

CREATE TABLE `washing_order` (
  `order_id` varchar(64) NOT NULL COMMENT '訂單編號',
  `mem_id` varchar(64) NOT NULL COMMENT '會員編號',
  `bag_id` varchar(64) NOT NULL COMMENT '洗衣袋編號',
  `weight` int(11) NOT NULL COMMENT '衣服重量',
  `wash_mode` varchar(11) NOT NULL COMMENT '洗衣模式',
  `dryout_mode` varchar(11) NOT NULL COMMENT '脫水模式',
  `drying_mode` varchar(11) NOT NULL COMMENT '乾衣模式',
  `folding_mode` varchar(11) NOT NULL COMMENT '摺衣模式',
  `sent_to` varchar(11) NOT NULL COMMENT '送洗方式',
  `sentTo_address` varchar(128) DEFAULT NULL COMMENT '送洗門市或地址',
  `sent_back` varchar(11) NOT NULL COMMENT '取回方式',
  `sentBack_address` varchar(128) DEFAULT NULL COMMENT '取衣門市或地址',
  `order_time` datetime NOT NULL COMMENT '訂單成立時間',
  `carbon_emission` int(11) NOT NULL COMMENT '碳排量',
  `carbon_tax` int(11) NOT NULL COMMENT '碳稅',
  `carbon_point` int(11) NOT NULL COMMENT '碳點數',
  `order_status` int(11) NOT NULL DEFAULT 1 COMMENT '訂單狀態(1:處理中, 2:完成, 3:取消)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='訂單紀錄表';

--
-- 傾印資料表的資料 `washing_order`
--

INSERT INTO `washing_order` (`order_id`, `mem_id`, `bag_id`, `weight`, `wash_mode`, `dryout_mode`, `drying_mode`, `folding_mode`, `sent_to`, `sentTo_address`, `sent_back`, `sentBack_address`, `order_time`, `carbon_emission`, `carbon_tax`, `carbon_point`, `order_status`) VALUES
('O1673278058443', 'M1673277903215', 'B01', 0, '熱水', '弱脫水', '日曬', '機器人', '到店送洗', '桃園門市', '到店取衣', '竹北門市', '0000-00-00 00:00:00', 0, 0, 0, 1),
('O1673280544722', 'M1673277903215', 'B01', 0, '強力', '強脫水', '日曬', '手工', '集中櫃送洗', '新竹門市', '到店取衣', '桃園門市', '0000-00-00 00:00:00', 0, 0, 0, 1),
('O1673280984823', 'M1673277903215', 'B01', 0, '熱水', '弱脫水', '日曬', '不折', '集中櫃送洗', '新竹門市', '集中櫃取衣', '新竹門市', '0000-00-00 00:00:00', 0, 0, 0, 1),
('O1673284947296', 'M1673277903215', 'B01', 0, '熱水', '弱脫水', '電熱烘乾', '手工', '到店送洗', '桃園門市', '到店取衣', '竹北門市', '0000-00-00 00:00:00', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `wash_mode`
--

CREATE TABLE `wash_mode` (
  `mode_id` varchar(64) NOT NULL COMMENT '模式編號',
  `mode_name` varchar(128) NOT NULL COMMENT '模式名稱',
  `mode_type` int(11) NOT NULL COMMENT '型態(1:洗衣,2:脫水,3:乾衣,4:摺衣)',
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

INSERT INTO `wash_mode` (`mode_id`, `mode_name`, `mode_type`, `mode_point`, `carbonEmissions`, `mode_price`, `mode_needTime`, `mode_status`, `mode_recordTime`) VALUES
('M001', '強力', 1, 12, 3.55, 18, 1200, 1, '2023-01-01 12:51:46'),
('M002', '熱水', 1, 12, 3.5, 15.5, 2100, 1, '2023-01-01 13:03:01'),
('M003', '冷水', 1, 15, 3.45, 15, 2100, 1, '2023-01-01 13:03:01'),
('M004', '強脫水', 2, 2, 1.2, 2.5, 480, 1, '2023-01-01 13:03:01'),
('M005', '弱脫水', 2, 4, 0.6, 2, 720, 1, '2023-01-01 13:10:35'),
('M006', '日曬', 3, 5, 0, 0, 86400, 1, '2023-01-01 13:21:11'),
('M007', '電熱烘乾', 3, 2, 1.2, 4, 600, 1, '2023-01-01 13:21:11'),
('M008', '急速烘乾', 3, 1, 1.55, 5, 360, 1, '2023-01-01 13:21:11'),
('M009', '機器人', 4, 0, 2, 5, 300, 1, '2023-01-01 13:21:11'),
('M010', '手工', 4, 3, 0.1, 3, 720, 1, '2023-01-08 18:58:36'),
('M011', '不折', 4, 5, 0, 0, 0, 1, '2023-01-08 18:58:36');

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
-- 資料表索引 `serve_store`
--
ALTER TABLE `serve_store`
  ADD PRIMARY KEY (`store_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
