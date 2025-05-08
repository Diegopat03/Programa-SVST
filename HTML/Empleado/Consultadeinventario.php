<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consinventario</title>
    <link rel="stylesheet" href="/CSS/Empleado/Consultainv.css">
</head>
<body>
<?php
require 'bd.php';

$resultados = [];

if (isset($_GET['buscar'])) {
    $buscar = "%" . $_GET['buscar'] . "%";
    $sql = "SELECT * FROM productos WHERE nombre LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $buscar);
    $stmt->execute();
    $resultados = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Inventario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Buscar productos en inventario</h1>
    <form method="GET">
        <input type="text" name="buscar" placeholder="Nombre del producto" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if (!empty($resultados) && $resultados->num_rows > 0): ?>
        <h2>Resultados:</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
            <?php while ($producto = $resultados->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                    <td><?= htmlspecialchars($producto['descripcion']) ?></td>
                    <td><?= $producto['cantidad'] ?></td>
                    <td>$<?= $producto['precio'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php elseif (isset($_GET['buscar'])): ?>
        <p>No se encontraron productos con ese nombre.</p>
    <?php endif; ?>
</body>
</html>
</body>
</html>