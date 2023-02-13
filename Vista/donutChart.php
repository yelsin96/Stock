<?php
    include '../Controlador/insert_user.php'; 
    $datos = new datos;
    $resultadoDato = $datos->consultarCountSistemaOperativo(); 
    $contador = 0;
    while ($value = mysqli_fetch_assoc($resultadoDato)) {
        echo "<input type='hidden' value='".$value['SISTEMAOPERATIVO']."' id='sistema".$contador."'>"; 
        echo "<input type='hidden' value='".$value['CANTIDAD']."' id='cantidadSistema".$contador."'>";
        $contador+=1;
    }
    $contador-=1;
    echo "<input type='hidden' value='".$contador."' id='totalSistemas'>";
?>

<div class="panel panel-info">
  <div class="panel-heading">Sistemas operativos</div>
  <div class="panel-body">
    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
  </div>
</div>

