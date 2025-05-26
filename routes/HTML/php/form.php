<?php
    include("cn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Datos</title>
</head>
<body>
    <div>
        <form action="insert.php" method="post">
            <header>
                <h2>Insertar datos</h2>
            </header>
            <div class="form">

                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" required>

                <label for="Apellido">Apellido</label>
                <input type="text" name="apellido" required>

                <label for="email">Email</label>
                <input type="text" name="email" required>

                <label for="contraseña">Contraseña</label>
                <input type="text" name="contraseña" required>
                <input type="submit" value="Insertar">

            </div>
        </form>
    </div>
    <br>
    <br>
    <section class="container.table">
        <div class="titulo">Datos de usuario <br><a href="update.php" class="title_edit">Edicion</a></div>
        <div class="header">Nombre</div>
        <div class="header">Apellido</div>
        <div class="header">Dirección</div>
        <div class="header">Telefono</div>
        <?php $resultado= mysqli_query($conexion, $bd_form);

        while($row= mysqli_fetch_assoc($resultado)){?>
        <div class="table_item"><?php echo $row ["nombre"];?></div>
        <div class="table_item"><?php echo $row ["apellido"];?></div>
        <div class="table_item"><?php echo $row ["dirección"];?></div>
        <div class="table_item"><?php echo $row ["telefono"];?></div>
        <?php} mysqli_free_result($resultado)?>
</body>
</html>
