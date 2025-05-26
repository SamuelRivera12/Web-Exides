<?php
include("conexion.php");

$id=$_POST["id"];
$nombre = $_POST["Nombre"];
$genero = $_POST["Genero"];
$precio = $_POST["Precio"];
$alquiler = $_POST["Alquiler"];
$ejempl = $_POST["Num_Ejemplares"];
//Actualizar datos
$actualizar="UPDATE bd_libros SET Nombre='$nombre',Genero='$genero',Precio='$precio',Alquiler='$alquiler' ,Num_Ejemplares='$ejempl' where Id_libro='$id'";
$resultado=mysqli_query($conexion,$actualizar);

if($resultado){
    echo "<script>alert('Se ha actualizado la pagina');</script>";
    echo "<script>window.location='/Reto/update.php';</script>";
}else{
    echo "<script>alert('No se pudo actualizar los datos');window,history.go(-1);</script>";
}