<?=$headGNRL;?>
<?=$header;?>

<?php
require 'backend/database/conexion.php';

if (isset($_SESSION['admin_id'])) {
    header('Location: admin');
    exit(); // Make sure to exit after header redirection
}

if(isset($_SESSION['user_id'])) {
    header('Location: Dashboard');
}

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
    if($_POST['password'] === $_POST['confirm_password']) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Verificar que la contraseña cumpla con los requisitos
            $password_pattern = "/^[A-Za-z\d]{8,}$/";
            if (preg_match($password_pattern, $_POST['password'])) {
                $sql = 'INSERT INTO users(email, password) VALUES (:email, :password)';
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':email', $_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $stmt->bindParam(':password', $password);

                if($stmt->execute()) {
                    $message = "Cuenta creada con éxito";
                } else {
                    $message = "Hubo un problema para crear tu cuenta";
                }
            } else {
                $message = "La contraseña no cumple con los requisitos";
            }
        } else {
            $message = "El formato del correo no es válido";
        }
    } else {
        $message = "Las contraseñas no coinciden";
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

        input[type="text"], input[type="password"], input[type="email"] {
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
            /* padding: 20px 0; */
            margin-bottom: 10px;
            width: 100%;
            text-align: center;
        }

        header a {
            text-decoration: none;
            color: #333;
        }
    </style>


    

    <h1 class="mt-5">Nueva cuenta</h1>  
    <span>ó <a href="Login">Inicia sesión</a></span>

    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>
    
    <form action="SignUp" method="POST" class="mb-5">
        <input type="email" name="email" placeholder="Ingresa tu correo" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
        <input required type="text" name="password" placeholder="Ingresa tu contraseña" pattern="^[A-Za-z\d]{8,}$">
        <input required type="text" name="confirm_password" placeholder="Confirma tu contraseña" pattern="^[A-Za-z\d]{8,}$">
        <input type="submit" value="Crear cuenta">
    </form>

<?=$footer;?>

