<?php
include('../../functions/init.php');


// Patient Data
$SQL2 = 'SELECT * FROM `patient` WHERE patient_id = \''.$_GET['pid'].'\'';
$result2 = query($SQL2);
confirm($result2);
$row = fetch_array($result2);

// Getting Report Data
$SQL = 'SELECT * FROM `report` WHERE report_id = \''.$_GET['rid'].'\'';
$result = query($SQL);
confirm($result);
$firstrow = fetch_array($result);
$rt = $firstrow['report_type'];
$ref = $firstrow['pref'];
function printTable($rt){
    
        $ar = explode(",",$rt);
        $script="";
        foreach($ar as $v){                      
        // Getting report type data
        if($v=="URINE"){
            
                $SQL = 'SELECT * FROM `report_type` WHERE report_id = \''.$v.'\'';
                $result = query($SQL);
                confirm($result);
                $firstrow = fetch_array($result);
                $arr = json_decode($firstrow['data'], true);
            echo '<tr><td colspan="4" align="center"><u><b>'.$firstrow['name'].'</b></u></td></tr>';
            for($i=0;$i<count($arr["data"]);$i++){   
                if($arr["data"][$i]["type"] =="lable"){
                    
                    echo '<tr>
                            <td colspan="3"><u><b>'.$arr["data"][$i]["unit"].'</b></u></td>
                        </tr>';
                }
            if($arr["data"][$i]["type"] =="field"){
                $default= "";
                if(isset($arr["data"][$i]["default"])){
                    $default=$arr["data"][$i]["default"];
                }
                echo '<tr>
                        <td style="text-align:right">'.$arr["data"][$i]["name"].'   :</td>
                        <td><input id="'.$arr["data"][$i]["rid"].'" type="text"  value="'.$default.'"   name="'.$arr["data"][$i]["rname"].'"></td>
                        </tr>
                    ';
            }
            }
            for($i=0;$i<count($arr["data"]);$i++){
                if($arr["data"][$i]["type"] =="script"){
                $script = $script.$arr["data"][$i]["unit"].';';
                }
                }
                
        }else{
        
        $SQL = 'SELECT * FROM `report_type` WHERE report_id = \''.$v.'\'';
        $result = query($SQL);
        confirm($result);
        $firstrow = fetch_array($result);
        $arr = json_decode($firstrow['data'], true);
    echo '<tr><td colspan="4" align="center"><u><b>'.$firstrow['name'].'</b></u></td></tr>';
       for($i=0;$i<count($arr["data"]);$i++){   
           if($arr["data"][$i]["type"] =="lable"){
              
               echo '<tr>
                       <td colspan="3"><u><b>'.$arr["data"][$i]["unit"].'</b></u></td>
                   </tr>';
           }
           $def = "";
           if(isset($arr["data"][$i]["default"])){
               $def = 'value="'.$arr["data"][$i]["default"].'"';
           }
       if($arr["data"][$i]["type"] =="field"){
           echo '<tr>
                   <td style="text-align:right">'.$arr["data"][$i]["name"].'   :</td>
                   <td><input id="'.$arr["data"][$i]["rid"].'" type="text" name="'.$arr["data"][$i]["rname"].'" '.$def.' ></td>
                   <td style="text-align:center">'.$arr["data"][$i]["unit"].'  </td>                                                         
                   <td style="text-align:center">'.$arr["data"][$i]["range"].'   </td>
                   </tr>
               ';
       }
       }
       for($i=0;$i<count($arr["data"]);$i++){
        if($arr["data"][$i]["type"] =="script"){
        $script = $script.$arr["data"][$i]["unit"].';';
        }
        }
    }
    }

   
   
   echo '</tbody>

</table>

</div>
<div class="row mt-2">
<button type="button" class="btn btn-primary" style="margin-left:auto;margin-right:0;font-size:30px;padding: 1px 10px" onclick="addBtn()" data-toggle="modal" data-target="#exampleModal"> + </button>
<input class="btn btn-success btn-block" style="margin-left:auto;margin-right:auto;width:100%"  type="submit" value="Save & Print"/>
</div>
   </form>
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
function addBtn(){console.log("hello");}
';
//$("#myd").val("11");
echo $script;

echo '</script>';
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
                        <!-- MODEL -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Select Report</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center bg-light">
                                <div class="row">
                                <?php
                                    $sql22 = 'SELECT * FROM `report_type`';
                                    $result22 = query($sql22);
                                    confirm($result22);
                                    while($row22 = fetch_array($result22)){
                                        if(getReportType($_GET['rid']) != $row22['report_id'] && strpos(str_replace(","," "," ".getReportType($_GET['rid'])),$row22['report_id']) == false ){
                                        
                                            echo strpos(getReportType($_GET['rid']),$row22['report_id']);
                                        echo '
                                        <div class="card col-xl-3 ml-2 mb-2">
                                        <a href="addR.php?rid='.$_GET['rid'].'&rt='.$row22['report_id'].'">
                                        <div class="card-body">
                                            '.$row22['report_id'].'
                                        </div>
                                        </a>
                                        </div>';
                                        }
                                    }
                                ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        <!-- MODEL -->
                        <div class="row ">
                            
                            <?php
 /* <h5>Patient ID : <span class="text-primary">BL-2</span> | Name : <span class="text-primary">SHUBH PATEL</span> | SEX : <span class="text-primary">MALE</span> | Report ID : <span class="text-primary">BL-2-1</span></h5> */                         
 echo '<h5>Name : <span class="text-primary">'.$row["full_name"].'</span> | SEX : <span class="text-primary">'.$row["sex"].'</span> | Report ID : <span class="text-primary">'.$_GET['rid'].'</span> | REF.BY. : <span class="text-primary">'.$ref.'</span></h5>';     

                          ?>
                            </div>
                            <div class="row ">
                                <form style="margin-left:auto;margin-right:auto" method="POST" action="po.php">
                                <input type="hidden" name="rid" value="<?php echo $_GET['rid'] ?>"/>
<table cellspacing="0" style="font-size:24px" >
                      
                                        <tbody style="color:#000">
                                           <?php  printTable($rt);?>
                    
    </body>
</html>
