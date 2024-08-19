    <div class="row mb-4 px-2">
        <a href="admin_faqs" class="col col-md-2 btn btn-sm btn-dark mr-auto"><i class="fa fa-reply"></i> Regresar</a>
    </div>

    <div class="col-12 col-md-8 mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="admin_logic" method="post">
					<input type="hidden" name="form_type" value="faqs_edit">
                    <input type="hidden" name="faq_id" value="<?=$faq['id']?>"> 
					<div class="form-group">
						<label for="pregunta">Pregunta</label>
						<input type="text" name="pregunta" id="pregunta" class="form-control" value="<?=$faq['pregunta']?>">
					</div>
					<div class="form-group">
						<label for="respuesta">Respuesta</label>
						<textarea name="respuesta" id="respuesta" rows="10" class="form-control" style="resize:none;"><?=$faq['respuesta']?></textarea>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>