<?php
require '../Conexion/Conexion.php'; // Incluye el archivo de conexión que contiene la variable $conn

// Validar que los datos lleguen desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['fullName'];
    $apellido = $_POST['lastName'];
    $fechaNacimiento = $_POST['birthDate'];
    $email = $_POST['email'];
    $direccion = $_POST['address'];
    $contrasenia = $_POST['password'];
    $confirmContrasenia = $_POST['confirmPassword'];

    // Validar que las contraseñas coincidan
    if ($contrasenia !== $confirmContrasenia) {
        die("Error: Las contraseñas no coinciden.");
    }

    // Encriptar la contraseña
   //$hashContrasenia = password_hash($contrasenia, PASSWORD_BCRYPT);

    // Insertar datos en la tabla pacientes
    try {
        $query = "INSERT INTO Registropacientes (nombre, apellido, fechanacimiento, email, direccion, contrasenia) 
                  VALUES (:nombre, :apellido, :fechaNacimiento, :email, :direccion, :contrasenia)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':contrasenia', $contrasenia);

        $stmt->execute();
        echo "Paciente registrado exitosamente.";
    } catch (PDOException $e) {
        echo "Error al registrar paciente: " . $e->getMessage();
    }
} else {
    echo "Acceso no permitido.";
}
?>
<?php

?>
