<?php

    require 'backend/database/conexion.php';

    if(isset($_POST['form_type']) && $_POST['form_type'] == 'politicas') {
        $id = $_POST['politica_id'];
        $descripcion = $_POST['descripcion'];

        $sql = "UPDATE politicas SET descripcion = :descripcion WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            $_SESSION['toastr'] = [
                'type' => 'success',
                'message' => 'Política actualizada correctamente.'
            ];
        } else {
            $_SESSION['toastr'] = [
                'type' => 'error',
                'message' => 'Error al actualizar la política.'
            ];
        }

        header('Location: admin_politicas');
        exit();        
    }

