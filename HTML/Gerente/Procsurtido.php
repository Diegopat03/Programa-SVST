<?php
include("../../bd.php");

$Tela = $_POST['Producto']; 
$Cantidad = $_POST['cantidad'];  
$Observaciones = $_POST['Observaciones']; 

// Obtener el nombre de la tela
$stmt = $conexion->prepare("SELECT Nombre_Tela FROM tela WHERE ID_Tela = ?");
$stmt->bind_param("i", $Tela);
$stmt->execute();
$stmt->bind_result($nombre_tela);
$stmt->fetch();
$stmt->close();

// Fecha actual
$fecha = date("Y-m-d H:i:s");

// Insertar en la tabla surtido sin la cédula del empleado
$insert = $conexion->prepare("INSERT INTO surtido (ID_Tela, Nombre_Tela, Cantidad, Fecha, Observaciones) VALUES (?, ?, ?, ?, ?)");
$insert->bind_param("isiss", $Tela, $nombre_tela, $Cantidad, $fecha, $Observaciones);
$insert->execute();
$insert->close();

// Redireccionar
header("Location: Registrosurtido.php?mensaje=Surtido registrado correctamente");
exit;
?>