<?php
	include_once('./inc/db.php');
	$sql = "CREATE TABLE `user`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//主键',
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//密码',
  `pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'default.jpg' COMMENT '头像',
  `sex` enum('w','m') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'w' COMMENT '//性别',
  `tel` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '//手机号',
  `regtime` int(10) UNSIGNED NOT NULL COMMENT '//注册时间',
  `lastlogtime` int(10) UNSIGNED NULL DEFAULT NULL COMMENT '//最后登录时间',
  `regip` int(11) UNSIGNED NOT NULL COMMENT '//注册ip',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '//登录状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 49 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '//用户表' ROW_FORMAT = Dynamic;";
$D = new DB();

$e = $D->exequery($sql);

$sql = "insert into user(username,password,pic,sex,tel,regtime,lastlogtime,regip,status) values('admin','4297f44b13955235245b2497399d7a93','/images/pic1.jpg','m','123456678',1636526950,1636526950,2130706433,0)";
$res = $D->exequery($sql);

header('location:index.php');
?>