/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : 210222

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2021-02-23 11:43:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `shorturl`
-- ----------------------------
DROP TABLE IF EXISTS `shorturl`;
CREATE TABLE `shorturl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website` varchar(255) NOT NULL,
  `shorturl` char(10) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1' COMMENT '生成次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shorturl
-- ----------------------------
INSERT INTO `shorturl` VALUES ('1', 'http://www.baidu.com', '13lso3', '9');
