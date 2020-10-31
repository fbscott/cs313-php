<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';

    $query = 'DELETE FROM ledger WHERE fillup_id = :fillup_id';

    $stmt = $db->prepare($query);
    $stmt->execute(array(
        ':fillup_id' => $_GET['fillup_id']
    ));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Location: ledger.php');
 ?>
