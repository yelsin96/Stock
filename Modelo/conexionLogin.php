<?php

	class conectar{
		public $servername = 'localhost';
		public $database = "bodega";
		public $username = "root";
		public $password = "";


		function conexion(){
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
	        return $conn;
	    }
     
	}
?>