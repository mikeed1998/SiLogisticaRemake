<?php

    session_start();
    $admin_text = "";
    if (isset($_SESSION['admin_id'])) {
        $admin_text = "admin";
    }

    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    $sql_config = 'SELECT * FROM configuracions WHERE id = 1';
    $stmt_config = $conexion->prepare($sql_config);
    $stmt_config->execute();
    $result_config = $stmt_config->fetchAll(PDO::FETCH_ASSOC);
    $config = $result_config[0];

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $records = $conexion->prepare('SELECT id, name, email FROM users WHERE id = :id');
        $records->bindParam(':id', $user_id);
        $records->execute();
        $user = $records->fetch(PDO::FETCH_ASSOC);
    } else {
        $user = null;
    }

    $scriptGNRL = '
        <script src="public/js/index.js"></script>
    ';

    $header = '
        <header>
            <div class="container-fluid" id="navbar-principal">
                <div class="row">
                    <div class="col position-relative">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-6 d-flex align-items-center justify-content-center text-center" style="height: 10rem;">
                                <a href="index.php">
                                    <img src="public/img/photos/header/logo-sin-fondo.png" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col bar-grande">
                                <div class="row" style="border-bottom: 3px solid #639BE8;">
                                    <div class="col-lg-3 col-md-12 py-lg-3 py-md-2"></div>
                                    <div class="col-lg-9 col-md-12 py-lg-3 py-md-2">
                                        <div class="row">
                                            <div class="col-lg-11 col-md-12 mx-auto">
                                                <div class="row d-flex align-items-center justify-content-center">
                                                    <div class="col-3 text-white">
                                                        <a href="http://wa.me/'.$config['whatsapp'].'" class="text-decoration-none px-1">
                                                            <i class="bi bi-whatsapp text-white fs-4"></i>
                                                        </a>
                                                        <a href="'.$config['facebook'].'" class="text-decoration-none px-1">
                                                            <i class="bi bi-facebook text-white fs-4"></i>
                                                        </a>
                                                        <a href="'.$config['instagram'].'" class="text-decoration-none px-1">
                                                            <i class="bi bi-instagram text-white fs-4"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-3 fs-5 text-white fw-bolder">'.

                                                        (
                                                            ($user == null) ?
                                                                (($admin_text) ? '<a class="nav-link text-center border border-white rounded py-2" href="admin">Administrador</a>' : '<a class="nav-link text-center" href="Login">Iniciar sesión</a>')
                                                            :
                                                                '<a class="nav-link text-center" href="Dashboard">'.$user['name'].'</a> '
                                                        )

                                                        // (($user == null) ?
                                                        //     '<a class="nav-link text-center" href="Login">Iniciar sesión</a> ' 
                                                        // :
                                                        //     '<a class="nav-link text-center" href="Dashboard">'.$user['name'].'</a> ' )
                                                         
                                                    
                                                        // @if (Route::has('login'))
                                                        //     @auth
                                                        //         @if(Auth::user()->role_as == 1)
                                                        //             <a class="nav-link text-center" href="{{ url('/homeA') }}">Administrador</a>
                                                        //         @else
                                                        //             <a class="nav-link text-center" href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                                                        //         @endif
                                                        //     @else
                                                        //         <a class="nav-link text-center" href="{{ route('login') }}">Iniciar sesión</a>  
                                                        //     @endauth
                                                        // @endif
                                                        .'
                                                    </div>
                                                    <div class="col-lg-3 col-md-4">
                                                        <button class="btn btn-outline border-white py-2 fs-5 fw-bolder text-white w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">Rastrear Guía</button>
                                                    </div>
                                                    <div class="col-lg-3 col-md-2 text-center text-white">
                                                        <button type="button" onclick="activarModal(1)" class="btn btn-outline border-0 boton-menu">
                                                            <!-- <img src="public/img/photos/header/menubg.png" alt="" class="img-fluid"> //-->
                                                            <i class="fa-solid fa-bars display-4 py-2" style="width: 100%;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col bar-chica">
                                <div class="row">
                                    <div class="col d-flex align-items-center justify-content-center"  style="height: 10rem;">
                                        <button type="button" onclick="activarModal(1)" class="btn btn-outline border-0 boton-menu">
                                            <!-- <img src="public/img/photos/header/menubg.png" alt="" class="img-fluid"> //-->
                                            <i class="fa-solid fa-bars display-4" style="width: 100%;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 position-absolute shadow-lg top-0 end-0" id="modal-menu" style="height: 40rem; margin-top: 7.1rem; z-index: 999;">
                            <div class="row">
                                <div class="inicio-grande col-md-2 col-8 mt-4" style="background-color: #003867;"></div>
                                <div class="inicio-grande col-md-10 col-4 text-center py-3 display-4 text-white linea-superior" style="background-color: #003867;">
                                    <div class="col-9 text-center">
                                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="Home" class="link-header">INICIO</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="inicio-chico col-12 text-center py-3 display-4 text-white" style="margin-top: 1.20rem; background-color: #003867; border-top: 3px solid #639BE8;">
                                    <a href="Home" class="link-header">INICIO</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a class="row" href="#/" style="text-decoration: none; color: #FFFFFF;" id="toggleAccordion">
                                        <div class="col-lg-1 col-md-2 col-12" style="background-color: #003867; border-top: 3px solid #639BE8;"></div>
                                        <div class="col-lg-10 col-md-8 col-12 text-center py-3 display-4 text-white" style="background-color: #003867; border-top: 3px solid #639BE8;">
                                            SERVICIOS
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-12 d-flex align-items-center justify-content-center linea-superior_servicios" style="background-color: #003867;">
                                            <i class="bi bi-chevron-down fs-3 text-white"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12">
                                    <div class="row text-center text-white" style="background-color: #003867;">
                                    ';
                                        
                                        $sql_header_servicios = 'SELECT * FROM servicios';
                                        $stmt_header_servicios = $conexion->prepare($sql_header_servicios);
                                        $stmt_header_servicios->execute();
                                        $result_header_servicios = $stmt_header_servicios->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($result_header_servicios as $rhs) {
    $header.='
                                                <div class="col-12 display-4 accordion-content">
                                                    <a href="Servicio_'.$rhs['id'].'" class="link-header">'. $rhs['titulo'] .'</a>
                                                </div>
                                            ';
                                        }
    $header .= '    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center py-3 display-4 text-white" style="background-color: #003867; border-top: 3px solid #639BE8;">
                                <a href="Nosotros" class="link-header">NOSOTROS</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center py-3 display-4 text-white" style="background-color: #003867; border-top: 3px solid #639BE8;">
                                <a href="Contacto" class="link-header">CONTACTO</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center py-3 display-4 text-white" style="background-color: #003867; border-top: 3px solid #639BE8;">
                                <button class="btn btn-outline display-4 text-white link-header"  data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 3rem;">RASTREAR GUÍA</button>
                                
                            </div>
                        </div>
                        <div class="row" style="background-color: #003867; border-top: 3px solid #639BE8;">
                            <div class="col-md-11 col-12 mx-auto text-center py-3 text-white" >
                                <div class="row">
                                    <div class="col-md-4 col-12 d-flex align-items-center justify-content-center">
                                        <div class="row mt-md-0 mt-2">
                                            <div class="col mx-auto">
                                                <img src="public/img/photos/header/correo_small.png" alt="" class="img-fluid"> contacto@silogistica.com
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 d-flex align-items-center justify-content-center">
                                        <div class="row mt-md-0 mt-2">
                                            <div class="col mx-auto">
                                                <img src="public/img/photos/header/telefono_small.png" alt="" class="img-fluid"> TEL. 3322332233
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 d-flex align-items-center justify-content-center">
                                        <div class="row mt-md-0 mt-2">
                                            <div class="col-lg-6 col-md-11 col-12 mx-auto text-md-end text-center">
                                                Av. Lazaro Cárdenas #33097 Chapalita C.P. 44500 Guadalajara, Jal.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content" style="border-radius: 26px;;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Rastrea tu envió</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-3" style="font-size: 12px;">
                    <div class="col-12 mt-1 d-flex justify-content-center align-items-center">
                        <div class="col-4 d-flex flex-column text-center" style="position: relative;">
                            <h5>Ingresa num de guía</h5>
                            <input id="num_guia" type="text" class="form-control" style="border-radius:26px; z-index: 1;">
                            <div class="col-12 text-end" style="position: absolute; bottom: 5px; left: 35px; ">
                                <i class="fas fa-search" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <style>
                            .contHorarioslist{
                                background: #F5F7FF; border-radius: 16px;
                            }
                            .botonopacity:hover{
                                opacity: 50%;
                            }
                        </style>
                        <div class="container d-flex mt-3 px-0">
                            <div class=" px-3" style="width: 100%;  border-radius:26px; ">
                                <div class="col-12 my-3">
                                    <h5 class="col-12 text-center my-auto" style="font-weight: bold;">Estatus de la guía</h5>
                                </div>
                                <div id="conthorarios" class="col-12  mb-3" style=" overflow: auto; background: #F5F7FF; border-radius: 26px;">
                                    <div id="cont_guia" class="col-12 px-3 py-3 d-flex flex-column">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    ';

    $footer = '

            <footer>
                <div class="container-fluid" style="background-color: #3567AC;">
                    <div class="row">
                        <div class="col-11 mx-auto">
                            <div class="row">
                                <div class="col-lg-6 col-md-3 col-12 py-3">
                                    <div class="row">
                                        <div class="col-10 mx-auto text-md-end text-center">
                                            <a href="Home" class="btn btn-outline border-0">
                                                <img src="public/img/photos/header/logo_uno.PNG" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-9 col-12 mt-md-4 mt-0 py-3">
                                    <div class="row">
                                        <div class="col" style="border-top: 3px solid #639BE8;">
                                            <div class="row mt-3 d-flex align-items-center justify-content-center text-center text-white fw-normal">
                                                <div class="col-lg-4 col-md-4 col-12 py-3">
                                                    TEL. '.$config['telefono'].'
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-12 text-md-end text-center py-md-3 py-1">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-12 col-12"></div>
                                                        <div class="col-lg-9 col-md-12 col-12 mx-auto">
                                                            '.$config['direccion'].'
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-12 py-md-3 py-1 text-md-end text-center">
                                                    <button type="button" onclick="activarModal(2)" class="btn btn-outline border-0 boton-menu">
                                                        <!-- <img src="public/img/photos/header/menubg.png" alt="" class="img-fluid"> //-->
                                                        <i class="fa-solid fa-bars display-4 py-2" style="width: 100%;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-md-3 py-3" style="border-top: 3px solid #639BE8;">
                                    <div class="row d-flex align-items-center justify-content-center">
                                        <div class="col-md-4 col-6 text-start">
                                            <a href="http://wa.me/'.$config['whatsapp'].'" class="text-decoration-none px-1">
                                                <i class="bi bi-whatsapp text-white fs-4"></i>
                                            </a>
                                            <a href="'.$config['facebook'].'" class="text-decoration-none px-1">
                                                <i class="bi bi-facebook text-white fs-4"></i>
                                            </a>
                                            <a href="'.$config['instagram'].'" class="text-decoration-none px-1">
                                                <i class="bi bi-instagram text-white fs-4"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-12 d-md-block d-none"></div>
                                        <div class="col-md-4 col-6 text-end text-white">
                                            Si Logistica 2024 todos los derechos reservados, diseño por Wozial
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            '. $scriptGNRL .'
            <script>
                var menu_modal = document.getElementById(\'modal-menu\');
                menu_modal.style.display = \'none\';
                var navbar_principal = document.getElementById(\'navbar-principal\');
                navbar_principal.style.backgroundColor = \'#3567AC\';

                function activarModal(x) {
                    if(x == 1) {
                        if(menu_modal.style.display == \'block\') {
                            menu_modal.style.display = \'none\';
                            navbar_principal.style.backgroundColor = \'#3567AC\';
                        } else {
                            menu_modal.style.display = \'block\';
                            navbar_principal.style.backgroundColor = \'#003867\';
                        }
                    } else if(x == 2) {
                        window.scrollTo({
                            top: 0,
                            behavior: \'smooth\'
                        });

                        if (menu_modal.style.display == \'block\') {
                            menu_modal.style.display = \'none\';
                            navbar_principal.style.backgroundColor = \'#3567AC\';
                        } else {
                            menu_modal.style.display = \'block\';
                            navbar_principal.style.backgroundColor = \'#003867\';
                        }
                    }
                }

                document.addEventListener(\'DOMContentLoaded\', function() {
                    const accordionToggle = document.getElementById(\'toggleAccordion\');
                    const accordionContent = document.querySelectorAll(\'.accordion-content\');

                    accordionToggle.addEventListener(\'click\', function() {
                        accordionContent.forEach(function(item) {
                            item.classList.toggle(\'show\');
                        });
                    });
                });

            </script>   
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>

            <script>
                $(\'#num_guia\').change(function (e){
                    var guia  = $(this).val();
                    const url = "Proxy"; // Cambia esto a la ubicación real de tu proxy.php en el servidor
                    const data = {
                        usuario: "CONSWEB",
                        contrasena: "CONSWEB",
                        guiasEmbarque: guia,
                        numCliente: "0001"
                    };

                    let timerInterval
                    Swal.fire({
                    title: \'Buscando Guia\',
                    html: \'me acercaré en <b></b> milliseconds.\',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector(\'b\')
                        timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log(\'I was closed by the timer\')
                        }
                    })
            
                    $.ajax({
                        url: url,
                        method: "POST",
                        contentType: "application/json",
                        data: JSON.stringify(data),
                        success: function(response) {
                            console.log(response); // Aquí puedes manejar la respuesta JSON de la API
                            Swal.fire({
                                icon: \'success\',
                                title: \'Guia Encontrada\',
                                showConfirmButton: false,
                                timer: 1500
                            })

                            $(\'#cont_guia\').fadeOut(300, function() {
                                // Cambia el contenido
                                $(\'#cont_guia\').html(response.html);
                                // Después de cambiar el contenido, realiza un efecto de aparecer
                                $(\'#cont_guia\').fadeIn(300);
                            });
                        },
                        error: function(error) {
                            console.log("NO LLEGO");
                            console.error("Error:", error);
                            
                            Swal.fire({
                                icon: \'error\',
                                title: \'Guia no encontrada\',
                                showConfirmButton: false,
                                timer: 1500
                            })
                    
                            $(\'#cont_guia\').fadeOut(300, function() {
                                // Cambia el contenido
                                $(\'#cont_guia\').html(\'<div class="col-12 my-3 text-center"><h5 class="p-0 m-0">Guía no encontrada</h5></div>\');
                                // Después de cambiar el contenido, realiza un efecto de aparecer
                                $(\'#cont_guia\').fadeIn(300);
                            });
                        }
                    });
                });
            </script>
        </body>
        </html>
    ';

    $headGNRL = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="csrf-token" content="' . $_SESSION['csrf_token'] . '">
            <title>'. $title .'</title>
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
            <link rel="stylesheet" href="public/css/header.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
            <style>
                body {
                    font-family: "Poppins", sans-serif;
                    font-weight: 400;
                    font-style: normal;
                }
            </style>
        </head>
        <body>
    ';

    
    


        
