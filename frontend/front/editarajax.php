<?php
session_start();

// Generar y almacenar el token CSRF en la sesión si no existe
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Conectar a la base de datos
$mysqli = new mysqli("localhost", "root", "", "db_silogistica");

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Verificar el método de la solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar el token CSRF
    if ($_POST['_token'] !== $_SESSION['csrf_token']) {
        echo json_encode(['error' => 'Token CSRF inválido']);
        exit;
    }

    // Obtener los datos de la solicitud
    $model = $mysqli->real_escape_string($_POST['modelo']);
    $id = $mysqli->real_escape_string($_POST['id']);
    $field = $mysqli->real_escape_string($_POST['field']);
    $value = $mysqli->real_escape_string($_POST['value']);

    // Validar que el modelo existe
    $validModels = ['elementos']; // Lista de modelos válidos
    if (!in_array($model, $validModels)) {
        echo json_encode(['error' => 'Modelo no encontrado']);
        exit;
    }

    // Actualizar el registro en la base de datos
    $tableName = strtolower($model); // Suponiendo que el nombre de la tabla es el nombre del modelo en minúsculas
    $query = "UPDATE $tableName SET $field = '$value' WHERE id = $id";

    if ($mysqli->query($query) === TRUE) {
        echo json_encode(['success' => 'Actualizado correctamente']);
    } else {
        echo json_encode(['error' => 'Error al actualizar el registro']);
    }
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>
