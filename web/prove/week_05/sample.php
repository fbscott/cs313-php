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
  <title>Query User Data</title>
</head>
<body>
<?php 
  $user = $_POST['user'];

  $_SESSION['user'] = $user;

  if (isset($_POST['submit'])) {
    // header('Location: vehicle.php');
  }
 ?>
<div class="row"><div class="column">

<div class="row">
  <div class="column">
    <h1>Mileage Tracker</h1>
  </div>
</div>

<!-------------------------------- USER FORM --------------------------------->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="row">
  <div class="large-6 columns">

    <label for="user">User</label>
    <select id="user" name="user">
      <option value="" selected="true" disabled> -- </option>
      <?php 
        foreach ($db->query('SELECT * FROM filler') as $row) {
       ?>
       <option value="<?php echo $row['first']; ?>"><?php echo $row['first']; ?></option>
      <?php } ?>
    </select>

  </div>
</div>

<div class="row">
  <div class="large-6 column">
    <!-- SUBMIT -->
    <input type="submit" value="Submit" name="submit">
  </div>
</div>
</form>
<!-------------------------------- /USER FORM -------------------------------->
<!-------------------------------- VEHICLE FORM ------------------------------>
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
  <div class="large-6 column">
    <!-- SUBMIT -->
    <input type="submit" value="Submit" name="submit">
  </div>
</div>
</form>
<!-------------------------------- /VEHICLE FORM ----------------------------->
<!-------------------------------- LEDGER ------------------------------------>
<div class="row">
  <div class="column">
    <table>
      <tr>
        <th>Average MPG</th>
        <th>Average Miles per fill-up</th>
      </tr>
      <tr>
        <td>28.34</td>
        <td>431</td>
      </tr>
    </table>
  </div>
</div>

<div class="row">
  <div class="column">
    <table>
      <tr>
        <th>Date</th>
        <th>Mileage</th>
        <th>Gallons</th>
        <th>$/gal</th>
        <th>Total</th>
        <th>MPG</th>
        <th>mi/tank</th>
      </tr>
      <?php 
        foreach ($db->query('SELECT * FROM fillUp') as $row) {
          echo '<tr>';
          echo '<td>'  . $row['f_date']         . '</td>';
          echo '<td>'  . $row['mileage']        . '</td>';
          echo '<td>'  . $row['gallons']        . '</td>';
          echo '<td>$' . $row['pricepergallon'] . '</td>';
          echo '<td> -- </td>';
          echo '<td> -- </td>';
          echo '<td> -- </td>';
          echo '</tr>';
        }
       ?>
    </table>
  </div>
</div>
<!-------------------------------- /LEDGER ----------------------------------->

</div></div>
</body>
</html>
