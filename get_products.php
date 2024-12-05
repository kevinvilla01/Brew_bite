<?php
$host = "localhost";
$port = "5432"; // Puerto por defecto de PostgreSQL
$dbname = "brewbite";
$user = "postgres";
$password = "postgres";

// Crear conexión
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Verificar conexión
if (!$conn) {
    die("Error en la conexión: " . pg_last_error());
}

// Obtener tipo de producto desde la solicitud
$tipo = $_GET['tipo'];

// Preparar y ejecutar la consulta
$sql = "SELECT nombre, precio, imagen FROM productos WHERE tipo = $1";
$result = pg_query_params($conn, $sql, array($tipo));

// Crear un array para almacenar los productos
$productos = [];
while ($row = pg_fetch_assoc($result)) {
    $productos[] = $row;
}

// Devolver los productos en formato JSON
header('Content-Type: application/json');
echo json_encode($productos);

// Cerrar conexión
pg_free_result($result);
pg_close($conn);
?>