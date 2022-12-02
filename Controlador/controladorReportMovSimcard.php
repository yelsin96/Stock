
<?php
/**
 	--------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	----------------------------
 
*/
include('../Modelo/conexion.php');
class orders extends conectar {
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		$this->mysqli = $this->conexion();
    }
	
	public function countAll($sql){
		$query=$this->mysqli->query($sql);
		$count=$query->num_rows;
		return $count;
	}
	
	public function getData($tables,$campos,$search){
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		$sWhere=" mov.simcard_id LIKE '%".$search['query']."%'";
		if ($search['location']!=""){
			$sWhere.=" and mov.ubicacion_id = '".$search['location']."'";
		}
		if ($search['status']!=""){
			$sWhere.=" and sim.operador = '".$search['status']."'";
		}
		$inner="inner JOIN ubicacion ub
				on mov.ubicacion_id = ub.id 
				inner JOIN usuarios as usu1
				on mov.usuario_realiza = usu1.cedula
				inner JOIN simcard as sim
				on mov.simcard_id = sim.Numero_linea";
		$sWhere.=" order by mov.id desc";
		$sql="SELECT $campos FROM  $tables $inner where $sWhere LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT * FROM $tables $inner where $sWhere";
		//echo $sql;
		$nums_row=$this->countAll($sql1);
		//Set counter
		$this->setCounter($nums_row);
		return $query;
	}
	function setCounter($counter) {
		$this->counter = $counter;
	}
	function getCounter() {
		return $this->counter;
	}
}
?>
