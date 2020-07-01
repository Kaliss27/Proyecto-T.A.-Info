<?php
$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$pe = $_POST['pe'];
require("connect.php");
$sql="INSERT INTO T_Alumnos (Matricula,APaterno,AMaterno,Nombre,clvprograma) 
VALUES ('$matricula','$paterno','$materno','$nombre','$pe')";
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
else{
//echo "Connected successfully";
mysqli_select_db($conn,"id12656441_facultad");
if ($conn->query($sql) === TRUE) {
echo "Alumno Registrado";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>