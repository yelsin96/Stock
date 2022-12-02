<?php 
	class usuarios{
		public $conn;

		public function __construct(){
			require_once '../Modelo/conexion.php';
			$conectar=new conectar();
			$this->conn=$conectar->conexion();
		}

		public function consultarCargo(){
			$consultaCargo = "SELECT * FROM cargo";
            $resultadoCargo = mysqli_query( $this->conn, $consultaCargo );
			return $resultadoCargo;
		}

		public function insertarUsuario($cedula,$nombre,$apellidos,$cargo,$login){
			$sql = "INSERT INTO `usuarios`( `cedula`, `nombre`, `apellidos`,`cargo_id`, `estado_id`)";
            $sql.= "VALUES ('".$cedula."', '".$nombre."','".$apellidos."','".$cargo."', 1)";
          	$resultado = mysqli_query( $this->conn, $sql );
          	if ($resultado==TRUE) {
          		$sqlHistorial = "INSERT INTO `historial`(`id`, `usuario`, `operacion`,`tabla`, `id_relacionado`, `fecha`)";
	            $sqlHistorial.= "VALUES (NULL,'".$login."', 'ingreso cedula: ".$cedula." nombre: ".$nombre." apellidos: ".$apellidos." cargo: ".$cargo."  Estado: Activo','Usuarios','".$cedula."',NOW())";

            	$resultadoHistorial = mysqli_query( $this->conn, $sqlHistorial );

		        echo "<div class='alert alert-success alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Excelente!</strong> Se ingreso usuario correctamente.";
				echo "</div>";

          	}else{
		        echo "<div class='alert alert-danger alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Error!</strong> ".mysqli_error($this->conn);
				echo "</div>";
          	}
		}
	}
 ?>