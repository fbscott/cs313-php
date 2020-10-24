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

      // header('Location: vehicle.php');
   }

   if (isset($_POST['submitQuery'])) {
      header('Location: vehicle.php');
   }

   if (isset($_POST['submitDelete'])) {

      $query = 'SELECT username, first, last, filler_id
                FROM filler AS f
                JOIN ledger AS l
                ON f.id = l.filler_id
                WHERE f.id = :id;';

      $stmt = $db->prepare($query);
      $stmt = $db->prepare('DELETE FROM ledger WHERE id = ?');
      $stmt->execute(array(':id' => 1));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

 ?>
<div class="row">
   <div class="column">
      <h1>Mileage Tracker</h1>
   </div>
</div>
<div class="row">
   <div class="large-6 columns">
      <p>Add a new user</p>
      <!----------------------------------- FORM ----------------------------------->
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
      <!----------------------------------- /FORM ---------------------------------->
   </div><!-- /column -->
   <div class="large-6 columns">
      <p>Select a user</p>
      <!----------------------------------- FORM ----------------------------------->
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <label for="user">User</label>
         <select id="user" name="user">
            <option value="" selected="true" disabled> -- </option>
            <?php 
            foreach ($db->query('SELECT * FROM filler') as $row) {
            ?>
            <option value="<?php echo $row['first']; ?>"><?php echo $row['first']; ?></option>
            <?php } ?>
         </select>
         <div class="row">
            <div class="columns large-6">
               <input type="submit" value="Submit" name="submitQuery">
            </div>
            <div class="columns large-6">
               <input type="submit" value="Delete" name="submitDelete">
            </div>
         </div>
      </form>
      <!----------------------------------- /FORM ---------------------------------->
   </div><!-- /column -->
</div><!-- /row -->
</body>
</html>
