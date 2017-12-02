/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : itcast

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2017-12-02 19:25:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(12) DEFAULT NULL,
  `gender` char(2) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `edu` char(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'GD', '女', '18', '4');
INSERT INTO `user` VALUES ('2', '郑爽', '女', '20', '3');
INSERT INTO `user` VALUES ('3', '吴亦凡', '男', '3', '3');
INSERT INTO `user` VALUES ('4', '李白', '男', '24', '3');
