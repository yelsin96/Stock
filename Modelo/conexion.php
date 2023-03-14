<?php

class conectar
{
	public $servername = 'localhost';
	public $database = "";
	public $username = "root";
	public $password = "";
	private $bd = "";

	public function __construct($bd)
	{
		$this->bd = $bd;
	}


	function conexion()
	{
		if ($this->bd == "Multired") {
			$this->database="bodega";
		}else if($this->bd == "Servired"){
			$this->database="bodega_jamundi";
		}
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
		return $conn;
	}

}
?>