<?php
include("cn.php");

$id=$_GET["id"];
$eliminar="DELETE FORM bd_form WHERE id='$id'";
$resultado=mysqli_query($conexion, $eliminar);

if($resultado){
    header("Location:update.php");
}else{
    echo "<script>alert("Error");window,history.go(-1);</script>"
}
