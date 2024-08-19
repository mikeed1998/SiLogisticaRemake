<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'db_silogistica';

    try {
        // Cadena DSN (Data Source Name)
        $dsn = 'mysql:host=' . $host . ';dbname=' . $database;
      
        // Crear la conexión PDO
        $conexion = new PDO($dsn, $user, $password);
      
        // Configurar el modo de error en PDO::ERRMODE_EXCEPTION para manejar excepciones
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
    } catch (PDOException $e) {
        // Manejar los errores de conexión
        echo 'Error al conectar a la base de datos: ' . $e->getMessage();
    }


