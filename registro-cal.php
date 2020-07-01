<?php
// Realizamos la conexión con el servidor
  $mysqli = new mysqli('localhost', 'id12656441_admin', '12345', 'id12656441_facultad');
?>
<!DOCTYPE>
<html>
 <head>
     <title>PORTAL FACULTAD</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/png" href="https://lh3.googleusercontent.com/proxy/7yZSy2KrXazTYu1WeAF9ayOVsl7LE7u-rqgJM1iYb8m96IHTyJzvRJlciUyv07m9iSJrpC-6nWdOj5I5uFncb-M6nzmHxHwkqfEv-KsgqO3KLFce4GmSiCUj" sizes="16x16">
     <link rel="stylesheet" type="text/css" href="CSS/siteStyle.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="JS/sideNavDD.js"></script>
 </head>
 <body onload="dropdownFu()">
  <div class="sidenav">
            <a href="index.html">Inicio</a>
            <button class="dropdown-btn active">Alumnos 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <div class="active"><a href="#">Registro Alumnos</a></div>
                <a href="#">Consultas Alumnos</a>
            </div>
            <button class="dropdown-btn">Programas Educativos 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="registro-PE.php">Registro PE</a>
                <a href="#">Consultas PE</a>
            </div>
            <button class="dropdown-btn">Profesores 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="registro-profesores.php">Registro Profesores</a>
                <a href="#">Consultas Profesores</a>
            </div>
            <button class="dropdown-btn">Experiencias Educativas 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="registro-EE.php">Registro EE</a>
                <a href="registro-horarios.php">Horario de EE</a>
            </div>
        </div>
        <div class="main">
            <center>
                <h1> PORTAL FACULTAD</h1>
            </center>
            <div id="contenido">
                <form method=POST action="#">
                    <table>
                    <tr>
                      <td>
                        <label>Matricula:</label>
                      </td>
                      <td>
                        <input type=text id="mat" name="matricula" placeholder="Matricula">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>EE:</label>
                      </td>
                      <td>
                         <select name="ee">
                          <option value="0">Seleccione:</option>
                            <?php
                              $query = $mysqli -> query ("SELECT T_Horario.NRC,T_Materias.Nombre FROM T_Horario JOIN T_Materias ON T_Horario.Materia_fk=T_Materias.Clv_Materia");
                              while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores[NRC].'">'.$valores[Nombre].'</option>';
                              }
                            ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Periodo:</label>
                      </td>
                      <td>
                        <select name="per">
                          <option value="0">Seleccione:</option>
                            <?php
                              $query = $mysqli -> query ("SELECT * FROM T_Periodo");
                              while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores[clv_periodo].'">'.$valores[Descripcion].'</option>';
                              }
                            ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Calificación:</label>
                      </td>
                      <td>
                        <input type=text name="calf" placeholder="0.0"><br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label> Modo de Examen:</label>
                      </td>
                      <td>
                        <select name="me">
                          <option value="0">Seleccione:</option>
                            <?php
                              $query = $mysqli -> query ("SELECT * FROM T_ME");
                              while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="'.$valores[clv_ME].'">'.$valores[Modo_Examen].'</option>';
                              }
                            ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Estatus:</label>
                        </td>
                        <td>
                            <input type=text name="st"><br>
                        </td>
                    </tr>
                  </table>
                  <input type="submit" name="enviar" value="Registrar"/><input type="reset" />
                  <?php
                    if (isset($_POST['enviar'])){
                      require("OnlyPHP/registroCal.php");
                    }
                  ?>
              </form>
            </div>
        </div>
  </body>
</html>