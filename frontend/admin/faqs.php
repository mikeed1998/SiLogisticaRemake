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
                            <button class="btn btn-sm btn-danger text-right w-100 rounded-0" data-toggle="modal" data-target="#frameModalDel" data-id="<?=$f['id']?>">
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


        <!-- Modal de eliminación -->
        <div class="modal fade" id="deleteModal<?=$f['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?=$f['id']?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?=$f['id']?>">Eliminar FAQ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas eliminar esta FAQ?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="admin_logic.php" method="post">
                            <input type="hidden" name="form_type" value="delete_faq">
                            <input type="hidden" name="faq_id" value="<?=$f['id']?>">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?> 
</div>
