<?php
require_once("../../Config/sesiones.php");
if (isset($_SESSION["Usuario_IdRoles"])) {
    $_SESSION["ruta"] = "Encuestas";
?>
    <!DOCTYPE html>
    <html lang='es'>
    <?php require_once('../Html/head.php') ?>
    </head>

    <body>
        <div class='container-xxl position-relative bg-white d-flex p-0'>
            <!-- Spinner Start -->
            <div id='spinner' class='show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center'>
                <div class='spinner-border text-primary' style='width: 3rem; height: 3rem;' role='status'>
                    <span class='sr-only'>Cargando...</span>
                </div>
            </div> <?php require_once('../Html/menu.php') ?>
            <div class='content'>

                <?php require_once('../Html/header.php') ?>
                <?php require_once('../Html/menu.php') ?>
                <div class='container-fluid pt-4 px-4'>
                    <div class='bg-light text-center rounded p-4'>
                        <div class='d-flex align-items-center justify-content-between mb-4'>
                            <h6 class='mb-0'>Lista de Encuestas </h6>

                            <button class='btn btn-primary' type='button' data-bs-toggle='modal' data-bs-target='#modalEncuestas'>
                                Nuevo
                            </button>
                        </div>
                        <div class='table-responsive'>
                            <table class='table text-start align-middle table-bordered table-hover mb-0'>
                                <thead>
                                    <div class='table-responsive text-nowrap'>
                                        <table class='table card-table'>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>TituloEncuesta</th>
                                                    <th>DescripcionEncuesta</th>
                                                    <th>FechaInicio</th>
                                                    <th>FechaFin</th>
                                                    <th>Activa</th>
                                                </tr>
                                            </thead>
                                            <tbody id='tablaEncuestas'>
                                            </tbody>
                                        </table>
                                    </div>
                        </div>
                    </div>

                    <?php require_once('../Html/footer.php') ?>
                </div>
                <a href='#' class='btn btn-lg btn-primary btn-lg-square back-to-top'><i class='bi bi-arrow-up'></i></a>
            </div>
            <!-- Start Modal -->
            <div class='modal fade' id='modalEncuestas' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>

                        <div class='modal-header'>
                            <h5 class='modal-title' id='titleLabelEncuestas'>Nuevo Encuestas</h5>
                            <button type='button' onclick='limpiacajas()' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <form method='post' id='Encuestas_form'>
                            <div class='modal-body'>
                                <input type='hidden' name='idEncuestas' id='idEncuestas' />
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='TituloEncuesta'>Titulo de la Encuesta</label>
                                    <div class='col-sm-10'>
                                        <input type='text' required class='form-control' name='TituloEncuesta' id='TituloEncuesta' placeholder='Ingrese elTituloEncuesta' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='DescripcionEncuesta'>Descripcion de la Encuesta</label>
                                    <div class='col-sm-10'>
                                        <textarea type='text' required class='form-control' name='DescripcionEncuesta' id='DescripcionEncuesta' placeholder='Ingrese elDescripcionEncuesta'></textarea>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='FechaInicio'>Fecha Inicio</label>
                                    <div class='col-sm-10'>
                                        <input type='date' required class='form-control' name='FechaInicio' id='FechaInicio' placeholder='Ingrese elFechaInicio' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='FechaFin'>Fecha Fin</label>
                                    <div class='col-sm-10'>
                                        <input type='date' required class='form-control' name='FechaFin' id='FechaFin' placeholder='Ingrese elFechaFin' />
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <label class='form-control-label' for='Activa'>Activa</label>
                                    <div class='col-sm-10'>
                                        <input type='checkbox'   name='Activa' id='Activa'/>
                                    </div>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type='submit' name='action' value='add' class='btn btn-primary'> Guardar</button>
                                <button type='button' class='btn btn-dark' data-bs-dismiss='modal' onclick='limpiacajas()'>Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--End Modal -->
            <?php require_once('../Html/scripts.php') ?>
            <script src='./Encuestas.js'></script>
    </body>

    </html>

<?php
} else {
    header('Location:../../index.php');
}

?>