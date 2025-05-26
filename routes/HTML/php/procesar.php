<?php
include (cn.php);

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$email=$_POST["email"];
$contraseña=$_POST["contraseña"];
//ACTUALIZAR DATOS
$actualizar="UPDATE bd_form SET nombre='$nombre', apellido='$apellido', email='$email', contraseña='$contraseña';
$resultado=mysqli_query($conexion,$actualizar);

if ($resultado){
    echo "<script>alert('Se ha actualizado la pagina')";</script>;
    echo "<script>window.location='../php/actualizar.php';</script>;"
}else{
    echo "<script>alert('No se pudieron actualizar los datos');window,history.go(-1);</script>;"
}
