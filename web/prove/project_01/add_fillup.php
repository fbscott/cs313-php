<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_page_head.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_error_message.php';
?>
  <title>Add New Fill-up Data</title>
</head>
<body>
<?php 
    /***************************************************************************
    * ADD NEW RECORD
    **************************************************************************/
    if (isset($_POST['submitAddFillUp'])) {
        $date           = htmlentities($_POST['date']);
        $mileage        = htmlentities($_POST['mileage']);
        $gallons        = htmlentities($_POST['gallons']);
        $pricepergallon = htmlentities($_POST['pricepergallon']);

        // are all inputs filled in
        $isFormValid = true;
        $errorMsg = '';

        // all of these elems should be filled in
        $elems = array($date, $mileage, $gallons, $pricepergallon);

        // iterate through inputs, make sure they're all filled in
        for ($i = 0; $i < sizeof($elems); $i++) { 
            if (empty($elems[$i])) {
                $isFormValid = false;
            }
        }

        if ($isFormValid) {
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
        } else {
            $errorMsg = $errorFillFields;
        }
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

    <?php echo $errorMsg; ?>

    <!---------------------------------- FORM ---------------------------------->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="row">
        <div class="large-3 columns">
          <label for="date">Date</label>
          <input name="date" type="text" required />
        </div>
        <div class="large-3 columns">
          <label for="mileage">Mileage</label>
          <input name="mileage" type="text" required />
        </div>
        <div class="large-3 columns">
          <label for="gallons">Gallons</label>
          <input name="gallons" type="text" required />
        </div>
        <div class="large-3 columns">
          <label for="pricepergallon">Pricer per Gallon</label>
          <input name="pricepergallon" type="text" required />
        </div>
      </div>
      <input type="submit" value="Submit" name="submitAddFillUp" />
    </form>
    <!---------------------------------- /FORM --------------------------------->

  </div>
</div>

</body>
</html>
