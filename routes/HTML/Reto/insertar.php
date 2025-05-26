<?php
include("conexion.php");

$nombre = $_POST["Nombre"];
$genero = $_POST["Genero"];
$precio = $_POST["Precio"];
$alquiler = $_POST["Alquiler"];
$ejempl = $_POST["Num_Ejemplares"];

$insertar="INSERT INTO bd_libros (Nombre,Genero,Precio,Alquiler,Num_Ejemplares) VALUES ('$nombre','$genero','$precio','$alquiler','$ejempl')";

$resultado=mysqli_query($conexion,$insertar);
if($resultado){
    echo "<script>alert('Libro Registrado');</script>";
    echo "<script>window.location='update.php';</script>";
}else{
    echo "<script>alert('No se pudo registrar');window,history.go(-1);</script>";
}