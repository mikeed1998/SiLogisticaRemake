<?=$headGNRL;?>
<?=$header;?>

    <?php
        $sql = 'SELECT * FROM politicas';
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $politica = $result[3];
    ?>

    <section>
		<div class="bg-global">
			<div class="col-12 text-center p-4" style="background-color: black; color: white;">
				<div class="d-inline" style="font-size:24px;color: white;"> <?=$politica['titulo']?> </div>
			</div>
		</div>
	</section>
	<div class="container"  style="min-height:55vh">
		<div class="my-4 p-5" style="background:url(img/photos/nosotros/bg-contacto.png);/* background-repeat: no-repeat; */background-position: center;">
			<div class="col-12 col-md-8 p-4 mx-auto bg-white" style="border: .5em solid #e6e6e6;">
                <?=$politica['descripcion']?>
			</div>
		</div>
	</div>

<?=$footer;?>