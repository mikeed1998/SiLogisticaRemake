<?php
    session_start();

    // Verificar si el usuario está logueado como admin
    if (!isset($_SESSION['admin_id'])) {
        header('Location: adminlogin');
        exit();
    }
