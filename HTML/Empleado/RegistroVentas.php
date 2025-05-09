<?php

$conexion = new mysqli("localhost", "root","", "svst12");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro_de_Ventas</title>
    <link rel="stylesheet" href="/pagina_sena/CSS/Empleado/RegVentas.css">
</head>
<body>

    <div class="bventa">
        <a href="/pagina_sena/HTML/Empleado/MENUempleado.php">
        <button class="Botonatras" type="button">Atras</button>
        </a>

        <h2>Registro de ventas</h2>
        <br>

        <form action="" method="POST" class="Formventa">

            <p>ID del producto: </p>
            <input type="text" name="ID_producto">
            <p>Nombre de empleado: </p>
            <input type="text" name="Nombre_empleado">
            <p>Nombre de Cliente: </p>
            <input type="text" name="Nombre_cliente">
            <p>Cedula de Cliente: </p>
            <input type="text" name="Cedula_cliente">
            <p>Cantidad del pedido: </p>
            <input type="number" name="Cantidad">
            <br>
            <br>

            <input class="btonventa" type="submit" value="Registrar Venta">


        </form>



    </div>

</body>
</html>