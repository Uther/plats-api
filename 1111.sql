-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 07 月 01 日 13:58
-- 服务器版本: 5.5.28
-- PHP 版本: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `1111`
--

-- --------------------------------------------------------

--
-- 表的结构 `apis`
--

CREATE TABLE IF NOT EXISTS `apis` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(30) NOT NULL,
  `uin` varchar(30) DEFAULT NULL,
  `key` varchar(100) NOT NULL,
  `secret` varchar(100) NOT NULL,
  `session` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- 表的结构 `com_gxg`
--

CREATE TABLE IF NOT EXISTS `com_gxg` (
  `sn` varchar(30) NOT NULL,
  `num_iid` varchar(30) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`num_iid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gxg_goods`
--

CREATE TABLE IF NOT EXISTS `gxg_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_sn` varchar(20) NOT NULL DEFAULT '' COMMENT '商品款号',
  `category_id` varchar(200) DEFAULT NULL COMMENT '一级分类id',
  `fabric` varchar(50) DEFAULT '' COMMENT '材质',
  `style` varchar(30) DEFAULT '' COMMENT '款式',
  `salePrice` float DEFAULT NULL COMMENT '售价',
  `price` float DEFAULT NULL COMMENT '促销价',
  `goods_name` varchar(50) DEFAULT '' COMMENT '商品名称',
  `goods_desc` text COMMENT '商品描述',
  `listimage` varchar(200) DEFAULT NULL,
  `rulerDescription` int(11) DEFAULT '1' COMMENT '尺码细节',
  `integration` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT '1',
  `contact` varchar(15) DEFAULT '',
  `isgift` int(11) DEFAULT '0',
  `isDiscount` int(11) DEFAULT '0' COMMENT '0)有会员折扣，1）没有会员折扣',
  `is_sale` smallint(5) DEFAULT '0' COMMENT '是否在售（1在售，0下架）',
  `sort` int(11) DEFAULT '1' COMMENT '推荐商品排序',
  `modify_time` datetime DEFAULT NULL,
  `popularity` int(11) DEFAULT '0' COMMENT '人气',
  `volume` int(11) DEFAULT '0' COMMENT '销量',
  `freight` float DEFAULT '0' COMMENT '运费',
  `shareContent` varchar(100) DEFAULT '' COMMENT '分享文案',
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`goods_id`),
  KEY `catId_index` (`category_id`),
  KEY `price_index` (`salePrice`),
  KEY `name_index` (`goods_name`),
  KEY `store_index` (`stock`),
  KEY `sort_index` (`sort`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=781 ;

-- --------------------------------------------------------

--
-- 表的结构 `gxg_goods_info`
--

CREATE TABLE IF NOT EXISTS `gxg_goods_info` (
  `goods_sn` varchar(20) NOT NULL,
  `desc` text,
  PRIMARY KEY (`goods_sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品信息表';

-- --------------------------------------------------------

--
-- 表的结构 `gxg_goods_sku`
--

CREATE TABLE IF NOT EXISTS `gxg_goods_sku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(60) NOT NULL DEFAULT '' COMMENT '商品sku',
  `size_id` varchar(20) DEFAULT '' COMMENT '尺码id',
  `color_id` varchar(20) DEFAULT '' COMMENT '颜色id',
  `goods_sn` varchar(20) NOT NULL DEFAULT '0' COMMENT '商品款号',
  `stock` smallint(8) DEFAULT '1' COMMENT '库存',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16668 ;

-- --------------------------------------------------------

--
-- 表的结构 `img_gxg`
--

CREATE TABLE IF NOT EXISTS `img_gxg` (
  `num_iid` varchar(20) NOT NULL,
  `goods_sn` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`num_iid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mark_gxg`
--

CREATE TABLE IF NOT EXISTS `mark_gxg` (
  `sn` varchar(20) NOT NULL COMMENT '款号',
  `price` int(5) unsigned NOT NULL COMMENT '价格',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='水印';

-- --------------------------------------------------------

--
-- 表的结构 `offline_gxg`
--

CREATE TABLE IF NOT EXISTS `offline_gxg` (
  `sn` varchar(30) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `online_gxg`
--

CREATE TABLE IF NOT EXISTS `online_gxg` (
  `sn` varchar(30) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `point_gxg`
--

CREATE TABLE IF NOT EXISTS `point_gxg` (
  `sn` varchar(30) NOT NULL,
  `points` varchar(200) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `num_iid` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `store_gxg`
--

CREATE TABLE IF NOT EXISTS `store_gxg` (
  `sku` varchar(20) NOT NULL,
  `num` int(5) NOT NULL,
  PRIMARY KEY (`sku`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sub_gxg`
--

CREATE TABLE IF NOT EXISTS `sub_gxg` (
  `sn` varchar(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='库存表';

-- --------------------------------------------------------

--
-- 表的结构 `tit_gxg`
--

CREATE TABLE IF NOT EXISTS `tit_gxg` (
  `sn` varchar(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ump_gxg`
--

CREATE TABLE IF NOT EXISTS `ump_gxg` (
  `sn` varchar(20) NOT NULL,
  `num_Iid` varchar(30) NOT NULL,
  `price` varchar(20) NOT NULL,
  `ump` varchar(20) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
