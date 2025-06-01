<?php
include("../../../bd.php");

$id = $_POST['id'];
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$rol = $_POST['rol'];
$clave = $_POST['clave']; // Recuerda que en producción deberías cifrar la clave

$actualizar = $conexion->prepare("UPDATE empleado SET Cedula_Empleado = ?, Nombre = ?, usuarios = ?, Correo_Empleado = ?, Telefono_Empleado = ?, Rol = ?, clave = ? WHERE Cedula_Empleado = ?");
$actualizar->bind_param("issssssi", $cedula, $nombre, $usuario, $correo, $telefono, $rol, $clave, $id);

if ($actualizar->execute()) {
    header("Location: /pagina_sena/HTML/Gerente/Gestusuarios/Editusuarios.php?mensaje=Usuario actualizado correctamente&id=$id");
} else {
    echo "Error al actualizar el usuario";
}
?>