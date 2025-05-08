<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesion</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>

    <h1>Sistema de venta y surtido de telas</h1>
    <form class="sesion" method="POST" action="login.php">
        
        <p class="Usuario">Usuario:</p>
        <input class="sesion_input" type="text" placeholder="Usuario" name="usuario" required><br>
        
        <p class="Contraseña">Contraseña:</p>
        <input class="sesion_input" type="password" placeholder="Contraseña" name="pass" required><br>

        <br>

        <button class="sesion_submit" type="submit">Iniciar sesion</button>

    </form>

</body>
</html>