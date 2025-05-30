<?php
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
    <title>ConsOrdenSurtido</title>
    <link rel="stylesheet" href="/pagina_sena/CSS/Empleado/Consultaordensurtido.css">
</head>
<body>

    <div class="ConsultaSurtido">
        <a href="/pagina_sena/HTML/Empleado/MENUempleado.php">
        <button class="Botonatras" type="button">Atras</button>
        </a>

        
        <h2>Hola [usuario]</h2><br>

        <p>Seleccione la orden a surtir:</p>
        

        <table>
            <tr>
                <th>Seleccion</th>
                <th>Orden de surtido:</th>
                <th>Nombre</th>
                <th>id</th>
                <th>Color</th>
                <th>Estampado (Si / No)</th>
                <th>Caracteristica de Estampado</th>
                <th>Cantidad a Surtir (Metros)</th>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>1001</td>
                <td>Piel de durazno</td>
                <td>48541</td>
                <td>Rojo</td>
                <td>No</td>
                <td>No</td>
                <td>100</td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>1002</td>
                <td>Nombre Ejemplo</td>
                <td>17894</td>
                <td>azul</td>
                <td>Si</td>
                <td>bomberos</td>
                <td>200</td>
            </tr>
        </table><br>

        <br>

        <input class="Proceder" type="submit" value="Proceder">

    </div>


</body>
</html>