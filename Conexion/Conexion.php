<?php
$servername = "localhost";   
$username = "root";          
$password = "";              
$dbname = "db_odontologia"; 

try {
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "¡Conexión exitosa!";
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
