<?php
      $servername="localhost";
      $username="id12656441_admin";
      $password="12345";
      $database="id12656441_facultad";

      $conn=mysqli_connect($servername, $username, $password, $database);
      if(mysqli_connect_error())
        die('Error de conexión');
?>