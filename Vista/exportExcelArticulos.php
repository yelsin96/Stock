<?php 
	include '../Controlador/controladorRegistro.php';
	$registro = new registro;
	$registro->exportProductDatabase(); 
	//echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=articulosReport.php'>";
?>