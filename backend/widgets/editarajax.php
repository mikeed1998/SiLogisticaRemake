<?php

    // Verificar si el método de solicitud es PATCH y decodificar el cuerpo de la solicitud
    if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
        parse_str(file_get_contents("php://input"), $_PATCH);
        $modelo = $_PATCH['modelo'];
        $id = $_PATCH['id'];
        $campo = $_PATCH['field'];
        $valorNuevo = $_PATCH['value'];
    } else {
        // Recibir datos del formulario en caso de ser método POST
        $modelo = $_POST['modelo'];
        $id = $_POST['id'];
        $campo = $_POST['field'];
        $valorNuevo = $_POST['value'];
    }

    // Connect to the database
    // (Replace with your code of connection to the database)
    $db = new PDO('mysql:host=localhost;dbname=db_silogistica', 'root', '');

    // Prepare SQL query
    $sql = "UPDATE `$modelo` SET `$campo` = :value WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':value', $valorNuevo);
    $stmt->bindParam(':id', $id);

    // Execute SQL query
    if ($stmt->execute()) {
        // Send response of success
        echo json_encode(['success' => 'Registro actualizado correctamente']);
    } else {
        // Send response of error
        echo json_encode(['error' => 'Error al actualizar el registro']);
    }