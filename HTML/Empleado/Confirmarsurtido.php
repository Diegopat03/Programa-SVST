<?php
include("../../bd.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ID_Surtido'])) {
    $ID_Surtido = (int)$_POST['ID_Surtido'];

    // Actualizar el estado de confirmación
    $confirmar = $conexion->prepare("UPDATE surtido SET Confirmado = 1 WHERE ID_Surtido = ?");
    $confirmar->bind_param("i", $ID_Surtido);
    $confirmar->execute();

    header("Location: ConsultaordenSurtido.php");
    exit;
}
?>