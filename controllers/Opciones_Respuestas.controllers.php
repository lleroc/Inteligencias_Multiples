<?php 
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/Opciones_Respuestas.models.php");
error_reporting(0); 

$Opciones_Respuestas= new Opciones_Respuestas;
switch ($_GET["op"]) {
/*TODO: Procedimiento para listar todos los registros */
case 'todos': 
$datos = array();
$datos = $Opciones_Respuestas->todos();
while ($row = mysqli_fetch_assoc($datos)) {
$todos[] = $row;
} 
echo json_encode($todos);
break; 
/*TODO: Procedimiento para sacar un registro */
 case 'uno': 
$idOpciones_Respuestas = $_POST["idOpciones_Respuestas"];
$datos = array();
$datos = $Opciones_Respuestas->uno($idOpciones_Respuestas);
$res = mysqli_fetch_assoc($datos);
echo json_encode($res);
break; 
/*TODO: Procedimiento para insertar */
 case 'insertar': 
 $idOpciones_Respuestas= $_POST["idOpciones_Respuestas"];$Preguntas_idPreguntas= $_POST["Preguntas_idPreguntas"];$TextoOpcion= $_POST["TextoOpcion"];$Valor=$_POST["Valor"]; 

$datos = array();
$datos = $Opciones_Respuestas->Insertar($idOpciones_Respuestas,$Preguntas_idPreguntas,$TextoOpcion,$Valor);
echo json_encode($datos);  
break; 
/*TODO: Procedimiento para actualizar */
 case 'actualizar': 
$idOpciones_Respuestas= $_POST["idOpciones_Respuestas"];$Preguntas_idPreguntas= $_POST["Preguntas_idPreguntas"];$TextoOpcion= $_POST["TextoOpcion"];$Valor=$_POST["Valor"]; 
$datos = array();
$datos = $Opciones_Respuestas->Actualizar($idOpciones_Respuestas,$Preguntas_idPreguntas,$TextoOpcion,$Valor); 
echo json_encode($datos);
break; 
/*TODO: Procedimiento para eliminar */
 case 'eliminar': 
$idOpciones_Respuestas=$_POST["idOpciones_Respuestas"]; 
$datos = array(); 
$datos = $Opciones_Respuestas->Eliminar($idOpciones_Respuestas);
echo json_encode($datos);
break; } 
