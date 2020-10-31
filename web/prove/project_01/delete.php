<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';

    $query = "DELETE FROM ledger WHERE id = '" . $_GET["id"] . "'";

    if($result = pg_query($query)){
        echo "Data Deleted Successfully.";
    }
    else{
        echo "Error.";
    }
 ?>
 