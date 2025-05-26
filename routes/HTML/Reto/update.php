<?php
include("conexion.php");
$bd_libros="SELECT * FROM bd_libros";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Panel de edicion</title>
</head>
<body>
<header>
<nav>
            <div class="menu" id="_items">
                <div class="nav_logo"> <img class="logo" src="EXIDES.png"></div>
                <div class="nav_items">
                <a href="/HTML/index.html">Inicio</a>
                    <a href="/WebRet/sobre nosotros.html">Sobre nosotros</a>
                    <a href="/catalogo/index.html">Tienda</a>          
                    <a href="/WebRet/contact.html">Contactanos</a> 
                </div>
            </div>
            <div class="hamburguesa" id="_hamburguesa">
                <span></span>
                <span></span>
                <span></span>
            </div>
            </nav>
            <section class="textoheader">
                <h1>Mercado de Libros</h1>
                <h4>Lee, Aprende y Crece<br>¡Logra o Registra nuevos libros!</h4>
            </section>
            <div class="wave"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-0.00,49.85 C150.00,149.60 337.13,-58.56 500.00,49.85 L500.00,149.60 L-0.00,149.60 Z" style="stroke: none; fill: #f2e6a0;"></path></svg></div>
</header>
    <section class="container-table container-table--edit">
        <div class="titulo titulo--edit">Datos de usuario <br><a href="index.php" class="title_edit">Atras</a></div>
        <div class="header">Nombre</div>
        <div class="header">Genero</div>
        <div class="header">Precio</div>
        <div class="header">Alquier</div>
        <div class="header">Num_Ejemplares</div>
        <div class="header">Operaciones</div>
        <?php $resultado = mysqli_query($conexion, $bd_libros);
        
        while($row=mysqli_fetch_assoc($resultado)) {?>
        <div class="table_item"><?php echo $row["Nombre"];?></div>
        <div class="table_item"><?php echo $row["Genero"];?></div>
        <div class="table_item"><?php echo $row["Precio"];?></div>
        <div class="table_item"><?php echo $row["Alquiler"];?></div>
        <div class="table_item"><?php echo $row["Num_Ejemplares"];?></div>
        <div class="table_item">
            <a href="actualizar.php?id=<?php echo $row["Id_libro"];?>" class="table__item__link">Editar</a> |
            <a href="delete.php?id=<?php echo $row["Id_libro"];?>" class="table__item__link">Eliminar</a>
        </div>
        <?php } mysqli_free_result($resultado)?>
    </section>
    <br>
                <footer>
                    <div class="contenedor-footer">
                        <div class="contenido-footer">
                            <h4>Phone</h4>
                            <p>+34 944 88 66 22</p>
                        </div>
                        <div class="contenido-footer">
                            <h4>Email</h4>
                            <p>contacto@exides.com</p>
                        </div>
                        <div class="contenido-footer">
                            <h4>Ubicación</h4>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d726.0186994556553!2d-2.994772491448044!3d43.29175526049773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e5a75bda62159%3A0x1002c9fcee8038fb!2sVideoclub%20Iris!5e0!3m2!1ses!2ses!4v1700077650993!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                
                    </div>
                    <h2 class="texto-final">&copy; EXIDES | Jon Gutierrez</h2>
                </footer>   
    <script src="confirmacion.js"></script>
</body>
</html>