<?php

$host = "sql108.infinityfree.com";
$usuario = "if0_39085983"; 
$contrasena = "8ao9HhOoEOS";
$bd = "if0_39085983_svst";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>