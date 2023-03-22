<?php
class orders{
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		require_once '../Modelo/conexion.php';
		$conectar=new conectar($_SESSION['sedeStock']);
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
		$sWhere=" lic.id_licencia LIKE '%".$search['query']."%' or lic.descripcion LIKE '%".$search['query']."%' or lic.tipo_licencia LIKE '%".$search['query']."%' or est.descripcion LIKE '%".$search['query']."%' or dat.nombre_equipo LIKE '%".$search['query']."%'" ;
		if ($search['location']!=""){
			$sWhere.=" and sim.Ubicacion_id = '".$search['location']."'";
		}
		if ($search['status']!=""){
			$sWhere.=" and sim.operador = '".$search['status']."'";
		}
		$inner="inner JOIN estado est
				on lic.id_estado = est.id 
				inner JOIN relacion_licencias as rl
				on lic.id_licencia = rl.id_licencia 
                inner JOIN articulo as art
				on art.placa = rl.placa_articulo 
                inner JOIN datos as dat
				on art.id_datos = dat.id";
		$sWhere.=" order by lic.descripcion asc";
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
