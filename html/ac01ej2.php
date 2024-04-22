<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<?php
// Función para validar el usuario y la contraseña
function validar_credenciales($usuario, $contrasena) {
    // Verificar si el usuario y la contraseña son válidos según el criterio dado
    if ($contrasena == "D153n0W3b2" && ($usuario == "juan" || $usuario == "pedro" || $usuario == "maria" || $usuario == "raul")) {
        return true; // Credenciales válidas
    } else {
        return false; // Credenciales inválidas
    }
}

// Obtener los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = strtolower($_POST["usuario"]);
    $contrasena = $_POST["contrasena"];
    
    // Validar las credenciales
    if (validar_credenciales($usuario, $contrasena)) {
        echo "<p>Bienvenido, $usuario!</p>";
    } else {
        echo "<p>Usuario o contraseña incorrectos. Inténtalo de nuevo.</p>";
    }
}
?>
<h1>Login</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br><br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br><br>
    <input type="submit" value="Iniciar sesión">
</form>

</body>
</html>
