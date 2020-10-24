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

   if (isset($_POST['submitQuery'])) {
      header('Location: vehicle.php');
   }

   if (isset($_POST['submitUpdate'])) {
      $name = $_POST['newUser'];

      $stmt = $db->prepare('INSERT INTO filler(first, last, username) VALUES (:first, :last, :username);');
      $stmt->bindValue(':first', $first, PDO::PARAM_STR);
      $stmt->bindValue(':last', $last, PDO::PARAM_STR);
      $stmt->bindValue(':username', $username, PDO::PARAM_STR);
      $stmt->execute();

      // header('Location: vehicle.php');
   }

 ?>
<div class="row">
   <div class="column">
      <h1>Mileage Tracker</h1>
   </div>
</div>
<div class="row">
   <div class="large-6 columns">
      <p>Add a new user.</p>
      <!----------------------------------- FORM ----------------------------------->
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <label for="first">First</label>
         <input id="first" type="text">
         <label for="last">Last</label>
         <input id="last" type="text">
         <label for="username">User Name</label>
         <input id="username" type="text">
         <input type="submit" value="Submit" name="submitUpdate">
      </form>
      <!----------------------------------- /FORM ---------------------------------->
   </div><!-- /column -->
   <div class="large-6 columns">
      <p>Select a user.</p>
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
               <input type="submit" value="Delete" name="deleteUser">
            </div>
         </div>
      </form>
      <!----------------------------------- /FORM ---------------------------------->
   </div><!-- /column -->
</div><!-- /row -->
</body>
</html>
