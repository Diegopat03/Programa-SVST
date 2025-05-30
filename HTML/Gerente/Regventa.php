<?php


include("../../bd.php");


$IDproducto = $_POST['ID_producto'];
$empleado = $_POST['Nombre_empleado'];
$empleado_id = $_POST['Cedula_Empleado'];
$cliente = $_POST['Nombre_cliente'];
$cedula = $_POST['Cedula_cliente'];
$cantidad = $_POST['Cantidad'];

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

    // Generar ID de pedido único
    $fecha = date("Ymd");
    $random = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 4);
    $numero_pedido = $fecha . $random;

    // Verificar que el ID de pedido no exista
    $verificar_pedido = $conexion->prepare("SELECT ID_Pedido FROM pedido WHERE ID_Pedido = ?");
    $verificar_pedido->bind_param("s", $numero_pedido);
    $verificar_pedido->execute();
    $resultado_pedido = $verificar_pedido->get_result();

    while ($resultado_pedido->num_rows > 0) {
        $random = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 4);
        $numero_pedido = $fecha . $random;
        $verificar_pedido->bind_param("s", $numero_pedido);
        $verificar_pedido->execute();
        $resultado_pedido = $verificar_pedido->get_result();
    }

    // Calcular valor total
    $valor_total = $Precio * $cantidad;

    // Registrar pedido 
    $insertar = $conexion->prepare("INSERT INTO pedido (ID_Tela, Nombre_Tela, Nombre_empleado, Empleado_ID, Nombre_cliente, Cedula_cliente, Cantidad, ID_Pedido, Valor_Pedido) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $insertar->bind_param("isssiisid", $IDproducto, $Nomtela, $empleado, $empleado_id, $cliente, $cedula, $cantidad, $numero_pedido, $valor_total);
    $insertar->execute();

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