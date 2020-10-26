<?php
ini_set('max_execution_time', '0');
$i = $_GET['id'];
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            "http://www.jacpcldce.ac.in/search/D2D_QRes_18.asp" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
//curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 
//$fp = fopen('12.txt', 'a');
//for($i=201190742291;$i<201190743291;$i++){
curl_setopt($ch, CURLOPT_POSTFIELDS,     "txtGcetNo=".$i."&selCourse=Merit_D2D17&CaptchaInput=94195&submit=Go Get It..." ); 
//echo $i." | ";
$result=curl_exec ($ch);
echo $result;
////fwrite($fp, $result);  
//}
//fclose($fp);  
//echo "============DONEEEEEEEEE=========";
