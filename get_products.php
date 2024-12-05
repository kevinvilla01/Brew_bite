<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate'); // No usar caché
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Fecha en el pasado

$host = "localhost";
$port = "5432"; // Puerto por defecto de PostgreSQL
$dbname = "brewbite";
$user = "postgres";
$password = "postgres";

// Crear conexión
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Verificar conexión
if (!$conn) {
    echo json_encode(['error' => 'Error en la conexión: ' . pg_last_error()]);
    exit; // Termina el script
}

// Obtener tipo de producto desde la solicitud
$tipo = isset($_GET['tipo']) ? strtolower($_GET['tipo']) : ''; // Convertir a minúsculas
$tipos_validos = ['cafe', 'postres', 'bocadillos'];

if (!in_array($tipo, $tipos_validos)) {
    echo json_encode(['error' => 'Tipo de producto no válido']);
    exit; // Termina el script
}

// Preparar y ejecutar la consulta
$sql = "SELECT nombre, precio, foto FROM productos WHERE tipo = $1";
$result = pg_query_params($conn, $sql, array($tipo));

if (!$result) {
    echo json_encode(['error' => 'Error en la consulta: ' . pg_last_error($conn)]);
    exit; // Termina el script
}

// Crear un array para almacenar los productos
$productos = [];
while ($row = pg_fetch_assoc($result)) {
    $productos[] = $row;
}

// Devolver los productos en formato JSON
echo json_encode($productos);

// Cerrar conexión
pg_free_result($result);
pg_close($conn);
?>