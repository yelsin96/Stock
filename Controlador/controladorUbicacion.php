<?php 
	class ubicacion{
		public $conn;

		public function __construct(){
			require_once '../Modelo/conexion.php';
			$conectar=new conectar();
			$this->conn=$conectar->conexion();
		}

		public function insertarUbicacion($descripcion){
			$sql = "INSERT INTO `ubicacion`( `id`, `descripcion`)";
            $sql.= "VALUES (null, '".$descripcion."')";
          	$resultado = mysqli_query( $this->conn, $sql );
          	if ($resultado==TRUE) {
		        echo "<div class='alert alert-success alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Excelente!</strong> Se ingreso Ubicacion correctamente.";
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