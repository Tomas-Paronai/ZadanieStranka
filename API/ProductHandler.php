<?php
	
include_once ('DataHandler.php');

class Product{
	
	private $id = '0';
	private $HandlerDB;
	
	private function __construct(){
		$this->HandlerDB = new DBHandler();	
	}
	
	public static function ExistingItem($id){
		$instance = new Product();
		$instance->id = $id;
		return $instance;
	}
	
	public static function FirstItem(){
		$instance = new Product();
		$instance->HandlerDB->query('SELECT * FROM `products`');
		$result = $instance->HandlerDB->resultSet();
		$instance->id = $result[0]['productid'];
		return $instance;
	}
	
	public function getData($param){
		if($this->id != NULL){
			$this->HandlerDB->query('SELECT * FROM products');
			$products = $this->HandlerDB->resultSet();
			for($i=0;$i<count($products);$i++){
				if($products[$i]['productid'] == $this->id){
					return $products[$i][$param];
				}
			}
		}
		
		return 'ERROR getDat('.$param.')';
	}
	
	public function getDataCount(){
		$this->HandlerDB->query('SELECT * FROM products');
		$result = $this->HandlerDB->resultSet();
		return count($result);
	}
	
	public function getProductsId(){
        	$this->HandlerDB->query("SELECT productid FROM products");
        	return $this->HandlerDB->resultSet();
        } 
}
	
?>