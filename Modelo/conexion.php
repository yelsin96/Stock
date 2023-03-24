<?php

class conectar
{
	public $servername = '172.20.1.92';
	public $database = "";
	public $username = "cliente";
	public $password = "adminadmon";
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