
  <nav class="navbar navbar-light">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">
          <img style="height: 68px; width: 153px;" src="img/gane.png">
        </a>
      </div>
      <ul class="nav navbar-nav">
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
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="usuarios.php">Ingresar Usuario</a></li>
          </ul>
        </li>
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
          <?php echo $_SESSION['user_id'] ?>
          <a href="cerrarsession.php">
            <span class="glyphicon glyphicon-off"></span>
          </a>
        </div>
      </div>
    </div>
  </nav>
  