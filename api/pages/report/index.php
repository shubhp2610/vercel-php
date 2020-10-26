<?php
include('../../functions/init.php');
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
    <body class="sb-nav-fixed" style="background-color:#ededed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="http://localhost">Balaji Laboratory</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
          
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php navbar(); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <h1 class="mt-1">Reports <a href="newR.php" class="btn btn-success">New Report</a><div class="float-right"><a href="history.php" class="btn btn-warning">History</a></div></h1>
                    
                       <div class="row ">
                            <div class="col-xl-12  p-3 mt-2 ">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                        <tr style="background-color:#fff">
                                            <th>Id</th>
                                            <th>Report Details</th>
                                            <th>Time Added</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php
                                            $sql = 'SELECT * FROM `report` WHERE `status` = \'pending\' ';
                                            $result = query($sql);
                                                confirm($result);
                                                while($row = fetch_array($result)){
                                                        echo'
                                                        <tr class="report-block">
                                                        <td class="text-center">'.$row['report_id'].'</td>
                                                        <td class="text-center">'.$row['patient_name'].'<br><span class="report-n">'.$row['report_name'].'</span></td>';
                                                        if(date( 'd-m-Y', time () )==substr($row['date_added'],0,10)){
                                                            echo '<td class="text-center">'.substr($row['date_added'],11).'</td>';
                                                        }else{
                                                           echo '<td class="text-center"><b>'.substr($row['date_added'],0,11)."</b><br>".substr($row['date_added'],11).'</td>';
                                                        }
                                                        
                                                        echo '
                                                        <td class="text-center"><span class="rs-pending">Pending</span</td>
                                                        <td class="text-right"><a href="dataR.php?rid='.$row['report_id'].'&pid='.$row['patient_id'].'" class="btn btn-success">Fill Report</a>
                                                        <a href="del.php?redir=index&rid='.$row['report_id'].'" class="btn btn-danger"><img src="http://localhost/assets/img/trash.svg" width="20px" alt=""></a></td>
                                                    </tr>
                                                        ';
                                               }                                         
                                               
                                               $sql = 'SELECT * FROM `report` WHERE `status` = \'completed\' AND `date_added` LIKE \'%'.date( 'd-m-Y', time () ).'%\' ';
                                            $result = query($sql);
                                                confirm($result);
                                                while($row = fetch_array($result)){
                                                        echo'
                                                        <tr class="report-block">
                                                        <td class="text-center">'.$row['report_id'].'</td>
                                                        <td class="text-center">'.$row['patient_name'].'<br><span class="report-n">'.$row['report_name'].'</span></td>
                                                        <td class="text-center">'.substr($row['date_added'],11).'</td>
                                                        ';
                                                        switch($row['status']){
                                                            case 'pending':
                                                                echo '<td class="text-center"><span class="rs-pending">Pending</span</td>';
                                                                echo '<td class="text-right"><a href="dataR.php?rid='.$row['report_id'].'&pid='.$row['patient_id'].'" class="btn btn-success">Fill Report</a>';
                                                                break;
                                                            case 'completed':
                                                                echo '<td class="text-center"><span class="rs-comp">Completed</span</td>';
                                                                echo '<td class="text-right"><a href="print.php?rid='.$row['report_id'].'&pid='.$row['patient_id'].'" class="btn btn-success">Print</a>';
                                                                break;
                                                        }
                                                        
                                                        echo '
                                                        <a href="del.php?redir=index&rid='.$row['report_id'].'" class="btn btn-danger"><img src="http://localhost/assets/img/trash.svg" width="20px" alt=""></a></td>
                                                    </tr>
                                                        ';
                                               }
                                               
                                               ?>
                                      
                                        
                                <tbody>
                            </table>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                </main>
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
        <script>
            $(document).ready(function() {
                    $('#dataTable1').DataTable( {
                        order : [[ 3, "desc" ]], paging: false
                    } );
                } );
        </script>
    </body>
</html>