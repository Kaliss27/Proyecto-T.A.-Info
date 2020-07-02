<?php
   $conn = new mysqli('localhost', 'root', '','id1265441_facultad');
//id12656441_admin->User, '12345'->password   
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PORTAL FACULTAD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://cdn.pixabay.com/photo/2018/02/17/00/06/school-3158985_960_720.png" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/siteStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/tablas.css">
    <script type="text/javascript" src="JS/sideNavDD.js"></script>
  </head>
  <body onload="dropdownFu()">
    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-2 sidenav">
          <label id="userL">PORTAL FACULTAD</label>
            <div class="active"><a href="#">Inicio</a></div>
            <button class="dropdown-btn">Alumnos 
              <i><span class="glyphicon glyphicon-chevron-down"></span></i>
            </button>
            <div class="dropdown-container">
              <a href="registro-alumnos.php">Registro Alumnos</a>
              <div class="active"><a href="#">Consultas Alumnos</a></div>
            </div>
            <button class="dropdown-btn">Programas Educativos 
              <i><span class="glyphicon glyphicon-chevron-down"></span></i>
            </button>
            <div class="dropdown-container">
              <a href="registro-PE.php">Registro PE</a>
              <a href="#">Consultas PE</a>
            </div>
            <button class="dropdown-btn">Profesores 
              <i><span class="glyphicon glyphicon-chevron-down"></span></i>
            </button>
            <div class="dropdown-container">
              <a href="registro-profesores.php">Registro Profesores</a>
              <a href="#">Consultas Profesores</a>
            </div>
            <button class="dropdown-btn">Experiencias Educativas 
              <i><span class="glyphicon glyphicon-chevron-down"></span></i>
            </button>
            <div class="dropdown-container">
              <a href="registro-EE.php">Registro EE</a>
              <a href="registro-horarios.php">Horario de EE</a>
            </div>
        </div>
        <div class="col-sm-10">
          <div class="container-fluid">
            <div id="tabla-alumnos">
              <h1 align="center">ALUMNOS FIEE</h1>
              <?php
                $sql = "SELECT T_Alumnos.Matricula,T_Alumnos.APaterno,T_Alumnos.AMaterno,T_Alumnos.Nombre,T_Alumnos.CreditosObtenidos,T_Programa.pnombre FROM T_Alumnos INNER JOIN T_Programa ON T_Alumnos.clv_programa=T_Programa.clvprograma;";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  echo "<table class='table table-hover table-condensed table-bordered'><tr><th>Matricula</th><th>Nombre Completo</th><th>PE</th><th>Creditos Obtenidos</th><th>Editar</th><th>Eliminar</th></tr>";
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["Matricula"]."</td><td>".$row["Nombre"]. " " . $row["APaterno"]." ".$row["AMaterno"]."</td><td>".$row["pnombre"]. "</td><td>".$row["CreditosObtenidos"]."<td><button class='btn btn-warning glyphicon glyphicon-pencil' data-toggle='modal' data-target='#modalEdicion'></button></td><td><button class='btn btn-danger  glyphicon glyphicon-remove'></button></td></tr>";
                  }
                  echo "</table>";
                } else {
                  echo "0 results";
                }
                $conn->close();
              ?>
            </div>
            <caption>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro">Agregar alumno
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
            </caption>
            <!-- Modal para agregar datos -->
            <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Alumno</h4>
                  </div>
                  <div class="modal-body">
                    <label>Nombre</label>
                    <input type=text name="nombre" placeholder="Nombres" class="form-control input-sm"><br>
                    <label>Apellido Paterno:</label>
                    <input type=text name="paterno" placeholder="Apellido Paterno" class="form-control input-sm"><br>
                    <label>Apellido Materno:</label>
                    <input type=text name="materno" placeholder="Apellido Materno" class="form-control input-sm"><br>
                    <label> Seleccionar Programa Educativo:</label>
                        <select name="pe" class="form-control input-sm">
                          <option value="0">Seleccione</option>
                            <?php
                              $query = $mysqli -> query ("SELECT * FROM T_Programa");
                              while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores[clvprograma].'">'.$valores[pnombre].'</option>';
                              }
                            ?>
                        </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Agregar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal para edición -->
            <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar datos de un alumno</h4>
                  </div>
                  <div class="modal-body">  ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary btn-warning">Editar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="container-fluid">
      <p>Footer Text</p>
    </footer>
  </body>
</html>