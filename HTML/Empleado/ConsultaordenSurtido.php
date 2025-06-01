<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Empleado') {
    header("Location: /pagina_sena/inicio_sesion.php");
    exit();
}

include("../../bd.php");

// Consultar surtidos no confirmados
$consulta = $conexion->prepare("SELECT ID_Surtido, ID_Tela, Nombre_Tela, Cantidad, Fecha, Cedula_Empleado, Observaciones, Confirmado FROM surtido WHERE Confirmado = 0");
$consulta->execute();
$resultado = $consulta->get_result();
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



    <h2>Órdenes de Surtido</h2>
    <br>
    <br>
    <table class="Tabla">
        <thead>
            <tr>
                <th>ID Surtido</th>
                <th>Tela</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Observaciones</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($fila['ID_Surtido']) ?></td>
                <td><?= htmlspecialchars($fila['ID_Tela'] . ' - ' . $fila['Nombre_Tela']) ?></td>
                <td><?= htmlspecialchars($fila['Cantidad']) ?></td>
                <td><?= htmlspecialchars($fila['Fecha']) ?></td>
                <td><?= htmlspecialchars($fila['Observaciones']) ?></td>
                <td>
                    <form method="POST" action="Confirmarsurtido.php">
                        <input type="hidden" name="ID_Surtido" value="<?= $fila['ID_Surtido'] ?>">
                        <input type="submit" value="Completar">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
