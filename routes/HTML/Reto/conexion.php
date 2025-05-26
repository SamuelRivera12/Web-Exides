<?php
$conexion = mysqli_connect("localhost","root","","bd_libros");
mysqli_set_charset($conexion,"utf8");
/*if(!$conexion){
    echo "No se ha podido conectar con la base de datos";
}else{
    echo "Se ha conectado con la base de datos";
}*/
?>