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

-- 导出 weichat 的数据库结构
CREATE DATABASE IF NOT EXISTS `weichat` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `weichat`;


-- 导出  表 weichat.cardcatalog 结构
CREATE TABLE IF NOT EXISTS `cardcatalog` (
  `id` varchar(50) NOT NULL COMMENT '编号,hidden',
  `name` varchar(50) DEFAULT NULL COMMENT '名称,text',
  `image` varchar(500) DEFAULT NULL COMMENT '模板,image',
  `info` varchar(1000) DEFAULT NULL COMMENT '说明,ckeditor',
  `merchant_id` varchar(50) NOT NULL COMMENT '所属商家,auto',
  `defed` tinyint(1) DEFAULT '0' COMMENT '启用,checkbox',
  PRIMARY KEY (`id`),
  KEY `fk_cardcatalog_merchant1_idx` (`merchant_id`),
  CONSTRAINT `fk_cardcatalog_merchant1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员卡';

-- 数据导出被取消选择。


-- 导出  表 weichat.cards 结构
CREATE TABLE IF NOT EXISTS `cards` (
  `id` varchar(45) DEFAULT NULL COMMENT '编号,hidden',
  `name` varchar(45) DEFAULT NULL COMMENT '名称,text',
  `times` int(11) DEFAULT NULL COMMENT '使用次数,text,readonly',
  `cardcatalog_id` varchar(50) NOT NULL COMMENT '所属卡类,auto',
  `member_id` varchar(45) NOT NULL COMMENT '所属用户,auto',
  KEY `fk_cards_cardcatalog1_idx` (`cardcatalog_id`),
  KEY `fk_cards_member1_idx` (`member_id`),
  CONSTRAINT `fk_cards_cardcatalog1` FOREIGN KEY (`cardcatalog_id`) REFERENCES `cardcatalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cards_member1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员卡记录';

-- 数据导出被取消选择。


-- 导出  表 weichat.coupon 结构
CREATE TABLE IF NOT EXISTS `coupon` (
  `id` varchar(50) NOT NULL COMMENT '编号,hidden',
  `name` varchar(45) DEFAULT NULL,
  `validator` int(11) DEFAULT NULL COMMENT '验证类型,select',
  `cvcode` varchar(45) DEFAULT NULL COMMENT '验证码,text',
  `firedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '使用时间,datepicker',
  `catalog_id` varchar(45) NOT NULL COMMENT '所属优惠券,auto',
  `member_id` varchar(45) NOT NULL COMMENT '领取人,auto',
  PRIMARY KEY (`id`),
  KEY `fk_coupon_coupon_cata_idx` (`catalog_id`),
  KEY `fk_coupon_member1_idx` (`member_id`),
  CONSTRAINT `fk_coupon_coupon_cata` FOREIGN KEY (`catalog_id`) REFERENCES `couponcatalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='优惠券记录';

-- 数据导出被取消选择。


-- 导出  表 weichat.couponcatalog 结构
CREATE TABLE IF NOT EXISTS `couponcatalog` (
  `id` varchar(45) NOT NULL COMMENT '编号,hidden',
  `name` varchar(45) DEFAULT NULL COMMENT '名称,text',
  `amount` varchar(45) DEFAULT NULL COMMENT '发行数量,text',
  `image` varchar(45) DEFAULT NULL COMMENT '优惠券图,image',
  `startdate` date DEFAULT NULL COMMENT '起始日期,datepicker',
  `enddate` date DEFAULT NULL COMMENT '结束日期,datepicker',
  `merchant_id` varchar(50) NOT NULL COMMENT '商家,auto',
  `daily_limit` int(11) DEFAULT NULL COMMENT '日领取数,text',
  `remark` text COMMENT '说明,ckeditor',
  PRIMARY KEY (`id`),
  KEY `fk_coupon_cata_merchant1_idx` (`merchant_id`),
  CONSTRAINT `fk_coupon_cata_merchant1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='优惠券';

-- 数据导出被取消选择。


-- 导出  表 weichat.credits 结构
CREATE TABLE IF NOT EXISTS `credits` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号,hidden',
  `amount` varchar(45) DEFAULT NULL COMMENT '分值,text',
  `firedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '积分日期,datepicker',
  `member_id` varchar(45) NOT NULL COMMENT '积分用户,auto',
  `catalog_id` varchar(45) NOT NULL COMMENT '积分优惠券,auto',
  PRIMARY KEY (`id`),
  KEY `fk_credits_member1_idx` (`member_id`),
  KEY `fk_credits_coupon_cata1_idx` (`catalog_id`),
  CONSTRAINT `fk_credits_coupon_cata1` FOREIGN KEY (`catalog_id`) REFERENCES `couponcatalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_credits_member1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员积分';

-- 数据导出被取消选择。


-- 导出  表 weichat.imagemessage 结构
CREATE TABLE IF NOT EXISTS `imagemessage` (
  `MsgId` bigint(20) NOT NULL COMMENT '编号',
  `msgType` varchar(20) DEFAULT 'image' COMMENT '消息类型,auto',
  `ToUserName` varchar(45) DEFAULT NULL COMMENT '开发者微信号,text',
  `FromUserName` varchar(45) DEFAULT NULL COMMENT '发送方帐号,text',
  `CreateTime` bigint(20) DEFAULT NULL COMMENT '消息创建时间,text',
  `PicUrl` varchar(1000) DEFAULT NULL COMMENT '图片链接,text,input-xxlarge',
  PRIMARY KEY (`MsgId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图片消息';

-- 数据导出被取消选择。


-- 导出  表 weichat.linkmessage 结构
CREATE TABLE IF NOT EXISTS `linkmessage` (
  `MsgId` bigint(20) NOT NULL COMMENT '编号',
  `msgType` varchar(20) DEFAULT 'link' COMMENT '消息类型,auto',
  `ToUserName` varchar(45) DEFAULT NULL COMMENT '接收方微信号,text',
  `FromUserName` varchar(45) DEFAULT NULL COMMENT '发送方微信号,text',
  `CreateTime` bigint(20) DEFAULT NULL COMMENT '消息创建时间,text',
  `Title` varchar(1000) DEFAULT NULL COMMENT '消息标题,text',
  `Description` varchar(45) DEFAULT NULL COMMENT '消息描述,textarea',
  `Url` varchar(45) DEFAULT NULL COMMENT '消息链接,text',
  PRIMARY KEY (`MsgId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='链接消息';

-- 数据导出被取消选择。


-- 导出  表 weichat.locationmessage 结构
CREATE TABLE IF NOT EXISTS `locationmessage` (
  `MsgId` bigint(20) NOT NULL COMMENT '编号',
  `msgType` varchar(20) DEFAULT 'location' COMMENT '消息类型,auto',
  `ToUserName` varchar(45) DEFAULT NULL COMMENT '开发者微信号,text',
  `FromUserName` varchar(45) DEFAULT NULL COMMENT '发送方帐号,text',
  `CreateTime` bigint(20) DEFAULT NULL COMMENT '消息创建时间,text',
  `Location_X` varchar(45) DEFAULT NULL COMMENT '地理位置纬度,text',
  `Location_Y` varchar(45) DEFAULT NULL COMMENT '地理位置经度,text',
  `Scale` float DEFAULT NULL COMMENT '地图缩放大小,text',
  `Label` varchar(45) DEFAULT NULL COMMENT '地理位置信息,text',
  PRIMARY KEY (`MsgId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='地理位置消息';

-- 数据导出被取消选择。


-- 导出  表 weichat.member 结构
CREATE TABLE IF NOT EXISTS `member` (
  `id` varchar(45) NOT NULL COMMENT '编号,hidden',
  `weixin` varchar(45) DEFAULT NULL COMMENT '微信,text',
  `name` varchar(45) DEFAULT NULL COMMENT '昵称,text',
  `email` varchar(45) DEFAULT NULL COMMENT '电邮,text',
  `fromusername` varchar(50) NOT NULL COMMENT '公众账号,auto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员';

-- 数据导出被取消选择。


-- 导出  表 weichat.merchant 结构
CREATE TABLE IF NOT EXISTS `merchant` (
  `id` varchar(50) NOT NULL COMMENT '用户名,text',
  `pword` varchar(45) DEFAULT NULL COMMENT '密码,password',
  `avator` varchar(1024) NOT NULL COMMENT '商家头像,text,input-xxlarge',
  `name` varchar(50) NOT NULL COMMENT '商家名称,text',
  `email` varchar(45) DEFAULT NULL COMMENT 'EMAIL,text',
  `grade` int(11) DEFAULT '0' COMMENT 'VIP级别,auto',
  `phone` varchar(45) DEFAULT NULL COMMENT '电话,text',
  `qq` varchar(45) DEFAULT NULL COMMENT 'QQ,text',
  `address` varchar(255) DEFAULT NULL COMMENT '地址,textarea',
  `info` varchar(255) DEFAULT NULL COMMENT '简介,textarea',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商户';

-- 数据导出被取消选择。


-- 导出  表 weichat.message 结构
CREATE TABLE IF NOT EXISTS `message` (
  `id` varchar(50) NOT NULL COMMENT '编号,auto',
  `tousername` varchar(50) DEFAULT NULL COMMENT '接收用户,text',
  `fromusername` varchar(255) DEFAULT NULL COMMENT '发送用户,text',
  `mtype` varchar(50) DEFAULT NULL COMMENT '消息类型,text',
  `msgId` varchar(50) DEFAULT NULL COMMENT '消息编号,text',
  `msgName` varchar(255) DEFAULT NULL COMMENT '消息标题,text',
  `firedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发送时间,text',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='消息';

-- 数据导出被取消选择。


-- 导出  表 weichat.news 结构
CREATE TABLE IF NOT EXISTS `news` (
  `id` varchar(50) NOT NULL COMMENT '编号,auto',
  `fromusername` varchar(50) NOT NULL COMMENT '所属公众号,auto',
  `name` varchar(100) NOT NULL COMMENT '标题,text',
  `info` varchar(255) DEFAULT NULL COMMENT '说明,textarea',
  `picurl` varchar(255) DEFAULT NULL COMMENT '图片链接,image',
  `content` text NOT NULL COMMENT '内容,ckeditor',
  `firedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发表时间,auto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图文消息';

-- 数据导出被取消选择。


-- 导出  表 weichat.picture 结构
CREATE TABLE IF NOT EXISTS `picture` (
  `id` varchar(50) NOT NULL COMMENT '编号,hidden',
  `name` varchar(45) DEFAULT NULL COMMENT '名称,text',
  `path` varchar(500) DEFAULT NULL COMMENT '路径,text,input-xxlarge',
  `ptype` varchar(45) DEFAULT NULL COMMENT '类型,text',
  `width` int(11) DEFAULT NULL COMMENT '宽度,text',
  `height` int(11) DEFAULT NULL COMMENT '高度,text',
  `firedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '日期,auto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图片,hidden';

-- 数据导出被取消选择。


-- 导出  表 weichat.pubweixin 结构
CREATE TABLE IF NOT EXISTS `pubweixin` (
  `weixin_id` varchar(45) NOT NULL COMMENT '原始微信号,text',
  `token` varchar(45) DEFAULT NULL COMMENT '令牌,text',
  `desturl` varchar(500) DEFAULT NULL COMMENT '接口地址,auto',
  `name` varchar(45) DEFAULT NULL COMMENT '公众号名称,text',
  `weixin` varchar(45) DEFAULT NULL COMMENT '微信号,text',
  `avatar` varchar(1000) DEFAULT NULL COMMENT '头像,text,input-xxlarge',
  `appid` varchar(45) DEFAULT NULL COMMENT 'AppId,text',
  `appsecret` varchar(45) DEFAULT NULL COMMENT 'AppSecret,text',
  `statlink` varchar(1000) DEFAULT NULL COMMENT '图文页统计代码,textarea',
  `qq` varchar(45) DEFAULT NULL COMMENT '公众账号QQ,text',
  `merchant_id` varchar(50) NOT NULL COMMENT '所属商户,auto',
  PRIMARY KEY (`weixin_id`),
  KEY `fk_pubweixin_merchant1_idx` (`merchant_id`),
  CONSTRAINT `fk_pubweixin_merchant1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公众账号';

-- 数据导出被取消选择。


-- 导出  表 weichat.respmusicmessage 结构
CREATE TABLE IF NOT EXISTS `respmusicmessage` (
  `id` varchar(50) NOT NULL COMMENT '编号',
  `keywords` varchar(255) NOT NULL COMMENT '关键字,text,input-xxlarge',
  `msgType` varchar(20) NOT NULL DEFAULT 'music' COMMENT '消息类型,auto',
  `FromUserName` varchar(45) NOT NULL COMMENT '发送方,auto',
  `Title` varchar(1000) NOT NULL COMMENT '标题,text',
  `Description` varchar(1000) DEFAULT NULL COMMENT '描述,textarea',
  `MusicUrl` varchar(1024) NOT NULL COMMENT '语音链接,text,input-xxlarge',
  `HQMusicUrl` varchar(1024) DEFAULT NULL COMMENT '高品质语音链接,text,input-xxlarge',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='音乐消息回复';

-- 数据导出被取消选择。


-- 导出  表 weichat.respnewslist 结构
CREATE TABLE IF NOT EXISTS `respnewslist` (
  `respnewsid` varchar(50) NOT NULL,
  `newsid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图文回复列表';

-- 数据导出被取消选择。


-- 导出  表 weichat.respnewsmessage 结构
CREATE TABLE IF NOT EXISTS `respnewsmessage` (
  `id` varchar(50) NOT NULL COMMENT '编号,hidden',
  `msgType` varchar(20) DEFAULT 'news' COMMENT '消息类型,auto',
  `FromUserName` varchar(45) DEFAULT NULL COMMENT '发送者,auto',
  `keywords` varchar(255) NOT NULL COMMENT '关键字,textarea',
  `ArticleCount` int(11) NOT NULL DEFAULT '1' COMMENT '消息数,auto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图文消息回复';

-- 数据导出被取消选择。


-- 导出  表 weichat.resptextmessage 结构
CREATE TABLE IF NOT EXISTS `resptextmessage` (
  `id` varchar(50) NOT NULL COMMENT '编号,hidden',
  `msgType` varchar(20) DEFAULT 'text' COMMENT '消息类型,auto',
  `FromUserName` varchar(45) DEFAULT NULL COMMENT '发送者,auto',
  `Content` varchar(1000) DEFAULT NULL COMMENT '内容,textarea,input-xlarge',
  `keywords` varchar(255) NOT NULL COMMENT '关键字,textarea',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文本消息回复';

-- 数据导出被取消选择。


-- 导出  表 weichat.subscribemessage 结构
CREATE TABLE IF NOT EXISTS `subscribemessage` (
  `fromusername` varchar(50) NOT NULL COMMENT '公众账号,auto',
  `msgtype` varchar(50) NOT NULL DEFAULT 'text' COMMENT '消息类型,auto',
  `msgId` varchar(50) DEFAULT NULL COMMENT '消息编号,text',
  `content` varchar(1024) NOT NULL COMMENT '内容,textarea,input-xxlarge',
  PRIMARY KEY (`fromusername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='关注时回复';

-- 数据导出被取消选择。


-- 导出  表 weichat.textmessage 结构
CREATE TABLE IF NOT EXISTS `textmessage` (
  `MsgId` bigint(20) NOT NULL COMMENT '编号',
  `msgType` varchar(20) DEFAULT 'text' COMMENT '消息类型,auto',
  `ToUserName` varchar(45) DEFAULT NULL COMMENT '目标用户,text',
  `FromUserName` varchar(45) DEFAULT NULL COMMENT '发送者,text',
  `CreateTime` bigint(20) DEFAULT NULL COMMENT '创建时间,datepicker',
  `Content` varchar(1000) DEFAULT NULL COMMENT '内容,textarea',
  PRIMARY KEY (`MsgId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文本消息';

-- 数据导出被取消选择。


-- 导出  表 weichat.userpicture 结构
CREATE TABLE IF NOT EXISTS `userpicture` (
  `id` varchar(50) NOT NULL COMMENT '编号,hidden',
  `name` varchar(45) DEFAULT NULL COMMENT '名称,text',
  `path` varchar(500) DEFAULT NULL COMMENT '路径,text,input-xxlarge',
  `ptype` varchar(45) DEFAULT NULL COMMENT '类型,text',
  `width` int(11) DEFAULT NULL COMMENT '宽度,text',
  `height` int(11) DEFAULT NULL COMMENT '高度,text',
  `firedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '日期,auto',
  `merchant_id` varchar(50) NOT NULL COMMENT '所属商家,auto',
  PRIMARY KEY (`id`),
  KEY `fk_userpicture_merchant1_idx` (`merchant_id`),
  CONSTRAINT `fk_userpicture_merchant1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户图片';

-- 数据导出被取消选择。


-- 导出  表 weichat.vcode 结构
CREATE TABLE IF NOT EXISTS `vcode` (
  `code` varchar(50) NOT NULL,
  `encstr` varchar(50) DEFAULT NULL,
  `vpos` int(11) DEFAULT NULL,
  `vchar` char(1) DEFAULT NULL,
  `coupon_id` varchar(50) NOT NULL COMMENT '所属优惠券,auto',
  PRIMARY KEY (`code`),
  KEY `fk_vcode_coupon1_idx` (`coupon_id`),
  CONSTRAINT `fk_vcode_coupon1` FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='验证码,hidden';

-- 数据导出被取消选择。
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
