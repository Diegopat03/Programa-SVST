<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require 'bd.php';

$username = $_POST['usuario'] ?? '';
$password = $_POST['pass'] ?? '';


$sql = "SELECT * FROM empleado WHERE usuarios = ? AND clave = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();

    // Guardar usuario y rol en sesión
    $_SESSION['usuario'] = $usuario['usuarios'];
    $_SESSION['rol'] = $usuario['Rol'];

    // LOGIN Rol
    if ($usuario['Rol'] === 'Gerente') {
        header("Location: /pagina_sena/HTML/Gerente/Menugerente.php");
    } elseif ($usuario['Rol'] === 'Empleado') {
        header("Location: /pagina_sena/HTML/Empleado/MENUempleado.php");
    } else {
        echo "Rol no reconocido.";
    }
    exit();
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>