<?php 
  session_start();

  try
  {
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }

  $filler = $_POST['filler'];

  if (isset($_POST['submit'])) {
    // header('Location: vehicle.php');
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
<?php echo $filler; ?>
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
  <!-- <div class="large-6 columns">

    <label for="user">Vehicle</label>
    <select name="user" id="user">
      <option value="" selected="true" disabled> -- </option>
      <?php 
        foreach ($db->query('SELECT * FROM vehicle') as $row) {
       ?>
       <option value="<?php echo $row['id']; ?>"><?php echo $row['year'] . ' ' . $row['make'] . ' ' . $row['model']; ?></option>
      <?php } ?>
    </select>

  </div> -->
</div>

<div class="row">
  <div class="column">
    <input type="submit" value="Submit" name="submit">
  </div>
</div>
</form>

</div></div></body>
</html>
