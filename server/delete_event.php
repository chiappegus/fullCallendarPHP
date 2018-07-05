<?php
require './conector.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location:logout.php");
}

$_SESSION['username'];

$campoID['id'] = "'" . $_POST['id'] . "'";

$con                  = new ConectorBD('localhost', 't_general', '12345');
$response['conexion'] = $con->initConexion('bdnext_u');

if ($response['conexion'] == "OK") {

    $cona                  = new ConectorBD('localhost', 't_create_user', '1234567890');
    $response['conexionn'] = $cona->initConexion('bdnext_u');

    $tabla     = "eventos";
    $condicion = "id=" . $campoID['id'];
    if ($response['conexionn'] == 'OK') {

        if ($cona->eliminarRegistro($tabla, $condicion)) {

            $response['msg'] = "exito en la eliminacion fue con exito";
        } else {
            $response['msg'] = "Hubo un error y los datos no han sido borrados";
        }
    } else {
        $response['msg'] = "No se pudo conectar a la base de datos";
    }

}
echo json_encode($response);

$con->cerrarConexion();
