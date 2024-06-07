<?=$headGNRL;?>
<?=$header;?>

    <?php
        $sql_servicios = 'SELECT * FROM servicios';
        $stmt_servicios = $conexion->prepare($sql_servicios);
        $stmt_servicios->execute();
        $result_servicios = $stmt_servicios->fetchAll(PDO::FETCH_ASSOC);
    ?>                                                

<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit-icons.min.js"></script>

    <style>
        
        body {
            background-color: #3567AC; 
        }

        @media(min-width: 992px) {
            .contenedor-nombre_servicio {
                background-color: #D0382B; 
                border-top-left-radius: 2rem; 
                border-top-right-radius: 2rem;
            }

            .imagen-servicio_pri {
                height: 40rem;
                border: 6px solid #FFFFFF;
                border-top-right-radius: 20rem;
                border-bottom-left-radius: 20rem;
                background-size: cover;
                background-position: center;
                background-repeat: no-repat;
            }

            .imagen-servicio {
                height: 16rem;
                border: 2px solid #D0382A;
                border-top-right-radius: 7rem;
                border-bottom-left-radius: 7rem;
            }
        }

        @media(min-width: 576px) and (max-width: 992px) {
            .contenedor-nombre_servicio {
                background-color: #D0382B; 
                border-top-left-radius: 2rem; 
                border-top-right-radius: 2rem;
                border-bottom-left-radius: 2rem; 
                border-bottom-right-radius: 2rem;
            }

            .contenedor-servicio_imagen {
                margin-bottom: 36rem;
            }

            .imagen-servicio_pri {
                height: 40rem;
                border: 6px solid #FFFFFF;
                border-top-right-radius: 20rem;
                border-bottom-left-radius: 20rem;
                background-size: cover;
                background-position: center;
                background-repeat: no-repat;
            }
            
            .imagen-servicio {
                height: 12rem;
                border: 2px solid #D0382A;
                border-top-right-radius: 5rem;
                border-bottom-left-radius: 5rem;
            }
        }

        @media(min-width: 0px) and (max-width: 576px) {
            .contenedor-nombre_servicio {
                background-color: #D0382B; 
                border-top-left-radius: 2rem; 
                border-top-right-radius: 2rem;
                border-bottom-left-radius: 2rem; 
                border-bottom-right-radius: 2rem;
            }

            .imagen-servicio {
                height: 10rem;
                border: 2px solid #D0382A;
                border-top-right-radius: 4rem;
                border-bottom-left-radius: 4rem;
            }

            .contenedor-servicio_imagen {
                margin-bottom: 16rem;
            }

            .imagen-servicio_pri {
                height: 20rem;
                border: 6px solid #FFFFFF;
                border-top-right-radius: 10rem;
                border-bottom-left-radius: 10rem;
                background-size: cover;
                background-position: center;
                background-repeat: no-repat;
            }
        }

        .uk-card-primary.uk-card-body .uk-dotnav > .uk-active > *, 
        .uk-card-primary > :not([class*="uk-card-media"]) .uk-dotnav > .uk-active > *, 
        .uk-card-secondary.uk-card-body .uk-dotnav > .uk-active > *, 
        .uk-card-secondary > :not([class*="uk-card-media"]) .uk-dotnav > .uk-active > *, 
        .uk-light .uk-dotnav > .uk-active > *, .uk-offcanvas-bar .uk-dotnav > .uk-active > *, 
        .uk-overlay-primary .uk-dotnav > .uk-active > *, 
        .uk-section-primary:not(.uk-preserve-color) .uk-dotnav > .uk-active > *, 
        .uk-section-secondary:not(.uk-preserve-color) .uk-dotnav > .uk-active > *, 
        .uk-tile-primary:not(.uk-preserve-color) .uk-dotnav > .uk-active > *, 
        .uk-tile-secondary:not(.uk-preserve-color) .uk-dotnav > .uk-active > * {
            background-color: #3567AC;
            border-color: #3567AC;
        }

        .uk-dotnav > :not(.uk-active) > * {
            background-color: #ACACAC;
            border-color: #ACACAC;
        }

        .uk-dotnav > :not(.uk-active) > *:hover {
            background-color: #D0382A;
        }

    </style>

     <div class="container-fluid mt-5">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-lg-7 col-12 pt-lg-5 pt-0">

                    </div>
                    <div class="col-lg-5 col-12 pt-lg-5 pt-0 contenedor-servicio_imagen">
                        <div class="row">
                            <div class="col-10 mx-auto pt-3">
                                <div class="row">
                                    <div class="col-lg-11 col-md-12 col-12 contenedor-nombre_servicio d-flex align-items-center justify-content-center px-3 py-3 display-5 text-start text-white fw-bolder">
                                        <?=$servicio['titulo']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col">
                <div class="row">
                    <div class="col-lg-7 col-md-10 col-10 mx-auto py-5 position-relative">
                        <div class="col-lg-11 col-md-12 col-12 position-absolute bottom-0 end-0 imagen-servicio_pri" style="
                            background-image: url(public/img/photos/servicios/<?=$servicio['portada']?>);
                        "></div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-12 py-5">
                        <div class="row">
                            <div class="col-10 mx-auto py-3 position-relative">
                                <div class="row">
                                    <div class="col-11" style="color: #3567AC; font-size: 1.25rem; hyphens:auto;">
                                        <?=$servicio['descripcion']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-10 mx-auto">
                                <div class="row">
                                    <div class="col-lg-4 col-12 px-0">
                                        <a href="#/" class="btn btn-outline text-center w-100 py-3" style="background-color: #3567AC; color: #FFFFFF;">SOLICITAR</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="slider-servicios">  
        <div class="container-fluid" style="background-color: #FFFFFF;">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12 pt-5">
                                    <div class="row">
                                        <div class="col-10 display-4 fw-bolder text-center" style="color: #D0382A;">
                                            Servicios
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-11 mx-md-0 mx-auto">
                                           <div class="row">
                                                <div class="col-1 px-0">
                                                    <div class="row">
                                                        <div class="col-6"></div>
                                                        <div class="col-6 py-3" style="background-color: #3567AC;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-11 px-0" style="border-bottom: 0.5rem solid #3567AC;"></div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-5">
                                    <div class="row">
                                        <div uk-slider>

                                            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                                        
                                                <div class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                                                    <?php
                                                    foreach ($result_servicios as $s) {
                                                        echo '
                                                            <div>
                                                                <div class="col px-3 border-end border-danger"> 
                                                                    <div class="row">
                                                                        <div class="col-11 mx-auto imagen-servicio" style="
                                                                            background-image: url(public/img/photos/servicios/'.$s['portada'].');
                                                                            background-position: center;
                                                                            background-repeat: no-repeat;
                                                                            background-size: cover;
                                                                        "></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mt-4 fs-1 fw-bolder" style="color: #3567AC; line-height: 1;">
                                                                            '. $s['titulo'] .'
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mt-3 text-dark" style="text-align: justify; max-height: 9rem; overflow: hidden;">
                                                                            '. $s['descripcion'] .'
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col fw-bolder mt-2">
                                                                            <a href="Servicio_'.$s['id'].'" class="text-decoration-none" style="color: #D0382A;">
                                                                                <div class="row">
                                                                                    <div class="col-lg-6 col-md-12 col-12">
                                                                                        Ver más detalles 
                                                                                    </div>
                                                                                    <div class="col-lg-6 col-md-12 col-12 text-start">
                                                                                        <img src="public/img/photos/home/flechita.png" alt="" class="img-fluid">
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ';
                                                        }
                                                    ?>
                                                </div>
                                        
                                                <div class="row py-4 mt-4">
                                                    <div class="col-3 text-end">
                                                        <a href="#/" uk-slider-item="previous"><i class="bi bi-chevron-left fs-4 fw-bold" style="color: #3567AC;"></i></a>
                                                    </div>
                                                    <div class="col-6 py-2">
                                                        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
                                                    </div>
                                                    <div class="col-3 text-start">
                                                        <a href="#/" uk-slider-item="next"><i class="bi bi-chevron-right fs-4 fw-bold" style="color: #3567AC;"></i></a>
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
            </div>
        </div>
    </section>

    <section class="slider-logos_container">
        <div class="container-fluid" style="background-color: #F6F6F6;">
            <div class="row text-center py-5 d-flex align-items-center justify-content-center">
                <?php
                    $sql_empresas = 'SELECT * FROM empresas';
                    $stmt_empresas = $conexion->prepare($sql_empresas);
                    $stmt_empresas->execute();
                    $result_empresas = $stmt_empresas->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div class="slider-logos">
                    <?php    
                        foreach ($result_empresas as $e) {
                            echo '
                                <div class="col mx-auto">
                                    <img src="public/img/photos/empresas/'.$e['imagen'].'" alt="" class="img-fluid p-md-1 p-2" style="width: 100%; height: 3rem; object-fit: contain;">
                                </div>
                            ';
                        }
                    ?>
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

<?=$footer;?>
