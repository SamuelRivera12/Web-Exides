<?php
include("conexion.php");
$id=$_GET["id"];
$bd_libros="SELECT * FROM bd_libros where Id_libro='$id'";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Actualizar</title>
</head>
<body>
    <form class="container-table container-table--edit" action="procesar.php" method="post">
        <div class="titulo titulo--edit">Datos de usuario <br></div>
        <div class="header">Nombre</div>
        <div class="header">Genero</div>
        <div class="header">Precio</div>
        <div class="header">Alquiler</div>
        <div class="header">Numero Ejemplares</div>
        <div class="header">Operaciones</div>
        <?php $resultado = mysqli_query($conexion, $bd_libros);
        
        while($row=mysqli_fetch_assoc($resultado)) {?>
        <input type="hidden" class="table_item" value ="<?php echo $row["Id_libro"];?>"name="id">
        <input type="text" class="table_input" value ="<?php echo $row["Nombre"];?>"name="Nombre">
        <input type="text" class="table_input" value ="<?php echo $row["Genero"];?>"name="Genero">
        <input type="text" class="table_input" value ="<?php echo $row["Precio"];?>"name="Precio">
        <input type="text" class="table_input" value ="<?php echo $row["Alquiler"];?>"name="Alquiler">
        <input type="text" class="table_input" value ="<?php echo $row["Num_Ejemplares"];?>"name="Num_Ejemplares">
        <?php } mysqli_free_result($resultado)?>
        <input type="submit" value="Actualizar" class="container_submit container_submit--actualizar">
        </form>
</body>
</html>