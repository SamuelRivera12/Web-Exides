<?php
include ("cn.php");
$Nombre = $_POST["nombre"];
$Apellido = $_POST["apellido"];
$Email = $_POST["email"];
$Contraseña = $_POST["contraseña"];

$insert = "INSERT INTO tabla1 (Nombre, Apellido, Email, Contraseña) VALUES ('$Nombre', '$Apellido', '$Email','$Contraseña')";
$result = mysqli_query($connect, $insert);
if($result){
    echo "<script> alert('Datos insertadps correctamente')";
} else{
    echo "<script> alert('No registrado correctamente')";
}
?>
