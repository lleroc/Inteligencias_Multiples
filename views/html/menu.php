<div class='sidebar pe-4 pb-3'>
    <nav class='navbar bg-light navbar-light'>
        <a href='../Dashboard/' class='navbar-brand mx-4 mb-3'>
            <h3 class='text-primary'><i class='fa fa-hashtag me-2'></i>InMul</h3>
        </a>
        <div class='d-flex align-items-center ms-4 mb-4'>
            <div class='position-relative'>
                <img class='rounded-circle' src='img/user.jpg' alt='' style='width: 40px; height: 40px;'>
                <div class='bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1'></div>
            </div>
            <div class='ms-3'>
                <h6 class='mb-0'></h6>
                <span><?php  echo $_SESSION["Rol"] ?></span>
            </div>
        </div>
        <div class='navbar-nav w-100'>
            <a href='../Dashboard/' class='nav-item nav-link'><i class='fa fa-tachometer-alt me-2'></i>Dashboard</a>
            <?php if ($_SESSION["Rol"] == "Administrador") { ?>
                <a href='../Categorias/categorias.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Categorias de Preguntas</a>
                <a href='../Encuestados/Encuestados.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Encuestados</a>
                <a href='../Encuestas/Encuestas.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Encuestas</a>
                <a href='../Encuestas_Respuestas/Encuestas_Respuestas.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Respuestas de Encuestas</a>
                <a href='../Imagenes/Imagenes.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Imagenes de Preguntas</a>
                <a href='../Opciones_Respuestas/Opciones_Respuestas.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Opciones de Respuesta</a>
                <a href='../Preguntas/Preguntas.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Preguntas</a>
                <a href='../Tipo_Preguntas/Tipo_Preguntas.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Tipo de Preguntas</a>
                <!--<a href='../Usuarios/Usuarios.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Usuarios</a>
                <a href='../Usuarios_Roles/Usuarios_Roles.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Usuarios Roles</a>
            -->
            <?php } else if($_SESSION["Rol"] == "Odontólogo") {?>
                <a href='../Citas/Citas.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Citas</a>
                <a href='../Pacientes/Pacientes.php' class='nav-item nav-link'><i class='fa fa-th me-2'></i>Pacientes</a>

            <?php } ?>
        </div>
    </nav>
</div>