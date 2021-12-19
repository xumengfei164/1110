<?php
include_once('./inc/db.php');
include_once('./inc/auth.php');

$Db = new DB();
$file = $_FILES['pic'];
$root = dirname(__FILE__);
if($file["name"]!=''){
	$filename = "/images/".date('YmdHis').$file["name"];
	move_uploaded_file($file["tmp_name"],$root.$filename);
} else {
	$filename = '';
}

if($_SERVER['REMOTE_ADDR'] == '::1') {
	$regip = ip2long('127.0.0.1');
} else {
	$regip = ip2long($_SERVER['REMOTE_ADDR']);
}
$time = time();
$password = md5($_POST['password']);

//重复
$check_sql = "select 1 from user where username='{$_POST['username']}'";

$check_result = $Db->exequery($check_sql);
if($data = mysqli_fetch_assoc($check_result)) {
	if($data!=null)
	$_POST['username'] .=uniqid();
}

$sql = "insert into user(username,password,pic,sex,tel,regtime,regip,status) values('{$_POST['username']}','{$password}','{$filename}','{$_POST['sex']}','{$_POST['tel']}',{$time},{$regip},0)";
$result = $Db->exequery($sql);


if($result) {
	header('location:show.php');
} else {
	exit('注册失败');die;
}
?>