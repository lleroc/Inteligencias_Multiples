<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Encuestas_Respuestas
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Encuestas_Respuestas";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idEncuestas_Respuestas)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Encuestas_Respuestas WHERE idEncuestas_Respuestas = $idEncuestas_Respuestas";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Encuestados_idEncuestados, $Encuestas_idEncuestas, $Preguntas_idPreguntas, $Opciones_Respuestas_idOpciones_Respuestas, $FechaRespuesta, $RespuestaTexto)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Encuestas_Respuestas(Encuestados_idEncuestados,Encuestas_idEncuestas,Preguntas_idPreguntas,Opciones_Respuestas_idOpciones_Respuestas,FechaRespuesta,RespuestaTexto) values ( $Encuestados_idEncuestados,  $Encuestas_idEncuestas,  $Preguntas_idPreguntas,  $Opciones_Respuestas_idOpciones_Respuestas,  '$FechaRespuesta', '$RespuestaTexto',)";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idEncuestas_Respuestas, $Encuestados_idEncuestados, $Encuestas_idEncuestas, $Preguntas_idPreguntas, $Opciones_Respuestas_idOpciones_Respuestas, $FechaRespuesta, $RespuestaTexto)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Encuestas_Respuestas set Encuestados_idEncuestados=$Encuestados_idEncuestados,Encuestas_idEncuestas=$Encuestas_idEncuestas,Preguntas_idPreguntas=$Preguntas_idPreguntas,Opciones_Respuestas_idOpciones_Respuestas=$Opciones_Respuestas_idOpciones_Respuestas,FechaRespuesta='$FechaRespuesta',RespuestaTexto='$RespuestaTexto' where idEncuestas_Respuestas= $idEncuestas_Respuestas";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idEncuestas_Respuestas)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Encuestas_Respuestas where idEncuestas_Respuestas = $idEncuestas_Respuestas";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
