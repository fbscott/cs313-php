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
    <h2>Welcome, <?php echo $_SESSION['user'] ?>!</h2>
    <p>Below is the mileage tracking info for your vehicles.</p>
  </div>
</div>

<!-- <div class="row">
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
</div> -->

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
        $query = "SELECT * FROM filler AS f
                  JOIN ledger AS l
                  ON f.id = l.filler_id
                  JOIN fillup as u
                  ON u.id = l.fillup_id
                  JOIN vehicle as v
                  ON v.id = l.vehicle_id
                  WHERE f.first = :first;";

        $stmt = $db->prepare($query);
        $stmt->execute(array(':first' => $first));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // foreach ($db->query('SELECT * FROM fillUp') as $row) {
        foreach ($rows as $row) {
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
