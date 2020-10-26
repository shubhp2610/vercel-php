<?php
$handle = fopen("in.txt", "r");
if ($handle) {
    echo '  <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Name</th>
          
        </tr>
    </tfoot>
    <tbody>';
    while (($line = fgets($handle)) !== false) {

        echo '<tr><td>'.$line.'</td></tr>';
    }
echo '</tbody>
</table>';
    fclose($handle);
} else {
    // error opening the file.
} 
?>