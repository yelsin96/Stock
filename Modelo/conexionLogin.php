<?php

	class conectar{
		public $servername = '172.20.1.92';
		public $database = "bodega";
		public $username = "bodega";
		public $password = "a3c2b3bf7d";


		function conexion(){
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
	        return $conn;
	    }
     
	}
?>