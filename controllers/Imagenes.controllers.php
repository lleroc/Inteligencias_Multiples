<?php 
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/Imagenes.models.php");
error_reporting(0); 

$Imagenes= new Imagenes;
switch ($_GET["op"]) {
/*TODO: Procedimiento para listar todos los registros */
case 'todos': 
$datos = array();
$datos = $Imagenes->todos();
while ($row = mysqli_fetch_assoc($datos)) {
$todos[] = $row;
} 
echo json_encode($todos);
break; 
/*TODO: Procedimiento para sacar un registro */
 case 'uno': 
$idImagenes = $_POST["idImagenes"];
$datos = array();
$datos = $Imagenes->uno($idImagenes);
$res = mysqli_fetch_assoc($datos);
echo json_encode($res);
break; 
/*TODO: Procedimiento para insertar */
 case 'insertar': 
 $idImagenes= $_POST["idImagenes"];$Opciones_Respuestas_idOpciones_Respuestas= $_POST["Opciones_Respuestas_idOpciones_Respuestas"];$Preguntas_idPreguntas= $_POST["Preguntas_idPreguntas"];$TituloImagen= $_POST["TituloImagen"];$URLImagen= $_POST["URLImagen"];$DescripcionImagen=$_POST["DescripcionImagen"]; 

$datos = array();
$datos = $Imagenes->Insertar($idImagenes,$Opciones_Respuestas_idOpciones_Respuestas,$Preguntas_idPreguntas,$TituloImagen,$URLImagen,$DescripcionImagen);
echo json_encode($datos);  
break; 
/*TODO: Procedimiento para actualizar */
 case 'actualizar': 
$idImagenes= $_POST["idImagenes"];$Opciones_Respuestas_idOpciones_Respuestas= $_POST["Opciones_Respuestas_idOpciones_Respuestas"];$Preguntas_idPreguntas= $_POST["Preguntas_idPreguntas"];$TituloImagen= $_POST["TituloImagen"];$URLImagen= $_POST["URLImagen"];$DescripcionImagen=$_POST["DescripcionImagen"]; 
$datos = array();
$datos = $Imagenes->Actualizar($idImagenes,$Opciones_Respuestas_idOpciones_Respuestas,$Preguntas_idPreguntas,$TituloImagen,$URLImagen,$DescripcionImagen); 
echo json_encode($datos);
break; 
/*TODO: Procedimiento para eliminar */
 case 'eliminar': 
$idImagenes=$_POST["idImagenes"]; 
$datos = array(); 
$datos = $Imagenes->Eliminar($idImagenes);
echo json_encode($datos);
break; } 
