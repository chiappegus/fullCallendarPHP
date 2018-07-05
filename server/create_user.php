

<?php

include 'conector.php';

session_start();

$data['nombre'] = "'" . $_POST['nombre'] . "'";

$data['email'] = "'" . $_POST['email'] . "'";

$data['pasw'] = "'" . password_hash($_POST['contrasena'], PASSWORD_DEFAULT) . "'";

$con                  = new ConectorBD('localhost', 't_create_user', '1234567890');
$response['conexion'] = $con->initConexion('bdnext_u');

if ($response['conexion'] == 'OK') {
    if ($con->insertData('usuarios', $data)) {

        $_SESSION['username'] = $_POST['nombre'];
        $response['msg']      = "exito en la inserción";
    } else {
        $response['msg'] = "Hubo un error y los datos no han sido cargados";
    }
} else {
    $response['msg'] = "No se pudo conectar a la base de datos";
}

echo json_encode($response);

?>
