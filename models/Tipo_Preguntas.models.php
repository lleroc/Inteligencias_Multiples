<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Tipo_Preguntas
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Tipo_Preguntas";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idTipo_Preguntas)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Tipo_Preguntas WHERE idTipo_Preguntas = $idTipo_Preguntas";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($NombreTipo, $DescripcionTipo, $RequiereImagen,)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Tipo_Preguntas(NombreTipo,DescripcionTipo,RequiereImagen,) values ( '$NombreTipo', '$DescripcionTipo', '$RequiereImagen',)";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idTipo_Preguntas, $NombreTipo, $DescripcionTipo, $RequiereImagen)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Tipo_Preguntas set NombreTipo='$NombreTipo',DescripcionTipo='$DescripcionTipo',RequiereImagen='$RequiereImagen' where idTipo_Preguntas= $idTipo_Preguntas";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idTipo_Preguntas)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Tipo_Preguntas where idTipo_Preguntas = $idTipo_Preguntas";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
