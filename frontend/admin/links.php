    <?php
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

    <style>

        body { background-color: #e5e8eb  !important; }

        .card-header { background-color: #b0c1d1  !important; }

        .black-skin
        .btn-primary { background-color: #b0c1d1  !important; }

        .btn {
            box-shadow: none;
            border-radius: 15px;
        }
    </style>

    <div class="row">
        <div class="col-4">
            <a href="admin" class="btn btn-sm btn-dark rounded-pill w-100">Regresar</a>
        </div>
    </div>

    <section>
        <div class="container-fluid" >
            <div class="row">
                <div class="col py-5">
                    <div class="card p-5">
                        <form action="admin_logic" method="POST">
                            <input type="hidden" name="form_type" value="links_create">
                            <label>Titulo</label>
                            <input type="text" name="titulo" class="form-control shadow-none">
                            <label class="pt-1">Enlace (link)</label>
                            <input type="text" name="link" class="form-control shadow-none">
                            <input type="submit" class="btn btn-dark rounded-0 w-100 mt-2" value="Agregar nuevo enlace">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mb-5">
        <div class="row">
            <div class="col mb-5">
                <div class="card p-5">
                    <div class="row">
                        <div class="col-4 text-center fs-5 py-3">Titulo</div>
                        <div class="col-4 text-center fs-5 py-3">Link</div>
                        <div class="col-4 text-center fs-5 py-3">Acciones</div>
                    </div>
                    <div class="row">
                        <?php foreach($links as $link): ?>
                            <div class="col-4 border"><?= $link['titulo'] ?></div>
                            <div class="col-4 border"><?= $link['link'] ?></div>
                            <div class="col-4 border">
                                <form action="admin_logic" method="POST" style="display:inline;">
                                    <input type="hidden" name="form_type" value="links_delete">
                                    <input type="hidden" name="link_id" value="<?= $link['id'] ?>">
                                    <button type="submit" class="btn btn-danger w-100 rounded-0">Eliminar</button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <?php if (isset($_SESSION['toastr'])): ?>
    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        toastr["<?= $_SESSION['toastr']['type'] ?>"]("<?= $_SESSION['toastr']['message'] ?>");
    </script>
    <?php unset($_SESSION['toastr']); ?>
<?php endif; ?>

   