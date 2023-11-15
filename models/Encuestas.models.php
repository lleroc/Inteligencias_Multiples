<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Encuestas
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Encuestas";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idEncuestas)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Encuestas WHERE idEncuestas = $idEncuestas";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($TituloEncuesta, $DescripcionEncuesta, $FechaInicio, $FechaFin, $Activa)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Encuestas(TituloEncuesta,DescripcionEncuesta,FechaInicio,FechaFin,Activa) values ( '$TituloEncuesta', '$DescripcionEncuesta', '$FechaInicio', '$FechaFin', '$Activa')";
    
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idEncuestas, $TituloEncuesta, $DescripcionEncuesta, $FechaInicio, $FechaFin, $Activa)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Encuestas set TituloEncuesta='$TituloEncuesta',DescripcionEncuesta='$DescripcionEncuesta',FechaInicio='$FechaInicio',FechaFin='$FechaFin',Activa='$Activa' where idEncuestas= $idEncuestas";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idEncuestas)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Encuestas where idEncuestas = $idEncuestas";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
