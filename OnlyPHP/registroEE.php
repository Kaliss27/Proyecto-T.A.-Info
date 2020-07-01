<?php
$idEE = $_POST['idEE'];
$nombre = $_POST['nombre'];
$crd = $_POST['crd'];
require("connect.php");
$sql="INSERT INTO T_Materias (Clv_Materia,Nombre,Creditos) VALUES ('$idEE','$nombre','$crd')";
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
else{
//echo "Connected successfully";
mysqli_select_db($conn,"id12656441_facultad");
if ($conn->query($sql) === TRUE) {
echo "EE Registrada";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>