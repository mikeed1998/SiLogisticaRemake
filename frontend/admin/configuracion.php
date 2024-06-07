    <?php
        $sql_config = 'SELECT * FROM configuracions';
        $stmt_config = $conexion->prepare($sql_config);
        $stmt_config->execute();
        $result_config = $stmt_config->fetchAll(PDO::FETCH_ASSOC);
        $config = $result_config[0];
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

    <div class="row justify-content-center p-4">
        <div class="col-12 col-md-4 p-2">
			<div class=" h-100 card" style="box-shadow: none; border-radius: 16px;">
				<div class="card-body">
					<h5 class="card-title text-center">Metadatos</h5>
					<div class="form-group">
						<label for="title"> Título del sitio </label>
						<input type="text" class="form-control editarajax" id="titulo" name="titulo" data-model="configuracions" data-field="titulo" data-id="<?=$config['id']?>" value="<?=$config['titulo']?>">
					</div>
					<div class="form-group">
						<label for="description"> Descripción del sitio</label>
						<textarea class="form-control editarajax" id="description" name="description" rows="2" data-model="configuracions" data-field="descripcion" data-id="<?=$config['id']?>" style="resize:none;"><?=$config['descripcion']?></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card" style="border-radius: 16px; box-shadow: none;">
				<div class="card-body">
					<h5 class="card-title text-center">Teléfonos</h5>
					<div class="form-group">
						<label for="telefono"> Teléfono fijo</label>
						<input type="text" class="form-control editarajax" id="telefono" name="telefono" data-model="configuracions" data-field="telefono" data-id="<?=$config['id']?>"  value="<?=$config['telefono']?>">
                    </div>
					<div class="form-group">
						<label for="whatsapp"> Whatsapp </label>
						<input type="text" class="form-control editarajax" id="whatsapp" name="whatsapp" data-model="configuracions" data-field="whatsapp" data-id="<?=$config['id']?>"  value="<?=$config['whatsapp']?>">
					</div>
					<div class="form-group">
						<label for="whatsapp2"> TikTok</label>
						<input type="text" class="form-control editarajax" id="tiktok" name="tiktok" data-model="configuracions" data-field="tiktok" data-id="<?=$config['id']?>"  value="<?=$config['tiktok']?>">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card" style="border-radius: 16px; box-shadow: none;">
				<div class="card-body">
					<h5 class="card-title text-center">Redes sociales</h5>
					<div class="form-group">
						<label for="fb"> Facebook</label>
						<input type="text" class="form-control editarajax" id="fb" name="fb" data-model="configuracions" data-field="facebook" data-id="<?=$config['id']?>"  value="<?=$config['facebook']?>">
					</div>
					<div class="form-group">
						<label for="ig"> Instagram</label>
						<input type="text" class="form-control editarajax" id="ig" name="ig" data-model="configuracions" data-field="instagram" data-id="<?=$config['id']?>"  value="<?=$config['instagram']?>">
					</div>
					<div class="form-group">
						<label for="yt"> YouTube </label>
						<input type="text" class="form-control editarajax" id="yt" name="yt" data-model="configuracions" data-field="youtube" data-id="<?=$config['id']?>"  value="<?=$config['youtube']?>">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card" style="border-radius: 16px; box-shadow: none;">
				<div class="card-body">
					<h5 class="card-title text-center">Envío de correo</h5>
					<div class="form-group">
						<label for="destinatario">  Destinatario 1 </label>
						<input type="text" class="form-control editarajax" id="destinatario" name="destinatario" data-model="configuracions" data-field="destinatario" data-id="<?=$config['id']?>"  value="<?=$config['destinatario']?>">
					</div>
					<div class="form-group">
						<label for="destinatario2">  Destinatario 2 </label>
						<input type="text" class="form-control editarajax" id="destinatario2" name="destinatario2" data-model="configuracions" data-field="destinatario2" data-id="<?=$config['id']?>"  value="<?=$config['destinatario2']?>">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class="card" style="border-radius: 16px; box-shadow: none;">
				<div class="card-body">
					<h5 class="card-title text-center">Mapa</h5>
					<div class="form-group">
						<label for="mapa">  URL de Mapa </label>
						<input type="text" class="form-control editarajax" id="mapa" name="mapa" data-model="configuracions" data-field="mapa" data-id="<?=$config['id']?>"  value="<?=$config['mapa']?>">
					</div>
					<div class="form-group">
						<label for="direccion">  Dirección </label>
						<textarea rows="3" style="resize:none;" class="form-control editarajax" id="direccion" name="direccion" data-model="configuracions" data-field="direccion" data-id="<?=$config['id']?>"><?=$config['direccion']?></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card" style="border-radius: 16px; box-shadow: none;">
				<div class="card-body">
					<h5 class="card-title text-center">Autentificación</h5>
					<div class="form-group">
						<label for="remitente"> Remitente</label>
						<input type="text" class="form-control editarajax" id="remitente" name="remitente" data-model="configuracions" data-field="remitente" data-id="<?=$config['id']?>"  value="<?=$config['remitente']?>">
					</div>
					<div class="form-group">
						<label for="remitentepass"> Contraseña</label>
						<input type="text" class="form-control editarajax" id="remitentepass" name="remitentepass" data-model="configuracions" data-field="remitentepass" data-id="<?=$config['id']?>"  value="<?=$config['remitentepass']?>">
					</div>
					<div class="form-group">
						<label for="remitentehost"> Servidor</label>
						<input type="text" class="form-control editarajax" id="remitentehost" name="remitentehost" data-model="configuracions" data-field="remitentehost" data-id="<?=$config['id']?>"  value="<?=$config['remitentehost']?>">
					</div>
					<div class="form-group">
						<label for="remitenteport"> Puerto</label>
						<input type="text" class="form-control editarajax" id="remitenteport" name="remitenteport" data-model="configuracions" data-field="remitenteport" data-id="<?=$config['id']?>"  value="<?=$config['remitenteport']?>">
					</div>
					<div class="form-group">
						<label for="remitenteseguridad">  Seguridad </label>
						<select class="form-control editarajax" id="remitenteseguridad" name="remitenteseguridad" data-model="configuracions" data-field="remitenteseguridad" data-id="<?=$config['id']?>"  value="{{ $config->remitenteseguridad }}">
							<option value="ssl">SSL</option>
							<option value="tls">TLS</option>
							<option value="starttls">STARTTLS</option>
						</select>
					</div>
				</div>
			</div>
		</div>

	</div>