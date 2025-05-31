<?php

// Conexion con Base de datos
include("../../bd.php");

$IDproducto   = $_POST['ID_producto'];
$empleado     = $_POST['Nombre_empleado'];
$empleado_id  = $_POST['Cedula_Empleado'];
$cliente      = $_POST['Nombre_cliente'];
$cedula       = $_POST['Cedula_cliente'];
$cantidad     = $_POST['Cantidad'];

// Verificar stock y obtener nombre y precio
$consultainv = $conexion->prepare("SELECT Cantidad_Tela, Nombre_Tela, Precio FROM tela WHERE ID_Tela = ?");
$consultainv->bind_param("i", $IDproducto);
$consultainv->execute();
$consultainv->bind_result($stock_actual, $Nomtela, $Precio);
$consultainv->fetch();
$consultainv->close();

if ($stock_actual === null) {
    echo "Producto no encontrado.";
} elseif ($stock_actual < $cantidad) {
    echo "No hay suficiente stock disponible.";
} else {

    // Insertar cliente si no existe
    $vercliente = $conexion->prepare("SELECT Cedula_Cliente FROM cliente WHERE Cedula_Cliente = ?");
    $vercliente->bind_param("i", $cedula);
    $vercliente->execute();
    $resultado = $vercliente->get_result();

    if ($resultado->num_rows === 0) {
        $insertar_cliente = $conexion->prepare("INSERT INTO cliente (Cedula_Cliente, Nombre_Cliente) VALUES (?, ?)");
        $insertar_cliente->bind_param("is", $cedula, $cliente);
        $insertar_cliente->execute();
    }

    // Verificar si el empleado existe
    $verempleado = $conexion->prepare("SELECT Cedula_Empleado FROM empleado WHERE Cedula_Empleado = ?");
    $verempleado->bind_param("i", $empleado_id);
    $verempleado->execute();
    $resultado_empleado = $verempleado->get_result();

    if ($resultado_empleado->num_rows === 0) {
        echo "El empleado no está registrado.";
        exit;
    }

    // Calcular valor total
    $valor_total = $Precio * $cantidad;

    // Insertar pedido 
    $insertar = $conexion->prepare("INSERT INTO pedido (ID_Tela, Nombre_Tela, Nombre_empleado, Empleado_ID, Nombre_cliente, Cedula_cliente, Cantidad, Valor_Pedido)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $insertar->bind_param("isssiisd", $IDproducto, $Nomtela, $empleado, $empleado_id, $cliente, $cedula, $cantidad, $valor_total);
    $insertar->execute();

    // Obtener el ID del pedido generado automáticamente
    $numero_pedido = $conexion->insert_id;

    // Actualizar inventario
    $nueva_cantidad = $stock_actual - $cantidad;
    $actinv = $conexion->prepare("UPDATE tela SET Cantidad_Tela = ? WHERE ID_Tela = ?");
    $actinv->bind_param("ii", $nueva_cantidad, $IDproducto);
    $actinv->execute();

    $mensaje = "Venta registrada con éxito. Pedido: $numero_pedido. Valor total: $$valor_total";
    header("Location: RegistroVentas.php?mensaje=" . urlencode($mensaje));
    exit;
}

$conexion->close();
?>
