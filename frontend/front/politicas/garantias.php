<?=$headGNRL;?>
<?=$header;?>

    <?php
        $sql = 'SELECT * FROM politicas';
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $politica = $result[4];
    ?>

    <h1><?=$politica['titulo']?></h1>
    <p><?=$politica['descripcion']?></p>

<?=$footer;?>
