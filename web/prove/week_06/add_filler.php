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
    * DELETE A RECORD
    **************************************************************************/
   /*
   if (isset($_POST['submitDelete'])) {
      $userData = $_POST['user'];

      $stmt = $db->prepare('DELETE FROM ledger WHERE filler_id = :userData');
      $stmt->bindValue(':userData', $userData, PDO::PARAM_INT);
      $stmt->execute();
   }
   */
 ?>
<div class="row"><div class="large-6 large-offset-3 columns">

   <div class="row">
     <div class="column">
       <h1>Select a User</h1>
     </div>
   </div>

   <!---------------------------------- FORM ---------------------------------->
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
   <!---------------------------------- /FORM --------------------------------->
</div></div>

</body>
</html>
