<?php
    $resultadoEquiposCambio = $datos->consultarEquiposCambio(); 

?>

<div class="panel panel-danger">
    <div class="panel-heading">Equipos con caracteristicas bajas</div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Punto de venta</th>
                <th scope="col">Placa</th>
                <th scope="col">Procesador</th>
                <th scope="col">Ram</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($value = mysqli_fetch_assoc($resultadoEquiposCambio)) {
                    echo "<tr>";
                        echo "<td>".$value['descripcion']."</td>"; 
                        echo "<td>".$value['placa']."</td>"; 
                        echo "<td>".$value['CPU']."</td>"; 
                        echo "<td>".$value['memoria']."</td>"; 
                    echo "</tr>";
                    $contador+=1;
                }
                ?>
            </tbody>
            </table>
    </div>
</div>
