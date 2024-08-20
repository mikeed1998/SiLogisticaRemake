<?php
    // session_start();

    require 'backend/database/conexion.php';

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $records = $conexion->prepare('SELECT * FROM users WHERE id = :id');
        $records->bindParam(':id', $user_id);
        $records->execute();
        $user = $records->fetch(PDO::FETCH_ASSOC);
    } else {
        $user = null;
    }

    $message = '';
    if (isset($_SESSION['dashboard_message'])) {
        $message = $_SESSION['dashboard_message'];
        unset($_SESSION['dashboard_message']); // Borra el mensaje después de mostrarlo
    }

    $sql_links = 'SELECT * FROM links';
    $stmt_links = $conexion->prepare($sql_links);
    $stmt_links->execute();
    $result_links = $stmt_links->fetchAll(PDO::FETCH_ASSOC);
    $links = $result_links;

    $sql = 'SELECT * FROM links';
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $links = $result;

?>

<?=$headGNRL;?>
<?=$header;?>

    <style>
        
        @media(min-width: 992px) {
            .img-profile {
                width: 100%;
                height: 16rem;
                object-fit: cover;
            }
        }

        @media(min-width: 576px) and (max-width: 992px) {
            .img-profile {
                width: 100%;
                height: 20rem;
                object-fit: cover;
            }
        }

        @media(min-width: 0px) and (max-width: 576px) {
            .img-profile {
                width: 100%;
                height: 24rem;
                object-fit: cover;
            }
        }

    </style>

    <?php if ($message): ?>
        <div class="alert alert-danger">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($user)): ?>
        <div class="container-fluid mt-5 mb-5">
            <div class="row">
                <div class="col-11 card mx-auto">
                    <div class="row">
                        <div class="col fs-5 py-3 d-flex align-items-center justify-content-center">
                            Dashboard
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-12 border">
                            <div class="row">
                                <div class="col py-3 text-center">
                                    <?= htmlspecialchars($user['name']) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-2 text-center fs-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="public/img/photos/usuarios/<?=$user['imagen']?>" alt="" class="img-fluid img-profile border border-dark">
                                        </div>
                                        <div class="col-12">
                                            <form id="uploadForm" action="admin_logic" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="user_id" value="<?=$user['id'];?>">
                                                <input type="hidden" name="form_type" value="update_img_perfil">
                                                <input type="file" id="imageInput" name="image" accept="image/*" style="display: none;">
                                                <button type="button" id="uploadButton" class="btn btn-primary w-100">Cambiar foto</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <?php
                                        foreach($links as $link) {
                                            echo '
                                                <div class="row">
                                                    <div class="col-12 border px-0">
                                                        <a href="'. $link['link'] .'" target="_blank" class="btn btn-dark w-100 rounded-0">'.$link['titulo'].'</a>
                                                    </div>
                                                </div>
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 border px-0">
                                    <a href="Logout" class="btn btn-danger w-100 rounded-0">Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-12 border mt-md-0 mt-5">
                            <div class="row">
                                <div class="col-11 mx-auto">
                                    <div class="row mt-3">
                                        <div class="col py-1 fs-4 text-center">
                                            Datos de usuario
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <label for="nombre_u" class="form-control-label">Modificar nombre de usuario</label>
                                            <input type="text" name="nombre_u" class="form-control shadow-none editarajax" value="<?=$user['name']?>" data-model="users" data-field="name" data-id="<?= $user['id'] ?>">
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label for="correo_u" class="form-control-label">Modificar dirección de correo electrónico</label>
                                            <input type="text" name="correo_u" class="form-control shadow-none" value="<?=$user['email']?>" data-model="users" data-field="email" data-id="<?= $user['id'] ?>">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="row mt-2">
                                                <div class="col fs-4 text-center">
                                                    Cambiar contraseña
                                                </div>
                                            </div>
                                            <form action="admin_logic" id="form-password" method="POST" class="row mt-3">
                                                <input type="hidden" name="user_id" value="<?=$user['id'];?>">
                                                <input type="hidden" name="form_type" value="update_password">
                                                <div class="col-md-6 col-12">
                                                    <label for="pass_u" class="form-control-label">Nueva contraseña</label>
                                                    <input type="text" name="pass_u" class="form-control shadow-none">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="passc_u" class="form-control-label">Confirmar contraseña</label>
                                                    <input type="text" name="passc_u" class="form-control shadow-none">
                                                </div>
                                                <div class="col-lg-6 col-12 mx-auto py-md-2 py-4 mt-2">
                                                    <input type="submit" class="btn btn-dark w-100 rounded-0" value="Actualizar contraseña">
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
        </div>
    <?php else: ?>
        <h1>Please Login or Sign Up</h1>
        <a href="Login">Login</a> or 
        <a href="SignUp">Sign Up</a>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const uploadButton = document.getElementById('uploadButton');
            const imageInput = document.getElementById('imageInput');
            const uploadForm = document.getElementById('uploadForm');

            // Cuando se hace clic en el botón, se activa el input de archivo
            uploadButton.addEventListener('click', function () {
                imageInput.click();
            });

            // Cuando se selecciona un archivo, se envía automáticamente el formulario
            imageInput.addEventListener('change', function () {
                if (imageInput.files.length > 0) {
                    uploadForm.submit();
                }
            });
        });
    </script>

    <script>
        
        $(document).ready(function() {
            $('#form-password').submit(function(event) {
                event.preventDefault(); // Prevenir el comportamiento por defecto del formulario

                $.ajax({
                    url: 'admin_logic', // Asegúrate de que esta sea la URL correcta
                    type: 'POST',
                    data: $(this).serialize(), // Serializar todos los datos del formulario
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Éxito',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                            $('#form-password')[0].reset();
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            $('#form-password')[0].reset();
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema con la solicitud. Por favor, inténtalo de nuevo.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                        $('#form-password')[0].reset();
                    }
                });
            });
        });
            
    </script>

<?=$footer;?>



