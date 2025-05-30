<?php
include("../../../../bd.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["Cedula"];
    $nombre = $_POST["Nombre"];
    $usuarios = $_POST["usuarios"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $rol = $_POST["rol"];
    $clave = $_POST["clave"];

// Consulta sql para añadir usuarios a la base de datos

    $sql = "INSERT INTO empleado (Cedula_Empleado, Nombre, usuarios, Correo_Empleado, Telefono_Empleado, Rol, clave)
            VALUES ('$cedula', '$nombre', '$usuarios', '$correo', '$telefono', '$rol', '$clave')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: /pagina_sena/HTML/Gerente/Gestusuarios/Addusuarios.php?msg=ok");
        exit;
    } else {
        header("Location: /pagina_sena/HTML/Gerente/Gestusuarios/Addusuarios.php?msg=error");
        exit;
    }

}

?>