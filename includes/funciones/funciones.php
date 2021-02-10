<?php 
$datos=datos_json($extras, $servicios);
echo $datos;
function datos_json(&$extras, &$servicios){
    $opciones_json=array();
    foreach($extras as $extra):
        $opciones_json['extras'][]=$extra;
    endforeach;
    foreach($servicios as $servicio):
        $opciones_json['servicios'][]=$servicio;
    endforeach;
    return json_encode($opciones_json);
}
?>