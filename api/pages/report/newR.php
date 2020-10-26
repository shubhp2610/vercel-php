<?php
include('../../functions/init.php');
include('dr.php');
function namet(){
    if(isset($_GET['id'])){
        echo 'display:none';
    }
    if(!isset($_GET['id']) && !isset($_GET['type'])){
        echo 'display:none';
    }
}
function typet(){
    if(isset($_GET['type'])){
        echo 'display:none';
    }
}
function getid(){
    if(isset($_GET['id'])){
        echo 'value="'.$_GET['id'].'"';
    }
    
}
function gett(){
    if(isset($_GET['type'])){
        echo 'value="'.$_GET['type'].'"';
    }
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //


    //
    if($_POST['typess']){
        $rtype = strtoupper(RemoveSpecialChar($_POST['typess']));
    }else{
        $rtype = NULL;
    }
    if($_POST['pid']){
        $pid = RemoveSpecialChar($_POST['pid']);
    }else{
        $pid = NULL;
    }
    if($_POST['ref']){
        $ref = RemoveSpecialChar($_POST['ref']);
    }else{
        $ref = NULL;
    }

    $sqll = 'SELECT * FROM `patient` WHERE patient_id = \''.$pid.'\'';
    $result = query($sqll);
    confirm($result);
    $firstrow = fetch_array($result);
    $rid = $pid."-".($firstrow['total_reports']+1);
    $rn = $firstrow['total_reports']+1;
    $pn = $firstrow['full_name'];
    echo $rid;
    $rarr = explode(" ",$rtype);
    echo $rtype;
    $i=0;
    $riid = "";
    $rnaa = "";
    foreach($rarr as $v){
        echo $v;
        if($v){
           
    $sqll = 'SELECT * FROM `report_type` WHERE report_id = \''.$v.'\'';
    $result = query($sqll);
    confirm($result);
    $firstrow = fetch_array($result);
    
    if($i>0){
        $riid=$riid.",".$v;
        $rnaa = $rnaa." , ".$firstrow['name'];
    }else{
        $riid = $v;
        $rnaa = $firstrow['name'];
    }
    $i++;
        }
    }


    $fsql = 'INSERT INTO `report` (`report_id`, `patient_id`,`patient_name`, `report_type`,`report_name`, `pref`, `rdata`, `date_added`, `date_finished`, `status`, `bill`, `payment_method`) VALUES (\''.$rid.'\', \''.$pid.'\', \''.$pn.'\', \''.$riid.'\',\''.$rnaa.'\', \''.$ref.'\', NULL, \''.date( 'd-m-Y h:i:s A', time () ).'\' , NULL, \'pending\', NULL, \'0\')';
    echo $fsql;
    $result2 = query($fsql);
    confirm($result2);

    $fsql = 'UPDATE `patient` SET total_reports = \''.$rn.'\' WHERE patient_id = \''.$pid.'\'';
    $result2 = query($fsql);
    confirm($result2);
    header('Location: /pages/report/');

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
                        <h1 class="mt-1">New Report</h1>
                        
                        <div class="row ">
                            <div class="col-lg-4 px-3">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    
                                    <div class="card-body">
                                        <form method="POST" autocomplete="off">
                                        <div class="form-group">
                                                <label class="mb-1" for="inputPID">Patient ID</label>
                                                <input class="form-control py-4" id="inputPID" type="text" <?php getid() ?> name="pid" aria-describedby="emailHelp" onfocus="idp()"  >
                                            </div>
                                            <div class="form-group">
                                                <label class=" mb-1" for="inputRT">Report Type</label>
                                                <input class="form-control py-4" id="inputRTI" type="text"  aria-describedby="emailHelp" onfocus="typ()"  >
                                               <br>
                                                <div class="selR" id="inputRT" onclick="typ()">
                                               
                                               </div>
                                            </div>
                                            <input type="hidden" id="typess" name="typess" value=""/>
                                            
                                            <div class="form-group">
                                                        <label class=" mb-1" for="ref">REFERED BY: </label>
                                                <input class="form-control py-4" id="ref" type="text"  name="ref" aria-describedby="emailHelp" onfocus="dri()"  >
                                              
                                                    </div>
                                            <div class="form-group mt-4 mb-0"><input type="submit" class="btn btn-success btn-block" value="Add"></div>
                                        </form>
                                    </div>
                                 
                                </div>
                            </div>
                            <div class="col-lg-8">
                            <div class="table-responsive" id="types" style="<?php typet() ?>">
                                    <table class="table table-bordered" id="dataTable11" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                              
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $sqll = "SELECT * FROM `report_type`";
                                                $result = query($sqll);
                                                confirm($result);
                                                while($row = fetch_array($result)){
                                                    if(strlen($row['name'])>0){
                                                    echo '<tr>
                                                        <td>'.$row['report_id'].'</td>
                                                        <td>'.$row['name'].'</td>
                                                        </tr>
                                                    ';
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!------->
                            <div class="table-responsive" id="names" style="<?php namet() ?>">
                                    
                                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                              
                                            </tr>
                                        </tfoot>
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
                                                        </tr>
                                                    ';
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="new" class="card shadow-lg border-0 rounded-lg mt-5">
                                    
                                    <div class="card-body">
                                        <form method="POST" action="http://localhost/pages/patient/addP.php">
                                        <input type="hidden" name="rdir" value="newR">
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
                                            <div class="form-group mt-4 mb-0"><input id="sub" onclick="disBtn()" type="submit" class="btn btn-success btn-block" value="Add"></div>
                                        </form>
                                    </div>
                                 
                                </div>
                            
                                <div class="table-responsive" id="dr">
                                <?php dr();?>
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
            function disBtn(){
                document.getElementById("sub").innerHTML = "<img src=\"http://localhost/assets/loading.gif\"/>";
            }
           // window.print(); 
           $("#inputRT").css("height","45px");
           document.getElementById("names").style.display = "block";
           document.getElementById("types").style.display = "none";
           document.getElementById("dr").style.display = "none";
           document.getElementById("new").style.display = "none";
           function typ(){
            document.getElementById("types").style.display = "block";
            document.getElementById("names").style.display = "none";
            document.getElementById("dr").style.display = "none";
            document.getElementById("new").style.display = "none";
           }
           function idp(){
            document.getElementById("names").style.display = "block";
            document.getElementById("types").style.display = "none";
            document.getElementById("dr").style.display = "none";
            document.getElementById("new").style.display = "none";
           }
           function dri(){
            document.getElementById("dr").style.display = "block";
            document.getElementById("names").style.display = "none";
            document.getElementById("new").style.display = "none";
            document.getElementById("types").style.display = "none";
           }
           var pickedup;
                                                

           $(document).ready(function() {


            $('#dataTable11').DataTable( {  paging: false } );
                $('#dataTable3').DataTable( {  paging: false } );
                $('#dataTable2').DataTable( {
                    order : [[ 0, "desc" ]], paging: false
                } );

                $( "#dataTable3 tbody tr" ).on( "click", function( event ) {
                        
                        // get back to where it was before if it was selected :
                        if (pickedup != null) {
                            pickedup.css( "background-color", "#fff" );
                        }
                
                        $("#ref").val($(this).find("td").eq(0).html());
                        $( this ).css( "background-color", "#E1ECF4" );
                
                        pickedup = $( this );
                    });

                    $( "#dataTable2 tbody tr" ).on( "click", function( event ) {
                        
                        // get back to where it was before if it was selected :
                        if (pickedup != null) {
                            pickedup.css( "background-color", "#fff" );
                        }
                
                        $("#inputPID").val($(this).find("td").eq(0).html());
                        $( this ).css( "background-color", "#E1ECF4" );
                
                        pickedup = $( this );
                    });
                    var i=0;
                    $( "#dataTable11 tbody tr" ).on( "click", function( event ) {
                        $("#inputRT").css("height","auto");
                        // get back to where it was before if it was selected :
                        if (pickedup != null) {
                            pickedup.css( "background-color", "#fff" );
                        }
                        if(!$("#typess").val().includes($(this).find("td").eq(0).html())){
                        $("#typess").val($("#typess").val()+","+$(this).find("td").eq(0).html());
                        i = i+1;
                        $("#inputRT").html($("#inputRT").html()+'<span class="selRT" id="r'+(i)+'">'+$(this).find("td").eq(0).html()+'<button type="button" class="btn-danger" onclick="del(r'+(i)+')" >X</button></span>');
                        }
                        
                       // $("#inputRT").val($(this).find("td").eq(0).html());
                        $( this ).css( "background-color", "#E1ECF4" );
                
                        pickedup = $( this );
                    });

                        var dataTable = $('#dataTable2').dataTable();
                        $("#ref").keyup(function() {
                            $('#dataTable3').dataTable().fnFilter(this.value);
                        });
                        $("#inputRTI").keyup(function() {
                            $('#dataTable11').dataTable().fnFilter(this.value);
                        });
                    $("#inputPID").keyup(function() {
                        dataTable.fnFilter(this.value);
                        if($('#dataTable2').dataTable().fnSettings().fnRecordsDisplay()==0){
                            document.getElementById("names").style.display = "none";
                            document.getElementById("new").style.display = "block";
                            document.getElementById("inputEmailAddress").value = document.getElementById("inputPID").value;
                        }else{
                            document.getElementById("names").style.display = "block";
                            document.getElementById("new").style.display = "none";
                        }
                    });    

                }); 
                function del(v){
                    var array = $(v).eq(0).html().split("<");
                    console.log(array[0]);
                    var str = $("#typess").val();
                    console.log(str);
                    var str = str.replace(array[0], "");
                    $("#typess").val(str);
                    $(v).remove();
                }
                
        </script>
    </body>
</html>
