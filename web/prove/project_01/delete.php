<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';

    $fillup_id = "DELETE FROM ledger WHERE fillup_id = '" . $_GET["fillup_id"] . "'";
    $fillup_id = "DELETE FROM fillup WHERE id = '" . $_GET["fillup_id"] . "'";

    console_log($_GET['id']);

    if($result = pg_query($fillup_id)){
        echo "Data Deleted Successfully.";
    }
    else{
        echo "Error.";
    }
 ?>
