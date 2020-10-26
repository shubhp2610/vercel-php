<?php
include('../../functions/init.php');
include('../barcode/barcode128.php');
//error_reporting(0);
$SQL = 'SELECT * FROM `report` WHERE report_id = \''.$_GET['rid'].'\'';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    $arr = json_decode($firstrow['rdata'], true);
    $rt = explode(",",$firstrow['report_type']);
  
function valueCheck($range,$value){
    if(strlen($range)>0){
    if(strpos($range,"/")){
        $ra = explode("/",$range);
        $range = $ra[0];
	}
	if(strpos($range,"UP TO")){
		if(strpos($range,".")){
			$rr = explode(".",$range);
			$s1 = (int) filter_var($rr[0], FILTER_SANITIZE_NUMBER_FLOAT);
			$s2 = (int) filter_var($rr[1], FILTER_SANITIZE_NUMBER_FLOAT);
			$s = $s1.".".$s2;
		}else{
		$s = (int) filter_var($range, FILTER_SANITIZE_NUMBER_FLOAT);
		}
	
		if($value > $s){ return('color:red'); }
	}
	else{
    $rang = explode("-",$range);
    $s = [];
    $i=0;
    foreach($rang as $r){
		if(strpos($r,".")){
			$rr = explode(".",$r);
			$s1 = (int) filter_var($rr[0], FILTER_SANITIZE_NUMBER_FLOAT);
			$s2 = (int) filter_var($rr[1], FILTER_SANITIZE_NUMBER_FLOAT);
			$s[$i] = $s1.".".$s2;
		}else{
       		$s[$i] = (int) filter_var($r, FILTER_SANITIZE_NUMBER_FLOAT);
		}
		$i++;
	}
	if($value > $s[1]){ return('color:red'); }
	if($value < $s[0]){ return('color:blue'); }
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html
	xmlns="http://www.w3.org/1999/xhtml">
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

    }.infot1 td{
		border:0 !important;
		text-align:left;
		padding:0;
	}
	.infot2 td{
		border:0 !important;
		text-align:left;
		padding:0;
	}
	#meta td{
		text-align:left;
	}
	#meta td.meta-head{
		background-color:#fff;
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
			<?php
            $i=0;
                foreach($rt as $v){
                    if( count($rt) == 1 || getReportAppend($v)!= 1 ){
                    if($i>0){
                        echo '
			<div class="pb"></div>';
                    }
                    $i++;
					echo '
			<div id="customer">
				<table id="meta" class="infot1" style="float:left;width:48%;">
					<tr>
						<td class="meta-head">PATIENT NAME:</td>
						<td class="bold">'.$firstrow['patient_name'].'</td>
					</tr>
					<tr>
						<td class="meta-head">PATIENT ID:</td>
						<td class="bold">'.$firstrow['patient_id'].'</td>
					</tr>
					<tr>
						<td class="meta-head">REFERED BY:</td>
						<td class="bold">'.$firstrow['pref'].'</td>
					</tr>
					<tr>
						<td class="meta-head">DATE:</td>
						<td class="bold">'.substr($firstrow['date_added'],0,10).'</td>
					</tr>
				</table>
				<table id="meta" class="infot2" style="width:48%">
					<tr>
						<td class="meta-head">REPORT ID:</td>
						<td class="bold">'.$firstrow['report_id'].'</td>
					</tr>
					<tr>
						<td class="meta-head">SEX:</td>
						<td class="bold">'.getsex($firstrow['patient_id']).'</td>
					</tr>
					<tr><td class="meta-head"></td>
						<td>'.bar128(stripcslashes($_GET['rid'])).'</td>
					</tr>
					<!--<tr>
						<td class="meta-head" style="font-size:14px">Date of collection:</td>
						<td style="font-size:14px">'.$firstrow['date_added'].'</td>
					</tr>
					<tr>
						<td class="meta-head" style="font-size:14px">Date of reporting:</td>
						<td style="font-size:14px">
							<div >'.$firstrow['date_finished'].'</div>
						</td>
					</tr>-->
				</table>
			</div>';
                    echo '
			<br>
				<hr>';   
                } 
                    echo '
					<table id="items" class="t'.$i.'">';
                    echo '
						<p class="repTitle">'.getReportName($v).'</p>';
                
                    for($i=0;$i
						<count($arr["data"]);$i++){
                        if(($arr["data"][$i]["rt"] == "TT" && $v=="TT") || ($arr["data"][$i]["rt"] == "STOOL" && $v=="STOOL") || ($arr["data"][$i]["rt"] == "PS" && $v=="PS") || ($arr["data"][$i]["rt"] == "HIV" && $v=="HIV") || ($arr["data"][$i]["rt"] =="URINE" && $v == "URINE")){  
                     
						if($arr["data"][$i]["name"] !="lable" && $arr["data"][$i]["name"] !="note"){
                            if(strlen($arr["data"][$i]["value"])>0 && $arr["data"][$i]["value"] != "NaN"){
                            echo '
							<tr class="item-row">
								<td class="item-name" style="text-align:right;width:40%">
									<div class="delete-wpr">'.$arr["data"][$i]["name"].'
										<a class="delete" href="javascript:;" title="Remove row">X</a>
									</div>
								</td>
								<td class="bold" style="text-align:center;border-right:1px solid black;width:60%" >'.$arr["data"][$i]["value"].'</td>
							</tr>
                                ';
                        }} if($arr["data"][$i]["name"] =="lable"){
							if(isset($arr["data"][$i+1]["name"])){
							if($arr["data"][$i+1]["name"]!="note" && $arr["data"][$i+1]["name"]!="lable"){
								
                            echo '
							<tr class="item-row" style="border-bottom:1px solid #000;border-top:1px solid #000">
								<td class="item-name" colspan="4">
									<u>
									<div class="delete-wpr"><b>'.$arr["data"][$i]["value"].'</b><a class="delete" onclick="hey()" href="javascript:;" title="Remove row">X</a>
									</div>
									</u>
								</td>
							</tr>';
							}
						}
                        }
                        if($arr["data"][$i]["name"] =="note"){
							if($arr["data"][$i-1]["name"]!="lable"){
                            echo '
							<tr class="item-row">
								<td class="item-name" colspan="4">
									<div class="delete-wpr">'.$arr["data"][$i]["value"].'
										<a class="delete" href="javascript:;" title="Remove row">X</a>
									</div>
								</td>
							</tr>';
						}
					}
                      }else{
                          if($arr["data"][$i]["rt"] == $v){
                          if($arr["data"][$i]["name"] !="lable" && $arr["data"][$i]["name"] !="note"){
                            if(strlen($arr["data"][$i]["value"])>0 && $arr["data"][$i]["value"] != "NaN"){
                            echo '
							<tr class="item-row">
								<td class="item-name" style="text-align:right">
									<div class="delete-wpr">'.$arr["data"][$i]["name"].'
										<a class="delete" href="javascript:;" title="Remove row">X</a>
									</div>
								</td>
								<td class=" bold" style="text-align:center;'.valueCheck($arr["data"][$i]["range"],$arr["data"][$i]["value"]).'" >'.$arr["data"][$i]["value"].'</td>
								<td style="text-align:center">'.$arr["data"][$i]["unit"].'</td>
								<td style="text-align:left">'.$arr["data"][$i]["range"].'</td>
							</tr>
                                ';
                        }}
                        if($arr["data"][$i]["name"] =="lable"){
							if(isset($arr["data"][$i+1]["name"])){
							if($arr["data"][$i+1]["name"]!="note" && $arr["data"][$i+1]["name"]!="lable"){
                            echo '
							<tr class="item-row" style="border-bottom:1px solid #000;border-top:1px solid #000">
								<td class="item-name" colspan="4">
									<u>
									<div class="delete-wpr"><b>'.$arr["data"][$i]["value"].'</b><a class="delete" onclick="hey()" href="javascript:;" title="Remove row">X</a>
									</div>
									</u>
								</td>
							</tr>';
							}
						}
                        }
                        if($arr["data"][$i]["name"] =="note"){
							if($arr["data"][$i-1]["name"]!="lable"){
                            echo '
							<tr class="item-row">
								<td class="item-name" colspan="4">
									<div class="delete-wpr">'.$arr["data"][$i]["value"].'
										<a class="delete" href="javascript:;" title="Remove row">X</a>
									</div>
								</td>
							</tr>';
						}
					}
                    }
                      }
                        }
                echo '
						</table>';
                
                }
            ?>
					</div>
					<div id="h2">
						<center>
							<button onclick="pr()">Print</button>
						</center>
					</div>
					<script>
					function hey(){
						console.log("hELLO");
					}
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