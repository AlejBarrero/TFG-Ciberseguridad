<?php

function redirect($url){

    header("Location: ".$url);

    exit();

}

function limpiar($dato){

    return trim($dato);

}

function mostrarFecha($fecha){

    return date("d/m/Y H:i",strtotime($fecha));

}

?>