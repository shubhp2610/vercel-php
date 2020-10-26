<?php
include('./functions/init.php');
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Balaji Lab</title>
        <link href="http://localhost/css/styles.css" rel="stylesheet" />
        <link href="http://localhost/css/dataTables.bootstrap4.min.css" rel="stylesheet"  />
        <script src="http://localhost/js/all.min.js" ></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Balaji Laboratory</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
          
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php navbar(); ?>
            </div>
   
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Pending Reports</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <p class="display-4 text-white stretched-link" href="#"><?php Tpending(); ?></p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Completed Reports</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p class="display-4 text-white stretched-link" href="#"><?php TcompToday();?> </p>
                                     </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Total Completed</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p class="display-4 text-white stretched-link" href="#"><?php Tcomp(); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Total Patients</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p class="display-4 text-white stretched-link" href="#"><?php Tpat(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <!--  <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                 
                                </div>
                            </div>
                        </div>-->
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="http://localhost/js/jquery-3.5.1.min.js" ></script>
        <script src="http://localhost/js/bootstrap.bundle.min.js" ></script>
        <script src="http://localhost/js/scripts.js"></script>
        <script src="http://localhost/js/Chart.min.js" ></script>
        <script src="http://localhost/assets/demo/chart-area-demo.js"></script>
        <script src="http://localhost/assets/demo/chart-bar-demo.js"></script>
        <script src="http://localhost/js/jquery.dataTables.min.js" ></script>
        <script src="http://localhost/js/dataTables.bootstrap4.min.js" ></script>
        <script src="http://localhost/assets/demo/datatables-demo.js"></script>
    </body>
</html>
