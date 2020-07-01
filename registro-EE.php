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
            <button class="dropdown-btn">Alumnos 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="registro-alumnos.php">Registro Alumnos</a>
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
            <button class="dropdown-btn active">Experiencias Educativas 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <div class="active" =><a href="#">Registro EE</a></div>
                <a href="registro-horarios.php">Horario de EE</a>
            </div>
        </div>
        <div class="main">
            <center>
                <h1> PORTAL FACULTAD</h1>
            </center>
            <div id="contenido">
                <h3 align="center">Registro de EE</h3>
                <form method="POST" action="#">
                    <table>
                    <tr>
                      <td>
                        <label>Clave Experiencia Educativa:</label>
                      </td>
                      <td>
                        <input type=text name="idEE" placeholder="Clave"><br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Nombre:</label>
                      </td>
                      <td>
                        <input type=text name="nombre" placeholder="Nombre"><br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Creditos:</label>
                      </td>
                      <td>
                        <input type=text name="crd" placeholder="Creditos"><br>
                      </td>
                    </tr>
                  </table>
                  <input type="submit" name="enviar" value="Registrar"/><input type="reset" />
                  <?php
                    if (isset($_POST['enviar'])){
                      require("OnlyPHP/registroEE.php"); 
                    }
                  ?>
                </form>
            </div>
            <div id="contenido">
                <h3 align="center">Experiencias Educativas</h3>
              <?php
              $conn = new mysqli('localhost', 'id12656441_admin', '12345','id12656441_facultad');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM T_Materias ;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Clave</th><th>EE</th><th>Creditos</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Clv_Materia"]."</td><td>" . $row["Nombre"]."</td><td>".$row["Creditos"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
              ?><br>
              
            </div>
        </div>
  </body>
</html>