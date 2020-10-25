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
  <title>Add New Fill-up Data</title>
</head>
<body>
<?php 
   /***************************************************************************
    * ADD NEW RECORD
    **************************************************************************/
   if (isset($_POST['submitAddFillUp'])) {
      $date = $_POST['date'];
      $mileage = $_POST['mileage'];
      $gallons = $_POST['gallons'];
      $pricepergallon = $_POST['pricepergallon'];

      /* fillup table */
      $stmt = $db->prepare('INSERT INTO fillup(f_date, mileage, gallons, pricepergallon) VALUES (:date, :mileage, :gallons, :pricepergallon);');
      $stmt->bindValue(':date', $date, PDO::PARAM_STR);
      $stmt->bindValue(':mileage', $mileage, PDO::PARAM_INT);
      $stmt->bindValue(':gallons', $gallons, PDO::PARAM_INT);
      $stmt->bindValue(':pricepergallon', $pricepergallon, PDO::PARAM_INT);
      $stmt->execute();

      $fillupId = $db->lastInsertId('fillup_id_seq');

      $_SESSION['fillupId'] = $fillupId;

      /* ledger table */
      $altStmt = $db->prepare('INSERT INTO ledger(filler_id, vehicle_id, fillUp_id) VALUES (:filler_id, :vehicle_id, :fillUp_id);');
      $altStmt->bindValue(':filler_id', $_SESSION['fillerId'], PDO::PARAM_INT);
      $altStmt->bindValue(':vehicle_id', $_SESSION['vehicleId'], PDO::PARAM_INT);
      $altStmt->bindValue(':fillUp_id', $_SESSION['fillupId'], PDO::PARAM_INT);
      $altStmt->execute();

      header('Location: ledger.php');
   }
 ?>
<div class="row"><div class="large-8 large-offset-2 columns">

   <div class="row">
     <div class="column">
       <h1>Add a Fill-up Record</h1>
     </div>
   </div>

   <!---------------------------------- FORM ---------------------------------->
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="row">
         <div class="large-3 columns">
            <label for="date">Date</label>
            <input name="date" type="text">
         </div>
         <div class="large-3 columns">
            <label for="mileage">Mileage</label>
            <input name="mileage" type="text">
         </div>
         <div class="large-3 columns">
            <label for="gallons">Gallons</label>
            <input name="gallons" type="text">
         </div>
         <div class="large-3 columns">
            <label for="pricepergallon">Pricer per Gallon</label>
            <input name="pricepergallon" type="text">
         </div>
      </div>
      <input type="submit" value="Submit" name="submitAddFillUp">
   </form>
   <!---------------------------------- /FORM --------------------------------->
</div></div>

</body>
</html>
