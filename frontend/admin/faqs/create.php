    <div class="row mb-4 px-2">
        <a href="admin_faqs" class="col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="col-12 col-md-8 mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="admin_logic" method="POST">
                    <input type="hidden" name="form_faqs" value="crud_faqs">
                    <input type="hidden" name="faqs_crud" value="create_faq">
					<div class="form-group">
						<label for="pregunta">Pregunta</label>
						<input type="text" name="pregunta" id="pregunta" class="form-control">
					</div>
					<div class="form-group">
						<label for="respuesta">Respuesta</label>
						<textarea name="respuesta" id="respuesta" rows="10" class="form-control" style="resize:none;"></textarea>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>