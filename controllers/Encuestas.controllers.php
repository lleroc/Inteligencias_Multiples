<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/Encuestas.models.php");
error_reporting(0);

$Encuestas = new Encuestas;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Encuestas->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $idEncuestas = $_POST["idEncuestas"];
        $datos = array();
        $datos = $Encuestas->uno($idEncuestas);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        
        $TituloEncuesta = $_POST["TituloEncuesta"];
        $DescripcionEncuesta = $_POST["DescripcionEncuesta"];
        $FechaInicio = $_POST["FechaInicio"];
        $FechaFin = $_POST["FechaFin"];
        $Activa = $_POST["Activa"];
        if($Activa == 'on'){
            $Activa = 1;
        }else{
            $Activa = 0;
        }

        $datos = array();
        $datos = $Encuestas->Insertar($TituloEncuesta, $DescripcionEncuesta, $FechaInicio, $FechaFin, $Activa);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $idEncuestas = $_POST["idEncuestas"];
        $TituloEncuesta = $_POST["TituloEncuesta"];
        $DescripcionEncuesta = $_POST["DescripcionEncuesta"];
        $FechaInicio = $_POST["FechaInicio"];
        $FechaFin = $_POST["FechaFin"];
        $Activa = $_POST["Activa"];
        if($Activa == 'on'){
            $Activa = 1;
        }else{
            $Activa = 0;
        }
        $datos = array();
        $datos = $Encuestas->Actualizar($idEncuestas, $TituloEncuesta, $DescripcionEncuesta, $FechaInicio, $FechaFin, $Activa);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $idEncuestas = $_POST["idEncuestas"];
        $datos = array();
        $datos = $Encuestas->Eliminar($idEncuestas);
        echo json_encode($datos);
        break;
}
