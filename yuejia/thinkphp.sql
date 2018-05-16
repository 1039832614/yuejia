/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : thinkphp

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2018-05-16 08:44:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for car
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(25) DEFAULT NULL COMMENT '车辆品牌',
  `pid` int(11) DEFAULT NULL COMMENT '父类编号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car
-- ----------------------------
INSERT INTO `car` VALUES ('1', '大众', '0');
INSERT INTO `car` VALUES ('2', '奥迪', '0');
INSERT INTO `car` VALUES ('3', '奥迪Q5', '2');
INSERT INTO `car` VALUES ('4', '奥迪Q7', '2');
INSERT INTO `car` VALUES ('5', '奥迪R8', '2');
INSERT INTO `car` VALUES ('6', '奥迪S5', '2');
INSERT INTO `car` VALUES ('7', '甲壳虫', '1');
INSERT INTO `car` VALUES ('8', '尚酷', '1');
INSERT INTO `car` VALUES ('9', '辉腾', '1');
INSERT INTO `car` VALUES ('10', '迈腾', '1');
INSERT INTO `car` VALUES ('11', '途锐', '1');
INSERT INTO `car` VALUES ('12', '高尔夫', '1');
INSERT INTO `car` VALUES ('13', '高尔夫GTI', '1');
INSERT INTO `car` VALUES ('14', '江淮', '0');
INSERT INTO `car` VALUES ('15', '金牛', '14');
INSERT INTO `car` VALUES ('16', '雪豹', '14');
INSERT INTO `car` VALUES ('17', '宝斯通', '14');
INSERT INTO `car` VALUES ('18', '江铃', '0');
INSERT INTO `car` VALUES ('19', '凯威', '18');
INSERT INTO `car` VALUES ('20', '凯运', '18');
INSERT INTO `car` VALUES ('21', '宝马', '0');
INSERT INTO `car` VALUES ('22', '宝马3', '21');
INSERT INTO `car` VALUES ('23', '宝马5', '21');

-- ----------------------------
-- Table structure for reserve_drive
-- ----------------------------
DROP TABLE IF EXISTS `reserve_drive`;
CREATE TABLE `reserve_drive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '活动标题',
  `cid` int(11) NOT NULL DEFAULT '1' COMMENT '车辆id',
  `starttime` varchar(25) DEFAULT NULL COMMENT '发起日期',
  `username` varchar(25) DEFAULT NULL,
  `stoptime` varchar(25) DEFAULT NULL COMMENT '截止日期',
  `number` int(11) NOT NULL DEFAULT '1' COMMENT '预约人数',
  `anumber` int(11) DEFAULT NULL COMMENT '已经预约人数',
  `phone` char(11) DEFAULT NULL COMMENT '联系方式',
  `departture` varchar(100) DEFAULT NULL COMMENT '出发地',
  `destination` varchar(100) DEFAULT NULL COMMENT '目的地',
  `introduce` varchar(100) DEFAULT NULL COMMENT '行程介绍',
  `gooff` varchar(25) DEFAULT NULL COMMENT '出发时间',
  `gathertime` varchar(25) DEFAULT NULL COMMENT '集合时间',
  `setaddress` varchar(100) DEFAULT NULL COMMENT '集合地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reserve_drive
-- ----------------------------
INSERT INTO `reserve_drive` VALUES ('1', '第一个活动', '5', '05/01/2018', 'admin', '05/23/2018', '4', '4', '15232129018', '石家庄', '北京', '费用自理，只为快乐出行', '05/01/2018', '05/24/2018', '万达');
INSERT INTO `reserve_drive` VALUES ('2', '第二个活动', '5', '05/01/2018', 'index', '05/23/2018', '4', '1', '15232129011', '', '', '', '', '', '');
INSERT INTO `reserve_drive` VALUES ('3', '西安之行', '10', '05/01/2018', '123456', '05/31/2018', '4', null, '15232129017', '石家庄', '西安', '油费，住宿费自理，文明出行', '05/01/2018', '05/31/2018', '海悦');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(25) NOT NULL DEFAULT 'admin',
  `pwd` varchar(25) NOT NULL DEFAULT 'admin',
  `phone` char(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL COMMENT '车辆型号id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '123456', '15232129018', '5');
INSERT INTO `user` VALUES ('2', 'index', '123456', '15232129011', null);
INSERT INTO `user` VALUES ('3', '123456', '123456', '15232129017', '10');
