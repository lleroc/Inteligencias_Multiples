<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Preguntas
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Preguntas";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idPreguntas)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Preguntas WHERE idPreguntas = $idPreguntas";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Categorias_idCategorias, $Tipo_Preguntas_idTipo_Preguntas, $EnunciadoPregunta, $FechaCreacion, $PreguntaPadre, $Ponderacion)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Preguntas(Categorias_idCategorias,Tipo_Preguntas_idTipo_Preguntas,EnunciadoPregunta,FechaCreacion,PreguntaPadre,Ponderacion,) values ( $Categorias_idCategorias,  $Tipo_Preguntas_idTipo_Preguntas,  '$EnunciadoPregunta', '$FechaCreacion', $PreguntaPadre,  '$Ponderacion')";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idPreguntas, $Categorias_idCategorias, $Tipo_Preguntas_idTipo_Preguntas, $EnunciadoPregunta, $FechaCreacion, $PreguntaPadre, $Ponderacion)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Preguntas set Categorias_idCategorias=$Categorias_idCategorias,Tipo_Preguntas_idTipo_Preguntas=$Tipo_Preguntas_idTipo_Preguntas,EnunciadoPregunta='$EnunciadoPregunta',FechaCreacion='$FechaCreacion',PreguntaPadre=$PreguntaPadre,Ponderacion='$Ponderacion' where idPreguntas= $idPreguntas";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idPreguntas)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Preguntas where idPreguntas = $idPreguntas";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
