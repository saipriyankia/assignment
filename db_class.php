<?php 
class db_class{
	public $host = 'localhost';
	public $user = 'root';
	public $password = '';
	public $database = 'assign_task';
	public $connection='';
	public $error_msg='';
	public function get_access(){
		$this->connection = new mysqli($this->host,$this->user,$this->password,$this->database);
		if(!$this->connection){
			$this->error_msg = 'Unable to connect to the database.';
			return false;
		}
	}
		
}

?>