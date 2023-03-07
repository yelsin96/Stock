<?php 
	class datos{
		public $conn;

		public function __construct(){
			require_once '../Modelo/conexion.php';
			$conectar=new conectar($_SESSION['sedeLogin']);
			$this->conn=$conectar->conexion();
		}

		public function consultarDatos($idM){
			$consultarDatos = "SELECT * FROM `datos` WHERE id = '$idM'";
            $resultadoDatos = mysqli_query( $this->conn, $consultarDatos );
			return $resultadoDatos;
		}

		public function consultarCountSistemaOperativo(){
			$consultarDatos = "SELECT d.`SISTEMAOPERATIVO`, count(d.`SISTEMAOPERATIVO`) CANTIDAD ";
			$consultarDatos.= "FROM `datos` d ";
			$consultarDatos.= "INNER join articulo a on a.id_datos =d.id ";
			$consultarDatos.= "where a.ubicacion_id <> 1 or a.ubicacion_id <> 1 ";
			$consultarDatos.= "GROUP by `SISTEMAOPERATIVO` ";
            $resultadoDatos = mysqli_query( $this->conn, $consultarDatos );
			return $resultadoDatos;
		}

		public function consultarEquiposCambio(){
			$consultarDatos = "SELECT u.descripcion,a.placa, d.CPU,d.memoria,d.V_FINAL ";
			$consultarDatos.= "FROM `datos` d ";
			$consultarDatos.= "INNER join articulo a on a.id_datos =d.id ";
			$consultarDatos.= "INNER join ubicacion u on a.ubicacion_id= u.id ";
			$consultarDatos.= "where a.ubicacion_id <> 1 or a.ubicacion_id <> 1 ";
			$consultarDatos.= "order by `V_FINAL` limit 3";
            $resultadoDatos = mysqli_query( $this->conn, $consultarDatos );
			return $resultadoDatos;
		}
		

		public function mirarDatos($placaM){
			$mirarDatos = "SELECT * FROM `articulo` INNER JOIN datos on datos.id=articulo.id_datos WHERE placa='$placaM'";
            $resultadoDatos = mysqli_query( $this->conn, $mirarDatos );
			return $resultadoDatos;
		}


			public function insertardatos($id,$activo,$SISTEMAOPERATIVO,$CPU ,$cache ,$memoria,$almacenamiento,$direccion,$mac,$ultimo_mantenimiento, $proximo_mantenimiento, $año_lanzamiento ,$fecha_compra, $V_CPU, $V_MEM, $V_DISCO, $V_FINAL,$login){
				$PROMEDIO = $V_CPU + $V_MEM + $V_DISCO;
				$V_FINAL = round($PROMEDIO / 3,1);
				$sql = "INSERT INTO `datos`( `id`, `SISTEMAOPERATIVO`, `CPU`, `cache`, `memoria`, `almacenamiento`, `direccion`, `mac`, `ultimo_mantenimiento`, `proximo_mantenimiento`, `año_lanzamiento`, `fecha_compra`, `V_CPU`, `V_MEM`, `V_DISCO`, `V_FINAL`)";
				$sql .= "VALUES (null,'$SISTEMAOPERATIVO','$CPU','$cache','$memoria','$almacenamiento','$direccion','$mac','$ultimo_mantenimiento', '$proximo_mantenimiento', '$año_lanzamiento' ,'$fecha_compra', '$V_CPU', '$V_MEM', '$V_DISCO', '$V_FINAL')";
				$resultado = mysqli_query($this->conn, $sql);

				//Variable del ultimo articulo
				//echo $activo; 

				//consulta que traiga el ultimo dato
				$UltimoDato = "SELECT * FROM datos order by id desc limit 1";
				$ultimo = mysqli_fetch_array(mysqli_query($this->conn, $UltimoDato));
				$Dato = $ultimo['id']; //Ultimo Dato de caracteristicas ingresado

				//Update de Articulo
				$sql = "UPDATE `articulo` SET `id_datos`='" . $Dato . "' WHERE `articulo`.`placa` = '" . $activo . "'";
				$resultadoU = mysqli_query($this->conn, $sql);

				if ($resultado == TRUE and $resultadoU == TRUE) {
					$sqlHistorial = "INSERT INTO `historial`(`id`, `usuario`, `operacion`,`tabla`, `id_relacionado`, `fecha`)";
					$sqlHistorial.= "VALUES (NULL,'".$login."', 'ingreso dato: ".$Dato." Sistema: ".$SISTEMAOPERATIVO." cpu: ".$CPU." cache: ".$cache." memoria: ".$memoria." almac: ".$almacenamiento." ip: ".$direccion." mac: ".$mac."','datos','".$Dato."',NOW())";

					$resultadoHistorial = mysqli_query( $this->conn, $sqlHistorial );

					echo "<div class='alert alert-success alert-dismissible'>";
					echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
					echo "  <strong>Excelente!</strong> Se ingreso informacion del computador correctamente.";
					echo "</div>";

				} else {
					// header('Location: articulo.php');
					echo "<div class='alert alert-danger alert-dismissible'>";
					echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
					echo "  <strong>Error!</strong> " . mysqli_error($this->conn);
					echo "</div>";
				}
		}

		public function modificarDatos($id,$SISTEMAOPERATIVO,$CPU ,$cache ,$memoria,$almacenamiento,$direccion,$mac,$ultimo_mantenimiento, $proximo_mantenimiento, $año_lanzamiento ,$fecha_compra, $V_CPU, $V_MEM, $V_DISCO, $V_FINAL,$login){
			$promedio=$V_CPU + $V_MEM + $V_DISCO;
			$V_FINAL = round($promedio/3,1);
			$sql = "UPDATE `datos` SET `SISTEMAOPERATIVO`='$SISTEMAOPERATIVO',`CPU`='$CPU',`cache`='$cache',`memoria`='$memoria',`almacenamiento`='$almacenamiento',`direccion`='$direccion',`mac`='$mac',`ultimo_mantenimiento`='$ultimo_mantenimiento',`proximo_mantenimiento`='$proximo_mantenimiento',`año_lanzamiento`='$año_lanzamiento',`fecha_compra`='$fecha_compra',`V_CPU`='$V_CPU',`V_MEM`='$V_MEM',`V_DISCO`='$V_DISCO',`V_FINAL`='$V_FINAL' WHERE `datos`.id='$id'";
			$resultado = mysqli_query( $this->conn, $sql );
          	if ($resultado==TRUE) {
				$sqlHistorial = "INSERT INTO `historial`(`id`, `usuario`, `operacion`,`tabla`, `id_relacionado`, `fecha`)";
				$sqlHistorial.= "VALUES (NULL,'".$login."', 'Modifico dato: ".$id." Sistema: ".$SISTEMAOPERATIVO." cpu: ".$CPU." cache: ".$cache." memoria: ".$memoria." almac: ".$almacenamiento." ip: ".$direccion." mac: ".$mac."','datos','".$id."',NOW())";

				$resultadoHistorial = mysqli_query( $this->conn, $sqlHistorial );

		        echo "<div class='alert alert-success alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Excelente!</strong> Se Modifico Articulo correctamente.";
				echo "</div>";

          	}else{
		        echo "<div class='alert alert-danger alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Error!</strong> ".mysqli_error($this->conn).$sql;
				echo "</div>";
          	}
		}
		
		function exportCaracDatabase() {
			$sql = "SELECT a.placa, a.descripcion, t.descripcion Tipo,  u.id Sucursal, u.descripcion PDV, a.observacion, SISTEMAOPERATIVO, CPU, cache, memoria RAM, almacenamiento, direccion IP,mac, ultimo_mantenimiento, proximo_mantenimiento, año_lanzamiento, fecha_compra, V_CPU, V_MEM, V_DISCO, V_FINAL ";
			$sql.= "FROM `articulo` a ";
			$sql.= "INNER JOIN datos on datos.id=a.id_datos ";
			$sql.= "INNER JOIN tipo_articulo t on t.id=a.tipo_id ";
			$sql.= "INNER JOIN ubicacion u on u.id=a.ubicacion_id";
			//echo $sql;
	    	$Result = mysqli_query( $this->conn, $sql );

	    	$productResult = array();

			while( $rows = mysqli_fetch_assoc($Result) ) {
				$productResult[] = $rows;
			}
			//print_r($productResult);
			$filename = "caracteristicas.xls";

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