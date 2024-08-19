<?php

// session_start();

    if (!isset($_SESSION['admin_id'])) {
        header('Location: adminlogin');
        exit();
    } elseif (isset($_SESSION['user_id'])) {
        header('Location: Dashboard');
        exit();
    }

    $sql = 'SELECT * FROM seccions';
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $secciones = $result;
?>



<div class="container">
    <div class="row justify-content-center">
            <?php
                foreach($secciones as $s) {
                    echo '
                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 p-2">
                            <a href="admin_'.$s['seccion'].'"  class="card h-100 card1" style="box-shadow: none; border-radius: 16px;">
                                <span class="card-body text-muted text-center">
                                    <i class="'.$s['portada'].' mb-3 fs-1"></i> <br>
                                    <span class="icon_c text-capitalize fs-5" style="font-family:\'Neusharp Bold\';">'.$s['seccion'].'</span>
                                </span>
                            </a>
                        </div>
                    ';
                }
            ?>
        </div>
    </div>
</div>
    





    


