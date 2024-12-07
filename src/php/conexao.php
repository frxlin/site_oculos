<?php


$servername = "localhost";
$username = "frx";
$password = "123456";
$dbname = "frx-garage";


$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>