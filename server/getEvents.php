<?php

require 'conector.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location:logout.php");
} else {

    $con                  = new ConectorBD('localhost', 't_general', '12345');
    $response['conexion'] = $con->initConexion('bdnext_u');

    if ($response['conexion'] == "OK") {

        $resultado_consulta = $con->consultar(['usuarios'],
            ['id'], 'WHERE email="' . $_SESSION['username'] . '"');

        $fila = $resultado_consulta->fetch_assoc();

        $id = $fila['id'];

        if ($resultado_consulta1 = $con->consultar(['eventos'],
            ['*'], 'WHERE idUser="' . $id . '"')) {

            $i = 0;
            while ($fila = $resultado_consulta1->fetch_assoc()) {

                $response['data'][$i]['id']    = $fila['id'];
                $response['data'][$i]['title'] = $fila['titulo'];
                $response['data'][$i]['start'] = $fila['fechaInicio'] . 'T' . $fila['horaInicio'];
                $response['data'][$i]['end']   = $fila['fechaFin'] . 'T' . $fila['horaFin'];
                $i++;

            }

            $resultado_consulta1->free();

        }

        echo json_encode($response['data']);

        $con->cerrarConexion();
    }
}
