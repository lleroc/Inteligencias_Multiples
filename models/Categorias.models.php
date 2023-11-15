<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Categorias
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from Categorias";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idCategorias)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Categorias WHERE idCategorias = $idCategorias";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Encuestas_idEncuestas, $NombreCategoria, $DescripcionCategoria, $NivelEducativo)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Categorias(Encuestas_idEncuestas,NombreCategoria,DescripcionCategoria,NivelEducativo) values ( $Encuestas_idEncuestas,  '$NombreCategoria', '$DescripcionCategoria', '$NivelEducativo')";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idCategorias, $Encuestas_idEncuestas, $NombreCategoria, $DescripcionCategoria, $NivelEducativo)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Categorias set Encuestas_idEncuestas=$Encuestas_idEncuestas,NombreCategoria='$NombreCategoria',DescripcionCategoria='$DescripcionCategoria',NivelEducativo='$NivelEducativo' where idCategorias= $idCategorias";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idCategorias)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Categorias where idCategorias = $idCategorias";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
