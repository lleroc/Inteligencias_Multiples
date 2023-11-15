<?php 
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/Encuestados.models.php");
error_reporting(0); 

$Encuestados= new Encuestados;
switch ($_GET["op"]) {
/*TODO: Procedimiento para listar todos los registros */
case 'todos': 
$datos = array();
$datos = $Encuestados->todos();
while ($row = mysqli_fetch_assoc($datos)) {
$todos[] = $row;
} 
echo json_encode($todos);
break; 
/*TODO: Procedimiento para sacar un registro */
 case 'uno': 
$idEncuestados = $_POST["idEncuestados"];
$datos = array();
$datos = $Encuestados->uno($idEncuestados);
$res = mysqli_fetch_assoc($datos);
echo json_encode($res);
break; 
/*TODO: Procedimiento para insertar */
 case 'insertar': 
 $idEncuestados= $_POST["idEncuestados"];$CedulaEncuestado= $_POST["CedulaEncuestado"];$NombresEncuestado= $_POST["NombresEncuestado"];$ApellidosEncuestado= $_POST["ApellidosEncuestado"];$CorreoElectronico= $_POST["CorreoElectronico"];$Edad= $_POST["Edad"];$Genero= $_POST["Genero"];$FechaNacimiento= $_POST["FechaNacimiento"];$LugarNacimiento=$_POST["LugarNacimiento"]; 

$datos = array();
$datos = $Encuestados->Insertar($idEncuestados,$CedulaEncuestado,$NombresEncuestado,$ApellidosEncuestado,$CorreoElectronico,$Edad,$Genero,$FechaNacimiento,$LugarNacimiento);
echo json_encode($datos);  
break; 
/*TODO: Procedimiento para actualizar */
 case 'actualizar': 
$idEncuestados= $_POST["idEncuestados"];$CedulaEncuestado= $_POST["CedulaEncuestado"];$NombresEncuestado= $_POST["NombresEncuestado"];$ApellidosEncuestado= $_POST["ApellidosEncuestado"];$CorreoElectronico= $_POST["CorreoElectronico"];$Edad= $_POST["Edad"];$Genero= $_POST["Genero"];$FechaNacimiento= $_POST["FechaNacimiento"];$LugarNacimiento=$_POST["LugarNacimiento"]; 
$datos = array();
$datos = $Encuestados->Actualizar($idEncuestados,$CedulaEncuestado,$NombresEncuestado,$ApellidosEncuestado,$CorreoElectronico,$Edad,$Genero,$FechaNacimiento,$LugarNacimiento); 
echo json_encode($datos);
break; 
/*TODO: Procedimiento para eliminar */
 case 'eliminar': 
$idEncuestados=$_POST["idEncuestados"]; 
$datos = array(); 
$datos = $Encuestados->Eliminar($idEncuestados);
echo json_encode($datos);
break; } 
