<?php

include_once './db.php';

$D = new DB();

$sql = "select * from user";

$res = $D->exequery($sql);
var_dump($res);
?>
