
  <nav class="navbar navbar-light">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">
          <?php
          if ($_SESSION['sedeStock'] == "Servired") {
            echo "<img style='height: 68px; width: 153px;' src='img/ganeJamundi.png'>";
          }else{
            echo "<img style='height: 68px; width: 153px;' src='img/ganeYumbo.png'>";
          }
          ?>
          
        </a>
      </div>
      <ul class="nav navbar-nav">
        <?php if ($_SESSION['cargoLogin'] == 'Coordinador Soporte y Mantenimiento' || $_SESSION['rolLogin'] == 'SuperAdministrador') { ?>

        <li class="active"><a href="index.php">Inicio</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Movimientos
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Registro.php">Ingresar Movimiento Articulos</a></li>
            <li><a href="RegistroSimcard.php">Ingresar Movimiento Simcard</a></li>
            <li><a href="registroModificar.php">Modificar Movimiento Articulo</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Articulos
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="articulo.php">Ingresar Articulo</a></li>
            <li><a href="modificarArticulo.php">Modificar Articulo</a></li>
           
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Simcard
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="simcard.php">Ingresar Simcard</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Licencias
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="licenciasIngresar.php">Ingresar Licencia</a></li>
            <li><a href="licenciasModificar.php">Modificar Licencia</a></li>
            <li><a href="licenciasRelacion.php">Relacionar Licencia-Equipo</a></li>
            <li><a href="licenciasRelacionEliminar.php">Eliminar Licencia-Equipo</a></li>
            <li><a href="licenciasReport.php">Ver licencias</a></li>
          </ul>
        </li>
        <?php } ?>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="articulosReport.php">Articulos</a></li>
            <li><a href="registroReport.php">Movimientos Articulos</a></li>
            <li><a href="simcardReport.php">Simcard</a></li>
            <li><a href="RegistroSimcardReport.php">Movimientos Simcard</a></li>
          </ul>
        </li>
      </ul>
      <div class="navbar-header navbar-right">
        <div class="navbar-brand session">
          <?php echo $_SESSION['userLogin'] ?>
          <a href="cerrarsession.php">
            <span class="glyphicon glyphicon-off"></span>
          </a>
        </div>
      </div>
    </div>
  </nav>
  