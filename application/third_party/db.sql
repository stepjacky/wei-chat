-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.6.10 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win64
-- HeidiSQL 版本:                  7.0.0.4390
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出 filter 的数据库结构
CREATE DATABASE IF NOT EXISTS `filter` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `filter`;


-- 导出  表 filter.artitle 结构
CREATE TABLE IF NOT EXISTS `artitle` (
  `id` varchar(50) NOT NULL COMMENT '编号',
  `parent` varchar(50) DEFAULT 'null',
  `leaf` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parent` (`parent`),
  CONSTRAINT `fk_parent` FOREIGN KEY (`parent`) REFERENCES `artitle` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章';

-- 正在导出表  filter.artitle 的数据：~78 rows (大约)
/*!40000 ALTER TABLE `artitle` DISABLE KEYS */;
INSERT INTO `artitle` (`id`, `parent`, `leaf`) VALUES
	('1', NULL, 1),
	('11', '1', 1),
	('111', '11', 1),
	('1110', '1', 1),
	('1111', '1', 1),
	('1112', '1', 1),
	('112', '11', 1),
	('12', '1', 1),
	('121', '12', 1),
	('122', '12', 1),
	('123', '12', 1),
	('13', '1', 1),
	('131', '13', 1),
	('132', '13', 1),
	('14', '1', 1),
	('141', '14', 1),
	('142', '14', 1),
	('15', '1', 1),
	('16', '1', 1),
	('17', '1', 1),
	('18', '1', 1),
	('19', '1', 1),
	('2', NULL, 1),
	('21', '2', 1),
	('211', '21', 1),
	('212', '21', 1),
	('213', '21', 1),
	('214', '21', 1),
	('215', '21', 1),
	('216', '21', 1),
	('22', '2', 1),
	('221', '22', 1),
	('222', '22', 1),
	('223', '22', 1),
	('224', '22', 1),
	('225', '22', 1),
	('23', '2', 1),
	('231', '23', 1),
	('232', '23', 1),
	('24', '2', 1),
	('241', '24', 1),
	('242', '24', 1),
	('243', '24', 1),
	('244', '24', 1),
	('245', '24', 1),
	('246', '24', 1),
	('247', '24', 1),
	('3', NULL, 1),
	('31', '3', 1),
	('311', '31', 1),
	('312', '31', 1),
	('313', '31', 1),
	('32', '3', 1),
	('321', '32', 1),
	('322', '32', 1),
	('323', '32', 1),
	('324', '32', 1),
	('33', '3', 1),
	('331', '33', 1),
	('332', '33', 1),
	('333', '33', 1),
	('4', NULL, 1),
	('41', '4', 1),
	('42', '4', 1),
	('43', '4', 1),
	('44', '4', 1),
	('5', NULL, 1),
	('51', '5', 1),
	('52', '5', 1),
	('53', '5', 1),
	('54', '5', 1),
	('55', '5', 1),
	('56', '5', 1),
	('561', '56', 1),
	('562', '56', 1),
	('57', '5', 1),
	('6', NULL, 1),
	('61', '6', 1),
	('62', '6', 1);
/*!40000 ALTER TABLE `artitle` ENABLE KEYS */;


-- 导出  表 filter.artitle_info 结构
CREATE TABLE IF NOT EXISTS `artitle_info` (
  `name` varchar(100) DEFAULT NULL,
  `lang` varchar(50) DEFAULT 'zh-cn',
  `content` text,
  `aid` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_aid` (`aid`),
  CONSTRAINT `fk_aid` FOREIGN KEY (`aid`) REFERENCES `artitle` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- 正在导出表  filter.artitle_info 的数据：~3 rows (大约)
/*!40000 ALTER TABLE `artitle_info` DISABLE KEYS */;
INSERT INTO `artitle_info` (`name`, `lang`, `content`, `aid`, `id`) VALUES
	('顺丰速递发生', 'zh-cn', '<p>\r\n	<span style="color:#800000;"><span style="font-size: 26px;"><span style="font-family: arial,helvetica,sans-serif;"><span style="background-color:#ffd700;">顺丰速递发生</span></span></span></span></p>\r\n', '111', 3),
	('kjj', 'en-us', '<p>\r\n fsfsdfsfsdfsdfsd</p>\r\n', '111', 4),
	('纺织', 'zh-cn', '<p>\r\n fsfsdfsfsdfsdfsd</p>\r\n', '11', 5);
/*!40000 ALTER TABLE `artitle_info` ENABLE KEYS */;


-- 导出  表 filter.ci_sessions 结构
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(500) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会话,hidden';

-- 正在导出表  filter.ci_sessions 的数据：~1 rows (大约)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
	('d86f76428a54b0462cd8d078fd3c4c7b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', 1364106196, '');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- 导出  表 filter.contact 结构
CREATE TABLE IF NOT EXISTS `contact` (
  `lang` varchar(50) DEFAULT 'zh-cn',
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  filter.contact 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;


-- 导出  表 filter.contact_info 结构
CREATE TABLE IF NOT EXISTS `contact_info` (
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `company` varchar(1000) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT '''ano user''',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 正在导出表  filter.contact_info 的数据：~3 rows (大约)
/*!40000 ALTER TABLE `contact_info` DISABLE KEYS */;
INSERT INTO `contact_info` (`email`, `phone`, `company`, `address`, `id`, `name`) VALUES
	('sdf', 'safds', 'asdf', 'sadfsd', 1, '\'ano user\''),
	('5423sfs', '42342', 'sfsfsdff ', '测试', 2, '测试'),
	('测试', '测试', '测试留言', '测试', 3, '测试联系方式邮件');
/*!40000 ALTER TABLE `contact_info` ENABLE KEYS */;


-- 导出  表 filter.intro 结构
CREATE TABLE IF NOT EXISTS `intro` (
  `lang` varchar(50) DEFAULT 'zh-cn',
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  filter.intro 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `intro` DISABLE KEYS */;
/*!40000 ALTER TABLE `intro` ENABLE KEYS */;


-- 导出  表 filter.myuser 结构
CREATE TABLE IF NOT EXISTS `myuser` (
  `id` varchar(200) NOT NULL COMMENT '用户名,text',
  `name` varchar(45) DEFAULT NULL COMMENT '姓名,text',
  `password` varchar(45) DEFAULT NULL COMMENT '密码,password',
  `avatar` varchar(200) DEFAULT NULL COMMENT '头像,text',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户';

-- 正在导出表  filter.myuser 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `myuser` DISABLE KEYS */;
INSERT INTO `myuser` (`id`, `name`, `password`, `avatar`) VALUES
	('nin', NULL, '123456', NULL);
/*!40000 ALTER TABLE `myuser` ENABLE KEYS */;


-- 导出  表 filter.picture 结构
CREATE TABLE IF NOT EXISTS `picture` (
  `id` varchar(50) NOT NULL COMMENT '编号',
  `name` varchar(45) DEFAULT NULL COMMENT '名称,text',
  `path` varchar(100) DEFAULT NULL COMMENT '路径,text,input-xxlarge',
  `ptype` varchar(10) DEFAULT NULL,
  `width` int(11) DEFAULT '0',
  `height` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图片';

-- 正在导出表  filter.picture 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
