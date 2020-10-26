<?php
include('../../functions/init.php');

$SQL = 'SELECT * FROM `report` WHERE report_id = \''.$_GET['rid'].'\'';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    $arr = json_decode($firstrow['rdata'], true);
  
?>
   <!-- <table cellspacing="0" style="margin-left:auto;margin-right:auto">
                      
                      <tbody>
                          <?php
                  /*        foreach($ar as $v){
                              for($i=0;$i<count($arr["data"]);$i++){ 
                            if($arr["data"][$i]["rt"] =="URINE"){
                              if($arr["data"][$i]["name"] !="lable"){
                                  echo '<tr>
                                          <td style="text-align:right">'.$arr["data"][$i]["name"].':</td>
                                          <td class="font-weight-bold" style="text-align:center">'.$arr["data"][$i]["value"].'</td>
                                          </tr>
                                      ';
                              }else{
                                  echo '<tr>
                                  <td colspan="3"><u><b>'.$arr["data"][$i]["value"].'</b></u></td>
                              </tr>';
                              }
                            }else{
                                if($arr["data"][$i]["name"] !="lable"){
                                    echo '<tr>
                                            <td style="text-align:right">'.$arr["data"][$i]["name"].':</td>
                                            <td class="font-weight-bold" style="text-align:center">'.$arr["data"][$i]["value"].'</td>
                                            <td style="text-align:center">'.$arr["data"][$i]["unit"].'</td>                                                         
                                            <td style="text-align:left">'.$arr["data"][$i]["range"].'</td>
                                            </tr>
                                        ';
                                }else{
                                    echo '<tr>
                                    <td colspan="3"><u><b>'.$arr["data"][$i]["value"].'</b></u></td>
                                </tr>';
                                }
                            }
                              }
                            }
*/
                          ?>
                          
                      </tbody> onafterprint="myFunction()"
                  </table> -->
                  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
    <style>
    *{
        font-family:'Courier New' !important;
        
    }
    .bold{
        font-weight:bold !important;
    }
    td{font-size:16px}
    button{
        background-color:blue;
        font-size:25px;
        color:#fff;
        float:center;
        width:100%;

    }
    </style>
</head>

<body onafterprint="myFunction()">
<div id="h1">
<center>
<button onclick="pr()">Print</button>
</center>
</div>
	<div id="page-wrap">

		
	
		
		<div style="clear:both"></div>
		
		<div id="customer">

		<table id="meta" style="float:left;width:48%">
                <tr>
                    <td class="meta-head">PATIENT NAME</td>
                    <td class="bold"><?php echo $firstrow['patient_name'];?></td>
                </tr>
                <tr>

                    <td class="meta-head">PATIENT ID</td>
                    <td class="bold"><?php echo $firstrow['patient_id'];?></td>
                </tr>
                <tr>
                    <td class="meta-head">REFERED BY</td>
                    <td class="bold"><?php echo $firstrow['pref'];?></td>
                </tr>

            </table>

            <table id="meta" style="width:48%">
                <tr>
                    <td class="meta-head">REPORT ID</td>
                    <td class="bold"><?php echo $firstrow['report_id'];?></td>
                </tr>
                <tr>

                    <td class="meta-head" style="font-size:14px">Date of collection</td>
                    <td style="font-size:14px"><?php echo $firstrow['date_added'];?></td>
                </tr>
                <tr>
                    <td class="meta-head" style="font-size:14px">Date of reporting</td>
                    <td style="font-size:14px"><div ><?php echo $firstrow['date_finished'];?></div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  
		  
		  
	
		  
          <?php
                            
                             /*   for($i=0;$i<count($arr["data"]);$i++){ 
                              if($arr["data"][$i]["rt"] =="URINE"){
                                if($arr["data"][$i]["name"] !="lable"){
                                    echo '<tr>
                                            <td style="text-align:right">'.$arr["data"][$i]["name"].':</td>
                                            <td class="font-weight-bold" style="text-align:center">'.$arr["data"][$i]["value"].'</td>
                                            </tr>
                                        ';
                                }else{
                                    echo '<tr>
                                    <td colspan="3"><u><b>'.$arr["data"][$i]["value"].'</b></u></td>
                                </tr>';
                                }
                              }else{
                                  if($arr["data"][$i]["name"] !="lable"){
                                      echo '<tr>
                                              <td style="text-align:right">'.$arr["data"][$i]["name"].':</td>
                                              <td class="font-weight-bold" style="text-align:center">'.$arr["data"][$i]["value"].'</td>
                                              <td style="text-align:center">'.$arr["data"][$i]["unit"].'</td>                                                         
                                              <td style="text-align:left">'.$arr["data"][$i]["range"].'</td>
                                              </tr>
                                          ';
                                  }else{
                                      echo '<tr>
                                      <td colspan="3"><u><b>'.$arr["data"][$i]["value"].'</b></u></td>
                                  </tr>';
                                  }
                              }
                                }
                            
                           */for($i=0;$i<count($arr["data"]);$i++){
                              if($arr["data"][$i]["rt"] =="URINE"){  
                            if($arr["data"][$i]["name"] !="lable"){
                                  echo '<tr class="item-row">
                                  <td class="item-name" style="text-align:right"><div class="delete-wpr">'.$arr["data"][$i]["name"].'<a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
                                  <td class=" bold" style="text-align:center" >'.$arr["data"][$i]["value"].'</td>        

                                          </tr>
                                      ';
                              }else{
                                  echo '<tr>
                                  <td colspan="4"><u><b>'.$arr["data"][$i]["value"].'</b></u></td>
                              </tr>';
                              }
                            }else{
                                if($arr["data"][$i]["name"] !="lable"){
                                  echo '<tr class="item-row">
                                  <td class="item-name" style="text-align:right"><div class="delete-wpr">'.$arr["data"][$i]["name"].'<a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
                                  <td class=" bold" style="text-align:center" >'.$arr["data"][$i]["value"].'</td>        
                                         <td style="text-align:center">'.$arr["data"][$i]["unit"].'</td>                                                         
                                          <td style="text-align:left">'.$arr["data"][$i]["range"].'</td>
                                          </tr>
                                      ';
                              }else{
                                  echo '<tr>
                                  <td colspan="4"><u><b>'.$arr["data"][$i]["value"].'</b></u></td>
                              </tr>';
                              }
                            }
                              }
                              

                          ?>


		</table>

	</div>
    <div id="h2">
<center>
<button onclick="pr()">Print</button>
</center>
</div>
<script>
function pr(){
    document.getElementById('h1').style.display = 'none';
    document.getElementById('h2').style.display = 'none';
    window.print();
}
function myFunction(){
    window.location.replace("http://localhost/pages/report");
}
</script>	
</body>

</html>