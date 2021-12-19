<?php
include_once('./inc/auth.php');
include_once('./inc/db.php');


$Db = new DB();
$file = $_FILES['pic'];

$root = dirname(__FILE__);
if($file["name"]!=''){
	$filename = "/images/".date('YmdHis').$file["name"];
	move_uploaded_file($file["tmp_name"],$root.$filename);
} else {
	$filename = '';
}

$query = "select tel,sex,pic from user where id={$_POST['id']} ";
$result = $Db->exequery($query);
if($data = mysqli_fetch_assoc($result)) {
	if($_POST['tel'] != $data['tel']) {
		$data['tel'] = $_POST['tel'];
	}
	if($_POST['sex'] != $data['sex']) {
		$data['sex'] = $_POST['sex'];
	}
	if($filename == '') {
		$filename = $data['pic'];
	}
}

$sql = "update user set sex='{$data['sex']}',tel='{$data['tel']}',pic='{$filename}' where id={$_POST['id']} limit 1";

$result = $Db->exequery($sql);

if($result) {
	header('location:show.php');
} else {
	exit('修改失败');die;
}
?>