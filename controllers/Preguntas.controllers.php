<?php 
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/Preguntas.models.php");
error_reporting(0); 

$Preguntas= new Preguntas;
switch ($_GET["op"]) {
/*TODO: Procedimiento para listar todos los registros */
case 'todos': 
$datos = array();
$datos = $Preguntas->todos();
while ($row = mysqli_fetch_assoc($datos)) {
$todos[] = $row;
} 
echo json_encode($todos);
break; 
/*TODO: Procedimiento para sacar un registro */
 case 'uno': 
$idPreguntas = $_POST["idPreguntas"];
$datos = array();
$datos = $Preguntas->uno($idPreguntas);
$res = mysqli_fetch_assoc($datos);
echo json_encode($res);
break; 
/*TODO: Procedimiento para insertar */
 case 'insertar': 
 $idPreguntas= $_POST["idPreguntas"];$Categorias_idCategorias= $_POST["Categorias_idCategorias"];$Tipo_Preguntas_idTipo_Preguntas= $_POST["Tipo_Preguntas_idTipo_Preguntas"];$EnunciadoPregunta= $_POST["EnunciadoPregunta"];$FechaCreacion= $_POST["FechaCreacion"];$PreguntaPadre= $_POST["PreguntaPadre"];$Ponderacion=$_POST["Ponderacion"]; 

$datos = array();
$datos = $Preguntas->Insertar($idPreguntas,$Categorias_idCategorias,$Tipo_Preguntas_idTipo_Preguntas,$EnunciadoPregunta,$FechaCreacion,$PreguntaPadre,$Ponderacion);
echo json_encode($datos);  
break; 
/*TODO: Procedimiento para actualizar */
 case 'actualizar': 
$idPreguntas= $_POST["idPreguntas"];$Categorias_idCategorias= $_POST["Categorias_idCategorias"];$Tipo_Preguntas_idTipo_Preguntas= $_POST["Tipo_Preguntas_idTipo_Preguntas"];$EnunciadoPregunta= $_POST["EnunciadoPregunta"];$FechaCreacion= $_POST["FechaCreacion"];$PreguntaPadre= $_POST["PreguntaPadre"];$Ponderacion=$_POST["Ponderacion"]; 
$datos = array();
$datos = $Preguntas->Actualizar($idPreguntas,$Categorias_idCategorias,$Tipo_Preguntas_idTipo_Preguntas,$EnunciadoPregunta,$FechaCreacion,$PreguntaPadre,$Ponderacion); 
echo json_encode($datos);
break; 
/*TODO: Procedimiento para eliminar */
 case 'eliminar': 
$idPreguntas=$_POST["idPreguntas"]; 
$datos = array(); 
$datos = $Preguntas->Eliminar($idPreguntas);
echo json_encode($datos);
break; } 
