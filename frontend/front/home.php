<?=$headGNRL;?>
<?=$header;?>

    <?php
        $sql = 'SELECT * FROM elementos';
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $elementos = $result;
    ?>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit-icons.min.js"></script>
    
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url('public/font/Poppins-Regular.ttf') format('truetype');
        }

        body {
            background-color: #3567AC; 
            font-family: 'Poppins', sans-serif;
        }

        .principal-slider {
            object-fit: contain; 
            width: 100%; 
            height: 40rem;
        }

        @media(min-width: 992px) {
            .principal-slider {
                height: 40rem;
            }

            .imagen-servicio {
                height: 16rem;
                border: 2px solid #D0382A;
                border-top-right-radius: 7rem;
                border-bottom-left-radius: 7rem;
            }

            .imagen-contacto {
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                border-radius: 100%;
                width: 44rem;
                height: 44rem;
            }

            .img-slide {
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100vw;
                width: 100%;
                height: 36rem;
            }
        }

        @media(min-width: 576px) and (max-width: 992px) {
            .principal-slider {
                height: 16
            }

            .imagen-servicio {
                height: 12rem;
                border: 2px solid #D0382A;
                border-top-right-radius: 5rem;
                border-bottom-left-radius: 5rem;
            }

            .imagen-contacto {
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                border-radius: 100%;
                margin-top: -4rem;
                margin-left: -6rem;
                width: 30rem;
                height: 30rem;
            }

            .img-slide {
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100vw;
                width: 100%;
                height: 26rem;
            }
        }

        @media(min-width: 0px) and (max-width: 576px) {
            .principal-slider {
                height: 10rem;
            }

            .imagen-servicio {
                height: 10rem;
                border: 2px solid #D0382A;
                border-top-right-radius: 4rem;
                border-bottom-left-radius: 4rem;
            }

            .contenedor-imagen_contacto {
                height: 20rem;
            }

            .imagen-contacto {
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                border-radius: 100%;
                margin-left: 10.5rem;
                width: 20rem;
                height: 20rem;
            }

            .img-slide {
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100vw;
                width: 100%;
                height: 16rem;
            }
        }

        .dot-btn {
            cursor: pointer;
        }

        .btn-azul {
            border: 2px solid #3567AC; 
            color: #3567AC;
        }

        .btn-azul:hover {
            border: 2px solid #3567AC; 
            color: #FFFFFF;
            background-color: #3567AC;
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

    <section class="slider-principal py-5">
        <div class="container-fluid">
            <div class="row">
                <?php
                    $sql_slider = 'SELECT * FROM slider_principals';
                    $stmt_slider = $conexion->prepare($sql_slider);
                    $stmt_slider->execute();
                    $result_slider = $stmt_slider->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div class="slider_imagenes px-0">
                    <?php foreach ($result_slider as $rs) : ?>
                        <div class="col-12">
                            <div class="img-slide" style="
                                background-image: url('public/img/photos/sliders/<?=$rs['imagen']?>');
                            "></div>
                            <!-- <img src="public/img/photos/sliders/<?=$rs['imagen']?>" alt="<?=$rs['imagen']?>" class="img-slide"> -->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="row">
                        <div class="col text-end">
                            <img src="public/img/photos/home/chevron-left.png" alt="" class="prev-btn">
                        </div>
                        <div class="col dot-container"></div>
                        <div class="col text-start">
                            <img src="public/img/photos/home/chevron-right.png" alt="" class="next-btn">
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

    <section class="seccion-nosotros bg-white py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-md-5 col-12">
                            <div class="row d-flex align-items-end justify-content-end">
                                <div class="col-lg-9 col-md-10 col-9 position-relative rounded" style="
                                    background-image: url(public/img/photos/imagenes_estaticas/<?=$elementos[3]['imagen']?>);
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                    height: 36rem;
                                    ">
                                    <div class="col-lg-6 col-md-9 col-9 mt-5 ms-5 text-center fs-1 text-white position-absolute top-50 start-0 translate-middle py-3 border border-white border-5" style="background-color: #3567AC; line-height: 1; border-radius: 1rem;">
                                        <b class="fs-bolder">Logistica</b> Nacional
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-12">
                            <div class="row">
                                <div class="col-11 mx-auto py-5 ">
                                    <div class="row">
                                        <div class="col fw-bolder" style="color: #3567AC;">
                                            SOBRE NOSOTROS
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col display-2 fw-bolder" style="color: #D0382A;">
                                            Empresa
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col display-2 fw-bolder" style="color: #3567AC;">
                                            &nbsp;&nbsp;&nbsp;100% Mexicana
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mx-auto">
                                            <div class="row">
                                                <div class="col-11 px-0" style="border-bottom: 0.5rem solid #3567AC;"></div>
                                                <div class="col-1 px-0">
                                                    <div class="row">
                                                        <div class="col-4 py-3" style="background-color: #3567AC;"></div>
                                                        <div class="col-6"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col py-3">
                                            <?=$result[1]['texto']?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-9 col-12">
                                            <a href="#/" class="btn py-3 fs-5 w-100 btn-azul">VER MÁS</a>
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

    <section class="slider-servicios">
        <div class="container-fluid" style="background-color: #F6F6F6;">
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
                                            <?php
                                                $sql_servicios = 'SELECT * FROM servicios';
                                                $stmt_servicios = $conexion->prepare($sql_servicios);
                                                $stmt_servicios->execute();
                                                $result_servicios = $stmt_servicios->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
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
                                                                        '.$s['titulo'].'
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col mt-3 text-dark" style="text-align: justify; max-height: 9rem; overflow: hidden;">
                                                                        '.$s['descripcion'].'
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
                                                                                    <img src="{{ asset("public/img/photos/home/flechita.png") }}" alt="" class="img-fluid">
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

    <section class="seccion-contacto pt-5 bg-white">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-lg-4 col-md-2 col-11 mx-auto">

                        </div>
                        <div class="col-lg-7 col-md-9 col-11 mx-auto">
                            <div class="row">
                                <div class="col-md-9 col-12">
                                    <div class="row">
                                        <div class="col fw-bolder" style="color: #3567AC;">
                                            CONTACTO
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col display-2 fw-bolder text-start" style="color: #D0382A; line-height: 1;">
                                            Déjanos
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col display-2 fw-bolder text-end" style="color: #3567AC; line-height: 1;">
                                            un Mensaje
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-11 mx-md-0 mx-auto mt-md-0 mt-2">
                                    <div class="row">
                                        <div class="col-11" style="border-bottom: 0.5rem solid #3567AC;">

                                        </div>
                                        <div class="col-1">
                                            <div class="row">
                                                <div class="col-6 py-3" style="background-color: #3567AC;"></div>
                                                <div class="col-6"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-11 mx-auto"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-11 mx-auto position-relative pt-5 mt-5" style="background-color: #D0382A; border-top-left-radius: 2rem; border-top-right-radius: 2rem;">
                    <div class="row">
                        <div class="col-11 mx-auto">
                            <div class="row">
                                <div class="col-md-6 col-12 position-relative contenedor-imagen_contacto">
                                    <div class="col-12 position-absolute top-50 start-0 translate-middle border-dark py-md-5 py-0">
                                        <div class="imagen-contacto" style="
                                            background-image: url(public/img/photos/imagenes_estaticas/<?=$elementos[5]['imagen']?>);
                                        "></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 px-0">
                                    <div class="row py-3">
                                        <style>
                                            .form-control::placeholder {
                                                color: #3567AC;
                                            }

                                            .form-control {
                                                padding-left: 1.75rem;
                                            }
                                        </style>
                                        <form action="">
                                            <div class="form-group row">
                                                <div class="col">
                                                    <input type="text" class="form-control py-3 shadow-none " placeholder="WHATSAPP" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-4">
                                                <div class="col">
                                                    <input type="email" class="form-control py-3 shadow-none" placeholder="EMAIL" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-4">
                                                <div class="col">
                                                    <textarea name="" id="" cols="30" rows="4" class="form-control py-3" placeholder="MENSAJE" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-2">
                                                <div class="col-lg-5 col-md-8 col-10">
                                                    <button type="submit" class="btn btn-outline text-white py-3 w-100">
                                                        <div class="row d-flex align-items-center justify-content-start">
                                                            <div class="col-md-7 col-6 text-start fw-bolder" style="font-size: 0.8rem;">
                                                                Enviar Mensaje
                                                            </div>
                                                            <div class="col-md-3 col-3 text-start">
                                                                <img src="{{ asset('public/img/photos/home/flechita_blanca.png') }}" alt="">
                                                            </div>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slider_imagenes > div');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            const dotContainer = document.querySelector('.dot-container');
            let currentSlide = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    if (i === index) {
                        slide.style.display = 'block';
                    } else {
                        slide.style.display = 'none';
                    }
                });
            }

            showSlide(currentSlide);

            function nextSlide() {
                currentSlide++;
                if (currentSlide >= slides.length) {
                    currentSlide = 0;
                }
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide--;
                if (currentSlide < 0) {
                    currentSlide = slides.length - 1;
                }
                showSlide(currentSlide);
            }

            slides.forEach((slide, i) => {
                const dotBtn = document.createElement('img');
                dotBtn.src = "public/img/photos/home/dot.png";
                dotBtn.alt = "Dot " + (i + 1);
                dotBtn.classList.add('dot-btn');
                dotBtn.classList.add('px-1');
                dotBtn.addEventListener('click', () => {
                    currentSlide = i;
                    showSlide(currentSlide);
                });
                dotContainer.appendChild(dotBtn);
            });

            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);
        });
    </script>
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

