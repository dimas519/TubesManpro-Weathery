<?php  
class DB{
	private $source;
	private $userName;
	private $password;
	private $database;
	private $connection;

   
	function __construct($source="localhost",$userName="root",$password="",$database="tubesmanpro"){
		$this->souce=$source;
		$this->userName=$userName;
		$this->password=$password;
		$this->database=$database;
        $this->OpenConnect();
	}

	private function OpenConnect(){
		$this->connection= new mysqli($this->source,$this->userName,$this->password,$this->database);
	}

    private function closeConnect(){
		$this->connection->close();
	}

    function executeSelectQuery($query){
		$this->OpenConnect();
		$resQuery=$this->connection->query($query);

		$toarr=[];
		if($resQuery){
			while($row =$resQuery->fetch_assoc()){
				$toarr[]=$row;
			}
		}
		$this->closeConnect();
		return $toarr;
	}








}

?>