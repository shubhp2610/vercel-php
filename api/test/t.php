<?php

$sql = 'SELECT * FROM `report` WHERE `date_added` LIKE \'%\{'.date( 'd-m-Y', time () ).'}%\' ';
echo $sql;