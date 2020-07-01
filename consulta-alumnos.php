<?php
   $conn = new mysqli('localhost', 'id12656441_admin', '12345','id12656441_facultad');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
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
                <a href="#">Registro Alumnos</a>
                <div class="active"><a href="#">Consultas Alumnos</a></div>
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
                <a href="registro-profesores.html">Registro Profesores</a>
                <a href="#">Consultas Profesores</a>
            </div>
            <button class="dropdown-btn">Experiencias Educativas 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="registro-EE.php">Registro EE</a>
                <a href="#">Horario de EE</a>
            </div>
        </div>
        <div class="main">
            <center>
                <h1> PORTAL FACULTAD</h1>
            </center>
            <div id="contenido">
              <h1 align="center">ALUMNOS FIEE</h1>
              <?php
$sql = "SELECT T_Alumnos.Matricula,T_Alumnos.APaterno,T_Alumnos.AMaterno,T_Alumnos.Nombre,T_Programa.pnombre FROM T_Alumnos INNER JOIN T_Programa ON T_Alumnos.clv_programa=T_Programa.clvprograma;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Matricula</th><th>Nombre Completo</th><th>PE</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Matricula"]."</td><td>".$row["Nombre"]. " " . $row["APaterno"]." ".$row["AMaterno"]."</td><td>".$row["pnombre"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
              ?>
        </div>
  </body>
</html>