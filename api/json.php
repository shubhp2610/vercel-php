<?php

$json = '{
    "data": [
      {
        "name": "HAEMOGLOBIN",
        "unit": "GM%",
        "range": "MALE:13.0 to 18.0GM %<br>FEMALE:12.0 -16.0GM %"
      },{
        "name": "script",
        "unit": "console.log(\"hello\")",
        "range": "0"
      },
      {
        "name": "TOTAL COUNT",
        "unit": "/cumm",
        "range": "4,000 to 10,000 /cumm"
      },
      {
        "name": "lable",
        "unit": "DIFFERANCIAL LEUCOCYTES COUNT",
        "range": "0"
      },
      {
        "name": "POLYMORPHAS",
        "unit": "%",
        "range": "( 40 - 70 %)"
      },
      {
        "name": "POLYMORPHAS",
        "unit": "%",
        "range": "( 40 - 70 %)"
      },
      {
        "name": "LYMPHOCYTES",
        "unit": "%",
        "range": "( 20 - 40 %)"
      },
      {
        "name": "EOSINOPHILS",
        "unit": "%",
        "range": "( 01 - 06 %)"
      },
      {
        "name": "MONOCYTES",
        "unit": "%",
        "range": "( 02 - 06 %)"
      },
      {
        "name": "BASOPHILS",
        "unit": "%",
        "range": "( 00 - 01 %)"
      },
      {
        "name": "PLATELET  COUNT",
        "unit": "/cumm",
        "range": "(150000 - 500000/cumm)"
      },
      {
        "name": "R.B.C.  COUNT",
        "unit": "X 106/Cumm",
        "range": "(4.0-6.0X106/cumm)"
      },
      {
        "name": " H.C.T.",
        "unit": "%",
        "range": "( 36-52 % )"
      },
      {
        "name": " M.C.V.",
        "unit": "/cumm",
        "range": "(82 -92 cumm )"
      },
      {
        "name": "M.C.H.",
        "unit": "pg",
        "range": "( 27-32 pg )"
      },
      {
        "name": "M.C.H.C.",
        "unit": "%",
        "range": "( 32-36 % )"
      },
      {
        "name": " E.S.R. (Westergren Method)",
        "unit": "mm/1 hour ",
        "range": "(1 -20 mm/1 hour)"
      },
      {
        "name": "RANDOM BLOOD SUGAR",
        "unit": "mg/dl",
        "range": "( 70 - 140 mg/dl )"
      }
    ]
  }';

                         

 $arr = json_decode($json, true);
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
<table cellspacing="0" style="margin-left:auto;margin-right:auto">
                      
                                        <tbody>
                                            <?php
                                                for($i=0;$i<count($arr["data"]);$i++){ 
                                                if($arr["data"][$i]["name"] !="lable"){
                                                    echo '<tr>
                                                            <td style="text-align:right">'.$arr["data"][$i]["name"].':</td>
                                                            <td><input type="text" name="d'.$i.'"></td>
                                                            <td style="text-align:center">'.$arr["data"][$i]["unit"].':</td>                                                         
                                                            <td style="text-align:left">'.$arr["data"][$i]["range"].':</td>
                                                            </tr>
                                                        ';
                                                }else{
                                                    echo '<tr>
                                                    <td colspan="3"><u><b>'.$arr["data"][$i]["unit"].'</b></u></td>
                                                </tr>';
                                                }
                                                }
                                                

                                            ?>
                                            
                                        </tbody>
                                    </table>
                                    <?php
                                    $a2 = json_encode($arr);
                                    $ar2 = json_decode($a2,true);
                                    echo "<br>". $ar2["data"][1]["unit"];
                                    ?>
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
        //$("#myd").val("11");
        <?php
        for($i=0;$i<count($arr["data"]);$i++){
                                                if($arr["data"][$i]["name"] =="script"){
                                                    echo $arr["data"][$i]["unit"].';';
                                                }
                                                }
                                                ?>
                                                </script>
    </body>
</html>

  