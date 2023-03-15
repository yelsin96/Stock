<?php 
	class licencia{
		public $conn;

		public function __construct(){
			require_once '../Modelo/conexion.php';
			$conectar=new conectar($_SESSION['sedeStock']);
			$this->conn=$conectar->conexion();
		}


		public function insertarlicencia($id_licencia,$descripcion,$key,$tipo_licencia,$email_relacionado,$password_email,$login){
			$sql = "INSERT INTO `licencias`(`id_licencia`, `descripcion`, `key`, `tipo_licencia`, `email_relacionado`, `password_email`) ";
            $sql.= "VALUES ('".$id_licencia."', '".$descripcion."','".$key."','".$tipo_licencia."','".$email_relacionado."','".$password_email."')";
          	$resultado = mysqli_query( $this->conn, $sql );
          	if ($resultado==TRUE) {
          		$sqlHistorial = "INSERT INTO `historial`(`id`, `usuario`, `operacion`,`tabla`, `id_relacionado`, `fecha`)";
	            $sqlHistorial.= "VALUES (NULL,'".$login."', 'ingreso licencia: ".$id_licencia." descripcion: ".$descripcion." key: **** tipoLicencia: ".$tipo_licencia." email: ".$email_relacionado." password: *** ','licencias','".$id_licencia."',NOW())";
            	$resultadoHistorial = mysqli_query( $this->conn, $sqlHistorial );

		        echo "<div class='alert alert-success alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Excelente!</strong> Se ingreso Licencia correctamente.";
				echo "</div>";

          	}else{
		        echo "<div class='alert alert-danger alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Error!</strong> ".mysqli_error($this->conn);
				echo "</div>";
          	}
		}


		public function consultarLicencia($licenciaM){
			$consultalicencia = "SELECT * FROM `licencias` WHERE  id_licencia ='".$licenciaM."'";
            $resultadolicencia = mysqli_query( $this->conn, $consultalicencia );
			return $resultadolicencia;
		}

		public function consultarArticuloModal($id, $descripcion){
			$consultaArticulo = "SELECT * FROM `articulo` a ";
			$consultaArticulo.= "inner join  `datos` d on a.id_datos = d.id ";
			$consultaArticulo.= "WHERE  d.nombre_equipo like '%".$descripcion."%' and a.placa like '%".$id."%' ORDER BY a.`placa` ASC";
            $resultadoArticulo = mysqli_query( $this->conn, $consultaArticulo );
			return $resultadoArticulo;
		}

		public function consultarLicenciaoModal($id, $descripcion){
			$consultaLicencia = "SELECT * FROM `licencias` l ";
			$consultaLicencia.= "WHERE  l.descripcion like '%".$descripcion."%' and l.id_licencia like '%".$id."%' ORDER BY l.`descripcion` ASC";
            $resultadoLicencia = mysqli_query( $this->conn, $consultaLicencia );
			return $resultadoLicencia;
		}


		public function insertarRegistrolicencia($licencia, $placa ,$login){
			$consultalicencia = "SELECT * FROM `relacion_licencias`  r ";
			$consultalicencia.= "inner join `licencias` l on r.id_licencia = l.id_licencia ";
			$consultalicencia.=  "WHERE l.`id_licencia` = '".$licencia."' and l.tipo_licencia <> 'EMPRESARIAL'";
            $resultadolicencia = mysqli_fetch_array(mysqli_query( $this->conn, $consultalicencia ));
            
            if ( !empty($resultadolicencia)) {
            	echo "<div class='alert alert-danger alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Error!</strong> licencia ya fue utilizada!!!";
				echo "</div>";
            }else{
				$sql = "INSERT INTO `relacion_licencias`(`placa_articulo`, `id_licencia`) ";
	            $sql.= "VALUES ('".$placa."', '".$licencia."')";

	          	$resultado = mysqli_query( $this->conn, $sql );

	          	if ($resultado==TRUE) {
	          		$sqlHistorial = "INSERT INTO `historial`(`id`, `usuario`, `operacion`, `tabla`, `id_relacionado`, `fecha`)";
	            	$sqlHistorial.= "VALUES (NULL,'".$login."', 'ingreso Relacion-licencia: Articulo: ".$placa." Licencia: ".$licencia." ,'relacion_licencias','".$placa."-".$licencia."',NOW())";
	            	$resultadoHistorial = mysqli_query( $this->conn, $sqlHistorial );

			        echo "<div class='alert alert-success alert-dismissible'>";
					echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
					echo "  <strong>Excelente!</strong> Se ingreso Relacion licencia correctamente.";
					echo "</div>";

	          	}else{
			        echo "<div class='alert alert-danger alert-dismissible'>";
					echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
					echo "  <strong>Error!</strong> ".mysqli_error($this->conn);
					echo "</div>";
	          	}
	        }
		}

		public function modificarLicencia($id_licencia,$descripcion,$key,$tipo_licencia,$email_relacionado,$password_email,$login){
            $sql = "UPDATE `licencias` SET `descripcion`='".$descripcion."',`key`='".$key."',`tipo_licencia`='".$tipo_licencia."',`email_relacionado`= '".$email_relacionado."',`password_email`= '".$password_email."' WHERE `id_licencia` = '".$id_licencia."'";

          	$resultado = mysqli_query( $this->conn, $sql );
          	if ($resultado==TRUE) {
          		$sqlHistorial = "INSERT INTO `historial`(`id`, `usuario`, `operacion`,`tabla`, `id_relacionado`, `fecha`)";
	            $sqlHistorial.= "VALUES (NULL,'".$login."', 'modifico licencia: ".$id_licencia." descripcion: ".$descripcion." key: **** tipoLicencia: ".$tipo_licencia." email: ".$email_relacionado." password: *** ','Licencias','".$id_licencia."',NOW())";

            	$resultadoHistorial = mysqli_query( $this->conn, $sqlHistorial );

		        echo "<div class='alert alert-success alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Excelente!</strong> Se Modifico Licencia correctamente.";
				echo "</div>";

          	}else{
		        echo "<div class='alert alert-danger alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Error!</strong> ".mysqli_error($this->conn).$sql;
				echo "</div>";
          	}
		}

		/*--------------------------------------------------------------
* Función encargada de exportar a excel.
* Recibe como parametro un arreglo de datos.
*---------------------------------------------------------------*/

	    function exportProductDatabase() {

	    	$sql ="SELECT sim.Numero_linea,CONCAT('S-',serie) serie,sim.Usuario,sim.Clave,sim.Apn,sim.Plan,ope.descripcion OperadorD, ub.descripcion Ubicacion,sim.Observacion FROM licencia as sim LEFT JOIN ubicacion ub on sim.Ubicacion_id = ub.id inner JOIN operador as ope on sim.operador = ope.id where sim.Numero_linea LIKE '%%' order by sim.operador asc";
	    	$Result = mysqli_query( $this->conn, $sql );

	    	$productResult = array();

			while( $rows = mysqli_fetch_assoc($Result) ) {
				$productResult[] = $rows;
			}

			$filename = "licencia.xls";

			header("Content-Type: application/vnd.ms-excel");

			header("Content-Disposition: attachment; filename=".$filename);

			$mostrar_columnas = false;

			foreach($productResult as $libro) {

				if(!$mostrar_columnas) {

					echo implode("\t", array_keys($libro)) . "\n";

					$mostrar_columnas = true;

				}

				echo implode("\t", array_values($libro)) . "\n";

			}
	    } 
	}
 ?>