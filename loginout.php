<?php
include_once('./inc/db.php');
include_once('./inc/auth.php');


$Db = new DB();
$sql = "update user set status ='0' where username='{$_SESSION['username']}'";
$Db->exequery($sql);
unset($_SESSION['username']);
unset($_SESSION['userpic']);
header('location:index.php');

?>
