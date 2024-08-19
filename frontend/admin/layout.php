<?php

// Incluye la lógica de autenticación aquí para asegurar que solo los administradores accedan.
require 'access/check_admin.php';

// Obtener el contenido dinámico basado en el identificador
$contenidoADMIN = '';
if (isset($identificador)) {
    switch ($identificador) {
        case 204:
            $contenidoADMIN = 'configuracion';
            break;
        case 205:
            $contenidoADMIN = 'politicas';
            break;
        case 206:
            $contenidoADMIN = 'faqs';
            break;
        case 207:
            $contenidoADMIN = 'home';
            break;
        case 208:
            $contenidoADMIN = 'nosotros';
            break;
        case 209:
            $contenidoADMIN = 'contacto';
            break;
        case 210:
            $contenidoADMIN = 'servicios';
            break;
        case 211:
            $contenidoADMIN = 'sliders';
            break;
        case 212:
            $contenidoADMIN = 'empresas';
            break;
        // Agrega otros casos aquí
        default:
            $contenidoADMIN = '404'; // Página no encontrada
            break;
    }
} else {
    $contenidoADMIN = 'index'; // Página por defecto
}

$headerADMIN = '
    <header>
        <style>
            .black-skin .navbar.double-nav a {
                color: #222;
            }
            .link-sider-admin {
                text-decoration: none;
                color: #FFFFFF;
            }
            .link-sider-admin:hover {
                text-decoration: underline;
                color: #FFFFFF;
            }
        </style>
        <style>
        @font-face {
            font-family: \'Neusharp Bold\';
            font-style: normal;
            font-weight: normal;
            src: local(\'Neusharp Bold\'), url(\'fonts/Neusharp-Bold/NeusharpBold-7B8RV.woff\') format(\'woff\');
        }

        body {
            background-color: #e5e8eb  !important;
        }

        .card-header { background-color: #b0c1d1  !important; }

        .black-skin
        .btn-primary { background-color: #b0c1d1  !important; }

        .btn {
            box-shadow: none;
            border-radius: 15px;
        }

        .card1:hover{
            background: rgb(28, 115, 255);
            color: white;
            transition: all 0.5s;
        }

        .card1:hover .icon_c{
            color: white;
            transition: all 0.5s;
        }
    </style>
        <nav class="navbar py-2 row fixed-top navbar-expand-lg scrolling-navbar mx-3 mt-1" style="box-shadow: none; background: black; color: #222; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.291); border-radius: 16px; height: 50px;">
            <div class="row px-5">
                <div class="col-md-6 col-12 text-white text-start">
                    Administrador - SiLogisticaGuerrero
                </div>
                <div class="col-md-6 col-12 text-white text-end">
                    <a class="dropdown-item" href="adminlogout" onclick="event.preventDefault(); document.getElementById(\'logout-form\').submit();">
                        <i class="bi bi-escape"></i> Salir del administrador
                    </a>
                    <form id="logout-form" action="adminlogout" method="POST" style="display: none;">
                    </form>
                </div>
            </div>
        </nav>
    </header>
';

$sidebarADMIN = '
    <div class="row sidebar">
        <div class="col-10 mx-auto" style="background: black; border-radius: 16px; margin-top: 2rem;">
            <div class="row">
                <div class="col py-3 text-center">
                    <a href="admin">
                        <img src="public/img/design/logo_woz.png" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="row pt-3 pb-5">
                <div class="col-9 py-2 mx-auto">
                    <a href="admin_configuracion" class="link-sider-admin" style="border-radius: 16px; text-decoration: none;"><i class="bi bi-gear-fill"></i> Configuración</a>
                </div>
                <div class="col-9 py-2 mx-auto">
                    <a href="admin_politicas" class="link-sider-admin" style="border-radius: 16px; text-decoration: none;"><i class="bi bi-shield-fill-exclamation"></i> Políticas</a>
                </div>
                <div class="col-9 py-2 mx-auto">
                    <a href="admin_faqs" class="link-sider-admin" style="border-radius: 16px; text-decoration: none;"><i class="bi bi-question-circle-fill"></i> FAQS</a>
                </div>
                <div class="col-9 py-2 mx-auto">
                    <a href="admin_home" class="link-sider-admin" style="border-radius: 16px; text-decoration: none;"><i class="bi bi-house-door-fill"></i> Home</a>
                </div>
                <div class="col-9 py-2 mx-auto">
                    <a href="admin_nosotros" class="link-sider-admin" style="border-radius: 16px; text-decoration: none;"><i class="bi bi-postcard-fill"></i> Nosotros</a>
                </div>
                <div class="col-9 py-2 mx-auto">
                    <a href="admin_servicios" class="link-sider-admin" style="border-radius: 16px; text-decoration: none;"><i class="bi bi-window"></i> Servicios</a>
                </div>
                <div class="col-9 py-2 mx-auto">
                    <a href="admin_sliders" class="link-sider-admin" style="border-radius: 16px; text-decoration: none;"><i class="bi bi-card-image"></i> Sliders</a>
                </div>
                <div class="col-9 py-2 mx-auto">
                    <a href="admin_empresas" class="link-sider-admin" style="border-radius: 16px; text-decoration: none;"><i class="bi bi-send-fill"></i> Empresas</a>
                </div>
                <div class="col-9 py-2 mx-auto">
                    <a href="admin_contacto" class="link-sider-admin" style="border-radius: 16px; text-decoration: none;"><i class="bi bi-building-fill"></i> Contacto</a>
                </div>
            </div>
        </div>
    </div>
';

$headADMIN = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="' . $_SESSION['csrf_token'] . '">
        <title>Administrador</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>    
        <link rel="stylesheet" href="public/css/header.css">
        <script src="public/js/index.js"></script>
        <script>
        <?php if (isset($_SESSION[\'toastr\'])): ?>
            var toastrType = "<?php echo $_SESSION[\'toastr\'][\'type\']; ?>";
            var toastrMessage = "<?php echo $_SESSION[\'toastr\'][\'message\']; ?>";
            toastr[toastrType](toastrMessage);
            <?php unset($_SESSION[\'toastr\']); // Elimina el mensaje de la sesión después de mostrarlo ?>
        <?php endif; ?>
    </script>
    </head>
    <body style=" background-image: url(public/img/design/Bambinos/fondoadmin.png);
        background-repeat: no-repeat;
        background-size: 100%;
        background-position: center center;
        height: auto;
        width: 100%;">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                '. $headerADMIN .'
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-12 col-12 mx-auto px-1">
                '. $sidebarADMIN .'
            </div>
            <div class="col-xxl-10 col-xl-10 col-lg-9 col-md-8 col-sm-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-11 mx-auto mt-5">
                        ';

                        // Incluir el contenido dinámico basado en la variable $contenidoADMIN
                        $content_file = "frontend/admin/pages/{$contenidoADMIN}.php";
                        if (file_exists($content_file)) {
                            include $content_file;
                        } else {
                            echo "<p class='mt-5'></p>";
                        }

                        echo '
                    </div>
                </div>
            </div>
        </div>
    </div>
';

echo $headADMIN;
?>
