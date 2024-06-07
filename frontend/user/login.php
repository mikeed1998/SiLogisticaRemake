<?php
    ob_start(); // Start output buffering

    // Include general and header content
    echo $headGNRL;
    echo $header;

    require 'backend/database/conexion.php';
    // session_start();

    if (isset($_SESSION['admin_id'])) {
        header('Location: admin');
        exit(); // Make sure to exit after header redirection
    }

    if (isset($_SESSION['user_id'])) {
        header('Location: Dashboard');
        exit(); // Make sure to exit after header redirection
    }

    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conexion->prepare('SELECT id, email, role_as, password FROM users WHERE email=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();

        $results = $records->fetch(PDO::FETCH_ASSOC);

        if ($results && password_verify($_POST['password'], $results['password']) && $results['role_as'] == 0) {
            $_SESSION['user_id'] = $results['id'];
            header('Location: Dashboard');
            exit(); // Make sure to exit after header redirection
        } else {
            $message = 'Datos incorrectos o la cuenta no existe';
        }
    }
?>

<style>
    body {
        padding: 0;
        margin: 0;
        font-family: 'Roboto', sans-serif;
        text-align: center;
    }

    input[type="text"], input[type="password"] {
        outline: none;
        padding: 20px;
        display: block;
        width: 520px;
        border-radius: 3px;
        border: 1px solid #eee;
        margin: 20px auto;
    }

    input[type="submit"] {
        padding: 10px;
        color: #fff;
        background-color: #0098cb;
        width: 520px;
        margin: 20px auto;
        margin-top: 0;
        border: 0;
        border-radius: 3px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #00b8eb;
    }

    header {
        border-bottom: 2px solid gray;
        margin-bottom: 10px;
        width: 100%;
        text-align: center;
    }

    header a {
        text-decoration: none;
        color: #333;
    }
</style>

<h1 class="mt-5">Iniciar sesión</h1>
<span>ó <a href="SignUp">crea una cuenta</a></span>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="Login" method="POST" class="mb-5">
    <input type="text" name="email" placeholder="Ingresa tu correo">
    <input type="password" name="password" placeholder="Ingresa tu contraseña">
    <input type="submit" value="Ingresar a mi cuenta">
</form>

<?php
echo $footer;
ob_end_flush(); // End output buffering and flush output
?>
