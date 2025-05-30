<?php

include("../../../../bd.php");

// Si se preciona el boton de acuerdo a la fila correspondiente eliminara al usuario con el mismo ID

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Cedula_Empleado'])) {
    $cedula = $_POST['Cedula_Empleado'];

    $stmt = $conexion->prepare("DELETE FROM empleado WHERE Cedula_Empleado = ?");
    $stmt->bind_param("s", $cedula);

    if ($stmt->execute()) {
        header("Location: ../Elimusuarios.php");
        exit();
    } else {
        echo "Error al eliminar el usuario: " . $stmt->error;
    }

    $stmt->close();
}
?>