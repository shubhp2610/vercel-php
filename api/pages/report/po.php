<table>
<?php 
include('../../functions/init.php');


    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
    $SQL = 'SELECT * FROM `report` WHERE report_id = \''.$_POST['rid'].'\'';
$result = query($SQL);
confirm($result);
$firstrow = fetch_array($result);
$rt = $firstrow['report_type'];
        $ar = explode(",",$rt);
        
$s = '{ "data" : [';

    foreach($ar as $v){                      
        // Getting report type data
        if($v=="URINE" || $v=="HIV" || $v=="PS" || $v=="STOOL" || $v=="TT" ){ $SQL = 'SELECT * FROM `report_type` WHERE report_id = \''.$v.'\'';
            $result = query($SQL);
            confirm($result);
            $firstrow = fetch_array($result);
            $arr = json_decode($firstrow['data'], true);
            //$a = [];
            $i=0;
            foreach ($arr["data"] as $key => $value) {
                if($value["type"] == "field"){
                    $i++;
              //      $a["data"][$i]["name"] = $value['name'];
               //     $a["data"][$i]["value"] = $_POST['v'.$i];
               if(isset($_POST[$v.$i])){
                    $s = $s.'{ "rt" : "'.$v.'" , "name" : "'.$value['name'].'", "value" : "'.$_POST[$v.$i].'"},';
               }
                }
                if($value["type"] == "lable"){
                    $s = $s.'{ "rt" : "'.$v.'","name" : "lable", "value" : "'.$value['unit'].'" },';
                }
            }
        
        }else{
    $SQL = 'SELECT * FROM `report_type` WHERE report_id = \''.$v.'\'';
    $result = query($SQL);
    confirm($result);
    $firstrow = fetch_array($result);
    $arr = json_decode($firstrow['data'], true);
    //$a = [];
    $i=0;
    foreach ($arr["data"] as $key => $value) {
        if($value["type"] == "field"){
            $i++;
            if(isset($_POST[$v.$i]) && strlen($_POST[$v.$i])>0){
                $s = $s.'{ "rt" : "'.$v.'" , "name" : "'.str_replace('"','\\"',$value['name']).'", "value" : "'.$_POST[$v.$i].'", "unit" : "'.$value['unit'].'", "range" : "'.$value['range'].'" },';
            }
      //      $a["data"][$i]["name"] = $value['name'];
       //     $a["data"][$i]["value"] = $_POST['v'.$i];
        }
        if($value["type"] == "lable"){
            $s = $s.'{ "rt" : "'.$v.'", "name" : "lable", "value" : "'.$value['unit'].'" },';
        }
        if($value["type"] == "note"){
            $s = $s.'{ "rt" : "'.$v.'", "name" : "note", "value" : "'.$value['unit'].'" },';
        }
    }
}
    }
    $s = substr($s, 0, -1).' ] }';

    // $a2 = json_encode($s);
    //echo $a2;
    $fsql = 'UPDATE `report` SET rdata = \''.escape($s).'\' , date_finished = \''.date( 'd-m-Y h:i:s A', time () ).'\' , status = \'completed\' WHERE report_id = \''.$_POST['rid'].'\'';
    $result2 = query($fsql);
    confirm($result2);

    header('Location: print.php?rid='.$_POST['rid']); 

?>
</table>