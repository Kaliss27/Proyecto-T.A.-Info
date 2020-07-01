<?php
$npersonal = $_POST['npersonal'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
require("connect.php");
$sql="INSERT INTO T_Profesores (NPersonal,APaterno,AMaterno,Nombre) 
VALUES ('$npersonal','$paterno','$materno','$nombre')";
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
else{
//echo "Connected successfully";
mysqli_select_db($conn,"id12656441_facultad");
if ($conn->query($sql) === TRUE) {
echo "Profesor Registrado";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>