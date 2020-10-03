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
  <title>Cart 03</title>
</head>
<body>

<div class="row">
  <div class="columns small-6">
    <h1>Cart 03</h1>
  </div>
  <div class="columns small-6">
    <p><a href="./prove_03.php">back</a></p>
  </div>
</div>

<div class="row">
  <div class="column">
    <p><?php echo 'Cart: ' . $_SESSION['count']; ?></p>

    <ul>
    <?php 
      for ($row = 0; $row < 6; $row++) {
        if ($_SESSION['cart'][$row]['qty'] > 0) {
          echo '<li><div class="row"><div class="columns small-6"><p>' .
               $_SESSION['cart'][$row]['prod'] .
               '</p><p>' .
               $_SESSION['cart'][$row]['desc'] .
               '</p></div><div class="columns small-6"><p>$' .
               number_format($_SESSION['cart'][$row]['amt'], 2) .
               '</p></div></div></li>';
        }
      }
    ?>
    </ul>

    <!-- <p><?php echo "Cart: {$_SESSION['count']}"; ?></p> -->
    <!-- <p>Cart: <?php print_r($_SESSION['count']) ?></p> -->
  </div>
</div>

</body>
</html>
