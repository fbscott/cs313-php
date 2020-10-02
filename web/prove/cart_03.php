<?php 
  session_start();
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
   <title>Cart</title>
</head>
<body>
   <div class="row">
      <div class="column medium-6">
         <h1>Prove 03</h1>
      </div>
      <div class="columns medium-6">
         <p><?php echo 'Cart: ' . $_SESSION['count']; ?></p>

         <ul>
         <?php 
            foreach ($_SESSION['cart'] as $key => $value) {
               if ($value) {
                  echo '<li>' . $key . ' ' . $value . '</li>';
               }
            }
         ?>
         </ul>

        <!-- <p><?php echo "Cart: {$_SESSION['count']}"; ?></p> -->
        <!-- <p>Cart: <?php print_r($_SESSION['count']) ?></p> -->
        <p><a href="./prove_03.php">back</a></p>
      </div>
   </div>
</body>
</html>
