
<?php

$conexion = new mysqli("localhost", "root","", "svst12");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$resultados = [];

if (isset($_GET['Consultar'])) {
    $busqueda = $conexion->real_escape_string($_GET['Consultar']);

    $sql = "SELECT * FROM tela WHERE Nombre_Tela LIKE '%$busqueda%'";
    $res = $conexion->query($sql);

    if ($res && $res->num_rows > 0) {
        while ($fila = $res->fetch_assoc()) {
            $resultados[] = $fila;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consinventario</title>
    <link rel="stylesheet" href="/pagina_sena/CSS/Empleado/Consultainv.css">
</head>
<body>

    <div class="Consultainventario">

        <a href="/pagina_sena/HTML/Empleado/MENUempleado.php">
        <button class="Botonatras" type="button">Atras</button>
        </a>

        <h2>Que tela busca?</h2>

        <form class="Buscador" method="GET" action="">
            <input type="text" class="Consulta" name="Consultar" placeholder="Tela a buscar" value="<?= htmlspecialchars($_GET['Consultar'] ?? '') ?>">
            <input type="submit" class="Btnbuscar" value="Buscar">
        </form>

        <br>
        <br>

        <?php if (!empty($resultados)): ?>
        <div class="Lista">
            <?php foreach ($resultados as $tela): ?>
                <div class="Tela">
                        <p> <?= htmlspecialchars($tela['Nombre_Tela']) ?> <br> </p>
                        <p> <strong>Color:</strong> <?= htmlspecialchars($tela['Color']) ?> <br> </p>
                        <p> <strong>Caracteristica: </strong> <?=htmlspecialchars($tela['Caracteristica']) ?> <br> </p>
                        <p> <strong>Cantidad:</strong> <?= htmlspecialchars($tela['Cantidad_Tela']) ?> Metros<br> </p>
                        <p> <strong>Precio:</strong>$<?= htmlspecialchars($tela['Precio']) ?> <br> </p>
                </div>
            <?php endforeach; ?>
        </div>
        <br>
        <br>
        <?php elseif (isset($_GET['Consultar'])): ?>
            <p class="error">No se encontraron productos.</p>
        <?php endif; ?>

    </div>

</body>
</html>