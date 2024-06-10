<?php
    $sql_servicios = 'SELECT * FROM servicios';
    $stmt_servicios = $conexion->prepare($sql_servicios);
    $stmt_servicios->execute();
    $result_servicios = $stmt_servicios->fetchAll(PDO::FETCH_ASSOC);
    $servicios = $result_servicios;
?>
    
    <div class="row">
        <div class="col-4">
            <a href="admin" class="btn btn-sm btn-dark rounded-pill w-100">Regresar</a>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col display-5 text-center fw-bolder">
                Servicios   
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 mx-auto">
                <a href="admin_servicio_create" class="btn btn-dark w-100">Crear nuevo</a>
            </div>
        </div>
        <div class="row mt-5">
            <?php foreach ($servicios as $serv): ?>
                <div class="col-12">
                    <div class="card border border-dark">
                        <div class="row">
                            <div class="col-2">
                                <div style="
                                    background-image: url('public/img/photos/servicios/<?=$serv['portada']?>');
                                    background-color: #000000;
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: center;
                                    height: 100%;
                                    width: 100%;
                                "></div>
                            </div>
                            <div class="col-8">
                                <div class="row d-flex align-items-center justify-content-center h-100">
                                    <div class="col-8 d-flex align-items-center justify-content-center h-100">
                                        <div class="card-title"><?=$serv['titulo']?></div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check form-switch">
                                            <label for="switch_inicio-<?=$serv['id']?>" class="form-control-label fw-bolder py-2">Mostrar en inicio</label>
                                            <input class="form-check-input switch-color-inicio shadow-none fs-2" role="switch" id="switch_inicio-<?=$serv['id']?>" data-id="<?=$serv['id']?>" data-campo="inicio" type="checkbox" <?=($serv['inicio'] == 1) ? 'checked' : ''?>>
                                        </div>
                                        <!-- <script>
                                            $(document).ready(function() {
                                                $('.form-check-input').change(function (e){
                                                    var checkbox = $(this);
                                                    var check = checkbox.prop('checked') ? 1 : 0;
                                                    var id = checkbox.data('id');
                                                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                                                    var URL = "admin_logic";
                                                    
                                                    $.ajax({
                                                        url: URL,
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        data: {
                                                            form_servicios: 'crud_servicios',
                                                            servicios_crud: 'toggle_inicio',
                                                            id: id,
                                                            valor: check
                                                        },
                                                        headers: {
                                                            'X-CSRF-TOKEN': csrfToken
                                                        }
                                                    })
                                                    .done(function(msg) {
                                                        if (msg.success) {
                                                            toastr["info"](msg.mensaje);
                                                        } else {
                                                            toastr["error"](msg.mensaje);
                                                        }
                                                    })
                                                    .fail(function() {
                                                        toastr["error"]('Error al cambiar el estado del servicio.');
                                                    });
                                                });
                                            });
                                        </script> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-dark w-100 rounded-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?=$serv['id']?>"><i class="bi bi-eye"></i> Detalle</button>
                                        <div class="modal fade" id="staticBackdrop-<?=$serv['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-<?=$serv['id']?>" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel-<?=$serv['id']?>">Detalle del servicio: <?=$serv['titulo']?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?=$serv['descripcion']?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger w-100 rounded-0" data-bs-dismiss="modal">Cerrar detalles</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="admin_servicio_edit_<?=$serv['id']?>" class="btn btn-info w-100 rounded-0"><i class="bi bi-book"></i> Editar</a>
                                    </div>
                                    <div class="col-12">
                                        <form action="admin_logic" method="POST" enctype="multipart/form-data" class="delete-form" id="form-<?=$serv['id']?>">
                                            <input type="hidden" name="form_servicios" value="crud_servicios">
                                            <input type="hidden" name="servicios_crud" value="delete_servicio">
                                            <input type="hidden" name="id_servicio" value="<?=$serv['id']?>">
                                            <button type="submit" class="btn btn-danger w-100 rounded-0"><i class="bi bi-trash"></i> Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
             
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.delete-form');

            forms.forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    <script>
    $(document).ready(function() {
        $('.form-check-input').off('change').on('change', function (e){
            var checkbox = $(this);
            var check = checkbox.prop('checked') ? 1 : 0;
            var id = checkbox.data('id');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var URL = "admin_logic";
            
            $.ajax({
                url: URL,
                type: 'POST',
                dataType: 'json',
                data: {
                    form_servicios: 'crud_servicios',
                    servicios_crud: 'toggle_inicio',
                    id: id,
                    valor: check
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .done(function(msg) {
                if (msg.success) {
                    toastr["info"](msg.mensaje);
                } else {
                    toastr["error"](msg.mensaje);
                }
            })
            .fail(function() {
                toastr["error"]('Error al cambiar el estado del servicio.');
            });
        });
    });
</script>