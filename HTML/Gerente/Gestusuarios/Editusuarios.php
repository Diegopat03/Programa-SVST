<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pagina_sena/bd.php';

$id = $_GET["id"];
$result = $conn->query("SELECT * FROM empleados WHERE id = $id");
$empleado = $result->fetch_assoc();

