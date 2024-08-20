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

        /* Estilo para el contenedor de la contraseña */
.password-container {
    display: flex;
    align-items: center; /* Alinea verticalmente el input y el ícono */
    width: 520px;
    margin: 20px auto;
    position: relative; /* Asegura que el ícono esté correctamente alineado dentro del contenedor */
}

/* Ajusta el ancho del campo de entrada para dejar espacio para el ícono */
.password-container input[type="password"] {
    flex-grow: 1;
    padding-right: 40px; /* Deja espacio para el ícono dentro del input */
}

/* Estilo para el ícono del ojo */
.password-container .fa-eye,
.password-container .fa-eye-slash {
    position: absolute;
    right: 10px;
    cursor: pointer;
    color: #666;
}



    </style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <h1 class="mt-5">Nueva cuenta</h1>  
    <span>ó <a href="Login">Inicia sesión</a></span>

    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>
    
    <form action="SignUp" method="POST" class="mb-5">
    <input type="email" name="email" placeholder="Ingresa tu correo" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
    
    <div class="password-container position-relative">
        <input required type="password" name="password" id="password" placeholder="Ingresa tu contraseña" pattern="^[A-Za-z\d]{8,}$">
        <i class="fas fa-eye" id="togglePassword"></i>
    </div>
    
    <div class="password-container position-relative">
        <input required type="password" name="confirm_password" id="confirm_password" placeholder="Confirma tu contraseña" pattern="^[A-Za-z\d]{8,}$">
        <i class="fas fa-eye" id="toggleConfirmPassword"></i>
    </div>

    <div id="passwordError" style="color: red; margin-top: -15px; margin-bottom: 20px;"></div>
    <input type="submit" value="Crear cuenta">
</form>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        const passwordError = document.getElementById('passwordError');
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

        function validatePasswords() {
            const passwordValue = password.value;
            const confirmPasswordValue = confirmPassword.value;
            const passwordPattern = /^[A-Za-z\d]{8,}$/;

            if (!passwordPattern.test(passwordValue)) {
                passwordError.textContent = 'La contraseña debe tener al menos 8 caracteres alfanuméricos.';
                return false;
            } else if (passwordValue !== confirmPasswordValue) {
                passwordError.textContent = 'Las contraseñas no coinciden.';
                return false;
            } else {
                passwordError.textContent = '';
                return true;
            }
        }

        password.addEventListener('input', validatePasswords);
        confirmPassword.addEventListener('input', validatePasswords);

        togglePassword.addEventListener('click', function () {
            const type = password.type === 'password' ? 'text' : 'password';
            password.type = type;
            this.classList.toggle('fa-eye-slash');
        });

        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPassword.type === 'password' ? 'text' : 'password';
            confirmPassword.type = type;
            this.classList.toggle('fa-eye-slash');
        });

        const form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            if (!validatePasswords()) {
                event.preventDefault(); // Evita que se envíe el formulario si hay un error
            }
        });
    });
</script>



<?=$footer;?>

