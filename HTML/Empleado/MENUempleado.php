<?php

// Restriccion de Rol en la pagina, debe de estar logeado para poder acceder al  modulo

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Empleado') {

    header("Location: /pagina_sena/inicio_sesion.php");
    exit();
    
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Empleado</title>
    <link rel="stylesheet" href="/pagina_sena/CSS/Empleado/menuempleado1.css">
    
</head>
<body>

    <a class="cerrarses" href="/pagina_sena/inicio_sesion.php">Cerrar Sesion</a>

    <h1>Hola que deseas hacer?</h1>

    <a href="/pagina_sena/HTML/Empleado/RegistroVentas.php">
    <button class="botonemp"  type="button">Registro de Ventas</button><br>
    </a>

    <a href="/pagina_sena/HTML/Empleado/Consultadeinventario.php">
    <button class="botonemp" type="button">Consulta de inventario</button><br>
    </a>

    <a href="/pagina_sena/HTML/Empleado/ConsultaordenSurtido.php">
    <Button class="botonemp" type="button">Orden de surtido</Button><br>
    </a>


</body>
</html>