<?php 
  session_start();

  include $_SERVER['DOCUMENT_ROOT'] . '/prove/week_05/db.php';

  $filler = $_POST['filler'];

  if (!isset($_SESSION['filler'])) {
    $_SESSION['filler'] = $filler;
  }

  if (isset($_POST['submit'])) {
    header('Location: vehicle.php');
  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/_reset.css">
  <link rel="stylesheet" href="../../assets/css/_base.css">
  <link rel="stylesheet" href="../../assets/css/_grid.css">
  <title>Query User Data</title>
</head>
<body><div class="row"><div class="column">
<?php echo $_SESSION['filler']; ?>
<div class="row">
  <div class="column">
    <h1>Mileage Tracker</h1>
  </div>
</div>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="row">
  <div class="large-6 columns">

    <label for="filler">Filler</label>
    <select id="filler">
      <option value="" selected="true" disabled> -- </option>
      <?php 
        foreach ($db->query('SELECT * FROM filler') as $row) {
       ?>
       <option value="<?php echo $row['id']; ?>"><?php echo $row['first']; ?></option>
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

</div></div></body>
</html>
