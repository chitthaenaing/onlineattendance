<?php  
class Database{
	protected $conn;
	protected $stmt;
	protected $servername="localhost";
	protected $username="root";
	protected $password = "";
	protected $dbname="onlineattendancedatabase";

	public function __construct(){

		//connect to the database 

		try{

			// Database Configuration 

	 	 	$this->conn=new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);

		}catch(PDOException $e){

	  		$e->getMessage();

	  		echo 'Could not connect to the Database';
		}
	}

	public function insert($query,$binding){
		try{
			$this->stmt = $this->conn->prepare($query);
			return $this->stmt->execute($binding);
		}catch(PDOException $e){
			$e->getMessage();
		}		
	}

	public function get($table,$limit = 10){
		return 'got the rows';
	}

	public function where($key,$value){
		return 'Return where key equals the value';
	}

}


?>