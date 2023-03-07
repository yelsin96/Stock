<?php 
	class login{
		public $conn;

		public function __construct(){
			require_once '../Modelo/conexionLogin.php';
			$conectar=new conectarUsuarios();
			$this->conn=$conectar->conexionUsuarios();
		}

		public function consultarLogin($username, $password){
			$consultaLogin= "SELECT * FROM Personas p ";
			$consultaLogin.= "inner join empresa e on p.id_empresa=e.id_empresa ";
			$consultaLogin.= "WHERE username='".$username."' and password='".$password."' and id_estado=1 ";
            $resultadoLogin = mysqli_query( $this->conn, $consultaLogin );
			$resultadoLogin = $resultadoLogin->fetch_assoc();
			return $resultadoLogin;
		}

		
	}
 ?>