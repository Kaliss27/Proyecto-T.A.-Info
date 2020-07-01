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
            <button class="dropdown-btn active">Profesores 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <div class="active"><a href="#">Registro Profesores</a></div>
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
                <form method="POST" action="#">
                  <table>
                    <tr>
                      <td>
                        <label>Número de Personal:</label>
                      </td>
                      <td>
                        <input type=text name="npersonal" placeholder="N° Personal"><br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Nombre(s):</label>
                      </td>
                      <td>
                         <input type=text name="nombre" placeholder="Nombres"><br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Apellido Paterno:</label>
                      </td>
                      <td>
                        <input type=text name="paterno" placeholder="Apellido Paterno"><br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Apellido Materno:</label>
                      </td>
                      <td>
                        <input type=text name="materno" placeholder="Apellido Materno"><br>
                      </td>
                    </tr>
                  </table>
                  <input type="submit" name="enviar" value="Registrar"/><input type="reset" />
                  <?php
                    if (isset($_POST['enviar'])){
                      require("OnlyPHP/registroProfesores.php");
                    }
                  ?>
              </form>
            </div>
        </div>
  </body>
</html>