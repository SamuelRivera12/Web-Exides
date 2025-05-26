<?php
include("cn.php");
$correo = $_POST['correo'];
$contra = $_POST['contra'];
$bd_form="SELECT * FROM usuarios where Email = '$correo' AND Contraseña = '$contra'";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>
<body>
    <section>
    <form>
        <div>Datos de usuario</div>
        <div class="header">Nombre</div>
        <div class="header">Apellido</div>
        <div class="header">Email</div>
        <div class="header">Contraseña</div>
    
        <?php $resultado=mysqli_query($conexion, $bd_form);

        while($row=mysqli_fetch_assoc(resultado)){?>
        <div type="text" class="table_input" value="<?php echo $row["nombre"];?>" name="nombre">
        <div type="text" class="table_input" value="<?php echo $row["apellido"];?>" name="apellido">
        <div type="text" class="table_input" value="<?php echo $row["email"];?>" name="email">
        <div type="text" class="table_input" value="<?php echo $row["contraseña"];?>" name="contraseña">
        <div class="table_item">
            <a href="actualizar.php? id=<?php echo $row['id'];?>" class="table__item__link">Editar</a>
            <a href="actualizar.php?id=<?php echo $ropw["id"];?>" class="table__item__link">Eliminar</a>
        <?php} mysqli_free_result($resultado)?>
        <input type="submit" value="Actualizar" class="container_submit container_submit--actualizar">
    </form>
    </section>
    <script src="confirmacion.js"></script>
</body>
</html>