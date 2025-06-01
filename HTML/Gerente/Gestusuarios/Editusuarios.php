<?php
include("../../../bd.php");

$IDselec = $_GET['id'] ?? null;
$usuario = null;

// Cargar lista de usuarios
$usuarios = $conexion->query("SELECT Cedula_Empleado, Nombre FROM empleado");

// Si se seleccionó un ID, cargar los datos del usuario
if ($IDselec) {
    $consulta = $conexion->prepare("SELECT * FROM empleado WHERE Cedula_Empleado = ?");
    $consulta->bind_param("i", $IDselec);
    $consulta->execute();
    $resultado = $consulta->get_result();
    $usuario = $resultado->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="Editusuarios">


        <h2>Editar Usuario</h2>

        <form method="GET" action="">
            <label>Selecciona un Usuario:</label>
            <select name="id" onchange="this.form.submit()">
                <option value=""></option>
                <?php while ($u = $usuarios->fetch_assoc()) { ?>
                    <option value="<?= $u['Cedula_Empleado'] ?>" <?= $u['Cedula_Empleado'] == $IDselec ? 'selected' : '' ?>>
                        <?= $u['Nombre'] ?>
                    </option>
                <?php } ?>
            </select>
        </form>

        <!-- Formulario de edición -->
    <?php if ($usuario): ?>
        <form method="POST" action="procesar_edicion.php">
            <input type="hidden" name="id" value="<?= $usuario['Cedula_Empleado'] ?>">

            Cédula: <input type="text" name="cedula" value="<?= $usuario['Cedula_Empleado'] ?>" required><br>
            Nombre: <input type="text" name="nombre" value="<?= $usuario['Nombre'] ?>" required><br>
            Usuario: <input type="text" name="usuario" value="<?= $usuario['usuarios'] ?>" required><br>
            Correo: <input type="email" name="correo" value="<?= $usuario['Correo_Empleado'] ?>" required><br>
            Teléfono: <input type="text" name="telefono" value="<?= $usuario['Telefono_Empleado'] ?>" required><br>
            Rol:
            <select name="rol">
                <option value="administrador" <?= $usuario['Rol'] == 'administrador' ? 'selected' : '' ?>>Gerente</option>
                <option value="empleado" <?= $usuario['Rol'] == 'empleado' ? 'selected' : '' ?>>Empleado</option>
            </select><br>
            Clave: <input type="password" name="clave" value="<?= $usuario['clave'] ?>" required><br>

        <input class="Btoneditar" type="submit" value="Actualizar Usuario">
        
    </form>
    <?php endif; ?>




    </div>



</body>
</html>