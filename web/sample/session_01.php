<?php 
   if (isset($_POST['submit'])) {
      session_start();

      $_SESSION['name'] = htmlentities($_POST['name']);
      $_SESSION['name'] = htmlentities($_POST['email']);

      header('Location: session_02.php'); // prob need for cart button
   }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../assets/css/_reset.css">
   <link rel="stylesheet" href="../assets/css/_base.css">
   <link rel="stylesheet" href="../assets/css/_grid.css">
   <link rel="stylesheet" href="../assets/css/prove_03.css">
   <title>Document</title>
</head>
<body>
   <div class="row">
      <div class="column">
         <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="name"><br />
            <input type="text" name="email"><br />
            <input type="submit" name="submit" value="Submit">
         </form>
      </div>
   </div>
</body>
</html>
