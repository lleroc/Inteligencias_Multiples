<?php 
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/Tipo_Preguntas.models.php");
error_reporting(0); 

$Tipo_Preguntas= new Tipo_Preguntas;
switch ($_GET["op"]) {
/*TODO: Procedimiento para listar todos los registros */
case 'todos': 
$datos = array();
$datos = $Tipo_Preguntas->todos();
while ($row = mysqli_fetch_assoc($datos)) {
$todos[] = $row;
} 
echo json_encode($todos);
break; 
/*TODO: Procedimiento para sacar un registro */
 case 'uno': 
$idTipo_Preguntas = $_POST["idTipo_Preguntas"];
$datos = array();
$datos = $Tipo_Preguntas->uno($idTipo_Preguntas);
$res = mysqli_fetch_assoc($datos);
echo json_encode($res);
break; 
/*TODO: Procedimiento para insertar */
 case 'insertar': 
 $idTipo_Preguntas= $_POST["idTipo_Preguntas"];$NombreTipo= $_POST["NombreTipo"];$DescripcionTipo= $_POST["DescripcionTipo"];$RequiereImagen=$_POST["RequiereImagen"]; 

$datos = array();
$datos = $Tipo_Preguntas->Insertar($idTipo_Preguntas,$NombreTipo,$DescripcionTipo,$RequiereImagen);
echo json_encode($datos);  
break; 
/*TODO: Procedimiento para actualizar */
 case 'actualizar': 
$idTipo_Preguntas= $_POST["idTipo_Preguntas"];$NombreTipo= $_POST["NombreTipo"];$DescripcionTipo= $_POST["DescripcionTipo"];$RequiereImagen=$_POST["RequiereImagen"]; 
$datos = array();
$datos = $Tipo_Preguntas->Actualizar($idTipo_Preguntas,$NombreTipo,$DescripcionTipo,$RequiereImagen); 
echo json_encode($datos);
break; 
/*TODO: Procedimiento para eliminar */
 case 'eliminar': 
$idTipo_Preguntas=$_POST["idTipo_Preguntas"]; 
$datos = array(); 
$datos = $Tipo_Preguntas->Eliminar($idTipo_Preguntas);
echo json_encode($datos);
break; } 
