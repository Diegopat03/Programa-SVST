<?php

// Restriccion de Rol en la pagina, debe de estar logeado para poder acceder al  modulo


session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Empleado') {

    header("Location: /pagina_sena/inicio_sesion.php");
    exit();
    
}


include("../../bd.php");


$tela = $conexion->query("SELECT ID_Tela, Nombre_Tela FROM tela");
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

        <form action="Regventa.php" method="POST" class="Formventa">

            <p>Seleccionar la tela:</p>


            <select name="ID_producto" class="inputs" required>

                <option value=""></option>
                <?php while ($fila = $tela->fetch_assoc()): ?>
                    <option value="<?= $fila['ID_Tela'] ?>">
                        <?= $fila['ID_Tela'] ?>-<?= $fila['Nombre_Tela'] ?>
                    </option>
                <?php endwhile; ?>

            </select>


            <p>Nombre de empleado: </p>
            <input type="text" name="Nombre_empleado" class="inputs">
            <p>Cedula Empleado: </p>
            <input type="number" name="Cedula_Empleado" class="inputs">
            <p>Nombre de Cliente: </p>
            <input type="text" name="Nombre_cliente" class="inputs">
            <p>Cedula de Cliente: </p>
            <input type="text" name="Cedula_cliente" class="inputs" >
            <p>Cantidad del pedido: </p>
            <input type="number" name="Cantidad" class="inputs">
            <br>
            <br>

            <input class="btonventa" type="submit" value="Registrar Venta">

            <br>
            <br><br>




            <?php if (isset($_GET['mensaje'])): ?>
            <div class="Confirmacion">
                <?= htmlspecialchars($_GET['mensaje']) ?>
            </div>
            <?php endif; ?>






        </form>

    </div>

</body>
</html>