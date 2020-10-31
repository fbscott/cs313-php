<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';
    
    console_log($_GET['fillup_id']);

    $query = 'DELETE FROM ledger WHERE fillup_id = :fillup_id';

    $stmt = $db->prepare($query);
    $stmt->execute(array(
        ':fillup_id'  => $_SESSION['fillup_id']
    ));

    if($db = pg_query($query)){
        echo "Data Deleted Successfully.";
    }
    else{
        echo "Error.";
    }
 ?>
