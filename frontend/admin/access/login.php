<?php
    ob_start();
    session_start();
    
    if (isset($_SESSION['user_id'])) {
        header('Location: Dashboard');
        $_SESSION['dashboard_message'] = 'Por cuestiones de seguridad, no se puede iniciar sesión como administrador y como usuario al mismo tiempo, para acceder al admin primero cierra la sesión actual o intenta usando otro navegador (o abre una pestaña en modo incógnito)';
        exit();
    }

    if (isset($_SESSION['admin_id'])) {
        header('Location: admin');
        exit();
    }
    
    $message = '';
    
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        require 'backend/database/conexion.php';
        $records = $conexion->prepare('SELECT id, email, role_as, password FROM users WHERE email=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
    
        if ($results && password_verify($_POST['password'], $results['password']) && $results['role_as'] == 1) {
            $_SESSION['admin_id'] = $results['id'];
            header('Location: admin');
            exit();
        } else {
            $message = 'Datos incorrectos o la cuenta no existe';
        }
    }
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Administración</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="public/img/design/logo-wozial.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!-- Font Awsome -->
        <script src="https://kit.fontawesome.com/910783a909.js" crossorigin="anonymous"></script>
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/css/uikit.min.css" />
        <!-- jQuery es neceario -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit-icons.min.js"></script>
    </head>
<body>
	<div class="uk-inline uk-width-1-1" style="min-height: 100vh;">
		<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation:fade; autoplay:true; autoplay-interval:3000; pause-on-hover:false;">
			<ul class="uk-slideshow-items" uk-height-viewport="min-height: 700">
				<li>
					<div class="uk-position-cover">
						<img src="public/img/photos/backgrounds/bg-1.jpg" alt="" uk-cover>
					</div>
				</li>
			</ul>
		</div>
		<div class="uk-position-center" style="width:300px;">
			<div class="uk-border-rounded uk-overlay uk-overlay-default" uk-scrollspy="cls:uk-animation-slide-bottom-medium; delay:800;" style="border-radius: 26px; ">
				<div class="uk-text-center">
					<img src="public/img/design/logo-wozial.png" class="margin-bottom-10" style="max-height: 50px;">
				</div>
				<form action="adminlogin" method="POST">
					<div class="uk-inline py-0 my-0">
						<span class="uk-form-icon uk-form-icon-flip" href="" uk-icon="icon: user"></span>
						<input id="email" type="email" class="uk-input uk-margin uk-width-1-1 uk-form-large" name="email" style="border-radius: 16px;" required autocomplete="email" autofocus>
					</div>
					<div class="uk-inline py-0 my-0">
						<span class="uk-form-icon uk-form-icon-flip" href="" uk-icon="icon: lock"></span>
						<input id="password" type="password" class="pass uk-input uk-margin uk-width-1-1 uk-form-large" name="password" style="border-radius: 16px;" required>
					</div>
					<div class="col-12 d-flex justify-content-center">
                        <input type="hidden" name="from" value="1">
						<button type="submit" class="col-12 btn btn-primary" style="border-radius: 16px;">
							Ingresar
					    </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>



