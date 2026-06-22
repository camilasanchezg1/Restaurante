<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurante";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Error de conexión a la base de datos"]));
}

// Obtener datos del formulario
$nombre = $_POST["nombre"];
$documento = $_POST["documento"];
$tipo_documento = $_POST["tipo_documento"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$mesa = $_POST["mesa"];
$menu_seleccionado = $_POST["menu_seleccionado"];

// Preparar la consulta SQL
$sql = "INSERT INTO pedidos (nombre, documento, tipo_documento, telefono, email, mesa, menu_seleccionado) 
        VALUES ('$nombre', '$documento', '$tipo_documento', '$telefono', '$email', '$mesa', '$menu_seleccionado')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Error al guardar el pedido"]);
}

$conn->close();
?>
