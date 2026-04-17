<?php 
include_once "../../util/funciones.php";
include_once "../../controller/datosPersonales.php";

$datos = data_submitted();

$objDatosPersonales = new DatosPersonales();

if ($objDatosPersonales->esMayorDeEdad($datos)){
    $message = $datos['edad'];
    header("Location: ../pages/destinoDatosPersonales.php?Message=" . urlencode($message));
    exit;
} else {
    $message = $datos['edad'];
    header("Location: ../pages/destinoDatosPersonales.php?Message=" . urlencode($message));
    exit;
}

?>