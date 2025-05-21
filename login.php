<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require 'bd.php';

$username = $_POST['usuario'] ?? '';
$password = $_POST['pass'] ?? '';


$sql = "SELECT * FROM empleado WHERE usuarios = ? AND clave = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: /pagina_sena/HTML/Empleado/MENUempleado.php");
    exit();
} else {

    echo "Usuario o contraseña incorrectos.";
    
}


?>