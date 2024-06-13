    <?php
        $sql_politicas = 'SELECT * FROM politicas';
        $stmt_politicas = $conexion->prepare($sql_politicas);
        $stmt_politicas->execute();
        $result_politicas = $stmt_politicas->fetchAll(PDO::FETCH_ASSOC);
        $politicas = $result_politicas;
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

    <div class="row pb-5">
        <div class="col-xxl-6 col-xl-6 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto text-center my-3">
			<div class="card">
				<form action="admin_logic" method="post" class="card-body">
                    <input type="hidden" name="form_type" value="politicas">
                    <input type="hidden" name="politica_id" value="<?=$politicas[0]['id']?>">
					<label for="descripcion" class="fs-3 fw-bolder py-2"><?=$politicas[0]['titulo']?></label>
					<textarea class="form-control summernote" name="descripcion" id="descripcion" rows="10"><?=$politicas[0]['descripcion']?></textarea>
					<div class="form-group text-center mt-3">
						<button type="submit" class="btn btn-primary w-100 rounded-0">Guardar</button>
					</div>
				</form>
			</div>
		</div>
        <div class="col-xxl-6 col-xl-6 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto text-center my-3">
			<div class="card">
				<form action="admin_logic" method="post" class="card-body">
                    <input type="hidden" name="form_type" value="politicas">
                <input type="hidden" name="politica_id" value="<?=$politicas[1]['id']?>">
					<label for="descripcion" class="fs-3 fw-bolder py-2"><?=$politicas[1]['titulo']?></label>
					<textarea class="form-control summernote" name="descripcion" id="descripcion" rows="10"><?=$politicas[1]['descripcion']?></textarea>
					<div class="form-group text-center mt-3">
						<button type="submit" class="btn btn-primary w-100 rounded-0">Guardar</button>
					</div>
				</form>
			</div>
		</div>
        <div class="col-xxl-6 col-xl-6 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto text-center my-3">
			<div class="card">
				<form action="admin_logic" method="post" class="card-body">
                    <input type="hidden" name="form_type" value="politicas">
                    <input type="hidden" name="politica_id" value="<?=$politicas[2]['id']?>">
					<label for="descripcion" class="fs-3 fw-bolder py-2"><?=$politicas[2]['titulo']?></label>
					<textarea class="form-control summernote" name="descripcion" id="descripcion" rows="10"><?=$politicas[2]['descripcion']?></textarea>
					<div class="form-group text-center mt-3">
						<button type="submit" class="btn btn-primary w-100 rounded-0">Guardar</button>
					</div>
				</form>
			</div>
		</div>
        <div class="col-xxl-6 col-xl-6 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto text-center my-3">
			<div class="card">
				<form action="admin_logic" method="post" class="card-body">
                    <input type="hidden" name="form_type" value="politicas">
                    <input type="hidden" name="politica_id" value="<?=$politicas[3]['id']?>">
					<label for="descripcion" class="fs-3 fw-bolder py-2"><?=$politicas[3]['titulo']?></label>
					<textarea class="form-control summernote" name="descripcion" id="descripcion" rows="10"><?=$politicas[3]['descripcion']?></textarea>
					<div class="form-group text-center mt-3">
						<button type="submit" class="btn btn-primary w-100 rounded-0">Guardar</button>
					</div>
				</form>
			</div>
		</div>
        <div class="col-xxl-6 col-xl-6 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto text-center my-3">
			<div class="card">
				<form action="admin_logic" method="post" class="card-body">
                    <input type="hidden" name="form_type" value="politicas">
                    <input type="hidden" name="politica_id" value="<?=$politicas[4]['id']?>">
					<label for="descripcion" class="fs-3 fw-bolder py-2"><?=$politicas[4]['titulo']?></label>
					<textarea class="form-control summernote" name="descripcion" id="descripcion" rows="10"><?=$politicas[4]['descripcion']?></textarea>
					<div class="form-group text-center mt-3">
						<button type="submit" class="btn btn-primary w-100 rounded-0">Guardar</button>
					</div>
				</form>
			</div>
		</div>
        <div class="col-xxl-6 col-xl-6 col-lg-9 col-md-12 col-sm-12 col-12 mx-auto text-center my-3">
			<div class="card">
				<form action="admin_logic" method="post" class="card-body">
                    <input type="hidden" name="form_type" value="politicas">
                    <input type="hidden" name="politica_id" value="<?=$politicas[5]['id']?>">
					<label for="descripcion" class="fs-3 fw-bolder py-2"><?=$politicas[5]['titulo']?></label>
					<textarea class="form-control summernote" name="descripcion" id="descripcion" rows="10"><?=$politicas[5]['descripcion']?></textarea>
					<div class="form-group text-center mt-3">
						<button type="submit" class="btn btn-primary w-100 rounded-0">Guardar</button>
					</div>
				</form>
			</div>
		</div>
    </div>

    
    <script>
      $('.summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
        //   ['insert', ['link', 'picture', 'video']],
        //   ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>