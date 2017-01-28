<?php 
class Locations_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();//подключение к бд
	}
	function getCat(){
		$res=$this->db->get('categories');
		$cats=$res->result_array();
		return $cats;
	}
	function getPlaces($id=1){
		$this->db->where('catid',$id);
		$res=$this->db->get('places');
		$places=$res->result_array();
		return $places;
	}
	function getPlaceById($id){
		$this->db->where('id',$id);
		$res=$this->db->get('places');
		$place=$res->result_array();
		return $place;
	}
	function get20Messages(){
		$limit=20;
		$offset=0;
		$this->db->order_by('stamp','DESC');
		$res=$this->db->get('Messages',$limit,$offset);
		$items=$res->result_array();
		return $items;
	}
	function sendMessage($msg){
		$data=array(
			'userid'=>1,
			'comment'=>rawurldecode($msg)
			// 'stamp'=>time()
		);
		$this->db->insert('Messages',$data);
	}
}