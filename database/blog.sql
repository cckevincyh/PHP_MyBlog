create database myblog;

use myblog;

create table tb_user(
	`uid` int(2) NOT NULL AUTO_INCREMENT,
	`username` varchar(20) BINARY NOT NULL,
	`pwd` varchar(20) NOT NULL,
	 PRIMARY KEY (`uid`)
);


create table tb_myInfo(
	`mid` int(2) NOT NULL AUTO_INCREMENT,
	`mname` varchar(20) NOT NULL,
	`head_img`  varchar(100) DEFAULT NULL,
	`page_view` int(11) DEFAULT 0,
	`blog_num` int(11) DEFAULT 0,
	`qq` varchar(20) DEFAULT NULL,
	`email` varchar(30) DEFAULT NULL,
	`wechat` varchar(100)DEFAULT NULL,
	PRIMARY KEY (`mid`)
);


create table tb_type(
	`tid` int(11)  AUTO_INCREMENT,
	`tname` varchar(30) NOT NULL ,
	PRIMARY KEY (`tid`)
);

create table tb_article(
	`aid` int(11)  AUTO_INCREMENT,
	`mid` int(2) NOT NULL,
	`page_view` int(11) DEFAULT 0,
	`img`  varchar(100) DEFAULT NULL,
	`like_num` int(11) DEFAULT 0,
	`tid` int(11) NOT NULL,
	`atitle` varchar(255) DEFAULT NULL,
	`acontent` LONGTEXT DEFAULT NULL,
	`atime` datetime DEFAULT NULL,
	PRIMARY KEY (`aid`),
	CONSTRAINT  FOREIGN KEY (`tid`) REFERENCES `tb_type` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT  FOREIGN KEY (`mid`) REFERENCES `tb_myInfo` (`mid`)
);


INSERT INTO tb_user(username,pwd) value('admin','admin');