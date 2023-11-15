<?php
//error_reporting(0);
/*TODO: Requerimientos */
require_once('../config/sesiones.php');

switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros 
    case 'todos':
        $datos = array();
        $datos = $Usuarios->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
       
    case 'uno':
        $idUsuarios = $_POST["idUsuarios"];
        $datos = array();
        $datos = $Usuarios->uno($idUsuarios);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
     
    case 'insertar':
        $Nombres = $_POST["Nombres"];
        $Apellidos = $_POST["Apellidos"];
        $Correo = $_POST["Correo"];
        $Contrasenia = $_POST["Contrasenia"];
        $Roles_idRoles = $_POST["idRoles"];
        $datos = array();
        $datos = $Usuarios->Insertar($Nombres, $Apellidos, $Correo, $Contrasenia, $Roles_idRoles);
        echo json_encode($datos);
        break;
      
    case 'actualizar':
        $idUsuarios = $_POST["idUsuarios"];
        $Nombres = $_POST["Nombres"];
        $Apellidos = $_POST["Apellidos"];
        $Correo = $_POST["Correo"];
        $Contrasenia = $_POST["Contrasenia"];
        $Roles_idRoles = $_POST["Roles_idRoles"];
        $datos = array();
        $datos = $Usuarios->Actualizar($idUsuarios, $Nombres, $Apellidos, $Correo, $Contrasenia, $Roles_idRoles);
        echo json_encode($datos);
        break;
        
    case 'eliminar':
        $idUsuarios = $_POST["idUsuarios"];
        $datos = array();
        $datos = $Usuarios->Eliminar($idUsuarios);
        echo json_encode($datos);
        break;
        */
    case 'login':
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];

        //TODO: Si las variables estab vacias rgersa con error
        if (empty($correo) or  empty($contrasenia)) {
            header("Location:../index.php?op=2");
            exit();
        }
       
       /* try {
            $datos = array();
        $datos = $Usuarios->login($correo, $contrasenia);
        $res = mysqli_fetch_assoc($datos);
        } catch (Throwable $th) {
            header("Location:../index.php?op=1");
            exit();
        }
       */
        

       $_SESSION["idUsuarios"] = '01';
       $_SESSION["Usuarios_Nombres"] = "Administrador";
       $_SESSION["Usuarios_Apellidos"] = "General";
       $_SESSION["Usuarios_Correo"] = 'correo@gmail.com';
       $_SESSION["Usuario_IdRoles"] = 1;
       $_SESSION["Rol"] = "Administrador";
       header("Location:../views/Dashboard/");
       exit();

        //TODO:Control de si existe el registro en la base de datos
        try {
            if (is_array($res) and count($res) > 0) {
                if ((md5($contrasenia) == ($res["Contrasenia"]))) {
                    $datos2 = array();
                    $datos2 = $Accesos->Insertar(date("Y-m-d H:i:s"), $res["idUsuarios"],'ingreso');
                   
                    $_SESSION["idUsuarios"] = $res["idUsuarios"];
                    $_SESSION["Usuarios_Nombres"] = $res["Nombres"];
                    $_SESSION["Usuarios_Apellidos"] = $res["Apellidos"];
                    $_SESSION["Usuarios_Correo"] = $res["Correo"];
                    $_SESSION["Usuario_IdRoles"] = $res["idRoles"];
                    $_SESSION["Rol"] = $res["Rol"];
                    header("Location:../views/Dashboard/");
                    exit();
                }else{
                    header("Location:../index.php?op=1");
                    exit();
                }
            } else {
                header("Location:../index.php?op=1");
                exit();
            }
        } catch (Exception $th) {
            echo($th->getMessage());
        }
        break;
}
