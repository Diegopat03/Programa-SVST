<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Gerente') {

    header("Location: /pagina_sena/inicio_sesion.php");
    exit();

}

include("../../bd.php");

$productos = $conexion ->query("SELECT ID_Tela, Nombre_Tela FROM tela");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Surtido</title>
    <link rel="stylesheet" href="/pagina_sena/CSS/Gerente/Registrosurtido.css">

</head>
<body>

    <div class="Regsurtido">

        <a href="/pagina_sena/HTML/Gerente/MenuGerente.php">
        <button class="Botonatras" type="button">Atras</button>
        </a>

        <form class="Formsurtido" action="Procsurtido.php" method="POST">
            <h2>Registro Orden Surtido</h2>
            

            <p>Productos: </p>
            <br>
            <select class="inputs" name="Producto" id="Producto" required>
                <option value="">Seleccionar--</option>

                <?php while($fila = $productos->fetch_assoc()): ?>
                    <option value="<?= $fila['ID_Tela'] ?>"><?= $fila['Nombre_Tela'] ?></option>
                <?php endwhile; ?>

            </select>

            <p>Cantidad de surtido: </p>
            <br>
            <input type="number" name="cantidad" class="inputs" required>
            <br>

            <p>Observaciones: </p>
            <textarea name="Observaciones" class="inputs"> </textarea>
            <br>
            <br>
            
            <button type="submit" class="Btonsurt">Registrar Surtido</button>

        </form>

    </div>


    
</body>
</html>