<?php

include_once ('DataHandler.php');

class Category{
	
	private $HandlerDB;
	
	private function __construct($id=null){
		$this->HandlerDB = new DBHandler();
	}
	
	public static function CatArray(){
		$instance = new Category();
		$instance->HandlerDB->query('SELECT * FROM categories');
		$array = $instance->HandlerDB->resultSet();
		
		return $array;
	}
}

?>