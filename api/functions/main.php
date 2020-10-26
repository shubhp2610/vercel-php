<?php

function RemoveSpecialChar($str) { 
    $res = str_replace( array( '\'', '"', 
    ',' , ';', '<', '>' ), ' ', $str); 
    return $res; 
    } 
function getReportName($rt){
    $SQL = 'SELECT * FROM `report_type` WHERE report_id = \''.$rt.'\'';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    return($firstrow['name']);
}
function getReportAppend($rt){
    $SQL = 'SELECT * FROM `report_type` WHERE report_id = \''.$rt.'\'';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    return($firstrow['append']);
}
function getName($n){
    $SQL = 'SELECT * FROM `patient` WHERE patient_id = \''.$n.'\'';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    return($firstrow['full_name']);
}
function getsex($n){
    $SQL = 'SELECT * FROM `patient` WHERE patient_id = \''.$n.'\'';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    return($firstrow['sex']);
}
function getReportType($rt){
    $SQL = 'SELECT * FROM `report` WHERE report_id = \''.$rt.'\'';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    return($firstrow['report_type']);
}
function addReportType($rt,$rid){
    $rta = explode(",",$rt);
    $n = "";
    foreach($rta as $val){
        $n = $n." , ".getReportName($val);
    }
    $SQL = 'UPDATE `report` SET report_type = \''.escape($rt).'\' , report_name = \''.substr( $n ,3).'\' WHERE report_id = \''.$rid.'\'';
    $result = query($SQL);
    confirm($result);
}
//INDEX PAGE
function Tpending(){
    $SQL = 'SELECT COUNT(*) FROM `report` WHERE status = \'pending\'';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    echo $firstrow['COUNT(*)'];
}
function Tcomp(){
    $SQL = 'SELECT COUNT(*) FROM `report` WHERE status = \'completed\'';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    echo $firstrow['COUNT(*)'];

}
function Tpat(){
    $SQL = 'SELECT COUNT(*) FROM `patient`';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    echo $firstrow['COUNT(*)'];
}
function TcompToday(){
    $SQL = 'SELECT COUNT(*) FROM `report` WHERE `status` = \'completed\' AND `date_added` LIKE \'%'.date( 'd-m-Y', time () ).'%\'';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    echo $firstrow['COUNT(*)'];
}
//
?>