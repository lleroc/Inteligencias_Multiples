<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Encuestados
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Encuestados";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idEncuestados)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Encuestados WHERE idEncuestados = $idEncuestados";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($CedulaEncuestado, $NombresEncuestado, $ApellidosEncuestado, $CorreoElectronico, $Edad, $Genero, $FechaNacimiento, $LugarNacimiento)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Encuestados(CedulaEncuestado,NombresEncuestado,ApellidosEncuestado,CorreoElectronico,Edad,Genero,FechaNacimiento,LugarNacimiento) values ( '$CedulaEncuestado', '$NombresEncuestado', '$ApellidosEncuestado', '$CorreoElectronico', $Edad,  '$Genero', '$FechaNacimiento', '$LugarNacimiento')";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idEncuestados, $CedulaEncuestado, $NombresEncuestado, $ApellidosEncuestado, $CorreoElectronico, $Edad, $Genero, $FechaNacimiento, $LugarNacimiento)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Encuestados set CedulaEncuestado='$CedulaEncuestado',NombresEncuestado='$NombresEncuestado',ApellidosEncuestado='$ApellidosEncuestado',CorreoElectronico='$CorreoElectronico',Edad=$Edad,Genero='$Genero',FechaNacimiento='$FechaNacimiento',LugarNacimiento='$LugarNacimiento' where idEncuestados= $idEncuestados";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idEncuestados)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Encuestados where idEncuestados = $idEncuestados";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
