<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Opciones_Respuestas
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Opciones_Respuestas";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idOpciones_Respuestas)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Opciones_Respuestas WHERE idOpciones_Respuestas = $idOpciones_Respuestas";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Preguntas_idPreguntas, $TextoOpcion, $Valor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Opciones_Respuestas(Preguntas_idPreguntas,TextoOpcion,Valor) values ( $Preguntas_idPreguntas,  '$TextoOpcion', '$Valor')";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idOpciones_Respuestas, $Preguntas_idPreguntas, $TextoOpcion, $Valor)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Opciones_Respuestas set Preguntas_idPreguntas=$Preguntas_idPreguntas,TextoOpcion='$TextoOpcion',Valor='$Valor' where idOpciones_Respuestas= $idOpciones_Respuestas";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idOpciones_Respuestas)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Opciones_Respuestas where idOpciones_Respuestas = $idOpciones_Respuestas";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
