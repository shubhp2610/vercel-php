<?php
include('../../functions/init.php');
$rt =  getReportType($_GET['rid']);
$rt = $rt.','.$_GET['rt'];
addReportType($rt,$_GET['rid']);
$a = explode("-",$_GET['rid']);
header('Location: dataR.php?rid='.$_GET['rid'].'&pid='.$a[0].'-'.$a[1]);
?>