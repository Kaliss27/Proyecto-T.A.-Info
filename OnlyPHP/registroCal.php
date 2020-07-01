<?php
$matricula = $_POST['matricula'];
$ee = $_POST['ee'];
$per = $_POST['per'];
$calf = $_POST['calf'];
$me = $_POST['me'];
$st = $_POST['st'];
require("connect.php");
$sql="INSERT INTO T_Asignacion (Matricula_fk,NRC_fk,Periodo_fk,Calificacion,ME_fk,Estatus) 
VALUES ('$matricula','$ee','$per','$calf','$me','$st')";
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
else{
//echo "Connected successfully";
mysqli_select_db($conn,"id12656441_facultad");
if ($conn->query($sql) === TRUE) {
echo "<br>"."Calificacion registrada";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>