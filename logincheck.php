<?php
include_once('./inc/db.php');


session_start();
$Db = new DB();
$sql = "select * from user where username='{$_POST['username']}'";
$result = $Db->exequery($sql);
if($data = mysqli_fetch_assoc($result)){
 	if(md5($_POST['password']) != $data['password']) {
   		exit('用户名密码错误');die;
    }
    $_SESSION['userpic'] = $data['pic'];
	$_SESSION['username'] = $data['username'];
	
	$info['lastlogtime'] = time();
	$info['status'] = 1;
	$sql = "update user set status ='{$info['status']}',lastlogtime ='{$info['lastlogtime']}' where username='{$_POST['username']}'";
	$Db->exequery($sql);
	header('location:home.php');
} else {
	exit('用户名密码错误');die;
}
?>