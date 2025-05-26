<?php
include("conexion.php");

$id= $_GET["id"];
$eliminar="DELETE FROM bd_libros WHERE Id_libro='$id'";
$resultado=mysqli_query($conexion,$eliminar);

if($resultado){
    header("Location:update.php");
}else{
    echo "<script>alert('No se pudo eliminar');window,history.go(-1);</script>";
}