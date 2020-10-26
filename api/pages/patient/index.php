<?php
include('../../functions/init.php');
/*if($_SERVER['REQUEST_METHOD'] == "POST"){
    //
    $sqll = "SELECT * FROM `patient` ORDER BY id DESC";
    $result = query($sqll);
    confirm($result);
    $firstrow = fetch_array($result);
    $lid = explode('-',$firstrow['patient_id']);
    $lid[1] = $lid[1] + 1;
    $p_id = 'BL-'.$lid[1];
    //
    if($_POST['name']){
        $name = strtoupper(RemoveSpecialChar($_POST['name']));
    }else{
        $name = NULL;
    }
    if($_POST['email']){
        $email = RemoveSpecialChar($_POST['email']);
    }else{
        $email = NULL;
    }
    if($_POST['mobile']){
        $mobile = RemoveSpecialChar($_POST['mobile']);
    }else{
        $mobile = NULL;
    }
    $sex = $_POST['sex'];

    $fsql = 'INSERT INTO `patient` (`id`, `patient_id`, `full_name`, `email`, `mobile`, `sex`,`total_reports`, `total_billing`) VALUES (NULL, \''.$p_id.'\', \''.$name.'\', \''.$email.'\', \''.$mobile.'\', \''.$sex.'\', \'0\', \'0\');';
    $result2 = query($fsql);
    confirm($result2);
}*/
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
                        <h1 class="mt-1">Patients <a href="addP.php" class="btn btn-success">Add</a></h1>
                        
                        <div class="row justify-content-center">
                        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered " id="dataTable1" width="100%" cellspacing="0" style="background-color:#fff">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Total Reports</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                                $sqll = "SELECT * FROM `patient` ORDER BY id DESC";
                                                $result = query($sqll);
                                                confirm($result);
                                                while($row = fetch_array($result)){
                                                    if(strlen($row['full_name'])>0){
                                                    echo '<tr>
                                                        <td>'.$row['patient_id'].'</td>
                                                        <td>'.$row['full_name'].'</td>
                                                        <td>'.$row['total_reports'].'</td>
                                                        <td><a href="../report/newR.php?id='.$row['patient_id'].'" class="btn btn-primary">New Report</a><a href="../report/history.php?id='.$row['patient_id'].'" class="btn btn-warning ml-1">History</a></td>
                                                        </tr>
                                                    ';
                                                    }
                                                }

                                            ?>
                                            
                                        </tbody>
                                    </table>
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
                    order : [[ 0, "desc" ]]
                } );
            } );
        </script>
    </body>
</html>
