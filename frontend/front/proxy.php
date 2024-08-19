<?php
// proxy.php

// URL de la API externa
$api_url = "http://integramensajerias.dyndns.org:8087/autodocweb/rest/andrea/consultarTrackingIntegra";

// Obtiene el cuerpo de la solicitud POST original
$request_body = file_get_contents('php://input');

// Crea una nueva solicitud a la API externa
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($request_body)
));

// Ejecuta la solicitud y obtén la respuesta
$response = curl_exec($ch);

// Decodifica la respuesta JSON
$responseData = json_decode($response, true);

// Accede al campo 'lista_trakings'
$listaTrakings = $responseData['lista_trakings'][0];
$listaTrakings2 = $responseData['lista_trakings'];

if($listaTrakings['estatusGuia'] == "NO REGISTRADA"){

    $html = '';
    // Cierra la conexión cURL
curl_close($ch);

// Devuelve la respuesta al cliente
header('Content-Type: application/json');

echo json_encode(array('html' => $html));
}
$html = '';
// foreach ($listaTrakings as $tracking) {
    $fechaMovimiento = $listaTrakings['fechaMovimiento']; // Cambia 'fecha_movimiento' al campo correcto
    $guiaEmbarque = $listaTrakings['guiaEmbarque'];
    $estatusGuia = $listaTrakings['estatusGuia'];
    $ubicacion = $listaTrakings['ubicacion'];
    $personaRecibio = $listaTrakings['personaRecibio'];
    $ruta = $listaTrakings['ruta'];
    $color = "";
    $icon = "";
    switch($estatusGuia){
        case 'ENTREGADO':
            $icon="fa-solid fa-boxes-stacked";
            $color="#28a745";
        break;
        case 'RECOLECCION':
            $icon="fa-solid fa-truck-ramp-box";
            $color="#007bff";
        break;
        case 'TRANSITO':
            $icon="fa-solid fa-truck-fast";
            $color="#FFCA2C";    
        break;
        default:
            $icon="fa-solid fa-box";
            $color="#007bff";    
        break;
    }
    // Agrega el HTML con los datos obtenidos
    $html .= '<div class="container card py-2 px-2 mb-3 d-flex flex-column" style="border-radius: 16px; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.085);">
                    <div class="col-12 d-flex flex-row justify-content-between align-items-center">
                        <label class="card col-4 text-start py-2" style="box-shadow: none; background: #F5F7FF; border-radius:13px;">
                            <p class="col-auto my-auto ms-3"><i class="'.$icon.' me-4"></i> Num.Guia : '. $guiaEmbarque .' </p>
                            </label>
                            <label class="card col-4 text-center py-2" style="box-shadow: none; background: none; border-radius:13px; border:none;">
                                <p class="col-auto my-auto">Fecha Movimiento :' . $fechaMovimiento . '</p>
                                </label>
                                <label class="card col-4 py-2 d-flex flex-wrap justify-content-end" style="box-shadow: none;  border-radius:13px; border:none;">
                                    <div class="col-auto d-flex flex-wrap justify-content-end" style=" ">
                                        <style>
                                            .cancelado {color: red; }
                                            .aprobado { color: #FFCA2C; } /* Amarillo */
                                            .revision { color: #28a745; } /* Verde */
                                            .diagnosticado { color: #007bff; } /* Azul */
                                        </style>
        
                                        <p class="col-auto my-auto ms-2" style="font-size:12px; ">'. $estatusGuia .'</p>
                                        <i class="fa-solid fa-circle mx-3 my-auto aprobado" style="color:'.$color.';"></i>
        
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 text-center d-flex justify-content-center flex-column">
                                <i id="iconoAbrir" class="fa-solid fa-chevron-down mb-1"></i>
                                <div id="divContP"  class="col-12 " style="display: none; background: #F5F7FF; border-radius: 10px;">
                                    <div class="col-12 d-flex flex-wrap">
                                        <div class="col-6 p-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label col-12 text-start ps-1">STATUS</label>
                                                <input type="text" class="form-control" value="'.$estatusGuia.'" id=""  disabled>
                                              </div>
                                        </div>
                                        <div class="col-6 p-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label col-12 text-start ps-1">UBICACION</label>
                                                <input type="text" class="form-control" value="'.$ubicacion.'" id="" disabled>
                                              </div>
                                        </div>
                                        <div class="col-6 p-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label col-12 text-start ps-1">PERSONA RECIBIO</label>
                                                <input type="text" class="form-control" value="'.$personaRecibio.'" id="" disabled>
                                              </div>
                                        </div>
                                        <div class="col-6 p-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label col-12 text-start ps-1">RUTA</label>
                                                <input type="text" class="form-control" value="'.$ruta.'" id="" disabled>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $("#iconoAbrir").click(function() {
                                    $("#divContP").stop().slideToggle("slow"); // Detiene la animación actual y aplica la animación de apertura o cierre
                                });
    
                            </script>
                        </div>';

    $html .= '';
// }
$count = 1;
 foreach ($listaTrakings2 as $tracking) {
    if($count != 1){
        $fechaMovimiento2 = $tracking['fechaMovimiento']; // Cambia 'fecha_movimiento' al campo correcto
        $guiaEmbarque2 = $tracking['guiaEmbarque'];
        $estatusGuia2 = $tracking['estatusGuia'];
        $ubicacion2 = $tracking['ubicacion'];
        $ruta2 = $tracking['ruta'];
    
        $color = "";
        $icon = "";
        switch($estatusGuia2){
            case 'ENTREGADO':
                $icon="fa-solid fa-boxes-stacked";
                $color="#28a745";
            break;
            case 'RECOLECCION':
                $icon="fa-solid fa-truck-ramp-box";
                $color="#007bff";
            break;
            case 'TRANSITO':
                $icon="fa-solid fa-truck-fast";
                $color="#FFCA2C";    
            break;
            default:
                $icon="fa-solid fa-box";
                $color="#007bff";    
            break;
        }
        $html .= '<div class="col-12 px-3 mb-3 d-flex flex-column">
        <div class="col-12 d-flex flex-row align-items-center justify-content-between">
            <div class=" d-flex flex-row align-items-center"><i class="'.$icon.' me-5 my-auto"></i>  <div class="col-auto d-flex flex-column"><h6 class="p-0 m-0">'. $estatusGuia2 .'</h6> <p class="p-0 m-0">Fecha : '. $fechaMovimiento2 .'</p></div></div>
            <i id="iconoAbrir'.$count.'" class="fa-solid fa-chevron-down mb-1"></i>
        </div>
        <div class="col-12 text-center d-flex justify-content-center flex-column">
            <div id="divContP'.$count.'"  class="col-12 " style="display: none; background: #F5F7FF; border-radius: 10px;">
                <div class="col-12 d-flex flex-wrap">
                    <div class="col-6 p-3">
                        <div class="mb-3">
                            <label for="" class="form-label col-12 text-start ps-1">UBICACION</label>
                            <input type="text" class="form-control" value="'.$ubicacion2.'" id="" disabled>
                          </div>
                    </div>
                    <div class="col-6 p-3">
                        <div class="mb-3">
                            <label for="" class="form-label col-12 text-start ps-1">RUTA</label>
                            <input type="text" class="form-control" value="'.$ruta2.'" id="" disabled>
                          </div>
                    </div>
                </div>
            </div>
            <script>
                $("#iconoAbrir'.$count.'").click(function() {
                    $("#divContP'.$count.'").stop().slideToggle("slow"); // Detiene la animación actual y aplica la animación de apertura o cierre
                });
    
            </script>
        </div>
        </div>
    ';
    }

$count++;
}

$html .= '</div>';


// Cierra la conexión cURL
curl_close($ch);

// Devuelve la respuesta al cliente
header('Content-Type: application/json');



echo json_encode(array('html' => $html));
?>