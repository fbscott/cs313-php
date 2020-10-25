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
  <title>Add New Vehicle Data</title>
</head>
<body>
<?php 
   // $fillerId = $_POST['user'];

   // $_SESSION['fillerId'] = $fillerId;

   /***************************************************************************
    * ADD NEW RECORD
    **************************************************************************/
   if (isset($_POST['submitAddVehicle'])) {
      $year = $_POST['year'];
      $make = $_POST['make'];
      $model = $_POST['model'];

      $stmt = $db->prepare('INSERT INTO filler(year, make, model, filler_id) VALUES (:year, :make, :model, :filler_id);');
      $stmt->bindValue(':year', $year, PDO::PARAM_INT);
      $stmt->bindValue(':make', $make, PDO::PARAM_STR);
      $stmt->bindValue(':model', $model, PDO::PARAM_STR);
      $stmt->bindValue(':filler_id', $_SESSION['fillerId'], PDO::PARAM_INT);
      $stmt->execute();

      $filler_id = $db->lastInsertId('filler_id_seq');

      header('Location: add_fillup.php');
   }
 ?>
<div class="row"><div class="large-6 large-offset-3 columns">

   <div class="row">
     <div class="column">
       <h1>Add a Vehicle</h1>
     </div>
   </div>

   <!---------------------------------- FORM ---------------------------------->
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="row">
         <div class="large-4 columns">
            <label for="year">Year</label>
            <input name="year" type="text">
         </div>
         <div class="large-4 columns">
            <label for="make">Make</label>
            <input name="make" type="text">
         </div>
         <div class="large-4 columns">
            <label for="model">Model</label>
            <input name="model" type="text">
         </div>
      </div>
      <input type="submit" value="Submit" name="submitAddVehicle">
   </form>
   <!---------------------------------- /FORM --------------------------------->
</div></div>

</body>
</html>
