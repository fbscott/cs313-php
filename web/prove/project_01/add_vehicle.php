<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_page_head.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_error_message.php';
?>
  <title>Add New Vehicle Data</title>
</head>
<body>
<?php 
    /***************************************************************************
    * ADD NEW RECORD
    **************************************************************************/
    if (isset($_POST['submitAddVehicle'])) {
        $year  = htmlentities($_POST['year']);
        $make  = htmlentities($_POST['make']);
        $model = htmlentities($_POST['model']);
        // are all inputs filled in
        $isFormValid = true;
        $errorMsg = '';

        // all of these elems should be filled in
        $elems = array($year, $make, $model);

        // iterate through inputs, make sure they're all filled in
        for ($i = 0; $i < sizeof($elems); $i++) { 
            if (empty($elems[$i])) {
                $isFormValid = false;
            }
        }

        if ($isFormValid) {
            /* vehicle table */
            $stmt = $db->prepare('INSERT INTO vehicle(year, make, model, filler_id) VALUES (:year, :make, :model, :filler_id);');
            $stmt->bindValue(':year', $year, PDO::PARAM_INT);
            $stmt->bindValue(':make', $make, PDO::PARAM_STR);
            $stmt->bindValue(':model', $model, PDO::PARAM_STR);
            $stmt->bindValue(':filler_id', $_SESSION['filler_id'], PDO::PARAM_INT);
            $stmt->execute();

            $vehicle_id = $db->lastInsertId('vehicle_id_seq');

            $_SESSION['vehicle_id'] = $vehicle_id;

            header('Location: add_fillup.php');
        } else {
            $errorMsg = $errorFillFields;
        }
    }
?>
<div class="row">
  <div class="large-6 large-offset-3 columns">

    <div class="row">
      <div class="column">
        <h1>Add a Vehicle</h1>
      </div>
    </div>

    <?php echo $errorMsg; ?>

    <!---------------------------------- FORM ---------------------------------->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="row">
        <div class="large-4 columns">
          <label for="year">Year</label>
          <input name="year" type="text" required />
        </div>
        <div class="large-4 columns">
          <label for="make">Make</label>
          <input name="make" type="text" required />
        </div>
        <div class="large-4 columns">
          <label for="model">Model</label>
          <input name="model" type="text" required />
        </div>
      </div>
      <input type="submit" value="Submit" name="submitAddVehicle" />
    </form>
    <!---------------------------------- /FORM --------------------------------->

  </div>
</div>

</body>
</html>
