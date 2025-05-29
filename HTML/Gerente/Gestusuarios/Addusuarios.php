<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pagina_sena/bd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuarios"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $rol = $_POST["Rol"];
    $clave = password_hash($_POST["clave"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO empleado (usuarios, Correo_Empleado, Telefono_Empleado, Rol, clave) 
            VALUES ('$usuario', '$correo', '$telefono', '$rol', '$clave')";
    $conn->query($sql);
    header("Location: funcion.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir usuarios</title>
    <link rel="stylesheet" href="/pagina_sena/CSS/Gerente/addus.css">
</head>
<body>
    

<div class="addusuario">

    <a href="/pagina_sena/HTML/Gerente/Gestionusuarios.php">
        <button class="Botonatras" type="button">Atras</button>
        </a>

    <h2>Agregar Empleado</h2>
    <form method="POST" class="Formadd" action="/pagina_sena/HTML/Gerente/Gestusuarios/Funciones/Add.php">

        <p>Cedula:</p> 
        <input type="int" name="Cedula" class="inputs" required><br>

        <p>Nombre:</p> 
        <input type="text" name="Nombre" class="inputs" required> <br>

        <p>Usuario:</p> 
        <input type="text" name="usuarios" class="inputs" required><br>

        <p>Correo:</p> 
        <input type="email" name="correo" class="inputs" required><br>

        <p>Teléfono:</p> 
        <input type="int" name="telefono" class="inputs" required><br>

        <p>Rol:</p>
            <select name="rol" class="inputs" required>
                <option value=""></option>
                <option value="Empleado">Empleado</option>
                <option value="Gerente">Gerente</option>
            </select><br>

        <p>Contraseña:</p>
        <input type="password" name="clave" class="inputs" required><br>

        <br>

        <input type="submit" value="Guardar" class="btonguardar">

        <?php

        if (isset($_GET['mensaje'])) {
            if ($_GET['mensaje'] == 'ok') {
                echo "Usuario agregado correctamente.";
            } elseif ($_GET['mensaje'] == 'error') {
                echo "Hubo un error al agregar el usuario.";
            }
        }

        ?>

    </form>

</div>


</body>
</html>
