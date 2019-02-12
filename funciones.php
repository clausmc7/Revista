<?php

function cambiarFormato($string) {
    $fecha=DateTime::createFromFormat('d/m/Y H:i', $string);
    $fecha_final= $fecha->format('Y-m-d h:i');
    return $fecha_final;
}
?>