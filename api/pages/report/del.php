<?php
include('../../functions/init.php');
$SQL = 'DELETE  FROM `report` WHERE report_id = \''.$_GET['rid'].'\'';
    $result = query($SQL);
    confirm($result);
    if($_GET['redir']=="index"){
        header('Location: index.php');
    }else{
        header('Location: history.php');
    }
    
?>