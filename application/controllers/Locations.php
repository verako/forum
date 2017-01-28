<?php //главный контроллер по умолчаниею
class Locations extends CI_Controller{
	public function __construct(){
		parent::__construct();//подключаем родительский конструктор
		$this->load->model('locations_model');//подключаемся к моделе, DI
	}
	function index($id=1){
		$items=$this->locations_model->getPlaces($id);
		$data['items']=$items;
		$data['map']=$this->showMap();
		$this->load->view('main_page',$data);//передаем даные в main_page.php
	}
	function showMap(){
		$this->load->library('googlemaps');
		$config['center']='47.5512, 34.0811';
		$config['zoom']='auto';
		$this->googlemaps->initialize($config);
		$markers=array();
		$markers['position']='47.5512, 34.0811';
		$map=$this->googlemaps->create_map();
		return $map;
	}
	function showPlace($id){
		$items=$this->locations_model->getPlaces();
		$data['items']=$items;
		$item=$this->locations_model->getPlaceById($id);
		$data['item']=$item;
		$data['map']=$this->showPlaceMap($item[0]['lat'],$item[0]['lng']);
		$this->load->view('place_info',$data);
	}
	function showPlaceMap($lat,$lng){
		$this->load->library('googlemaps');
		$config['center']=$lat.', '.$lng;
		$config['zoom']='8';
		$this->googlemaps->initialize($config);

		$markers=array();
		$markers['position']=$lat.', '.$lng;
		$this->googlemaps->add_marker($markers);
		$map=$this->googlemaps->create_map();
		return $map;

	}
	function getMessages(){
		$items=$this->locations_model->get20Messages();
		$this->load->library('table');
		$this->table->set_heading('id','user','message','time');
		$style=array('table_open'=>'<table class="table table-striped">');
		$this->table->set_template($style);
		echo $this->table->generate($items);
	}
	function sendMessage($msg){
		$this->locations_model->sendMessage($msg);
	}
}