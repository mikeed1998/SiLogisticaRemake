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

    if(isset($_POST['form_type']) && $_POST['form_type'] == 'faqs_create') {
        $pregunta = $_POST['pregunta'];
        $respuesta = $_POST['respuesta'];

        $sql = "INSERT INTO faqs(pregunta, respuesta) VALUES (:pregunta, :respuesta)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':pregunta', $pregunta);
        $stmt->bindParam(':respuesta', $respuesta);

        if ($stmt->execute()) {
            $_SESSION['toastr'] = [
                'type' => 'success',
                'message' => 'Pregunta añadida correctamente.'
            ];
        } else {
            $_SESSION['toastr'] = [
                'type' => 'error',
                'message' => 'Error al añadir la pregunta.'
            ];
        }

        header('Location: admin_faqs');
        exit();        
    }

    if(isset($_POST['form_type']) && $_POST['form_type'] == 'faqs_edit') {
        $pregunta = $_POST['pregunta'];
        $respuesta = $_POST['respuesta'];
        $faq_id = $_POST['faq_id'];

        $sql = "UPDATE faqs SET pregunta = :pregunta, respuesta = :respuesta WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':pregunta', $pregunta);
        $stmt->bindParam(':respuesta', $respuesta);
        $stmt->bindParam(':id', $faq_id);

        if ($stmt->execute()) {
            $_SESSION['toastr'] = [
                'type' => 'success',
                'message' => 'Pregunta actualizada correctamente.'
            ];
        } else {
            $_SESSION['toastr'] = [
                'type' => 'error',
                'message' => 'Error al actualizar la pregunta.'
            ];
        }

        header('Location: admin_faqs');
        exit();        
    }

    if (isset($_POST['form_type']) && $_POST['form_type'] == 'faqs_delete') {
        $faq_id = $_POST['faq_id'];
    
        $sql = "DELETE FROM faqs WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $faq_id);
    
        if ($stmt->execute()) {
            $response = [
                'status' => 'success',
                'message' => 'La FAQ ha sido eliminada.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Hubo un problema al eliminar la FAQ.'
            ];
        }
    
        echo json_encode($response);
        exit();
    }
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipo_form_imagen']) && $_POST['tipo_form_imagen'] === 'imagen') {
        if ($_POST['tipo_imagen'] === 'formulario_imagen') {
            try {
                // Obtener el ID de la imagen y el archivo subido
                $id_imagen = intval($_POST['id_imagen']);
                $file = $_FILES['archivo'];
    
                // Verificar si hay un archivo y si no hay errores en la subida
                if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
                    // Obtener los detalles del archivo
                    $fileTmpPath = $file['tmp_name'];
                    $fileName = $file['name'];
                    $fileSize = $file['size'];
                    $fileType = $file['type'];
                    $fileNameCmps = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));
    
                    // Generar un nombre de archivo aleatorio
                    $newFileName = bin2hex(random_bytes(15)) . '.' . $fileExtension;
    
                    // Especificar el directorio donde se guardará el archivo
                    $uploadFileDir = 'public/img/photos/imagenes_estaticas/';
                    $dest_path = $uploadFileDir . $newFileName;
    
                    // Mover el archivo al directorio especificado
                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        // Obtener el nombre del archivo antiguo
                        $query = $conexion->prepare("SELECT imagen FROM elementos WHERE id = :id");
                        $query->bindParam(':id', $id_imagen, PDO::PARAM_INT);
                        $query->execute();
                        $elemento = $query->fetch(PDO::FETCH_ASSOC);
                        $oldFile = $uploadFileDir . $elemento['imagen'];
    
                        // Eliminar el archivo antiguo si existe
                        if (file_exists($oldFile)) {
                            unlink($oldFile);
                        }
    
                        // Actualizar la base de datos con el nuevo nombre de archivo
                        $query = $conexion->prepare("UPDATE elementos SET imagen = :imagen WHERE id = :id");
                        $query->bindParam(':imagen', $newFileName, PDO::PARAM_STR);
                        $query->bindParam(':id', $id_imagen, PDO::PARAM_INT);
                        $query->execute();
    
                        // Redirigir con un mensaje de éxito
                        echo '<script>alert("Imagen guardada exitosamente"); window.location.href="admin_home";</script>';
                    } else {
                        echo '<script>alert("Hubo un error al mover el archivo subido."); window.history.back();</script>';
                    }
                } else {
                    echo '<script>alert("No se subió ningún archivo o hubo un error en la subida."); window.history.back();</script>';
                }
            } catch (Exception $e) {
                echo '<script>alert("Ocurrió un error: ' . $e->getMessage() . '"); window.history.back();</script>';
            }
        } else {
            echo '<script>alert("Tipo de imagen no válido."); window.history.back();</script>';
        }
    }
    // } else {
    //     echo '<script>alert("Solicitud no válida."); window.history.back();</script>';
    // }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_servicios']) && $_POST['form_servicios'] == 'crud_servicios') {
        if ($_POST['servicios_crud'] == 'create_servicio') {
            $titulo = $_POST['servicio_titulo'];
            $descripcion = $_POST['servicio_descripcion'];
            $portada = $_FILES['servicio_portada'];
    
            if (isset($portada) && $portada['error'] === UPLOAD_ERR_OK) {
                $portadaTmpPath = $portada['tmp_name'];
                $portadaName = $portada['name'];
                $portadaSize = $portada['size'];
                $portadaType = $portada['type'];
                $portadaNameCmps = explode(".", $portadaName);
                $portadaExtension = strtolower(end($portadaNameCmps));
    
                // Generar un nombre de archivo aleatorio
                $newFileName = bin2hex(random_bytes(15)) . '.' . $portadaExtension;
    
                // Especificar el directorio donde se guardará el archivo
                $uploadFileDir = 'public/img/photos/servicios/';
                $dest_path = $uploadFileDir . $newFileName;
    
                try {
                    // Mover el archivo al directorio especificado
                    if (move_uploaded_file($portadaTmpPath, $dest_path)) {
                        // Insertar el nuevo servicio en la base de datos
                        $query = $conexion->prepare("INSERT INTO servicios (titulo, descripcion, portada) VALUES (:titulo, :descripcion, :portada)");
                        $query->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                        $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                        $query->bindParam(':portada', $newFileName, PDO::PARAM_STR);
                        $query->execute();
    
                        // Redirigir con un mensaje de éxito
                        echo '<script>alert("Servicio guardado exitosamente"); window.location.href="admin_servicios";</script>';
                    } else {
                        echo '<script>alert("Hubo un error al mover el archivo subido."); window.history.back();</script>';
                    }
                } catch (Exception $e) {
                    echo '<script>alert("Ocurrió un error: ' . $e->getMessage() . '"); window.history.back();</script>';
                }
            } else {
                echo '<script>alert("No se subió ningún archivo o hubo un error en la subida."); window.history.back();</script>';
            }
        } else if ($_POST['servicios_crud'] == 'edit_servicio') {
            $id = intval($_POST['servicio_id']);
            $titulo = $_POST['servicio_titulo'];
            $descripcion = $_POST['servicio_descripcion'];
            $portada = $_FILES['servicio_portada'];
    
            try {
                // Iniciar transacción
                $conexion->beginTransaction();
    
                // Si se ha subido una nueva portada, procesarla
                if (isset($portada) && $portada['error'] === UPLOAD_ERR_OK) {
                    $portadaTmpPath = $portada['tmp_name'];
                    $portadaName = $portada['name'];
                    $portadaSize = $portada['size'];
                    $portadaType = $portada['type'];
                    $portadaNameCmps = explode(".", $portadaName);
                    $portadaExtension = strtolower(end($portadaNameCmps));
    
                    $newFileName = bin2hex(random_bytes(15)) . '.' . $portadaExtension;
                    $uploadFileDir = 'public/img/photos/servicios/';
                    $dest_path = $uploadFileDir . $newFileName;
    
                    // Mover el archivo al directorio especificado
                    if (move_uploaded_file($portadaTmpPath, $dest_path)) {
                        // Obtener la portada antigua
                        $query = $conexion->prepare("SELECT portada FROM servicios WHERE id = :id");
                        $query->bindParam(':id', $id, PDO::PARAM_INT);
                        $query->execute();
                        $servicio = $query->fetch(PDO::FETCH_ASSOC);
    
                        // Eliminar la portada antigua si existe
                        if ($servicio && file_exists($uploadFileDir . $servicio['portada'])) {
                            unlink($uploadFileDir . $servicio['portada']);
                        }
    
                        // Actualizar la base de datos con la nueva portada
                        $query = $conexion->prepare("UPDATE servicios SET portada = :portada WHERE id = :id");
                        $query->bindParam(':portada', $newFileName, PDO::PARAM_STR);
                        $query->bindParam(':id', $id, PDO::PARAM_INT);
                        $query->execute();
                    } else {
                        echo '<script>alert("Hubo un error al mover el archivo subido."); window.history.back();</script>';
                        exit;
                    }
                }
    
                // Actualizar el título y la descripción
                $query = $conexion->prepare("UPDATE servicios SET titulo = :titulo, descripcion = :descripcion WHERE id = :id");
                $query->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
    
                // Confirmar transacción
                $conexion->commit();
    
                // Redirigir con un mensaje de éxito
                echo '<script>alert("Servicio actualizado exitosamente"); window.location.href="admin_servicios";</script>';
            } catch (Exception $e) {
                // Revertir transacción en caso de error
                $conexion->rollBack();
                echo '<script>alert("Ocurrió un error: ' . $e->getMessage() . '"); window.history.back();</script>';
            }
        } else if($_POST['servicios_crud'] == 'delete_servicio') {
            $id = intval($_POST['id_servicio']);
            
            try {
                // Iniciar transacción
                $conexion->beginTransaction();
    
                // Obtener la portada del servicio
                $query = $conexion->prepare("SELECT portada FROM servicios WHERE id = :id");
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
                $servicio = $query->fetch(PDO::FETCH_ASSOC);
    
                if ($servicio) {
                    // Eliminar la portada del servidor
                    $uploadFileDir = 'public/img/photos/servicios/';
                    $filePath = $uploadFileDir . $servicio['portada'];
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
    
                    // Eliminar el servicio de la base de datos
                    $query = $conexion->prepare("DELETE FROM servicios WHERE id = :id");
                    $query->bindParam(':id', $id, PDO::PARAM_INT);
                    $query->execute();
    
                    // Confirmar transacción
                    $conexion->commit();
    
                    // Redirigir con un mensaje de éxito
                    echo '<script>alert("Servicio eliminado exitosamente"); window.location.href="admin_servicios";</script>';
                } else {
                    throw new Exception("Servicio no encontrado");
                }
            } catch (Exception $e) {
                // Revertir transacción en caso de error
                $conexion->rollBack();
                echo '<script>alert("Ocurrió un error: ' . $e->getMessage() . '"); window.history.back();</script>';
            }
        } else if ($_POST['servicios_crud'] == 'toggle_inicio') {
            $id = intval($_POST['id']);
            $valor = intval($_POST['valor']);
    
            try {
                // Actualizar el estado del servicio en la base de datos
                $query = $conexion->prepare("UPDATE servicios SET inicio = :inicio WHERE id = :id");
                $query->bindParam(':inicio', $valor, PDO::PARAM_INT);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
    
                // Verificar si la actualización fue exitosa
                if ($query->rowCount() > 0) {
                    echo json_encode(['success' => true, 'mensaje' => 'Estado del servicio actualizado exitosamente.']);
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'No se encontró el servicio o no se realizó ningún cambio.']);
                }
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'mensaje' => 'Ocurrió un error: ' . $e->getMessage()]);
            }
        }
    } 

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_sliders']) && $_POST['form_sliders'] == 'crud_sliders') {
        if ($_POST['sliders_crud'] == 'create_slider') {
            $slider = $_FILES['imagen'];
    
            if (isset($slider) && $slider['error'] === UPLOAD_ERR_OK) {
                $sliderTmpPath = $slider['tmp_name'];
                $sliderName = $slider['name'];
                $sliderSize = $slider['size'];
                $sliderType = $slider['type'];
                $sliderNameCmps = explode(".", $sliderName);
                $sliderExtension = strtolower(end($sliderNameCmps));
    
                // Generar un nombre de archivo aleatorio
                $newFileName = bin2hex(random_bytes(15)) . '.' . $sliderExtension;
    
                // Especificar el directorio donde se guardará el archivo
                $uploadFileDir = 'public/img/photos/sliders/';
                $dest_path = $uploadFileDir . $newFileName;
    
                try {
                    // Mover el archivo al directorio especificado
                    if (move_uploaded_file($sliderTmpPath, $dest_path)) {
                        // Insertar el nuevo servicio en la base de datos
                        $query = $conexion->prepare("INSERT INTO slider_principals (imagen) VALUES (:imagen)");
                        $query->bindParam(':imagen', $newFileName, PDO::PARAM_STR);
                        $query->execute();
    
                        // Obtener el ID del slider insertado
                        $sliderId = $conexion->lastInsertId();
    
                        // Responder con un mensaje JSON
                        echo json_encode(['status' => 'success', 'message' => 'Imagen agregada exitosamente', 'id' => $sliderId, 'imagen' => $newFileName]);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Hubo un error al mover el archivo subido.']);
                    }
                } catch (Exception $e) {
                    echo json_encode(['status' => 'error', 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No se subió ningún archivo o hubo un error en la subida.']);
            }
        } else if ($_POST['sliders_crud'] == 'delete_slider') {
            $id = intval($_POST['id_slider']);
    
            try {
                $conexion->beginTransaction();
    
                $query = $conexion->prepare("SELECT imagen FROM slider_principals WHERE id = :id");
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
                $slider = $query->fetch(PDO::FETCH_ASSOC);
    
                if ($slider) {
                    $uploadFileDir = 'public/img/photos/sliders/';
                    $filePath = $uploadFileDir . $slider['imagen'];
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
    
                    $query = $conexion->prepare("DELETE FROM slider_principals WHERE id = :id");
                    $query->bindParam(':id', $id, PDO::PARAM_INT);
                    $query->execute();
    
                    $conexion->commit();
    
                    echo json_encode(['status' => 'success', 'message' => 'Slider eliminado exitosamente']);
                } else {
                    throw new Exception("Slider no encontrado");
                }
            } catch (Exception $e) {
                $conexion->rollBack();
                echo json_encode(['status' => 'error', 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
            }
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_empresas']) && $_POST['form_empresas'] == 'crud_empresas') {
        if ($_POST['empresas_crud'] == 'create_empresa') {
            $empresa = $_FILES['imagen'];
    
            if (isset($empresa) && $empresa['error'] === UPLOAD_ERR_OK) {
                $empresaTmpPath = $empresa['tmp_name'];
                $empresaName = $empresa['name'];
                $empresaSize = $empresa['size'];
                $empresaType = $empresa['type'];
                $empresaNameCmps = explode(".", $empresaName);
                $empresaExtension = strtolower(end($empresaNameCmps));
    
                // Generar un nombre de archivo aleatorio
                $newFileName = bin2hex(random_bytes(15)) . '.' . $empresaExtension;
    
                // Especificar el directorio donde se guardará el archivo
                $uploadFileDir = 'public/img/photos/empresas/';
                $dest_path = $uploadFileDir . $newFileName;
    
                try {
                    // Mover el archivo al directorio especificado
                    if (move_uploaded_file($empresaTmpPath, $dest_path)) {
                        // Insertar el nuevo servicio en la base de datos
                        $query = $conexion->prepare("INSERT INTO empresas (imagen) VALUES (:imagen)");
                        $query->bindParam(':imagen', $newFileName, PDO::PARAM_STR);
                        $query->execute();
    
                        // Obtener el ID del slider insertado
                        $empresaId = $conexion->lastInsertId();
    
                        // Responder con un mensaje JSON
                        echo json_encode(['status' => 'success', 'message' => 'Imagen agregada exitosamente', 'id' => $empresaId, 'imagen' => $newFileName]);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Hubo un error al mover el archivo subido.']);
                    }
                } catch (Exception $e) {
                    echo json_encode(['status' => 'error', 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No se subió ningún archivo o hubo un error en la subida.']);
            }
        } else if ($_POST['empresas_crud'] == 'delete_empresa') {
            $id = intval($_POST['id_empresa']);
    
            try {
                $conexion->beginTransaction();
    
                $query = $conexion->prepare("SELECT imagen FROM empresas WHERE id = :id");
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
                $empresa = $query->fetch(PDO::FETCH_ASSOC);
    
                if ($empresa) {
                    $uploadFileDir = 'public/img/photos/empresas/';
                    $filePath = $uploadFileDir . $empresa['imagen'];
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
    
                    $query = $conexion->prepare("DELETE FROM empresas WHERE id = :id");
                    $query->bindParam(':id', $id, PDO::PARAM_INT);
                    $query->execute();
    
                    $conexion->commit();
    
                    echo json_encode(['status' => 'success', 'message' => 'Empresa eliminado exitosamente']);
                } else {
                    throw new Exception("Empresa no encontrado");
                }
            } catch (Exception $e) {
                $conexion->rollBack();
                echo json_encode(['status' => 'error', 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
            }
        }
    }

    // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_empresas']) && $_POST['form_empresas'] == 'crud_empresas') {
    //     if($_POST['empresas_crud'] == 'create_empresa') {
    //         // var_dump('CREATE SLIDER');
    //         $empresa = $_FILES['imagen'];
    
    //         if (isset($empresa) && $empresa['error'] === UPLOAD_ERR_OK) {
    //             $empresaTmpPath = $empresa['tmp_name'];
    //             $empresaName = $empresa['name'];
    //             $empresaSize = $empresa['size'];
    //             $empresaType = $empresa['type'];
    //             $empresaNameCmps = explode(".", $empresaName);
    //             $empresaExtension = strtolower(end($empresaNameCmps));
    
    //             // Generar un nombre de archivo aleatorio
    //             $newFileName = bin2hex(random_bytes(15)) . '.' . $empresaExtension;
    
    //             // Especificar el directorio donde se guardará el archivo
    //             $uploadFileDir = 'public/img/photos/empresas/';
    //             $dest_path = $uploadFileDir . $newFileName;
    
    //             try {
    //                 // Mover el archivo al directorio especificado
    //                 if (move_uploaded_file($empresaTmpPath, $dest_path)) {
    //                     // Insertar el nuevo servicio en la base de datos
    //                     $query = $conexion->prepare("INSERT INTO empresas (imagen) VALUES (:imagen)");
    //                     $query->bindParam(':imagen', $newFileName, PDO::PARAM_STR);
    //                     $query->execute();
    
    //                     // Redirigir con un mensaje de éxito
    //                     echo '<script>alert("Imagen agregada exitosamente"); window.location.href="admin_empresas";</script>';
    //                 } else {
    //                     echo '<script>alert("Hubo un error al mover el archivo subido."); window.history.back();</script>';
    //                 }
    //             } catch (Exception $e) {
    //                 echo '<script>alert("Ocurrió un error: ' . $e->getMessage() . '"); window.history.back();</script>';
    //             }
    //         } else {
    //             echo '<script>alert("No se subió ningún archivo o hubo un error en la subida."); window.history.back();</script>';
    //         }
    //     } else if($_POST['empresas_crud'] == 'delete_empresa') {
    //         // var_dump('DELETE SLIDER');
    //         $id = intval($_POST['id_slider']);
            
    //         try {
    //             $conexion->beginTransaction();
    
    //             $query = $conexion->prepare("SELECT imagen FROM empresas WHERE id = :id");
    //             $query->bindParam(':id', $id, PDO::PARAM_INT);
    //             $query->execute();
    //             $slider = $query->fetch(PDO::FETCH_ASSOC);
    
    //             if ($slider) {
    //                 $uploadFileDir = 'public/img/photos/empresas/';
    //                 $filePath = $uploadFileDir . $slider['imagen'];
    //                 if (file_exists($filePath)) {
    //                     unlink($filePath);
    //                 }
    
    //                 $query = $conexion->prepare("DELETE FROM empresas WHERE id = :id");
    //                 $query->bindParam(':id', $id, PDO::PARAM_INT);
    //                 $query->execute();
    
    //                 $conexion->commit();
    
    //                 echo '<script>alert("Empresa eliminado exitosamente"); window.location.href="admin_empresas";</script>';
    //             } else {
    //                 throw new Exception("Empresa no encontrado");
    //             }
    //         } catch (Exception $e) {
    //             $conexion->rollBack();
    //             echo '<script>alert("Ocurrió un error: ' . $e->getMessage() . '"); window.history.back();</script>';
    //         }
    //     }
    // }


