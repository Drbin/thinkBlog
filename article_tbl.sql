/*
Navicat MySQL Data Transfer

Source Server         : basedb
Source Server Version : 80013
Source Host           : localhost:3306
Source Database       : article_tbl

Target Server Type    : MYSQL
Target Server Version : 80013
File Encoding         : 65001

Date: 2019-04-24 10:00:05
*/

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `about_tbl`;
CREATE TABLE `about_tbl` (
  `about_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `about_name` varchar(100) DEFAULT NULL,
  `about_words` varchar(200) DEFAULT NULL,
  `about_content` text DEFAULT NULL,
  `about_create` datetime DEFAULT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `about_tbl` VALUES ('1', '关于', '关于', '<p>关于</p>', '2019-04-23 17:38:46');


DROP TABLE IF EXISTS `admin_tbl`;
CREATE TABLE `admin_tbl` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(400) NOT NULL,
  `admin_login_name` varchar(100) DEFAULT NULL,
  `admin_password` varchar(200) DEFAULT NULL,
  `admin_create` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `news_tbl`;
CREATE TABLE `news_tbl` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_name` varchar(400) NOT NULL,
  `news_keywords` varchar(200) DEFAULT NULL,
  `news_desc` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `news_order` char(1) DEFAULT NULL,
  `news_type` int(11) DEFAULT NULL,
  `news_url` varchar(400) DEFAULT NULL,
  `news_content` text NOT NULL,
  `news_create` datetime DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `type_tbl`;
CREATE TABLE `type_tbl` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type_order` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `type_sort` int(4) DEFAULT NULL,
  `type_desc` varchar(400) DEFAULT NULL,
  `type_create` datetime DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
