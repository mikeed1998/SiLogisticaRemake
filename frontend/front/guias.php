<?php 
$guiasEmbarque = (isset($_GET['guiasEmbarque']))? $_GET['guiasEmbarque']:'0000000000';
$numCliente = (isset($_GET['numCliente']))? $_GET['numCliente']:'0001';
$usuario = (isset($_GET['usuario']))? $_GET['usuario']:'CONSWEB';
$contraseña = (isset($_GET['contraseña']))? $_GET['contraseña']:'CONSWEB';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Guia <?=$guiasEmbarque?></title>
    <style>
        .fondo-con-blur {
        background-image: url('img/fondo3.jpg'); /* Reemplaza 'ruta-de-tu-imagen.jpg' con la URL de tu imagen de fondo */
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
        height: 100vh; /* Ajusta la altura según sea necesario */
        position: relative;
        overflow: hidden;
        }

        /* Estilo para el fondo con efecto de desenfoque */
        .fondo-con-blur::before {
            content: "";
            background-image: inherit;
            filter: blur(10px); /* Ajusta el valor de desenfoque según tus preferencias */
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
</head>
<body class="fondo-con-blur ">

    <div class="col-12 d-flex justify-content-center pt-5" >
        <style>
            .contHorarioslist{
                background: #F5F7FF; border-radius: 16px;
            }
            .botonopacity:hover{
                opacity: 50%;
            }
    
            .animate__animated.animate__fadeInDown {
            --animate-duration: 1.5s;
            }
    
        </style>

<div class="container mt-5">
    <style>
        .contHorarioslist{
            background: #F5F7FF; border-radius: 16px;
        }
        .botonopacity:hover{
            opacity: 50%;
        }

    </style>
    <div class="container d-flex mt-3 px-0">
        <div class="card px-3" style="width: 100%;  border-radius:26px; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.085);">
            <div class="col-12 my-3">
                <h5 class="col-12 text-center my-auto" style="font-weight: bold;">Estatus de la guia</h5>
            </div>
            
            <div id="conthorarios" class="col-12  mb-3" style=" overflow: auto; background: #F5F7FF; border-radius: 26px;">
            
                <div id="cont_guia" class="col-12 px-3 py-3 d-flex flex-column">
        
        </div>
        </div>
    </div>

</div>
</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> -->

<script>

let timerInterval
Swal.fire({
  title: 'Buscando guia',
  html: 'Buscando <b></b>',
  timer: 10000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {

})

window.onload = function() {

const url = "proxy.php";
const data = {
    usuario: '<?=$usuario?>',
    contrasena: '<?=$contraseña?>',
    guiasEmbarque: '<?=$guiasEmbarque?>',
    numCliente: '<?=$numCliente?>'
};



$.ajax({
    url: url,
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify(data),
    success: function(response) {
        Swal.fire({
        icon: 'success',
        text: 'Busqueda terminada',
        })
        $('#cont_guia').fadeOut(300, function() {
    // Cambia el contenido
    $('#cont_guia').html(response.html);

    // Después de cambiar el contenido, realiza un efecto de aparecer
    $('#cont_guia').fadeIn(300);
});
    },
    error: function(error) {
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Error en la busqueda',
        })
        console.error("Error:", error);
    }
});

};

</script>
</body>
</html>