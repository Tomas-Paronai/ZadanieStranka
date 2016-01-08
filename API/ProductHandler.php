<?php
	
include_once ('DataHandler.php');

class Product{
	
	private $id = '0';
	private $HandlerDB;
	private $product_title;
	private $product_name;
	private $product_disc;
	private $product_price;
	private $product_cat;
	private $uploadSuccess = false;
	
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
	
	public static function UploadProduct($name, $cat, $disc, $price, $tmp_name){
		$instance = new Product();
		
		$instance->HandlerDB->query('INSERT INTO products (`name` ,`categoryid` ,`discription` ,`price`) VALUES (:name, :cat, :disc, :price)');
		$instance->HandlerDB->bind(':name', $name);
		$instance->HandlerDB->bind(':cat', $cat);
		$instance->HandlerDB->bind(':disc', $disc);
		$instance->HandlerDB->bind(':price', $price);
			
		try{
			$instance->HandlerDB->execute();			
		}catch(PDOException $e){
			echo $e;
		}
		
		//title is folder name!!
		if($instance->upload($tmp_name, $instance->getValidId(), '1.jpg')){
			$instance->uploadSuccess = true;
		}
		
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
    
    public function getValidId(){
    	$ids = $this->getProductsId();
    	return $ids[count($ids)-1]['productid'];
    }
    
    public function getId(){
    	return $this->id;
    }
    
    private function upload($tmp_name, $title, $name){
    	if(!file_exists('../lib/products/img/'.$title)){
    		mkdir('../lib/products/img/'.$title);
    	}    	
    	$destination = '../lib/products/img/' . $title . '/';
    	return move_uploaded_file($tmp_name, $destination.$name);
    }
    
    public function isUploaded(){
    	return $this->uploadSuccess;
    }
}
	
?>