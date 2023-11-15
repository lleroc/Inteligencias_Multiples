<?php
                require_once("../../Config/sesiones.php");
                if (isset($_SESSION["Usuario_IdRoles"])) {
                    $_SESSION["ruta"] = "Encuestas_Respuestas";
                ?> <!DOCTYPE html> 
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
                </div> <?php  require_once('../Html/menu.php') ?> 
 <div class='content'>
              
                <?php require_once('../Html/header.php') ?> 
 <?php  require_once('../Html/menu.php') ?> 
   <div class='container-fluid pt-4 px-4'>
                    <div class='bg-light text-center rounded p-4'>
                        <div class='d-flex align-items-center justify-content-between mb-4'>
                            <h6 class='mb-0'>Lista de Encuestas_Respuestas </h6>
                           
                            <button class='btn btn-primary' type='button' data-bs-toggle='modal' data-bs-target='#modalEncuestas_Respuestas'>
                                Nuevo
                            </button>
                        </div>
                        <div class='table-responsive'>
                            <table class='table text-start align-middle table-bordered table-hover mb-0'>
                                <thead> 
 <div class='table-responsive text-nowrap'>
                <table class='table card-table'>
                  <thead><tr> 
<th>#</th><th>Encuestados_idEncuestados</th><th>Encuestas_idEncuestas</th><th>Preguntas_idPreguntas</th><th>Opciones_Respuestas_idOpciones_Respuestas</th><th>FechaRespuesta</th><th>RespuestaTexto</th>
 </tr>
        </thead>
        <tbody id='tablaEncuestas_Respuestas'>
        </tbody>
                            </table>
                        </div>
                    </div>
                </div>
 
 <?php require_once('../Html/footer.php') ?>
  </div> 
 <a href='#' class='btn btn-lg btn-primary btn-lg-square back-to-top'><i class='bi bi-arrow-up'></i></a></div>  
      <!-- Start Modal -->  
<div class='modal fade' id='modalEncuestas_Respuestas' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                  <div class='modal-content'>
                  
                    <div class='modal-header'>
                      <h5 class='modal-title' id='titleLabelEncuestas_Respuestas'>Nuevo Encuestas_Respuestas</h5>
                      <button type='button' onclick='limpiacajas()' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <form method='post' id='Encuestas_Respuestas_form'>
                    <div class='modal-body'>
<input type='hidden' name='idEncuestas_Respuestas' id='idEncuestas_Respuestas'  /><div class='bg-light rounded h-100 p-4'>
                        <h6 class='mb-4'>Encuestados</h6>
                        <select name='combo_idEncuestados' id='combo_idEncuestados' class='form-select mb-3' aria-label=''>
                        <option selected>Seleccione una opción</option>
                    </select>
                       </div><div class='bg-light rounded h-100 p-4'>
                        <h6 class='mb-4'>Encuestas</h6>
                        <select name='combo_idEncuestas' id='combo_idEncuestas' class='form-select mb-3' aria-label=''>
                        <option selected>Seleccione una opción</option>
                    </select>
                       </div><div class='bg-light rounded h-100 p-4'>
                        <h6 class='mb-4'>Preguntas</h6>
                        <select name='combo_idPreguntas' id='combo_idPreguntas' class='form-select mb-3' aria-label=''>
                        <option selected>Seleccione una opción</option>
                    </select>
                       </div><div class='bg-light rounded h-100 p-4'>
                        <h6 class='mb-4'>Opciones</h6>
                        <select name='combo_Respuestas' id='combo_Respuestas' class='form-select mb-3' aria-label=''>
                        <option selected>Seleccione una opción</option>
                    </select>
                       </div><div class='row mb-3'>
                                <label class='form-control-label' for='FechaRespuesta'>FechaRespuesta</label> <div class='col-sm-10'>
                                    <input type='text' required class='form-control' name='FechaRespuesta' id='FechaRespuesta' placeholder='Ingrese elFechaRespuesta' />
                                    </div></div><div class='row mb-3'>
                                <label class='form-control-label' for='RespuestaTexto'>RespuestaTexto</label> <div class='col-sm-10'>
                                    <input type='text' required class='form-control' name='RespuestaTexto' id='RespuestaTexto' placeholder='Ingrese elRespuestaTexto' />
                                    </div></div> 
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
                <script src='./Encuestas_Respuestas.js'></script>
                </body>
            
                </html>
            
            <?php
            } else {
                header('Location:../../index.php');
            }
            
            ?> 
