<?php

//Verificacion de Rol en la pagina, solo podra acceder al modulo el rol de Gerente


session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Gerente') {

    header("Location: /pagina_sena/inicio_sesion.php");
    exit();

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Gerente
    </title>
    <link rel="stylesheet" href="/pagina_sena/CSS/Gerente/menugerente.css">
</head>
<body>

    <a class="cerrarses" href="/pagina_sena/inicio_sesion.php">Cerrar Sesion</a>

    <h1>Hola, que deseas hacer?</h1>


    <a href="/pagina_sena/HTML/Gerente/Gestionusuarios.php">
    <button class="botonemp"  type="button">Gestionar Usuarios</button><br>
    </a>

    <a href="/pagina_sena/HTML/Gerente/Consultadeinventario.php">
    <button class="botonemp" type="button">Consulta Inventario</button><br>
    </a>

    <a href="/pagina_sena/HTML/Gerente/Registrosurtido.php">
    <button class="botonemp" type="button">Registro Orden Surtido</button><br>
    </a>


    <a href="/pagina_sena/HTML/Gerente/RegistroVentas.php">
    <Button class="botonemp" type="button">Registro de Venta</Button><br>
    </a>

</body>
</html>