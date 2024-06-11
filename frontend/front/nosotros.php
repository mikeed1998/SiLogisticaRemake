<?=$headGNRL;?>
<?=$header;?>

    <?php
        $sql = 'SELECT * FROM elementos';
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $elementos = $result;
    ?>

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

            .texto-nosotros {
                height: 33rem; 
                max-height: 33rem; 
                overflow: auto;
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

            .texto-nosotros {
                height: 33rem; 
                max-height: 33rem; 
                overflow: auto;
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

            .texto-nosotros {
                
            }
        }

    </style>
    
    <section>
        <div class="container-fluid" >
            <div class="row">
                <div class="col">
                    <div class="row bg-transparente">
                        <div class="col-md-6 col-12">
                            <div class="row" style="background-color: #3567AC;">
                                <div class="col-10 text-white py-5 mx-auto display-2 fw-bolder text-end">
                                    <?=$elementos[6]['texto']?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col bg-white texto-nosotros">
                                    <div class="row">
                                        <div class="col-10 mx-auto">
                                            <div class="row">
                                                <div class="col-lg-9 col-12 text-md-end text-center ms-auto py-5" style="hyphens: auto; text-align: right; font-size: 1rem;">
                                                    <?=$elementos[7]['texto']?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 cont-imagen" style="
                            background-image: url('public/img/photos/imagenes_estaticas/<?=$elementos[8]['imagen']?>');
                        "></div>
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
                                        <?=$elementos[10]['texto']?>
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
                                        <?=$elementos[12]['texto']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mx-auto py-2 position-relative" style="z-index: 0;">
                        <div class="col-12 position-absolute bottom-0 start-0" style="z-index: -2;">
                            <img src="public/img/photos/imagenes_estaticas/<?=$elementos[13]['imagen']?>" alt="" class="img-fluid" style="border-bottom-left-radius: 250px; border-bottom-right-radius: 250px;">
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

