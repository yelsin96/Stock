<?php 
	session_start();
	include '../Controlador/controladorSimcard.php';
	$simcard = new simcard;
	$simcard->exportProductDatabase(); 
	//echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=articulosReport.php'>";
?>