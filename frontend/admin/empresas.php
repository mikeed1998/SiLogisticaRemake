<?php
    $sql_empresas = 'SELECT * FROM empresas';
    $stmt_empresas = $conexion->prepare($sql_empresas);
    $stmt_empresas->execute();
    $result_empresas = $stmt_empresas->fetchAll(PDO::FETCH_ASSOC);
    $empresas = $result_empresas;
?>
    
    <style>
        .file-upload input[type="file"] {
            position: absolute;
            left: -9999px;
        }

        .file-upload label {
            display: inline-block;
            background-color: #00000031;
            color: #fff;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            font-weight: normal;
        }

        .file-upload input[type="file"] + label:before {
            content: "\f07b";
            font-family: "Font Awesome 5 Free";
            font-size: 16px;
            margin-right: 5px;
            transition: all 0.5s;
        }

        .file-upload input[type="file"] + label {
            transition: all 0.5s;
        }

        .file-upload input[type="file"]:focus + label,
        .file-upload input[type="file"] + label:hover {
            backdrop-filter: blur(5px);
            background-color: #41464a37;
            opacity: 100%;
            transition: all 0.5s;
        }
    </style>

<div class="container-fluid bg-white py-5 rounded mb-5">
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center flex-column text-center">
            <h3 class="fs-1 fw-bolder" style="color:black; font-family: Arial, sans-serif;">Añadir imagen al slider</h3>
            <form id="form_image_empresa" action="admin_logic" method="POST" class="file-upload mt-2" enctype="multipart/form-data">
                <input type="hidden" name="form_empresas" value="crud_empresas">
                <input type="hidden" name="empresas_crud" value="create_empresa">
                <input id="input_empresa_img" class="m-0 p-0" type="file" name="imagen">
                <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_empresa_img" style="opacity: 100% !important; border-radius: 26px; background-color: #000000;">Seleccionar archivo</label>
            </form>
        </div>
    </div>
    <div class="row mt-3" id="empresas_container">
        <?php foreach($empresas as $empresa): ?>
            <div class="col-3 mt-4 position-relative" id="empresa-<?=$empresa['id']?>">
                <div class="card border-0">
                    <div style="
                        background-image: url('public/img/photos/empresas/<?=$empresa['imagen']?>');
                        background-color: #000000;
                        background-size: contain;
                        background-position: center;
                        background-repeat: no-repeat;
                        width: 100%;
                        height: 16rem;
                        border-radius: 32px;
                    "></div>
                </div>
                <div class="col position-absolute top-0 end-0">
                    <form action="admin_logic" method="POST" enctype="multipart/form-data" id="form-<?=$empresa['id']?>">
                        <input type="hidden" name="form_empresas" value="crud_empresas">
                        <input type="hidden" name="empresas_crud" value="delete_empresa">
                        <input type="hidden" name="id_empresa" value="<?=$empresa['id']?>">
                        <button type="submit" class="btn btn-danger rounded-circle"><i class="bi bi-x fs-4"></i></button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#input_empresa_img').change(function(e) {
        $('#form_image_empresa').trigger('submit');
    });

    $('#form_image_empresa').submit(function(e) {
        e.preventDefault(); // Previene el envío normal del formulario

        var formData = new FormData(this);

        $.ajax({
            url: 'admin_logic',
            type: 'POST',
            data: formData,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status === 'success') {
                    toastr.success(res.message);
                    // Agregar nuevo empresa al contenedor
                    $('#empresas_container').append(`
                        <div class="col-3 mt-4 position-relative" id="empresa-${res.id}">
                            <div class="card border-0">
                                <div style="
                                    background-image: url('public/img/photos/empresas/${res.imagen}');
                                    background-color: #000000;
                                    background-size: contain;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    width: 100%;
                                    height: 16rem;
                                    border-radius: 32px;
                                "></div>
                            </div>
                            <div class="col position-absolute top-0 end-0">
                                <form action="admin_logic" method="POST" enctype="multipart/form-data" id="form-${res.id}">
                                    <input type="hidden" name="form_empresas" value="crud_empresas">
                                    <input type="hidden" name="empresas_crud" value="delete_empresa">
                                    <input type="hidden" name="id_empresa" value="${res.id}">
                                    <button type="submit" class="btn btn-danger rounded-circle"><i class="bi bi-x fs-4"></i></button>
                                </form>
                            </div>
                        </div>
                    `);
                } else {
                    toastr.error(res.message);
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('body').on('submit', 'form[id^="form-"]', function(e) {
        e.preventDefault(); // Previene el envío normal del formulario

        var form = $(this);
        var id = form.find('input[name="id_empresa"]').val();

        $.ajax({
            url: 'admin_logic',
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status === 'success') {
                    toastr.success(res.message);
                    $('#empresa-' + id).remove(); // Eliminar el empresa del DOM
                } else {
                    toastr.error(res.message);
                }
            }
        });
    });
});
</script>