<?php
class orders{
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		require_once '../Modelo/conexion.php';
		$conectar=new conectar($_SESSION['sedeStock']);
		$this->mysqli = $conectar->conexion();
    }
	
	public function countAll($sql){
		$query=$this->mysqli->query($sql);
		$count=$query->num_rows;
		return $count;
	}
	
	public function getData($tables,$campos,$search){
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		$sWhere=" mov.articulo_id LIKE '%".$search['query']."%'";
		if ($search['location']!=""){
			$sWhere.=" and mov.ubicacion_id = '".$search['location']."'";
		}
		if ($search['status']!=""){
			$sWhere.=" and art.descripcion = '".$search['status']."'";
		}
		$inner="inner JOIN ubicacion ub
				on mov.ubicacion_id = ub.id 
				inner JOIN Gane.Personas as usu1
				on mov.usuario_entrega_id = usu1.cc_persona
				inner JOIN Gane.Personas as usu2
				on mov.usuario_recibe_id = usu2.cc_persona
				inner JOIN articulo as art
				on mov.articulo_id = art.placa";
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
