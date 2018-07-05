<?php
//ALTER TABLE eventos ADD FOREIGN KEY (idUser) REFERENCES usuarios(id)

require './conector.php';

session_start();
$_SESSION['username'];

$response['papa']       = $_POST['titulo'];
$response['start_hour'] = $_POST['start_hour'];

$con                  = new ConectorBD('localhost', 't_general', '12345');
$response['conexion'] = $con->initConexion('bdnext_u');

if ($response['conexion'] == "OK") {

    $resultado_consulta = $con->consultar(['usuarios'],
        ['email', 'pasw', 'id'], 'WHERE email="' . $_SESSION['username'] . '"');

    $fila = $resultado_consulta->fetch_assoc();

    $response['paswowow'] = $fila['pasw'];
    $response['id']       = $fila['id'];

    $data['idUser']      = "'" . $fila['id'] . "'";
    $data['fechaInicio'] = "'" . $_POST['start_date'] . "'";
    $data['horaInicio']  = "'" . $_POST['start_hour'] . "'";
    $data['fechaFin']    = "'" . $_POST['end_date'] . "'";
    $data['horaFin']     = "'" . $_POST['end_hour'] . "'";
    $data['titulo']      = "'" . $_POST['titulo'] . "'";

    $cona                  = new ConectorBD('localhost', 't_create_user', '1234567890');
    $response['conexionn'] = $cona->initConexion('bdnext_u');

    if ($response['conexionn'] == 'OK') {
        if ($cona->insertData('eventos', $data)) {

            $response['msg'] = "exito en la inserción";
        } else {
            $response['msg'] = "Hubo un error y los datos no han sido cargados";
        }
    } else {
        $response['msg'] = "No se pudo conectar a la base de datos";
    }

}
echo json_encode($response);

$con->cerrarConexion();
