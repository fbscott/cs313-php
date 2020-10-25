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
   <link rel="stylesheet" href="../../assets/css/prove_project.css">
   <title>Mileage Tracker</title>
</head>
<body>
<body><div class="row"><div class="column">

<div class="row">
  <div class="column">
    <h1>Logged Fill-up Data</h1>
  </div>
</div>

<div class="row">
   <div class="column">
      <?php 
         $query = 'SELECT first FROM filler WHERE id = :id';

         $stmt = $db->prepare($query);
         $stmt->execute(array(':id' => $_SESSION['fillerId']));
         $rows = $stmt->fetch(PDO::FETCH_ASSOC);
       ?>
      <h2>Hello, <?php echo $rows['first']; ?>!</h2>
      <p>Below is the mileage tracking info for your <strong><?php echo $_SESSION['vehicle']; ?>
         <?php echo 'parts: ' .  $_SESSION['vehicle_parts']; ?>
      </strong>.</p>
   </div>
</div>

<div class="row">
  <div class="column">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <table>
        <tr>
          <th>Date</th>
          <th>Mileage</th>
          <th>Gallons</th>
          <th>$/gal</th>
          <th>Delete</th>
        </tr>
        <?php
          $query = 'SELECT f_date, mileage, gallons, pricepergallon
                    FROM filler AS f
                    JOIN ledger AS l
                    ON f.id = l.filler_id
                    JOIN fillup as u
                    ON u.id = l.fillup_id
                    JOIN vehicle as v
                    ON v.id = l.vehicle_id
                    WHERE f.id = :id and v.year = :year and v.make = :make and v.model = :model;';

          $stmt = $db->prepare($query);
          $stmt->execute(array(
            ':id'    => $_SESSION['fillerId'],
            ':year'  => $_SESSION['vehicle_parts'][0],
            ':make'  => $_SESSION['vehicle_parts'][1],
            ':model' => $_SESSION['vehicle_parts'][2]
          ));
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach ($rows as $row) {
         ?>
            <tr>
            <td><?php echo $row['f_date']; ?></td>
            <td><?php echo $row['mileage']; ?></td>
            <td><?php echo $row['gallons']; ?></td>
            <td>$<?php echo $row['pricepergallon']; ?></td>
            <td><input type="submit" value="Delete" name="remove"></td>
            </tr>
         <?php } ?>
      </table>
    </form>
  </div>
</div>

</div></div></body>
</body>
</html>
