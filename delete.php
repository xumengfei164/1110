<?php
include_once('./inc/auth.php');
include_once('./inc/db.php');



$Db = new DB();
$sql = "select * from user where id='{$_GET['id']}' and username != '{$_SESSION['username']}'";
$result = $Db->exequery($sql);
if($data = mysqli_fetch_assoc($result)){
 	$query = "delete from user where id = {$_GET['id']}";
 	$result = $Db->exequery($query);
	header('location:'.$_SERVER["HTTP_REFERER"]);
} else {
	echo '<script>alert("删除失败")</script>';
	header('location:'.$_SERVER["HTTP_REFERER"]);
}
?>