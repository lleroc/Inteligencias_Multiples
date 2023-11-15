<?php 
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/Encuestas_Respuestas.models.php");
error_reporting(0); 

$Encuestas_Respuestas= new Encuestas_Respuestas;
switch ($_GET["op"]) {
/*TODO: Procedimiento para listar todos los registros */
case 'todos': 
$datos = array();
$datos = $Encuestas_Respuestas->todos();
while ($row = mysqli_fetch_assoc($datos)) {
$todos[] = $row;
} 
echo json_encode($todos);
break; 
/*TODO: Procedimiento para sacar un registro */
 case 'uno': 
$idEncuestas_Respuestas = $_POST["idEncuestas_Respuestas"];
$datos = array();
$datos = $Encuestas_Respuestas->uno($idEncuestas_Respuestas);
$res = mysqli_fetch_assoc($datos);
echo json_encode($res);
break; 
/*TODO: Procedimiento para insertar */
 case 'insertar': 
 $idEncuestas_Respuestas= $_POST["idEncuestas_Respuestas"];$Encuestados_idEncuestados= $_POST["Encuestados_idEncuestados"];$Encuestas_idEncuestas= $_POST["Encuestas_idEncuestas"];$Preguntas_idPreguntas= $_POST["Preguntas_idPreguntas"];$Opciones_Respuestas_idOpciones_Respuestas= $_POST["Opciones_Respuestas_idOpciones_Respuestas"];$FechaRespuesta= $_POST["FechaRespuesta"];$RespuestaTexto=$_POST["RespuestaTexto"]; 

$datos = array();
$datos = $Encuestas_Respuestas->Insertar($idEncuestas_Respuestas,$Encuestados_idEncuestados,$Encuestas_idEncuestas,$Preguntas_idPreguntas,$Opciones_Respuestas_idOpciones_Respuestas,$FechaRespuesta,$RespuestaTexto);
echo json_encode($datos);  
break; 
/*TODO: Procedimiento para actualizar */
 case 'actualizar': 
$idEncuestas_Respuestas= $_POST["idEncuestas_Respuestas"];$Encuestados_idEncuestados= $_POST["Encuestados_idEncuestados"];$Encuestas_idEncuestas= $_POST["Encuestas_idEncuestas"];$Preguntas_idPreguntas= $_POST["Preguntas_idPreguntas"];$Opciones_Respuestas_idOpciones_Respuestas= $_POST["Opciones_Respuestas_idOpciones_Respuestas"];$FechaRespuesta= $_POST["FechaRespuesta"];$RespuestaTexto=$_POST["RespuestaTexto"]; 
$datos = array();
$datos = $Encuestas_Respuestas->Actualizar($idEncuestas_Respuestas,$Encuestados_idEncuestados,$Encuestas_idEncuestas,$Preguntas_idPreguntas,$Opciones_Respuestas_idOpciones_Respuestas,$FechaRespuesta,$RespuestaTexto); 
echo json_encode($datos);
break; 
/*TODO: Procedimiento para eliminar */
 case 'eliminar': 
$idEncuestas_Respuestas=$_POST["idEncuestas_Respuestas"]; 
$datos = array(); 
$datos = $Encuestas_Respuestas->Eliminar($idEncuestas_Respuestas);
echo json_encode($datos);
break; } 
