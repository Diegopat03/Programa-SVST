<?php
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
    <title>Gestionar Usuarios
    </title>
    <link rel="stylesheet" href="/pagina_sena/CSS/Gerente/Gestionusuarios.css">
</head>
<body>

    <div class="Gestionusuario">

    <a href="/pagina_sena/HTML/Gerente/MenuGerente.php">
    <button class="Botonatras" type="button">Atras</button><br>
    </a>

    <h1>gestion de usuarios</h1><br>

    <a href="/pagina_sena/HTML/Gerente/Gestusuarios/Addusuarios.php">
    <button class="BotonGer" type="button">AÑADIR USUARIO</button><br>
    </a>

    <a href="/pagina_sena/HTML/Gerente/Gestusuarios/Editusuarios.php">
    <button class="BotonGer" type="button">EDITAR USUARIO</button><br>
    </a>


    <a href="/pagina_sena/HTML/Gerente/Gestusuarios/Elimusuarios.php">
    <button class="BotonGer" type="button">ELIMINAR USUARIO</button><br>
    </a>

    </div>
</body>
</html>