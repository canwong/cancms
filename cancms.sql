-- ----------------------------
-- think_auth_rule，规则表，
-- id:主键，name：规则唯一标识, title：规则中文名称 status 状态：为1正常，为0禁用，condition：规则表达式，为空表示存在就验证，不为空表示按照条件验证
-- ----------------------------
 DROP TABLE IF EXISTS `cw_auth_rule`;
CREATE TABLE `cw_auth_rule` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
    `pid` mediumint(8) NOT NULL DEFAULT '0' COMMENT '父级id',
    `module` varchar(10) NOT NULL DEFAULT 'admin' COMMENT '权限节点所属模块',
    `level` tinyint(1) NOT NULL COMMENT '1-项目 2-模块 3-操作',
    `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
    `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
    `type` tinyint(1) NOT NULL DEFAULT '1',
    `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
    `ismenu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否菜单：1是，0否',
    `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则附件条件',  # 规则附件条件,满足附加条件的规则,才认为是有效的规则
    `icon` varchar(50) DEFAULT NULL COMMENT '节点图标',
    `sorts` mediumint(8) DEFAULT '100' COMMENT '排序',
    `create_time` int(10) NOT NULL COMMENT '创建时间',
    `update_time` int(10) NOT NULL COMMENT '更新时间',
    PRIMARY KEY (`id`),
    KEY `pid` (`pid`) USING BTREE,
    KEY `module` (`module`) USING BTREE,
    KEY `level` (`level`) USING BTREE,
    UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `cw_auth_rule` (`id`, `pid`, `module`, `level`, `name`, `title`, `type`, `status`, `condition`, `icon`, `sorts`, `create_time`, `update_time`, `ismenu`) VALUES
(1, 0, 'admin', 1, 'Index', '后台首页', 1, 1, '', 'fa fa-home', 1, 1504271096, 1504907241, 1),
(2, 1, 'admin', 2, 'Index/index', '控制面板', 1, 1, '', 'fa fa-dashboard', 50, 1504271231, 1504906659, 1),
(3, 0, 'admin', 1, 'Auth', '节点管理', 1, 1, '', 'fa fa-sitemap', 50, 1504271265, 1504906213, 1),
(4, 3, 'admin', 2, 'AuthRule/index', '节点列表', 1, 1, '', '', 50, 1504271426, 1504271426, 1),
(5, 0, 'admin', 1, 'User', '用户管理', 1, 1, '', 'fa fa-users', 50, 1504271456, 1504271456, 1),
(6, 5, 'admin', 2, 'User/index', '用户列表', 1, 1, '', 'fa fa-user', 50, 1504271488, 1504719359, 1),
(7, 5, 'admin', 2, 'AuthGroup/index', '角色管理', 1, 1, '', '', 50, 1504719343, 1504719960, 1),
(9, 4, 'admin', 3, 'AuthRule/create', '新增节点', 1, 1, '', '', 50, 1504725763, 1504725763, 0),
(10, 4, 'admin', 3, 'AuthRule/edit', '编辑节点', 1, 1, '', '', 50, 1504725875, 1504725875, 0),
(11, 4, 'admin', 3, 'AuthRule/delete', '删除节点', 1, 1, '', '', 50, 1504725905, 1504725905, 0),
(12, 7, 'admin', 3, 'AuthGroup/create', '新增角色', 1, 1, '', '', 50, 1504725939, 1504725939, 0),
(13, 7, 'admin', 3, 'AuthGroup/edit', '修改角色', 1, 1, '', '', 50, 1504725960, 1504725960, 0),
(14, 7, 'admin', 3, 'AuthGroup/delete', '删除角色', 1, 1, '', '', 50, 1504725983, 1504725983, 0),
(15, 6, 'admin', 3, 'User/create', '新增用户', 1, 1, '', '', 50, 1504726004, 1504726004, 0),
(16, 6, 'admin', 3, 'User/edit', '修改用户', 1, 1, '', '', 50, 1504726020, 1504726020, 0),
(17, 6, 'admin', 3, 'User/delete', '删除用户', 1, 1, '', '', 50, 1504726035, 1504726035, 0),
(19, 6, 'admin', 3, 'Upload/avatar', '上传头像', 1, 1, '', '', 50, 1504905738, 1504906837, 0),
(20, 7, 'admin', 3, 'AuthGroup/member', '成员管理', 1, 1, '', '', 50, 1504906180, 1504906180, 0),
(21, 6, 'admin', 3, 'Upload/infopic', '签名图片', 1, 1, '', '', 50, 1504906894, 1504906894, 0),
(22, 0, 'admin', 1, 'Article', '文章管理', 1, 1, '', 'fa fa-book', 50, 1505084829, 1505084829, 1),
(23, 22, 'admin', 2, 'Category/index', '文章分类', 1, 1, '', '', 50, 1505084888, 1505091924, 1),
(24, 22, 'admin', 2, 'Article/index', '文章列表', 1, 1, '', '', 50, 1505084921, 1505104981, 1),
(25, 23, 'admin', 3, 'Category/create', '新增分类', 1, 1, '', '', 50, 1505085086, 1505102164, 0),
(26, 23, 'admin', 3, 'Category/edit', '编辑分类', 1, 1, '', '', 50, 1505091968, 1505091968, 0),
(27, 23, 'admin', 3, 'Category/delete', '删除分类', 1, 1, '', '', 50, 1505102128, 1505102128, 0),
(28, 23, 'admin', 3, 'Upload/thumbnail', '缩略图上传', 1, 1, '', '', 50, 1505103122, 1505103679, 0),
(29, 24, 'admin', 3, 'Article/create', '新增文章', 1, 1, '', '', 50, 1505113498, 1505113498, 0),
(30, 24, 'admin', 3, 'Article/edit', '编辑文章', 1, 1, '', '', 50, 1505113534, 1505113534, 0),
(31, 24, 'admin', 3, 'Article/delete', '删除文章', 1, 1, '', '', 50, 1505113565, 1505113565, 0);

-- ----------------------------
-- think_auth_group 用户组表，
-- id：主键， title:用户组中文名称， rules：用户组拥有的规则id， 多个规则","隔开，status 状态：为1正常，为0禁用
-- ----------------------------
 DROP TABLE IF EXISTS `cw_auth_group`;
CREATE TABLE `cw_auth_group` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `title` char(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称，',
    `status` tinyint(1) NOT NULL DEFAULT '1',
    `rules` char(200) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id， 多个规则',
    `create_time` int(10) NOT NULL COMMENT '创建时间',
    `update_time` int(10) NOT NULL COMMENT '更新时间',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `cw_auth_group` (`id`, `title`, `status`, `rules`, `create_time`, `update_time`) VALUES
(1, '超级管理', 1, '1,2,3,4,9,10,11,5,6,16,21,19,17,15,7,14,20,13,12,22,23,25,26,27,28,24,29,30,31', 1504724381, 1505113577),
(2, '观察者', 1, '1,2,3,4,5,7,6', 1504913261, 1504913261);

-- ----------------------------
-- think_auth_group_access 用户组明细表
-- uid:用户id，group_id：用户组id
-- ----------------------------
DROP TABLE IF EXISTS `cw_auth_group_access`;
CREATE TABLE `cw_auth_group_access` (
    `uid` mediumint(8) unsigned NOT NULL,
    `group_id` mediumint(8) unsigned NOT NULL,
    `create_time` int(10) NOT NULL COMMENT '创建时间',
    `update_time` int(10) NOT NULL COMMENT '更新时间',
    UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
    KEY `uid` (`uid`),
    KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cw_auth_group_access` (`uid`, `group_id`, `create_time`, `update_time`) VALUES
(1, 1, 1504914210, 1504914210),
(4, 2, 1504915112, 1504915112);

-- ----------------------------
-- Table structure for cw_user
-- ----------------------------
DROP TABLE IF EXISTS `cw_user`;
CREATE TABLE `cw_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `name` varchar(100) DEFAULT NULL COMMENT '姓名',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(50) DEFAULT NULL COMMENT '手机号码',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别',
  `logins` int(11) NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `reg_ip` varchar(200) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_time` int(10) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_ip` varchar(200) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `cw_user` (`id`, `username`, `password`, `name`, `email`, `mobile`, `sex`, `logins`, `reg_ip`, `last_time`, `last_ip`, `status`, `create_time`, `update_time`) VALUES
(1, 'canwong', '5a88ea3e4e77824189b59c0ae7cf1e81', 'canwong', '493468513@qq.com', '123456', 1, 34, '127.0.0.1', 1509309908, '127.0.0.1', 1, 1504569583, 1504640111);

-- ----------------------------
-- Table structure for cw_user_info
-- ----------------------------
DROP TABLE IF EXISTS `cw_user_info`;
CREATE TABLE `cw_user_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `avatar` varchar(200) DEFAULT NULL COMMENT '头像',
  `qq` varchar(100) DEFAULT NULL COMMENT 'QQ',
  `wechat` varchar(100) DEFAULT NULL COMMENT '微信',
  `birthday` varchar(100) DEFAULT NULL COMMENT '生日',
  `info` text COMMENT '用户信息',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `cw_user_info` (`id`, `uid`, `avatar`, `qq`, `wechat`, `birthday`, `info`, `create_time`, `update_time`) VALUES
(1, 1, 'fd1c9718ada13fb4423677f7ef5f36f9_1.jpeg', '123456', '321654', '2017.09.25', '<img src="/uploads/info/20170906/1442dcdb88aecce75ec94e6a451e079b.jpg">', 1504569583, 1504649946);

-- ----------------------------
-- Table structure for cw_login_log
-- ----------------------------
DROP TABLE IF EXISTS `cw_login_log`;
CREATE TABLE `cw_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uid` int(11) NOT NULL COMMENT '登陆用户ID',
  `ip` varchar(100) NOT NULL COMMENT 'IP地址',
  `country` varchar(100) DEFAULT NULL COMMENT '国家',
  `province` varchar(100) DEFAULT NULL COMMENT '省',
  `city` varchar(100) DEFAULT NULL COMMENT '城市',
  `district` varchar(100) DEFAULT NULL COMMENT '区',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cw_article
-- ----------------------------
DROP TABLE IF EXISTS `cw_article`;
CREATE TABLE `cw_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `type_id` int(11) NOT NULL COMMENT '所属分类',
  `uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `title` varchar(200) DEFAULT NULL COMMENT '标题',
  `title_color` varchar(50) DEFAULT NULL COMMENT '标题颜色',
  `title_weight` smallint(1) DEFAULT '0' COMMENT '标题加粗',
  `thumbnail` varchar(200) DEFAULT NULL COMMENT '缩略图',
  `keywords` varchar(200) DEFAULT NULL COMMENT '关键字',
  `description` text COMMENT '描述',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '点击数',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cw_category
-- ----------------------------
DROP TABLE IF EXISTS `cw_category`;
CREATE TABLE `cw_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pid` int(11) NOT NULL COMMENT '上级ID',
  `title` varchar(100) NOT NULL COMMENT '分类名称',
  `thumbnail` varchar(200) DEFAULT NULL COMMENT '缩略图',
  `sorts` int(11) NOT NULL COMMENT '排序',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `keywords` text COMMENT '关键字',
  `description` text COMMENT '描述',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;