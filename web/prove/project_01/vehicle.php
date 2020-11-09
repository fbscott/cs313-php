<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_db.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_page_head.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/_error_message.php';
?>
  <title>Query Vehicle Data</title>
</head>
<body>
<?php 
    if (isset($_POST['submit'])) {
        $vehicle_id = $_POST['vehicle_id'];
        $_SESSION['vehicle_id'] = $vehicle_id;

        // are all inputs filled in
        $isFormValid = true;
        $errorMsg = '';

        if (empty($vehicle_id)) {
            $isFormValid = false;
        }

        if ($isFormValid) {
            header('Location: ledger.php');
        } else {
            $errorMsg = $errorFillFields;
        }
    }

    if (isset($_POST['back'])) {
        header('Location: filler.php');
    }

    if (isset($_POST['addVehicle'])) {
        header('Location: add_vehicle.php');
    }
?>

<div class="row">
  <div class="large-6 large-offset-3 columns">

    <div class="row">
      <div class="column">
        <h1>Select a Vehicle</h1>
        <p>View fill-up data for a previously logged vehicle.</p>
      </div>
    </div>

    <?php echo $errorMsg; ?>

    <!---------------------------------- FORM ---------------------------------->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="row">
        <div class="column">

          <label for="vehicle_id">Vehicle</label>
          <select name="vehicle_id">
            <option value="" selected="true" disabled> -- </option>
            <?php 
            $query = 'SELECT DISTINCT vehicle_id, year, make, model
                      FROM filler AS f
                      JOIN ledger AS l
                      ON f.id = l.filler_id
                      JOIN fillup as u
                      ON u.id = l.fillup_id
                      JOIN vehicle as v
                      ON v.id = l.vehicle_id
                      WHERE f.id = :filler_id;';

            $stmt = $db->prepare($query);
            $stmt->execute(array(':filler_id' => $_SESSION['filler_id']));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $row) {
            ?>
            <option value="<?php echo $row['vehicle_id']; ?>"><?php echo $row['year'] . ' ' . $row['make'] . ' ' . $row['model']; ?></option>
            <?php } ?>
          </select>

        </div>
      </div>

      <div class="row">
        <div class="columns large-6">
          <input type="submit" value="Back" name="back" />
        </div>
        <div class="columns large-6">
          <input type="submit" value="Submit" name="submit" />
        </div>
      </div>

      <div class="row">
        <div class="column">
          <p class="or-big">OR</p>
        </div>
      </div>

      <div class="row">
        <div class="column">
          <p>Add a new vehicle.</p>
          <span class="or-big">
            <input type="submit" value="Add a Vehicle for this User" name="addVehicle">
          </span>
        </div>
      </div>
    </form>
    <!---------------------------------- /FORM --------------------------------->

  </div>
</div>

</body>
</html>
