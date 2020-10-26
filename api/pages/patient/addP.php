<?php
include('../../functions/init.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){

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
   if($_POST['rdir']=="newR"){
       header('Location: /pages/report/newR.php?id='.$p_id);
   }else{
   header('Location: /pages/patient/');
  }
}
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
                        <h1 class="mt-1">Add Patient</h1>
                        
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class=" mb-1" for="inputEmailAddress">Full Name</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="text" name="name" aria-describedby="emailHelp" placeholder="Enter Full Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email address">
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class=" mb-1" for="inputPassword">Mobile</label>
                                                        <input class="form-control py-4" id="inputPassword" type="text" name="mobile" placeholder="Enter Mobile">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class=" mb-1" for="sex">Sex</label>
                                                        <div class="py-1">
                                                        <select class="py-2" style="width:100%" id="sex" name="sex">
                                                        <option value="MALE">MALE</option>
                                                        <option value="FEMALE">FEMALE</option>
                                                        </select>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><input type="submit" class="btn btn-success btn-block" value="Add"></div>
                                        </form>
                                    </div>
                                 
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
    </body>
</html>
