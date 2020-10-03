<?php 
  session_start();

  // $_SESSION['qty_1'] = 3;

  // print_r($_SESSION);

  $count = $_SESSION['count'];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/_reset.css">
  <link rel="stylesheet" href="../../assets/css/_base.css">
  <link rel="stylesheet" href="../../assets/css/_grid.css">
  <link rel="stylesheet" href="./assets/css/prove_03.css">
  <title>Shopping Cart</title>
</head>
<body>

  <div class="row">
    <div class="column small-6">
      <h1>Shopping Cart</h1>
    </div>
    <div class="column small-6">
      <a href="./index.php">Products</a>
    </div>
  </div>

  <div class="row">
    <div class="column">
      <p><?php echo $count ?></p>
    </div>
  </div>

</body>
</html>
