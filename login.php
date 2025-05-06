<?php
session_start();
$conn = new mysqli("localhost", "root", "", "login_db");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$usuario = $_POST['nombre_usuario'];
$clave = $_POST['contraseña'];

$query = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($clave, $user['contraseña_hash'])) {
        $_SESSION['usuario'] = $user['nombre_usuario'];
        echo "Inicio de sesión exitoso.";
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}
?>