<?php

    $identificador = (isset($_GET['identificador'])) ? $_GET['identificador'] : 0;
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'silogisticaguerrero';
    $id = (isset($_GET['id'])) ? $_GET['id'] : 0; // Asegurarse de obtener el ID del servicio

    global $title;
    
    $title = 'silogisticaguerrero - ' . ucfirst($pagina);

    require 'backend/database/conexion.php';

    switch($identificador) 
    {
        case 2:
            include 'frontend/front/layout.php';
            include 'frontend/front/nosotros.php';
            break;
        case 3:
            include 'frontend/front/layout.php';
            include 'frontend/front/contacto.php';
            break;
        case 4:
            include 'frontend/front/layout.php';
            include 'frontend/front/tienda.php';
            break;
        case 5:
            $producto = 'pez';
            include 'frontend/front/layout.php';
            include 'frontend/front/producto.php';
            break;
        case 6:
            include 'frontend/front/layout.php';
            include 'frontend/front/servicios.php';
        break;
        case 7:
            include 'frontend/front/layout.php';

            try {
                $query = "SELECT * FROM servicios WHERE id = :id";
                $stmt = $conexion->prepare($query);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $servicio = $stmt->fetch(PDO::FETCH_ASSOC);
                    include 'frontend/front/servicio_detalle.php';
                } else {
                    echo "<p>Servicio no encontrado.</p>";
                }
            } catch (PDOException $e) {
                echo 'Error en la consulta: ' . $e->getMessage();
            }
        break;
        case 50:
            include 'frontend/front/layout.php';
            include 'frontend/user/login.php';
        break;
        case 51:
            include 'frontend/front/layout.php';
            include 'frontend/user/signup.php';
        break;
        case 52:
            include 'frontend/front/layout.php';
            include 'frontend/user/logout.php';
        break;
        case 53:
            include 'frontend/front/layout.php';
            include 'frontend/user/dashboard.php';
        break;
        case 100:
            include 'frontend/front/layout.php';
            include 'frontend/front/proxy.php';
        break;
        case 101:
            include 'backend/widgets/editarajax.php';
        break;
        case 102:
            include 'frontend/front/mail.php';
        break;
        case 103:
            include 'frontend/front/layout.php';
            include 'frontend/front/politicas/aviso_privacidad.php';
        break;
        case 104:
            include 'frontend/front/layout.php';
            include 'frontend/front/politicas/metodos_pago.php';
        break;
        case 105:
            include 'frontend/front/layout.php';
            include 'frontend/front/politicas/devoluciones.php';
        break;
        case 106:
            include 'frontend/front/layout.php';
            include 'frontend/front/politicas/terminos_condiciones.php';
        break;
        case 107:
            include 'frontend/front/layout.php';
            include 'frontend/front/politicas/garantias.php';
        break;
        case 108:
            include 'frontend/front/layout.php';
            include 'frontend/front/politicas/politicas_envio.php';
        break;
        case 200:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/index.php';
        break;
        case 201:
            // include 'frontend/admin/layout.php';
            include 'frontend/admin/access/login.php';
        break;
        case 202:
            // include 'frontend/admin/layout.php';
            include 'frontend/admin/access/logout.php';
        break;
        case 203:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/access/check_admin.php';
        break;
        case 204:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/configuracion.php';
        break;
        case 205:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/politicas.php';
        break;
        case 206:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/faqs.php';
        break;
        case 207:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/home.php';
        break;
        case 208:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/nosotros.php';
        break;
        case 209:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/contacto.php';
        break;
        case 210:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/servicios.php';
        break;
        case 211:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/servicios/create.php';
        break;
        case 212:
            include 'frontend/admin/layout.php';
            try {
                $query = "SELECT * FROM servicios WHERE id = :id";
                $stmt = $conexion->prepare($query);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $servicio = $stmt->fetch(PDO::FETCH_ASSOC);
                    include 'frontend/admin/servicios/edit.php';
                } else {
                    echo "<p>Servicio no encontrado.</p>";
                }
            } catch (PDOException $e) {
                echo 'Error en la consulta: ' . $e->getMessage();
            }
        break;
        case 213:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/sliders.php';
        break;
        case 214:
            include 'frontend/admin/layout.php';
            include 'frontend/admin/empresas.php';
        break;
        case 215:
            include 'backend/logic/logica.php';
        break;
        default:
            include 'frontend/front/layout.php';
            include 'frontend/front/home.php';
            break;
    };


