<?php
session_start();
ini_set('date.timezone','Asia/Shanghai');
if(!isset($_SESSION['username'])&&$_SESSION['username']==''){
	header('location:index.php');
	die;
}
?>