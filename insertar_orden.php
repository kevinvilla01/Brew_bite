<?php
// Configuración de la conexión a la base de datos
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "postgres"; // Cambia esto por tu contraseña real

// Conectar a la base de datos
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Error en la conexión a la base de datos.']);
    exit;
}

// Obtener los datos enviados por POST
$data = json_decode(file_get_contents('php://input'), true);

// Validar los datos
$nombre = pg_escape_string($data['nombre']);
$correo = pg_escape_string($data['correo']);
$telefono = pg_escape_string($data['telefono']);
$lista_productos = pg_escape_string($data['lista_productos']);
$total = (int)$data['total']; // Asegúrate de que sea un entero
$descripcion_adicional = pg_escape_string($data['descripcion_adicional']);

// Obtener la fecha actual
$fecha = date('Y-m-d');

// Estado por defecto
$estado = 'pendiente';

// Preparar la consulta SQL para insertar la orden
$sql = "INSERT INTO orden (nombre, correo, telefono, lista_productos, total, descripcion_adicional, fecha, estado) 
        VALUES ($1, $2, $3, $4, $5, $6, $7, $8)";

// Ejecutar la consulta
$result = pg_query_params($conn, $sql, array($nombre, $correo, $telefono, $lista_productos, $total, $descripcion_adicional, $fecha, $estado));

if ($result) {
    $row = pg_fetch_assoc($result);
    $id_orden = $row['id_orden'];
    echo json_encode(['success' => true, 'id_orden' => $id_orden]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al insertar la orden: ' . pg_last_error($conn)]);
}

// Cerrar la conexión
pg_close($conn);
?>