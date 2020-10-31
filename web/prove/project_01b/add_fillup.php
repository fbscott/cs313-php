<?php 
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/page_head.php';
?>
  <title>Add New Fill-up Data</title>
</head>
<body>
<?php 
/***************************************************************************
* ADD NEW RECORD
**************************************************************************/
if (isset($_POST['submitAddFillUp'])) {
    $date = $_POST['date'];
    $mileage = $_POST['mileage'];
    $gallons = $_POST['gallons'];
    $pricepergallon = $_POST['pricepergallon'];

    /* fillup table */
    $stmt = $db->prepare('INSERT INTO fillup(f_date, mileage, gallons, pricepergallon) VALUES (:date, :mileage, :gallons, :pricepergallon);');
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    $stmt->bindValue(':mileage', $mileage, PDO::PARAM_INT);
    $stmt->bindValue(':gallons', $gallons, PDO::PARAM_INT);
    $stmt->bindValue(':pricepergallon', $pricepergallon, PDO::PARAM_INT);
    $stmt->execute();

    $fillUp_id = $db->lastInsertId('fillup_id_seq');

    $_SESSION['fillUp_id'] = $fillUp_id;

    /* ledger table */
    $altStmt = $db->prepare('INSERT INTO ledger(filler_id, vehicle_id, fillUp_id) VALUES (:filler_id, :vehicle_id, :fillUp_id);');
    $altStmt->bindValue(':filler_id', $_SESSION['filler_id'], PDO::PARAM_INT);
    $altStmt->bindValue(':vehicle_id', $_SESSION['vehicle_id'], PDO::PARAM_INT);
    $altStmt->bindValue(':fillUp_id', $_SESSION['fillUp_id'], PDO::PARAM_INT);
    $altStmt->execute();

    header('Location: ledger.php');
}
?>
<div class="row">
  <div class="column">

    <div class="row">
      <div class="column">
        <h1>Add a Fill-up Record</h1>
        <p>Please enter dates in YYYY-MM-DD format.</p>
      </div>
    </div>

    <!---------------------------------- FORM ---------------------------------->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="row">
        <div class="large-3 columns">
          <label for="date">Date</label>
          <input name="date" type="text" />
        </div>
        <div class="large-3 columns">
          <label for="mileage">Mileage</label>
          <input name="mileage" type="text" />
        </div>
        <div class="large-3 columns">
          <label for="gallons">Gallons</label>
          <input name="gallons" type="text" />
        </div>
        <div class="large-3 columns">
          <label for="pricepergallon">Pricer per Gallon</label>
          <input name="pricepergallon" type="text" />
        </div>
      </div>
      <input type="submit" value="Submit" name="submitAddFillUp" />
    </form>
    <!---------------------------------- /FORM --------------------------------->

  </div>
</div>

</body>
</html>
