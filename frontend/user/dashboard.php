<?php
    // session_start();

    require 'backend/database/conexion.php';

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $records = $conexion->prepare('SELECT id, name, email FROM users WHERE id = :id');
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
                                <div class="col fs-5 py-3">
                                    Bienvenido:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col py-5 text-center fs-5">
                                    <?= htmlspecialchars($user['email']) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <?php
                                        foreach($links as $link) {
                                            echo '
                                                <div class="row">
                                                    <div class="col-12 border px-0">
                                                        <a href="'. $link['link'] .'" class="btn btn-dark w-100 rounded-0">'.$link['titulo'].'</a>
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
                                    <div class="row">
                                        <div class="col py-1 fs-4 text-center">
                                            Datos de usuario
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="nombre_u" class="form-control-label">Modificar nombre de usuario</label>
                                            <input type="text" name="nombre_u" class="form-control editarajax" value="<?=$user['name']?>" data-model="users" data-field="name" data-id="<?= $user['id'] ?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="correo_u" class="form-control-label">Modificar dirección de correo electrónico</label>
                                            <input type="text" name="correo_u" class="form-control" value="<?=$user['email']?>" data-model="users" data-field="email" data-id="<?= $user['id'] ?>">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="row">
                                                <div class="col fs-4 text-center">
                                                    Cambiar contraseña
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <label for="pass_u" class="form-control-label">Nueva contraseña</label>
                                                    <input type="text" name="pass_u" class="form-control">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="passc_u" class="form-control-label">Confirmar contraseña</label>
                                                    <input type="text" name="passc_u" class="form-control">
                                                </div>
                                                <div class="col-lg-6 col-12 mx-auto py-md-2 py-4">
                                                    <input type="submit" class="btn btn-dark w-100 rounded-0" value="Actualizar contraseña">
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
    <?php else: ?>
        <h1>Please Login or Sign Up</h1>
        <a href="Login">Login</a> or 
        <a href="SignUp">Sign Up</a>
    <?php endif; ?>

<?=$footer;?>



