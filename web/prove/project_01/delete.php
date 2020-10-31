<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';

    $id = "DELETE FROM ledger WHERE fillup_id = '" . $_GET["fillup_id"] . "'";
    $fillup_id = "DELETE FROM fillup WHERE id = '" . $_GET["fillup_id"] . "'";

    console_log($_GET['fillup_id']);
    console_log($id);
    console_log($fillup_id);

    if($db = pg_query($id)){
        echo "Data Deleted Successfully.";
    }
    else{
        echo "Error.";
    }
 ?>
