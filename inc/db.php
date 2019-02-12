<?php

$connect= mysqli_connect("127.0.0.1", "root", "", "nueva_alimentaria")or die('No se pudo conectar: ' . mysqli_error());
if (!mysqli_set_charset($connect, "utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($connect));
    exit();
} else {
    
}
?>