-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.5.31 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出 weichat 的数据库结构
DROP DATABASE IF EXISTS `weichat`;
CREATE DATABASE IF NOT EXISTS `weichat` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `weichat`;


-- 导出  表 weichat.cardcatalog 结构
DROP TABLE IF EXISTS `cardcatalog`;
CREATE TABLE IF NOT EXISTS `cardcatalog` (
  `id` varchar(50) NOT NULL COMMENT '编号,hidden',
  `name` varchar(50) DEFAULT NULL COMMENT '名称,text',
  `picurl` varchar(500) DEFAULT NULL COMMENT '模板,image',
  `info` varchar(1000) DEFAULT NULL COMMENT '会员卡说明,ckeditor',
  `remark` varchar(1024) DEFAULT NULL COMMENT '门店及介绍,textarea',
  `enabled` tinyint(1) DEFAULT '0' COMMENT '是否启用,auto',
  `pubweixin_id` varchar(50) NOT NULL COMMENT '公众账号,auto',
  `merchant_id` varchar(45) DEFAULT NULL COMMENT '所属商家,auto',
  `keyword` varchar(45) DEFAULT NULL COMMENT '关键字,text',
  PRIMARY KEY (`id`),
  KEY `fk_cardcatalog_merchant1_idx` (`pubweixin_id`),
  CONSTRAINT `fk_cardcatalog_merchant1` FOREIGN KEY (`pubweixin_id`) REFERENCES `pubweixin` (`weixin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员卡';

-- 数据导出被取消选择。


-- 导出  表 weichat.cardnum 结构
DROP TABLE IF EXISTS `cardnum`;
CREATE TABLE IF NOT EXISTS `cardnum` (
  `cardcatalog_id` varchar(50) NOT NULL,
  `num` int(10) unsigned zerofill DEFAULT '0000000000',
  PRIMARY KEY (`cardcatalog_id`),
  CONSTRAINT `fk_carduses_cardcatalog1` FOREIGN KEY (`cardcatalog_id`) REFERENCES `cardcatalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 weichat.cards 结构
DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `pubweixin_id` varchar(45) NOT NULL COMMENT '所属微信号,hidden',
  `weixin_id` varchar(45) NOT NULL COMMENT '所属用户,auto',
  `name` varchar(45) DEFAULT NULL COMMENT '名称,text',
  `code` varchar(45) DEFAULT NULL COMMENT '卡号,text',
  `times` int(11) DEFAULT '0' COMMENT '使用次数,text,readonly',
  `m_name` varchar(45) DEFAULT NULL COMMENT '店家名称,text',
  `m_address` varchar(255) DEFAULT NULL COMMENT '店面地址,textarea',
  `m_info` varchar(255) DEFAULT NULL COMMENT '店面介绍,textarea',
  `catalog_id` varchar(50) NOT NULL COMMENT '所属卡类,auto',
  `remark` varchar(255) DEFAULT NULL COMMENT '使用说明,textarea',
  PRIMARY KEY (`pubweixin_id`,`weixin_id`),
  KEY `fk_cards_cardcatalog1_idx` (`catalog_id`),
  KEY `fk_cards_member1_idx` (`weixin_id`),
  KEY `fk_cards_pubweixin22_idx` (`pubweixin_id`),
  CONSTRAINT `fk_cards_cardcatalog1` FOREIGN KEY (`catalog_id`) REFERENCES `cardcatalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cards_member1` FOREIGN KEY (`weixin_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cards_pubweixin22` FOREIGN KEY (`pubweixin_id`) REFERENCES `pubweixin` (`weixin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员卡记录';

-- 数据导出被取消选择。


-- 导出  表 weichat.coupon 结构
DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号,hidden',
  `firedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '领用日期,datepicker',
  `code` varchar(45) DEFAULT NULL COMMENT '验证码,text',
  `m_code` varchar(45) DEFAULT NULL COMMENT '商家验证码,text',
  `weixin_id` varchar(45) NOT NULL COMMENT '用户微信号,auto',
  `memberphone` varchar(45) DEFAULT NULL COMMENT '领取人手机号,text',
  `catalog_id` varchar(45) NOT NULL COMMENT '所属优惠券,auto',
  `m_validated` tinyint(1) DEFAULT '0' COMMENT '商家验证码,text',
  `u_validated` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_coupon_coupon_cata_idx` (`catalog_id`),
  KEY `fk_coupon_member1_idx` (`weixin_id`),
  CONSTRAINT `fk_coupon_coupon_cata` FOREIGN KEY (`catalog_id`) REFERENCES `couponcatalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='优惠券记录';

-- 数据导出被取消选择。


-- 导出  表 weichat.couponcatalog 结构
DROP TABLE IF EXISTS `couponcatalog`;
CREATE TABLE IF NOT EXISTS `couponcatalog` (
  `id` varchar(45) NOT NULL COMMENT '编号,hidden',
  `name` varchar(45) DEFAULT NULL COMMENT '名称,text',
  `amount` varchar(45) DEFAULT NULL COMMENT '发行数量,text',
  `image` varchar(45) DEFAULT NULL COMMENT '优惠券图,image',
  `startdate` date DEFAULT NULL COMMENT '起始日期,datepicker',
  `enddate` date DEFAULT NULL COMMENT '结束日期,datepicker',
  `user_daily_limit` tinyint(4) DEFAULT NULL COMMENT '每日每用户领取数,text',
  `daily_limit` int(11) DEFAULT NULL COMMENT '日领总数,text',
  `remark` text COMMENT '说明,ckeditor',
  `merchant_code` varchar(45) DEFAULT NULL COMMENT '商家验证码,text',
  `picurl` varchar(1024) DEFAULT NULL COMMENT '开始图片url,textarea',
  `keyword` varchar(45) DEFAULT NULL COMMENT '关键字,text',
  `enabled` tinyint(1) DEFAULT '0' COMMENT '是否启用,auto',
  `start` varchar(255) DEFAULT NULL COMMENT '活动开始说明,textarea',
  `end` varchar(255) DEFAULT NULL COMMENT '活动结束说明,textarea',
  `pubweixin_id` varchar(50) NOT NULL COMMENT '所属公众账号,auto',
  `csetting` varchar(255) DEFAULT NULL COMMENT '优惠券设置,textarea',
  PRIMARY KEY (`id`),
  KEY `fk_coupon_cata_merchant1_idx` (`pubweixin_id`),
  CONSTRAINT `fk_coupon_cata_merchant1` FOREIGN KEY (`pubweixin_id`) REFERENCES `pubweixin` (`weixin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='优惠券';

-- 数据导出被取消选择。


-- 导出  表 weichat.credits 结构
DROP TABLE IF EXISTS `credits`;
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
DROP TABLE IF EXISTS `imagemessage`;
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


-- 导出  表 weichat.keywordmap 结构
DROP TABLE IF EXISTS `keywordmap`;
CREATE TABLE IF NOT EXISTS `keywordmap` (
  `tablename` varchar(50) NOT NULL,
  `keyname` varchar(45) NOT NULL,
  PRIMARY KEY (`keyname`,`tablename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 weichat.linkmessage 结构
DROP TABLE IF EXISTS `linkmessage`;
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
DROP TABLE IF EXISTS `locationmessage`;
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


-- 导出  表 weichat.lotterydial 结构
DROP TABLE IF EXISTS `lotterydial`;
CREATE TABLE IF NOT EXISTS `lotterydial` (
  `id` varchar(40) NOT NULL COMMENT '编号,hidden',
  `name` varchar(45) DEFAULT NULL COMMENT '名称,text',
  `firstnum` int(11) DEFAULT NULL COMMENT '一等奖数,text',
  `firstodds` int(11) DEFAULT '1' COMMENT '一等奖几率,text',
  `firstmsg` varchar(100) DEFAULT NULL COMMENT '一等奖说明,textarea',
  `secondnum` int(11) DEFAULT NULL COMMENT '二等奖数,text',
  `secondodds` int(11) DEFAULT '1' COMMENT '二等奖几率,text',
  `secondmsg` varchar(100) DEFAULT NULL COMMENT '二等奖说明,textarea',
  `thirdnum` int(11) DEFAULT NULL COMMENT '三等奖数,text',
  `thirdodds` int(11) DEFAULT '1' COMMENT '三等奖几率,text',
  `thirdmsg` varchar(100) DEFAULT NULL COMMENT '三等奖说明,textarea',
  `futures` int(11) DEFAULT '500' COMMENT '预计人数,text',
  `remark` varchar(1024) DEFAULT NULL COMMENT '说明,textarea',
  `success` varchar(500) DEFAULT '恭喜你中奖了' COMMENT '抽奖成功消息,textarea',
  `failure` varchar(500) DEFAULT '运气差点,下次努力' COMMENT '抽奖失败消息,textarea',
  `start` varchar(500) DEFAULT '抽奖活动开始了' COMMENT '开始消息,textarea',
  `startdate` datetime DEFAULT NULL COMMENT '起始日期,datepicker',
  `end` varchar(500) DEFAULT '本次抽奖已经结束,下次再来' COMMENT '结束消息,textarea',
  `enddate` datetime DEFAULT NULL COMMENT '结束日期,datepicker',
  `code` varchar(45) DEFAULT NULL COMMENT '商家验证,text',
  `enabled` tinyint(1) DEFAULT '0' COMMENT '是否启用,auto',
  `pubweixin_id` varchar(45) NOT NULL COMMENT '所属账号,auto',
  `userlimit` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '用户抽奖限制次数,text',
  `picurl` varchar(1024) DEFAULT NULL COMMENT '开始图片,textarea',
  `keyword` varchar(45) DEFAULT NULL COMMENT '关键字,text',
  PRIMARY KEY (`id`),
  KEY `fk_lotterydial_pubweixin1_idx` (`pubweixin_id`),
  CONSTRAINT `fk_lotterydial_pubweixin1` FOREIGN KEY (`pubweixin_id`) REFERENCES `pubweixin` (`weixin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='抽奖转盘';

-- 数据导出被取消选择。


-- 导出  表 weichat.lotterynum 结构
DROP TABLE IF EXISTS `lotterynum`;
CREATE TABLE IF NOT EXISTS `lotterynum` (
  `pubweixin_id` char(50) DEFAULT NULL,
  `lotterydial_id` char(50) DEFAULT NULL,
  `weixin_id` char(50) DEFAULT NULL,
  `num` tinyint(3) unsigned DEFAULT '1',
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 数据导出被取消选择。


-- 导出  表 weichat.lotterywin 结构
DROP TABLE IF EXISTS `lotterywin`;
CREATE TABLE IF NOT EXISTS `lotterywin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weixin_id` char(100) DEFAULT NULL COMMENT '用户微信号,text',
  `wingrade` int(11) DEFAULT NULL COMMENT '中奖级别,text',
  `merchant_code` varchar(200) DEFAULT NULL COMMENT '商家验证码,text',
  `userphone` varchar(45) DEFAULT NULL COMMENT '用户手机号,text',
  `firedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '中奖日期,datepicker',
  `lottery_code` varchar(45) DEFAULT NULL COMMENT '用户验证码,text',
  `lotterydial_id` varchar(40) DEFAULT NULL COMMENT '所属转盘,auto',
  `m_validated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `u_validated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_lotterywin_lotterydial1` (`lotterydial_id`),
  KEY `id` (`id`),
  CONSTRAINT `fk_lotterywin_lotterydial1` FOREIGN KEY (`lotterydial_id`) REFERENCES `lotterydial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='转盘中奖';

-- 数据导出被取消选择。


-- 导出  表 weichat.member 结构
DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` varchar(45) NOT NULL COMMENT '编号,hidden',
  `pubweixin_id` varchar(50) DEFAULT NULL COMMENT '公众账号,auto',
  `weixin` varchar(45) DEFAULT NULL COMMENT '微信,text',
  `name` varchar(45) DEFAULT NULL COMMENT '昵称,text',
  `email` varchar(45) DEFAULT NULL COMMENT '电邮,text',
  PRIMARY KEY (`id`),
  KEY `fk_member_pubweixin1_idx` (`pubweixin_id`),
  CONSTRAINT `fk_member_pubweixin1` FOREIGN KEY (`pubweixin_id`) REFERENCES `pubweixin` (`weixin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员';

-- 数据导出被取消选择。


-- 导出  表 weichat.merchant 结构
DROP TABLE IF EXISTS `merchant`;
CREATE TABLE IF NOT EXISTS `merchant` (
  `id` varchar(50) NOT NULL COMMENT '用户名,text',
  `pword` varchar(45) DEFAULT NULL COMMENT '密码,password',
  `avator` varchar(1024) DEFAULT NULL COMMENT '商家头像,text,input-xxlarge',
  `name` varchar(50) DEFAULT NULL COMMENT '商家名称,text',
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
DROP TABLE IF EXISTS `message`;
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
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` varchar(50) NOT NULL COMMENT '编号,auto',
  `fromusername` varchar(50) NOT NULL COMMENT '所属公众号,auto',
  `name` varchar(100) NOT NULL COMMENT '标题,text',
  `info` varchar(255) DEFAULT NULL COMMENT '说明,textarea',
  `picurl` varchar(255) DEFAULT NULL COMMENT '图片链接,image',
  `content` text NOT NULL COMMENT '内容,ckeditor',
  `firedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发表时间,auto',
  `url` varchar(1024) NOT NULL DEFAULT 'http://weixin.cloudweb.pw' COMMENT '点击链接,textarea',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图文消息';

-- 数据导出被取消选择。


-- 导出  表 weichat.picture 结构
DROP TABLE IF EXISTS `picture`;
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


-- 导出  表 weichat.prerogative 结构
DROP TABLE IF EXISTS `prerogative`;
CREATE TABLE IF NOT EXISTS `prerogative` (
  `id` varchar(40) NOT NULL COMMENT '编号,hidden',
  `name` varchar(45) DEFAULT NULL COMMENT '名称,text',
  `content` varchar(1024) DEFAULT NULL COMMENT '内容,textarea',
  `cardcatalog_id` varchar(50) NOT NULL COMMENT '会员卡,auto',
  PRIMARY KEY (`id`,`cardcatalog_id`),
  KEY `fk_prerogative_cardcatalog1_idx` (`cardcatalog_id`),
  CONSTRAINT `fk_prerogative_cardcatalog1` FOREIGN KEY (`cardcatalog_id`) REFERENCES `cardcatalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员特权';

-- 数据导出被取消选择。


-- 导出  表 weichat.pubweixin 结构
DROP TABLE IF EXISTS `pubweixin`;
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
  `address` varchar(100) DEFAULT NULL COMMENT '店面地址,textarea',
  `phone` varchar(45) DEFAULT NULL COMMENT '联系电话,text',
  `info` varchar(255) DEFAULT NULL COMMENT '简介,textarea',
  PRIMARY KEY (`weixin_id`),
  KEY `fk_pubweixin_merchant1_idx` (`merchant_id`),
  CONSTRAINT `fk_pubweixin_merchant1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公众账号';

-- 数据导出被取消选择。


-- 导出  表 weichat.respmusicmessage 结构
DROP TABLE IF EXISTS `respmusicmessage`;
CREATE TABLE IF NOT EXISTS `respmusicmessage` (
  `id` varchar(50) NOT NULL COMMENT '编号',
  `keyword` varchar(255) NOT NULL COMMENT '关键字,text,input-xxlarge',
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
DROP TABLE IF EXISTS `respnewslist`;
CREATE TABLE IF NOT EXISTS `respnewslist` (
  `respnewsid` varchar(50) NOT NULL,
  `newsid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图文回复列表';

-- 数据导出被取消选择。


-- 导出  表 weichat.respnewsmessage 结构
DROP TABLE IF EXISTS `respnewsmessage`;
CREATE TABLE IF NOT EXISTS `respnewsmessage` (
  `id` varchar(50) NOT NULL COMMENT '编号,hidden',
  `msgType` varchar(20) DEFAULT 'news' COMMENT '消息类型,auto',
  `FromUserName` varchar(45) DEFAULT NULL COMMENT '发送者,auto',
  `keyword` varchar(255) NOT NULL COMMENT '关键字,textarea',
  `ArticleCount` int(11) NOT NULL DEFAULT '1' COMMENT '消息数,auto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图文消息回复';

-- 数据导出被取消选择。


-- 导出  表 weichat.resptextmessage 结构
DROP TABLE IF EXISTS `resptextmessage`;
CREATE TABLE IF NOT EXISTS `resptextmessage` (
  `id` varchar(50) NOT NULL COMMENT '编号,hidden',
  `msgType` varchar(20) DEFAULT 'text' COMMENT '消息类型,auto',
  `FromUserName` varchar(45) DEFAULT NULL COMMENT '发送者,auto',
  `Content` varchar(1000) DEFAULT NULL COMMENT '内容,textarea,input-xlarge',
  `keyword` varchar(255) NOT NULL COMMENT '关键字,textarea',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文本消息回复';

-- 数据导出被取消选择。


-- 导出  表 weichat.subscribemessage 结构
DROP TABLE IF EXISTS `subscribemessage`;
CREATE TABLE IF NOT EXISTS `subscribemessage` (
  `fromusername` varchar(50) NOT NULL COMMENT '公众账号,auto',
  `msgtype` varchar(50) NOT NULL DEFAULT 'text' COMMENT '消息类型,auto',
  `msgId` varchar(50) DEFAULT NULL COMMENT '消息编号,text',
  `content` varchar(1024) NOT NULL COMMENT '内容,textarea,input-xxlarge',
  PRIMARY KEY (`fromusername`),
  CONSTRAINT `fk_subcribe__pubpk` FOREIGN KEY (`fromusername`) REFERENCES `pubweixin` (`weixin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='关注时回复';

-- 数据导出被取消选择。


-- 导出  表 weichat.textmessage 结构
DROP TABLE IF EXISTS `textmessage`;
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
DROP TABLE IF EXISTS `userpicture`;
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
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
