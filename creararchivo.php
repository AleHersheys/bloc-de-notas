<?php
    $ar = fopen('archivo.txt', 'w+') or die ('Error al crear archivo de texto.');

    $asu = $_REQUEST['nombre'];
    $des = $_REQUEST['descripcion'];
    
    fwrite($ar, $asu);
    fwrite($ar, "\n");
    fwrite($ar, $des);
    fwrite($ar, "\n");
    
    $mensaje = 'Archivo de texto creado.';
    header('location:../index.php?msg='.$mensaje);
    
?>