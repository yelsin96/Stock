
<?php
class orders{
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		require_once '../Modelo/conexion.php';
		$conectar=new conectar($_SESSION['sedeLogin']);
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
		$sWhere=" sim.Numero_linea LIKE '%".$search['query']."%' or sim.serie LIKE '%".$search['query']."%' or sim.Ubicacion_id LIKE '%".$search['query']."%' or sim.Observacion LIKE '%".$search['query']."%' or ope.descripcion LIKE '%".$search['query']."%'" ;
		if ($search['location']!=""){
			$sWhere.=" and sim.Ubicacion_id = '".$search['location']."'";
		}
		if ($search['status']!=""){
			$sWhere.=" and sim.operador = '".$search['status']."'";
		}
		$inner="LEFT JOIN ubicacion ub
				on sim.Ubicacion_id = ub.id 
				inner JOIN operador as ope
				on sim.operador = ope.id";
		$sWhere.=" order by sim.operador asc";
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
