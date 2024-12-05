<?php
// Configuración de la base de datos
$host = 'localhost'; // Cambia esto si es necesario
$db = 'postgres'; // Cambia esto por el nombre de tu base de datos
$user = 'postgres'; // Cambia esto por tu usuario de base de datos
$pass = 'postgres'; // Cambia esto por tu contraseña de base de datos

// Crear conexión
$conn = pg_connect("host=$host dbname=$db user=$user password=$pass");

// Verificar conexión
if (!$conn) {
    die(json_encode(['success' => false, 'message' => 'Error de conexión: ' . pg_last_error()]));
}

// Obtener los datos JSON enviados
$data = json_decode(file_get_contents('php://input'), true);

// Validar los datos
$id_orden = isset($data['orden']) ? intval($data['orden']) : 0;
$num_tarjeta = isset($data['num_tarjeta']) ? pg_escape_string($conn, $data['num_tarjeta']) : '';
$cvv = isset($data['cvv']) ? pg_escape_string($conn, $data['cvv']) : '';
$fecha_expiracion = isset($data['fecha_expiracion']) ? pg_escape_string($conn, $data['fecha_expiracion']) : '';
$total = isset($data['total_orden']) ? intval($data['total_orden']) : 0;

// Verificar que todos los campos requeridos estén presentes
if ($id_orden <= 0 || empty($num_tarjeta) || empty($cvv) || empty($fecha_expiracion) || $total <= 0) {
    echo json_encode(['success' => false, 'message' => 'Datos incompletos o inválidos.']);
    exit;
}

// Preparar la consulta SQL
$sql = "INSERT INTO confirmacion_pago (id_orden, num_tarjeta, cvv, fecha_exp, total, estado) VALUES ($1, $2, $3, $4, $5, 'pendiente')";

// Ejecutar la consulta
$result = pg_query_params($conn, $sql, array($id_orden, $num_tarjeta, $cvv, $fecha_expiracion, $total));

// Verificar si la consulta fue exitosa
if ($result) {
    echo json_encode(['success' => true, 'message' => 'Pago confirmado con éxito.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al confirmar el pago: ' . pg_last_error()]);
}

// Cerrar la conexión
pg_close($conn);
?>