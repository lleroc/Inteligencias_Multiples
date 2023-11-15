<?php
require_once('../../Config/sesiones.php');
if (isset($_SESSION['Usuario_IdRoles'])) {
    $_SESSION['ruta'] = 'Administración General';
?>


    <!DOCTYPE html>
    <html lang='es'>

    <head>
        <?php require_once('../Html/head.php') ?>
        <link href='../../public/lib/calendar/lib/main.css' rel='stylesheet' />
        
    </head>

    <body>
        <div class='container-xxl position-relative bg-white d-flex p-0'>
            <!-- Spinner Start
            <div id='spinner' class='show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center'>
                <div class='spinner-border text-primary' style='width: 3rem; height: 3rem;' role='status'>
                    <span class='sr-only'>Cargando...</span>
                </div>
            </div>
             Spinner End -->


            <!-- Sidebar Start -->
            <?php require_once('../Html/menu.php') ?>
            <!-- Sidebar End -->


            <!-- Content Start -->
            <div class='content'>
                <!-- Navbar Start -->
                <?php require_once('../Html/header.php') ?>
                <!-- Navbar End -->


                
            <div class='container-fluid pt-4 px-4'>
                <div class='row g-4'>
                    <div class='col-sm-6 col-xl-3'>
                        <div class='bg-light rounded d-flex align-items-center justify-content-between p-4'>
                            <i class='fa fa-chart-line fa-3x text-primary'></i>
                            <div class='ms-3'>
                                <p class='mb-2'>Today Sale</p>
                                <h6 class='mb-0'>$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-6 col-xl-3'>
                        <div class='bg-light rounded d-flex align-items-center justify-content-between p-4'>
                            <i class='fa fa-chart-bar fa-3x text-primary'></i>
                            <div class='ms-3'>
                                <p class='mb-2'>Total Sale</p>
                                <h6 class='mb-0'>$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-6 col-xl-3'>
                        <div class='bg-light rounded d-flex align-items-center justify-content-between p-4'>
                            <i class='fa fa-chart-area fa-3x text-primary'></i>
                            <div class='ms-3'>
                                <p class='mb-2'>Today Revenue</p>
                                <h6 class='mb-0'>$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-6 col-xl-3'>
                        <div class='bg-light rounded d-flex align-items-center justify-content-between p-4'>
                            <i class='fa fa-chart-pie fa-3x text-primary'></i>
                            <div class='ms-3'>
                                <p class='mb-2'>Total Revenue</p>
                                <h6 class='mb-0'>$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             


                <!-- Sales Chart Start-->
            <div class='container-fluid pt-4 px-4'>
                <div class='row g-4'>
                    <div class='col-sm-12 col-xl-6'>
                        <div class='bg-light text-center rounded p-4'>
                            <div class='d-flex align-items-center justify-content-between mb-4'>
                                <h6 class='mb-0'>Worldwide Sales</h6>
                                <a href=''>Show All</a>
                            </div>
                            <canvas id='worldwide-sales'></canvas>
                        </div>
                    </div>
                    <div class='col-sm-12 col-xl-6'>
                        <div class='bg-light text-center rounded p-4'>
                            <div class='d-flex align-items-center justify-content-between mb-4'>
                                <h6 class='mb-0'>Salse & Revenue</h6>
                                <a href=''>Show All</a>
                            </div>
                            <canvas id='salse-revenue'></canvas>
                        </div>
                    </div>
                </div>
            </div>
          <!-- Sales Chart End -->


              
                <!-- Recent Sales End -->


                <!-- Widgets Start -->

                <!-- Widgets End -->


                <!-- Footer Start -->
                <?php require_once('../Html/footer.php') ?>
                <!-- Footer End -->
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a href='#' class='btn btn-lg btn-primary btn-lg-square back-to-top'><i class='bi bi-arrow-up'></i></a>
        </div>

    
        <?php require_once('../Html/scripts.php') ?>

    </body>

    </html>

<?php
} else {
    header('Location:../../index.php');
}

?>