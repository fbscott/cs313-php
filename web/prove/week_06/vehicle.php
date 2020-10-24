<?php 
  session_start();

  include $_SERVER['DOCUMENT_ROOT'] . '/prove/week_05/db.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/_reset.css">
  <link rel="stylesheet" href="../../assets/css/_base.css">
  <link rel="stylesheet" href="../../assets/css/_grid.css">
  <title>Query Vehicle Data</title>
</head>
<body>
<?php 
  $vehicle = $_POST['vehicle'];

  $_SESSION['vehicle'] = $vehicle;
  $_SESSION['vehicle_parts'] = explode(' ', $vehicle);

  if (isset($_POST['submit'])) {
    header('Location: ledger.php');
  }
 ?>

<div class="row"><div class="large-6 large-offset-3 columns">

<div class="row">
  <div class="column">
    <h1>Mileage Tracker</h1>
    <p>Select a vehicle.</p>
  </div>
</div>

<!----------------------------------- FORM ----------------------------------->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="row">
  <div class="column">

    <label for="vehicle">Vehicle</label>
    <select name="vehicle" id="vehicle">
      <option value="" selected="true" disabled> -- </option>
      <?php 
        $query = 'SELECT DISTINCT year, make, model
                  FROM filler AS f
                  JOIN ledger AS l
                  ON f.id = l.filler_id
                  JOIN fillup as u
                  ON u.id = l.fillup_id
                  JOIN vehicle as v
                  ON v.id = l.vehicle_id
                  WHERE f.id = :id;';

        $stmt = $db->prepare($query);
        $stmt->execute(array(':id' => $_SESSION['fillerId']));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
       ?>
       <option value="<?php echo $row['year'] . ' ' . $row['make'] . ' ' . $row['model']; ?>"><?php echo $row['year'] . ' ' . $row['make'] . ' ' . $row['model']; ?></option>
      <?php } ?>
    </select>

  </div>
</div>

<div class="row">
  <div class="column">
    <input type="submit" value="Submit" name="submit">
  </div>
</div>
</form>
<!----------------------------------- /FORM ---------------------------------->

</div></div>
</body>
</html>
