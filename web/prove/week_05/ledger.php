<?php 
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/_reset.css">
  <link rel="stylesheet" href="../../assets/css/_base.css">
  <link rel="stylesheet" href="../../assets/css/_grid.css">
  <title>Mileage Tracker</title>
</head>
<body>
<body><div class="row"><div class="column">

<div class="row">
  <div class="column">
    <h1>Mileage Tracker</h1>
  </div>
</div>


<div class="row">
  <div class="column">
    <p>Hello,
      <?php echo $user . '!' ?>
    </p>
    <p>Below is the mileage tracking info for your 2010 Jeep Wrangler.</p>
  </div>
</div>

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

</div></div></body>
</body>
</html>