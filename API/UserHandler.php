<?php

include_once ('DataHandler.php');

class User{
	
	private $id;
	private $HandlerDB;
	private $nick = "";
	private $name = "";
	private $surname = "";
	private $email = "";
	private $password = "";
	private $success = false;
	
	private function __construct($id=null){
		$this->id = $id;
		$this->HandlerDB = new DBHandler();
	}
	
	public static function Login($nick, $password){
		$instance = new User();
		$instance->nick = $nick;
		$instance->password = $password;
		
		return $instance->loginAlg();
	}
	
	public static function Exist($id){
		$instance = new User($id);
		return $instance;
	}
	
	public static function NewUser($name, $surname, $email, $password, $nickname){
		$instance = new User();		
		$query = 'INSERT INTO users (`name`) VALUES (:input)';
		$instance->HandlerDB->query($query);
		$instance->HandlerDB->bind(':input', $name);
					
		try{
			$instance->HandlerDB->execute();
			$instance->success = true;
			$instance->id = $instance->getValidId();
		}catch(PDOException $e){
			echo $e;
		}
		
		if($instance->id != null && $instance->id != 0){
			$instance->saveData('surname', $surname);
			$instance->saveData('email', $email);
			$instance->saveData('password', $password);
			$instance->saveData('nickname', $nickname);
		}
		
		return $instance;
	}
		
	public function saveData($parameter, $value){
		//echo '<br/>',$parameter,$value,$id,'<br/>';
		$this->HandlerDB->query("UPDATE users SET `".$parameter."`=:input WHERE `userid`=(:userid)");
		$this->HandlerDB->bind(":input",$value);
		$this->HandlerDB->bind(":userid",$this->id);
		try{
			$this->HandlerDB->execute();
		}catch(PDOException $e){
			echo $e;
		}
		$this->success = true;
	}
	
	public function isSaved(){
		return $this->success;
	}
	
	private function loginAlg(){
		$query = 'SELECT * FROM users';
		$this->HandlerDB->query($query);
		$users = $this->HandlerDB->resultSet();
		for($i=0;$i<count($users);$i++){
			if($this->nick == $users[$i]['nickname'] && $this->password == $users[$i]['password']){
				return intval($users[$i]['userid']);
			}
		}
		return null;
	}
	
	public function getData($param){
		if($this->id != null){
			$query = 'SELECT '.$param.' FROM users WHERE userid=:userid';
			$this->HandlerDB->query($query);
			$this->HandlerDB->bind(':userid', $this->id);
			$data = $this->HandlerDB->resultSet();
			return $data[0][$param];
		}
		return 'No Data Found';
	}
	
	public function getValidId(){
		$this->HandlerDB->query('SELECT * FROM users');
	
		$users = array();
		$users = $this->HandlerDB->resultSet();
		$count = count($users);
	
		return $users[$count-1]['userid'];
	}
}