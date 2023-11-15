<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/Categorias.models.php");
error_reporting(0);

$Categorias = new Categorias;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Categorias->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $idCategorias = $_POST["idCategorias"];
        $datos = array();
        $datos = $Categorias->uno($idCategorias);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $idCategorias = $_POST["idCategorias"];
        $Encuestas_idEncuestas = $_POST["Encuestas_idEncuestas"];
        $NombreCategoria = $_POST["NombreCategoria"];
        $DescripcionCategoria = $_POST["DescripcionCategoria"];
        $NivelEducativo = $_POST["NivelEducativo"];

        $datos = array();
        $datos = $Categorias->Insertar($idCategorias, $Encuestas_idEncuestas, $NombreCategoria, $DescripcionCategoria, $NivelEducativo);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $idCategorias = $_POST["idCategorias"];
        $Encuestas_idEncuestas = $_POST["Encuestas_idEncuestas"];
        $NombreCategoria = $_POST["NombreCategoria"];
        $DescripcionCategoria = $_POST["DescripcionCategoria"];
        $NivelEducativo = $_POST["NivelEducativo"];
        $datos = array();
        $datos = $Categorias->Actualizar($idCategorias, $Encuestas_idEncuestas, $NombreCategoria, $DescripcionCategoria, $NivelEducativo);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $idCategorias = $_POST["idCategorias"];
        $datos = array();
        $datos = $Categorias->Eliminar($idCategorias);
        echo json_encode($datos);
        break;
}
