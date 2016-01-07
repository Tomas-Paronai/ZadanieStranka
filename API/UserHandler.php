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
}