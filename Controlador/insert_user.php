<?php 
	class datos{
		public $conn;

		public function __construct(){
			require_once '../Modelo/conexion.php';
			$conectar=new conectar();
			$this->conn=$conectar->conexion();
		}

		public function consultarDatos($idM){
			$consultarDatos = "SELECT * FROM `datos` WHERE id = '$idM'";
            $resultadoDatos = mysqli_query( $this->conn, $consultarDatos );
			return $resultadoDatos;
		}

		public function mirarDatos($placaM){
			$mirarDatos = "SELECT * FROM `articulo` INNER JOIN datos on datos.id=articulo.id_datos WHERE placa='$placaM'";
            $resultadoDatos = mysqli_query( $this->conn, $mirarDatos );
			return $resultadoDatos;
		}


			public function insertardatos($id,$activo,$SISTEMAOPERATIVO,$CPU ,$cache ,$memoria,$almacenamiento,$direccion,$mac,$ultimo_mantenimiento, $proximo_mantenimiento, $año_lanzamiento ,$fecha_compra, $V_CPU, $V_MEM, $V_DISCO, $V_FINAL,$login){
			$PROMEDIO=$V_CPU + $V_MEM + $V_DISCO;
			$V_FINAL = $PROMEDIO / 3;
			$sql = "INSERT INTO `datos`( `id`, `SISTEMAOPERATIVO`, `CPU`, `cache`, `memoria`, `almacenamiento`, `direccion`, `mac`, `ultimo_mantenimiento`, `proximo_mantenimiento`, `año_lanzamiento`, `fecha_compra`, `V_CPU`, `V_MEM`, `V_DISCO`, `V_FINAL`)";
            $sql.= "VALUES (null,'$SISTEMAOPERATIVO','$CPU ','$cache ','$memoria','$almacenamiento','$direccion','$mac','$ultimo_mantenimiento', '$proximo_mantenimiento', '$año_lanzamiento' ,'$fecha_compra', '$V_CPU', '$V_MEM', '$V_DISCO', '$V_FINAL')";
          	$resultado = mysqli_query( $this->conn, $sql );
          	if ($resultado==TRUE) {
				//$sqlHistorial = "INSERT INTO `datos`( `id`, `SISTEMAOPERATIVO`, `CPU`, `cache`, `memoria`, `almacenamiento`, `direccion`, `mac`, `ultimo_mantenimiento`, `proximo_mantenimiento`, `año_lanzamiento`, `fecha_compra`, `V_CPU`, `V_MEM`, `V_DISCO`, `V_FINAL`)";
	            //$sqlHistorial.= "VALUES (NULL,'".$login."', id='$id',SISTEMAOPERATIVO='$SISTEMAOPERATIVO',CPU='$CPU',cache='$cache',memoria='$memoria',almacenamiento='$almacenamiento',direccion='$direccion',mac='$mac',ultimo_mantenimiento='$ultimo_mantenimiento',proximo_mantenimiento='$proximo_mantenimiento', año_lanzamiento='$año_lanzamiento' ,fecha_compra='$fecha_compra',V_CPU='$V_CPU', V_MEM='$V_MEM' ,V_DISCO='$V_DISCO', V_FINAL='$V_FINAL',NOW())";

            	//$resultadoHistorial = mysqli_query( $this->conn, $sqlHistorial );

		        echo "<div class='alert alert-success alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Excelente!</strong> Se ingreso informacion del computador correctamente.";
				echo "</div>";

          	}else{
		        echo "<div class='alert alert-danger alert-dismissible'>";
				echo "  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
				echo "  <strong>Error!</strong> ".mysqli_error($this->conn);
				echo "</div>";
          	}
          	//Variable del ultimo articulo
			//echo $activo; 

			//consulta que traiga el ultimo dato
			$UltimoDato = "SELECT * FROM datos order by id desc limit 1";
			$ultimo = mysqli_fetch_array(mysqli_query( $this->conn, $UltimoDato ));
			$Dato = $ultimo['id']; //Ultimo Dato de caracteristicas ingresado

			//Update de Articulo
			$sql = "UPDATE `articulo` SET `id_datos`='".$Dato."' WHERE `articulo`.`placa` = '".$activo."'";
			$resultado = mysqli_query( $this->conn, $sql );
		}

		public function modificarDatos($id,$SISTEMAOPERATIVO,$CPU ,$cache ,$memoria,$almacenamiento,$direccion,$mac,$ultimo_mantenimiento, $proximo_mantenimiento, $año_lanzamiento ,$fecha_compra, $V_CPU, $V_MEM, $V_DISCO, $V_FINAL,$login){
			$promedio=$V_CPU + $V_MEM + $V_DISCO;
			$V_FINAL = $promedio / 3;
			$sql = "UPDATE `datos` SET `SISTEMAOPERATIVO`='$SISTEMAOPERATIVO',`CPU`='$CPU',`cache`='$cache',`memoria`='$memoria',`almacenamiento`='$almacenamiento',`direccion`='$direccion',`mac`='$mac',`ultimo_mantenimiento`='$ultimo_mantenimiento',`proximo_mantenimiento`='$proximo_mantenimiento',`año_lanzamiento`='$año_lanzamiento',`fecha_compra`='$fecha_compra',`V_CPU`='$V_CPU',`V_MEM`='$V_MEM',`V_DISCO`='$V_DISCO',`V_FINAL`='$V_FINAL' WHERE `datos`.id='$id'";
			$resultado = mysqli_query( $this->conn, $sql );
          	if ($resultado==TRUE) {
          		//$sqlHistorial = "INSERT INTO `historial`(`id`, `usuario`, `operacion`,`tabla`, `id_relacionado`, `fecha`)";
	            //$sqlHistorial.= "VALUES (NULL,'".$login."', 'modifico placa: ".$placa." descripcion: ".$descripcion." tipo_id: ".$tipo." ubicacion: ".$ubicacion." observacion: ".$observacion."','Articulo','".$placa."',NOW())";

            	//$resultadoHistorial = mysqli_query( $this->conn, $sqlHistorial );

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

		
	}
 ?>