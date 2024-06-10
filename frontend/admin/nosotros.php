<?php
    $sql_empresas = 'SELECT * FROM empresas';
    $stmt_empresas = $conexion->prepare($sql_empresas);
    $stmt_empresas->execute();
    $result_empresas = $stmt_empresas->fetchAll(PDO::FETCH_ASSOC);
    $empresas = $result_empresas;

    $sql = 'SELECT * FROM elementos';
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $elementos = $result;
?>

    <style>

        body { background-color: #e5e8eb  !important; }

        .card-header { background-color: #b0c1d1  !important; }

        .black-skin
        .btn-primary { background-color: #b0c1d1  !important; }

        .btn {
            box-shadow: none;
            border-radius: 15px;
        }
    </style>
     <style>
        
        body {
            background-color:#3567AC; 
        }

        .row.bg-transparente {
            position: relative;
        }

        .row.bg-transparente::before,
        .row.bg-transparente::after { 
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            width: 100%;
            z-index: -1;
        }

        .row.bg-transparente::before {
            top: 0;
            height: 20%;
            background-color: #3567AC; /* Azul */
        }

        .row.bg-transparente::after {
            top: 20%;
            height: 80%;
            background-color: white; /* Blanco */
        }

        .cont-imagen {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 50rem;
        }

        @media(min-width: 992px) {
            .row-nosotros {
                height: 1000px;
            }

            .cont-imagen {
                border-top-left-radius: 2rem; 
                border-bottom-left-radius: 2rem;
            }
        }

        @media(min-width: 576px) and (max-width: 992px) {
            .row-nosotros {
                height: 800px;
            }

            .cont-imagen {
                border-top-left-radius: 2rem; 
                border-bottom-left-radius: 2rem;
            }
        }

        @media(min-width: 0px) and (max-width: 576px) {
            .row-nosotros {
                height: 800px;
            }

            .cont-imagen {
                border-top-left-radius: 0rem; 
                border-bottom-left-radius: 0rem;
            }

            .cont-vision {
                margin-top: -16rem;
            }
        }

    </style>
    <style>
        .bloqueo-slider:hover {
            background-color: black; 
            opacity: 80%;
        }

        .bloqueo-slider:hover > .btn {
            display: block;
            color: black;
            background-color: white;
            opacity: 100%;
        }

        .bloqueo-slider:hover > .btn:hover {
            display: block;
            color:white;
            background-color: red;
            opacity: 100%;
        }

        .bloqueo-slider > .btn {
            display: none;
        }
    </style>
    <style>
        .file-upload input[type="file"] {
                    position: absolute;
                    left: -9999px;
                    }

                    .file-upload label {
                    display: inline-block;
                    background-color: #00000031;
                    color: #fff;
                    padding: 6px 12px;
                    cursor: pointer;
                    border-radius: 4px;
                    font-weight: normal;
                    /* opacity: 80%; */
                    }

                    .file-upload input[type="file"] + label:before {
                    content: "\f07b";
                    font-family: "Font Awesome 5 Free";
                    font-size: 16px;
                    margin-right: 5px;
                    transition: all 0.5s;
                    }

                    .file-upload input[type="file"] + label {
                        transition: all 0.5s;
                    }

                    .file-upload input[type="file"]:focus + label,
                    .file-upload input[type="file"] + label:hover {
                    backdrop-filter: blur(5px);
                    background-color: #41464a37;
                    opacity: 100%;
                    transition: all 0.5s;
                    }
    </style>

    <div class="row">
        <div class="col-4">
            <a href="admin" class="btn btn-sm btn-dark rounded-pill w-100">Regresar</a>
        </div>
    </div>

    <section>
        <div class="container-fluid" >
            <div class="row">
                <div class="col">
                    <div class="row bg-transparente">
                        <div class="col-md-6 col-12">
                            <div class="row" style="background-color: #3567AC;">
                                <div class="col-10 text-white py-5 mx-auto display-2 fw-bolder text-center">
                                    <textarea name="" id="" cols="30" rows="3" class="form-control bg-transparent border border-dark fs-4 rounded-0 text-white text-start editarajax" data-id="<?=$elementos[6]['id']?>" data-model="elementos" data-field="texto">
                                        <?=$elementos[6]['texto']?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col bg-white" style="height: 33rem; max-height: 33rem; overflow: auto;">
                                    <div class="row">
                                        <div class="col-10 mx-auto">
                                            <div class="row">
                                                <div class="col-lg-12 col-12 text-md-end text-center ms-auto py-5" style="line-height: 1; hyphens: auto; text-align: right; font-size: 1rem;">
                                                    <textarea name="" id="" cols="30" rows="16" class="form-control border border-dark rounded-0 editarajax" data-id="<?=$elementos[7]['id']?>" data-model="elementos" data-field="texto">
                                                        <?=$elementos[7]['texto']?>
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 cont-imagen position-relative" style="
                            background-image: url('public/img/photos/imagenes_estaticas/<?=$elementos[8]['imagen']?>');
                        ">
                            <div class="position-absolute top-50 start-50 translate-middle w-100">
                                <form id="form_img_perfil2" action="admin_logic" method="POST" class="file-upload" enctype="multipart/form-data">
                                    
                                    <input type="hidden" name="id_imagen" value="<?=$elementos[8]['id']?>">
                                    <input type="hidden" name="tipo_imagen" value="formulario_imagen">
                                    <input type="hidden" name="tipo_form_imagen" value="imagen">
                                    <input type="hidden" name="form_redirect" value="nosotros">
                                    <input id="img_perfil2" class="m-0 p-0" type="file" name="archivo">
                                    <label class="col-12 m-0 px-2 d-flex justify-content-center align-items-center" for="img_perfil2" style=" height: 100%; opacity: 100%; border-radius: 20px;">Actualizar Imagen</label>
                                </form>
                                <script>
                                    $('#img_perfil2').change(function(e) {
                                        $('#form_img_perfil2').trigger('submit');
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row" style="background: linear-gradient(to bottom, #FFFFFF 50%, #D0382A 50%); position: relative; z-index: 1;">
            <div class="col rounded-circle bg-white">
                <div class="row row-nosotros">
                    <div class="col-md-6 col-12 py-5 mt-md-5 mt-0">
                        <div class="row mt-md-5 mt-0">
                            <div class="col-lg-6 col-md-11 col-11 mx-auto py-5">
                                <div class="row">
                                    <div class="col display-2 fw-bolder" style="color: #D0382A;">
                                        &nbsp;Misión
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-11" style="border-bottom:5px solid #3567AC;"></div>
                                    <div class="col-1">
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-9 pt-4" style="background-color: #3567AC;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col py-3" style="hyphens: auto; text-align: justify; line-height: 1;">
                                        <textarea name="" id="" cols="30" rows="6" class="form-control border border-dark rounded-0 editarajax" data-id="<?=$elementos[10]['id']?>" data-model="elementos" data-field="texto">
                                            <?=$elementos[10]['texto']?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 py-5 mt-md-5 cont-vision">
                        <div class="row mt-md-5 mt-0">
                            <div class="col-lg-6 col-md-11 col-11 mx-auto py-5">
                                <div class="row">
                                    <div class="col display-2 fw-bolder" style="color: #D0382A;">
                                        &nbsp;Visión
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-11" style="border-bottom:5px solid #3567AC;"></div>
                                    <div class="col-1">
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-9 pt-4" style="background-color: #3567AC;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col py-3" style="hyphens: auto; text-align: justify; line-height: 1;">
                                        <textarea name="" id="" cols="30" rows="6" class="form-control border border-dark rounded-0 editarajax" data-id="<?=$elementos[12]['id']?>" data-model="elementos" data-field="texto">
                                            <?=$elementos[12]['texto']?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mx-auto py-2 position-relative" style="z-index: 0;">
                        <div class="col-12 position-absolute bottom-0 start-0" style="z-index: -2;">
                            <img src="public/img/photos/imagenes_estaticas/<?=$elementos[13]['imagen']?>" alt="" class="img-fluid" style="border-bottom-left-radius: 250px; border-bottom-right-radius: 250px;">
                        </div>
                        <div class="position-absolute top-50 start-50 translate-middle w-100">
                            <form id="form_img_perfil" action="admin_logic" method="POST" class="file-upload" enctype="multipart/form-data">
                                
                                <input type="hidden" name="id_imagen" value="<?=$elementos[13]['id']?>">
                                <input type="hidden" name="tipo_imagen" value="formulario_imagen">
                                <input type="hidden" name="tipo_form_imagen" value="imagen">
                                <input type="hidden" name="form_redirect" value="nosotros">
                                <input id="img_perfil" class="m-0 p-0" type="file" name="archivo">
                                <label class="col-12 m-0 px-2 d-flex justify-content-center align-items-center" for="img_perfil" style=" height: 100%; opacity: 100%; border-radius: 20px;">Actualizar Imagen</label>
                            </form>
                            <script>
                                $('#img_perfil').change(function(e) {
                                    $('#form_img_perfil').trigger('submit');
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col py-5" style="background-color: #D0382A;"></div>
        </div>
    </div>

    <section class="slider-logos_container">
        <div class="container-fluid" style="background-color: #F6F6F6;">
            <div class="row">
                <div class="col position-relative">
                    <div class="row text-center py-5 d-flex align-items-center justify-content-center">
                        <div class="slider-logos">
                            <?php foreach($empresas as $empresa): ?>
                                <div class="col mx-auto">
                                    <img src="public/img/photos/empresas/<?=$empresa['imagen']?>" alt="" class="img-fluid" style="width: 100%; height: 4rem; object-fit: contain;">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-12 position-absolute top-0 bottom-0 start-0 bloqueo-slider d-flex align-items-center justify-content-center">
                        <a href="admin_empresas" class="btn fs-1 text-decoration-none">Editar en Empresas</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        $('.slider-logos').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: false,
            nextArrow: false,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    prevArrow: false,
                    nextArrow: false,
                    infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    prevArrow: false,
                    nextArrow: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    prevArrow: false,
                    nextArrow: false
                }
            }
            ]
        });

    </script>