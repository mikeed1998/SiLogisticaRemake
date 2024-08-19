<?php
    $sql_faqs = 'SELECT * FROM faqs';
    $stmt_faqs = $conexion->prepare($sql_faqs);
    $stmt_faqs->execute();
    $result_faqs = $stmt_faqs->fetchAll(PDO::FETCH_ASSOC);
    $faqs = $result_faqs;
?>    

<div class="row mb-4 px-2">
    <div class="col-6 text-start">
        <a href="admin" class="w-50 col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>
    <div class="col-6 text-end">
        <a href="admin_faq_create" class="w-50 col col-md-2 btn btn-sm btn-success text-white"><i class="fa fa-plus"></i> Agregar</a>
    </div>
</div>

<div class="accordion sortable" data-table="Faq" id="acordionfaqs">
    <?php foreach ($faqs as $f): ?>
        <div class="card" data-card="<?=$f['id']?>">
            <div class="row">
                <div class="col-9">
                    <a href="" class="btn btn-link btn-block py-0 text-left fs-5">
                        <?=$f['pregunta']?>
                    </a>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-6">
                            <a href="admin_faq_edit_<?=$f['id']?>" class="btn btn-sm btn-info text-right w-100 rounded-0">
                                <i class="bi bi-pencil-square fs-5"></i>
                            </a>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-sm btn-danger text-right w-100 rounded-0" onclick="confirmDeletion(<?=$f['id']?>)">
                                <i class="bi bi-trash fs-5"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" data-card="<?=$f['id']?>">
            <div id="collapse<?=$f['id']?>" class="collapse" aria-labelledby="heading<?=$f['id']?>" data-parent="#acordionfaqs">
                <div class="card-body text-justify">
                    <?=$f['respuesta']?>
                </div>
            </div>
        </div>
    <?php endforeach; ?> 
</div>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function confirmDeletion(faqId) {
        Swal.fire({
            title: '¿Estás seguro de que deseas eliminar esta FAQ?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'admin_logic',
                    type: 'POST',
                    data: {
                        form_type: 'faqs_delete',
                        faq_id: faqId
                    },
                    success: function(response) {
                        Swal.fire(
                            'Eliminado',
                            'La FAQ ha sido eliminada.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire(
                            'Error',
                            'Hubo un problema al eliminar la FAQ.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    <?php if (isset($_SESSION['toastr'])): ?>
        var toastrType = "<?php echo $_SESSION['toastr']['type']; ?>";
        var toastrMessage = "<?php echo $_SESSION['toastr']['message']; ?>";
        toastr[toastrType](toastrMessage);
        <?php unset($_SESSION['toastr']); ?>
    <?php endif; ?>
</script>