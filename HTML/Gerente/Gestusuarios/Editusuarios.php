<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pagina_sena/bd.php';

$id = $_GET["id"];
$result = $conn->query("SELECT * FROM empleados WHERE id = $id");
$empleado = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuarios"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $rol = $_POST["Rol"];

    $sql = "UPDATE empleados SET 
                usuarios='$usuario', 
                correo='$correo', 
                telefono='$telefono',
                Rol='$rol' 
            WHERE id=$id";
    $conn->query($sql);
    header("Location: funcion.php");
}
?>

<h2>Editar Empleado</h2>
<form method="POST">
    Usuario: <input type="text" name="usuarios" value="<?= $empleado['usuarios'] ?>" required><br>
    Correo: <input type="email" name="correo" value="<?= $empleado['correo'] ?>" required><br>
    Teléfono: <input type="text" name="telefono" value="<?= $empleado['telefono'] ?>" required><br>
    Rol: <input type="text" name="Rol" value="<?= $empleado['Rol'] ?>" required><br>
    <input type="submit" value="Actualizar">
</form>