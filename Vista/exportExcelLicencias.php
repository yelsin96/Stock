<?php
	session_start();
	include '../Controlador/controladorLicencia.php';
	$licencia = new licencia;
	$licencia->exportProductDatabase(); 
	//echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=articulosReport.php'>";
?>