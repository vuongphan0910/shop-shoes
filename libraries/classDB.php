<?php 
	require_once "config.php";
	class DB{
		protected $db;
		function __construct(){
			$this->db=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			$this->db->set_charset("utf8");
		}// __construct()
	}
?>