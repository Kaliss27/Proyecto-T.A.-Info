<?php
$nrcEE = $_POST['nrcEE'];
$ee = $_POST['ee'];
$profesor = $_POST['profesor'];
$horarioA = $_POST['horas'];
$salonC = $_POST['salones'];
$days=$_POST['days'];
require("connect.php");
$sql="INSERT INTO T_Horario (NRC,Materia_fk,NPersonal,Horario_fk,Dias,Salon_fk) 
VALUES ('$nrcEE','$ee','$profesor','$horarioA','$days','$salonC')";
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
else{
//echo "Connected successfully";
mysqli_select_db($conn,"id12656441_facultad");
if ($conn->query($sql) === TRUE) {
echo "Horario Registrado";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>