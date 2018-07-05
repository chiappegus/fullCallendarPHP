<?php
require './conector.php';

session_start();
$_SESSION['username'];

$campoID['id'] = "'" . $_POST['id'] . "'";

$setear['fechaInicio'] = "'" . $_POST['start_date'] . "'";
$setear['horaInicio']  = "'" . $_POST['start_hour'] . "'";
$setear['fechaFin']    = "'" . $_POST['end_date'] . "'";
$setear['horaFin']     = "'" . $_POST['end_hour'] . "'";

$con                  = new ConectorBD('localhost', 't_general', '12345');
$response['conexion'] = $con->initConexion('bdnext_u');

if ($response['conexion'] == "OK") {

    $cona                  = new ConectorBD('localhost', 't_create_user', '1234567890');
    $response['conexionn'] = $cona->initConexion('bdnext_u');

    $tabla     = "eventos";
    $condicion = "id=" . $campoID['id'];
    if ($response['conexionn'] == 'OK') {

        if ($cona->actualizarRegistro($tabla, $setear, $condicion)) {

            $response['msg'] = "exito en la Actualizacion";
        } else {
            $response['msg'] = "Hubo un error y los datos no han sido cargados";
        }
    } else {
        $response['msg'] = "No se pudo conectar a la base de datos";
    }

}
echo json_encode($response);

$con->cerrarConexion();
