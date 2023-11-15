<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Imagenes
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Imagenes";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idImagenes)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Imagenes WHERE idImagenes = $idImagenes";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Opciones_Respuestas_idOpciones_Respuestas, $Preguntas_idPreguntas, $TituloImagen, $URLImagen, $DescripcionImagen)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Imagenes(Opciones_Respuestas_idOpciones_Respuestas,Preguntas_idPreguntas,TituloImagen,URLImagen,DescripcionImagen) values ( $Opciones_Respuestas_idOpciones_Respuestas,  $Preguntas_idPreguntas,  '$TituloImagen', '$URLImagen', '$DescripcionImagen')";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idImagenes, $Opciones_Respuestas_idOpciones_Respuestas, $Preguntas_idPreguntas, $TituloImagen, $URLImagen, $DescripcionImagen)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Imagenes set Opciones_Respuestas_idOpciones_Respuestas=$Opciones_Respuestas_idOpciones_Respuestas,Preguntas_idPreguntas=$Preguntas_idPreguntas,TituloImagen='$TituloImagen',URLImagen='$URLImagen',DescripcionImagen='$DescripcionImagen' where idImagenes= $idImagenes";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idImagenes)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Imagenes where idImagenes = $idImagenes";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
