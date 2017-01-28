<?php 
class Createdb_model extends CI_Model{
	public function __construct(){
		$this->load->database();//подключение к бд
	}
	function createTable($query){
		$this->db->query($query);
	}
}