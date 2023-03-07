<?php 
	class registro{
		public $conn;
		public $sede;

		public function __construct(){
			require_once '../Modelo/conexion.php';
			$this->sede = $_SESSION['sedeLogin'];
			$conectar=new conectar($this->sede);
			$this->conn=$conectar->conexion();
		}

		public function modificarRegistro($id,$fecha,$articulo,$ubicacion,$incidente,$usuario_entrega,$usuario_recibe, $incidenteV, $login){
			$sql = "UPDATE `movimientos` SET `articulo_id`='".$articulo."',`ubicacion_id`='".$ubicacion."',`incidente`='".$incidente."',`usuario_entrega_id`= '".$usuario_entrega."',`usuario_recibe_id`='".$usuario_recibe."' WHERE `id` = ".$id;

			$sql2 = "UPDATE `movimientos` SET `incidente`='".$incidente."' WHERE `id` = ".$id;
			
			if ($fecha == date(("Y-m-d"))) {
	          	$resultado = mysqli_query( $this->conn, $sql );
	          	if ($resultado==TRUE) {
			        $sqlHistorial = "INSERT INTO `historial`(`id`, `usuario`, `operacion`,`tabla`, `id_relacionado`, `fecha`)";
	            	$sqlHistorial.= "VALUES (NULL,'".$login."', 'modifico placa: ".$articulo." ubicacion: ".$ubicacion." incidente: ".$incidente." usuarioEntrega: ".$usuario_entrega." UsuarioRecibe: ".$usuario_recibe."','Movimientos','".$id."',NOW())";

	            	$resultadoHistorial = mysqli_query( $this->conn, $sqlHistorial );

			        echo "<div class='alert alert-success alert-dismissible'>";
					echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
					echo "  <strong>Excelente!</strong> Se Modifico Movimiento correctamente.";
					echo "</div>";

	          	}else{
	          		echo "<div class='alert alert-danger alert-dismissible'>";
					echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
					echo "  <strong>Error!</strong> ".mysqli_error($this->conn).$sql;
					echo "</div>";
	          	}
          	}else{
          		if ($incidente != $incidenteV) {
          			$resultado = mysqli_query( $this->conn, $sql2 );

          			$sqlHistorial = "INSERT INTO `historial`(`id`, `usuario`, `operacion`,`tabla`, `id_relacionado`, `fecha`)";
	            	$sqlHistorial.= "VALUES (NULL,'".$login."', 'modifico incidente: ".$incidente."','Movimientos','".$id."',NOW())";

	            	$resultadoHistorial = mysqli_query( $this->conn, $sqlHistorial );

          			echo "<div class='alert alert-success alert-dismissible'>";
					echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
					echo "  <strong>Excelente!</strong> Se Modifico INCIDENTE del Movimiento correctamente.";
					echo "</div>";
          		}else{
	          		echo "<div class='alert alert-danger alert-dismissible'>";
					echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
					echo "  <strong>Error! Solo se permite modificar movimientos del día actual.</strong> ";
					echo "</div>";
				}
          	}
		}

		public function consultarRegistro($id){
			$consultaRegistro = "SELECT * FROM `movimientos` where id ='".$id."'";
            $resultadoRegistro = mysqli_query( $this->conn, $consultaRegistro );
			return $resultadoRegistro;
		}

		public function consultarTipo(){
			$consultaTipo = "SELECT * FROM `tipo_articulo`";
            $resultadoTipo = mysqli_query( $this->conn, $consultaTipo );
			return $resultadoTipo;
		}

		public function consultarArticuloModal($tipo, $id, $descripcion){
			$consultaArticulo = "SELECT * FROM `articulo` WHERE  tipo_id =".$tipo." and descripcion like '%".$descripcion."%' and placa like '%".$id."%' ORDER BY `articulo`.`descripcion` ASC";
            $resultadoArticulo = mysqli_query( $this->conn, $consultaArticulo );
			return $resultadoArticulo;
		}
		
		public function consultarArticuloFiltro(){
			$consultaArticulo1 = "SELECT descripcion FROM `articulo` GROUP BY descripcion";
            $resultadoArticulo1 = mysqli_query( $this->conn, $consultaArticulo1 );
			return $resultadoArticulo1;
		}

		public function consultarUbicacion(){
			$consultaUbicacion = "SELECT * FROM `ubicacion` ORDER BY `ubicacion`.`descripcion` ASC";
            $resultadoUbicacion = mysqli_query( $this->conn, $consultaUbicacion );
			return $resultadoUbicacion;
		}
		public function consultarUsuario($empresa){
			require_once '../Modelo/conexionLogin.php';
			$conectarL=new conectarUsuarios();
			$connL=$conectarL->conexionUsuarios();

			$consultaUsuario= "SELECT * FROM `Personas` p ";
			$consultaUsuario.= "inner join  empresa e on p.id_empresa = e.id_empresa ";
			$consultaUsuario.= "where id_estado = 1 and nombre_empresa = '$empresa' ORDER BY `nombre_persona` ASC";
			
            $resultadoUsuario = mysqli_query( $connL, $consultaUsuario );
			return $resultadoUsuario;
		}

		public function insertarRegistro($articulo,$ubicacion,$incidente,$usuarioE,$usuarioR,$login){
			$consultaArticulo = "SELECT * FROM `articulo` WHERE placa ='".$articulo."'";
            $resultadoArticulo = mysqli_fetch_array(mysqli_query( $this->conn, $consultaArticulo ));
            
            if ($resultadoArticulo['ubicacion_id'] == $ubicacion) {
            	echo "<div class='alert alert-danger alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Error!</strong> Articulo ya se encuentra en la ubicacion solicitada";
				echo "</div>";
            }else{
				$sql = "INSERT INTO `movimientos`(`id`, `articulo_id`, `ubicacion_id`, `incidente`, `fecha`, `usuario_entrega_id`, `usuario_recibe_id`)";
	            $sql.= "VALUES (NULL,'".$articulo."', '".$ubicacion."','".$incidente."',NOW(),'".$usuarioE."','".$usuarioR."')";

	          	$resultado = mysqli_query( $this->conn, $sql );

	          	if ($resultado==TRUE) {
	          		$consultaUltimoId="SELECT id FROM `movimientos` order by id DESC LIMIT 1";
	            	$resultadoUltimoId=mysqli_fetch_array(mysqli_query( $this->conn, $consultaUltimoId ));

	          		$sqlHistorial = "INSERT INTO `historial`(`id`, `usuario`, `operacion`, `tabla`, `id_relacionado`, `fecha`)";
	            	$sqlHistorial.= "VALUES (NULL,'".$login."', 'ingreso placa: ".$articulo." ubicacion: ".$ubicacion." incidente: ".$incidente." usuarioEntrega: ".$usuarioE." UsuarioRecibe: ".$usuarioR."','Movimientos','".$resultadoUltimoId['id']."',NOW())";
	            	$resultadoHistorial = mysqli_query( $this->conn, $sqlHistorial );

			        echo "<div class='alert alert-success alert-dismissible'>";
					echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
					echo "  <strong>Excelente!</strong> Se ingreso Registro correctamente.";
					echo "</div>";

	          	}else{
			        echo "<div class='alert alert-danger alert-dismissible'>";
					echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
					echo "  <strong>Error!</strong> ".mysqli_error($this->conn);
					echo "</div>";
	          	}
	        }
		}

		public function modificarArticulo($articulo,$ubicacion){
			$sql = "UPDATE `articulo` SET `ubicacion_id`= '".$ubicacion."' where placa = '".$articulo."'";
          	$resultado = mysqli_query( $this->conn, $sql );
		}


/*--------------------------------------------------------------
* Función encargada de exportar a excel.
* Recibe como parametro un arreglo de datos.
*---------------------------------------------------------------*/

	    function exportProductDatabase() {

	    	$sql ="SELECT art.placa,art.descripcion,tip.descripcion tipo,ub.descripcion ubicacion,art.observacion FROM articulo as art LEFT JOIN ubicacion ub on art.ubicacion_id = ub.id inner JOIN tipo_articulo as tip on art.tipo_id = tip.id where art.placa LIKE '%%' order by art.descripcion asc";
	    	$Result = mysqli_query( $this->conn, $sql );

	    	$productResult = array();

			while( $rows = mysqli_fetch_assoc($Result) ) {
				$productResult[] = $rows;
			}

			$filename = "articulos.xls";

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