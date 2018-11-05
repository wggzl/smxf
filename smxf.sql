/*
Navicat MySQL Data Transfer

Source Server         : phpstudyMySQL
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : smxf

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-05 18:33:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `smxf_goods`
-- ----------------------------
DROP TABLE IF EXISTS `smxf_goods`;
CREATE TABLE `smxf_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(2) NOT NULL DEFAULT '',
  `goods_name` varchar(100) NOT NULL DEFAULT '',
  `goods_sn` varchar(30) NOT NULL DEFAULT '',
  `goods_style` char(3) NOT NULL DEFAULT '',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock` int(11) NOT NULL DEFAULT '0',
  `size_str` text NOT NULL,
  `image_src` varchar(150) NOT NULL DEFAULT '',
  `sch_ids` text NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of smxf_goods
-- ----------------------------
INSERT INTO `smxf_goods` VALUES ('1', '针织', '校服', '', '通用', '369.00', '123', '很好|很好good', '20181030/201810300726465bd807b6f1edaveer-159547924.jpg', '10,8', '2018-10-30 07:49:44', '2018-10-30 07:49:44');
INSERT INTO `smxf_goods` VALUES ('2', '梭织', '校服-2', '', '女', '654.00', '159', '大码|小马-2', '20181030/201810300810485bd8120804b99veer-158643569.jpg', '10,8,7', '2018-10-30 10:01:06', '2018-10-30 08:11:00');
INSERT INTO `smxf_goods` VALUES ('3', '梭织', '校服-3', '', '男', '623.00', '329', '中码|小码', '20181030/201810300812035bd812539b20cveer-127580840.jpg', '7', '2018-10-30 08:12:15', '2018-10-30 08:12:15');
INSERT INTO `smxf_goods` VALUES ('4', '梭织', '校服-4', '', '通用', '259.00', '325', '大小码|小大码', '20181030/201810300813095bd8129513aafveer-132993762.jpg', '10,8', '2018-10-30 08:13:22', '2018-10-30 08:13:22');
INSERT INTO `smxf_goods` VALUES ('5', '针织', '上衣+裤子', 'sy-10001', '男', '359.00', '215', 'ee', '20181101/201811010339425bda757e09df3veer-132993762.jpg', '11,10,8', '2018-11-01 03:43:39', '2018-11-01 03:43:39');
INSERT INTO `smxf_goods` VALUES ('6', '针织', 'afasd', '333', '女', '342.00', '33', 'asd', '20181101/201811010634575bda9e91d1bf6veer-123529917.jpg', '11,10,8,7', '2018-11-01 06:35:07', '2018-11-01 06:35:07');

-- ----------------------------
-- Table structure for `smxf_orders`
-- ----------------------------
DROP TABLE IF EXISTS `smxf_orders`;
CREATE TABLE `smxf_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` char(61) NOT NULL DEFAULT '',
  `recipients` char(30) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `contact` char(20) NOT NULL DEFAULT '',
  `order_type` tinyint(4) NOT NULL DEFAULT '0',
  `invoices_type` tinyint(4) NOT NULL DEFAULT '0',
  `tax_number` char(30) DEFAULT NULL,
  `company_name` char(50) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `buy_comment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_sn_unique` (`order_sn`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of smxf_orders
-- ----------------------------
INSERT INTO `smxf_orders` VALUES ('7', 'ygxx18110500001', '333', '555', '444', '2', '1', '666', '555', '1043.00', null, '2018-11-05 09:32:54', '2018-11-05 09:32:54');
INSERT INTO `smxf_orders` VALUES ('8', 'ygxx18110500002', '222', '444', '333', '2', '1', '55', '44', '1402.00', 'casdcsdccdsacsdacasdcasdc', '2018-11-05 09:51:09', '2018-11-05 09:51:09');

-- ----------------------------
-- Table structure for `smxf_order_details`
-- ----------------------------
DROP TABLE IF EXISTS `smxf_order_details`;
CREATE TABLE `smxf_order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `order_sn` char(61) NOT NULL DEFAULT '',
  `goods_id` int(11) NOT NULL DEFAULT '0',
  `goods_name` varchar(100) NOT NULL DEFAULT '',
  `number` int(11) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `size` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_sn_normal` (`order_sn`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of smxf_order_details
-- ----------------------------
INSERT INTO `smxf_order_details` VALUES ('8', '7', 'ygxx18110500001', '6', 'afasd', '2', '342.00', 'asd', '2018-11-05 09:32:54', '2018-11-05 09:32:54');
INSERT INTO `smxf_order_details` VALUES ('9', '7', 'ygxx18110500001', '5', '上衣+裤子', '1', '359.00', 'ee', '2018-11-05 09:32:54', '2018-11-05 09:32:54');
INSERT INTO `smxf_order_details` VALUES ('10', '8', 'ygxx18110500002', '6', 'afasd', '2', '342.00', 'asd', '2018-11-05 09:51:09', '2018-11-05 09:51:09');
INSERT INTO `smxf_order_details` VALUES ('11', '8', 'ygxx18110500002', '5', '上衣+裤子', '2', '359.00', 'ee', '2018-11-05 09:51:09', '2018-11-05 09:51:09');

-- ----------------------------
-- Table structure for `smxf_schools`
-- ----------------------------
DROP TABLE IF EXISTS `smxf_schools`;
CREATE TABLE `smxf_schools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sch_name` varchar(50) NOT NULL,
  `sch_name_en` varchar(30) NOT NULL DEFAULT '',
  `keywords` text NOT NULL,
  `sch_type` char(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `isInter` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of smxf_schools
-- ----------------------------
INSERT INTO `smxf_schools` VALUES ('7', '杨公小学', 'ygxx', '杨公,清凉寺', '高中', '2018-10-26 06:58:33', '2018-10-29 02:59:12', '1');
INSERT INTO `smxf_schools` VALUES ('8', '登高小学', 'dgxx', '登高,小学', '初中', '2018-10-29 02:58:59', '2018-10-29 02:58:59', '1');
INSERT INTO `smxf_schools` VALUES ('10', '清凉寺初中', 'qlscz', '清凉寺,初中', '初中', '2018-10-29 07:37:54', '2018-10-29 07:37:54', '0');
INSERT INTO `smxf_schools` VALUES ('11', '育才小学', 'ycxx', '育才', '小学', '2018-10-30 10:22:58', '2018-10-30 10:22:58', '0');

-- ----------------------------
-- Table structure for `smxf_students`
-- ----------------------------
DROP TABLE IF EXISTS `smxf_students`;
CREATE TABLE `smxf_students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stu_grade` tinyint(3) unsigned NOT NULL,
  `stu_class` tinyint(3) unsigned NOT NULL,
  `stu_num` char(10) NOT NULL,
  `stu_name_en` varchar(20) DEFAULT NULL,
  `stu_name` varchar(10) NOT NULL,
  `sex` char(1) NOT NULL,
  `school_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stu_unique` (`school_id`,`stu_grade`,`stu_class`,`stu_num`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of smxf_students
-- ----------------------------
INSERT INTO `smxf_students` VALUES ('1', '11', '1', '1', 'wangwu44', '王五', '女', '7', '1', null, null);
INSERT INTO `smxf_students` VALUES ('2', '11', '3', '3', 'lisi', '李四', '女', '7', '1', null, null);
INSERT INTO `smxf_students` VALUES ('3', '10', '2', '4', 'wangwu', '王五6', '男', '7', '1', null, null);
INSERT INTO `smxf_students` VALUES ('4', '12', '3', '5', 'zhaoliu', '赵柳', '男', '7', '1', null, null);
INSERT INTO `smxf_students` VALUES ('5', '10', '2', '8', 'wdn', '王大拿', '女', '7', '1', null, null);
INSERT INTO `smxf_students` VALUES ('6', '12', '2', '10', 'xdj', '谢大脚', '女', '7', '1', null, null);

-- ----------------------------
-- Table structure for `smxf_users`
-- ----------------------------
DROP TABLE IF EXISTS `smxf_users`;
CREATE TABLE `smxf_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of smxf_users
-- ----------------------------
INSERT INTO `smxf_users` VALUES ('1', 'admin', '793f9406642472ed0a6cd03f47c64861', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
