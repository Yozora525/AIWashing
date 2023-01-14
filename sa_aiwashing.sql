-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2023-01-14 01:27:02
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
('F1673338241919', '#7D7DFF', 'level 1', 0, '2022-12-31 12:20:47', 1),
('F1673338255320', '#00AEAE', 'level 2', 20, '2022-12-31 12:22:47', 1),
('F1673338255321', '#FF79BC', 'level 3', 40, '2023-01-13 10:50:23', 1),
('F1673338255322', '#FF8000', 'level 4', 50, '2023-01-13 10:50:23', 1),
('F1673338255323', '#00AEAE', 'level 6', 300, '2023-01-13 10:50:23', 1),
('F1673338255324', '#00AEAE', 'level 7', 500, '2023-01-13 10:50:23', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `bag_borrow_record`
--

CREATE TABLE `bag_borrow_record` (
  `bag_id` varchar(128) NOT NULL COMMENT '洗衣袋編號',
  `mem_id` varchar(64) NOT NULL COMMENT '會員編號',
  `borrow_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '租借時間',
  `return_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '歸還時間',
  `borrow_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:租借中,2:已歸還,0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='洗衣袋租借紀錄表';

--
-- 傾印資料表的資料 `bag_borrow_record`
--

INSERT INTO `bag_borrow_record` (`bag_id`, `mem_id`, `borrow_time`, `return_time`, `borrow_status`) VALUES
('B1673338278326', '5', '2023-01-14 05:44:43', '2023-01-14 08:08:57', 2),
('B1673338278326', '5', '2023-01-14 08:09:02', '2023-01-14 08:09:57', 2),
('B1673338278326', '5', '2023-01-14 08:10:33', '2023-01-14 08:10:33', 1),
('B1673338278326', 'M1673640347594', '2023-01-14 04:05:47', '2023-01-14 04:22:44', 2),
('B1673338278326', 'M1673640347594', '2023-01-14 04:23:05', '2023-01-14 05:13:26', 2),
('B1673338278326', 'M1673640347594', '2023-01-14 05:13:32', '2023-01-14 05:13:33', 2),
('B1673338278326', 'M1673640347594', '2023-01-14 05:37:22', '2023-01-14 05:44:31', 2),
('B1673338278327', '5', '2023-01-14 08:08:57', '2023-01-14 08:09:02', 2),
('B1673338278327', '5', '2023-01-14 08:09:57', '2023-01-14 08:10:33', 2),
('B1673338278327', 'M1673640347594', '2023-01-14 04:22:44', '2023-01-14 04:23:05', 2),
('B1673338278327', 'M1673640347594', '2023-01-14 05:13:26', '2023-01-14 05:13:32', 2),
('B1673338278327', 'M1673640347594', '2023-01-14 05:13:33', '2023-01-14 05:37:22', 2),
('B1673338278327', 'M1673640347594', '2023-01-14 05:44:31', '2023-01-14 05:44:43', 2),
('B1673338278327', 'M1673640347594', '2023-01-15 04:23:05', '2023-01-14 05:13:32', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `cabinet_record`
--

CREATE TABLE `cabinet_record` (
  `order_id` varchar(64) NOT NULL COMMENT '訂單編號',
  `cabinet_id` varchar(64) NOT NULL COMMENT 'AI櫃門市編號(store_id)',
  `sendto_grid_num` varchar(64) DEFAULT NULL COMMENT '送洗格子編號(grid_id)',
  `sendbuck_grid_num` varchar(64) DEFAULT NULL COMMENT '取衣格子編號(grid_id)',
  `pick_code` varchar(24) NOT NULL COMMENT '取貨碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='AI櫃紀錄表';

-- --------------------------------------------------------

--
-- 資料表結構 `delivery_method`
--

CREATE TABLE `delivery_method` (
  `delivery_id` varchar(64) NOT NULL COMMENT '運送編號',
  `delivery_name` varchar(64) NOT NULL COMMENT '運送名稱',
  `delivery_type` int(11) NOT NULL COMMENT '型態(1:送洗,2:領回)',
  `delivery_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常,0:停用)',
  `delivery_price` int(11) DEFAULT NULL COMMENT '運送基本定價(每公里)',
  `delivery_recodeTime` datetime NOT NULL DEFAULT current_timestamp() COMMENT '運送方式加入時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='運送方式表';

--
-- 傾印資料表的資料 `delivery_method`
--

INSERT INTO `delivery_method` (`delivery_id`, `delivery_name`, `delivery_type`, `delivery_status`, `delivery_price`, `delivery_recodeTime`) VALUES
('D1673178468095', '到店送洗', 1, 1, 0, '2022-12-31 13:19:12'),
('D1673178468096', '到店取衣', 2, 1, 0, '2022-12-31 13:22:17'),
('D1673178468097', '外送洗衣', 1, 1, 20, '2022-12-31 13:22:50'),
('D1673178468098', '外送取衣', 2, 1, 20, '2022-12-31 13:23:53'),
('D1673178468099', '集中櫃送洗', 1, 1, 10, '2023-01-08 15:45:18'),
('D1673178468100', '集中櫃取衣', 2, 1, 10, '2023-01-08 15:47:18');

-- --------------------------------------------------------

--
-- 資料表結構 `grid`
--

CREATE TABLE `grid` (
  `grid_id` varchar(64) NOT NULL COMMENT '格子編號',
  `store_id` varchar(64) NOT NULL COMMENT 'AI櫃門市編號',
  `grid_status` int(11) NOT NULL DEFAULT 1 COMMENT '	格子狀態(1:可使用,2:借出,0:停用)	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='AI櫃格子表';

--
-- 傾印資料表的資料 `grid`
--

INSERT INTO `grid` (`grid_id`, `store_id`, `grid_status`) VALUES
('G00000001', 'S1673336326249', 1),
('G00000002', 'S1673336326249', 1),
('G00000003', 'S1673336326249', 1),
('G00000004', 'S1673336326249', 1),
('G00000005', 'S1673336326249', 1),
('G00000006', 'S1673336326249', 1),
('G00000007', 'S1673336326250', 1),
('G00000008', 'S1673336326250', 1),
('G00000009', 'S1673336326250', 1),
('G00000010', 'S1673336326250', 1),
('G00000011', 'S1673336326250', 1),
('G00000012', 'S1673336326250', 1),
('G00000013', 'S1673336326251', 1),
('G00000014', 'S1673336326251', 1),
('G00000015', 'S1673336326251', 1),
('G00000016', 'S1673336326251', 1),
('G00000017', 'S1673336326251', 1),
('G00000018', 'S1673336326251', 1),
('G00000019', 'S1673336326252', 1),
('G00000020', 'S1673336326252', 1),
('G00000021', 'S1673336326252', 1),
('G00000022', 'S1673336326252', 1),
('G00000023', 'S1673336326252', 1),
('G00000024', 'S1673336326252', 1),
('G00000025', 'S1673336326253', 1),
('G00000026', 'S1673336326253', 1),
('G00000027', 'S1673336326253', 1),
('G00000028', 'S1673336326253', 1),
('G00000029', 'S1673336326253', 1),
('G00000030', 'S1673336326253', 1),
('G00000031', 'S1673337242970', 1),
('G00000032', 'S1673337242970', 1),
('G00000033', 'S1673337242970', 1),
('G00000034', 'S1673337242970', 1),
('G00000035', 'S1673337242970', 1),
('G00000036', 'S1673337242970', 1),
('G00000037', 'S1673337242971', 1),
('G00000038', 'S1673337242971', 1),
('G00000039', 'S1673337242971', 1),
('G00000040', 'S1673337242971', 1),
('G00000041', 'S1673337242971', 1),
('G00000042', 'S1673337242971', 1),
('G00000043', 'S1673337242972', 1),
('G00000044', 'S1673337242972', 1),
('G00000045', 'S1673337242972', 1),
('G00000046', 'S1673337242972', 1),
('G00000047', 'S1673337242972', 1),
('G00000048', 'S1673337242972', 1),
('G00000049', 'S1673337242973', 1),
('G00000050', 'S1673337242973', 1),
('G00000051', 'S1673337242973', 1),
('G00000052', 'S1673337242973', 1),
('G00000053', 'S1673337242973', 1),
('G00000054', 'S1673337242973', 1),
('G00000055', 'S1673337242974', 1),
('G00000056', 'S1673337242974', 1),
('G00000057', 'S1673337242974', 1),
('G00000058', 'S1673337242974', 1),
('G00000059', 'S1673337242974', 1),
('G00000060', 'S1673337242974', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` varchar(64) NOT NULL COMMENT '發票號',
  `order_id` varchar(64) NOT NULL COMMENT '訂單編號',
  `invoice_addTime` datetime NOT NULL DEFAULT current_timestamp() COMMENT '發票生成時間(整筆訂單付款完成時間)',
  `random_code` varchar(4) NOT NULL COMMENT '隨機碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='發票表';

--
-- 傾印資料表的資料 `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `order_id`, `invoice_addTime`, `random_code`) VALUES
('HJ-33652246', 'O1673645810898', '2023-01-14 05:43:31', '2598'),
('HJ-34700132', 'O1673644226221', '2023-01-14 05:37:34', '7260'),
('HJ-46405149', 'O1673646263404', '2023-01-14 05:49:25', '6972'),
('HJ-48597577', 'O1673645810898', '2023-01-14 05:39:26', '0382'),
('HJ-52101858', 'O1673654924901', '2023-01-14 08:10:02', '0145'),
('HJ-65695452', 'O1673646263404', '2023-01-14 05:47:05', '2980'),
('HJ-69731909', 'O1673655025774', '2023-01-14 08:10:41', '3708'),
('HJ-70904594', 'O1673644226221', '2023-01-14 05:13:53', '4082'),
('HJ-76981568', 'O1673641188387', '2023-01-14 04:29:18', '8760'),
('HJ-82636747', 'O1673654924901', '2023-01-14 08:10:37', '1356');

-- --------------------------------------------------------

--
-- 資料表結構 `laundry_bag`
--

CREATE TABLE `laundry_bag` (
  `bag_id` varchar(128) NOT NULL COMMENT '洗衣袋編號',
  `bag_addTime` datetime DEFAULT current_timestamp() COMMENT '洗衣袋加入時間',
  `bag_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:可使用,2:租借中,0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='洗衣袋晶片表';

--
-- 傾印資料表的資料 `laundry_bag`
--

INSERT INTO `laundry_bag` (`bag_id`, `bag_addTime`, `bag_status`) VALUES
('B1673338278326', '2022-12-31 12:12:58', 2),
('B1673338278327', '2022-12-31 12:15:58', 1),
('B1673338278328', '2023-01-12 00:31:38', 1),
('B1673338278329', '2023-01-12 00:31:38', 1),
('B1673338278330', '2023-01-12 00:31:38', 1),
('B1673338278331', '2023-01-12 00:31:38', 1),
('B1673338278332', '2023-01-12 00:31:38', 1),
('B1673338278333', '2023-01-12 00:31:38', 1),
('B1673338278334', '2023-01-12 00:31:38', 1),
('B1673338278335', '2023-01-12 00:31:38', 1),
('B1673338278336', '2023-01-12 00:31:38', 1),
('B1673338278337', '2023-01-12 00:31:38', 1),
('B1673338278338', '2023-01-12 00:31:38', 1),
('B1673338278339', '2023-01-12 00:31:38', 1),
('B1673338278340', '2023-01-12 00:31:38', 1);

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
  `mem_points` int(64) NOT NULL DEFAULT 0 COMMENT '會員擁有點數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='會員表';

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`mem_id`, `mem_account`, `mem_pwd`, `pwd_confirm`, `mem_name`, `mem_phone`, `mem_status`, `mem_points`) VALUES
('5', 'J334251732', '33ewq', '33ewq', 'hao', '1234567221', 1, 0),
('M1673640347594', 'H225814948', '10944222', '10944222', '黃仟儀', '0938238127', 1, 86);

-- --------------------------------------------------------

--
-- 資料表結構 `member_avatar_frame`
--

CREATE TABLE `member_avatar_frame` (
  `frame_id` varchar(64) NOT NULL COMMENT '頭像框編號',
  `mem_id` varchar(64) NOT NULL COMMENT '會員編號',
  `memFrame_recordTime` datetime NOT NULL DEFAULT current_timestamp() COMMENT '會員加入頭像框時間',
  `memFrame_status` int(11) NOT NULL COMMENT '會員頭像框狀態(1:未使用,2:使用中,0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='會員擁有頭像框表';

--
-- 傾印資料表的資料 `member_avatar_frame`
--

INSERT INTO `member_avatar_frame` (`frame_id`, `mem_id`, `memFrame_recordTime`, `memFrame_status`) VALUES
('F1673338241919', '5', '2023-01-14 04:05:47', 2),
('F1673338255320', '5', '2023-01-14 08:10:03', 1),
('F1673338255321', '5', '2023-01-14 08:10:37', 1);

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
  `expired_month` varchar(11) NOT NULL COMMENT '到期月',
  `expired_year` varchar(11) NOT NULL COMMENT '到期年',
  `security_code` varchar(3) NOT NULL COMMENT '安全碼',
  `card_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '付款卡註冊時間',
  `card_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常,0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='付款卡表';

--
-- 傾印資料表的資料 `payment`
--

INSERT INTO `payment` (`card_id`, `mem_id`, `card_num`, `card_name`, `owner_name`, `expired_month`, `expired_year`, `security_code`, `card_time`, `card_status`) VALUES
('C1673641054339', '5', '1111222233334444', 'hao的卡卡', 'hao', '7', '2075', '012', '2023-01-14 04:17:34', 1),
('C1673643018362', 'M1673640347594', '1212121212121212', '庭萱的卡', '廖庭萱', '11', '2070', '123', '2023-01-14 04:50:18', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `serve_store`
--

CREATE TABLE `serve_store` (
  `store_id` varchar(64) NOT NULL COMMENT 'AI櫃門市編號',
  `store_name` varchar(64) NOT NULL COMMENT '門市名稱',
  `store_type` int(11) NOT NULL COMMENT '類別(1:店內櫃, 2:集中櫃)',
  `address` varchar(128) NOT NULL COMMENT '地址',
  `store_addTime` datetime NOT NULL DEFAULT current_timestamp() COMMENT '加入時間',
  `store_status` int(11) NOT NULL DEFAULT 1 COMMENT '狀態(1:正常, 0:停用)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='自取櫃和集中櫃服務門市';

--
-- 傾印資料表的資料 `serve_store`
--

INSERT INTO `serve_store` (`store_id`, `store_name`, `store_type`, `address`, `store_addTime`, `store_status`) VALUES
('S1673336326249', '中壢新中原門市', 1, '桃園市中壢區新中北路243號1樓', '2023-01-10 15:51:48', 1),
('S1673336326250', '中壢站前門市', 1, '桃園市中壢區健行路2號', '2023-01-10 15:51:48', 1),
('S1673336326251', '中壢sogo門市', 1, '桃園市中壢區元化路二段33號', '2023-01-10 15:51:48', 1),
('S1673336326252', '內壢站前門市', 1, '桃園市中壢區中華路一段288號', '2023-01-10 15:51:48', 1),
('S1673336326253', '中壢龍岡門市', 1, '桃園市中壢區龍岡路二段115號', '2023-01-10 15:51:48', 1),
('S1673337242970', '中壢夜市櫃', 2, '桃園市中壢區中央西路二段125號', '2023-01-10 16:04:43', 1),
('S1673337242971', '中壢大江櫃', 2, '桃園市中壢區中園路二段501號', '2023-01-10 16:04:43', 1),
('S1673337242972', '青埔高鐵櫃', 2, '桃園市中壢區高鐵站前東路一段1號', '2023-01-10 16:04:43', 1),
('S1673337242973', '平鎮大潤發櫃', 2, '桃園市平鎮區南東路57-1號', '2023-01-10 16:04:43', 1),
('S1673337242974', '八德國小櫃', 2, '桃園市八德區興豐路222號', '2023-01-10 16:04:43', 1);

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
  `washing_time` datetime NOT NULL COMMENT '預計洗衣完成時間',
  `washing_price` int(11) NOT NULL COMMENT '洗衣總額(洗脫乾摺)',
  `sent_to` varchar(11) NOT NULL COMMENT '送洗方式',
  `sentTo_address` varchar(128) DEFAULT NULL COMMENT '送洗門市或地址',
  `sent_back` varchar(11) NOT NULL COMMENT '取回方式',
  `sentBack_address` varchar(128) DEFAULT NULL COMMENT '取衣門市或地址',
  `sentBack_time` datetime NOT NULL COMMENT '預計取回時間',
  `sentprice` int(11) NOT NULL COMMENT '運費總額',
  `order_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '訂單成立時間',
  `carbon_emission` float NOT NULL COMMENT '碳排量',
  `carbon_tax` float NOT NULL COMMENT '碳稅',
  `carbon_point` float NOT NULL COMMENT '碳點數',
  `total_price` int(11) NOT NULL COMMENT '整筆訂單總額',
  `order_status` int(11) NOT NULL DEFAULT 1 COMMENT '訂單狀態(1:處理中, 2:完成, 3:取消)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='訂單紀錄表';

-- --------------------------------------------------------

--
-- 資料表結構 `wash_mode`
--

CREATE TABLE `wash_mode` (
  `mode_id` varchar(64) NOT NULL COMMENT '模式編號',
  `mode_name` varchar(128) NOT NULL COMMENT '模式名稱',
  `mode_type` int(11) NOT NULL COMMENT '型態(1:洗衣,2:脫水,3:乾衣,4:摺衣)',
  `mode_point` float NOT NULL COMMENT '碳點數',
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
  ADD PRIMARY KEY (`bag_id`,`mem_id`,`borrow_time`);

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
-- 資料表索引 `grid`
--
ALTER TABLE `grid`
  ADD PRIMARY KEY (`grid_id`);

--
-- 資料表索引 `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

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
