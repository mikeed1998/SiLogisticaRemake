    <div class="row">
        <div class="col-4">
            <a href="admin_servicios" class="btn btn-sm btn-dark rounded-pill w-100">Regresar</a>
        </div>
    </div>

    <div class="container-fluid bg-white py-5">
        <div class="row">
            <div class="col display-5 text-center fw-bolder">
                Crear nuevo servicio   
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-9 mx-auto">
                <form action="admin_logic" method="POST" enctype="multipart/form-data" class="row">
                    <input type="hidden" name="form_servicios" value="crud_servicios">
                    <input type="hidden" name="servicios_crud" value="create_servicio">
                    <div class="col-12 py-2">
                        <label for="servicio_titulo" class="form-control-label fs-5">Nombre del servicio</label>
                        <input type="text" id="servicio_titulo" name="servicio_titulo" class="form-control shadow-none" placeholder="Nombre del servicio" required>
                    </div>
                    <div class="col-12 py-2">
                        <label for="servicio_descripcion" class="form-control-label fs-5">Descripción del servicio</label>
                        <textarea id="summernote" name="servicio_descripcion" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="col-12 py-2">
                        <label for="servicio_portada" class="form-control-label fs-5">Portada del servicio</label>
                        <input type="file" id="servicio_portada" name="servicio_portada" class="form-control shadow-none" placeholder="Portad del servicio" accept="image/png, image/gif, image/jpeg" required>
                    </div>
                    <div class="col-12 py-2">
                        <input type="submit" class="btn btn-dark w-100 rounded-0" value="Guardar nuevo servicio">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>