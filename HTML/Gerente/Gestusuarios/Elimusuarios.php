<?php

//Verificacion de Rol en la pagina, solo podra acceder al modulo el rol de Gerente

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Gerente') {

    header("Location: /pagina_sena/inicio_sesion.php");
    exit();

}

include("../../../bd.php");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="/pagina_sena/CSS/Gerente/Elimus.css">
</head>
<body>

    <div class="Elimusuario">

    <a href="/pagina_sena/HTML/Gerente/Gestionusuarios.php">
    <button class="Botonatras" type="button">Atras</button><br>
    </a>


    <h2>Eliminar Usuario</h2>
    <br>
    <br>

        <table class="Tabla">


            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>  </th>
            </tr>


            <?php

            $consulta = $conexion->query("SELECT * FROM `empleado` WHERE Rol = 'Empleado'");

            while ($fila = $consulta -> fetch_assoc()) {
                echo "<tr>

                    <td>{$fila['Cedula_Empleado']}</td>
                    <td>{$fila['Nombre']}</td>
                    <td>{$fila['Correo_Empleado']}</td>
                    <td>{$fila['Telefono_Empleado']}</td>
                    <td>

                        <form method='POST' action='Funciones/Eliminar.php'>
                        <input type='hidden' name='Cedula_Empleado' value='{$fila['Cedula_Empleado']}'>
                        <input type='submit' value='Eliminar' class='Elim'>
                        </form>

                    </td>
        
                </tr>";
            }

            ?>

        </table>

    </div>

</body>
</html>
