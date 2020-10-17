<?php 
  session_start();

  include $_SERVER['DOCUMENT_ROOT'] . '/prove/week_05/db.php';

  if (isset($_POST['submit'])) {
    header('Location: ledger.php');
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

<div class="row">
  <div class="column">
    <h1>Mileage Tracker</h1>
  </div>
</div>

<div class="row">
   <div class="column">
      <h2>Welcome, <?php echo $_SESSION['user'] ?>!</h2>
   </div>
</div>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="row">
  <div class="large-6 columns">

    <label for="user">Vehicle</label>
    <select name="user" id="user">
      <option value="" selected="true" disabled> -- </option>
      <?php 
        foreach ($db->query('SELECT * FROM vehicle') as $row) {
       ?>
       <option value="<?php echo $row['id']; ?>"><?php echo $row['year'] . ' ' . $row['make'] . ' ' . $row['model']; ?></option>
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
