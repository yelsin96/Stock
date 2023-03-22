<?php
session_start();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {

    include('../Controlador/controladorReportLicencias.php');
    $database = new orders();

    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $location = strip_tags($_REQUEST['location']);
    $status = strip_tags($_REQUEST['status']);
    $per_page = intval($_REQUEST['per_page']);
    $tables = "licencias as lic";
    $campos = "lic.id_licencia, lic.descripcion descLic, lic.tipo_licencia, est.descripcion descEstado, 
    IFNULL((SELECT d.nombre_equipo from articulo art inner join datos d on art.id_datos=d.id where art.placa = rl.placa_articulo), 'No asignada') as nombre_equipo ";
    //$campos="*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("query" => $query, "location" => $location, "status" => $status, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getData($tables, $campos, $search);
    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;
        ;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);


    //Recorrer los datos recuperados

    if ($numrows > 0) {
        ?>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Id licencia</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Equipo</th>
                    <th><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $finales = 0;
                /*$hola=mysqli_fetch_array($datos);
                print_r($hola);*/
                foreach ($datos as $key => $row) {
                    ?>
                    <tr>
                        <td style="width: 10%;"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                            <?= $row['id_licencia']; ?>
                        </td>
                        <td>
                            <?= $row['descLic']; ?>
                        </td>
                        <td>
                            <?= $row['tipo_licencia']; ?>
                        </td>
                        <td>
                            <?= $row['descEstado']; ?>
                        </td>
                        <td>
                            <?= $row['nombre_equipo']; ?>
                            <?php $nombreE = (empty($row['nombre_equipo'])) ? 'No asignada' : $row['nombre_equipo'] ; 
                                //echo $nombre;
                                ?>
                        </td>
                        <td>

                            <a href='licenciasVer.php?id_licencia=<?=$row["id_licencia"]?>'>
                                <svg style='color:blue'
                                    xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                    class='bi bi-search' viewBox='0 0 16 16'>
                                    <path
                                        d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z' />
                                </svg> 
                            </a>
                        </td>
                    </tr>
                    <?php
                    $finales++;
                }
                ?>
            </tbody>
        </table>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';

            include '../Controlador/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginate();

            ?>
        </div>
        <?php
    }
}
?>