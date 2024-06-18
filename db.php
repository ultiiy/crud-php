<!-- 
CREATE DATABASE id22328874_bancocrudphp;
USE id22328874_bancocrudphp;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    age INT NOT NULL
);

-->

<?php
$servername = "localhost";
$username = "id22328874_bancocrudphp";
$password = "crudPHP@2";
$dbname = "id22328874_bancocrudphp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Erro ao conectar no banco de dados: " . $conn->connect_error);
}
?>
