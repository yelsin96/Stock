<?php
class orders{
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		require_once '../Modelo/conexion.php';
		$conectar=new conectar($_SESSION['sedeLogin']);
		$this->mysqli=$conectar->conexion();
    }
	
	public function countAll($sql){
		$query=$this->mysqli->query($sql);
		$count=$query->num_rows;
		return $count;
	}
	
	public function getData($tables,$campos,$search){
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		$sWhere=" art.placa LIKE '%".$search['query']."%'";
		if ($search['location']!=""){
			$sWhere.=" and art.ubicacion_id = '".$search['location']."'";
		}
		if ($search['status']!=""){
			$sWhere.=" and art.descripcion = '".$search['status']."'";
		}
		$inner="LEFT JOIN ubicacion ub
				on art.ubicacion_id = ub.id 
				inner JOIN tipo_articulo as tip
				on art.tipo_id = tip.id";
		$sWhere.=" order by art.descripcion asc";
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
