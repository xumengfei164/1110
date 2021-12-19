<?php

Class DB{
	private $db	      = 'bbs';
	private $user 	  = 'root';
	private $password = '2341root';
	private $host     = 'localhost';
	public  $conn;

	public function __construct() {
		$this->conn();
		$this->select_db();
		$this->set_charset();
	}

	public function conn() {
		if(!$this->conn=@mysqli_connect($this->host,$this->user,$this->password)) {
			exit('数据库连接失败');
		}
	}

	public function select_db() {
		if(!mysqli_select_db($this->conn,$this->db)) {
			exit('找不到指定的数据库');
		}
	}


	public function set_charset() {
		if(!mysqli_set_charset($this->conn,'utf8')) {
			exit('字符集错误');
		}
	}

	public function exequery($sql) {
		$result = mysqli_query($this->conn,$sql);
		return $result;
	}

	

}
?>