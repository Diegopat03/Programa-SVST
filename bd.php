<?php

$host = "localhost";
$usuario = "root"; 
$contrasena = "";
$bd = "svst12";

$conexion = new mysqli($host, $usuario, $contrasena, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>