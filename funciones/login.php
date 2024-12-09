<?php
require '../Conexion/Conexion.php'; 

// Datos del administrador "quemado"
$adminEmail = 'admin@example.com'; // El correo del administrador fijo
$adminPassword = 'admin123'; // La contraseña del administrador fijo

// Validar los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el usuario es el administrador "quemado"
    if ($email === $adminEmail && $password === $adminPassword) {
        session_start();
        $_SESSION['rol'] = 'Administrador';
        $_SESSION['email'] = $adminEmail;
        // Redirige al panel del administrador
        header("Location: ../InicioPagina.html");
        exit();
    }

    // Si no es administrador, buscar en la tabla Registropacientes
    try {
        $userQuery = "SELECT * FROM Registropacientes WHERE email = :email";
        $stmtUser = $conn->prepare($userQuery);
        $stmtUser->bindParam(':email', $email);
        $stmtUser->execute();

        $user = $stmtUser->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['contrasenia']) {  // Comparación directa sin password_verify
            // Inicio de sesión como Usuario
            session_start();
            $_SESSION['rol'] = 'Usuario';
            $_SESSION['email'] = $user['email'];
            $_SESSION['nombre'] = $user['nombre'] . " " . $user['apellido'];
            // Redirige al panel del usuario
            header("Location: ../InicioPagina.html");
            exit();
        } else {
            // Si no se encuentra o la contraseña no es correcta
            echo "Correo o contraseña incorrectos.";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
} else {
    echo "Método no permitido.";
}
?>
