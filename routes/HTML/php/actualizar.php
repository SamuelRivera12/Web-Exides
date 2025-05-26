<?php
include("cn.php");
$correo = $_POST['correo'];
$contra = $_POST['contra'];
$usuarios="SELECT * FROM usuarios where Email = '$correo' AND Contraseña = '$contra'";
$comprobar = mysqli_query($connect, $usuarios);
?>
