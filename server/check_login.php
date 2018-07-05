<?php

require './conector.php';

$con                  = new ConectorBD('localhost', 't_general', '12345');
$response['conexion'] = $con->initConexion('bdnext_u');
if ($response['conexion'] == "OK") {
    $resultado_consulta = $con->consultar(['usuarios'],
        ['email', 'pasw'], 'WHERE email="' . $_POST['username'] . '"');

    $fila = $resultado_consulta->fetch_assoc();

    $response['sql'] = $resultado_consulta->num_rows;

    if ($resultado_consulta->num_rows != 0) {

        if (password_verify($_POST['password'], $fila['pasw'])) {
            $response['acceso'] = 'concedido';
            session_start();
            $_SESSION['username'] = $_POST['username'];

        } else {

            $response['acceso'] = 'rechazados';

        }
    } else {

        $response['acceso'] = 'rechazado';
    }

}

echo json_encode($response);
$con->cerrarConexion();
