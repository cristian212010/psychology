<?php

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Camper.php");

$camper = new Persona();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET['op']) {
    case 'GetAll':
        $datos=$camper->get_persona();
        echo json_encode($datos);
        break;
    case 'GetId':
        $datos = $camper->get_persona_id($body['id']);
        echo json_encode($datos);
        break;
    case 'insert':
        $datos = $camper->insert_persona($body['nombre'], $body['telefono'], $body['correo'], $body['documento'], $body['tipo_documento'], $body['tipo_persona']);
        echo json_encode("Insertado correctamente");
        break;
    default:
        break;
}

?>