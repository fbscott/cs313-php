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
   $fillerId = $_POST['user'];

   $_SESSION['fillerId'] = $fillerId;

   /***************************************************************************
    * ADD NEW RECORD
    **************************************************************************/
   if (isset($_POST['submitAdd'])) {
      $username = $_POST['username'];
      $first = $_POST['first'];
      $last = $_POST['last'];

      $stmt = $db->prepare('INSERT INTO filler(username, first, last) VALUES (:username, :first, :last);');
      $stmt->bindValue(':username', $username, PDO::PARAM_STR);
      $stmt->bindValue(':first', $first, PDO::PARAM_STR);
      $stmt->bindValue(':last', $last, PDO::PARAM_STR);
      $stmt->execute();

      $filler_id = $db->lastInsertId('filler_id_seq');

      header('Location: vehicle.php');
   }

   /***************************************************************************
    * QUERY A RECORD
    **************************************************************************/
   if (isset($_POST['submitQuery'])) {
      header('Location: vehicle.php');
   }
 ?>

<div class="row">
   <div class="large-6 large-offset-3 columns">
      <h1>Mileage Tracker</h1>
   </div>
</div>

<div class="row">
   <div class="large-6 large-offset-3 columns">
      <p>Add a new user</p>
      <!-------------------------------- FORM -------------------------------->
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <div class="row">
            <div class="large-6 columns">
               <label for="first">First</label>
               <input name="first" type="text">
            </div>
            <div class="large-6 columns">
               <label for="last">Last</label>
               <input name="last" type="text">
            </div>
         </div>
         <label for="username">User Name</label>
         <input name="username" type="text">
         <input type="submit" value="Submit" name="submitAdd">
      </form>
      <!-------------------------------- /FORM ------------------------------->
   </div><!-- /column -->
</div><!-- /row -->

</body>
</html>
